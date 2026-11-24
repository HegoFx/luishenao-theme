<?php
/**
 * Title: Home · Closet Ads System (cómo funciona)
 * Slug: luishenao/home-como
 * Categories: lh-home, lh-secciones
 * Description: Intro fija a la izquierda y pasos que se apilan al hacer scroll.
 */

$lh_steps = array(
	array( '01', 'Tu presupuesto solo llega a tu zona', 'Los anuncios se muestran solo a homeowners de tu zona de servicio. No pagas por gente que no puedes atender.' ),
	array( '02', 'Anuncios que no se ven como los de todos', '6 anuncios nuevos al mes (imagen, carrusel y video). Mientras la competencia repite lo mismo, los tuyos se notan y no se cansan.' ),
	array( '03', 'Lo que trae homeowners se queda, lo demás se apaga', 'Cada dólar medido hasta el estimate agendado. Ajustes cada 7 a 10 días para que tu dinero se mueva hacia lo que funciona, y un reporte mensual con números claros.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"como","className":"lh-sec lh-how"} -->
<section id="como" class="wp-block-group alignfull lh-sec lh-how"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:group {"className":"lh-how-intro"} -->
<div class="wp-block-group lh-how-intro"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Closet Ads System</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Cada dólar trabaja para traerte <em>homeowners listos para comprar.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">Así funciona el Closet Ads System, tanto si ya corres anuncios como si vas a lanzar los primeros. Todo lo que hacemos tiene un solo objetivo: que tu presupuesto te traiga homeowners que sí pueden comprar.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-how-grid"} -->
<div class="wp-block-group lh-how-grid"><!-- wp:group {"className":"lh-how-stage"} -->
<div class="wp-block-group lh-how-stage"><!-- wp:html -->
<?php echo lh_ui( 'stage' ); ?>
<!-- /wp:html --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-stack"} -->
<div class="wp-block-group lh-stack"><?php foreach ( $lh_steps as $lh_i => $s ) : ?><!-- wp:group {"className":"lh-step"} -->
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
<!-- /wp:group -->

<!-- wp:html -->
<div class="lh-ui lh-step-scene" aria-hidden="true"><div class="lh-ui-win"><?php echo lh_ui( 'scene-' . ( $lh_i + 1 ) ); ?></div></div>
<!-- /wp:html --></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
