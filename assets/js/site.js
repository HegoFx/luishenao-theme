/* Luis Henao: motion shared by every page.
   Reveal classes (add them to any block under Advanced → Additional CSS class):
   lh-r (fade up) · lh-r-mask (title wipe) · lh-r-card (card lift) · lh-r-img (image opens) · lh-parallax (image drift) */
(function () {
	const { gsap, ScrollTrigger } = window;
	if (!gsap || !ScrollTrigger) return;
	gsap.registerPlugin(ScrollTrigger);

	const motion = document.documentElement.classList.contains('lh-js');
	window.LH = { motion };

	/* giant names: split into words (keeps kerning) and scale to fill the line edge to edge */
	const giants = [...document.querySelectorAll('.lh-wordmark, .lh-giant')];
	giants.forEach(el => {
		el.innerHTML = el.textContent.trim().split(/\s+/).map(w => `<span class="w">${w}</span>`).join('<span class="w">&nbsp;</span>');
	});
	function fit() {
		giants.forEach(el => {
			el.style.fontSize = '100px';
			const w = [...el.children].reduce((a, s) => a + s.getBoundingClientRect().width, 0);
			if (w) el.style.fontSize = (100 * el.clientWidth / w * .995) + 'px';
		});
	}
	fit();
	document.fonts && document.fonts.ready.then(() => { fit(); ScrollTrigger.refresh(); });
	addEventListener('resize', fit);
	LH.fit = fit;

	/* marquee: duplicate the line so it loops seamlessly */
	document.querySelectorAll('.lh-marquee').forEach(el => {
		const items = el.textContent.split('·').map(t => t.trim()).filter(Boolean);
		const row = items.map(t => `${t} <i></i>`).join(' ');
		el.innerHTML = `<span class="track" aria-hidden="true"><span>${row}</span><span>${row}</span></span><span class="screen-reader-text">${items.join(', ')}</span>`;
	});

	if (!motion) return;

	/* reveals: play when entering from below or above, reverse when leaving */
	const variants = {
		'lh-r':      [{ opacity: 0, y: 36 }, { opacity: 1, y: 0, duration: .9, ease: 'power3.out' }],
		'lh-r-mask': [{ clipPath: 'inset(0 0 100% 0)', y: 50 }, { clipPath: 'inset(0 0 -15% 0)', y: 0, duration: 1.1, ease: 'power4.out' }],
		'lh-r-card': [{ opacity: 0, y: 70, scale: .96, rotate: .6 }, { opacity: 1, y: 0, scale: 1, rotate: 0, duration: 1, ease: 'power3.out' }],
		'lh-r-img':  [{ clipPath: 'inset(18% 10% 18% 10% round 18px)' }, { clipPath: 'inset(0% 0% 0% 0% round 18px)', duration: 1.3, ease: 'power3.inOut' }],
	};
	const both = { start: 'top 90%', end: 'bottom 8%', toggleActions: 'play reverse play reverse' };
	Object.keys(variants).forEach(cls => {
		document.querySelectorAll('.' + cls).forEach(el => {
			const [from, to] = variants[cls];
			const sibs = [...el.parentElement.children].filter(c => /\blh-r/.test(c.className));
			gsap.fromTo(el, from, { ...to, delay: Math.max(0, sibs.indexOf(el)) * .08, scrollTrigger: { trigger: el, ...both } });
		});
	});
	document.querySelectorAll('.lh-r-img img').forEach(img => gsap.fromTo(img, { scale: 1.3 }, {
		scale: img.closest('.lh-why-img') ? 1.12 : 1, duration: 1.4, ease: 'power3.out', scrollTrigger: { trigger: img, ...both } }));

	/* parallax drift on hero images of interior pages */
	document.querySelectorAll('.lh-parallax img').forEach(img => gsap.fromTo(img, { yPercent: -8 }, { yPercent: 0, ease: 'none',
		scrollTrigger: { trigger: img.parentElement, start: 'top bottom', end: 'bottom top', scrub: true } }));
	document.querySelectorAll('.lh-why-img img').forEach(img => gsap.to(img, { yPercent: -8, ease: 'none',
		scrollTrigger: { trigger: '.lh-why', start: 'top bottom', end: 'bottom top', scrub: true } }));

	/* prices count up each time they come into view */
	document.querySelectorAll('.lh-amt').forEach(el => {
		const m = el.textContent.match(/([^\d]*)([\d,]+)/);
		if (!m) return;
		const pre = m[1], end = parseInt(m[2].replace(/,/g, ''), 10), o = { v: 0 };
		const run = () => gsap.fromTo(o, { v: 0 }, { v: end, duration: 1.4, ease: 'power3.out', onUpdate: () => el.textContent = pre + Math.round(o.v).toLocaleString('en-US') });
		ScrollTrigger.create({ trigger: el, start: 'top 88%', end: 'bottom 10%', onEnter: run, onEnterBack: run });
	});

	/* footer name rises word by word */
	document.querySelectorAll('.lh-giant').forEach(el => gsap.fromTo(el.children, { yPercent: 100 }, { yPercent: 0, stagger: .06, duration: 1, ease: 'power4.out',
		scrollTrigger: { trigger: el, start: 'top 98%', toggleActions: 'play none play reverse' } }));

	/* pain cards draw their top rule */
	document.querySelectorAll('.lh-pain').forEach(el => gsap.fromTo(el, { borderTopColor: 'rgba(18,17,16,0)' }, { borderTopColor: 'rgba(18,17,16,1)', duration: .8,
		scrollTrigger: { trigger: el, start: 'top 90%', toggleActions: 'play reverse play reverse' } }));

	addEventListener('load', () => ScrollTrigger.refresh());
})();
