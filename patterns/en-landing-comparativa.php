<?php
/**
 * Title: Landing EN · Options compared
 * Slug: luishenao/en-landing-comparativa
 * Categories: lh-secciones
 * Description: Lead platforms vs referrals vs the pilot, in three cards (English).
 */

$lh_options = array(
	array( 'Angi, Thumbtack and the like', 'lh-checks is-no', array(
		'The same lead is sold to several contractors',
		"You're competing on price from the first message",
		'You pay even when the homeowner never answers',
		"You build the platform's brand, not yours",
	) ),
	array( 'Referrals only', 'lh-checks is-no', array(
		"They're your best clients, that doesn't change",
		"But you can't turn them on when you need them",
		'One month is packed, the next one is empty',
		'Your calendar depends on what others say about you',
	) ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","className":"lh-sec lh-compare"} -->
<section class="wp-block-group alignfull lh-sec lh-compare"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Why not just buy leads</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Leads that are yours, <em>not shared.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-three"} -->
<div class="wp-block-group lh-three"><?php foreach ( $lh_options as $o ) : ?><!-- wp:group {"className":"lh-card lh-r-card"} -->
<div class="wp-block-group lh-card lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $o[0] ); ?></h3>
<!-- /wp:heading -->

<?php echo lh_list( $o[2], $o[1] ); ?></div>
<!-- /wp:group --><?php endforeach; ?><!-- wp:group {"className":"lh-card lh-price lh-r-card"} -->
<div class="wp-block-group lh-card lh-price lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">With the pilot</h3>
<!-- /wp:heading -->

<?php echo lh_list( array(
	'Every homeowner is yours alone',
	'Pre-qualified on budget, timeline and area',
	'Your brand, your work and your own ad account',
	'You turn it on and scale it when you want',
), 'lh-dash' ); ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
