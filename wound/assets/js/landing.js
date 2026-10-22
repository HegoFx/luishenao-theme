/* Wound HBOT landing: oxygen particles, smooth scroll, scroll scenes, self-check and the placeholder form.
   GSAP + ScrollTrigger and Lenis load from assets/vendor. Without them (or with reduced motion) every
   section stays visible and usable: html.wt-js is only set when motion runs (see functions.php). */
(function () {
	const d = document, root = d.documentElement;
	const $ = (s, el = d) => el.querySelector(s), $$ = (s, el = d) => [...el.querySelectorAll(s)];
	const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
	const fine = matchMedia('(pointer: fine)').matches;
	const G = window.gsap, ST = window.ScrollTrigger;
	const motion = !reduce && G && ST;
	if (!motion) root.classList.remove('wt-js');

	/* Oxygen particles: soft bubbles rising, pushed away by the pointer. Paused off screen. */
	function oxygen(canvas) {
		const ctx = canvas.getContext('2d');
		let w = 0, h = 0, dpr = 1, parts = [], running = false, raf = 0;
		const mouse = { x: -999, y: -999 };
		const make = () => {
			const n = Math.round(Math.min(110, (w * h) / 14000));
			parts = Array.from({ length: n }, () => ({
				x: Math.random() * w, y: Math.random() * h,
				r: Math.random() < 0.12 ? 2 + Math.random() * 5 : 0.6 + Math.random() * 2.2,
				v: 0.15 + Math.random() * 0.55, ph: Math.random() * 6.28,
				red: Math.random() < 0.08, a: 0.25 + Math.random() * 0.6,
			}));
		};
		const size = () => {
			const r = canvas.getBoundingClientRect();
			dpr = Math.min(2, window.devicePixelRatio || 1);
			w = r.width; h = r.height;
			canvas.width = w * dpr; canvas.height = h * dpr;
			ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
			make();
		};
		const draw = (t) => {
			ctx.clearRect(0, 0, w, h);
			for (const p of parts) {
				if (!reduce) {
					p.y -= p.v; p.x += Math.sin(t / 1400 + p.ph) * 0.25;
					const dx = p.x - mouse.x, dy = p.y - mouse.y, dist = Math.hypot(dx, dy);
					if (dist < 130) { const f = (130 - dist) / 130; p.x += (dx / dist) * f * 3; p.y += (dy / dist) * f * 3; }
					if (p.y < -10) { p.y = h + 10; p.x = Math.random() * w; }
				}
				ctx.beginPath();
				ctx.arc(p.x, p.y, p.r, 0, 6.283);
				if (p.r > 2) {
					ctx.strokeStyle = p.red ? `rgba(239,68,68,${p.a})` : `rgba(207,224,245,${p.a * 0.7})`;
					ctx.lineWidth = 1; ctx.stroke();
				} else {
					ctx.fillStyle = p.red ? `rgba(239,68,68,${p.a})` : `rgba(207,224,245,${p.a})`;
					ctx.fill();
				}
			}
		};
		const loop = (t) => { draw(t); if (running) raf = requestAnimationFrame(loop); };
		size();
		draw(0);
		if (reduce) return;
		addEventListener('resize', () => { size(); draw(0); });
		canvas.parentElement.addEventListener('pointermove', e => { const r = canvas.getBoundingClientRect(); mouse.x = e.clientX - r.left; mouse.y = e.clientY - r.top; });
		canvas.parentElement.addEventListener('pointerleave', () => { mouse.x = mouse.y = -999; });
		new IntersectionObserver(([e]) => {
			running = e.isIntersecting;
			cancelAnimationFrame(raf);
			if (running) raf = requestAnimationFrame(loop);
		}).observe(canvas);
	}
	$$('.wt-o2').forEach(oxygen);

	/* Smooth scroll on desktop pointers, synced with ScrollTrigger. */
	let lenis = null;
	if (motion && window.Lenis && fine) {
		lenis = new Lenis({ lerp: 0.09, smoothWheel: true });
		lenis.on('scroll', ST.update);
		G.ticker.add(t => lenis.raf(t * 1000));
		G.ticker.lagSmoothing(0);
	}
	$$('a[href^="#"]').forEach(a => a.addEventListener('click', e => {
		const id = a.getAttribute('href');
		const t = id.length > 1 && $(id);
		if (!t) return;
		e.preventDefault();
		if (lenis) lenis.scrollTo(t, { offset: -90 });
		else t.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth' });
		if (id === '#evaluation') setTimeout(() => $('#wt-form input')?.focus({ preventScroll: true }), lenis ? 1200 : 600);
	}));

	/* Header: hides while scrolling down, comes back on the way up. */
	const header = $('.wt-header');
	let lastY = scrollY;
	addEventListener('scroll', () => {
		const y = scrollY;
		if (Math.abs(y - lastY) < 6) return;
		header?.classList.toggle('is-hidden', y > 200 && y > lastY);
		lastY = y;
	}, { passive: true });

	/* Mobile action bar: after the hero, hidden again at the form. */
	const bar = $('.wt-sticky'), hero = $('.wt-hero'), final = $('#evaluation');
	if (bar && hero && 'IntersectionObserver' in window) {
		let pastHero = false, atForm = false;
		const sync = () => bar.classList.toggle('is-on', pastHero && !atForm);
		new IntersectionObserver(([e]) => { pastHero = !e.isIntersecting; sync(); }).observe(hero);
		if (final) new IntersectionObserver(([e]) => { atForm = e.isIntersecting; sync(); }, { threshold: 0.15 }).observe(final);
	}

	/* Self-check: count what applies and change the message. Nothing leaves the browser. */
	const result = $('.wt-check__result');
	if (result) {
		const boxes = $$('[data-check]'), count = $('[data-check-count]'), msg = $('p', result);
		const update = () => {
			const n = boxes.filter(b => b.checked).length;
			if (motion) G.fromTo(count, { yPercent: n > +count.textContent ? 40 : -40, opacity: 0 }, { yPercent: 0, opacity: 1, duration: 0.4, ease: 'back.out(2)' });
			count.textContent = n;
			result.classList.toggle('is-some', n > 0);
			msg.textContent = n > 0 ? result.dataset.some : result.dataset.none;
		};
		boxes.forEach(b => b.addEventListener('change', update));
	}

	/* Placeholder form until the GoHighLevel embed replaces it. */
	const form = $('#wt-form');
	form?.addEventListener('submit', e => {
		e.preventDefault();
		let ok = true;
		$$('[required]', form).forEach(i => {
			const bad = !i.value.trim();
			i.setAttribute('aria-invalid', bad ? 'true' : 'false');
			if (bad && ok) { i.focus(); ok = false; }
		});
		if (ok) $('.wt-form__msg', form).hidden = false;
	});

	if (!motion) return;
	G.registerPlugin(ST);
	const mm = G.matchMedia();

	/* Hero entrance */
	G.timeline({ defaults: { ease: 'expo.out' } })
		.to('.wt-hero__title .wt-w', { opacity: 1, y: 0, rotate: 0, duration: 1.2, stagger: 0.06 }, 0.15)
		.to('.wt-hero [data-rise]', { opacity: 1, y: 0, duration: 1.1, stagger: 0.08 }, 0.55);
	G.to('.wt-doc__frame img', { scale: 1, yPercent: 6, ease: 'none', scrollTrigger: { trigger: '.wt-hero', start: 'top top', end: 'bottom top', scrub: true } });
	G.to('.wt-hero__in', { yPercent: -8, opacity: 0.3, ease: 'none', scrollTrigger: { trigger: '.wt-hero', start: 'center top', end: 'bottom top', scrub: true } });

	/* Generic reveals */
	$$('[data-reveal]').forEach(el => G.to(el, { opacity: 1, y: 0, duration: 1.1, ease: 'expo.out', scrollTrigger: { trigger: el, start: 'top 85%' } }));

	/* Statement fills word by word */
	const sw = $$('.wt-statement__text .wt-w');
	if (sw.length) ST.create({
		trigger: '.wt-statement__text', start: 'top 80%', end: 'bottom 45%', scrub: true,
		onUpdate: s => { const k = s.progress * sw.length; sw.forEach((w, i) => { w.style.opacity = Math.max(0.14, Math.min(1, k - i + 0.6)); }); },
	});

	/* Program flow: the line draws, nodes pop */
	G.to('.wt-flow__line i', { scaleX: 1, ease: 'none', scrollTrigger: { trigger: '.wt-flow', start: 'top 80%', end: 'top 40%', scrub: true } });
	G.from('.wt-flow__node', { y: 40, opacity: 0, duration: 0.9, stagger: 0.15, ease: 'expo.out', scrollTrigger: { trigger: '.wt-flow', start: 'top 85%' } });

	/* HBOT: oxygen meter from room air (21%) to the chamber (100%) */
	const val = $('[data-o2]'), label = $('[data-o2-label]'), fill = $('.wt-meter__fill');
	const stages = $$('.wt-stage');
	const o2 = { v: 21 };
	const paint = () => {
		val.textContent = Math.round(o2.v);
		label.textContent = o2.v < 60 ? label.dataset.air : label.dataset.chamber;
	};
	G.set(fill, { scaleY: 0.21 });
	paint();
	mm.add('(min-width: 960px)', () => {
		const sec = $('.wt-hbot');
		sec.classList.add('is-pinned');
		const tl = G.timeline({
			scrollTrigger: {
				trigger: '.wt-hbot__pin', start: 'top top', end: '+=180%', pin: true, scrub: 0.6,
				onUpdate: s => { const i = Math.min(stages.length - 1, Math.floor(s.progress * stages.length)); stages.forEach((st, j) => st.classList.toggle('is-on', j === i)); },
			},
		});
		tl.to(o2, { v: 100, ease: 'power1.inOut', onUpdate: paint, duration: 1 }, 0)
			.to(fill, { scaleY: 1, ease: 'power1.inOut', duration: 1 }, 0)
			.from('.wt-meter__orb', { scale: 0.86, duration: 1, ease: 'none' }, 0);
		return () => sec.classList.remove('is-pinned');
	});
	mm.add('(max-width: 959px)', () => {
		const tl = G.timeline({ scrollTrigger: { trigger: '.wt-meter', start: 'top 70%' } });
		tl.to(o2, { v: 100, duration: 2.2, ease: 'power2.inOut', onUpdate: paint }, 0).to(fill, { scaleY: 1, duration: 2.2, ease: 'power2.inOut' }, 0);
	});

	/* Conditions: horizontal track on wide screens */
	mm.add('(min-width: 1100px)', () => {
		const sec = $('.wt-when'), track = $('.wt-when__track');
		sec.classList.add('is-h');
		const dist = () => Math.max(0, track.scrollWidth - innerWidth);
		const tween = G.to(track, {
			x: () => -dist(), ease: 'none',
			scrollTrigger: { trigger: '.wt-when__pin', start: 'top top', end: () => '+=' + dist(), pin: true, scrub: 0.6, invalidateOnRefresh: true },
		});
		G.to('.wt-when__bar i', { scaleX: 1, ease: 'none', scrollTrigger: { trigger: '.wt-when__pin', start: 'top top', end: () => '+=' + dist(), scrub: true } });
		$$('.wt-cond').forEach(card => G.from(card.querySelector('.wt-cond__num'), { xPercent: 40, opacity: 0, ease: 'none', scrollTrigger: { trigger: card, containerAnimation: tween, start: 'left 95%', end: 'left 55%', scrub: true } }));
		return () => sec.classList.remove('is-h');
	});
	mm.add('(max-width: 1099px)', () => {
		G.from('.wt-cond', { y: 50, opacity: 0, duration: 0.9, stagger: 0.12, ease: 'expo.out', scrollTrigger: { trigger: '.wt-when__track', start: 'top 80%' } });
	});

	/* Self-check items cascade in */
	G.from('.wt-check__list li', { x: 40, opacity: 0, duration: 0.8, stagger: 0.08, ease: 'expo.out', scrollTrigger: { trigger: '.wt-check__box', start: 'top 80%' } });

	/* Marquee speeds up while scrolling */
	const row = $('.wt-marquee__row');
	if (row) ST.create({ trigger: '.wt-band', start: 'top bottom', end: 'bottom top', onUpdate: s => { row.style.animationDuration = Math.max(10, 38 - Math.abs(s.getVelocity()) / 60) + 's'; } });

	/* Steps: progress bar and earlier cards settle back as the next one arrives */
	G.to('.wt-steps__progress i', { scaleX: 1, ease: 'none', scrollTrigger: { trigger: '.wt-steps', start: 'top 60%', end: 'bottom 70%', scrub: true } });
	const cards = $$('.wt-steps li');
	cards.forEach((card, i) => {
		if (i === cards.length - 1) return;
		G.to(card, { scale: 0.94, filter: 'brightness(.97)', ease: 'none', scrollTrigger: { trigger: cards[i + 1], start: 'top 80%', end: 'top 30%', scrub: true } });
	});

	/* Paths converge into one plan */
	const paths = $$('.wt-paths__lines path');
	paths.forEach(p => { p.setAttribute('pathLength', '1'); p.style.strokeDashoffset = 1; });
	G.to(paths, { strokeDashoffset: 0, duration: 1.2, stagger: 0.15, ease: 'power2.inOut', scrollTrigger: { trigger: '.wt-paths', start: 'top 75%' } });
	G.from('.wt-paths__plan', { scale: 0.6, opacity: 0, duration: 0.8, delay: 0.9, ease: 'back.out(1.8)', scrollTrigger: { trigger: '.wt-paths', start: 'top 75%' } });

	/* Final title lights up */
	G.to('.wt-final__title .wt-w', { opacity: 1, stagger: 0.05, ease: 'none', scrollTrigger: { trigger: '.wt-final__title', start: 'top 85%', end: 'bottom 55%', scrub: true } });
	G.from('.wt-form', { y: 60, opacity: 0, duration: 1.1, ease: 'expo.out', scrollTrigger: { trigger: '.wt-form', start: 'top 90%' } });

	/* Magnetic buttons */
	if (fine) $$('[data-magnetic]').forEach(btn => {
		const xTo = G.quickTo(btn, 'x', { duration: 0.5, ease: 'power3.out' }), yTo = G.quickTo(btn, 'y', { duration: 0.5, ease: 'power3.out' });
		btn.addEventListener('pointermove', e => { const r = btn.getBoundingClientRect(); xTo((e.clientX - r.left - r.width / 2) * 0.25); yTo((e.clientY - r.top - r.height / 2) * 0.35); });
		btn.addEventListener('pointerleave', () => { xTo(0); yTo(0); });
	});

	addEventListener('load', () => ST.refresh());
})();
