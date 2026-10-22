/* Wound landing: mobile action bar after the hero, and the placeholder form until GHL is embedded. */
(function () {
	const d = document;

	const bar = d.querySelector('.wt-sticky');
	const hero = d.querySelector('.wt-hero');
	const final = d.getElementById('evaluation');
	if (bar && hero && 'IntersectionObserver' in window) {
		let pastHero = false, atForm = false;
		const sync = () => bar.classList.toggle('is-on', pastHero && !atForm);
		new IntersectionObserver(([e]) => { pastHero = !e.isIntersecting; sync(); }).observe(hero);
		if (final) new IntersectionObserver(([e]) => { atForm = e.isIntersecting; sync(); }, { threshold: 0.15 }).observe(final);
	}

	const form = d.getElementById('wt-form');
	if (form) {
		form.addEventListener('submit', e => {
			e.preventDefault();
			let ok = true;
			form.querySelectorAll('[required]').forEach(i => {
				const bad = !i.value.trim();
				i.setAttribute('aria-invalid', bad ? 'true' : 'false');
				if (bad && ok) { i.focus(); ok = false; }
			});
			if (ok) form.querySelector('.wt-form__msg').hidden = false;
		});
	}
})();
