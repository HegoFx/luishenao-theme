<?php
/**
 * Title: Landing EN · The 3 guarantees
 * Slug: luishenao/en-landing-garantias
 * Categories: lh-home, lh-secciones
 * Description: The 3 guarantees of the v6 offer and the legal line (inc/offer.php), English.
 */
$lh_o = lh_offer();
$lh_g = array(
	array( 'Live in 21 days, or your first month back', 'If your ads aren\'t live and approved within 21 days, we refund your first month and you\'re free from the 3-month minimum. The 21 days start when you\'ve sent us your account access and business info.' ),
	array( '20 pre-qualified homeowners in 60 days, or month 3 is free', 'If you don\'t get 20 pre-qualified homeowners within 60 days of your ads going live, your third month is on us. Requires at least $1,200/month in active ad spend.' ),
	array( 'Your ad account, your ads and your CRM are yours', 'If you leave, you keep your ad account and every ad we made. Your CRM is included for your first year, and you keep it until that year ends even if you leave earlier. You can export your contacts anytime.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"guarantees","className":"lh-sec lh-dark lh-guarantees"} -->
<section id="guarantees" class="wp-block-group alignfull lh-sec lh-dark lh-guarantees"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Guarantees</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Three guarantees, <em>in writing.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-three"} -->
<div class="wp-block-group lh-three"><?php foreach ( $lh_g as $i => $g ) : ?><!-- wp:group {"className":"lh-card lh-guarantee lh-r-card"} -->
<div class="wp-block-group lh-card lh-guarantee lh-r-card"><!-- wp:paragraph {"className":"lh-n"} -->
<p class="lh-n"><?php echo (int) $i + 1; ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $g[0] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $g[1] ); ?><?php if ( 1 === $i ) : ?> <a href="/en/guarantee-terms/">See what counts as pre-qualified →</a><?php endif; ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"lh-fine lh-r"} -->
<p class="lh-fine lh-r"><?php echo esc_html( $lh_o['legal']['en'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
