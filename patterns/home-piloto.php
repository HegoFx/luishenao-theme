<?php
/**
 * Title: Home · El piloto y precio
 * Slug: luishenao/home-piloto
 * Categories: lh-home, lh-secciones
 * Description: Qué incluye, qué no y la tarjeta de precio con garantía.
 */
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"piloto","className":"lh-sec lh-pilot"} -->
<section id="piloto" class="wp-block-group alignfull lh-sec lh-pilot"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">El piloto</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Exactamente lo que recibes. <em>Y lo que no.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-pilot-grid"} -->
<div class="wp-block-group lh-pilot-grid"><!-- wp:group {"className":"lh-card lh-r-card"} -->
<div class="wp-block-group lh-card lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Qué incluye</h3>
<!-- /wp:heading -->

<?php echo lh_list( array(
	'Campaña de Meta Ads: home owners pre-filtrados',
	'Diseño de anuncios: imágenes, carruseles y edición de video',
	'Script de pre-filtrado para WhatsApp, Messenger e Instagram',
	'Revisión diaria de los home owners que van llegando',
	'Optimización de la campaña cada 7 a 10 días',
	'Reporte de resultados al cierre del mes',
) ); ?>

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Qué no incluye</h3>
<!-- /wp:heading -->

<?php echo lh_list( array( 'Publicaciones orgánicas en redes sociales' ), 'lh-checks is-no' ); ?>

<!-- wp:paragraph {"className":"lh-tip"} -->
<p class="lh-tip"><strong>Mi consejo honesto:</strong> sigue publicando en tu Instagram mientras corren los anuncios. Pauta y orgánico juntos funcionan mucho mejor.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-card lh-price lh-r-card"} -->
<div class="wp-block-group lh-card lh-price lh-r-card"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label">Precio piloto · por mes</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-amt"} -->
<p class="lh-amt">$650</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-anchor"} -->
<p class="lh-anchor">La tarifa estándar será de <s>$1,500/mes</s>. Los clientes piloto entran con $650.</p>
<!-- /wp:paragraph -->

<?php echo lh_list( array(
	'Meta: de 6 a 8 home owners pre-filtrados en el mes',
	'Presupuesto de anuncios mínimo $900/mes, en tu propia cuenta',
	'1 mes de prueba. Sin contratos largos',
	'Sin comisión sobre tus ventas',
), 'lh-dash' ); ?>

<!-- wp:paragraph {"className":"lh-guarantee"} -->
<p class="lh-guarantee"><strong>Garantía de 21 días.</strong> Si tu campaña no está montada y aprobada por Meta en 21 días, te devuelvo el 100% de la tarifa del piloto.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"lh-full"} -->
<div class="wp-block-buttons lh-full"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#aplicar">Aplica al piloto →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
