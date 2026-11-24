<?php
/**
 * OFERTA v6: única fuente de datos variables (precio por escalera, cupos, contacto, calendario).
 * Lo usan los patterns, seo.php (JSON-LD y llms.txt) y la página de gracias.
 *
 * Para cambiar cupos: edita 'spots_taken' y haz push. El deploy vuelve a armar las páginas
 * (content-sync). Un valor vacío ('') se muestra como placeholder visible "[CONFIRM]".
 */

function lh_offer() {
	return array(
		// Clientes activos HOY. Se edita a mano. Nunca un contador falso.
		'spots_taken' => 0,
		'tiers'       => array(
			array( 'from' => 1, 'to' => 5, 'price' => 499 ),
			array( 'from' => 6, 'to' => 10, 'price' => 699 ),
			array( 'from' => 11, 'to' => null, 'price' => 799 ),
		),
		'min_spend'   => 1200, // pauta mínima al mes, directo a Meta
		'min_months'  => 3,
		'crm_value'   => 1200, // valor de referencia del CRM al año

		// Calendario de GoHighLevel: URL del widget (src del iframe). [CONFIRM]
		'calendar'    => '',
		// Solo se muestran en la página de gracias. [CONFIRM]
		'whatsapp'    => '', // internacional sin + ni espacios, ej. 573001234567
		'email'       => '',
		'instagram'   => '', // https://instagram.com/usuario

		// Reels de Instagram con análisis de anuncios de closets (URL del reel). Vacío = espacio reservado. [CONFIRM]
		'videos'      => array( '', '', '' ),

		// Términos pendientes de confirmar: vacíos se muestran como [CONFIRM].
		'confirm'     => array(
			'es' => array(
				'crm_renewal' => '', // monto de renovación del CRM después del año 1
			),
			'en' => array(
				'crm_renewal' => '',
			),
		),
		// Frase legal v7 (24 nov 2026). Revisión de abogado de EE. UU. antes de lanzar [CONFIRM].
		'legal'       => array(
			'es' => 'No garantizamos ventas ni ingresos. Las garantías aplican según las condiciones de nuestra página de Condiciones de las garantías.',
			'en' => "We don't guarantee sales or revenue. Guarantees apply under the conditions listed in our Guarantee Terms.",
		),
		'terms_url'   => array( 'es' => '/condiciones-garantias/', 'en' => '/en/guarantee-terms/' ),
	);
}

/**
 * Precio vigente, cupos que quedan en ese nivel y precio siguiente, calculados desde spots_taken.
 */
function lh_pricing() {
	$o    = lh_offer();
	$next = $o['spots_taken'] + 1;
	foreach ( $o['tiers'] as $i => $t ) {
		if ( $next >= $t['from'] && ( null === $t['to'] || $next <= $t['to'] ) ) {
			return array(
				'index'     => $i,
				'tier'      => $t,
				'next_tier' => $o['tiers'][ $i + 1 ] ?? null,
				'size'      => null === $t['to'] ? null : $t['to'] - $t['from'] + 1,
				'left'      => null === $t['to'] ? null : $t['to'] - $o['spots_taken'],
			);
		}
	}
}

/** $1,200 */
function lh_usd( $n ) {
	return '$' . number_format( (float) $n );
}

/** Placeholder visible para datos pendientes (mismo estilo que los placeholders de imagen). */
function lh_confirm( $label ) {
	return '<span class="lh-confirm">[CONFIRM] ' . esc_html( $label ) . '</span>';
}
