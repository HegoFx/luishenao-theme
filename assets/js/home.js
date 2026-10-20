/* Luis Henao: the home experience.
   1 closet doors intro · 2 live leads · 3 strike statement · 4 closet rod · 5 stacked steps */
(function () {
	const { gsap, ScrollTrigger, LH } = window;
	if (!gsap || !LH) return;
	const root = document.documentElement;
	const isMobile = () => matchMedia('(max-width: 820px)').matches;

	/* ---------- 2. live leads (sample data until GHL feeds real ones) ---------- */
	const leadData = [
		['MG', 'María G.', 'Houston, TX', 'Walk-in · $8k–12k · este mes'],
		['JR', 'José R.', 'Orlando, FL', 'Reach-in x2 · $5k–7k · 30 días'],
		['AL', 'Ashley L.', 'Scottsdale, AZ', 'Walk-in + garage · $12k+ · 60 días'],
		['CP', 'Carlos P.', 'Miami, FL', 'Primary closet · $7k–9k · este mes'],
		['DT', 'Dana T.', 'Austin, TX', 'Walk-in · $9k–11k · 45 días'],
	];
	let leadTimer, li = 0;
	const leadsBox = document.createElement('div');
	leadsBox.className = 'lh-leads';
	leadsBox.setAttribute('aria-hidden', 'true');
	function placeLeads() {
		const fig = document.querySelector(isMobile() ? '.lh-hero-img-m' : '.lh-hero-img');
		if (fig && leadsBox.parentElement !== fig) fig.appendChild(leadsBox);
	}
	function startLeads() {
		if (leadTimer || !document.querySelector('.lh-hero')) return;
		placeLeads();
		addEventListener('resize', placeLeads);
		const push = () => {
			const [ini, n, city, what] = leadData[li++ % leadData.length];
			const el = document.createElement('div');
			el.className = 'lh-lead';
			el.innerHTML = `<div class="av">${ini}</div><div><div class="top"><span>NUEVO LEAD · WHATSAPP</span><span>ahora</span></div>
				<div class="who">${n} · ${city}</div><div class="what"><span class="ok">✓ pre-filtrado</span> · ${what}</div></div>`;
			leadsBox.appendChild(el);
			const cards = [...leadsBox.children], m = isMobile();
			cards.forEach((c, i) => {
				const depth = cards.length - 1 - i;
				gsap.to(c, { y: -depth * (m ? 0 : 82), scale: 1 - depth * (m ? .05 : .04),
					opacity: depth > 2 || (m && depth > 0) ? 0 : 1 - depth * .18, duration: .7, ease: 'power3.out' });
			});
			if (LH.motion) gsap.fromTo(el, { y: 40, opacity: 0 }, { y: 0, opacity: 1, duration: .7, ease: 'back.out(1.4)' });
			if (cards.length > 4) cards[0].remove();
		};
		push();
		leadTimer = setInterval(push, 2600);
	}

	/* ---------- 1. closet doors intro (first visit of the session) ---------- */
	function intro() {
		const covered = root.classList.contains('lh-cover');
		if (!LH.motion || !covered || !document.querySelector('.lh-hero')) { root.classList.remove('lh-cover'); startLeads(); return; }
		const doors = document.createElement('div');
		doors.className = 'lh-doors';
		doors.setAttribute('aria-hidden', 'true');
		doors.innerHTML = '<div class="door l"></div><div class="door r"></div><div class="seam">LUIS HENAO</div>';
		document.body.appendChild(doors);
		root.classList.remove('lh-cover');
		try { sessionStorage.setItem('lh-doors', '1'); } catch (e) {}

		const words = document.querySelectorAll('.lh-wordmark .w');
		const heroImgs = document.querySelectorAll('.lh-hero-stage figure img');
		const copy = document.querySelectorAll('.lh-hero-copy > *');
		gsap.set(words, { yPercent: 110 });
		gsap.set(heroImgs, { scale: 1.18 });
		gsap.set(copy, { y: 24, opacity: 0 });
		gsap.timeline({ defaults: { ease: 'power3.inOut' }, onComplete() { doors.remove(); startLeads(); } })
			.to(doors.querySelector('.seam'), { opacity: 0, duration: .3 }, .45)
			.to(doors.querySelector('.l'), { xPercent: -100, duration: 1.15 }, .55)
			.to(doors.querySelector('.r'), { xPercent: 100, duration: 1.15 }, .55)
			.to(heroImgs, { scale: 1, duration: 1.6, ease: 'power2.out' }, .6)
			.to(words, { yPercent: 0, duration: 1, stagger: .06, ease: 'power4.out' }, .9)
			.to(copy, { y: 0, opacity: 1, duration: .8, stagger: .08, ease: 'power3.out' }, 1.25);
	}

	/* ---------- 3. statement: strike, shrink, then bold ---------- */
	function statement() {
		const box = document.querySelector('.lh-statement');
		if (!box) return;
		const a = box.querySelector('.lh-st-a'), s = a && a.querySelector('s'), b = box.querySelector('.lh-st-b'), hol = box.querySelector('.lh-hol');
		if (!a || !hol) return;
		const fitHol = () => {
			const w0 = hol.style.fontWeight;
			hol.style.fontWeight = 800; hol.style.fontSize = '100px';
			const base = parseFloat(getComputedStyle(box).fontSize);
			hol.style.fontSize = Math.min(base * 1.1, 100 * box.clientWidth / hol.scrollWidth * .98) + 'px';
			hol.style.fontWeight = w0;
		};
		fitHol(); addEventListener('resize', fitHol); document.fonts && document.fonts.ready.then(fitHol);
		if (!LH.motion) { if (s) s.style.setProperty('--s', 1); hol.style.fontWeight = 800; return; }
		gsap.set([b, hol], { opacity: .12 });
		const tl = gsap.timeline({ scrollTrigger: { trigger: box, start: 'top 72%', end: 'top 12%', scrub: .7 } });
		if (s) tl.to(s, { '--s': 1, duration: 1, ease: 'none' });
		tl.to(a, { scale: .46, opacity: .55, duration: 1.1, ease: 'power2.inOut' }, '+=.1')
			.to(a, { marginBottom: () => -a.offsetHeight * .54, duration: 1.1, ease: 'power2.inOut' }, '<')
			.to([b, hol], { opacity: 1, duration: .7 }, '-=.6')
			.to(hol, { fontWeight: 800, duration: 1, ease: 'none' }, '-=.2');
	}

	/* ---------- 4. closet rod ---------- */
	function rod() {
		const sec = document.querySelector('.lh-rod'), track = sec && sec.querySelector('.lh-rod-track');
		if (!track) return;
		const hangers = [...track.querySelectorAll(':scope > .lh-hanger')];
		hangers.forEach(h => h.insertAdjacentHTML('afterbegin', '<span class="hook" aria-hidden="true"></span><span class="shoulders" aria-hidden="true"></span>'));

		const pin = document.createElement('div'); pin.className = 'lh-rod-pin';
		const vp = document.createElement('div'); vp.className = 'lh-rod-vp';
		track.before(pin); vp.innerHTML = '<div class="lh-rod-bar" aria-hidden="true"></div>'; vp.appendChild(track); pin.appendChild(vp);
		pin.insertAdjacentHTML('beforeend', '<div class="lh-rod-progress" aria-hidden="true"><i></i></div><div class="lh-rod-foot"><span>← Scroll →</span><span class="lh-rod-count"></span></div>');
		const bar = pin.querySelector('.lh-rod-progress i'), count = pin.querySelector('.lh-rod-count');
		const set = i => count.textContent = String(i + 1).padStart(2, '0') + ' / ' + String(hangers.length).padStart(2, '0');
		set(0);

		const mm = gsap.matchMedia();
		mm.add('(min-width: 821px)', () => {
			const dist = () => track.scrollWidth - innerWidth;
			const rot = hangers.map(h => gsap.quickTo(h, 'rotation', { duration: .9, ease: 'elastic.out(1, .35)' }));
			let settle;
			gsap.to(track, { x: () => -dist(), ease: 'none', scrollTrigger: {
				trigger: pin, start: 'top top', end: () => '+=' + dist(), pin: true, scrub: .8, invalidateOnRefresh: true,
				onUpdate(self) {
					if (LH.motion) {
						const v = gsap.utils.clamp(-7, 7, self.getVelocity() / -260);
						rot.forEach((q, i) => q(v * (1 + (i % 3) * .15)));
						clearTimeout(settle); settle = setTimeout(() => rot.forEach(q => q(0)), 90);
					}
					bar.style.width = (self.progress * 100) + '%';
					set(Math.min(hangers.length - 1, Math.round(self.progress * (hangers.length - 1))));
				} } });
		});
		mm.add('(max-width: 820px)', () => {
			vp.style.setProperty('--tw', track.scrollWidth + 'px');
			const on = () => set(Math.round(vp.scrollLeft / (vp.scrollWidth - vp.clientWidth || 1) * (hangers.length - 1)));
			vp.addEventListener('scroll', on, { passive: true });
			return () => vp.removeEventListener('scroll', on);
		});
	}

	/* ---------- 5. stacked steps ---------- */
	function stack() {
		if (!LH.motion) return;
		const steps = gsap.utils.toArray('.lh-step');
		gsap.matchMedia().add('(min-width: 821px)', () => {
			steps.forEach((s, i) => {
				if (i === steps.length - 1) return;
				gsap.to(s, { scale: .94 - (steps.length - i) * .01, opacity: .55, ease: 'none',
					scrollTrigger: { trigger: steps[i + 1], start: 'top bottom', end: 'top 160px', scrub: true } });
			});
		});
	}

	intro(); statement(); rod(); stack();
	// site.js created its reveal triggers before the rod pin existed; re-sort by page position so
	// everything below the pin accounts for its extra scroll distance.
	ScrollTrigger.sort();
	ScrollTrigger.refresh();
})();
