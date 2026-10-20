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
- El proxy no deja abrir el sitio desde la sesión. Para verlo: `.github/workflows/screenshots.yml` corre tras cada deploy (o a mano) y sube capturas escritorio/móvil + log de errores a la rama `screenshots` (`git fetch origin screenshots`).
- `.github/workflows/wp-media.yml`: backup de la base en `~/backups` (fuera de public_html; `wp db export` falla, usa `mariadb-dump`), reemplaza URLs del tema .jpg→.webp y regenera medios. Ya se corrió el 2026-10-20.
- Hostinger a veces tarda en responder SSH: los workflows reintentan `ssh-keyscan`.

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
