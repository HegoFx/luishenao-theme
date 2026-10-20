<?php
/**
 * SEO and GEO (generative engine optimization), without an SEO plugin.
 *
 * One source of truth for the business facts (lh_seo()), in both languages, feeds:
 * document titles, meta descriptions, canonical, Open Graph / Twitter, JSON-LD and /llms.txt.
 * Page excerpts override the default descriptions, so they stay editable in WordPress.
 * Indexing itself is WordPress's call: on staging "Discourage search engines" stays on.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Business facts and default copy for the current language (or the one asked for).
 */
function lh_seo( $lang = null ) {
	$en = $lang ? 'en' === $lang : lh_is_en();
	return $en ? array(
		'lang'        => 'en',
		'locale'      => 'en_US',
		'home_title'  => 'Meta Ads for Custom Closet Companies in the US | Luis Henao',
		'home_desc'   => 'Meta Ads for custom closet companies in the US: 6 to 8 pre-qualified homeowners a month, texted to your phone and CRM. $650/mo pilot, 21-day guarantee.',
		'blog_title'  => 'Blog: ideas to sell more closets | Luis Henao',
		'blog_desc'   => 'What I learn running Meta Ads for custom closet companies in the US. No fluff, just numbers.',
		'job'         => 'Meta Ads specialist for custom closet companies',
		'service'     => 'Meta Ads lead generation for custom closet companies',
		'service_desc' => 'Meta Ads campaigns plus SMS pre-qualification for independent custom closet companies. Homeowners confirm budget, timeline and location before they reach the owner, and land in a GoHighLevel pipeline.',
		'offer'       => 'One-month pilot: campaign, ad creative, SMS pre-qualification flow, GoHighLevel pipeline, daily lead review, optimization every 7 to 10 days and an end-of-month report. Ad spend (minimum $900/mo) is paid by the client in their own Meta account. No commission, no long-term contract. 21-day launch guarantee.',
		'og_image'    => 'og-en.jpg',
	) : array(
		'lang'        => 'es',
		'locale'      => 'es_MX',
		'home_title'  => 'Meta Ads para negocios de custom closets en USA | Luis Henao',
		'home_desc'   => 'Meta Ads para negocios de custom closets en USA: de 6 a 8 home owners pre-calificados al mes, directo a tu WhatsApp. Piloto de $650/mes con garantía de 21 días.',
		'blog_title'  => 'Blog: ideas para vender más closets | Luis Henao',
		'blog_desc'   => 'Lo que aprendo corriendo Meta Ads para negocios de custom closets en USA. Sin humo, con números.',
		'job'         => 'Especialista en Meta Ads para negocios de custom closets',
		'service'     => 'Generación de leads con Meta Ads para negocios de custom closets',
		'service_desc' => 'Campañas de Meta Ads con pre-filtro por WhatsApp para negocios independientes de custom closets en USA. Los home owners confirman presupuesto, timeline y ubicación antes de hablar con el dueño.',
		'offer'       => 'Piloto de un mes: campaña, diseño de anuncios, script de pre-filtro para WhatsApp, Messenger e Instagram, revisión diaria de leads, optimización cada 7 a 10 días y reporte al cierre. El presupuesto de anuncios (mínimo $900/mes) lo paga el cliente en su propia cuenta de Meta. Sin comisión ni contratos largos. Garantía de ejecución de 21 días.',
		'og_image'    => 'og-es.jpg',
	);
}

/** URL of the home page in a language (Polylang aware). */
function lh_home_url( $lang = null ) {
	$lang = $lang ?: lh_seo()['lang'];
	return function_exists( 'pll_home_url' ) ? pll_home_url( $lang ) : home_url( '/' );
}

/** Canonical URL of the current view, or '' when there isn't a meaningful one. */
function lh_canonical() {
	if ( is_front_page() ) {
		return lh_home_url();
	}
	if ( is_singular() ) {
		return wp_get_canonical_url() ?: get_permalink();
	}
	if ( is_home() ) {
		$id = (int) get_option( 'page_for_posts' );
		$url = $id ? get_permalink( function_exists( 'pll_get_post' ) ? ( pll_get_post( $id ) ?: $id ) : $id ) : home_url( '/' );
		$paged = (int) get_query_var( 'paged' );
		return $paged > 1 ? trailingslashit( $url ) . user_trailingslashit( "page/$paged", 'paged' ) : $url;
	}
	if ( is_category() || is_tag() || is_tax() ) {
		$link = get_term_link( get_queried_object() );
		return is_wp_error( $link ) ? '' : $link;
	}
	return '';
}

