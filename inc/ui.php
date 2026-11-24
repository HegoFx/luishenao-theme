<?php
/**
 * Code-drawn illustrations (no images): small interface mockups that loop to explain a section.
 * Markup only; motion lives in assets/css/lab.css (CSS loops) and assets/js/lab.js (feed, stage, counters).
 * Every one is decorative (aria-hidden) and shows sample data, labeled as an example.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Sample homeowners for the mockups. Illustrative only, never presented as real clients. */
function lh_ui_people() {
	$en = lh_is_en();
	return array(
		array( 'MG', 'Megan G.', 'Tampa, FL', $en ? 'Walk-in' : 'Walk-in', '$8k–12k', $en ? 'This month' : 'Este mes' ),
		array( 'JR', 'Jason R.', 'Orlando, FL', $en ? 'Reach-in x2' : 'Reach-in x2', '$5k–7k', $en ? '30 days' : '30 días' ),
		array( 'AL', 'Ashley L.', 'Scottsdale, AZ', $en ? 'Walk-in + garage' : 'Walk-in + garage', '$12k+', $en ? '60 days' : '60 días' ),
		array( 'CP', 'Carlos P.', 'Miami, FL', $en ? 'Primary closet' : 'Closet principal', '$7k–9k', $en ? 'This month' : 'Este mes' ),
		array( 'DT', 'Dana T.', 'Austin, TX', 'Walk-in', '$9k–11k', $en ? '45 days' : '45 días' ),
	);
}

function lh_ui_bar( $title, $live = '' ) {
	return '<div class="lh-ui-bar"><span class="lh-ui-dots"><i></i><i></i><i></i></span><span class="lh-ui-t">' . esc_html( $title ) . '</span>'
		. ( $live ? '<span class="lh-ui-live"><i></i>' . esc_html( $live ) . '</span>' : '' ) . '</div>';
}

function lh_ui_cap() {
	return '<p class="lh-ui-cap">' . ( lh_is_en() ? 'Illustrative example' : 'Ejemplo ilustrativo' ) . '</p>';
}

function lh_ui_lead_card( $p ) {
	$en = lh_is_en();
	return '<div class="lh-fc"><div class="lh-fc-av">' . esc_html( $p[0] ) . '</div><div class="lh-fc-b">'
		. '<div class="lh-fc-top"><b>' . ( $en ? 'New pre-qualified homeowner' : 'Nuevo homeowner prefiltrado' ) . '</b><span>' . ( $en ? 'now' : 'ahora' ) . '</span></div>'
		. '<div class="lh-fc-who">' . esc_html( $p[1] . ' · ' . $p[2] ) . '</div>'
		. '<ul class="lh-fc-tags"><li>' . ( $en ? 'Area' : 'Zona' ) . '</li><li>' . esc_html( $p[4] ) . '</li><li>' . esc_html( $p[3] ) . '</li><li>' . esc_html( $p[5] ) . '</li></ul>'
		. '</div></div>';
}

/**
 * Returns the markup of one illustration.
 */
