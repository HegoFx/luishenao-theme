# SEO y GEO del sitio: cómo funciona, cómo administrarlo y cómo rankear

## 1. Qué hace el sitio solo, sin que toques nada

El tema trae el SEO y el GEO incorporados (archivo `inc/seo.php`). No hay plugin de SEO que configurar.

| Qué | Para qué sirve | De dónde sale |
|---|---|---|
| Título de cada página | Lo que aparece en Google y en la pestaña | Título de la página + "Luis Henao". Home y Blog tienen un título con palabra clave fijo |
| Meta description | El texto gris debajo del título en Google | El **extracto** de la página o entrada |
| Canonical | Le dice a Google cuál es la URL oficial | Automático |
| hreflang | Une cada página con su versión en el otro idioma | Polylang + el tema |
| Open Graph | La tarjeta que se ve al compartir el link en WhatsApp, Facebook o LinkedIn | Imagen destacada, o `og-es.jpg` / `og-en.jpg` |
| JSON-LD | Le explica a Google y a las IAs quién eres, qué vendes, a qué precio y dónde | `lh_seo()` en `inc/seo.php` |
| FAQ en JSON-LD | Las preguntas frecuentes de cada página o artículo | Los bloques **Detalles** del contenido |
| `/llms.txt` | Resumen del negocio para ChatGPT, Claude, Perplexity y Gemini | Generado con los mismos datos, más tus artículos |
| Sitemap | La lista de URLs para Google | WordPress (`/wp-sitemap.xml`) cuando el sitio esté indexable |

**SEO** es aparecer en Google. **GEO** es que las IAs te entiendan, te citen y te recomienden cuando un dueño de negocio les pregunta, por ejemplo, "¿cómo consigo clientes para mi negocio de closets?". Para GEO pesan tres cosas: datos claros y consistentes sobre quién eres (JSON-LD y llms.txt), respuestas directas al inicio de cada artículo y preguntas frecuentes bien escritas. Todo eso ya está.

## 2. Cómo lo administras

### Lo que puedes hacer tú en WordPress

- **Cambiar la descripción que sale en Google:** edita la página o entrada y escribe el **Extracto** (panel derecho). Ideal: entre 120 y 155 caracteres, con la palabra clave al principio.
- **Cambiar la imagen al compartir:** pon una **Imagen destacada** de 1200 x 630 px.
- **Agregar preguntas frecuentes a un artículo:** inserta un bloque **Detalles**: la pregunta en el título y la respuesta adentro. Pasan solas al JSON-LD.
- **Publicar un artículo:** Entradas → Añadir, elige el idioma en el panel de Polylang y una categoría.

### Lo que conviene pedirme a mí

- Cambiar el precio, la oferta o los estados donde trabajas: está en `lh_seo()` y se actualiza en todo el sitio a la vez.
- Escribir o actualizar artículos del blog: viven en `content/posts/` del repo y se publican solos después de cada deploy.
- Páginas nuevas o cambios de diseño.

**Importante:** las páginas y artículos que publico desde el código (Inicio, Home, landing, Sobre mí, privacidad, gracias y los 10 artículos) se actualizan solos en cada deploy. Si editas uno de ellos en WordPress, el sistema lo detecta y **deja de pisarlo**: tu cambio se respeta, pero ese contenido ya no se actualiza desde el código. Si quieres que vuelva a sincronizarse, avísame.

### Revisión automática

Después de cada publicación corre la **Revisión SEO** (`.github/workflows/seo-check.yml`). Lee cada página como lo haría Google y verifica título, descripción, canonical, hreflang, Open Graph, que el JSON-LD sea válido y que `llms.txt` responda. Si algo se rompe, el workflow queda en rojo en GitHub.

## 3. Flujo de trabajo con Ubersuggest para rankear y aparecer en la IA

La idea es un ciclo mensual: **investigar → elegir quick wins → escribir → publicar → medir → mejorar**.

### Paso 1. Investigar (una vez al mes, 30 minutos)

En Ubersuggest, **Ideas de palabras clave**, con ubicación **Estados Unidos**:

- **Inglés:** semillas como `angi leads`, `facebook ads for contractors`, `contractor lead generation`, `home improvement leads`, `thumbtack leads`.
- **Español:** idioma español, Estados Unidos: `thumbtack en español`, `como conseguir clientes`, `que es un lead`, `publicidad en facebook`.

Piensa siempre en tu cliente, el **dueño del negocio de closets**, no en el home owner. "How much does a custom closet cost" trae home owners, no clientes tuyos.

### Paso 2. Elegir quick wins

