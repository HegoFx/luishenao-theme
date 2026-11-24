<?php
/**
 * Title: Final CTA with calendar (EN)
 * Slug: luishenao/en-cta-final
 * Categories: lh-home, lh-secciones
 * Description: Dark block with the embedded GHL calendar: the only conversion action (call). URL in inc/offer.php.
 */
$lh_o = lh_offer();
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"book","className":"lh-sec lh-dark lh-final"} -->
<section id="book" class="wp-block-group alignfull lh-sec lh-dark lh-final"><!-- wp:group {"className":"lh-wrap lh-final-grid"} -->
<div class="wp-block-group lh-wrap lh-final-grid"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Book a call</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Let’s see if your business is <em>a fit.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">We talk about your area, your projects and your ads. When you book I ask for this so I come prepared:</p>
<!-- /wp:paragraph -->

<?php echo lh_list( array( 'Name, email and phone', 'Business name and city', 'What you spend on ads today' ), 'lh-dash lh-r' ); ?></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-form lh-cal lh-r-card"} -->
<div class="wp-block-group lh-form lh-cal lh-r-card"><!-- wp:html -->
<?php if ( $lh_o['calendar'] ) : ?><iframe class="lh-cal-frame" src="<?php echo esc_url( $lh_o['calendar'] ); ?>" title="Book a call" loading="lazy" scrolling="yes"></iframe><?php else : ?><p class="lh-ph-note">[CONFIRM] GoHighLevel calendar goes here (URL in inc/offer.php)</p><div class="lh-mock-form" aria-hidden="true"><span class="lh-mock-btn">Book a call</span></div><?php endif; ?>
<p class="lh-consent">By booking you agree to be contacted by email or phone about your call. <a href="/en/privacy-policy/">Privacy policy</a></p>
<!-- /wp:html --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
