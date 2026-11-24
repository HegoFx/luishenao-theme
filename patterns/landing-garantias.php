<?php
/**
 * Title: Landing · Las 3 garantías
 * Slug: luishenao/landing-garantias
 * Categories: lh-home, lh-secciones
 * Description: Las 3 garantías de la oferta v6 y la frase legal (inc/offer.php).
 */
$lh_o = lh_offer();
$lh_g = array(
	array( 'Anuncios al aire en 21 días, o te devuelvo el primer mes', 'Si en 21 días tus anuncios no están activos y aprobados, te devuelvo el primer mes y quedas libre del mínimo de 3 meses. Los 21 días cuentan desde que me das los accesos y la info de tu negocio.' ),
	array( '20 homeowners prefiltrados en 60 días, o el tercer mes es gratis', 'Si no llegan 20 homeowners prefiltrados en los 60 días después de que tus anuncios salen al aire, el tercer mes va por mi cuenta. Aplica con mínimo $1,200 al mes en anuncios activos.' ),
	array( 'Tu cuenta, tus anuncios y tu CRM son tuyos', 'Si te vas, te llevas tu cuenta de anuncios y todos los anuncios que hicimos. Tu CRM va incluido el primer año y lo conservas hasta que termine ese año, aunque te vayas antes. Puedes exportar tus contactos cuando quieras.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"garantias","className":"lh-sec lh-dark lh-guarantees"} -->
<section id="garantias" class="wp-block-group alignfull lh-sec lh-dark lh-guarantees"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Garantías</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Tres garantías, <em>por escrito.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-three"} -->
<div class="wp-block-group lh-three"><?php foreach ( $lh_g as $i => $g ) : ?><!-- wp:group {"className":"lh-card lh-guarantee lh-r-card"} -->
<div class="wp-block-group lh-card lh-guarantee lh-r-card"><!-- wp:paragraph {"className":"lh-n"} -->
<p class="lh-n"><?php echo (int) $i + 1; ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $g[0] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $g[1] ); ?><?php if ( 1 === $i ) : ?> <a href="/condiciones-garantias/">Mira qué cuenta como prefiltrado →</a><?php endif; ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"lh-fine lh-r"} -->
<p class="lh-fine lh-r"><?php echo esc_html( $lh_o['legal']['es'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
