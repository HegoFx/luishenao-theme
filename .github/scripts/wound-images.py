"""Generates the Wound landing images with the Higgsfield API (Soul model).

Credentials: secret HF_TOKEN as "KEY_ID:KEY_SECRET", or HF_TOKEN = key id plus HF_SECRET = secret.
Reads .github/scripts/wound-prompts.json and writes WebP (quality 82), cropped to each slot's size, to out/.
ONLY (comma list) limits which images are generated. The first image doubles as a probe: if it fails,
the run stops before spending credits on the rest, and raw API responses are logged to adapt the client.
"""
import io, json, os, re, sys, time
import requests
from PIL import Image

if os.environ.get('DOCS'):
    # Read the official docs from the runner (the Claude session cannot reach them). No credits used.
    os.makedirs('out', exist_ok=True)
    seeds = ['https://docs.higgsfield.ai/docs/models/image-generation.md', 'https://docs.higgsfield.ai/docs/models.md', 'https://docs.higgsfield.ai/docs/openapi.json',
             'https://docs.higgsfield.ai/docs/llms.txt', 'https://docs.higgsfield.ai/llms-full.txt', 'https://docs.higgsfield.ai/docs/llms-full.txt',
             'https://docs.higgsfield.ai/docs/guides/images.md', 'https://docs.higgsfield.ai/docs/quickstart.md',
             'https://docs.higgsfield.ai/docs/authentication.md', 'https://docs.higgsfield.ai/docs/how-to/sdk.md']
    if os.environ['DOCS'].startswith('http'):
        seeds = [u.strip() for u in os.environ['DOCS'].split(',') if u.strip()]
    seen, queue, out = set(), list(seeds), []
    while queue and len(seen) < 40:
        u = queue.pop(0)
        if u in seen:
            continue
        seen.add(u)
        r = requests.get(u, timeout=60)
        if not r.ok:
            out.append(f'\n\n# {u} -> {r.status_code}')
            continue
        out += [f'\n\n# {u}', r.text[:120000]]
        for link in re.findall(r'https://docs\.higgsfield\.ai/[^\s)\]"]+\.(?:md|txt)', r.text):
            if re.search(r'image|soul|edit|banana|seedream|kontext|gpt|flux|reve|qwen', link, re.I) and 'video' not in link:
                queue.append(link)
    open('out/higgsfield-docs.md', 'w').write('\n'.join(out))
    print(f'docs: {len(seen)} páginas')
    sys.exit(0)

key = os.environ.get('HF_TOKEN', '').strip()
secret = os.environ.get('HF_SECRET', '').strip()
if not key:
    sys.exit('Falta el secret HF_TOKEN (Higgsfield "KEY_ID:KEY_SECRET").')
if ':' not in key:
    if not secret:
        sys.exit('HF_TOKEN no trae ":" y falta HF_SECRET. Guarda HF_TOKEN como KEY_ID:KEY_SECRET.')
    key = f'{key}:{secret}'
HEAD = {'Authorization': f'Key {key}', 'Content-Type': 'application/json', 'Accept': 'application/json'}

ENDPOINTS = [
    'https://platform.higgsfield.ai/higgsfield-ai/soul/standard',
    'https://api.higgsfield.ai/higgsfield-ai/soul/v2/standard',
]
cfg = json.load(open('.github/scripts/wound-prompts.json'))
only = [s.strip() for s in os.environ.get('ONLY', '').split(',') if s.strip()]
os.makedirs('out', exist_ok=True)


def ratio(w, h):
    r = w / h
    return min({'16:9': 16 / 9, '4:3': 4 / 3, '3:2': 3 / 2, '1:1': 1, '3:4': 3 / 4, '2:3': 2 / 3, '9:16': 9 / 16}.items(), key=lambda kv: abs(kv[1] - r))[0]


