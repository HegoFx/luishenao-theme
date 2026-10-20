<?php
/**
 * Title: FAQ (English)
 * Slug: luishenao/en-faq
 * Categories: lh-home, lh-secciones
 * Description: Title on the left and expandable questions (English).
 */

$lh_faq = array(
	array( 'Who pays for the ads?', 'You do, directly in your own Meta ad account. $900/mo minimum. My $650 fee is separate. You keep control and ownership of the account and the data.' ),
	array( 'How do you measure if it is working?', 'By how many pre-qualified homeowners land in your CRM and what each one costs. You get a clear report at the end of the month.' ),
	array( "What if it doesn't work?", "If the campaign isn't built and approved by Meta within 21 days, you get 100% of the fee back. After the first month, if the numbers don't work for you, you just stop." ),
	array( 'Can I cancel?', 'Yes. The pilot is a one-month trial. No long-term commitment and no commission on your sales.' ),
	array( 'Do you guarantee sales?', 'No, and be wary of anyone who does. I commit to delivering pre-qualified homeowners. Closing the job is still your craft.' ),
	array( 'Do I need to know GoHighLevel?', 'No. I set up the pipeline for you. Leads reach you by text and in the GHL mobile app, so you can work them from your phone.' ),
	array( 'Do I still need to post on social?', "It's not included, but I recommend you keep posting on Instagram while the ads run. The two together work much better." ),
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
