<?php
/**
 * Title: Home EN · How it works
 * Slug: luishenao/en-home-como
 * Categories: lh-home, lh-secciones
 * Description: Sticky intro on the left and steps that stack on scroll (English).
 */

$lh_steps = array(
	array( '01', 'The right homeowners see you', 'Your ads show up for homeowners in your service area who are already thinking about a closet, using photos and video of your own work.' ),
	array( '02', 'Tire kickers drop off', "Before they reach you, every lead confirms budget, timeline and location. You don't spend a minute screening." ),
	array( '03', 'You only talk to buyers', "They're texted straight to your phone and saved in your CRM, with a reply ready so you can book the estimate fast." ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"how","className":"lh-sec lh-how"} -->
<section id="how" class="wp-block-group alignfull lh-sec lh-how"><!-- wp:group {"className":"lh-wrap lh-how-grid"} -->
<div class="wp-block-group lh-wrap lh-how-grid"><!-- wp:group {"className":"lh-how-intro"} -->
<div class="wp-block-group lh-how-intro"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">How it works</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">You build closets. <em>I bring you the buyers.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">No dashboards to learn, no 40-page reports. You keep doing what you do best and I make sure the right people show up.</p>
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
