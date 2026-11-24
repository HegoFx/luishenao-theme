<?php
/**
 * Title: Home · Closet Ads Lab (cómo funciona)
 * Slug: luishenao/home-como
 * Categories: lh-home, lh-secciones
 * Description: Intro fija a la izquierda y pasos que se apilan al hacer scroll.
 */

$lh_steps = array(
	array( '01', 'Solo tus homeowners ven los anuncios', 'Los anuncios se muestran solo a homeowners de tu zona de servicio. Quien no es tu cliente ideal queda fuera desde el día uno.' ),
	array( '02', 'Anuncios nuevos cada mes', '6 anuncios nuevos al mes (imagen, carrusel y video), con ángulos distintos a los que corre el resto del mercado.' ),
	array( '03', 'Medir, apagar, ajustar', 'Cada dólar medido hasta el estimate agendado. Lo que no funciona se apaga. Ajustes cada 7 a 10 días y un reporte mensual con números claros.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"como","className":"lh-sec lh-how"} -->
<section id="como" class="wp-block-group alignfull lh-sec lh-how"><!-- wp:group {"className":"lh-wrap lh-how-grid"} -->
<div class="wp-block-group lh-wrap lh-how-grid"><!-- wp:group {"className":"lh-how-intro"} -->
<div class="wp-block-group lh-how-intro"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Closet Ads Lab</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Un laboratorio para tus anuncios. <em>Medimos todo.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">No son "campañas en Facebook e Instagram". Es un laboratorio de anuncios: medimos todo y probamos ángulos nuevos cada mes.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-stack"} -->
<div class="wp-block-group lh-stack"><?php foreach ( $lh_steps as $s ) : ?><!-- wp:group {"className":"lh-step"} -->
<div class="wp-block-group lh-step"><!-- wp:group {"className":"lh-step-row"} -->
<div class="wp-block-group lh-step-row"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label">Paso</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-n"} -->
<p class="lh-n"><?php echo esc_html( $s[0] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $s[1] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $s[2] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
