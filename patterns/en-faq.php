<?php
/**
 * Title: FAQ (English)
 * Slug: luishenao/en-faq
 * Categories: lh-home, lh-secciones
 * Description: Title on the left and expandable questions (English).
 */

$lh_o   = lh_offer();
$lh_c   = $lh_o['confirm']['en'];
$lh_cf  = fn( $v, $label ) => $v ? ' ' . $v : ' [CONFIRM: ' . $label . ']';
$lh_faq = array(
	array( 'Who pays for the ads?', 'You do, directly to Meta from your own ad account. The minimum is ' . lh_usd( $lh_o['min_spend'] ) . '/month. My monthly fee is separate.' ),
	array( 'What is a pre-qualified homeowner?', 'They own the home, are inside your service area, left a valid phone and email, and answered their budget range, the type of project (walk-in, reach-in, garage, pantry or other) and when they want to do it. We deliver the homeowner; booking the estimate is on you. Details in our Guarantee Terms.' ),
	array( 'What happens if it does not work?', 'Two guarantees cover you. If your ads are not live and approved within 21 days, you get your first month back. If 20 pre-qualified homeowners do not come in within 60 days of your ads going live, your third month is free.' ),
	array( 'How long is the commitment?', $lh_o['min_months'] . '-month minimum. After that, it\'s month to month. Cancel with 30 days\' notice.' ),
	array( 'Who owns the CRM?', 'You do. It is included for the first year from the start of service, with all its automations. If you leave earlier, you keep it until that year is over, and you can export your contacts anytime. After the first year, if you want to keep it, we coordinate and it is quoted separately.' . $lh_cf( $lh_c['crm_renewal'], 'renewal amount' ) ),
	array( 'When will I see results?', 'The first weeks the system is learning: new angles get tested and what does not work gets turned off. You get a clear checkpoint at 60 days with the homeowner guarantee.' ),
	array( 'Do you guarantee sales?', 'No, and be wary of anyone who does. I commit to pre-qualified homeowners and the guarantees above. Closing the job is still your craft.' ),
	array( 'Do you work with franchises?', 'No. Only independent custom closet businesses.' ),
	array( 'Do you work alone?', 'Yes. You talk to me directly, and I take a limited number of businesses at a time.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"faq","className":"lh-sec lh-faq"} -->
<section id="faq" class="wp-block-group alignfull lh-sec lh-faq"><!-- wp:group {"className":"lh-wrap lh-faq-grid"} -->
<div class="wp-block-group lh-wrap lh-faq-grid"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">FAQ</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">What owners <em>ask me.</em></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-faq-list"} -->
<div class="wp-block-group lh-faq-list"><?php foreach ( $lh_faq as $q ) : ?><!-- wp:details {"className":"lh-r"} -->
<details class="wp-block-details lh-r"><summary><?php echo esc_html( $q[0] ); ?></summary><!-- wp:paragraph -->
<p><?php echo esc_html( $q[1] ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --><?php endforeach; ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
