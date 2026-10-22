// Screenshots of the Wound HBOT landing (English and Spanish, desktop and phone).
// Output: shots/<page>-<device>-full.png (whole page) and -top.png (first screen), plus log.txt lines.
import { chromium } from 'playwright';
import { mkdirSync } from 'node:fs';

const base = process.env.SITE_URL.replace(/\/$/, '');
const pages = { en: '/', es: '/es/' };
const devices = {
	desk: { viewport: { width: 1440, height: 900 } },
	mob: { viewport: { width: 390, height: 844 }, deviceScaleFactor: 2, isMobile: true, hasTouch: true },
};

mkdirSync('shots', { recursive: true });
const browser = await chromium.launch();
for (const [dname, dev] of Object.entries(devices)) {
	const ctx = await browser.newContext(dev);
	const page = await ctx.newPage();
	const errors = [];
	page.on('pageerror', e => errors.push(String(e)));
	page.on('response', r => r.status() >= 400 && errors.push(`${r.status()} ${r.url()}`));
	for (const [pname, path] of Object.entries(pages)) {
		const res = await page.goto(base + path, { waitUntil: 'networkidle' });
		await page.waitForTimeout(800);
		await page.screenshot({ path: `shots/${pname}-${dname}-top.png` });
		await page.screenshot({ path: `shots/${pname}-${dname}-full.png`, fullPage: true });
		const info = await page.evaluate(() => ({
			lang: document.documentElement.lang,
			title: document.title,
			h1: document.querySelector('h1')?.textContent.trim(),
			overflow: document.documentElement.scrollWidth - innerWidth,
			hreflang: [...document.querySelectorAll('link[hreflang]')].map(l => `${l.hreflang}=${l.href}`).join(' '),
			robots: document.querySelector('meta[name="robots"]')?.content || '(none)',
		}));
		console.log(`${pname} ${dname}: HTTP ${res.status()} ${JSON.stringify(info)}`);
	}
	if (errors.length) console.log(`errors (${dname}):\n` + [...new Set(errors)].join('\n'));
	await ctx.close();
}
await browser.close();
