/* Luis Henao: mobile menu and back-to-top button. No dependencies, so both work even if GSAP never loads.
   The mobile menu is built from the header's own links, CTA, language and color switches: one source, no duplicate markup. */
(function () {
	const d = document, root = d.documentElement;
	const en = root.lang.startsWith('en');
	const t = en
		? { open: 'Open menu', close: 'Close menu', nav: 'Mobile menu', top: 'Back to top' }
		: { open: 'Abrir menú', close: 'Cerrar menú', nav: 'Menú móvil', top: 'Volver arriba' };

	/* ---------- mobile menu ---------- */
	const nav = d.querySelector('.lh-nav');
	if (nav) {
		const btn = d.createElement('button');
		btn.type = 'button';
		btn.className = 'lh-burger';
		btn.setAttribute('aria-controls', 'lh-mnav');
		btn.setAttribute('aria-expanded', 'false');
		btn.setAttribute('aria-label', t.open);
		btn.innerHTML = '<span></span><span></span>';
		nav.appendChild(btn);

		const links = [...nav.querySelectorAll('.lh-menu a')]
			.map(a => `<a href="${a.getAttribute('href')}">${a.textContent.trim()}</a>`).join('');
		const tools = [nav.querySelector('.lh-lang'), nav.querySelector('.lh-mode')]
			.filter(Boolean).map(n => n.outerHTML).join('');
		const cta = nav.querySelector('.lh-nav-cta a');

		const panel = d.createElement('div');
		panel.id = 'lh-mnav';
		panel.className = 'lh-mnav';
		panel.hidden = true;
		panel.innerHTML = `<nav aria-label="${t.nav}">${links}</nav>`
			+ (tools ? `<div class="lh-mnav-tools">${tools}</div>` : '')
			+ (cta ? `<a class="lh-mnav-cta" href="${cta.getAttribute('href')}">${cta.textContent.trim()}</a>` : '');
		d.body.appendChild(panel);

		const set = open => {
			btn.setAttribute('aria-expanded', String(open));
			btn.setAttribute('aria-label', open ? t.close : t.open);
			panel.hidden = !open;
			root.classList.toggle('lh-menu-open', open);
			if (open) {
				const first = panel.querySelector('a');
				if (first) first.focus({ preventScroll: true });
			}
		};
		btn.addEventListener('click', () => set(btn.getAttribute('aria-expanded') !== 'true'));
		panel.addEventListener('click', e => { if (e.target.closest('a')) set(false); });
		d.addEventListener('keydown', e => {
			if (e.key === 'Escape' && !panel.hidden) { set(false); btn.focus(); }
		});
		// back on desktop width, the regular menu is visible again
		matchMedia('(min-width: 821px)').addEventListener('change', e => { if (e.matches) set(false); });
	}

	/* ---------- back to top ---------- */
	const top = d.createElement('button');
	top.type = 'button';
	top.className = 'lh-top';
	top.setAttribute('aria-label', t.top);
	top.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 19V5M5 12l7-7 7 7"/></svg>';
	d.body.appendChild(top);
	const onScroll = () => top.classList.toggle('is-on', scrollY > 700);
	addEventListener('scroll', onScroll, { passive: true });
	onScroll();
	top.addEventListener('click', () => {
		const smooth = !matchMedia('(prefers-reduced-motion: reduce)').matches;
		scrollTo({ top: 0, behavior: smooth ? 'smooth' : 'auto' });
	});
})();
