<?php
/**
 * Title: Landing · Comparativa de opciones
 * Slug: luishenao/landing-comparativa
 * Categories: lh-secciones
 * Description: Plataformas de leads vs referidos vs el piloto, en tres tarjetas.
 */

$lh_options = array(
	array( 'Angi, Thumbtack y similares', 'lh-checks is-no', array(
		'El mismo lead se le vende a varios contratistas',
		'Compites por precio desde el primer mensaje',
		'Pagas aunque el home owner nunca conteste',
		'Construyes la marca de la plataforma, no la tuya',
	) ),
	array( 'Solo referidos', 'lh-checks is-no', array(
		'Son tus mejores clientes, eso no cambia',
		'Pero no los puedes encender cuando los necesitas',
		'Un mes lleno y el siguiente vacío',
		'Tu calendario depende de lo que otros digan de ti',
	) ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","className":"lh-sec lh-compare"} -->
<section class="wp-block-group alignfull lh-sec lh-compare"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Por qué no solo comprar leads</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Leads tuyos, <em>no compartidos.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-three"} -->
<div class="wp-block-group lh-three"><?php foreach ( $lh_options as $o ) : ?><!-- wp:group {"className":"lh-card lh-r-card"} -->
<div class="wp-block-group lh-card lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $o[0] ); ?></h3>
<!-- /wp:heading -->

<?php echo lh_list( $o[2], $o[1] ); ?></div>
<!-- /wp:group --><?php endforeach; ?><!-- wp:group {"className":"lh-card lh-price lh-r-card"} -->
<div class="wp-block-group lh-card lh-price lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Con el piloto</h3>
<!-- /wp:heading -->

<?php echo lh_list( array(
	'Cada home owner es solo para ti',
	'Llega pre-filtrado por presupuesto, timeline y zona',
	'Tu marca, tus trabajos y tu propia cuenta de anuncios',
	'Lo enciendes y lo escalas cuando tú quieras',
), 'lh-dash' ); ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
