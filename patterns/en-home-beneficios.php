<?php
/**
 * Title: Home EN · What you get
 * Slug: luishenao/en-home-beneficios
 * Categories: lh-home, lh-secciones
 * Description: Four owner benefits in cards: outcomes, not tools (English).
 */

$lh_gains = array(
	array( '01', 'Your time is yours again', 'No more driving across town to quote people who are just shopping around. Every estimate you run is with someone who already shared their budget and timing.' ),
	array( '02', 'A calendar you can plan', 'You stop waiting on word of mouth. New conversations with homeowners in your area come in every week.' ),
	array( '03', 'Sell more closets, not more calls', 'You talk to fewer people, but the right ones. More of your estimates turn into signed jobs and you stop discounting to win.' ),
	array( '04', 'Zero risk to start', "A one-month trial with no long-term contract and no commission on your sales. If the campaign isn't live in 21 days, you get your money back." ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"benefits","className":"lh-sec lh-gains"} -->
<section id="benefits" class="wp-block-group alignfull lh-sec lh-gains"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">What you get</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Fewer tire kickers. <em>More closets installed.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-gains-grid"} -->
<div class="wp-block-group lh-gains-grid"><?php foreach ( $lh_gains as $g ) : ?><!-- wp:group {"className":"lh-card lh-gain lh-r-card"} -->
<div class="wp-block-group lh-card lh-gain lh-r-card"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label"><?php echo esc_html( $g[0] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $g[1] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $g[2] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
