# Contexto para Claude

Lee esto antes de investigar. Actualízalo cuando confirmes algo nuevo del servidor.

## Proyecto
- Tema de bloques WordPress para luishenaoai.online: Meta Ads para negocios de custom closets en USA.
- Hoy se publica en un dominio temporal (staging) de Hostinger. El dominio temporal no está escrito en el repo; pídeselo a Luis y anótalo aquí.
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
- Hacer push de workflows que lean producción requiere aprobación explícita del usuario en la sesión.

## Servidor (pendiente de confirmar con wp-info)
- WP-CLI: sin confirmar.
- Versión WP/PHP, plugins, páginas, usuarios: sin confirmar.
- Si la llave SSH alcanza otros sitios de la cuenta (`~/domains`): sin confirmar.
