"""Pexels media for the Wound landing (secret PEXELS_API_KEY).

MODE=search: for each slot in wound-pexels.json, takes the top results of its queries and writes
  out/sheets/<slot>.jpg (numbered contact sheet) and out/manifest.json (id, author, url, size, duration).
MODE=fetch: PICKS="slot=type:id,..." (type v or p) downloads the chosen media:
  videos → out/media/<slot>.mp4 (H.264, 1280 wide, no audio, max 14 s) + <slot>-poster.webp
  photos → out/media/<slot>.webp (1600 wide, quality 82)
  and out/media/credits.json for attribution.
"""
import io, json, os, subprocess, sys
import requests
from PIL import Image, ImageDraw

KEY = os.environ.get('PEXELS_API_KEY', '').strip()
if not KEY:
    sys.exit('Falta el secret PEXELS_API_KEY en el repo (Settings > Secrets and variables > Actions).')
H = {'Authorization': KEY}
API = 'https://api.pexels.com'
cfg = json.load(open('.github/scripts/wound-pexels.json'))
mode = os.environ.get('MODE', 'search')
os.makedirs('out/sheets', exist_ok=True)
os.makedirs('out/media', exist_ok=True)


def get(path, **params):
    r = requests.get(API + path, headers=H, params=params, timeout=60)
    if r.status_code == 401:
        sys.exit('Pexels rechaza la API key (401). Revisa el secret PEXELS_API_KEY.')
    r.raise_for_status()
    return r.json()


def thumb(url):
    r = requests.get(url, timeout=60)
    r.raise_for_status()
    return Image.open(io.BytesIO(r.content)).convert('RGB')


def sheet(slot, items):
    tw, th, cols = 360, 220, 4
    rows = (len(items) + cols - 1) // cols
    im = Image.new('RGB', (cols * (tw + 8), rows * (th + 30)), 'white')
    dr = ImageDraw.Draw(im)
    for i, it in enumerate(items):
        try:
            t = thumb(it['thumb'])
            t.thumbnail((tw, th))
            x, y = (i % cols) * (tw + 8), (i // cols) * (th + 30)
            im.paste(t, (x, y))
            dr.text((x + 4, y + th + 6), f"{i + 1}. {it['type']}:{it['id']} {it.get('w')}x{it.get('h')} {it.get('dur', '')}", fill=(0, 0, 0))
        except Exception as e:  # a broken thumbnail should not stop the sheet
            print('thumb', it['id'], e)
    im.save(f'out/sheets/{slot}.jpg', quality=80)


if mode == 'search':
    manifest = {}
    for kind, slots in (('v', cfg['videos']), ('p', cfg['photos'])):
        for slot, queries in slots.items():
            seen, items = set(), []
            for q in queries:
                if kind == 'v':
                    res = get('/videos/search', query=q, per_page=8, orientation='landscape', size='medium').get('videos', [])
                    for v in res:
                        if v['id'] in seen:
                            continue
                        seen.add(v['id'])
                        items.append({'type': 'v', 'id': v['id'], 'q': q, 'url': v['url'], 'author': v['user']['name'], 'thumb': v['image'], 'w': v['width'], 'h': v['height'], 'dur': f"{v['duration']}s"})
                else:
                    res = get('/v1/search', query=q, per_page=8).get('photos', [])
                    for p in res:
                        if p['id'] in seen:
                            continue
                        seen.add(p['id'])
                        items.append({'type': 'p', 'id': p['id'], 'q': q, 'url': p['url'], 'author': p['photographer'], 'thumb': p['src']['medium'], 'w': p['width'], 'h': p['height'], 'alt': p.get('alt', '')})
            items = items[:16]
            manifest[f'{kind}-{slot}'] = items
            sheet(f'{kind}-{slot}', items)
            print(f'{kind}-{slot}: {len(items)} candidatas')
    json.dump(manifest, open('out/manifest.json', 'w'), indent=1)

else:
    picks = [p.strip() for p in os.environ.get('PICKS', '').split(',') if p.strip()]
    if not picks:
        sys.exit('PICKS vacío: usa slot=v:123 o slot=p:456 separados por coma.')
    credits = {}
    for pick in picks:
        slot, ref = pick.split('=')
        kind, mid = ref.split(':')
        if kind == 'v':
            v = get(f'/videos/videos/{mid}')
            files = sorted([f for f in v['video_files'] if f.get('file_type') == 'video/mp4' and f.get('width')], key=lambda f: f['width'])
            src = next((f for f in files if f['width'] >= 1280), files[-1])
            raw = f'out/{slot}-raw.mp4'
            open(raw, 'wb').write(requests.get(src['link'], timeout=300).content)
            subprocess.run(['ffmpeg', '-y', '-loglevel', 'error', '-i', raw, '-t', '14', '-an', '-vf', 'scale=1280:-2,fps=30', '-c:v', 'libx264', '-preset', 'slow', '-crf', '27', '-pix_fmt', 'yuv420p', '-movflags', '+faststart', f'out/media/{slot}.mp4'], check=True)
            subprocess.run(['ffmpeg', '-y', '-loglevel', 'error', '-ss', '0.5', '-i', f'out/media/{slot}.mp4', '-frames:v', '1', f'out/{slot}-poster.png'], check=True)
            Image.open(f'out/{slot}-poster.png').convert('RGB').save(f'out/media/{slot}-poster.webp', quality=78)
            credits[slot] = {'type': 'video', 'id': v['id'], 'author': v['user']['name'], 'url': v['url']}
            print(f"OK {slot} video {mid} {os.path.getsize(f'out/media/{slot}.mp4') // 1024} KB")
        else:
            p = get(f'/v1/photos/{mid}')
            im = thumb(p['src']['original'])
            im.thumbnail((1600, 1600 * 4))
            im.save(f'out/media/{slot}.webp', quality=82)
            credits[slot] = {'type': 'photo', 'id': p['id'], 'author': p['photographer'], 'url': p['url']}
            print(f'OK {slot} foto {mid} {im.size}')
    old = {}
    if os.path.exists('pub/media/credits.json'):
        old = json.load(open('pub/media/credits.json'))
    old.update(credits)
    json.dump(old, open('out/media/credits.json', 'w'), indent=1)
