<?php
/**
 * Luis Henao theme setup.
 *
 * Design and motion live in this theme; page content lives in regular WordPress pages
 * built from the patterns in /patterns, so text and images stay editable in the editor.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LH_VERSION', wp_get_theme()->get( 'Version' ) );

add_action( 'after_setup_theme', function () {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/main.css' );
	remove_theme_support( 'core-block-patterns' );
	// The page hero reads its intro line from the excerpt.
	add_post_type_support( 'page', 'excerpt' );
} );

add_action( 'wp_enqueue_scripts', function () {
	$uri = get_theme_file_uri( 'assets' );
	$ver = WP_DEBUG ? time() : LH_VERSION;

	wp_enqueue_style( 'lh-main', "$uri/css/main.css", array(), $ver );
	// No GSAP dependency: menu and mode switch work even if it never loads. ui.js first, it clones the switch.
	wp_enqueue_script( 'lh-ui', "$uri/js/ui.js", array(), $ver, array( 'strategy' => 'defer', 'in_footer' => true ) );
	wp_enqueue_script( 'lh-mode', "$uri/js/mode.js", array( 'lh-ui' ), $ver, array( 'strategy' => 'defer', 'in_footer' => true ) );
	// Ad click IDs and UTMs → GoHighLevel forms (docs/tracking.md). In the head, so it tags the embeds as soon as the page is parsed.
	wp_enqueue_script( 'lh-track', "$uri/js/track.js", array(), $ver, array( 'strategy' => 'defer' ) );

	wp_enqueue_script( 'gsap', "$uri/vendor/gsap.min.js", array(), '3.12.5', array( 'strategy' => 'defer', 'in_footer' => true ) );
	wp_enqueue_script( 'gsap-st', "$uri/vendor/ScrollTrigger.min.js", array( 'gsap' ), '3.12.5', array( 'strategy' => 'defer', 'in_footer' => true ) );
	wp_enqueue_script( 'lh-site', "$uri/js/site.js", array( 'gsap-st' ), $ver, array( 'strategy' => 'defer', 'in_footer' => true ) );

	// The heavy home experience (doors, leads, closet rod, stacked steps) only loads on the front page.
	if ( is_front_page() ) {
		wp_enqueue_script( 'lh-home', "$uri/js/home.js", array( 'lh-site' ), $ver, array( 'strategy' => 'defer', 'in_footer' => true ) );
	}
} );

// Color mode before first paint: the visitor's saved choice, else their device setting.
add_action( 'wp_head', function () {
	echo "<script>(function(d){var t;try{t=localStorage.getItem('lh-theme')}catch(e){}d.dataset.theme=t||(matchMedia('(prefers-color-scheme: dark)').matches?'dark':'light')})(document.documentElement)</script>\n";
}, 0 );

// Flag that motion is on so reveal states only hide content when the scripts will show it again.
// If GSAP never arrives (blocked, offline), the flag is dropped and everything stays visible.
add_action( 'wp_head', function () {
	// On the front page the first visit of a session also gets 'lh-cover', which covers the page
	// with the closet doors until home.js opens them (no flash of the hero before the doors).
	$intro = is_front_page() ? "try{if(!sessionStorage.getItem('lh-doors'))d.classList.add('lh-cover')}catch(e){}" : '';
	echo "<script>(function(d){if(matchMedia('(prefers-reduced-motion: reduce)').matches)return;d.classList.add('lh-js');{$intro}setTimeout(function(){if(!window.ScrollTrigger)d.classList.remove('lh-js','lh-cover')},3500)})(document.documentElement)</script>\n";
}, 0 );

// Preload the display font: it paints the hero wordmark.
add_action( 'wp_head', function () {
	printf(
		'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
		esc_url( get_theme_file_uri( 'assets/fonts/inter-tight.woff2' ) )
	);
}, 1 );

/*
 * Uploads: JPG/PNG become WebP, and only the sizes the theme actually serves are generated.
 * Kept: thumbnail (admin grid), medium_large 768 (phones), 1536x1536 (desktop/retina).
 * Originals over 1920px are scaled down to a 1920px WebP.
 */
add_filter( 'image_editor_output_format', function ( $formats ) {
	$formats['image/jpeg'] = 'image/webp';
	$formats['image/png']  = 'image/webp';
	return $formats;
} );
add_filter( 'wp_editor_set_quality', function ( $quality, $mime ) {
	return 'image/webp' === $mime ? 80 : $quality;
}, 10, 2 );
add_filter( 'intermediate_image_sizes_advanced', function ( $sizes ) {
	unset( $sizes['medium'], $sizes['large'], $sizes['2048x2048'] );
	return $sizes;
} );
add_filter( 'big_image_size_threshold', fn() => 1920 );

