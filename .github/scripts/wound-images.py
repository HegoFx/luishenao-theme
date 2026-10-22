"""Generates the Wound landing images with the Hugging Face Inference API.

Reads .github/scripts/wound-prompts.json, writes PNG originals and WebP (quality 82) to out/.
ONLY (comma list) limits which images are generated. Tries FLUX.1-schnell first, then SDXL.
"""
import io, json, os, sys, time
import requests
from PIL import Image

TOKEN = os.environ.get('HF_TOKEN', '')
if not TOKEN:
    sys.exit('Falta el secret HF_TOKEN en el repo (Settings > Secrets and variables > Actions).')

MODELS = [
    'https://router.huggingface.co/hf-inference/models/black-forest-labs/FLUX.1-schnell',
    'https://router.huggingface.co/hf-inference/models/stabilityai/stable-diffusion-xl-base-1.0',
]
cfg = json.load(open('.github/scripts/wound-prompts.json'))
only = [s.strip() for s in os.environ.get('ONLY', '').split(',') if s.strip()]
os.makedirs('out', exist_ok=True)


def generate(prompt, w, h):
    for url in MODELS:
        for size in ((w, h), (w * 2 // 3 // 16 * 16, h * 2 // 3 // 16 * 16)):
            for attempt in range(3):
                r = requests.post(url, headers={'Authorization': f'Bearer {TOKEN}', 'Accept': 'image/png'},
                                  json={'inputs': prompt, 'parameters': {'width': size[0], 'height': size[1]}}, timeout=180)
                if r.ok and r.headers.get('content-type', '').startswith('image/'):
                    return Image.open(io.BytesIO(r.content)), url.rsplit('/', 1)[-1], size
                print(f'  {url.rsplit("/", 1)[-1]} {size} intento {attempt + 1}: {r.status_code} {r.text[:200]}')
                if r.status_code in (503, 429):
                    time.sleep(20)
                    continue
                break
    return None, None, None


failed = []
for name, spec in cfg['images'].items():
    if only and name not in only:
        continue
    prompt = f"{spec['prompt']}, {cfg['style']}"
    img, model, size = generate(prompt, spec['w'], spec['h'])
    if not img:
        failed.append(name)
        print(f'FALLÓ {name}')
        continue
    img = img.convert('RGB')
    if img.size != (spec['w'], spec['h']):
        img = img.resize((spec['w'], spec['h']), Image.LANCZOS)
    img.save(f'out/{name}.webp', quality=82)
    print(f'OK {name} {model} {size} -> {spec["w"]}x{spec["h"]}')

if failed:
    sys.exit('Fallaron: ' + ', '.join(failed))
