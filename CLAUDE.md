# Contexto para Claude

Lee esto antes de investigar. Actualízalo cuando confirmes algo nuevo del servidor.

## Proyecto
- Tema de bloques WordPress para luishenaoai.online: Meta Ads para negocios de custom closets en USA.
- Hoy se publica en el dominio temporal de Hostinger https://navajowhite-whale-731377.hostingersite.com (staging, `blog_public`=0, no indexa).
- Diseño y efectos en el tema; el contenido vive en páginas de WordPress armadas con los patterns de `/patterns`.
- Estilo de escritura del usuario: nunca usar "—" en textos.

## Deploy
- Push a `main` → `.github/workflows/deploy.yml` → rsync por SSH de esta carpeta a `THEME_PATH`. Solo toca el tema.
- Secrets del repo: `SSH_HOST`, `SSH_PORT`, `SSH_USER`, `SSH_KEY`, `THEME_PATH`. No se pueden leer, solo usar dentro de Actions.
- Run 1 falló, run 2 (v0.1.1, 2026-10-20) pasó: el deploy funciona.

## Límites del entorno cloud de Claude
- Salida a internet solo por proxy HTTPS: no hay SSH directo a Hostinger desde la sesión.
- Todo lo que necesite el servidor se hace con un workflow de GitHub Actions que use los secrets de SSH, y se lee el log con las herramientas de GitHub.
- `.github/workflows/wp-info.yml`: inventario de solo lectura (WP-CLI, plugins, páginas, usuarios, plantillas editadas). Corre al hacer push de ese archivo a una rama `claude/**` o a mano.
- El modo Auto bloquea workflows que lean o escriban producción aunque Luis lo apruebe en el chat. Pídele cambiar a "Accept edits" para aprobar ese push.
- Cloud: el push va por la Claude GitHub App (ya instalada en HegoFx/luishenao-theme). Si da 403, revisar esa instalación.
- El proxy no deja abrir el sitio desde la sesión (si Luis agrega el dominio en Network access del entorno, usar el Chromium local). Para verlo: `.github/workflows/screenshots.yml` corre tras cada publicación o a mano con inputs `pages` y `devices` (ej. `home` y `mob`) para correr solo eso; sube capturas + log a la rama `screenshots` (`git fetch origin screenshots`).
- `.github/workflows/wp-media.yml`: backup de la base en `~/backups` (fuera de public_html; `wp db export` falla, usa `mariadb-dump`), reemplaza URLs del tema .jpg→.webp y regenera medios. Ya se corrió el 2026-10-20.
- Hostinger a veces tarda en responder SSH: los workflows reintentan `ssh-keyscan`.