/** Meta description: the page's own excerpt when it has one, else the defaults above. */
function lh_description() {
	$s = lh_seo();
	if ( is_front_page() ) {
		$id = (int) get_queried_object_id();
		return $id && has_excerpt( $id ) ? get_the_excerpt( $id ) : $s['home_desc'];
	}
	if ( is_home() ) {
		return $s['blog_desc'];
	}
	if ( is_singular() ) {
		$post = get_queried_object();
		$text = has_excerpt( $post ) ? $post->post_excerpt : wp_strip_all_tags( strip_shortcodes( excerpt_remove_blocks( $post->post_content ) ) );
		return wp_trim_words( $text, 28, '…' );
	}
	if ( is_category() || is_tag() ) {
		return wp_strip_all_tags( term_description() );
	}
	return '';
}

// Titles: "Page | Luis Henao", with a keyword title on the home and the blog.
add_filter( 'document_title_separator', fn() => '|' );
add_filter( 'pre_get_document_title', function ( $title ) {
	if ( is_front_page() ) {
		return lh_seo()['home_title'];
	}
	if ( is_home() && ! is_paged() ) {
		return lh_seo()['blog_title'];
	}
	return $title;
} );
add_filter( 'document_title_parts', function ( $parts ) {
	unset( $parts['tagline'] );
	$parts['site'] = 'Luis Henao';
	return $parts;
} );

// Core prints the canonical only on singular views; the theme covers the rest.
add_action( 'wp_head', function () {
	if ( ! is_singular() && ( $url = lh_canonical() ) ) {
		printf( '<link rel="canonical" href="%s">' . "\n", esc_url( $url ) );
	}
}, 1 );

// Description, Open Graph and Twitter.
add_action( 'wp_head', function () {
	$s     = lh_seo();
	$desc  = lh_description();
	$url   = lh_canonical();
	$title = wp_get_document_title();
	$img   = get_theme_file_uri( 'assets/img/' . $s['og_image'] );
	$img_w = 1200;
	$img_h = 630;
	if ( is_singular() && ! is_front_page() && has_post_thumbnail() ) {
		$src = wp_get_attachment_image_src( get_post_thumbnail_id(), '1536x1536' );
		if ( $src ) {
			list( $img, $img_w, $img_h ) = $src;
		}
	}
	$tags = array(
		array( 'name', 'description', $desc ),
		array( 'property', 'og:type', is_singular( 'post' ) ? 'article' : 'website' ),
		array( 'property', 'og:site_name', 'Luis Henao' ),
		array( 'property', 'og:locale', $s['locale'] ),
		array( 'property', 'og:locale:alternate', lh_seo( 'en' === $s['lang'] ? 'es' : 'en' )['locale'] ),
		array( 'property', 'og:title', $title ),
		array( 'property', 'og:description', $desc ),
		array( 'property', 'og:url', $url ),
		array( 'property', 'og:image', $img ),
		array( 'property', 'og:image:width', $img_w ),
		array( 'property', 'og:image:height', $img_h ),
		array( 'name', 'twitter:card', 'summary_large_image' ),
	);
	if ( is_singular( 'post' ) ) {
		$tags[] = array( 'property', 'article:published_time', get_the_date( 'c' ) );
		$tags[] = array( 'property', 'article:modified_time', get_the_modified_date( 'c' ) );
	}
	foreach ( $tags as $t ) {
		if ( '' !== (string) $t[2] ) {
			printf( '<meta %s="%s" content="%s">' . "\n", $t[0], esc_attr( $t[1] ), esc_attr( $t[2] ) );
		}
	}
}, 2 );

// x-default for visitors in other languages: the English site.
add_filter( 'pll_rel_hreflang_attributes', function ( $hreflangs ) {
	if ( isset( $hreflangs['en'] ) && ! isset( $hreflangs['x-default'] ) ) {
		$hreflangs['x-default'] = $hreflangs['en'];
	}
	return $hreflangs;
} );

/**
 * FAQ pairs read from the page's own Details blocks, so the schema always matches what's on the page.
 */
function lh_faq_from_blocks( $blocks ) {
	$out = array();
	foreach ( $blocks as $b ) {
		if ( 'core/details' === $b['blockName'] ) {
			$html = render_block( $b );
			if ( preg_match( '#<summary[^>]*>(.*?)</summary>(.*)</details>#s', $html, $m ) ) {
				$q = trim( wp_strip_all_tags( $m[1] ) );
				$a = trim( wp_strip_all_tags( $m[2] ) );
				if ( $q && $a ) {
					$out[] = array( $q, $a );
				}
			}
		} elseif ( ! empty( $b['innerBlocks'] ) ) {
			$out = array_merge( $out, lh_faq_from_blocks( $b['innerBlocks'] ) );
		}
	}
	return $out;
}

