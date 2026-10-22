<?php
$c = wt_copy();
$b = wt_biz();
?>
<footer class="wt-footer">
	<div class="wt-wrap wt-footer__in">
		<div>
			<img class="wt-footer__logo" src="<?php echo wt_img( 'logo.webp' ); ?>" alt="<?php echo esc_attr( $b['name'] ); ?>" width="600" height="100" loading="lazy">
			<p><?php echo esc_html( $c['footer']['tagline'] ); ?></p>
		</div>
		<address>
			<?php echo esc_html( $b['street'] ); ?><br>
			<?php echo esc_html( "{$b['city']}, {$b['region']} {$b['zip']}" ); ?><br>
			<a href="tel:<?php echo esc_attr( $b['tel'] ); ?>"><?php echo esc_html( $b['phone'] ); ?></a><br>
			<a href="mailto:<?php echo esc_attr( $b['email'] ); ?>"><?php echo esc_html( $b['email'] ); ?></a><br>
			<?php echo esc_html( $c['final']['hours'] ); ?>
		</address>
		<div class="wt-footer__links">
			<?php echo wt_lang_switcher(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			<a href="<?php echo esc_url( $b['site'] ); ?>"><?php echo esc_html( $c['footer']['visit'] ); ?></a>
		</div>
	</div>
	<div class="wt-wrap wt-footer__legal">
		<p><?php echo esc_html( $c['illustrative'] ); ?></p>
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) . ' ' . $b['name'] . '. ' . $c['footer']['rights'] ); ?></p>
	</div>
</footer>

<div class="wt-sticky">
	<a class="wt-btn wt-btn--ghost" href="tel:<?php echo esc_attr( $b['tel'] ); ?>"><?php echo wt_icon( 'phone' ); ?><?php echo esc_html( $c['call_short'] ); ?></a>
	<a class="wt-btn" href="#evaluation"><?php echo esc_html( $c['cta_short'] ); ?></a>
</div>
<?php wp_footer(); ?>
</body>
</html>
