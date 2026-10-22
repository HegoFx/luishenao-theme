<?php
/**
 * Any other page (privacy policy, 404): simple readable column.
 */

get_header();
?>
<main id="main" class="wt-section">
	<div class="wt-wrap wt-page">
		<?php if ( have_posts() && ! is_404() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<div class="wt-prose"><?php the_content(); ?></div>
			<?php endwhile; ?>
		<?php else : ?>
			<h1>404</h1>
			<p><a class="wt-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