/**
 * JSON-LD graph: who Luis is, what he sells, the site and the current page.
 * Written for search engines and for AI answer engines, which lean on explicit entities.
 */
function lh_schema() {
	$s       = lh_seo();
	$home    = lh_home_url();
	$person  = $home . '#person';
	$service = $home . '#service';
	$site    = $home . '#website';
	$url     = lh_canonical() ?: $home;
	$states  = array( 'Florida', 'Texas', 'Arizona' );

	$graph = array(
		array(
			'@type'         => 'Person',
			'@id'           => $person,
			'name'          => 'Luis Henao',
			'jobTitle'      => $s['job'],
			'image'         => get_theme_file_uri( 'assets/img/luis-retrato.webp' ),
			'url'           => $home,
			'knowsLanguage' => array( 'es', 'en' ),
			'homeLocation'  => array( '@type' => 'Country', 'name' => 'Colombia' ),
			'knowsAbout'    => array( 'Meta Ads', 'Facebook Ads', 'Instagram Ads', 'Lead generation', 'Lead qualification', 'GoHighLevel', 'Custom closets', 'Home improvement marketing' ),
		),
		array(
			'@type'             => 'Service',
			'@id'               => $service,
			'name'              => $s['service'],
			'serviceType'       => 'Meta Ads lead generation',
			'description'       => $s['service_desc'],
			'provider'          => array( '@id' => $person ),
			'audience'          => array( '@type' => 'BusinessAudience', 'audienceType' => 'Independent custom closet companies' ),
			'areaServed'        => array_map( fn( $st ) => array( '@type' => 'State', 'name' => $st, 'containedInPlace' => array( '@type' => 'Country', 'name' => 'United States' ) ), $states ),
			'availableLanguage' => array( 'es', 'en' ),
			'offers'            => array(
				'@type'              => 'Offer',
				'name'               => 'en' === $s['lang'] ? 'Pilot' : 'Piloto',
				'description'        => $s['offer'],
				'price'              => '650',
				'priceCurrency'      => 'USD',
				'priceSpecification' => array( '@type' => 'UnitPriceSpecification', 'price' => '650', 'priceCurrency' => 'USD', 'unitText' => 'MONTH', 'referenceQuantity' => array( '@type' => 'QuantitativeValue', 'value' => 1, 'unitCode' => 'MON' ) ),
				'url'                => $home . ( 'en' === $s['lang'] ? '#pilot' : '#piloto' ),
			),
		),
		array(
			'@type'      => 'WebSite',
			'@id'        => $site,
			'url'        => $home,
			'name'       => 'Luis Henao',
			'inLanguage' => $s['lang'],
			'publisher'  => array( '@id' => $person ),
		),
	);

	$page = array(
		'@type'       => is_home() ? 'CollectionPage' : ( is_page( array( 'about', 'sobre-mi' ) ) ? 'AboutPage' : 'WebPage' ),
		'@id'         => $url . '#webpage',
		'url'         => $url,
		'name'        => wp_get_document_title(),
		'description' => lh_description(),
		'inLanguage'  => $s['lang'],
		'isPartOf'    => array( '@id' => $site ),
	);
	if ( is_front_page() ) {
		$page['about']      = array( '@id' => $service );
		$page['mainEntity'] = array( '@id' => $service );
	}

	if ( is_singular() ) {
		$post = get_queried_object();
		$faq  = lh_faq_from_blocks( parse_blocks( $post->post_content ) );
		if ( $faq ) {
			$graph[] = array(
				'@type'      => 'FAQPage',
				'@id'        => $url . '#faq',
				'inLanguage' => $s['lang'],
				'isPartOf'   => array( '@id' => $url . '#webpage' ),
				'mainEntity' => array_map( fn( $qa ) => array(
					'@type'          => 'Question',
					'name'           => $qa[0],
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $qa[1] ),
				), $faq ),
			);
		}
		if ( ! is_front_page() ) {
			$crumbs = array( array( 'en' === $s['lang'] ? 'Home' : 'Inicio', $home ) );
			if ( is_singular( 'post' ) ) {
				$blog_id = (int) get_option( 'page_for_posts' );
				$blog_id = function_exists( 'pll_get_post' ) ? ( pll_get_post( $blog_id ) ?: $blog_id ) : $blog_id;
				if ( $blog_id ) {
					$crumbs[] = array( 'Blog', get_permalink( $blog_id ) );
				}
			}
			$crumbs[]           = array( get_the_title( $post ), $url );
			$page['breadcrumb'] = array( '@id' => $url . '#breadcrumb' );
			$graph[]            = array(
				'@type'           => 'BreadcrumbList',
				'@id'             => $url . '#breadcrumb',
				'itemListElement' => array_map( fn( $c, $i ) => array( '@type' => 'ListItem', 'position' => $i + 1, 'name' => $c[0], 'item' => $c[1] ), $crumbs, array_keys( $crumbs ) ),
			);
		}
		if ( is_singular( 'post' ) ) {
			$article = array(
				'@type'            => 'BlogPosting',
				'@id'              => $url . '#article',
				'headline'         => get_the_title( $post ),
				'description'      => lh_description(),
				'datePublished'    => get_the_date( 'c', $post ),
				'dateModified'     => get_the_modified_date( 'c', $post ),
				'inLanguage'       => $s['lang'],
				'author'           => array( '@id' => $person ),
				'publisher'        => array( '@id' => $person ),
				'mainEntityOfPage' => array( '@id' => $url . '#webpage' ),
			);
			if ( has_post_thumbnail( $post ) ) {
				$article['image'] = wp_get_attachment_image_url( get_post_thumbnail_id( $post ), '1536x1536' );
			}
			$graph[] = $article;
		}
	}
	$graph[] = $page;

	return array( '@context' => 'https://schema.org', '@graph' => $graph );
}

