<?php
/**
 * Title: Home · Lo que recibes y bonos
 * Slug: luishenao/home-piloto
 * Categories: lh-home, lh-secciones
 * Description: Los 7 entregables de la oferta v6, los bonos y lo que no incluye. El precio vive en landing-precio.
 */
$lh_o     = lh_offer();
$lh_items = array(
	array( 'Closet Ads Lab', 'Anuncios solo para homeowners de tu zona, 6 anuncios nuevos al mes, cada dólar medido hasta el estimate agendado, ajustes cada 7 a 10 días.' ),
	array( 'Homeowners prefiltrados', 'Dueños de vivienda en tu zona, con teléfono y correo válidos, que ya dijeron su rango de presupuesto, el tipo de proyecto y cuándo lo quieren hacer.' ),
	array( 'Aviso inmediato a tu correo', 'Te llega un correo cada vez que entra un homeowner o se agenda un estimate.' ),
	array( 'Tablero de seguimiento', 'Ves cada homeowner según la etapa de tu proceso de venta, en un solo lugar.' ),
	array( 'Agenda automática', 'Los homeowners pueden agendar directo en tu calendario y reciben recordatorios por email antes de la visita.' ),
	array( 'Seguimiento a presupuestos enviados', 'El tablero te avisa cuáles presupuestos llevan días sin respuesta, para que ninguno se quede quieto.' ),
	array( 'Reporte mensual', 'Cuánto se invirtió, cuántos homeowners entraron, cuántos agendaron. Números claros, sin relleno.' ),
);
$lh_bonus = array(
	array( 'Landing de una página para tu negocio', 'hecha para convertir visitas de los anuncios en estimates agendados. Un sitio web completo se cotiza aparte, con precio especial de fundador' ),
	array( 'Optimización de tu perfil de Google Maps', 'una sola vez' ),
	array( 'Tu CRM incluido el primer año', 'valor de referencia ' . lh_usd( $lh_o['crm_value'] ) . ' al año, con todas sus automatizaciones. Es tuyo (ver garantía 3)' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"oferta","className":"lh-sec lh-pilot"} -->
<section id="oferta" class="wp-block-group alignfull lh-sec lh-pilot"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Lo que recibes</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Todo lo que recibes <em>cada mes.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-gains-grid lh-get"} -->
<div class="wp-block-group lh-gains-grid lh-get"><?php foreach ( $lh_items as $i => $g ) : ?><!-- wp:group {"className":"lh-card lh-gain lh-r-card"} -->
<div class="wp-block-group lh-card lh-gain lh-r-card"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label"><?php printf( '%02d', $i + 1 ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $g[0] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $g[1] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-pilot-grid"} -->
<div class="wp-block-group lh-pilot-grid"><!-- wp:group {"className":"lh-card lh-r-card lh-bonus"} -->
<div class="wp-block-group lh-card lh-r-card lh-bonus"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label">Bonos</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Incluidos sin costo extra</h3>
<!-- /wp:heading -->

<?php echo lh_list( array_map( fn( $b ) => $b[0] . ': ' . $b[1], $lh_bonus ) ); ?>

<!-- wp:paragraph {"className":"lh-tip"} -->
<p class="lh-tip">El dominio y el hosting los pagas tú.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-card lh-r-card"} -->
<div class="wp-block-group lh-card lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Qué no incluye</h3>
<!-- /wp:heading -->

<?php echo lh_list( array( 'SEO ni blog', 'Google Ads', 'Contenido orgánico en redes', 'Mensajes de texto automáticos', 'Agentes de IA conversacionales', 'Gestión de reseñas' ), 'lh-checks is-no' ); ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
