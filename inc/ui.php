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
				. '<div class="lh-ui-glow"></div><div class="lh-ui-win">' . lh_ui_bar( 'Closet Ads System', $en ? 'Live' : 'En vivo' )
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
				. '<div class="lh-fn-in">' . ( $en ? 'Ad traffic' : 'Tráfico de los anuncios' ) . '</div>'
				. '<div class="lh-fn-gate"><span class="lh-fn-gate-t">' . ( $en ? 'Filter' : 'Filtro' ) . '</span>' . implode( '', array_map( fn( $c ) => '<em>' . esc_html( $c ) . '</em>', $chips ) ) . '</div>'
				. '<div class="lh-fn-out">' . ( $en ? 'Pre-qualified homeowners' : 'Homeowners prefiltrados' ) . '</div>'
				. '</div></div>' . lh_ui_cap() . '</div>';

		/* Closet Ads System scenes. */
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
			/* Real closet creatives (videos and images from Luis's library); two angles win. */
			$media = array(
				array( 'v', 'ad-closet-acabados', 'Video', 38, 0 ),
				array( 'i', 'ad-closet-2', $en ? 'Image' : 'Imagen', 44, 0 ),
				array( 'v', 'ad-closet-pareja', 'Video', 86, 1 ),
				array( 'i', 'ad-closet-walkin', $en ? 'Carousel' : 'Carrusel', 31, 0 ),
				array( 'v', 'ad-closet-cajon', 'Video', 78, 1 ),
				array( 'i', 'ad-closet-4', $en ? 'Image' : 'Imagen', 27, 0 ),
			);
			$win = $en ? 'Winner' : 'Ganador';
			$ads = '';
			foreach ( $media as $k => $m ) {
				$poster = esc_url( get_theme_file_uri( 'assets/img/' . $m[1] . '.webp' ) );
				$fig    = 'v' === $m[0]
					? '<video muted loop playsinline preload="none" poster="' . $poster . '" src="' . esc_url( get_theme_file_uri( 'assets/video/' . $m[1] . '.mp4' ) ) . '"></video>'
					: '<img src="' . $poster . '" alt="" loading="lazy" decoding="async">';
				$ads .= sprintf( '<div class="lh-ad%s" style="--d:%.2fs"><div class="lh-ad-img">%s%s</div><span>%s · %02d</span><i style="--w:%d%%"></i></div>',
					$m[4] ? ' is-win' : '', $k * 0.18, $fig, $m[4] ? '<b class="lh-ad-win">' . $win . '</b>' : '', esc_html( $m[2] ), $k + 1, $m[3] );
			}
			return '<div class="lh-scene lh-scene-ads" data-scene="2"><div class="lh-ads">' . $ads . '</div><span class="lh-ad-sum">' . ( $en ? '2 winning angles' : '2 ángulos ganadores' ) . '</span></div>';

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
			return '<div class="lh-ui lh-ui-stage" aria-hidden="true" data-scene="1"><div class="lh-ui-win">' . lh_ui_bar( 'Closet Ads System', $en ? 'Step 1 of 3' : 'Paso 1 de 3' )
				. '<div class="lh-scenes">' . lh_ui( 'scene-1' ) . lh_ui( 'scene-2' ) . lh_ui( 'scene-3' ) . '</div></div>' . lh_ui_cap() . '</div>';

		/* Small loops for the deliverable cards. */
		case 'mini-ads':
			$t = '';
			foreach ( array( 'ad-closet-1', 'ad-closet-pareja', 'ad-closet-3', 'ad-closet-lujo', 'ad-closet-acabados', 'ad-closet-2' ) as $i => $f ) {
				$t .= sprintf( '<i style="--d:%.1fs"><img src="%s" alt="" loading="lazy" decoding="async"></i>', $i * 0.5, esc_url( get_theme_file_uri( 'assets/img/' . $f . '.webp' ) ) );
			}
			return '<div class="lh-mini lh-mini-ads" aria-hidden="true">' . $t . '</div>';

		case 'mini-check':
			$c = $en ? array( 'Homeowner in your area', 'Budget range', 'Project type', 'Timeline' ) : array( 'Dueño en tu zona', 'Rango de presupuesto', 'Tipo de proyecto', 'Plazo' );
			return '<ul class="lh-mini lh-mini-check" aria-hidden="true">' . implode( '', array_map( fn( $x, $k ) => sprintf( '<li style="--d:%.1fs"><i></i>%s</li>', $k * 0.6, esc_html( $x ) ), $c, array_keys( $c ) ) ) . '</ul>';

		case 'mini-mail':
			return '<div class="lh-mini lh-mini-mail" aria-hidden="true"><div class="lh-mm-card"><b>' . ( $en ? 'New pre-qualified homeowner' : 'Nuevo homeowner prefiltrado' ) . '</b><span>Megan G. · Tampa, FL · $8k–12k</span></div><span class="lh-mm-badge">1</span><ul class="lh-mm-ch"><li class="on">Email</li><li>SMS</li><li>WhatsApp</li></ul></div>';

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

		/* Hero: the whole system live, from the ad to the install. Luis's part ends when the homeowner reaches the owner. */
		case 'flow':
			$ic = array(
				'ad'    => '<path d="M4 10v4h3l6 4V6L7 10H4z"/><path d="M17 9a4 4 0 0 1 0 6"/>',
				'form'  => '<rect x="5" y="3" width="14" height="18" rx="2"/><path d="M9 8h6M9 12h6M9 16h3"/>',
				'check' => '<circle cx="10" cy="8" r="4"/><path d="M3 21a7 7 0 0 1 14 0"/><path d="m16 11 2 2 4-4"/>',
				'mail'  => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
				'phone' => '<path d="M5 4h4l2 5-3 2a11 11 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/>',
				'home'  => '<path d="M3 11 12 4l9 7"/><path d="M5 10v10h14V10"/><path d="M10 20v-6h4v6"/>',
				'doc'   => '<path d="M6 3h9l4 4v14H6z"/><path d="M15 3v4h4M9 13h6M9 17h6"/>',
				'deal'  => '<path d="M12 3v18M16 7H10a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6H8"/>',
				'box'   => '<path d="M3 7l9-4 9 4v10l-9 4-9-4z"/><path d="M3 7l9 4 9-4M12 11v10"/>',
			);
			$steps = $en
				? array( array( 'ad', 'Ads', 'Only in your area' ), array( 'form', 'Pre-qualifying form', 'Budget, project, timeline' ), array( 'check', 'Pre-qualified homeowner', 'Owner in your area' ), array( 'mail', 'Instant alert', 'Straight to your email' ),
					array( 'phone', 'You call', 'You know what they want' ), array( 'home', 'In-home estimate', 'On your calendar' ), array( 'doc', 'Proposal', 'With follow-up' ), array( 'deal', 'Closed sale', '' ), array( 'box', 'Install', '' ) )
				: array( array( 'ad', 'Anuncios', 'Solo en tu zona' ), array( 'form', 'Formulario de prefiltro', 'Presupuesto, proyecto, plazo' ), array( 'check', 'Homeowner prefiltrado', 'Dueño en tu zona' ), array( 'mail', 'Aviso inmediato', 'Directo a tu correo' ),
					array( 'phone', 'Lo llamas', 'Ya sabes qué quiere' ), array( 'home', 'Estimate en casa', 'En tu calendario' ), array( 'doc', 'Propuesta', 'Con seguimiento' ), array( 'deal', 'Venta cerrada', '' ), array( 'box', 'Instalación', '' ) );
			$n     = count( $steps );
			$nodes = '';
			foreach ( $steps as $k => $st ) {
				$nodes .= sprintf( '<li class="%s" style="--i:%d"><span class="lh-fl-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">%s</svg></span><b>%s</b>%s</li>',
					$k < 4 ? 'us' : 'you', $k, $ic[ $st[0] ], esc_html( $st[1] ), $st[2] ? '<small>' . esc_html( $st[2] ) . '</small>' : '' );
			}
			return '<div class="lh-ui lh-ui-flow" aria-hidden="true" style="--n:' . $n . '"><div class="lh-ui-glow"></div><div class="lh-ui-win">' . lh_ui_bar( 'Closet Ads System', $en ? 'Live' : 'En vivo' )
				. '<div class="lh-fl-body"><div class="lh-fl-groups"><span class="g-us">' . ( $en ? 'The system brings them' : 'El sistema te los trae' ) . '</span><span class="g-you">' . ( $en ? 'You close the sale' : 'Tú cierras la venta' ) . '</span></div>'
				. '<div class="lh-fl-rail"><div class="lh-fl-track"><i class="lh-fl-fill"></i><i class="lh-fl-dot"></i></div><ol class="lh-fl-nodes">' . $nodes . '</ol></div></div></div>' . lh_ui_cap() . '</div>';

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