function lh_ui( $name ) {
	$en = lh_is_en();
	$people = lh_ui_people();
	switch ( $name ) {

		/* Hero: pre-qualified homeowners arriving, each checks off area, budget, project and timeline. */
		case 'feed':
			$cards = '';
			foreach ( array_slice( $people, 0, 3 ) as $p ) {
				$cards .= lh_ui_lead_card( $p );
			}
			return '<div class="lh-ui lh-ui-feed" aria-hidden="true" data-people="' . esc_attr( wp_json_encode( $people ) ) . '">'
				. '<div class="lh-ui-glow"></div><div class="lh-ui-win">' . lh_ui_bar( 'Closet Ads Lab', $en ? 'Live' : 'En vivo' )
				. '<div class="lh-feed-list">' . $cards . '</div>'
				. '<div class="lh-feed-foot"><span>' . ( $en ? 'Pre-qualified this week' : 'Prefiltrados esta semana' ) . '</span><b class="lh-feed-count">3</b></div>'
				. '</div>' . lh_ui_cap() . '</div>';

		/* Problem: clicks go in, tire-kickers bounce off the filter, pre-qualified homeowners get through. */
		case 'funnel':
			$dots = '';
			for ( $i = 0; $i < 14; $i++ ) {
				$pass  = in_array( $i, array( 1, 4, 8, 11 ), true );
				$dots .= sprintf( '<i class="%s" style="--d:%.2fs;--y:%d%%"></i>', $pass ? 'ok' : 'no', $i * 0.42, 18 + ( $i * 37 ) % 64 );
			}
			$chips = $en ? array( 'Area', 'Budget', 'Project', 'Timeline' ) : array( 'Zona', 'Presupuesto', 'Proyecto', 'Plazo' );
			return '<div class="lh-ui lh-ui-funnel" aria-hidden="true"><div class="lh-ui-win">'
				. '<div class="lh-fn-track">' . $dots
				. '<div class="lh-fn-in"><b>' . ( $en ? 'Ad clicks' : 'Clics de anuncios' ) . '</b><span>' . ( $en ? 'everyone' : 'de todo' ) . '</span></div>'
				. '<div class="lh-fn-gate"><span class="lh-fn-gate-t">' . ( $en ? 'Filter' : 'Filtro' ) . '</span>' . implode( '', array_map( fn( $c ) => '<em>' . esc_html( $c ) . '</em>', $chips ) ) . '</div>'
				. '<div class="lh-fn-out"><b>' . ( $en ? 'Pre-qualified' : 'Prefiltrados' ) . '</b><span>' . ( $en ? 'to you' : 'a ti' ) . '</span></div>'
				. '</div></div>' . lh_ui_cap() . '</div>';

		/* Closet Ads Lab scenes. */
		case 'scene-1':
			$pins = '';
			$spots = array( array( 46, 40, 1 ), array( 58, 55, 1 ), array( 40, 62, 1 ), array( 52, 33, 1 ), array( 63, 44, 1 ), array( 45, 50, 1 ),
				array( 14, 20, 0 ), array( 86, 26, 0 ), array( 12, 78, 0 ), array( 88, 74, 0 ), array( 25, 88, 0 ), array( 78, 12, 0 ) );
			foreach ( $spots as $k => $s ) {
				$pins .= sprintf( '<i class="%s" style="left:%d%%;top:%d%%;--d:%.2fs"></i>', $s[2] ? 'in' : 'out', $s[0], $s[1], $k * 0.25 );
			}
			return '<div class="lh-scene lh-scene-map" data-scene="1"><div class="lh-map">' . $pins . '<span class="lh-map-ring"></span><span class="lh-map-ring r2"></span><span class="lh-map-zone"></span>'
				. '<span class="lh-map-tag">' . ( $en ? 'Your service area' : 'Tu zona de servicio' ) . '</span></div></div>';

		case 'scene-2':
			$kinds = $en ? array( 'Image', 'Carousel', 'Video', 'Image', 'Video', 'Carousel' ) : array( 'Imagen', 'Carrusel', 'Video', 'Imagen', 'Video', 'Carrusel' );
			$ads   = '';
			foreach ( $kinds as $k => $kind ) {
				$ads .= sprintf( '<div class="lh-ad" style="--d:%.2fs"><div class="lh-ad-img a%d"></div><span>%s · %02d</span><i style="--w:%d%%"></i></div>', $k * 0.18, $k % 3, esc_html( $kind ), $k + 1, array( 64, 38, 82, 47, 71, 29 )[ $k ] );
			}
			return '<div class="lh-scene lh-scene-ads" data-scene="2"><div class="lh-ads">' . $ads . '</div><span class="lh-ad-win">' . ( $en ? 'Winning angle' : 'Ángulo ganador' ) . '</span></div>';

		case 'scene-3':
			$rows = $en ? array( array( 'Walk-in · video', 'On' ), array( 'Before/after · image', 'On' ), array( 'Generic promo', 'Off' ) ) : array( array( 'Walk-in · video', 'Activo' ), array( 'Antes/después · imagen', 'Activo' ), array( 'Promo genérica', 'Apagado' ) );
			$list = '';
			foreach ( $rows as $k => $r ) {
				$list .= '<li class="' . ( 2 === $k ? 'kill' : '' ) . '"><span>' . esc_html( $r[0] ) . '</span><b class="lh-sw"><i></i></b></li>';
			}
			return '<div class="lh-scene lh-scene-chart" data-scene="3"><svg viewBox="0 0 320 120" preserveAspectRatio="none" class="lh-chart">'
				. '<path class="grid" d="M0 30H320M0 60H320M0 90H320"/>'
				. '<path class="area" d="M0 104 C40 98 60 92 90 80 S150 70 180 52 S250 36 320 18 V120 H0Z"/>'
				. '<path class="line" pathLength="1" d="M0 104 C40 98 60 92 90 80 S150 70 180 52 S250 36 320 18"/></svg>'
				. '<span class="lh-chart-tag">' . ( $en ? 'Cost per pre-qualified homeowner ↓' : 'Costo por homeowner prefiltrado ↓' ) . '</span>'
				. '<ul class="lh-toggles">' . $list . '</ul></div>';

		case 'stage':
			return '<div class="lh-ui lh-ui-stage" aria-hidden="true" data-scene="1"><div class="lh-ui-win">' . lh_ui_bar( 'Closet Ads Lab', $en ? 'Step 1 of 3' : 'Paso 1 de 3' )
				. '<div class="lh-scenes">' . lh_ui( 'scene-1' ) . lh_ui( 'scene-2' ) . lh_ui( 'scene-3' ) . '</div></div>' . lh_ui_cap() . '</div>';

		/* Small loops for the deliverable cards. */
		case 'mini-ads':
			$t = '';
			for ( $i = 0; $i < 6; $i++ ) {
				$t .= sprintf( '<i class="a%d" style="--d:%.1fs"></i>', $i % 3, $i * 0.5 );
			}
			return '<div class="lh-mini lh-mini-ads" aria-hidden="true">' . $t . '</div>';

		case 'mini-check':
			$c = $en ? array( 'Homeowner in your area', 'Budget range', 'Project type', 'Timeline' ) : array( 'Dueño en tu zona', 'Rango de presupuesto', 'Tipo de proyecto', 'Plazo' );
			return '<ul class="lh-mini lh-mini-check" aria-hidden="true">' . implode( '', array_map( fn( $x, $k ) => sprintf( '<li style="--d:%.1fs"><i></i>%s</li>', $k * 0.6, esc_html( $x ) ), $c, array_keys( $c ) ) ) . '</ul>';

		case 'mini-mail':
			return '<div class="lh-mini lh-mini-mail" aria-hidden="true"><div class="lh-mm-card"><b>' . ( $en ? 'New pre-qualified homeowner' : 'Nuevo homeowner prefiltrado' ) . '</b><span>Megan G. · Tampa, FL · $8k–12k</span></div><span class="lh-mm-badge">1</span></div>';

		case 'mini-board':
			$cols = $en ? array( 'New', 'Estimate', 'Sold' ) : array( 'Nuevo', 'Estimate', 'Vendido' );
			return '<div class="lh-mini lh-mini-board" aria-hidden="true">' . implode( '', array_map( fn( $c ) => '<div class="col"><span>' . esc_html( $c ) . '</span><i></i><i></i></div>', $cols ) ) . '<b class="lh-mb-move">MG</b></div>';

		case 'mini-cal':
			$d = $en ? array( 'M', 'T', 'W', 'T', 'F' ) : array( 'L', 'M', 'M', 'J', 'V' );
			$cells = '';
			for ( $i = 0; $i < 15; $i++ ) {
				$cells .= '<i' . ( 7 === $i ? ' class="hit"' : '' ) . '></i>';
			}
			return '<div class="lh-mini lh-mini-cal" aria-hidden="true"><div class="h">' . implode( '', array_map( fn( $x ) => '<span>' . $x . '</span>', $d ) ) . '</div><div class="g">' . $cells . '</div><span class="lh-mc-note">' . ( $en ? 'Reminder sent' : 'Recordatorio enviado' ) . '</span></div>';

		case 'mini-quote':
			return '<div class="lh-mini lh-mini-quote" aria-hidden="true"><div class="doc"><b>' . ( $en ? 'Quote' : 'Presupuesto' ) . ' #104</b><span class="age">' . ( $en ? '3 days, no reply' : '3 días sin respuesta' ) . '</span><span class="sent">' . ( $en ? 'Follow-up sent ✓' : 'Seguimiento enviado ✓' ) . '</span></div></div>';

		case 'mini-report':
			$b = '';
			foreach ( array( 38, 52, 46, 64, 72, 88 ) as $k => $h ) {
				$b .= sprintf( '<i style="--h:%d%%;--d:%.2fs"></i>', $h, $k * 0.12 );
			}
			return '<div class="lh-mini lh-mini-report" aria-hidden="true">' . $b . '</div>';

		/* Guarantees: day 0 → ads live by day 21 → 20 pre-qualified homeowners within 60 days of going live. */
		case 'timeline':
			$m = $en
				? array( array( 'Day 0', 'You give access' ), array( 'Day 21', 'Ads live' ), array( '+60 days', '20 pre-qualified' ) )
				: array( array( 'Día 0', 'Me das los accesos' ), array( 'Día 21', 'Anuncios al aire' ), array( '+60 días', '20 prefiltrados' ) );
			$marks = '';
			foreach ( $m as $k => $x ) {
				$marks .= '<li class="m' . $k . '"><b>' . esc_html( $x[0] ) . '</b><span>' . esc_html( $x[1] ) . '</span></li>';
			}
			return '<div class="lh-ui lh-ui-timeline" aria-hidden="true"><div class="lh-tl-track"><i class="lh-tl-fill"></i></div><ol class="lh-tl-marks">' . $marks . '</ol>'
				. '<div class="lh-tl-count"><b data-count="20">0</b><span>' . ( $en ? 'pre-qualified homeowners' : 'homeowners prefiltrados' ) . '</span></div></div>';
	}
	return '';
}
