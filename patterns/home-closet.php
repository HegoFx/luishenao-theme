<?php
/**
 * Title: Home · Barra de closet
 * Slug: luishenao/home-closet
 * Categories: lh-home
 * Description: Scroll horizontal con tarjetas colgadas de una barra. Cada tarjeta es un grupo "lh-hanger": duplica uno para agregar más.
 */

$lh_cards = array(
	array( 'img', 'bts-grabando.jpg', 'Luis grabando un anuncio en un showroom de closets', 'Placeholder IA → foto real: tú grabando un anuncio', '01 · Contenido', 'Grabo y edito anuncios alrededor de trabajos reales de closets.' ),
	array( 'stat', 'Speed to lead', '21x', 'más probabilidad de convertir', 'cuando contactas un lead en menos de 5 minutos. Fuente: Harvard Business Review.' ),
	array( 'img', 'whatsapp-manos.jpg', 'Lead llegando a WhatsApp', 'Placeholder IA → pantallazo real de un lead (datos censurados)', '02 · Pre-filtro', 'El lead llega a tu WhatsApp con presupuesto, timeline y zip code confirmados.' ),
	array( 'stat', 'Primera respuesta', '78%', 'le compra a quien responde primero', 'Por eso el script de respuesta va incluido.' ),
	array( 'img', 'reunion-dueno.jpg', 'Luis revisando una campaña con un dueño de negocio de closets', 'Placeholder IA → foto real: llamada o visita con un cliente', '03 · Trato directo', 'Hablas conmigo. No eres la cuenta número 847 de un junior.' ),
	array( 'img', 'homeowners-closet.jpg', 'Home owners en su nuevo walk-in closet', 'Placeholder IA → closet terminado de un cliente', '04 · El objetivo', 'Menos estimates perdidos. Más closets instalados.' ),
	array( 'stat', 'Tu mercado', '$13.7B', 'en custom closets en Norteamérica', 'creciendo 7.2% al año. Fuente: Business Research Insights 2026.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"pruebas","className":"lh-sec lh-dark lh-rod"} -->
<section id="pruebas" class="wp-block-group alignfull lh-sec lh-dark lh-rod"><!-- wp:group {"className":"lh-wrap lh-rod-head"} -->
<div class="wp-block-group lh-wrap lh-rod-head"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Lo que cuelga en mi closet</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Nada de promesas. <em>Pruebas.</em></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">Cómo trabajo, qué recibes y por qué los números importan. Desliza.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-rod-track"} -->
<div class="wp-block-group lh-rod-track"><?php foreach ( $lh_cards as $c ) : ?><!-- wp:group {"className":"lh-hanger"} -->
<div class="wp-block-group lh-hanger"><?php if ( 'img' === $c[0] ) : ?><!-- wp:group {"className":"lh-tagcard"} -->
<div class="wp-block-group lh-tagcard"><!-- wp:image {"sizeSlug":"large","className":"lh-ph"} -->
<figure class="wp-block-image size-large lh-ph"><img src="<?php echo lh_img( $c[1] ); ?>" alt="<?php echo esc_attr( $c[2] ); ?>"/><figcaption class="wp-element-caption"><?php echo esc_html( $c[3] ); ?></figcaption></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"lh-cap"} -->
<div class="wp-block-group lh-cap"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label"><?php echo esc_html( $c[4] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $c[5] ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group --><?php else : ?><!-- wp:group {"className":"lh-tagcard is-stat"} -->
<div class="wp-block-group lh-tagcard is-stat"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label"><?php echo esc_html( $c[1] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-num"} -->
<p class="lh-num"><?php echo esc_html( $c[2] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $c[3] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $c[4] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><?php endif; ?></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
