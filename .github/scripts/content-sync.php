<?php
/**
 * Publishes the site content from code (run with: wp eval-file content-sync.php <json>).
 *
 * - Pages and posts from content/build/content.json (made by build_content.py).
 * - Home (ES and EN) and the sales landing, assembled from the theme patterns.
 * Each item is matched by slug and language. A page edited in WordPress after the last sync is
 * left alone (its content no longer matches the stored _lh_sync_hash); the first sync of a page
 * that existed before this script saves the old content to ~/backups first.
 */

if ( ! function_exists( 'pll_set_post_language' ) ) {
	WP_CLI::error( 'Polylang no está activo.' );
}
// As the admin, so block markup is saved untouched (WP-CLI has no user, which turns on kses filtering).
wp_set_current_user( 1 );
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

$json  = $args[0] ?? '';
$items = $json && is_readable( $json ) ? json_decode( file_get_contents( $json ), true ) : null;
if ( ! is_array( $items ) ) {
	WP_CLI::error( "No pude leer el contenido: $json" );
}
$backup_dir = getenv( 'HOME' ) . '/backups/content-' . gmdate( 'Ymd-His' );
$report     = array();

/** Theme pattern content, already rendered from its PHP file. */
function lh_sync_pattern( $slug ) {
	$p = WP_Block_Patterns_Registry::get_instance()->get_registered( "luishenao/$slug" );
	if ( ! $p ) {
		WP_CLI::error( "Falta el pattern luishenao/$slug: ¿se desplegó el tema?" );
	}
	return $p['content'];
}

/** Attachment for a theme image: reuses one already in the library, else imports it once. */
function lh_sync_media( $file ) {
	if ( ! $file ) {
		return 0;
	}
	$base  = pathinfo( $file, PATHINFO_FILENAME );
	$found = get_posts( array(
		'post_type'   => 'attachment',
		'numberposts' => 1,
		'fields'      => 'ids',
		'lang'        => '',
		'meta_query'  => array(
			'relation' => 'OR',
			array( 'key' => '_lh_source', 'value' => $file ),
			array( 'key' => '_wp_attached_file', 'value' => "/$base.", 'compare' => 'LIKE' ),
		),
	) );
	if ( $found ) {
		return (int) $found[0];
	}
	$src = get_theme_file_path( "assets/img/$file" );
	if ( ! is_readable( $src ) ) {
		WP_CLI::warning( "No existe la imagen $file en el tema" );
		return 0;
	}
	$tmp = wp_tempnam( $file );
	copy( $src, $tmp );
	$id = media_handle_sideload( array( 'name' => $file, 'tmp_name' => $tmp ), 0 );
	if ( is_wp_error( $id ) ) {
		WP_CLI::warning( "$file: " . $id->get_error_message() );
		return 0;
	}
	update_post_meta( $id, '_lh_source', $file );
	WP_CLI::log( "Imagen importada: $file (ID $id)" );
	return (int) $id;
}

/** Category by name in a language (Polylang free needs a distinct slug per language). */
function lh_sync_category( $name, $lang ) {
	if ( ! $name ) {
		return 0;
	}
	$slug = sanitize_title( $name ) . ( 'en' === $lang ? '-en' : '' );
	$term = get_term_by( 'slug', $slug, 'category' );
	if ( ! $term ) {
		$r = wp_insert_term( $name, 'category', array( 'slug' => $slug ) );
		if ( is_wp_error( $r ) ) {
			WP_CLI::warning( "Categoría $name: " . $r->get_error_message() );
			return 0;
		}
		$term = get_term( $r['term_id'], 'category' );
	}
	pll_set_term_language( $term->term_id, $lang );
	return (int) $term->term_id;
}

/** Existing post of a type with this slug in this language. */
function lh_sync_find( $type, $slug, $lang ) {
	$ids = get_posts( array( 'post_type' => $type, 'name' => $slug, 'post_status' => 'any', 'numberposts' => 1, 'fields' => 'ids', 'lang' => $lang ) );
	return $ids ? (int) $ids[0] : 0;
}

