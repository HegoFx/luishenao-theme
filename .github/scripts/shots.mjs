// Viewport screenshots of the staging site, scrolling step by step so scroll-driven motion
// shows the way a visitor sees it. Output: shots/<page>-<device>-<nn>.png
import { chromium } from 'playwright';
import { mkdirSync } from 'node:fs';

const base = process.env.SITE_URL.replace(/\/$/, '');
const pages = { home: '/', blog: '/blog/', sobre: '/sobre-mi/', e404: '/no-existe-xyz/' };
const devices = {
	desk: { viewport: { width: 1440, height: 900 } },
	mob: { viewport: { width: 390, height: 844 }, deviceScaleFactor: 2, isMobile: true, hasTouch: true },
};

mkdirSync('shots', { recursive: true });
const browser = await chromium.launch();
for (const [dname, dev] of Object.entries(devices)) {
	const ctx = await browser.newContext(dev);
	// skip the closet-doors intro
	await ctx.addInitScript(() => { try { sessionStorage.setItem('lh-doors', '1'); } catch (e) {} });
	const page = await ctx.newPage();
	const errors = [];
	page.on('pageerror', e => errors.push(String(e)));
	page.on('console', m => m.type() === 'error' && errors.push(m.text()));
	for (const [pname, path] of Object.entries(pages)) {
		await page.goto(base + path, { waitUntil: 'networkidle' });
		await page.waitForTimeout(1500);
		const h = await page.evaluate(() => document.documentElement.scrollHeight);
		const step = Math.round(dev.viewport.height * 0.8);
		let n = 0;
		for (let y = 0; y <= h && n < 60; y += step, n++) {
			await page.evaluate(v => window.scrollTo(0, v), y);
			await page.waitForTimeout(900);
			await page.screenshot({ path: `shots/${pname}-${dname}-${String(n).padStart(2, '0')}.png` });
		}
		console.log(`${pname} ${dname}: height ${h}px, ${n} shots`);
	}
	if (errors.length) console.log(`JS errors (${dname}):\n` + [...new Set(errors)].join('\n'));
	await ctx.close();
}
await browser.close();
