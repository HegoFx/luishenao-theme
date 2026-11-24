<?php
/**
 * Title: Home EN · What you get and bonuses
 * Slug: luishenao/en-home-piloto
 * Categories: lh-home, lh-secciones
 * Description: The 7 deliverables of the v6 offer, bonuses and what is not included (English). Price lives in en-landing-precio.
 */
$lh_o     = lh_offer();
$lh_items = array(
	array( 'Closet Ads Lab', 'Ads shown only to homeowners in your area, 6 new ads a month, every dollar tracked to the booked estimate, adjustments every 7 to 10 days.' ),
	array( 'Pre-qualified homeowners', 'Homeowners in your area with a valid phone and email who already told you their budget range, the type of project and when they want it done.' ),
	array( 'Instant email alert', 'You get an email every time a homeowner comes in or books an estimate.' ),
	array( 'Sales board', 'See every homeowner by stage of your sales process, in one place.' ),
	array( 'Automatic scheduling', 'Homeowners can book straight on your calendar and get email reminders before the visit.' ),
	array( 'Follow-up on sent quotes', 'The board tells you which quotes have gone days without an answer, so none slip through.' ),
	array( 'Monthly report', 'What you spent, how many homeowners came in, how many booked. Clear numbers, no fluff.' ),
);
$lh_bonus = array(
	array( 'One-page landing for your business', 'built to turn ad visitors into booked estimates. A full website is quoted separately, with a special founder price' ),
	array( 'Google Maps profile optimization', 'one time' ),
	array( 'Your CRM, included the first year', 'reference value ' . lh_usd( $lh_o['crm_value'] ) . ' a year, with all its automations. It is yours (see guarantee 3)' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"offer","className":"lh-sec lh-pilot"} -->
<section id="offer" class="wp-block-group alignfull lh-sec lh-pilot"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">What you get</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Everything you get <em>every month.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-gains-grid lh-get"} -->
<div class="wp-block-group lh-gains-grid lh-get"><?php foreach ( $lh_items as $i => $g ) : ?><!-- wp:group {"className":"lh-card lh-gain lh-r-card"} -->
<div class="wp-block-group lh-card lh-gain lh-r-card"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label"><?php printf( '%02d', $i + 1 ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $g[0] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $g[1] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-pilot-grid"} -->
<div class="wp-block-group lh-pilot-grid"><!-- wp:group {"className":"lh-card lh-r-card lh-bonus"} -->
<div class="wp-block-group lh-card lh-r-card lh-bonus"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label">Bonuses</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Included at no extra cost</h3>
<!-- /wp:heading -->

<?php echo lh_list( array_map( fn( $b ) => $b[0] . ': ' . $b[1], $lh_bonus ) ); ?>

<!-- wp:paragraph {"className":"lh-tip"} -->
<p class="lh-tip">Domain and hosting are paid by you.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-card lh-r-card"} -->
<div class="wp-block-group lh-card lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Not included</h3>
<!-- /wp:heading -->

<?php echo lh_list( array( 'SEO or blog', 'Google Ads', 'Organic social content', 'Automatic text messages', 'AI chat assistants', 'Review management' ), 'lh-checks is-no' ); ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