def urls(obj):
    """Every image URL anywhere in a JSON response."""
    found = []
    if isinstance(obj, dict):
        for v in obj.values():
            found += urls(v)
    elif isinstance(obj, list):
        for v in obj:
            found += urls(v)
    elif isinstance(obj, str) and re.match(r'https?://\S+\.(png|jpe?g|webp)(\?\S*)?$', obj, re.I):
        found.append(obj)
    return found


def status_of(j):
    return str(j.get('status') or j.get('state') or (j.get('data') or {}).get('status') or '').lower()


GROK = 'https://api.higgsfield.ai/xai/grok-imagine-image-2.0'


def generate(prompt, w, h, verbose, spec=None):
    spec = spec or {}
    if spec.get('model') == 'grok':
        # Grok Image 2.0: text to image, or edit with up to 10 public reference URLs (image_urls)
        body = {'prompt': prompt, 'aspect_ratio': ratio(w, h), 'resolution': '2k', 'quality': 'medium'}
        if spec.get('refs'):
            body['image_urls'] = spec['refs']
        eps = [GROK]
    else:
        body = {'prompt': prompt, 'aspect_ratio': ratio(w, h), 'resolution': '1080p'}
        eps = ENDPOINTS
    for ep in eps:
        r = requests.post(ep, headers=HEAD, json=body, timeout=120)
        if verbose:
            print(f'  POST {ep} -> {r.status_code} {r.text[:600]}')
        if r.status_code in (401, 403):
            sys.exit(f'Higgsfield rechaza la credencial ({r.status_code}). Revisa que HF_TOKEN sea KEY_ID:KEY_SECRET.')
        if not r.ok:
            continue
        j = r.json()
        poll = j.get('status_url') or j.get('statusUrl') or (j.get('urls') or {}).get('status')
        rid = j.get('request_id') or j.get('id') or j.get('requestId')
        if not poll and rid:
            poll = f"{ep.split('/higgsfield-ai')[0]}/requests/{rid}/status"
        for _ in range(90):
            found = [im['url'] for im in (j.get('images') or []) if isinstance(im, dict) and im.get('url')] or urls(j)
            st = status_of(j)
            if found and st in ('', 'completed', 'succeeded', 'success', 'done', 'finished'):
                return found[0]
            if st in ('failed', 'error', 'nsfw', 'canceled', 'cancelled'):
                print(f'  estado {st}: {json.dumps(j)[:600]}')
                return None
            if not poll:
                print(f'  sin URL de estado: {json.dumps(j)[:600]}')
                return None
            time.sleep(4)
            pr = requests.get(poll, headers=HEAD, timeout=60)
            j = pr.json() if pr.ok else {}
            if verbose and _ in (0, 5):
                print(f'  GET {poll} -> {pr.status_code} {pr.text[:600]}')
        print('  tiempo agotado esperando la imagen')
        return None
    return None


names = [n for n in cfg['images'] if not only or n in only]
failed = []
for i, name in enumerate(names):
    spec = cfg['images'][name]
    url = generate(f"{spec['prompt']}, {spec.get('style', cfg['style'])}", spec['w'], spec['h'], verbose=(i == 0), spec=spec)
    if not url:
        failed.append(name)
        print(f'FALLÓ {name}')
        if i == 0:
            sys.exit('La primera imagen falló: me detengo para no gastar créditos. Revisa las respuestas de arriba.')
        continue
    img = Image.open(io.BytesIO(requests.get(url, timeout=120).content)).convert('RGB')
    # crop to the slot's aspect, then scale to its size
    tw, th = spec['w'], spec['h']
    sw, sh = img.size
    if sw / sh > tw / th:
        nw = int(sh * tw / th); img = img.crop(((sw - nw) // 2, 0, (sw - nw) // 2 + nw, sh))
    else:
        nh = int(sw * th / tw); img = img.crop((0, (sh - nh) // 2, sw, (sh - nh) // 2 + nh))
    img.resize((tw, th), Image.LANCZOS).save(f'out/{name}.webp', quality=82)
    print(f'OK {name} {sw}x{sh} -> {tw}x{th}')

if failed:
    sys.exit('Fallaron: ' + ', '.join(failed))