/** Create or update one item; returns its ID (0 when skipped). */
function lh_sync_upsert( array $it, $existing_id, $backup_dir, array &$report ) {
	$hash = md5( $it['content'] );
	$data = array(
		'post_type'    => $it['type'],
		'post_status'  => 'publish',
		'post_title'   => $it['title'],
		'post_content' => $it['content'],
		'post_excerpt' => $it['excerpt'] ?? '',
		'post_author'  => 1,
	);
	if ( ! empty( $it['slug'] ) ) {
		$data['post_name'] = $it['slug'];
	}
	$action = 'creado';
	if ( $existing_id ) {
		$current = get_post_field( 'post_content', $existing_id );
		$stored  = get_post_meta( $existing_id, '_lh_sync_hash', true );
		if ( $stored && md5( $current ) !== $stored ) {
			$report[] = array( $it['lang'], $it['type'], $it['slug'] ?? '', get_permalink( $existing_id ), 'OMITIDO: editado en WordPress' );
			return 0;
		}
		if ( md5( $current ) === $hash && $current ) {
			$action = 'sin cambios';
		} else {
			if ( ! $stored && $current ) {
				wp_mkdir_p( $backup_dir );
				file_put_contents( "$backup_dir/{$it['lang']}-" . get_post_field( 'post_name', $existing_id ) . '.html', $current );
			}
			$action = 'actualizado';
		}
		$data['ID'] = $existing_id;
		if ( empty( $it['slug'] ) ) {
			unset( $data['post_name'] );
		}
		$id = wp_update_post( wp_slash( $data ), true );
	} else {
		$id = wp_insert_post( wp_slash( $data ), true );
	}
	if ( is_wp_error( $id ) ) {
		WP_CLI::warning( ( $it['slug'] ?? $it['title'] ) . ': ' . $id->get_error_message() );
		return 0;
	}
	update_post_meta( $id, '_lh_sync_hash', md5( get_post_field( 'post_content', $id ) ) );
	pll_set_post_language( $id, $it['lang'] );
	if ( ! empty( $it['seo_title'] ) ) {
		update_post_meta( $id, '_lh_seo_title', $it['seo_title'] );
	} else {
		delete_post_meta( $id, '_lh_seo_title' );
	}
	if ( ! empty( $it['template'] ) ) {
		update_post_meta( $id, '_wp_page_template', $it['template'] );
	}
	if ( ! empty( $it['image'] ) && ( $att = lh_sync_media( $it['image'] ) ) ) {
		set_post_thumbnail( $id, $att );
	}
	if ( 'post' === $it['type'] && ( $cat = lh_sync_category( $it['category'] ?? '', $it['lang'] ) ) ) {
		wp_set_post_categories( $id, array( $cat ) );
	}
	$report[] = array( $it['lang'], $it['type'], $it['slug'] ?? '', get_permalink( $id ), $action );
	return (int) $id;
}

// Pages assembled from theme patterns.
$home_es  = array( 'home-hero', 'home-problema', 'home-beneficios', 'home-closet', 'home-como', 'home-piloto', 'home-por-que', 'home-para-ti', 'faq', 'cta-final' );
$landing  = array( 'landing-hero', 'home-beneficios', 'landing-comparativa', 'home-como', 'home-piloto', 'faq', 'cta-final' );
$compose  = fn( $slugs, $lang ) => implode( "\n\n", array_map( fn( $s ) => lh_sync_pattern( 'en' === $lang ? "en-$s" : $s ), $slugs ) );
$front_es = (int) get_option( 'page_on_front' );
$front_en = (int) pll_get_post( $front_es, 'en' );

$pairs = array();
$id    = lh_sync_upsert( array( 'type' => 'page', 'lang' => 'es', 'title' => 'Inicio', 'content' => $compose( $home_es, 'es' ) ), $front_es, $backup_dir, $report );
if ( $front_en ) {
	lh_sync_upsert( array( 'type' => 'page', 'lang' => 'en', 'title' => 'Home', 'content' => $compose( $home_es, 'en' ) ), $front_en, $backup_dir, $report );
}
$items[] = array(
	'type' => 'page', 'lang' => 'es', 'slug' => 'clientes-para-negocios-de-closets', 'pair' => 'landing', 'template' => 'page-landing',
	'title' => 'Clientes para negocios de custom closets',
	'excerpt' => 'Home owners de tu zona que ya confirmaron presupuesto, timeline y ubicación, directo a tu WhatsApp. Piloto de $650/mes con garantía de 21 días.',
	'content' => $compose( $landing, 'es' ),
);
$items[] = array(
	'type' => 'page', 'lang' => 'en', 'slug' => 'custom-closet-leads', 'pair' => 'landing', 'template' => 'page-landing',
	'title' => 'Leads for Custom Closet Companies',
	'excerpt' => 'Exclusive, pre-qualified homeowners in your area, texted to your phone and saved in your CRM. $650/mo pilot with a 21-day launch guarantee.',
	'content' => $compose( $landing, 'en' ),
);

foreach ( $items as $it ) {
	$it['image'] = $it['image'] ?? '';
	$id          = lh_sync_upsert( $it, lh_sync_find( $it['type'], $it['slug'], $it['lang'] ), $backup_dir, $report );
	if ( $id && ! empty( $it['pair'] ) ) {
		$pairs[ $it['pair'] ][ $it['lang'] ] = $id;
	}
}
foreach ( $pairs as $key => $tr ) {
	if ( count( $tr ) > 1 ) {
		pll_save_post_translations( $tr );
	}
}

flush_rewrite_rules();
WP_CLI\Utils\format_items( 'table', array_map( fn( $r ) => array_combine( array( 'idioma', 'tipo', 'slug', 'url', 'acción' ), $r ), $report ), array( 'idioma', 'tipo', 'slug', 'url', 'acción' ) );
if ( is_dir( $backup_dir ) ) {
	WP_CLI::log( 'Contenido anterior guardado en ' . str_replace( getenv( 'HOME' ) . '/', '~/', $backup_dir ) );
}
WP_CLI::success( count( $report ) . ' elementos procesados' );
