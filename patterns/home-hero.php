<?php
/**
 * Title: Home · Hero
 * Slug: luishenao/home-hero
 * Categories: lh-home
 * Description: Nombre gigante, foto o video, titular y CTAs. Las puertas y los leads en vivo los agrega el tema.
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"lh-sec lh-hero"} -->
<section class="wp-block-group alignfull lh-sec lh-hero"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"lh-wordmark"} -->
<p class="lh-wordmark">LUIS HENAO</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"lh-hero-meta"} -->
<div class="wp-block-group lh-hero-meta"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label">Meta Ads · Custom closets · USA</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"is-style-label lh-hide-m"} -->
<p class="is-style-label lh-hide-m">Desde Colombia, en spanglish</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label"><?php $lh_p = lh_pricing(); echo null === $lh_p['left'] ? 'Cupos abiertos' : esc_html( sprintf( 'Cupos a %s: %d', lh_usd( $lh_p['tier']['price'] ), $lh_p['left'] ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-hero-stage"} -->
<div class="wp-block-group lh-hero-stage"><!-- wp:image {"sizeSlug":"full","className":"lh-ph lh-hero-img"} -->
<figure class="wp-block-image size-full lh-ph lh-hero-img"><img src="<?php echo lh_img( 'hero-luis.webp' ); ?>" alt="Luis Henao en su escritorio revisando campañas de Meta Ads"/><figcaption class="wp-element-caption">Placeholder IA → aquí va: video tuyo de 6–8 s en loop, hablando a cámara</figcaption></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"full","className":"lh-ph lh-hero-img-m"} -->
<figure class="wp-block-image size-full lh-ph lh-hero-img-m"><img src="<?php echo lh_img( 'luis-retrato.webp' ); ?>" alt="Luis Henao"/><figcaption class="wp-element-caption">Placeholder IA → versión vertical para celular</figcaption></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"lh-hero-copy"} -->
<div class="wp-block-group lh-hero-copy"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label">Hola, soy Luis</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Recibe <em>homeowners prefiltrados</em> de tu zona.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>No quemes más presupuesto en curiosos. Antes del estimate ya sabes si están en tu zona, qué presupuesto tienen, qué producto necesitan y en qué estilo.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#agendar">Agenda una llamada →</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#como">Cómo funciona</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"className":"is-style-label lh-note"} -->
<p class="is-style-label lh-note"><?php echo esc_html( 'Precio de fundador ' . lh_usd( lh_pricing()['tier']['price'] ) . '/mes · 3 garantías por escrito · Todo es tuyo' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"lh-marquee"} -->
<p class="lh-marquee">Homeowners prefiltrados · Closet Ads System · 6 anuncios nuevos al mes · Solo custom closets · Florida · Texas · Arizona · Español e inglés</p>
<!-- /wp:paragraph --></section>
<!-- /wp:group -->
