<?php
/**
 * Title: Home EN · Who I am
 * Slug: luishenao/en-home-por-que
 * Categories: lh-home, lh-secciones
 * Description: Sticky portrait and list of differentiators (English).
 */

$lh_o     = lh_offer();
$lh_diffs = array(
	array( 'I measure before I spend', 'Every dollar tracked from the ad to the booked estimate.' ),
	array( 'New ads every month', 'Different angles, formats and visuals.' ),
	array( 'Direct contact', 'You talk to me, not an account manager.' ),
	array( 'Bilingual', 'English and Spanish.' ),
	array( 'Everything is yours', 'Ad account, creatives and CRM.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","className":"lh-sec lh-why"} -->
<section class="wp-block-group alignfull lh-sec lh-why"><!-- wp:group {"className":"lh-wrap lh-why-grid"} -->
<div class="wp-block-group lh-wrap lh-why-grid"><!-- wp:image {"sizeSlug":"large","className":"lh-ph lh-r-img lh-why-img"} -->
<figure class="wp-block-image size-large lh-ph lh-r-img lh-why-img"><img src="<?php echo lh_img( 'luis-retrato.webp' ); ?>" alt="Portrait of Luis Henao"/><figcaption class="wp-element-caption">Placeholder → real portrait of you, natural light [CONFIRM]</figcaption></figure>
<!-- /wp:image -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Who I am</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Hi, I'm <em>Luis.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">I've worked in digital marketing since 2020: ads, SEO, analytics, content and websites, including a global project with a team at Zebra Technologies.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">I chose custom closets because I saw a clear opportunity. Most ads in this niche look the same: the same photos, the same promos, the same "free consultation". When everyone says the same thing, homeowners pick on price or go with the biggest brand.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">That is where an independent business has the edge. With more creative ads, a sharper strategy and every dollar measured, you can go head to head with the franchises and win homeowners in your own area.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">That's why I take only a few businesses at a time and look at the whole path: the ad, the page, the message and the follow-up. And I talk to you in clear numbers.</p>
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
<p class="lh-r lh-ig"><?php echo $lh_o['instagram'] ? '<a href="' . esc_url( $lh_o['instagram'] ) . '" target="_blank" rel="noopener">Follow me on Instagram</a>' : lh_confirm( 'Instagram' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
