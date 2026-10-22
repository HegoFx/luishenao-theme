<?php
/**
 * Wound HBOT landing site setup (run with: wp eval-file wound-setup.php).
 * Idempotent: English (default, at /) and Spanish (at /es/) languages, one linked front page each,
 * site settings for a temporary domain (noindex). The page content stays empty: the theme renders it.
 */

if ( ! function_exists( 'PLL' ) || ! function_exists( 'pll_set_post_language' ) ) {
	WP_CLI::error( 'Polylang no está activo.' );
}

$model    = PLL()->model;
$lang_api = isset( $model->languages ) && is_object( $model->languages ) ? $model->languages : null;
$get_lang = fn( $slug ) => $lang_api && method_exists( $lang_api, 'get' ) ? $lang_api->get( $slug ) : $model->get_language( $slug );

// 1. Languages (English first so it becomes the default).
$langs = array(
	array( 'name' => 'English', 'slug' => 'en', 'locale' => 'en_US', 'rtl' => false, 'term_group' => 0, 'flag' => 'us' ),
	array( 'name' => 'Español', 'slug' => 'es', 'locale' => 'es_MX', 'rtl' => false, 'term_group' => 1, 'flag' => 'us' ),
);
foreach ( $langs as $l ) {
	if ( $get_lang( $l['slug'] ) ) {
		WP_CLI::log( "Idioma {$l['slug']}: ya existe" );
		continue;
	}
	$r = $lang_api && method_exists( $lang_api, 'add' ) ? $lang_api->add( $l ) : $model->add_language( $l );
	if ( is_wp_error( $r ) ) {
		WP_CLI::error( "Idioma {$l['slug']}: " . $r->get_error_message() );
	}
	WP_CLI::log( "Idioma {$l['slug']}: creado" );
}
if ( method_exists( $model, 'clean_languages_cache' ) ) {
	$model->clean_languages_cache();
}

// 2. Polylang: language as a directory, English without prefix, /es/ for the Spanish front page, no browser redirect.
$opts    = array(
	'default_lang'  => 'en',
	'force_lang'    => 1,
	'hide_default'  => true,
	'rewrite'       => true,
	'redirect_lang' => true,
	'browser'       => false,
	'media_support' => false,
);
$options = PLL()->options;
if ( is_object( $options ) && method_exists( $options, 'set' ) ) {
	foreach ( $opts as $k => $v ) {
		$options->set( $k, $v );
	}
	if ( method_exists( $options, 'save' ) ) {
		$options->save();
	}
} else {
	update_option( 'polylang', array_merge( (array) get_option( 'polylang' ), $opts ) );
}

// 3. Sample content out of the way, anything left is English.
$hello = get_page_by_path( 'hello-world', OBJECT, 'post' );
if ( $hello && 'trash' !== $hello->post_status ) {
	wp_trash_post( $hello->ID );
	WP_CLI::log( 'Entrada de ejemplo a la papelera' );
}
$ids = get_posts( array( 'post_type' => array( 'post', 'page' ), 'post_status' => 'any', 'numberposts' => -1, 'fields' => 'ids', 'lang' => '' ) );
foreach ( $ids as $id ) {
	if ( ! pll_get_post_language( $id ) ) {
		pll_set_post_language( $id, 'en' );
	}
}
$terms = get_terms( array( 'taxonomy' => array( 'category', 'post_tag' ), 'hide_empty' => false, 'fields' => 'ids', 'lang' => '' ) );
foreach ( is_array( $terms ) ? $terms : array() as $t ) {
	if ( ! pll_get_term_language( $t ) ) {
		pll_set_term_language( $t, 'en' );
	}
}

// 4. Front pages: Home (en) ↔ Inicio (es).
function wt_page( $slug, $title, $lang ) {
	$found = get_posts( array( 'post_type' => 'page', 'name' => $slug, 'post_status' => 'any', 'numberposts' => 1, 'lang' => '' ) );
	if ( $found ) {
		$id = $found[0]->ID;
		if ( 'publish' !== $found[0]->post_status ) {
			wp_update_post( array( 'ID' => $id, 'post_status' => 'publish' ) );
		}
	} else {
		$id = wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_title' => $title, 'post_name' => $slug, 'post_content' => '' ), true );
		if ( is_wp_error( $id ) ) {
			WP_CLI::error( "$title: " . $id->get_error_message() );
		}
	}
	pll_set_post_language( $id, $lang );
	return $id;
}
$en = wt_page( 'home', 'Home', 'en' );
$es = wt_page( 'inicio', 'Inicio', 'es' );
pll_save_post_translations( array( 'en' => $en, 'es' => $es ) );
update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $en );
WP_CLI::log( "Portada: Home $en ↔ Inicio $es" );

// 5. Site settings. blog_public = 0 while on the temporary domain.
update_option( 'blogname', 'Wound Therapeutics of Florida' );
update_option( 'blogdescription', 'Advanced wound care and HBOT evaluation in Orlando, FL' );
update_option( 'timezone_string', 'America/New_York' );
update_option( 'blog_public', 0 );

if ( $lang_api && method_exists( $lang_api, 'clean_cache' ) ) {
	$lang_api->clean_cache();
}
if ( method_exists( $model, 'clean_languages_cache' ) ) {
	$model->clean_languages_cache();
}
delete_transient( 'pll_languages_list' );
flush_rewrite_rules();
WP_CLI::success( 'Sitio listo' );
