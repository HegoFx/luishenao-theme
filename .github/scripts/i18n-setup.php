<?php
/**
 * Bilingual setup on staging (run with: wp eval-file i18n-setup.php).
 * Idempotent: languages and pages are created once and updated on later runs.
 * Spanish (default, at /) and English (at /en/); English pages are built from the en-* theme patterns.
 */

if ( ! function_exists( 'PLL' ) || ! function_exists( 'pll_set_post_language' ) ) {
	WP_CLI::error( 'Polylang no está activo.' );
}

$model = PLL()->model;
$lang_api = isset( $model->languages ) && is_object( $model->languages ) ? $model->languages : null;
$get_lang = fn( $slug ) => $lang_api && method_exists( $lang_api, 'get' ) ? $lang_api->get( $slug ) : $model->get_language( $slug );

// 1. Languages (Spanish first so it becomes the default).
$langs = array(
	array( 'name' => 'Español', 'slug' => 'es', 'locale' => 'es_MX', 'rtl' => false, 'term_group' => 0, 'flag' => 'co' ),
	array( 'name' => 'English', 'slug' => 'en', 'locale' => 'en_US', 'rtl' => false, 'term_group' => 1, 'flag' => 'us' ),
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

// 2. Settings: language as a directory, Spanish without prefix, no browser redirects, media not duplicated.
$opts = array(
	'default_lang'  => 'es',
	'force_lang'    => 1,
	'hide_default'  => true,
	'rewrite'       => true,
	'redirect_lang' => false,
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

// 3. Everything that exists today is Spanish.
$ids = get_posts( array( 'post_type' => array( 'post', 'page' ), 'post_status' => 'any', 'numberposts' => -1, 'fields' => 'ids', 'lang' => '' ) );
foreach ( $ids as $id ) {
	if ( ! pll_get_post_language( $id ) ) {
		pll_set_post_language( $id, 'es' );
	}
}
$terms = get_terms( array( 'taxonomy' => array( 'category', 'post_tag' ), 'hide_empty' => false, 'fields' => 'ids', 'lang' => '' ) );
foreach ( is_array( $terms ) ? $terms : array() as $t ) {
	if ( ! pll_get_term_language( $t ) ) {
		pll_set_term_language( $t, 'es' );
	}
}
WP_CLI::log( count( $ids ) . ' entradas/páginas y ' . count( (array) $terms ) . ' términos en español' );

// 4. English pages, linked to their Spanish twin.
function lh_en_page( $es_id, $title, $slug, $content, $excerpt = '' ) {
	if ( ! $es_id || ! get_post( $es_id ) ) {
		WP_CLI::warning( "No encuentro la página en español para $title" );
		return 0;
	}
	$en_id = pll_get_post( $es_id, 'en' );
	$data  = array(
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'post_title'   => $title,
		'post_name'    => $slug,
		'post_content' => $content,
		'post_excerpt' => $excerpt,
	);
	if ( $en_id ) {
		$data['ID'] = $en_id;
		wp_update_post( wp_slash( $data ) );
	} else {
		$en_id = wp_insert_post( wp_slash( $data ), true );
		if ( is_wp_error( $en_id ) ) {
			WP_CLI::error( "$title: " . $en_id->get_error_message() );
		}
	}
	pll_set_post_language( $en_id, 'en' );
	$tr       = pll_get_post_translations( $es_id );
	$tr['es'] = $es_id;
	$tr['en'] = $en_id;
	pll_save_post_translations( $tr );
	if ( $thumb = get_post_thumbnail_id( $es_id ) ) {
		set_post_thumbnail( $en_id, $thumb );
	}
	if ( $tpl = get_page_template_slug( $es_id ) ) {
		update_post_meta( $en_id, '_wp_page_template', $tpl );
	}
	WP_CLI::log( "EN $title: ID $en_id ↔ ES $es_id → " . get_permalink( $en_id ) );
	return $en_id;
}

$reg  = WP_Block_Patterns_Registry::get_instance();
$home = array();
foreach ( array( 'en-home-hero', 'en-home-problema', 'en-home-closet', 'en-home-como', 'en-home-piloto', 'en-home-por-que', 'en-home-para-ti', 'en-faq', 'en-cta-final' ) as $s ) {
	$p = $reg->get_registered( "luishenao/$s" );
	if ( ! $p ) {
		WP_CLI::error( "Falta el pattern luishenao/$s: ¿se desplegó el tema?" );
	}
	$home[] = $p['content'];
}

$about_es = get_page_by_path( 'sobre-mi' );
lh_en_page( (int) get_option( 'page_on_front' ), 'Home', 'home', implode( "\n\n", $home ) );
lh_en_page( (int) get_option( 'page_for_posts' ), 'Blog', 'articles', '' );
lh_en_page(
	$about_es ? $about_es->ID : 0,
	'About',
	'about',
	"<!-- wp:paragraph -->\n<p>Test page to preview the inner page template.</p>\n<!-- /wp:paragraph -->",
	'I help independent custom closet companies in the US get homeowners who are ready to buy, not tire kickers.'
);

// Polylang caches each language's front page and posts page: rebuild it now that the translations exist,
// or /en/ redirects to /en/home/ instead of serving the English front page.
if ( $lang_api && method_exists( $lang_api, 'clean_cache' ) ) {
	$lang_api->clean_cache();
}
if ( method_exists( $model, 'clean_languages_cache' ) ) {
	$model->clean_languages_cache();
}
delete_transient( 'pll_languages_list' );

flush_rewrite_rules();
WP_CLI::success( 'Bilingüe listo' );
