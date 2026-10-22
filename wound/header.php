<?php
$c = wt_copy();
$b = wt_biz();
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="wt-skip" href="#main"><?php echo esc_html( $c['skip'] ); ?></a>
<header class="wt-header">
	<div class="wt-wrap wt-header__in">
		<a class="wt-logo" href="<?php echo esc_url( function_exists( 'pll_home_url' ) ? pll_home_url( wt_lang() ) : home_url( '/' ) ); ?>">
			<img src="<?php echo wt_img( 'logo.webp' ); ?>" alt="<?php echo esc_attr( $b['name'] ); ?>" width="600" height="100">
		</a>
		<div class="wt-header__right">
			<a class="wt-pill" href="<?php echo esc_url( wt_other_url() ); ?>" hreflang="<?php echo 'es' === $c['lang'] ? 'en' : 'es'; ?>" title="<?php echo esc_attr( $c['switch_title'] ); ?>"><?php echo esc_html( $c['switch_label'] ); ?></a>
			<?php echo wt_lang_switcher(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			<a class="wt-btn wt-btn--ghost wt-header__call" href="tel:<?php echo esc_attr( $b['tel'] ); ?>"><?php echo wt_icon( 'phone' ); ?><span><?php echo esc_html( $b['phone'] ); ?></span></a>
		</div>
	</div>
</header>
