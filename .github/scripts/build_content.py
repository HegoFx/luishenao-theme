"""Turns the plain-text sources in content/ into WordPress block markup (content/build/content.json).

Source format (one file per page or post, content/<pages|posts>/<es|en>/<slug>.txt):

    ---
    title: ...
    excerpt: ...            meta description and intro
    category: ...           posts only
    image: file.webp        featured image, from assets/img
    template: page-landing  optional page template
    pair: about             pages only: same key in es and en links the two translations
    ---
    Paragraphs separated by blank lines, with **bold**, *italic* and [links](/url/).
    ## Heading 2 / ### Heading 3
    - bullet list          1. numbered list
    > quote
    | table | header |     (first row is the header)
    ?? Question            (next lines: the answer; becomes a Details block and FAQPage schema)
    !cta                   call-to-action box for the language
"""
import html
import json
import pathlib
import re
import sys

ROOT = pathlib.Path(sys.argv[1] if len(sys.argv) > 1 else '.')
SRC = ROOT / 'content'

CTA = {
    'es': ('¿Prefieres home owners pre-filtrados en vez de leads compartidos?',
           'Piloto de un mes por $650, sin contratos largos y con garantía de 21 días.',
           'Ver cómo funciona →', '/clientes-para-negocios-de-closets/'),
    'en': ('Want pre-qualified homeowners instead of shared leads?',
           'A one-month pilot for $650, no long-term contract and a 21-day launch guarantee.',
           'See how it works →', '/en/custom-closet-leads/'),
}


def inline(text):
    t = html.escape(text, quote=False)
    t = re.sub(r'\[([^\]]+)\]\(([^)\s]+)\)', lambda m: f'<a href="{html.escape(m.group(2))}">{m.group(1)}</a>', t)
    t = re.sub(r'\*\*(.+?)\*\*', r'<strong>\1</strong>', t)
    t = re.sub(r'(?<![*\w])\*(?!\s)(.+?)(?<!\s)\*(?![*\w])', r'<em>\1</em>', t)
    if '—' in t:
        raise ValueError(f'em dash in: {text[:60]}')
    return t


def para(text):
    return f'<!-- wp:paragraph -->\n<p>{inline(text)}</p>\n<!-- /wp:paragraph -->'


def block(lines, lang):
    first = lines[0]
    if first.startswith('### '):
        return f'<!-- wp:heading {{"level":3}} -->\n<h3 class="wp-block-heading">{inline(first[4:])}</h3>\n<!-- /wp:heading -->'
    if first.startswith('## '):
        return f'<!-- wp:heading -->\n<h2 class="wp-block-heading">{inline(first[3:])}</h2>\n<!-- /wp:heading -->'
    if first.startswith('- ') or re.match(r'\d+\. ', first):
        ordered = not first.startswith('- ')
        texts = [re.sub(r'^(- |\d+\. )', '', l) for l in lines]
        items = ''.join(f'<!-- wp:list-item -->\n<li>{inline(t)}</li>\n<!-- /wp:list-item -->' for t in texts)
        if ordered:
            return f'<!-- wp:list {{"ordered":true}} -->\n<ol class="wp-block-list">{items}</ol>\n<!-- /wp:list -->'
        return f'<!-- wp:list -->\n<ul class="wp-block-list">{items}</ul>\n<!-- /wp:list -->'
    if first.startswith('> '):
        inner = para(' '.join(l[2:] for l in lines))
        return f'<!-- wp:quote -->\n<blockquote class="wp-block-quote">{inner}</blockquote>\n<!-- /wp:quote -->'
    if first.startswith('|'):
        rows = [[c.strip() for c in l.strip().strip('|').split('|')] for l in lines if not re.match(r'^\|[\s:|-]+\|$', l.strip())]
        head = ''.join(f'<th>{inline(c)}</th>' for c in rows[0])
        body = ''.join('<tr>' + ''.join(f'<td>{inline(c)}</td>' for c in r) + '</tr>' for r in rows[1:])
        return ('<!-- wp:table -->\n<figure class="wp-block-table"><table class="has-fixed-layout">'
                f'<thead><tr>{head}</tr></thead><tbody>{body}</tbody></table></figure>\n<!-- /wp:table -->')
    if first.startswith('?? '):
        answer = para(' '.join(lines[1:]))
        return (f'<!-- wp:details -->\n<details class="wp-block-details"><summary>{inline(first[3:])}</summary>'
                f'{answer}</details>\n<!-- /wp:details -->')
    if first.strip() == '!cta':
        a, b, label, url = CTA[lang]
        return ('<!-- wp:group {"className":"lh-cta-box"} -->\n<div class="wp-block-group lh-cta-box">'
                f'{para(a)}\n\n{para(b)}\n\n<!-- wp:buttons -->\n<div class="wp-block-buttons"><!-- wp:button -->\n'
                f'<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="{url}">{html.escape(label)}</a></div>\n'
                '<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:group -->')
    return para(' '.join(lines))


def convert(path, kind, lang):
    raw = path.read_text(encoding='utf-8')
    m = re.match(r'---\n(.*?)\n---\n(.*)', raw, re.S)
    if not m:
        raise ValueError(f'{path}: missing front matter')
    meta = dict(l.split(':', 1) for l in m.group(1).splitlines() if ':' in l)
    meta = {k.strip(): v.strip().strip('"') for k, v in meta.items()}
    chunks = [c.split('\n') for c in re.split(r'\n\s*\n', m.group(2).strip()) if c.strip()]
    for k in ('title', 'excerpt'):
        if '—' in meta.get(k, ''):
            raise ValueError(f'{path}: em dash in {k}')
    words = len(re.sub(r'<[^>]+>', ' ', m.group(2)).split())
    return {
        'type': 'page' if kind == 'pages' else 'post',
        'lang': lang,
        'slug': path.stem,
        'title': meta['title'],
        'excerpt': meta.get('excerpt', ''),
        'category': meta.get('category', ''),
        'image': meta.get('image', ''),
        'template': meta.get('template', ''),
        'pair': meta.get('pair', ''),
        'words': words,
        'content': '\n\n'.join(block(c, lang) for c in chunks),
    }


items = []
for kind in ('pages', 'posts'):
    for lang in ('es', 'en'):
        for f in sorted((SRC / kind / lang).glob('*.txt')):
            items.append(convert(f, kind, lang))

out = SRC / 'build'
out.mkdir(exist_ok=True)
(out / 'content.json').write_text(json.dumps(items, ensure_ascii=False, indent=1), encoding='utf-8')
for i in items:
    print(f"{i['type']:4} {i['lang']} {i['words']:5} palabras  {i['slug']}")