Una palabra clave es un quick win cuando cumple las tres:

1. **Dificultad SEO (SD) de 35 o menos.**
2. **Volumen de 50 o más al mes**, o un grupo de variantes que sumen eso.
3. **La busca un dueño de negocio** y conecta con lo que vendes.

Antes de escribir, abre el **análisis de SERP** de la palabra clave. Si en el top 10 hay foros (Reddit), sitios con autoridad de dominio menor a 60 o artículos genéricos que no hablan de closets, puedes ganarles.

### Paso 3. Escribir para Google y para la IA

Cada artículo sigue la misma estructura (así están los 10 primeros):

1. **Respuesta corta** en el primer párrafo, en 2 o 3 frases. Es lo que extraen Google y las IAs.
2. **Subtítulos con forma de pregunta** que coinciden con lo que la gente busca.
3. **Una tabla o una lista** con números o comparaciones.
4. **Datos con fuente** cuando cites estadísticas. Nunca inventes cifras: las IAs desconfían de lo que no pueden verificar.
5. **Un CTA** a la página de venta en la mitad y al final.
6. **Cuatro preguntas frecuentes** en bloques Detalles.
7. **Enlaces a otros artículos** tuyos relacionados.

### Paso 4. Publicar y conectar

- Publica en el idioma correcto.
- Enlaza el artículo nuevo desde uno o dos artículos viejos.
- Compártelo en tus redes: cada clic real ayuda.

### Paso 5. Medir (cuando el sitio esté en el dominio real)

- **Ubersuggest → Proyecto:** crea un proyecto para luishenaoai.online y agrega las 10 palabras clave de los artículos para seguir su posición cada semana.
- **Ubersuggest → AI Search Visibility:** registra tu marca y agrega preguntas como "best way to get leads for a custom closet business" o "cómo conseguir clientes para un negocio de closets en USA" para ver si las IAs te mencionan.
- **Google Search Console:** clics, impresiones y posición real de cada página.

### Paso 6. Mejorar lo que ya existe

Cada 2 o 3 meses, en Search Console busca páginas en **posición 5 a 20**. Son las más fáciles de subir: agrega una sección que responda una pregunta que no cubrías, actualiza datos y suma dos enlaces internos.

## 4. Los artículos publicados y por qué

| Idioma | Artículo | Palabra clave | Volumen/mes | Dificultad |
|---|---|---|---|---|
| EN | Is Angi Leads Worth It for Custom Closet Companies? | angi leads review (+ is angi leads worth it, cost) | 720 + ~200 | 26 a 30 |
| EN | Facebook Ads for Leads | facebook ads for leads (+ lead form, lead gen) | 1,300 + 300 | 9 a 12 |
| EN | Google Ads vs Facebook Ads for Custom Closet Companies | google ads vs facebook ads / facebook ads vs google ads | 880 + 720 | 14 a 15 |
| EN | Facebook Ads vs Boost Post | facebook ads vs boost post (+ variantes) | 170 + 280 | 7 a 9 |
| EN | Facebook Ads for Contractors | facebook ads for contractors, home renovation facebook ads | 210 + 140 + 210 | 5 a 18 |
| ES | Thumbtack en español | thumbtack en español | 880 | 16 |
| ES | ¿Qué es un lead? | que es un lead | 170 | 6 |
| ES | Cómo hacer publicidad en Facebook | como hacer publicidad en facebook (+ anuncios en facebook) | 110 + 210 | 16 a 23 |
| ES | Angi Leads en español | angi leads en español (+ servicio al cliente, número) | ~140 | 14 a 40 |
| ES | Cómo conseguir clientes para tu negocio de closets | como conseguir clientes para mi negocio (+ construcción) | 40 + | 27 a 29 |

Datos de Ubersuggest, Estados Unidos, 20 de octubre de 2026. El mercado de búsquedas en español es pequeño: ahí el objetivo es dominar el nicho y que las IAs en español te citen, más que el volumen.

## 5. Checklist para lanzar en luishenaoai.online

1. Ajustes → Lectura: desmarcar "Disuade a los motores de búsqueda".
2. Verificar que `robots.txt` no bloquee a Googlebot (el del dominio temporal lo bloquea a propósito).
3. Verificar que no exista un `llms.txt` físico de la plantilla de Hostinger.
4. Google Search Console: agregar el dominio y enviar `/wp-sitemap.xml`.
5. Comprobar que la protección anti-bots de Hostinger no bloquee a GPTBot, ClaudeBot, PerplexityBot ni Google-Extended.
6. Crear el proyecto en Ubersuggest y la marca en AI Search Visibility.
