<?php
/**
 * Title: Home · Cómo funciona
 * Slug: luishenao/home-como
 * Categories: lh-home, lh-secciones
 * Description: Intro fija a la izquierda y pasos que se apilan al hacer scroll.
 */

$lh_steps = array(
	array( '01', 'Meta Ads dirigidos a home owners de tu zona', 'Campañas para tu zona de servicio, con imágenes, carruseles y video hechos alrededor de trabajos reales de closets.' ),
	array( '02', 'Pre-filtro automático', 'Cada persona que responde recibe preguntas sobre presupuesto, timeline y ubicación. Los curiosos se quedan fuera.' ),
	array( '03', 'Directo a tu WhatsApp', 'Los home owners calificados llegan a tu WhatsApp, Messenger o Instagram, con un script listo para que respondas rápido.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"como","className":"lh-sec lh-how"} -->
<section id="como" class="wp-block-group alignfull lh-sec lh-how"><!-- wp:group {"className":"lh-wrap lh-how-grid"} -->
<div class="wp-block-group lh-wrap lh-how-grid"><!-- wp:group {"className":"lh-how-intro"} -->
<div class="wp-block-group lh-how-intro"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Cómo funciona</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Anuncios, un filtro y <em>una conversación.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">Sin dashboards que aprender. Sin reportes de 40 páginas. Recibes home owners que ya confirmaron presupuesto, timeline y ubicación antes de hablar contigo.</p>
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
