<?php
/**
 * Title: Landing EN · Price and spots
 * Slug: luishenao/en-landing-precio
 * Categories: lh-home, lh-secciones
 * Description: Price ladder and real spots read from inc/offer.php (spots_taken). Never a fake counter. English.
 */
$lh_o = lh_offer();
$lh_p = lh_pricing();
$lh_tier = fn( $t ) => null === $t['to'] ? sprintf( 'Clients %d and up', $t['from'] ) : sprintf( 'Clients %d to %d', $t['from'], $t['to'] );
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"price","className":"lh-sec lh-pilot lh-pricing"} -->
<section id="price" class="wp-block-group alignfull lh-sec lh-pilot lh-pricing"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Price and spots</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Founder pricing, <em>real spots.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-pilot-grid"} -->
<div class="wp-block-group lh-pilot-grid"><!-- wp:group {"className":"lh-card lh-price lh-r-card"} -->
<div class="wp-block-group lh-card lh-price lh-r-card"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label">Current price · per month</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-amt"} -->
<p class="lh-amt"><?php echo esc_html( lh_usd( $lh_p['tier']['price'] ) ); ?></p>
<!-- /wp:paragraph -->

<?php if ( null !== $lh_p['left'] ) : ?><!-- wp:html -->
<div class="lh-spots"><p><strong><?php printf( '%d of %d spots left at this price', (int) $lh_p['left'], (int) $lh_p['size'] ); ?></strong></p><div class="lh-spots-bar" aria-hidden="true"><?php for ( $i = 0; $i < $lh_p['size']; $i++ ) : ?><span<?php echo $i < $lh_p['size'] - $lh_p['left'] ? ' class="is-taken"' : ''; ?>></span><?php endfor; ?></div></div>
<!-- /wp:html --><?php endif; ?>

<?php if ( $lh_p['next_tier'] ) : ?><!-- wp:paragraph {"className":"lh-anchor"} -->
<p class="lh-anchor"><?php printf( 'Then %s/month', esc_html( lh_usd( $lh_p['next_tier']['price'] ) ) ); ?></p>
<!-- /wp:paragraph --><?php endif; ?>

<?php echo lh_list( array(
	sprintf( '%d-month minimum. After that, month to month with 30 days\' notice to cancel', $lh_o['min_months'] ),
	sprintf( 'Minimum ad budget of %s/month, paid directly to Meta from your own ad account', lh_usd( $lh_o['min_spend'] ) ),
	'Access and material sent on time',
), 'lh-dash' ); ?>

<!-- wp:buttons {"className":"lh-full"} -->
<div class="wp-block-buttons lh-full"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#book">Book a call →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-card lh-r-card"} -->
<div class="wp-block-group lh-card lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">The ladder</h3>
<!-- /wp:heading -->

<!-- wp:html -->
<ol class="lh-ladder"><?php foreach ( $lh_o['tiers'] as $i => $t ) : ?><li class="<?php echo $i === $lh_p['index'] ? 'is-now' : ( $i < $lh_p['index'] ? 'is-full' : '' ); ?>"><span><?php echo esc_html( $lh_tier( $t ) ); ?></span><span><?php echo esc_html( lh_usd( $t['price'] ) ); ?>/mo<?php echo $i === $lh_p['index'] ? ' <em>Now</em>' : ( $i < $lh_p['index'] ? ' <em>Full</em>' : '' ); ?></span></li><?php endforeach; ?></ol>
<!-- /wp:html -->

<!-- wp:paragraph {"className":"lh-tip"} -->
<p class="lh-tip">You keep your price for life while your subscription stays active with no interruptions. The system will keep improving and gaining features: every update is included in your founder price. If you cancel and come back, you pay the price at that time.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
