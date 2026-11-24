<?php
/**
 * Title: Home EN · Closet Ads System (how it works)
 * Slug: luishenao/en-home-como
 * Categories: lh-home, lh-secciones
 * Description: Sticky intro on the left and steps that stack on scroll (English).
 */

$lh_steps = array(
	array( '01', 'Your budget only reaches your area', 'Ads are shown only to homeowners in your service area. You do not pay for people you cannot serve.' ),
	array( '02', 'Ads that do not look like everyone else’s', '6 new ads a month (image, carousel and video). While competitors repeat the same thing, yours stand out and stay fresh.' ),
	array( '03', 'What brings homeowners stays, the rest gets cut', 'Every dollar tracked to the booked estimate. Adjustments every 7 to 10 days so your money moves to what works, and a monthly report with clear numbers.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"how","className":"lh-sec lh-how"} -->
<section id="how" class="wp-block-group alignfull lh-sec lh-how"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:group {"className":"lh-how-intro"} -->
<div class="wp-block-group lh-how-intro"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Closet Ads System</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Every dollar works to bring you <em>homeowners ready to buy.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">This is how the Closet Ads System works, whether you already run ads or are about to launch your first ones. Everything we do has one goal: your budget brings you homeowners who can actually buy.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-how-grid"} -->
<div class="wp-block-group lh-how-grid"><!-- wp:group {"className":"lh-how-stage"} -->
<div class="wp-block-group lh-how-stage"><!-- wp:html -->
<?php echo lh_ui( 'stage' ); ?>
<!-- /wp:html --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-stack"} -->
<div class="wp-block-group lh-stack"><?php foreach ( $lh_steps as $lh_i => $s ) : ?><!-- wp:group {"className":"lh-step"} -->
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
<!-- /wp:group -->

<!-- wp:html -->
<div class="lh-ui lh-step-scene" aria-hidden="true"><div class="lh-ui-win"><?php echo lh_ui( 'scene-' . ( $lh_i + 1 ) ); ?></div></div>
<!-- /wp:html --></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
