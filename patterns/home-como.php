<?php
/**
 * Title: Home · Cómo funciona
 * Slug: luishenao/home-como
 * Categories: lh-home, lh-secciones
 * Description: Intro fija a la izquierda y pasos que se apilan al hacer scroll.
 */

$lh_steps = array(
	array( '01', 'Te ven los home owners correctos', 'Tus anuncios aparecen frente a dueños de casa de tu zona que ya están pensando en un closet, con fotos y videos de tus propios trabajos.' ),
	array( '02', 'Los curiosos se quedan afuera', 'Antes de llegar a ti, cada persona confirma presupuesto, timeline y ubicación. Tú no pierdes ni un minuto filtrando.' ),
	array( '03', 'Tú solo hablas con compradores', 'Te llegan directo a tu WhatsApp, con un mensaje listo para responder rápido y agendar el estimate.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"como","className":"lh-sec lh-how"} -->
<section id="como" class="wp-block-group alignfull lh-sec lh-how"><!-- wp:group {"className":"lh-wrap lh-how-grid"} -->
<div class="wp-block-group lh-wrap lh-how-grid"><!-- wp:group {"className":"lh-how-intro"} -->
<div class="wp-block-group lh-how-intro"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Cómo funciona</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Tú haces closets. <em>Yo te traigo con quién.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">Sin dashboards que aprender ni reportes de 40 páginas. Tú sigues haciendo lo que mejor sabes hacer y yo me encargo de que lleguen las personas correctas.</p>
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
