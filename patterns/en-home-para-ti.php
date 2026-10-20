<?php
/**
 * Title: Home EN · Is this for you?
 * Slug: luishenao/en-home-para-ti
 * Categories: lh-home, lh-secciones
 * Description: Two columns: who it's for and who it's not for (English).
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"lh-sec lh-fit"} -->
<section class="wp-block-group alignfull lh-sec lh-fit"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Is this for you?</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Let's save us both <em>some time.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-two"} -->
<div class="wp-block-group lh-two"><!-- wp:group {"className":"lh-card lh-r-card"} -->
<div class="wp-block-group lh-card lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">It's for you if</h3>
<!-- /wp:heading -->

<?php echo lh_list( array(
	'You own an independent custom closet company',
	"You've been operating 1 to 4 years with real traction",
	'You have 10+ Google reviews rated 4.4 or higher',
	'You sell 3 to 8 closets a month at $5k to $8k each',
	'You can invest at least $900/mo in ads',
	"You're in Florida, Texas or Arizona",
) ); ?></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-card lh-r-card"} -->
<div class="wp-block-group lh-card lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">It's not for you if</h3>
<!-- /wp:heading -->

<?php echo lh_list( array(
	"You're a franchise (California Closets, Closet Factory and the like)",
	"You don't have an ad budget right now",
	"You're just starting out and don't have traction yet",
	'You want someone to guarantee a number of sales',
), 'lh-checks is-no' ); ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
