/* Luis Henao: ad click attribution. Keeps the click IDs (gclid, gbraid, wbraid, fbclid) and UTMs a visitor
   lands with in a first-party cookie for 90 days and passes them to GoHighLevel forms and calendars, so GHL
   can send each conversion back to Google Ads and Meta. Runs in the browser: page caching can't mix visitors. */
(function () {
	const d = document;
	const KEYS = ['gclid', 'gbraid', 'wbraid', 'fbclid', 'msclkid', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'];
	const NAME = 'lh_attr', DAYS = 90;
	// GHL embeds: its own domains, or a white-label domain serving /widget/form|booking|survey/...
	const GHL = /leadconnectorhq\.com|msgsndr\.com|\/widget\/(form|booking|survey|appointment)s?\//;

	const read = () => {
		const m = d.cookie.match(new RegExp('(?:^|; )' + NAME + '=([^;]*)'));
		try { return m ? JSON.parse(decodeURIComponent(m[1])) : {}; } catch (e) { return {}; }
	};

	let attr = read();
	const q = new URLSearchParams(location.search), fresh = {};
	KEYS.forEach(k => { const v = q.get(k); if (v) fresh[k] = v.slice(0, 255); });
	if (Object.keys(fresh).length) {
		// last click wins, and as a whole set: a new ad click never keeps UTMs from an older campaign
		attr = { ...fresh, landing: location.pathname, ts: Date.now() };
		d.cookie = `${NAME}=${encodeURIComponent(JSON.stringify(attr))}; max-age=${DAYS * 86400}; path=/; SameSite=Lax`
			+ (location.protocol === 'https:' ? '; Secure' : '');
	}
	window.lhAttr = attr;

	const keys = KEYS.filter(k => attr[k]);
	if (!keys.length) return;

	// adds the missing keys; null when there is nothing to add, so re-running never loops
	const tag = u => {
		if (!u || !GHL.test(u)) return null;
		let x;
		try { x = new URL(u, location.href); } catch (e) { return null; }
		const add = keys.filter(k => !x.searchParams.has(k));
		if (!add.length) return null;
		add.forEach(k => x.searchParams.set(k, attr[k]));
		return x.href;
	};

	const deco = el => {
		if (el.tagName === 'IFRAME') {
			// lazy-loaded iframes (LiteSpeed) keep the real URL in data-src until they scroll into view
			['data-src', 'src'].forEach(a => { const v = tag(el.getAttribute(a)); if (v) el.setAttribute(a, v); });
		} else if (el.tagName === 'A') {
			const v = tag(el.getAttribute('href'));
			if (v) el.setAttribute('href', v);
		} else if (el.tagName === 'INPUT' && !el.value && KEYS.includes(el.name)) {
			el.value = attr[el.name] || '';
		}
	};
	const scan = root => {
		if (root.nodeType !== 1) return;
		if (root.matches('iframe, a[href], input[type="hidden"]')) deco(root);
		root.querySelectorAll('iframe, a[href], input[type="hidden"]').forEach(deco);
	};

	scan(d.documentElement);
	// forms and calendars added later (popups, lazy embeds)
	new MutationObserver(list => list.forEach(m => {
		if (m.type === 'attributes') deco(m.target);
		else m.addedNodes.forEach(scan);
	})).observe(d.documentElement, { childList: true, subtree: true, attributes: true, attributeFilter: ['src', 'data-src', 'href'] });
})();
