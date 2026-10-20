<?php
/**
 * Title: Home · Lo que ganas
 * Slug: luishenao/home-beneficios
 * Categories: lh-home, lh-secciones
 * Description: Cuatro beneficios para el dueño del negocio, en tarjetas: resultados, no herramientas.
 */

$lh_gains = array(
	array( '01', 'Tu tiempo vuelve a ser tuyo', 'Dejas de manejar a estimates de gente que solo está comparando precios. Cada visita es con alguien que ya dijo cuánto quiere invertir y cuándo.' ),
	array( '02', 'Un calendario que puedes planear', 'Ya no dependes de que un cliente le hable de ti a su vecino. Cada semana entran conversaciones nuevas con home owners de tu zona.' ),
	array( '03', 'Vendes más closets, no más llamadas', 'Hablas con menos gente, pero con la correcta. Más de tus estimates terminan en contrato y dejas de bajar el precio para ganar.' ),
	array( '04', 'Cero riesgo para empezar', 'Un mes de prueba, sin contratos largos ni comisión sobre tus ventas. Si la campaña no está lista en 21 días, te devuelvo el dinero.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"beneficios","className":"lh-sec lh-gains"} -->
<section id="beneficios" class="wp-block-group alignfull lh-sec lh-gains"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Lo que ganas</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Menos curiosos. <em>Más closets instalados.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-gains-grid"} -->
<div class="wp-block-group lh-gains-grid"><?php foreach ( $lh_gains as $g ) : ?><!-- wp:group {"className":"lh-card lh-gain lh-r-card"} -->
<div class="wp-block-group lh-card lh-gain lh-r-card"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label"><?php echo esc_html( $g[0] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $g[1] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $g[2] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
