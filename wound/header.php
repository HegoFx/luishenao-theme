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
		<?php $wt_home = is_front_page() ? '' : ( function_exists( 'pll_home_url' ) ? pll_home_url( wt_lang() ) : home_url( '/' ) ); ?>
		<nav class="wt-nav" aria-label="<?php echo esc_attr( $c['menu'] ); ?>">
			<?php foreach ( $c['nav'] as $id => $label ) : ?>
				<a href="<?php echo esc_url( $wt_home ) . '#' . esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></a>
			<?php endforeach; ?>
		</nav>
		<div class="wt-header__right">
			<a class="wt-pill" href="<?php echo esc_url( wt_other_url() ); ?>" hreflang="<?php echo 'es' === $c['lang'] ? 'en' : 'es'; ?>" title="<?php echo esc_attr( $c['switch_title'] ); ?>"><?php echo esc_html( $c['switch_label'] ); ?></a>
			<?php echo wt_lang_switcher(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			<a class="wt-btn wt-btn--ghost wt-header__call" href="tel:<?php echo esc_attr( $b['tel'] ); ?>"><?php echo wt_icon( 'phone' ); ?><span><?php echo esc_html( $b['phone'] ); ?></span></a>
			<button class="wt-burger" type="button" aria-expanded="false" aria-controls="wt-menu" aria-label="<?php echo esc_attr( $c['menu'] ); ?>"><i></i><i></i></button>
		</div>
	</div>
</header>
<div class="wt-menu" id="wt-menu" hidden>
	<div class="wt-menu__in">
		<button class="wt-menu__close" type="button" aria-label="<?php echo esc_attr( $c['close'] ); ?>"><i></i><i></i></button>
		<nav class="wt-menu__links" aria-label="<?php echo esc_attr( $c['menu'] ); ?>">
			<?php $n = 0; foreach ( $c['nav'] as $id => $label ) : ?>
				<a href="<?php echo esc_url( $wt_home ) . '#' . esc_attr( $id ); ?>" style="--n: <?php echo (int) $n++; ?>"><span>0<?php echo (int) $n; ?></span><?php echo esc_html( $label ); ?></a>
			<?php endforeach; ?>
		</nav>
		<div class="wt-menu__foot">
			<a class="wt-btn wt-btn--lg" href="<?php echo esc_url( $wt_home ); ?>#evaluation"><?php echo esc_html( $c['cta'] ); ?><?php echo wt_icon( 'arrow' ); ?></a>
			<a class="wt-btn wt-btn--glass wt-btn--lg" href="tel:<?php echo esc_attr( $b['tel'] ); ?>"><?php echo wt_icon( 'phone' ); ?><?php echo esc_html( $b['phone'] ); ?></a>
			<?php echo wt_lang_switcher(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
		</div>
	</div>
</div>
