# Tracking de conversiones

Las conversiones de Google Ads y Meta salen de GoHighLevel (por servidor), no del sitio. El sitio solo hace dos cosas: medir visitas (Site Kit, Meta Pixel) y entregarle a GHL el identificador del clic para que la conversión se pueda atribuir al anuncio.

## Quién hace qué

| Qué | Dónde |
|---|---|
| GA4 y Search Console | Site Kit |
| Etiqueta base de Google Ads (remarketing) | Site Kit |
| Conversiones de Google Ads | GHL, con el `gclid` del lead |
| Meta Pixel (vistas, audiencias) | Código del tema (pendiente: ID del pixel) |
| Conversiones de Meta | GHL con Conversions API, deduplicadas con el pixel |
| Guardar `gclid`, `fbclid` y UTM y pasarlos a GHL | `assets/js/track.js` |

Regla: cada conversión se cuenta desde **una sola fuente**. Si la de GHL es la acción principal en Google Ads, la página de gracias no lleva otra etiqueta de conversión principal (puede quedar como secundaria para observar).

## Qué hace `track.js`

1. Cuando alguien llega con `gclid`, `gbraid`, `wbraid`, `fbclid`, `msclkid` o `utm_*` en la URL, los guarda en la cookie propia `lh_attr` por 90 días (los clics de Google Ads valen 90 días).
2. Último clic gana, y como set completo: un clic nuevo reemplaza todo, así no se mezclan UTMs de campañas distintas.
3. En cualquier página agrega esos parámetros a:
   - iframes de GHL (`leadconnectorhq.com`, `msgsndr.com` o dominio propio con `/widget/form|booking|survey/`), también los lazy de LiteSpeed (`data-src`) y los que aparecen después (popups);
   - enlaces a calendarios o formularios de GHL;
   - campos ocultos de formularios propios con `name="gclid"`, `name="utm_source"`, etc.
4. Deja los valores en `window.lhAttr` para depurar desde la consola.

Corre en el navegador, así que la caché de LiteSpeed no mezcla datos entre visitantes. No toca otros iframes (YouTube, mapas).

## Qué configurar en GHL

1. **Formulario o calendario:** agregar campos ocultos (custom fields) para `gclid`, `gbraid`, `wbraid`, `fbclid` y las UTM, cada uno con su *query key* igual al nombre del parámetro, para que se llenen desde la URL del iframe.
2. **Google Ads:** conectar la cuenta en Settings → Integrations → Google, y en el workflow del evento que importa (cita agendada, lead calificado, venta) usar la acción de conversión de Google Ads con el valor en dólares. Los nombres exactos del menú cambian seguido en GHL: verificarlos en la cuenta.
3. **Meta:** conectar Facebook en GHL y enviar el evento por Conversions API desde el mismo workflow, con el mismo `event_id` que el pixel si el pixel también lo dispara.
4. **En Google Ads:** crear la acción de conversión de tipo importación (offline/CRM) y marcarla como principal.

## Cómo probar

1. Abrir `https://<sitio>/?gclid=TEST123&utm_source=google&utm_campaign=prueba`.
2. Ir a la página del formulario. En la consola: `lhAttr` debe mostrar `gclid: "TEST123"`, y el `src` del iframe de GHL debe terminar en `&gclid=TEST123...`.
3. Enviar el formulario de prueba y revisar en el contacto de GHL que los campos ocultos quedaron llenos.

## Reutilizarlo en otro sitio

`track.js` no depende del tema: copiarlo y cargarlo en el `<head>` con `defer`. En Elementor u otro builder, pegarlo en un snippet de cabecera. Solo cambia el regex `GHL` si el formulario no es de GoHighLevel.
