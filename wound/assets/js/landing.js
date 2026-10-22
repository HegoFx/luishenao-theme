/* Wound HBOT landing v3: oxygen particles, smooth scroll, scroll scenes (enter and exit), zoom through O₂,
   split-flap board, live office status, custom cursor, self-check and the placeholder form.
   GSAP + ScrollTrigger and Lenis load from assets/vendor. Without them (or with reduced motion) every
   section stays visible and usable: html.wt-js is only set when motion runs (see functions.php). */
(function () {
	const d = document, root = d.documentElement;
	const $ = (s, el = d) => el.querySelector(s), $$ = (s, el = d) => [...el.querySelectorAll(s)];
	const clamp = (v, a = 0, b = 1) => Math.min(b, Math.max(a, v));
	const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
	const fine = matchMedia('(pointer: fine)').matches;
	const G = window.gsap, ST = window.ScrollTrigger;
	const motion = !reduce && G && ST;
	if (!motion) root.classList.remove('wt-js');

	/* Live office status in Orlando time (Mon to Fri, 8 AM to 5 PM). */
	const status = () => $$('[data-status]').forEach(el => {
		const tz = el.dataset.tz, lang = el.dataset.lang === 'es' ? 'es-US' : 'en-US';
		const now = new Date(new Date().toLocaleString('en-US', { timeZone: tz }));
		const h = now.getHours() + now.getMinutes() / 60, day = now.getDay();
		const open = day >= 1 && day <= 5 && h >= 8 && h < 17;
		const t = new Date().toLocaleTimeString(lang, { hour: 'numeric', minute: '2-digit', timeZone: tz });
		const parts = [open ? el.dataset.open : el.dataset.closed, t];
		if (el.dataset.suffix) parts.push(el.dataset.suffix);
		if (!open && el.dataset.note) parts.push(el.dataset.note);
		$('.wt-status__t', el).textContent = parts.join(' · ');
		el.classList.toggle('is-open', open);
		el.hidden = false;
	});
	status();
	setInterval(status, 60000);

	/* Oxygen particles: soft bubbles rising, pushed away by the pointer. Paused off screen. */
	function oxygen(canvas) {
		const ctx = canvas.getContext('2d');
		let w = 0, h = 0, parts = [], running = false, raf = 0;
		const mouse = { x: -999, y: -999 };
		const size = () => {
			const r = canvas.getBoundingClientRect(), dpr = Math.min(2, window.devicePixelRatio || 1);
			w = r.width; h = r.height;
			canvas.width = w * dpr; canvas.height = h * dpr;
			ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
			parts = Array.from({ length: Math.round(Math.min(110, (w * h) / 14000)) }, () => ({
				x: Math.random() * w, y: Math.random() * h,
				r: Math.random() < 0.12 ? 2 + Math.random() * 5 : 0.6 + Math.random() * 2.2,
				v: 0.15 + Math.random() * 0.55, ph: Math.random() * 6.28, red: Math.random() < 0.08, a: 0.25 + Math.random() * 0.6,
			}));
		};
		const draw = t => {
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
				const c = p.red ? `rgba(239,68,68,${p.a})` : `rgba(207,224,245,${p.r > 2 ? p.a * 0.7 : p.a})`;
				if (p.r > 2) { ctx.strokeStyle = c; ctx.lineWidth = 1; ctx.stroke(); } else { ctx.fillStyle = c; ctx.fill(); }
			}
		};
		const loop = t => { draw(t); if (running) raf = requestAnimationFrame(loop); };
		size(); draw(0);
		if (reduce) return;
		addEventListener('resize', () => { size(); draw(0); });
		canvas.parentElement.addEventListener('pointermove', e => { const r = canvas.getBoundingClientRect(); mouse.x = e.clientX - r.left; mouse.y = e.clientY - r.top; });
		canvas.parentElement.addEventListener('pointerleave', () => { mouse.x = mouse.y = -999; });
		new IntersectionObserver(([e]) => { running = e.isIntersecting; cancelAnimationFrame(raf); if (running) raf = requestAnimationFrame(loop); }).observe(canvas);
	}
	$$('.wt-o2').forEach(oxygen);

	/* Split-flap board: cycles its phrases while visible. */
	const GL = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	function flap(el, text) {
		const cs = [...text];
		el.innerHTML = cs.map(ch => `<i class="${ch === ' ' ? 'sp' : ''}">${ch === ' ' ? '&nbsp;' : ''}</i>`).join('');
		[...el.children].forEach((b, i) => {
			if (cs[i] === ' ') return;
			let n = reduce ? 0 : 5 + i * 2;
			const tick = () => { if (n-- <= 0) { b.textContent = cs[i]; return; } b.textContent = GL[Math.random() * GL.length | 0]; setTimeout(tick, 40); };
			tick();
		});
	}
	$$('[data-board]').forEach(el => {
		const phrases = el.dataset.board.split('|'), width = Math.max(...phrases.map(p => p.length));
		let k = 0, timer = 0;
		const show = () => flap(el, phrases[k].padEnd(width));
		show();
		if (reduce) return;
		new IntersectionObserver(([e]) => {
			clearInterval(timer);
			if (e.isIntersecting) { show(); timer = setInterval(() => { k = (k + 1) % phrases.length; show(); }, 3600); }
		}, { threshold: 0.3 }).observe(el);
	});

	/* Smooth scroll on desktop pointers, synced with ScrollTrigger. */
	let lenis = null;
	if (motion && window.Lenis && fine) {
		lenis = new Lenis({ lerp: 0.09, smoothWheel: true });
		lenis.on('scroll', ST.update);
		G.ticker.add(t => lenis.raf(t * 1000));
		G.ticker.lagSmoothing(0);
	}
	$$('a[href^="#"]').forEach(a => a.addEventListener('click', e => {
		const id = a.getAttribute('href'), t = id.length > 1 && $(id);
		if (!t) return;
		e.preventDefault();
		if (lenis) lenis.scrollTo(t, { offset: -90 }); else t.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth' });
		if (id === '#evaluation') setTimeout(() => $('#wt-form input')?.focus({ preventScroll: true }), lenis ? 1400 : 700);
	}));

	/* Header hides while scrolling down; mobile action bar after the hero, hidden at the form. */
	const header = $('.wt-header');
	let lastY = scrollY;
	addEventListener('scroll', () => {
		const y = scrollY;
		if (Math.abs(y - lastY) < 6) return;
		header?.classList.toggle('is-hidden', y > 200 && y > lastY);
		lastY = y;
	}, { passive: true });
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
		boxes.forEach(b => b.addEventListener('change', () => {
			const n = boxes.filter(x => x.checked).length;
			if (motion) G.fromTo(count, { yPercent: n > +count.textContent ? 40 : -40, opacity: 0 }, { yPercent: 0, opacity: 1, duration: 0.4, ease: 'back.out(2)' });
			count.textContent = n;
			result.classList.toggle('is-some', n > 0);
			msg.textContent = n > 0 ? result.dataset.some : result.dataset.none;
		}));
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

	/* Hero: entrance, then the image pushes in and the copy lifts away as you leave */
	G.timeline({ defaults: { ease: 'expo.out' } })
		.from('.wt-hero__media img', { scale: 1.25, duration: 2.4, ease: 'power3.out' }, 0)
		.to('.wt-hero__title .wt-w', { opacity: 1, y: 0, rotate: 0, duration: 1.2, stagger: 0.06 }, 0.2)
		.to('.wt-hero [data-rise]', { opacity: 1, y: 0, duration: 1.1, stagger: 0.08 }, 0.6);
	ST.create({ trigger: '.wt-hero', start: 'top top', end: 'bottom top', onUpdate: s => hero.style.setProperty('--p', s.progress.toFixed(3)) });

	/* Statement fills word by word */
	const sw = $$('.wt-statement__text .wt-w');
	ST.create({
		trigger: '.wt-statement__text', start: 'top 80%', end: 'bottom 45%', scrub: true,
		onUpdate: s => { const k = s.progress * sw.length; sw.forEach((w, i) => { w.style.opacity = Math.max(0.13, Math.min(1, k - i + 0.6)); }); },
	});

	/* Program flow cascades in */
	G.from('.wt-flow li', { x: -40, opacity: 0, duration: 0.9, stagger: 0.12, ease: 'expo.out', scrollTrigger: { trigger: '.wt-flow', start: 'top 85%', toggleActions: 'play none none reverse' } });

	/* Zoom through O₂: the letters are a window onto the bubbles; scroll dives into the ring of the O */
	const zoom = $('.wt-zoom'), zmask = $('.wt-zoom__mask'), zword = $('.wt-zoom__mask span');
	let zMax = 40;
	const zOrigin = () => {
		const cs = getComputedStyle(zword), fs = parseFloat(cs.fontSize);
		const cv = d.createElement('canvas'), cx = cv.getContext('2d', { willReadFrequently: true });
		const font = `${cs.fontWeight} ${fs}px ${cs.fontFamily}`;
		cx.font = font;
		const m = cx.measureText('O'), capH = m.actualBoundingBoxAscent, W = Math.ceil(m.width) + 4, H = Math.ceil(capH) + 4;
		cv.width = W; cv.height = H;
		cx.font = font; cx.fillStyle = '#000'; cx.textBaseline = 'alphabetic';
		cx.fillText('O', 0, H - 2);
		const row = cx.getImageData(0, Math.round(H - 2 - capH / 2), W, 1).data;
		let l = -1, r = -1;
		for (let i = 0; i < W; i++) { if (row[i * 4 + 3] > 128) { if (l < 0) l = i; r = i; } else if (l >= 0) break; }
		const stemW = l < 0 ? fs * 0.14 : r - l + 1, stemC = l < 0 ? fs * 0.1 : (l + r) / 2;
		const fm = cx.measureText('O₂'), asc = fm.fontBoundingBoxAscent || capH, desc = fm.fontBoundingBoxDescent || 0;
		const lh = parseFloat(cs.lineHeight) || fs * 0.8;
		const baseline = zword.offsetTop + (lh - (asc + desc)) / 2 + asc;
		zmask.style.transformOrigin = `${(zword.offsetLeft + stemC).toFixed(1)}px ${(baseline - capH / 2).toFixed(1)}px`;
		zMax = Math.max(innerWidth, innerHeight) * 1.6 / stemW;
	};
	d.fonts.ready.then(zOrigin);
	addEventListener('resize', zOrigin);
	ST.create({
		trigger: zoom, start: 'top top', end: 'bottom bottom', scrub: true,
		onUpdate: s => {
			const p = s.progress, ze = Math.pow(clamp(p / 0.7), 2.4);
			zoom.style.setProperty('--z', (1 + ze * (zMax - 1)).toFixed(3));
			zmask.style.opacity = (1 - clamp((p - 0.45) / 0.3)).toFixed(3);
			zoom.style.setProperty('--o', clamp((p - 0.62) / 0.28).toFixed(3));
		},
	});

	/* HBOT: three stages, images crossfade, oxygen goes from room air (21%) to the chamber (100%) */
	const val = $('[data-o2]'), label = $('[data-o2-label]'), fill = $('.wt-meter__fill');
	const stages = $$('.wt-stage'), imgs = $$('.wt-hbot__imgs img'), hb = $('.wt-hbot');
	const o2 = { v: 21 };
	const paint = () => { val.textContent = Math.round(o2.v); label.textContent = o2.v < 60 ? label.dataset.air : label.dataset.chamber; };
	const stageTo = i => { stages.forEach((s, j) => s.classList.toggle('is-on', j === i)); imgs.forEach((im, j) => im.classList.toggle('is-on', j === i)); };
	G.set(fill, { scaleY: 0.21 });
	paint();
	mm.add('(min-width: 960px)', () => {
		hb.classList.add('is-pinned');
		const tl = G.timeline({
			scrollTrigger: {
				trigger: '.wt-hbot__pin', start: 'top top', end: '+=220%', pin: true, scrub: 0.6,
				onUpdate: s => { hb.style.setProperty('--sp', s.progress.toFixed(3)); stageTo(Math.min(stages.length - 1, Math.floor(s.progress * stages.length))); },
			},
		});
		tl.to(o2, { v: 100, ease: 'power1.inOut', onUpdate: paint, duration: 1 }, 0).to(fill, { scaleY: 1, ease: 'power1.inOut', duration: 1 }, 0);
		return () => hb.classList.remove('is-pinned');
	});
	mm.add('(max-width: 959px)', () => {
		G.timeline({ scrollTrigger: { trigger: '.wt-hbot__visual', start: 'top 70%' } })
			.to(o2, { v: 100, duration: 2.2, ease: 'power2.inOut', onUpdate: paint }, 0).to(fill, { scaleY: 1, duration: 2.2, ease: 'power2.inOut' }, 0);
		stages.forEach((s, i) => ST.create({ trigger: s, start: 'top 60%', end: 'bottom 40%', onToggle: e => e.isActive && stageTo(i) }));
	});

	/* Conditions: horizontal track on wide screens with a live counter */
	mm.add('(min-width: 1100px)', () => {
		const sec = $('.wt-when'), track = $('.wt-when__track'), cnt = $('[data-when-count]'), n = $$('.wt-cond').length;
		sec.classList.add('is-h');
		const dist = () => Math.max(0, track.scrollWidth - innerWidth);
		const tween = G.to(track, {
			x: () => -dist(), ease: 'none',
			scrollTrigger: {
				trigger: '.wt-when__pin', start: 'top top', end: () => '+=' + dist(), pin: true, scrub: 0.6, invalidateOnRefresh: true,
				onUpdate: s => { cnt.textContent = '0' + Math.min(n, 1 + Math.floor(s.progress * n * 0.999)); G.set('.wt-when__bar i', { scaleX: s.progress }); },
			},
		});
		$$('.wt-cond').forEach(card => {
			G.from(card, { y: 80, rotate: 2, opacity: 0.2, ease: 'none', scrollTrigger: { trigger: card, containerAnimation: tween, start: 'left 100%', end: 'left 65%', scrub: true } });
			G.fromTo($('img', card), { scale: 1.3 }, { scale: 1, ease: 'none', scrollTrigger: { trigger: card, containerAnimation: tween, start: 'left 100%', end: 'left 40%', scrub: true } });
		});
		return () => sec.classList.remove('is-h');
	});
	mm.add('(max-width: 1099px)', () => {
		$$('.wt-cond').forEach(card => G.from(card, { y: 60, opacity: 0, duration: 0.9, ease: 'expo.out', scrollTrigger: { trigger: card, start: 'top 88%', toggleActions: 'play none none reverse' } }));
	});

	/* Self-check items cascade in */
	G.from('.wt-check__list li', { x: 40, opacity: 0, duration: 0.8, stagger: 0.08, ease: 'expo.out', scrollTrigger: { trigger: '.wt-check__box', start: 'top 80%', toggleActions: 'play none none reverse' } });

	/* Marquee: drifts on its own and follows the scroll direction and speed */
	const mq = $('.wt-marquee__row');
	if (mq) {
		let mx = 0, vel = 0, dir = 1, py = scrollY;
		G.ticker.add(() => {
			const dy = scrollY - py; py = scrollY;
			if (dy) dir = dy > 0 ? 1 : -1;
			vel += (Math.min(Math.abs(dy), 80) - vel) * 0.1;
			mx -= dir * (0.8 + vel * 0.35);
			const half = mq.scrollWidth / 2;
			if (mx <= -half) mx += half;
			if (mx > 0) mx -= half;
			mq.style.transform = `translate3d(${mx}px,0,0)`;
		});
	}

	/* Steps: earlier cards settle back as the next one arrives */
	const cards = $$('.wt-steps li');
	cards.forEach((card, i) => {
		if (i === cards.length - 1) return;
		G.to(card, { scale: 0.93, ease: 'none', scrollTrigger: { trigger: cards[i + 1], start: 'top 85%', end: 'top 30%', scrub: true } });
	});

	/* Paths converge into one plan */
	const paths = $$('.wt-paths__lines path');
	paths.forEach(p => { p.setAttribute('pathLength', '1'); p.style.strokeDashoffset = 1; });
	G.to(paths, { strokeDashoffset: 0, duration: 1.2, stagger: 0.15, ease: 'power2.inOut', scrollTrigger: { trigger: '.wt-paths', start: 'top 75%', toggleActions: 'play none none reverse' } });
	G.from('.wt-paths__plan', { scale: 0.6, opacity: 0, duration: 0.8, delay: 0.9, ease: 'back.out(1.8)', scrollTrigger: { trigger: '.wt-paths', start: 'top 75%', toggleActions: 'play none none reverse' } });

	/* Location and final: slow parallax backgrounds */
	G.fromTo('.wt-place__media', { yPercent: -8 }, { yPercent: 8, ease: 'none', scrollTrigger: { trigger: '.wt-place', start: 'top bottom', end: 'bottom top', scrub: true } });
	G.fromTo('.wt-final__media img', { scale: 1.2 }, { scale: 1, ease: 'none', scrollTrigger: { trigger: '.wt-final', start: 'top bottom', end: 'top top', scrub: true } });
	G.to('.wt-final__title .wt-w', { opacity: 1, stagger: 0.05, ease: 'none', scrollTrigger: { trigger: '.wt-final__title', start: 'top 85%', end: 'bottom 55%', scrub: true } });
	G.from('.wt-form', { y: 60, opacity: 0, duration: 1.1, ease: 'expo.out', scrollTrigger: { trigger: '.wt-form', start: 'top 90%' } });

	/* Generic reveals, image windows and exits. Created after the pinned scenes so their positions
	   include the pin spacing (ScrollTrigger measures in creation order). */
	/* Reveals: in on the way down, back out on the way up */
	$$('[data-reveal]').forEach(el => G.to(el, { opacity: 1, y: 0, duration: 1.1, ease: 'expo.out', scrollTrigger: { trigger: el, start: 'top 86%', toggleActions: 'play none none reverse' } }));

	/* Images: open from a rounded window on enter, drift on exit */
	$$('[data-io]').forEach(el => {
		const img = $('img', el);
		G.fromTo(el, { clipPath: 'inset(12% 10% 12% 10% round 32px)' }, { clipPath: 'inset(0% 0% 0% 0% round 0px)', ease: 'none', scrollTrigger: { trigger: el, start: 'top bottom', end: 'top 20%', scrub: true } });
		G.fromTo(img, { scale: 1.3, yPercent: -6 }, { scale: 1, yPercent: 6, ease: 'none', scrollTrigger: { trigger: el, start: 'top bottom', end: 'bottom top', scrub: true } });
	});
	$$('.wt-steps__media img').forEach(img => G.fromTo(img, { scale: 1.25 }, { scale: 1, ease: 'none', scrollTrigger: { trigger: img.parentElement, start: 'top bottom', end: 'center center', scrub: true } }));

	/* Exits: section copy lifts and dims as it leaves the top */
	$$('.wt-statement__text, .wt-program__copy, .wt-check .wt-split, .wt-lang__copy, .wt-steps__head, .wt-personal .wt-split, .wt-band__in, .wt-place__card').forEach(el =>
		G.to(el, { y: -60, opacity: 0.35, ease: 'none', scrollTrigger: { trigger: el, start: 'bottom 22%', end: 'bottom -5%', scrub: true } }));

	/* Custom cursor with labels, and magnetic buttons */
	if (fine) {
		const cur = $('.wt-cursor'), curl = $('span', cur);
		root.classList.add('wt-cur-on');
		const xTo = G.quickTo(cur, 'x', { duration: 0.35, ease: 'power3.out' }), yTo = G.quickTo(cur, 'y', { duration: 0.35, ease: 'power3.out' });
		addEventListener('pointermove', e => { xTo(e.clientX); yTo(e.clientY); });
		$$('[data-cur]').forEach(el => {
			el.addEventListener('pointerenter', () => { curl.textContent = el.dataset.cur; cur.classList.add('is-big'); });
			el.addEventListener('pointerleave', () => cur.classList.remove('is-big'));
		});
		$$('[data-magnetic]').forEach(btn => {
			const bx = G.quickTo(btn, 'x', { duration: 0.5, ease: 'power3.out' }), by = G.quickTo(btn, 'y', { duration: 0.5, ease: 'power3.out' });
			btn.addEventListener('pointermove', e => { const r = btn.getBoundingClientRect(); bx((e.clientX - r.left - r.width / 2) * 0.25); by((e.clientY - r.top - r.height / 2) * 0.35); });
			btn.addEventListener('pointerleave', () => { bx(0); by(0); });
		});
	}

	addEventListener('load', () => { zOrigin(); ST.refresh(); });
})();
