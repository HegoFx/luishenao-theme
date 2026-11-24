<?php
/**
 * Title: Home EN · Closet Ads Lab (how it works)
 * Slug: luishenao/en-home-como
 * Categories: lh-home, lh-secciones
 * Description: Sticky intro on the left and steps that stack on scroll (English).
 */

$lh_steps = array(
	array( '01', 'Only your homeowners see the ads', 'Ads are shown only to homeowners in your service area. People who are not your ideal client are left out from day one.' ),
	array( '02', 'New ads every month', '6 new ads a month (image, carousel and video), with angles different from what every other closet company is running.' ),
	array( '03', 'Measure, cut, adjust', 'Every dollar tracked to the booked estimate. What does not work gets turned off. Adjustments every 7 to 10 days, and a monthly report with clear numbers.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"how","className":"lh-sec lh-how"} -->
<section id="how" class="wp-block-group alignfull lh-sec lh-how"><!-- wp:group {"className":"lh-wrap lh-how-grid"} -->
<div class="wp-block-group lh-wrap lh-how-grid"><!-- wp:group {"className":"lh-how-intro"} -->
<div class="wp-block-group lh-how-intro"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Closet Ads Lab</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">A lab for your ads. <em>We measure everything.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">Not "Facebook and Instagram campaigns". A lab for your ads: we measure everything and test new angles every month.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-stack"} -->
<div class="wp-block-group lh-stack"><?php foreach ( $lh_steps as $s ) : ?><!-- wp:group {"className":"lh-step"} -->
<div class="wp-block-group lh-step"><!-- wp:group {"className":"lh-step-row"} -->
<div class="wp-block-group lh-step-row"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label">Step</p>
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
