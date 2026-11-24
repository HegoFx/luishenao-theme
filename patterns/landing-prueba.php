<?php
/**
 * Title: Landing · Prueba: análisis de anuncios
 * Slug: luishenao/landing-prueba
 * Categories: lh-secciones
 * Description: Línea de base + reels de Luis analizando anuncios de closets (prueba sin testimonios). Las URLs viven en inc/offer.php.
 */
$lh_o = lh_offer();
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"prueba","className":"lh-sec lh-dark lh-proof"} -->
<section id="prueba" class="wp-block-group alignfull lh-sec lh-dark lh-proof"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Desde Colombia · Trabajando con negocios de Custom Closets en USA</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Analizo anuncios reales de closets, <em>en voz alta.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-intro lh-r"} -->
<p class="lh-intro lh-r">Mira cómo analizo anuncios de marcas de closets: qué hacen bien y cómo los haría más ganadores.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="lh-reels"><?php foreach ( $lh_o['videos'] as $i => $url ) : ?><figure class="lh-reel lh-r-card"><?php if ( $url ) : ?><iframe src="<?php echo esc_url( trailingslashit( strtok( $url, '?' ) ) . 'embed' ); ?>" title="Análisis de anuncio <?php echo (int) $i + 1; ?>" loading="lazy" allowfullscreen></iframe><?php else : ?><div class="lh-reel-ph"><span>[CONFIRM] Reel de análisis <?php echo (int) $i + 1; ?></span></div><?php endif; ?></figure><?php endforeach; ?></div>
<!-- /wp:html --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