// Fallback favicon until a Site Icon is set in Settings → General (avoids a 404 on /favicon.ico).
add_action( 'wp_head', function () {
	if ( ! has_site_icon() ) {
		printf( '<link rel="icon" href="%s" type="image/svg+xml">' . "\n", esc_url( get_theme_file_uri( 'assets/img/favicon.svg' ) ) );
	}
}, 2 );

add_action( 'init', function () {
	register_block_pattern_category( 'lh-home', array( 'label' => __( 'Luis Henao · Home', 'luishenao' ) ) );
	register_block_pattern_category( 'lh-secciones', array( 'label' => __( 'Luis Henao · Secciones', 'luishenao' ) ) );

	register_block_style( 'core/button', array( 'name' => 'ghost', 'label' => __( 'Borde', 'luishenao' ) ) );
	register_block_style( 'core/paragraph', array( 'name' => 'label', 'label' => __( 'Etiqueta mono', 'luishenao' ) ) );
} );

/*
 * Bilingual site (Polylang): Spanish at /, English at /en/.
 * Polylang handles URLs, hreflang and linking each page to its translation. The theme swaps
 * what Polylang free can't translate in a block theme: header/footer parts, theme patterns
 * and templates. English versions live next to the Spanish ones as *-en / en-* files.
 */
function lh_is_en() {
	return function_exists( 'pll_current_language' ) && 'en' === pll_current_language( 'slug' );
}

// header → header-en, luishenao/cta-final → luishenao/en-cta-final (when the English one exists).
add_filter( 'render_block_data', function ( $block ) {
	if ( ! lh_is_en() ) {
		return $block;
	}
	$name = $block['blockName'] ?? '';
	$slug = $block['attrs']['slug'] ?? '';
	if ( 'core/template-part' === $name && in_array( $slug, array( 'header', 'footer' ), true ) ) {
		$block['attrs']['slug'] = "$slug-en";
	} elseif ( 'core/pattern' === $name && str_starts_with( $slug, 'luishenao/' ) && ! str_starts_with( $slug, 'luishenao/en-' ) ) {
		$en = 'luishenao/en-' . substr( $slug, strlen( 'luishenao/' ) );
		if ( WP_Block_Patterns_Registry::get_instance()->is_registered( $en ) ) {
			$block['attrs']['slug'] = $en;
		}
	}
	return $block;
} );

// Templates with text get an en- twin (templates/en-404.html…): try it first on English pages.
foreach ( array( '404', 'archive', 'home', 'index', 'search', 'single' ) as $lh_type ) {
	add_filter( "{$lh_type}_template_hierarchy", function ( $templates ) {
		return lh_is_en() ? array_merge( array_map( fn( $t ) => "en-$t", $templates ), $templates ) : $templates;
	} );
}

// [lh_lang]: link to this page in the other language (its home when there is no translation).
add_shortcode( 'lh_lang', function () {
	if ( ! function_exists( 'pll_the_languages' ) ) {
		return '';
	}
	$out = '';
	foreach ( (array) pll_the_languages( array( 'raw' => 1, 'hide_current' => 1, 'hide_if_empty' => 0 ) ) as $l ) {
		$label = 'en' === $l['slug'] ? 'English version' : 'Versión en español';
		$out  .= sprintf(
			'<a class="lh-lang" href="%s" hreflang="%s" lang="%s" aria-label="%s">%s</a>',
			esc_url( $l['url'] ), esc_attr( $l['slug'] ), esc_attr( $l['slug'] ), esc_attr( $label ), esc_html( strtoupper( $l['slug'] ) )
		);
	}
	return $out;
} );

/**
 * List block markup for patterns.
 */
function lh_list( array $items, $class = 'lh-checks' ) {
	$out = sprintf( "<!-- wp:list {\"className\":\"%s\"} -->\n<ul class=\"wp-block-list %s\">", $class, $class );
	foreach ( $items as $item ) {
		$out .= "<!-- wp:list-item -->\n<li>" . esc_html( $item ) . "</li>\n<!-- /wp:list-item -->";
	}
	return $out . "</ul>\n<!-- /wp:list -->";
}

/**
 * URL of a theme image, for use inside patterns.
 */
function lh_img( $file ) {
	return esc_url( get_theme_file_uri( "assets/img/$file" ) );
}

require get_theme_file_path( 'inc/seo.php' );
