<?php
/**
 * Title: Landing EN · Proof: ad breakdowns
 * Slug: luishenao/en-landing-prueba
 * Categories: lh-secciones
 * Description: Base line + reels of Luis breaking down closet ads (proof without testimonials). URLs live in inc/offer.php.
 */
$lh_o = lh_offer();
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"proof","className":"lh-sec lh-dark lh-proof"} -->
<section id="proof" class="wp-block-group alignfull lh-sec lh-dark lh-proof"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Based in Colombia · Working with US Custom Closets businesses</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">I break down real closet ads, <em>out loud.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-intro lh-r"} -->
<p class="lh-intro lh-r">Watch how I analyze ads from closet brands: what they do well, and how I would make them win more.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="lh-reels"><?php foreach ( $lh_o['videos'] as $i => $url ) : ?><figure class="lh-reel lh-r-card"><?php if ( $url ) : ?><iframe src="<?php echo esc_url( trailingslashit( strtok( $url, '?' ) ) . 'embed' ); ?>" title="Ad breakdown <?php echo (int) $i + 1; ?>" loading="lazy" allowfullscreen></iframe><?php else : ?><div class="lh-reel-ph"><span>[CONFIRM] Breakdown reel <?php echo (int) $i + 1; ?></span></div><?php endif; ?></figure><?php endforeach; ?></div>
<!-- /wp:html --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