add_action( 'wp_head', function () {
	if ( is_404() || is_search() ) {
		return;
	}
	echo '<script type="application/ld+json">' . wp_json_encode( lh_schema(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
}, 3 );

/**
 * /llms.txt: a plain summary of the business for AI assistants (llmstxt.org format), both languages.
 */
function lh_llms_txt() {
	$es   = lh_seo( 'es' );
	$en   = lh_seo( 'en' );
	$h_es = lh_home_url( 'es' );
	$h_en = lh_home_url( 'en' );
	$page = function ( $slug, $lang ) {
		$p = get_page_by_path( $slug );
		if ( $p && function_exists( 'pll_get_post' ) ) {
			$p = get_post( pll_get_post( $p->ID, $lang ) ?: $p->ID );
		}
		return $p ? get_permalink( $p ) : '';
	};
	$blog_es = get_permalink( (int) get_option( 'page_for_posts' ) );
	$blog_en = function_exists( 'pll_get_post' ) ? get_permalink( pll_get_post( (int) get_option( 'page_for_posts' ), 'en' ) ) : '';
	$about_es = $page( 'sobre-mi', 'es' );
	$about_en = $page( 'sobre-mi', 'en' );

	$lines = array(
		'# Luis Henao',
		'',
		'> ' . $en['service_desc'] . ' Bilingual (English and Spanish), based in Colombia and working on US hours. Serves Florida, Texas and Arizona.',
		'',
		'## Offer',
		'',
		'- ' . $en['offer'],
		'- Price: $650 USD per month during the pilot (standard rate will be $1,500/mo).',
		'- Goal: 6 to 8 pre-qualified homeowners in the month. No guaranteed sales.',
		'- Best fit: independent custom closet companies, 1 to 4 years operating, 10+ Google reviews rated 4.4+, selling 3 to 8 closets a month at $5k to $8k, able to spend $900/mo or more on ads. Not for franchises (California Closets, Closet Factory and similar).',
		'- English clients get leads by SMS in a GoHighLevel pipeline; Spanish-speaking clients get them on WhatsApp.',
		'',
		'## English',
		'',
		"- [Home]($h_en): Meta Ads for custom closet companies in the US",
	);
	if ( $blog_en ) {
		$lines[] = "- [Blog]($blog_en): ideas to sell more closets";
	}
	if ( $about_en ) {
		$lines[] = "- [About]($about_en)";
	}
	$lines = array_merge( $lines, array(
		'',
		'## Español',
		'',
		'> ' . $es['service_desc'],
		'',
		"- [Inicio]($h_es): Meta Ads para negocios de custom closets en USA",
		"- [Blog]($blog_es): ideas para vender más closets",
	) );
	if ( $about_es ) {
		$lines[] = "- [Sobre mí]($about_es)";
	}
	return implode( "\n", $lines ) . "\n";
}

add_action( 'parse_request', function ( $wp ) {
	$path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
	if ( 'llms.txt' !== $path ) {
		return;
	}
	status_header( 200 );
	header( 'Content-Type: text/plain; charset=utf-8' );
	header( 'X-Robots-Tag: noindex' );
	echo lh_llms_txt(); // phpcs:ignore WordPress.Security.EscapeOutput -- plain text built from trusted strings.
	exit;
}, 0 );
