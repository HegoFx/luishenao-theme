/* Lab look (Home + landing): split headings, live interface mockups (inc/ui.php), scroll scenes,
   card spotlight, magnetic buttons and smooth scroll. Runs before site.js. */
(function () {
	const root = document.documentElement;
	const motion = root.classList.contains('lh-js');
	const { gsap, ScrollTrigger } = window;
	const fine = matchMedia('(hover: hover) and (pointer: fine)').matches;

	/* ---------- mockup loops only run while visible ---------- */
	const io = new IntersectionObserver(es => es.forEach(e => {
		e.target.classList.toggle('is-on', e.isIntersecting);
		e.target.querySelectorAll('video').forEach(v => {
			if (e.isIntersecting && motion) { const p = v.play(); if (p) p.catch(() => {}); } else v.pause();
		});
	}), { rootMargin: '80px' });
	document.querySelectorAll('.lh-ui, .lh-mini').forEach(el => io.observe(el));

	/* ---------- hero feed: a new pre-qualified homeowner every few seconds ---------- */
	document.querySelectorAll('.lh-ui-feed').forEach(feed => {
		const list = feed.querySelector('.lh-feed-list'), count = feed.querySelector('.lh-feed-count');
		let people = [];
		try { people = JSON.parse(feed.dataset.people || '[]'); } catch (e) {}
		if (!people.length || !list) return;
		const tpl = list.firstElementChild.cloneNode(true);
		let i = 3, n = parseInt(count.textContent, 10) || 3, timer;
		const push = () => {
			const p = people[i++ % people.length], c = tpl.cloneNode(true);
			c.querySelector('.lh-fc-av').textContent = p[0];
			c.querySelector('.lh-fc-who').textContent = p[1] + ' · ' + p[2];
			const tags = c.querySelectorAll('.lh-fc-tags li');
			[null, p[4], p[3], p[5]].forEach((t, k) => { if (t && tags[k]) tags[k].textContent = t; });
			c.classList.add('is-new');
			list.prepend(c);
			while (list.children.length > 3) list.lastElementChild.remove();
			count.textContent = ++n;
			if (gsap && motion) {
				gsap.fromTo(c, { y: -24, opacity: 0, scale: .97 }, { y: 0, opacity: 1, scale: 1, duration: .7, ease: 'back.out(1.5)' });
				gsap.fromTo([...list.children].slice(1), { y: -70 }, { y: 0, duration: .7, ease: 'power3.out' });
				gsap.to(tags, { opacity: 1, y: 0, duration: .35, stagger: .32, delay: .45, ease: 'power2.out' });
				gsap.fromTo(count, { scale: 1.4, color: '#3DDC97' }, { scale: 1, color: '', duration: .6, delay: 1.6 });
			} else {
				c.classList.remove('is-new');
			}
		};
		new IntersectionObserver(([e]) => {
			clearInterval(timer);
			if (e.isIntersecting) timer = setInterval(push, 3200);
		}).observe(feed);
	});

	/* ---------- hero flow: the homeowner travels from the ad to the install ---------- */
	document.querySelectorAll('.lh-ui-flow').forEach(flow => {
		const rail = flow.querySelector('.lh-fl-rail'), nodes = [...flow.querySelectorAll('.lh-fl-nodes li')];
		if (!rail || !nodes.length || !gsap) return;
		flow.classList.add('is-js');
		const st = { p: 0 }, last = nodes.length - 1;
		const draw = () => rail.style.setProperty('--p', st.p.toFixed(4));
		const tl = gsap.timeline({ repeat: -1, paused: true, onRepeat: () => nodes.forEach(n => n.classList.remove('on')) });
		nodes.forEach((n, k) => {
			if (k) tl.to(st, { p: k / last, duration: k === 4 ? 1.1 : .75, ease: 'power2.inOut', onUpdate: draw });
			tl.call(() => n.classList.add('on'));
			tl.to({}, { duration: k === 3 || k === last - 1 ? .7 : .25 });
		});
		tl.to({}, { duration: 1.6 }).set(st, { p: 0, onComplete: draw });
		new IntersectionObserver(([e]) => e.isIntersecting ? tl.play() : tl.pause()).observe(flow);
	});

	/* ---------- card spotlight ---------- */
	if (fine) {
		document.addEventListener('pointermove', e => {
			const c = e.target.closest && e.target.closest('.lh-card, .lh-step, .lh-guarantee');
			if (!c) return;
			const r = c.getBoundingClientRect();
			c.style.setProperty('--mx', (e.clientX - r.left) + 'px');
			c.style.setProperty('--my', (e.clientY - r.top) + 'px');
		}, { passive: true });
	}

	if (!gsap || !ScrollTrigger) return;
	gsap.registerPlugin(ScrollTrigger);

	/* ---------- smooth scroll (desktop pointer only; touch keeps native scrolling) ---------- */
	if (motion && fine && window.Lenis) {
		const lenis = new Lenis({ lerp: .11, smoothWheel: true });
		lenis.on('scroll', ScrollTrigger.update);
		gsap.ticker.add(t => lenis.raf(t * 1000));
		gsap.ticker.lagSmoothing(0);
		document.addEventListener('click', e => {
			const a = e.target.closest('a[href*="#"]');
			if (!a) return;
			const url = new URL(a.href, location.href), el = url.hash && url.pathname === location.pathname && document.querySelector(url.hash);
			if (el) { e.preventDefault(); lenis.scrollTo(el, { offset: -80 }); history.replaceState(null, '', url.hash); }
		});
	}

	/* ---------- Closet Ads System: the stage follows the step in view ---------- */
	const stage = document.querySelector('.lh-ui-stage');
	if (stage) {
		const label = stage.querySelector('.lh-ui-live');
		const tpl = label ? label.lastChild.textContent.replace(/\d+/, '#') : '';
		document.querySelectorAll('.lh-step').forEach((step, k) => ScrollTrigger.create({
			trigger: step, start: 'top 72%', end: 'bottom 72%',
			onToggle(self) {
				if (!self.isActive) return;
				stage.dataset.scene = k + 1;
				if (label) label.lastChild.textContent = tpl.replace('#', k + 1);
			},
		}));
	}

	if (!motion) {
		document.querySelectorAll('.lh-tl-count b').forEach(b => b.textContent = b.dataset.count);
		document.querySelectorAll('.lh-ui-timeline').forEach(t => { t.style.setProperty('--p', 1); t.querySelectorAll('li').forEach(l => l.classList.add('is-hit')); });
		return;
	}

	/* ---------- headings: words rise one by one, every time they enter (down or up) ---------- */
	const split = node => {
		[...node.childNodes].forEach(n => {
			if (n.nodeType === 3) {
				const parts = n.textContent.split(/(\s+)/);
				const frag = document.createDocumentFragment();
				parts.forEach(p => {
					if (!p) return;
					if (/^\s+$/.test(p)) { frag.appendChild(document.createTextNode(' ')); return; }
					const w = document.createElement('span'); w.className = 'lw';
					const inner = document.createElement('span'); inner.className = 'lwi'; inner.textContent = p;
					w.appendChild(inner); frag.appendChild(w);
				});
				n.replaceWith(frag);
			} else if (n.nodeType === 1 && n.tagName !== 'BR') {
				split(n);
			}
		});
	};
	document.querySelectorAll('.lh-main h1, .lh-main h2').forEach(h => {
		if (h.closest('.lh-hero-copy') || h.closest('.lh-ui')) return;
		h.classList.remove('lh-r-mask');
		split(h);
		gsap.fromTo(h.querySelectorAll('.lwi'), { yPercent: 115, rotate: 4 }, {
			yPercent: 0, rotate: 0, duration: 1, stagger: .045, ease: 'power4.out',
			scrollTrigger: { trigger: h, start: 'top 88%', end: 'bottom 6%', toggleActions: 'play reverse play reverse' },
		});
	});

	/* ---------- one gradient flows through the whole phrase, not word by word ---------- */
	const grads = [...document.querySelectorAll('.lh-main h1 em, .lh-main h2 em')].filter(em => em.querySelector('.lw'));
	const tweens = [];
	const layoutGrad = () => {
		tweens.splice(0).forEach(t => t.kill());
		grads.forEach(em => {
			const ws = [...em.querySelectorAll('.lw')];
			const rs = ws.map(w => w.getBoundingClientRect());
			const left = Math.min(...rs.map(r => r.left)), width = Math.max(...rs.map(r => r.right)) - left;
			const tile = Math.round(width * 2);
			em.classList.add('is-grad');
			em.style.setProperty('--gw', tile + 'px');
			ws.forEach((w, k) => w.firstElementChild.style.setProperty('--gx', Math.round(rs[k].left - left) + 'px'));
			tweens.push(gsap.fromTo(em, { '--gs': '0px' }, { '--gs': tile + 'px', duration: 7, ease: 'none', repeat: -1 }));
		});
	};
	if (grads.length) {
		layoutGrad();
		let rt; addEventListener('resize', () => { clearTimeout(rt); rt = setTimeout(layoutGrad, 200); });
		if (document.fonts) document.fonts.ready.then(layoutGrad);
	}

	/* ---------- mockups float in ---------- */
	gsap.utils.toArray('.lh-ui-feed, .lh-ui-funnel, .lh-ui-stage, .lh-ui-flow').forEach(el => gsap.fromTo(el, { y: 60, opacity: 0, rotateX: 8, transformPerspective: 1200 }, {
		y: 0, opacity: 1, rotateX: 0, duration: 1.2, ease: 'power3.out',
		scrollTrigger: { trigger: el, start: 'top 92%', end: 'bottom 4%', toggleActions: 'play reverse play reverse' },
	}));
	const feed = document.querySelector('.lh-ui-feed .lh-ui-win');
	if (feed && fine) gsap.to(feed, { y: -40, ease: 'none', scrollTrigger: { trigger: feed, start: 'top 60%', end: 'bottom top', scrub: true } });

	/* ---------- guarantees: the timeline fills with the scroll, the counter follows ---------- */
	document.querySelectorAll('.lh-ui-timeline').forEach(tl => {
		const marks = tl.querySelectorAll('.lh-tl-marks li'), b = tl.querySelector('.lh-tl-count b'), end = +b.dataset.count;
		const stops = [0, .26, 1];
		if (matchMedia('(max-width: 820px)').matches) stops[1] = .42;
		ScrollTrigger.create({
			trigger: tl, start: 'top 85%', end: 'top 30%', scrub: .6,
			onUpdate(self) {
				const p = self.progress;
				tl.style.setProperty('--p', p.toFixed(3));
				marks.forEach((m, k) => m.classList.toggle('is-hit', p >= stops[k] - .001 && p > 0));
				b.textContent = Math.round(Math.max(0, (p - stops[1]) / (1 - stops[1])) * end);
			},
		});
	});

	/* ---------- price: spots fill one by one ---------- */
	document.querySelectorAll('.lh-spots-bar').forEach(bar => gsap.fromTo(bar.children, { scaleX: 0 }, {
		scaleX: 1, duration: .5, stagger: .12, ease: 'power2.out',
		scrollTrigger: { trigger: bar, start: 'top 90%', toggleActions: 'play reverse play reverse' },
	}));

	/* ---------- magnetic buttons ---------- */
	if (fine) {
		document.querySelectorAll('.lh-main .wp-block-button__link, .lh-nav-cta .wp-block-button__link').forEach(btn => {
			const x = gsap.quickTo(btn, 'x', { duration: .5, ease: 'power3.out' }), y = gsap.quickTo(btn, 'y', { duration: .5, ease: 'power3.out' });
			btn.addEventListener('pointermove', e => {
				const r = btn.getBoundingClientRect();
				x((e.clientX - r.left - r.width / 2) * .25); y((e.clientY - r.top - r.height / 2) * .35);
			});
			btn.addEventListener('pointerleave', () => { x(0); y(0); });
		});
	}
})();
