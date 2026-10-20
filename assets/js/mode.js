/* Luis Henao: light / dark switch. The initial mode is set in <head> (functions.php);
   this keeps the button in sync, saves the visitor's choice and follows the device until they pick one. */
(function () {
	const root = document.documentElement;
	const dark = matchMedia('(prefers-color-scheme: dark)');
	const saved = () => { try { return localStorage.getItem('lh-theme'); } catch (e) { return null; } };
	const sync = () => document.querySelectorAll('.lh-mode').forEach(b => {
		const isDark = root.dataset.theme === 'dark';
		b.setAttribute('aria-pressed', String(isDark));
		const en = root.lang.startsWith('en');
		b.setAttribute('aria-label', isDark ? (en ? 'Switch to light mode' : 'Cambiar a modo claro') : (en ? 'Switch to dark mode' : 'Cambiar a modo oscuro'));
	});
	document.addEventListener('click', e => {
		if (!e.target.closest('.lh-mode')) return;
		root.dataset.theme = root.dataset.theme === 'dark' ? 'light' : 'dark';
		try { localStorage.setItem('lh-theme', root.dataset.theme); } catch (err) {}
		sync();
	});
	dark.addEventListener('change', () => { if (!saved()) { root.dataset.theme = dark.matches ? 'dark' : 'light'; sync(); } });
	sync();
})();
