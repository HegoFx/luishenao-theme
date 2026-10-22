<?php
/**
 * Title, meta description, Open Graph and JSON-LD for the landing, from inc/copy.php.
 * hreflang comes from Polylang. While on the temporary domain the site stays noindex (blog_public = 0).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'pre_get_document_title', function ( $title ) {
	return is_front_page() ? wt_copy()['seo']['title'] : $title;
} );

add_action( 'wp_head', function () {
	if ( ! is_front_page() ) {
		return;
	}
	$c   = wt_copy();
	$b   = wt_biz();
	$url = function_exists( 'pll_home_url' ) ? pll_home_url( wt_lang() ) : home_url( '/' );
	$img = wt_img( 'dr-torres.webp' );

	printf( '<meta name="description" content="%s">' . "\n", esc_attr( $c['seo']['desc'] ) );
	$og = array(
		'og:type'        => 'website',
		'og:site_name'   => $b['name'],
		'og:locale'      => 'es' === $c['lang'] ? 'es_US' : 'en_US',
		'og:title'       => $c['seo']['title'],
		'og:description' => $c['seo']['desc'],
		'og:url'         => $url,
		'og:image'       => $img,
	);
	foreach ( $og as $k => $v ) {
		printf( '<meta property="%s" content="%s">' . "\n", esc_attr( $k ), esc_attr( $v ) );
	}
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";

	$data = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type'                => 'MedicalClinic',
				'@id'                  => $b['site'] . '/#clinic',
				'name'                 => $b['name'],
				'url'                  => $b['site'],
				'telephone'            => $b['tel'],
				'faxNumber'            => $b['fax'],
				'email'                => $b['email'],
				'image'                => $img,
				'medicalSpecialty'     => 'Wound care',
				'availableLanguage'    => array( 'English', 'Spanish' ),
				'address'              => array(
					'@type'           => 'PostalAddress',
					'streetAddress'   => $b['street'],
					'addressLocality' => $b['city'],
					'addressRegion'   => $b['region'],
					'postalCode'      => $b['zip'],
					'addressCountry'  => 'US',
				),
				'openingHoursSpecification' => array(
					'@type'     => 'OpeningHoursSpecification',
					'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
					'opens'     => '08:00',
					'closes'    => '17:00',
				),
			),
			array(
				'@type'            => 'Physician',
				'name'             => $b['physician'],
				'image'            => $img,
				'worksFor'         => array( '@id' => $b['site'] . '/#clinic' ),
				'medicalSpecialty' => array( 'Wound care', 'Hyperbaric medicine' ),
			),
			array(
				'@type'       => 'MedicalWebPage',
				'url'         => $url,
				'name'        => $c['seo']['title'],
				'description' => $c['seo']['desc'],
				'inLanguage'  => $c['lang'],
				'about'       => array( '@type' => 'MedicalTherapy', 'name' => 'Hyperbaric Oxygen Therapy (HBOT)' ),
			),
		),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
}, 5 );