## Bilingüe (Polylang 3.9, configurado 2026-10-20)
- Español por defecto en `/` (locale es_MX), inglés en `/en/` (en_US). `.github/workflows/wp-i18n.yml` + `.github/scripts/i18n-setup.php` lo configuran (idempotente, con backup).
- Páginas: Inicio (1) ↔ Home (10, portada /en/), Blog (2, /blog/) ↔ Blog (11, /en/articles/), Sobre mí (5) ↔ About (12). Polylang free no comparte slugs entre idiomas: por eso `/en/articles/`.
- El tema traduce lo que Polylang free no puede en un tema de bloques (`functions.php`, `lh_is_en()`): en inglés usa `parts/header-en.html` y `footer-en.html`, los patterns `luishenao/en-*` en vez de `luishenao/*` y prueba primero las plantillas `templates/en-*.html`.
- Al cambiar un texto del tema, cambia también su gemelo en inglés. Selector de idioma: shortcode `[lh_lang]` en la nav.
- El inglés no es traducción literal: el dueño americano recibe los leads por SMS en su pipeline de GoHighLevel, el CTA es "Book a 15-min call" (#book) y Colombia se presenta como ventaja.
- Pendiente: calendario de GHL real en #book.

## Tracking (`docs/tracking.md`)
- Conversiones de Google Ads y Meta salen de GHL (gclid / CAPI), no del sitio. GA4 y etiqueta base de Ads con Site Kit; Meta Pixel por código (falta el ID).
- `assets/js/track.js`: guarda gclid/gbraid/wbraid/fbclid/UTM en la cookie `lh_attr` (90 días, último clic) y los agrega a iframes y enlaces de GHL (incluye `data-src` de LiteSpeed) y a inputs ocultos. Probado en Chromium local con páginas de prueba.
- Las políticas de privacidad ya mencionan Google y esa cookie.

## SEO y GEO (tema, sin plugin)
- `inc/seo.php`: `lh_seo()` es la única fuente de datos del negocio por idioma (títulos, descripciones, precio, oferta). Alimenta títulos, meta description, canonical, Open Graph/Twitter, JSON-LD y `/llms.txt`. Si cambia el precio o la oferta, se cambia ahí.
- Meta description: el extracto de la página manda; si no tiene, usa el texto de `lh_seo()`.
- FAQPage del JSON-LD se arma con los bloques Detalles de la página (coincide con lo visible).
- `.github/workflows/seo-check.yml` revisa las páginas públicas tras cada deploy (necesita User-Agent de navegador: Hostinger da 403 a clientes desconocidos).
- El staging tenía un `llms.txt` físico de otra plantilla ("Glamora"); se movió a `~/backups` con `wp-cleanup.yml`. Revisar lo mismo en producción.
- Checklist de lanzamiento en luishenaoai.online: `blog_public`=1, verificar que el `robots.txt` no bloquee a Googlebot (el del staging lo pone Hostinger), sitemap `/wp-sitemap.xml`, Search Console con los dos idiomas, que la protección anti-bots de Hostinger no bloquee GPTBot/ClaudeBot/PerplexityBot, y que no haya `llms.txt` físico.

## Contenido en código
- `content/pages/<es|en>/*.txt` y `content/posts/<es|en>/*.txt`: front matter + sintaxis simple (## títulos, - listas, | tablas, ?? pregunta FAQ, !cta). `build_content.py` los pasa a bloques (rechaza "—").
- `content-sync.php` (vía `wp-content.yml`, corre tras cada deploy) publica eso más Inicio/Home y la landing (`clientes-para-negocios-de-closets` ↔ `custom-closet-leads`) armados con patterns. Guarda `_lh_sync_hash`: si alguien editó la página en WordPress, la omite.
- Orden de workflows: deploy → contenido → capturas y revisión SEO.
- Los artículos ES y EN no son traducciones entre sí (keywords distintas). Investigación y criterio de quick wins: `docs/seo-geo.md`.

## Imágenes
- Tema: solo WebP en `assets/img`, cada una al ancho en que se muestra (hero/panorámica 1920, retrato 1200, tarjetas del rod 900).
- Uploads: `functions.php` convierte JPG/PNG a WebP calidad 80 y genera solo thumbnail, 768 y 1536; originales >1920 se reducen a 1920.
- El contenido del Home vive en la página "Inicio" de la base: cambiar un pattern no cambia esa página.

## Servidor (confirmado con wp-info, 2026-10-20)
- Hostinger, PHP 8.2.34, MariaDB 11.8, WP-CLI 2.12.0 en `wp` (el workflow usa `--path` al WP root).
- WP root: `~/domains/navajowhite-whale-731377.hostingersite.com/public_html`.
- WordPress 7.1.3, permalinks `/%postname%/`, portada estática: página 1 "Inicio" (`inicio-lh`), entradas en página 2 "Blog".
- Páginas: Inicio (1), Blog (2), Sobre mí (5). 1 entrada, 2 medios.
- Temas: `luishenao` 0.1.1 activo, `twentytwentyfive` inactivo. No hay plantillas editadas en el Editor del sitio.
- Plugins: `litespeed-cache` inactivo; must-use de Hostinger: `hostinger-preview-domain`, `hostinger-auto-updates`.
- Usuarios: solo el admin (ID 1).
- OJO: la llave SSH de deploy es de cuenta, no de sitio. Alcanza también `henaoconversion.com` y `luishenaoai.online` (producción). Cualquier workflow nuevo debe apuntar explícitamente al WP root del staging.

## Landing Wound Therapeutics (HBOT), sitio aparte
- Cliente: Wound Therapeutics of Florida (woundfl.com, hecho en Base44), Dr. Fernando J. Torres, Orlando. Landing para pacientes y familiares: evaluación de heridas y HBOT.
- La clínica no tiene cámara: el Dr. Torres evalúa y coordina, el HBOT se hace en un centro especializado. Copy aprobado por el jefe de Luis en `wound/inc/copy.php` (inglés tal cual; español escrito para pacientes en Florida, de usted). No mencionar seguros salvo el disclaimer final.
- Sitio temporal: https://lightslategray-okapi-283954.hostingersite.com (misma cuenta y llave SSH). WP root `~/domains/lightslategray-okapi-283954.hostingersite.com/public_html`, fijo en los workflows.
- Tema clásico en `wound/` (se sube como `wound-hbot`; `deploy.yml` lo excluye del tema principal). Todo el contenido se renderiza desde código (`front-page.php` + `inc/copy.php`); las páginas Home (en) ↔ Inicio (es) existen vacías solo para las URLs de Polylang.
- Inglés por defecto en `/`, español en `/es/`. En inglés, "Hablamos Español" (header y hero) lleva a `/es/`, además del selector EN | ES.
- `.github/workflows/wound.yml`: push a `main` o `claude/**` que toque `wound/**` → backup de la base (deja 5), rsync del tema, Polylang + `wound-setup.php` (idempotente, `blog_public`=0), purga LiteSpeed y capturas en la rama `screenshots-wound`. `wound-info.yml`: inventario de solo lectura.
- Diseño v0.2 ("la presión del oxígeno"), inspirado en UIC, Med Admin y Fernando Ruiz (sitios en la misma cuenta: seagreen-turtle, lightgreen-koala, lightgoldenrodyellow-jellyfish): hero oscuro con partículas de O₂ en canvas, frase que se llena con el scroll, medidor fijo 21% → 100% (aire normal → cámara), condiciones en scroll horizontal (≥1100px), auto-chequeo (copy nuevo, pendiente de aprobación del jefe; no envía datos), marquesina, pasos apilados, caminos que convergen. GSAP + ScrollTrigger + Lenis en `wound/assets/vendor` (Lenis solo con puntero fino). `html.wt-js` solo con movimiento: sin JS o con reduced motion todo queda visible.
- UIC ofrece HBOT en Lakewood Ranch y Orlando: confirmar si es el centro aliado antes de usar sus fotos.
- Pendientes: formulario real de GHL (hoy es placeholder en `#evaluation`; reemplazar el `<form>`), fotos reales del centro de HBOT, cifra correcta de pacientes (el sitio dice 4,000+ y 6,000+), política de privacidad.
