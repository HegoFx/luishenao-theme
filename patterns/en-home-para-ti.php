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
	'You own an independent custom closet business in the US',
	'You have finished projects you are proud to show',
	'You have been operating 1 to 4 years and have real Google reviews',
	'You can invest at least $1,200 a month in ads',
	'You want a system that is measured, not just "running ads"',
) ); ?></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-card lh-r-card"} -->
<div class="wp-block-group lh-card lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">It's not for you if</h3>
<!-- /wp:heading -->

<?php echo lh_list( array(
	'You are a national franchise',
	'You have no budget for ads',
	'You do not have finished jobs yet',
	'You are looking for guaranteed sales',
), 'lh-checks is-no' ); ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
