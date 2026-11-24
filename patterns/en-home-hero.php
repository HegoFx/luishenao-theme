<?php
/**
 * Title: Home EN · Hero
 * Slug: luishenao/en-home-hero
 * Categories: lh-home
 * Description: Giant name, photo or video, headline and CTAs (English).
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
<p class="is-style-label lh-hide-m">Bilingual EN / ES · Based in Colombia</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label"><?php $lh_p = lh_pricing(); echo null === $lh_p['left'] ? 'Spots open' : esc_html( sprintf( 'Spots at %s: %d', lh_usd( $lh_p['tier']['price'] ), $lh_p['left'] ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-hero-stage"} -->
<div class="wp-block-group lh-hero-stage"><!-- wp:image {"sizeSlug":"full","className":"lh-ph lh-hero-img"} -->
<figure class="wp-block-image size-full lh-ph lh-hero-img"><img src="<?php echo lh_img( 'hero-luis.webp' ); ?>" alt="Luis Henao at his desk reviewing Meta Ads campaigns"/><figcaption class="wp-element-caption">AI placeholder → 6 to 8 s looping video of you talking to camera</figcaption></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"full","className":"lh-ph lh-hero-img-m"} -->
<figure class="wp-block-image size-full lh-ph lh-hero-img-m"><img src="<?php echo lh_img( 'luis-retrato.webp' ); ?>" alt="Luis Henao"/><figcaption class="wp-element-caption">AI placeholder → vertical version for phones</figcaption></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"lh-hero-copy"} -->
<div class="wp-block-group lh-hero-copy"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label">Hi, I'm Luis</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Get <em>pre-qualified homeowners</em> from your area.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Stop burning ad budget on tire-kickers. Before the estimate you already know if they are in your area, their budget, the product they need and their style.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#book">Book a call →</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#how">How it works</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"className":"is-style-label lh-note"} -->
<p class="is-style-label lh-note"><?php echo esc_html( 'Founder price ' . lh_usd( lh_pricing()['tier']['price'] ) . '/mo · 3 guarantees in writing · Everything is yours' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"lh-marquee"} -->
<p class="lh-marquee">Pre-qualified homeowners · Closet Ads System · 6 new ads a month · Custom closets only · Florida · Texas · Arizona · English and Spanish</p>
<!-- /wp:paragraph --></section>
<!-- /wp:group -->
