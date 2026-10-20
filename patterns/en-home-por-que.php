<?php
/**
 * Title: Home EN · Why me
 * Slug: luishenao/en-home-por-que
 * Categories: lh-home, lh-secciones
 * Description: Sticky portrait and list of differentiators (English).
 */

$lh_diffs = array(
	array( 'Automated pre-qualification', "I don't send you browsers. Homeowners go through a budget, timeline and location filter before they reach you." ),
	array( 'Custom closets only', 'I know your niche, your ticket size and the questions your buyers ask.' ),
	array( 'Bilingual, based in Colombia', 'I work on US hours from Colombia, with ads and scripts in English and Spanish. A real edge in Florida and Texas, where Hispanic homeowners are a big share of buyers.' ),
	array( 'A few clients, on purpose', 'You deal with me directly. Always.' ),
	array( '21-day launch guarantee', "If your campaign isn't live and approved by Meta within 21 days, I refund the full pilot fee." ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","className":"lh-sec lh-why"} -->
<section class="wp-block-group alignfull lh-sec lh-why"><!-- wp:group {"className":"lh-wrap lh-why-grid"} -->
<div class="wp-block-group lh-wrap lh-why-grid"><!-- wp:image {"sizeSlug":"large","className":"lh-ph lh-r-img lh-why-img"} -->
<figure class="wp-block-image size-large lh-ph lh-r-img lh-why-img"><img src="<?php echo lh_img( 'luis-retrato.webp' ); ?>" alt="Portrait of Luis Henao"/><figcaption class="wp-element-caption">AI placeholder → real portrait of you, natural light</figcaption></figure>
<!-- /wp:image -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Why work with me</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Not an agency. <em>Just Luis.</em></h2>
<!-- /wp:heading -->

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
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
