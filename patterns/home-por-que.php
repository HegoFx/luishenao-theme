<?php
/**
 * Title: Home · Por qué conmigo
 * Slug: luishenao/home-por-que
 * Categories: lh-home, lh-secciones
 * Description: Retrato fijo y lista de diferenciales.
 */

$lh_diffs = array(
	array( 'Pre-filtro automatizado', 'No te mando curiosos. Los home owners pasan por un filtro de presupuesto, timeline y ubicación antes de llegar a ti.' ),
	array( 'Solo custom closets', 'Conozco tu nicho, tu ticket y las preguntas que hacen tus compradores.' ),
	array( 'Bilingüe EN / ES', 'Una ventaja real en Florida, donde los compradores hispanos son una parte grande del mercado. Anuncios y scripts en los dos idiomas.' ),
	array( 'Pocos clientes, a propósito', 'Hablas conmigo directamente. Siempre.' ),
	array( 'Garantía de ejecución de 21 días', 'Si tu campaña no está montada y aprobada por Meta en 21 días, te devuelvo toda la tarifa del piloto.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","className":"lh-sec lh-why"} -->
<section class="wp-block-group alignfull lh-sec lh-why"><!-- wp:group {"className":"lh-wrap lh-why-grid"} -->
<div class="wp-block-group lh-wrap lh-why-grid"><!-- wp:image {"sizeSlug":"large","className":"lh-ph lh-r-img lh-why-img"} -->
<figure class="wp-block-image size-large lh-ph lh-r-img lh-why-img"><img src="<?php echo lh_img( 'luis-retrato.jpg' ); ?>" alt="Retrato de Luis Henao"/><figcaption class="wp-element-caption">Placeholder IA → retrato real tuyo, luz natural</figcaption></figure>
<!-- /wp:image -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Por qué trabajar conmigo</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">No soy una agencia. <em>Soy Luis.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-diffs"} -->
<div class="wp-block-group lh-diffs"><?php foreach ( $lh_diffs as $i => $d ) : ?><!-- wp:group {"className":"lh-diff lh-r"} -->
<div class="wp-block-group lh-diff lh-r"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label"><?php printf( '%02d', $i + 1 ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $d[0] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $d[1] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
