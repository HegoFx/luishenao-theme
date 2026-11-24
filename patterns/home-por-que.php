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
<p class="is-style-label lh-r">Quién soy</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Hola, soy <em>Luis.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">Trabajo en marketing digital desde 2020, haciendo anuncios desde el inicio, además de SEO, analítica, contenido y sitios web, incluso en un proyecto global con un equipo de Zebra Technologies. Hace 2 años manejo Meta Ads, principalmente para una agencia en Florida, generando leads, citas y clientes nuevos cada mes. Además diseñé y gestioné más de 10 proyectos web en el último año.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">Por eso trabajo distinto. Mucha gente de anuncios se queda en el clic. Yo reviso todo el camino: el anuncio, la página, el mensaje y el seguimiento, porque ahí se pierden los leads.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">Ahora me enfoco en un solo nicho: negocios independientes de custom closets en USA. Trabajo con pocos negocios a la vez para dar atención real a cada uno.</p>
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
