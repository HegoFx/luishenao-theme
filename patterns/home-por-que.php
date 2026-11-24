<?php
/**
 * Title: Home · Quién soy
 * Slug: luishenao/home-por-que
 * Categories: lh-home, lh-secciones
 * Description: Retrato fijo y lista de diferenciales.
 */

$lh_o     = lh_offer();
$lh_diffs = array(
	array( 'Mido antes de gastar', 'Cada dólar seguido hasta el estimate agendado.' ),
	array( 'Anuncios nuevos cada mes', 'Ángulos, formatos y visuales distintos.' ),
	array( 'Trato directo', 'Hablas conmigo, no con un account manager.' ),
	array( 'Bilingüe', 'Inglés y español. Una ventaja real con compradores hispanos en Florida.' ),
	array( 'Todo es tuyo', 'Cuenta de anuncios, creativos y CRM.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","className":"lh-sec lh-why"} -->
<section class="wp-block-group alignfull lh-sec lh-why"><!-- wp:group {"className":"lh-wrap lh-why-grid"} -->
<div class="wp-block-group lh-wrap lh-why-grid"><!-- wp:image {"sizeSlug":"large","className":"lh-ph lh-r-img lh-why-img"} -->
<figure class="wp-block-image size-large lh-ph lh-r-img lh-why-img"><img src="<?php echo lh_img( 'luis-retrato.webp' ); ?>" alt="Retrato de Luis Henao"/><figcaption class="wp-element-caption">Placeholder → retrato real tuyo, luz natural [CONFIRM]</figcaption></figure>
<!-- /wp:image -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Desde Colombia · Trabajando con negocios de custom closets en USA</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Hola, soy <em>Luis.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">Trabajo en marketing digital desde 2020: anuncios, SEO, analítica, contenido y sitios web, incluso en un proyecto global con un equipo de Zebra Technologies.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">Elegí los custom closets porque vi una oportunidad clara. La mayoría de los anuncios del nicho se parecen: las mismas fotos, las mismas promos, el mismo "free consultation". Cuando todos dicen lo mismo, el homeowner elige por precio o por la marca más grande.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">Ahí está la ventaja de un negocio independiente. Con anuncios más creativos, una estrategia mejor pensada y cada dólar medido, puedes competir de tú a tú con las franquicias y ganarles homeowners en tu propia zona.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">Por eso trabajo con pocos negocios a la vez y reviso todo el camino: el anuncio, la página, el mensaje y el seguimiento. Y te hablo con números claros.</p>
<!-- /wp:paragraph -->

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
<!-- /wp:group -->

<!-- wp:paragraph {"className":"lh-r lh-ig"} -->
<p class="lh-r lh-ig"><?php echo $lh_o['instagram'] ? '<a href="' . esc_url( $lh_o['instagram'] ) . '" target="_blank" rel="noopener">Sígueme en Instagram</a>' : lh_confirm( 'Instagram' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
