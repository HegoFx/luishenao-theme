// Viewport screenshots of the staging site, scrolling step by step so scroll-driven motion
// shows the way a visitor sees it. Output: shots/<page>-<device>-<nn>.png
// Devices run in parallel; PAGES and DEVICES (comma lists, or "all") limit what gets captured.
import { chromium } from 'playwright';
import { mkdirSync } from 'node:fs';

const base = process.env.SITE_URL.replace(/\/$/, '');
const pick = (all, env) => {
	const want = (env || 'all').split(',').map(s => s.trim()).filter(Boolean);
	return want.includes('all') ? all : Object.fromEntries(Object.entries(all).filter(([k]) => want.includes(k)));
};
const pages = pick({ home: '/', blog: '/blog/', sobre: '/sobre-mi/', e404: '/no-existe-xyz/', en: '/en/', enblog: '/en/articles/', enabout: '/en/about/', landing: '/clientes-para-negocios-de-closets/', enlanding: '/en/custom-closet-leads/', post: '/que-es-un-lead/', enpost: '/en/is-angi-leads-worth-it/' }, process.env.PAGES);
const devices = pick({
	desk: { viewport: { width: 1440, height: 900 } },
	mob: { viewport: { width: 390, height: 844 }, deviceScaleFactor: 2, isMobile: true, hasTouch: true },
	// dark mode follows the device setting until the visitor picks one: only the home, to keep runs short
	deskdark: { viewport: { width: 1440, height: 900 }, colorScheme: 'dark', only: ['home'] },
	mobdark: { viewport: { width: 390, height: 844 }, deviceScaleFactor: 2, isMobile: true, hasTouch: true, colorScheme: 'dark', only: ['home'] },
}, process.env.DEVICES);

mkdirSync('shots', { recursive: true });
const browser = await chromium.launch();

async function run(dname, dev) {
	const { only, ...opts } = dev;
	const ctx = await browser.newContext(opts);
	// skip the closet-doors intro
	await ctx.addInitScript(() => { try { sessionStorage.setItem('lh-doors', '1'); } catch (e) {} });
	const page = await ctx.newPage();
	const errors = [], lines = [];
	page.on('pageerror', e => errors.push(String(e)));
	page.on('console', m => m.type() === 'error' && errors.push(m.text()));
	page.on('response', r => r.status() >= 400 && !r.url().includes('no-existe') && errors.push(`${r.status()} ${r.url()}`));
	for (const [pname, path] of Object.entries(pages)) {
		if (only && !only.includes(pname)) continue;
		await page.goto(base + path, { waitUntil: 'networkidle' });
		await page.waitForTimeout(1000);
		const h = await page.evaluate(() => document.documentElement.scrollHeight);
		const step = Math.round(dev.viewport.height * 0.8);
		let n = 0;
		for (let y = 0; y <= h && n < 60; y += step, n++) {
			await page.evaluate(v => window.scrollTo(0, v), y);
			await page.waitForTimeout(550);
			await page.screenshot({ path: `shots/${pname}-${dname}-${String(n).padStart(2, '0')}.png` });
		}
		lines.push(`${pname} ${dname}: height ${h}px, ${n} shots`);
		// phones: also capture the menu open
		if (dev.isMobile && (pname === 'home' || pname === 'en')) {
			await page.evaluate(() => window.scrollTo(0, 0));
			await page.waitForTimeout(400);
			const burger = await page.$('.lh-burger');
			if (burger) {
				await burger.click();
				await page.waitForTimeout(500);
				await page.screenshot({ path: `shots/${pname}-${dname}-menu.png` });
				await burger.click();
			} else {
				errors.push('no .lh-burger in ' + path);
			}
		}
	}
	if (errors.length) lines.push(`JS errors (${dname}):\n` + [...new Set(errors)].join('\n'));
	await ctx.close();
	return lines.join('\n');
}

const started = Date.now();
const out = await Promise.all(Object.entries(devices).map(([d, dev]) => run(d, dev)));
console.log(out.filter(Boolean).join('\n'));
console.log(`total: ${Math.round((Date.now() - started) / 1000)}s`);
await browser.close();
