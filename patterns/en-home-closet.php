<?php
/**
 * Title: Home EN · Closet rod
 * Slug: luishenao/en-home-closet
 * Categories: lh-home
 * Description: Horizontal scroll with cards hanging from a rod (English).
 */

$lh_cards = array(
	array( 'img', 'bts-grabando.webp', 'Luis filming an ad in a closet showroom', 'AI placeholder → real photo: you filming an ad', '01 · Content', 'I shoot and edit ads around your real closet installs.' ),
	array( 'stat', 'Speed to lead', '21x', 'more likely to convert', 'when you reach a lead within 5 minutes. Source: Harvard Business Review.' ),
	array( 'img', 'whatsapp-manos.webp', 'A qualified lead arriving by text', 'AI placeholder → real screenshot of a lead text (redacted)', '02 · Pre-qualified', 'The lead hits your phone by text with budget, timeline and zip code confirmed.' ),
	array( 'stat', 'First response', '78%', 'buy from whoever responds first', "That's why the reply script is included." ),
	array( 'img', 'reunion-dueno.webp', 'Luis reviewing a campaign with a closet company owner', 'AI placeholder → real photo: call or visit with a client', '03 · Direct line', 'You talk to me. Not account #847 handed to a junior.' ),
	array( 'img', 'homeowners-closet.webp', 'Homeowners in their new walk-in closet', "AI placeholder → a client's finished closet", '04 · The goal', 'Fewer lost estimates. More closets installed.' ),
	array( 'stat', 'Your market', '$13.7B', 'in custom closets across North America', 'growing 7.2% a year. Source: Business Research Insights 2026.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"proof","className":"lh-sec lh-dark lh-rod"} -->
<section id="proof" class="wp-block-group alignfull lh-sec lh-dark lh-rod"><!-- wp:group {"className":"lh-wrap lh-rod-head"} -->
<div class="wp-block-group lh-wrap lh-rod-head"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">What's hanging in my closet</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">No promises. <em>Proof.</em></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">How I work, what you get and why the numbers matter. Scroll.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-rod-track"} -->
<div class="wp-block-group lh-rod-track"><?php foreach ( $lh_cards as $c ) : ?><!-- wp:group {"className":"lh-hanger"} -->
<div class="wp-block-group lh-hanger"><?php if ( 'img' === $c[0] ) : ?><!-- wp:group {"className":"lh-tagcard"} -->
<div class="wp-block-group lh-tagcard"><!-- wp:image {"sizeSlug":"large","className":"lh-ph"} -->
<figure class="wp-block-image size-large lh-ph"><img src="<?php echo lh_img( $c[1] ); ?>" alt="<?php echo esc_attr( $c[2] ); ?>"/><figcaption class="wp-element-caption"><?php echo esc_html( $c[3] ); ?></figcaption></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"lh-cap"} -->
<div class="wp-block-group lh-cap"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label"><?php echo esc_html( $c[4] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $c[5] ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group --><?php else : ?><!-- wp:group {"className":"lh-tagcard is-stat"} -->
<div class="wp-block-group lh-tagcard is-stat"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label"><?php echo esc_html( $c[1] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-num"} -->
<p class="lh-num"><?php echo esc_html( $c[2] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $c[3] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $c[4] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><?php endif; ?></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
