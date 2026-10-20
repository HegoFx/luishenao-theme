"""Reads the public staging pages like a crawler and reports the SEO/GEO tags each one ships.
Exits non-zero when a page fails to load, has no title/description, or ships invalid JSON-LD."""
import json, os, re, sys, urllib.request
from html.parser import HTMLParser

BASE = os.environ['SITE_URL'].rstrip('/')
PAGES = ['/', '/en/', '/blog/', '/en/articles/', '/sobre-mi/', '/en/about/']


class Head(HTMLParser):
    def __init__(self):
        super().__init__()
        self.title, self.meta, self.links, self.ld, self.h1 = '', {}, [], [], 0
        self._in = None
        self.lang = ''

    def handle_starttag(self, tag, attrs):
        a = dict(attrs)
        if tag == 'html':
            self.lang = a.get('lang', '')
        elif tag == 'title':
            self._in = 'title'
        elif tag == 'meta' and a.get('content') is not None:
            key = a.get('name') or a.get('property')
            if key:
                self.meta.setdefault(key, []).append(a['content'])
        elif tag == 'link' and a.get('rel') in ('canonical', 'alternate') and a.get('href'):
            self.links.append((a.get('rel'), a.get('hreflang', ''), a['href']))
        elif tag == 'script' and a.get('type') == 'application/ld+json':
            self._in = 'ld'
            self.ld.append('')
        elif tag == 'h1':
            self.h1 += 1

    def handle_endtag(self, tag):
        self._in = None

    def handle_data(self, data):
        if self._in == 'title':
            self.title += data
        elif self._in == 'ld':
            self.ld[-1] += data


def get(path):
    # a real browser UA: Hostinger's bot protection answers 403 to unknown clients
    req = urllib.request.Request(BASE + path, headers={
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36',
        'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'Accept-Language': 'es-ES,es;q=0.9,en;q=0.8',
    })
    with urllib.request.urlopen(req, timeout=30) as r:
        return r.status, r.read().decode('utf-8', 'replace'), dict(r.headers)


fail = False
for path in PAGES:
    print(f'\n===== {path}')
    try:
        status, html, _ = get(path)
    except Exception as e:  # noqa: BLE001
        print('ERROR', e)
        fail = True
        continue
    h = Head()
    h.feed(html)
    m = lambda k: (h.meta.get(k) or [''])[0]
    desc = m('description')
    print(f'status {status} · lang {h.lang} · h1 x{h.h1}')
    print(f'title ({len(h.title.strip())}): {h.title.strip()}')
    print(f'description ({len(desc)}): {desc}')
    print('robots:', m('robots') or '(sin meta robots)')
    for rel, hl, href in h.links:
        print(f'{rel}{" " + hl if hl else ""}: {href}')
    for k in ('og:type', 'og:locale', 'og:url', 'og:image', 'twitter:card'):
        print(f'{k}: {m(k)}')
    if not h.title.strip() or not desc:
        print('FALTA título o descripción')
        fail = True
    for raw in h.ld:
        try:
            data = json.loads(raw)
        except json.JSONDecodeError as e:
            print('JSON-LD INVÁLIDO:', e)
            fail = True
            continue
        graph = data.get('@graph', [data])
        print('JSON-LD:', ', '.join(f"{n.get('@type')}" + (f" ({len(n['mainEntity'])} preguntas)" if n.get('@type') == 'FAQPage' else '') for n in graph))

for path in ('/llms.txt', '/robots.txt', '/wp-sitemap.xml'):
    print(f'\n===== {path}')
    try:
        status, body, headers = get(path)
        print(f'status {status} · {headers.get("Content-Type", "")}')
        print('\n'.join(body.splitlines()[:40]))
    except Exception as e:  # noqa: BLE001
        print('ERROR', e)
        if path == '/llms.txt':
            fail = True

sys.exit(1 if fail else 0)
