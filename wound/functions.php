<?php
/**
 * Wound Therapeutics HBOT landing.
 *
 * A small classic theme: the whole landing is rendered from code (front-page.php + inc/copy.php),
 * so English and Spanish stay in sync in one file. Polylang provides the URLs: English at /,
 * Spanish at /es/ (two linked pages, both empty; .github/scripts/wound-setup.php creates them).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WT_VERSION', wp_get_theme()->get( 'Version' ) );

require get_theme_file_path( 'inc/copy.php' );
require get_theme_file_path( 'inc/seo.php' );

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'script', 'style' ) );
} );

add_action( 'wp_enqueue_scripts', function () {
	$uri = get_theme_file_uri( 'assets' );
	$ver = WP_DEBUG ? time() : WT_VERSION;
	wp_enqueue_style( 'wt-landing', "$uri/css/landing.css", array(), $ver );
	$defer = array( 'strategy' => 'defer', 'in_footer' => true );
	wp_enqueue_script( 'gsap', "$uri/vendor/gsap.min.js", array(), '3.12.5', $defer );
	wp_enqueue_script( 'gsap-st', "$uri/vendor/ScrollTrigger.min.js", array( 'gsap' ), '3.12.5', $defer );
	wp_enqueue_script( 'lenis', "$uri/vendor/lenis.min.js", array(), '1.1.13', $defer );
	wp_enqueue_script( 'wt-landing', "$uri/js/landing.js", array( 'gsap-st', 'lenis' ), $ver, $defer );
	// Ad click IDs and UTMs → GoHighLevel form once it is embedded (same script as the main theme).
	wp_enqueue_script( 'wt-track', "$uri/js/track.js", array(), $ver, array( 'strategy' => 'defer' ) );
	// No block library on a page without blocks.
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
}, 20 );

// Motion flag before first paint, so reveal states only hide content when the scripts will show it.
// If GSAP never arrives (blocked, offline), the flag is dropped and everything stays visible.
add_action( 'wp_head', function () {
	echo "<script>(function(d){if(matchMedia('(prefers-reduced-motion: reduce)').matches)return;d.classList.add('wt-js');setTimeout(function(){if(!window.ScrollTrigger)d.classList.remove('wt-js')},3500)})(document.documentElement)</script>\n";
}, 0 );

add_action( 'wp_head', function () {
	printf( '<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n", esc_url( get_theme_file_uri( 'assets/fonts/inter.woff2' ) ) );
	if ( ! has_site_icon() ) {
		printf( '<link rel="icon" href="%s" type="image/png">' . "\n", esc_url( get_theme_file_uri( 'assets/img/icon.png' ) ) );
	}
}, 1 );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Current language: 'es' on the Spanish page, 'en' everywhere else.
 */
function wt_lang() {
	return function_exists( 'pll_current_language' ) && 'es' === pll_current_language( 'slug' ) ? 'es' : 'en';
}

/**
 * URL of this page in the other language (its front page when there is no translation).
 */
function wt_other_url() {
	$other = 'es' === wt_lang() ? 'en' : 'es';
	if ( function_exists( 'pll_the_languages' ) ) {
		foreach ( (array) pll_the_languages( array( 'raw' => 1, 'hide_if_empty' => 0 ) ) as $l ) {
			if ( $other === $l['slug'] ) {
				return $l['url'];
			}
		}
	}
	return 'es' === $other ? home_url( '/es/' ) : home_url( '/' );
}

/**
 * Polylang language switcher (EN | ES), current language marked.
 */
function wt_lang_switcher() {
	if ( ! function_exists( 'pll_the_languages' ) ) {
		return '';
	}
	$out = '';
	foreach ( (array) pll_the_languages( array( 'raw' => 1, 'hide_if_empty' => 0 ) ) as $l ) {
		$out .= sprintf(
			'<a href="%s" hreflang="%s" lang="%s"%s>%s</a>',
			esc_url( $l['url'] ),
			esc_attr( $l['slug'] ),
			esc_attr( $l['slug'] ),
			$l['current_lang'] ? ' aria-current="true"' : '',
			esc_html( strtoupper( $l['slug'] ) )
		);
	}
	return '<nav class="wt-langs" aria-label="Language / Idioma">' . $out . '</nav>';
}

function wt_img( $file ) {
	return esc_url( get_theme_file_uri( "assets/img/$file" ) );
}

/**
 * Inline line icons for the condition cards.
 */
function wt_icon( $name ) {
	$paths = array(
		'foot'   => '<path d="M8 3c-2 3-3 7-2 11 .6 2.6 2.4 5 5 6 2.2.8 4.4 0 5-2 .5-1.7-.6-3-2-4-1.6-1.2-2.2-3-2-5l.4-4"/><circle cx="17" cy="4" r="1.2"/><circle cx="19.5" cy="7" r="1"/>',
		'graft'  => '<rect x="3" y="4" width="18" height="5" rx="1.5"/><rect x="3" y="10.5" width="18" height="5" rx="1.5"/><path d="M3 19.5h18"/>',
		'shield' => '<path d="M12 3l7 3v5c0 4.5-3 8.3-7 10-4-1.7-7-5.5-7-10V6z"/><path d="M9 12h6M12 9v6"/>',
		'trauma' => '<path d="M13 3L5 14h6l-1 7 8-11h-6z"/>',
		'phone'  => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 005 5L15 13l5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2"/>',
		'check'  => '<path d="M5 12.5l4.5 4.5L19 7.5"/>',
		'arrow'  => '<path d="M5 12h14M13 6l6 6-6 6"/>',
	);
	return '<svg class="wt-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ( $paths[ $name ] ?? '' ) . '</svg>';
}
