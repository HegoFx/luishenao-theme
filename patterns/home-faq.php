<?php
/**
 * Title: Preguntas frecuentes
 * Slug: luishenao/faq
 * Categories: lh-home, lh-secciones
 * Description: Título a la izquierda y preguntas desplegables (bloque Detalles).
 */

$lh_o   = lh_offer();
$lh_c   = $lh_o['confirm']['es'];
$lh_cf  = fn( $v, $label ) => $v ? ' ' . $v : ' [CONFIRM: ' . $label . ']';
$lh_faq = array(
	array( '¿Quién paga los anuncios?', 'Tú, directo a Meta desde tu propia cuenta de anuncios. El mínimo es ' . lh_usd( $lh_o['min_spend'] ) . ' al mes. Mi tarifa mensual va aparte.' ),
	array( '¿Qué es un homeowner prefiltrado?', 'Es dueño de la vivienda, está dentro de tu zona de servicio, dejó teléfono y correo válidos y respondió su rango de presupuesto, el tipo de proyecto (walk-in, reach-in, garage, pantry u otro) y cuándo quiere hacerlo. Yo te entrego el homeowner; agendar el estimate es trabajo tuyo. Detalles en Condiciones de las garantías.' ),
	array( '¿Qué pasa si no funciona?', 'Te cubren dos garantías. Si en 21 días tus anuncios no están activos y aprobados, te devuelvo el primer mes. Si en los 60 días desde que salen los anuncios no llegan 20 homeowners prefiltrados, el tercer mes es gratis.' ),
	array( '¿Cuánto dura el compromiso?', 'Mínimo ' . $lh_o['min_months'] . ' meses. Después sigues mes a mes y cancelas avisando con 30 días.' ),
	array( '¿De quién es el CRM?', 'Tuyo. Va incluido el primer año desde que empieza el servicio, con todas sus automatizaciones. Si te vas antes, lo conservas hasta completar ese año, y puedes exportar tus contactos cuando quieras. Después del primer año, si quieres seguir con él, lo coordinamos y se cotiza aparte.' . $lh_cf( $lh_c['crm_renewal'], 'monto de renovación' ) ),
	array( '¿Cuándo veo resultados?', 'Las primeras semanas el sistema está aprendiendo: se prueban ángulos nuevos y se apaga lo que no funciona. A los 60 días tienes un punto de control claro con la garantía de homeowners.' ),
	array( '¿Garantizas ventas?', 'No, y desconfía de quien lo haga. Me comprometo con homeowners prefiltrados y con las garantías de arriba. Cerrar el trabajo sigue siendo tu oficio.' ),
	array( '¿Trabajas con franquicias?', 'No. Solo con negocios independientes de custom closets.' ),
	array( '¿Trabajas solo?', 'Sí. Hablas directo conmigo, y trabajo con pocos negocios a la vez.' ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"faq","className":"lh-sec lh-faq"} -->
<section id="faq" class="wp-block-group alignfull lh-sec lh-faq"><!-- wp:group {"className":"lh-wrap lh-faq-grid"} -->
<div class="wp-block-group lh-wrap lh-faq-grid"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Preguntas frecuentes</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Lo que me preguntan <em>los dueños.</em></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-faq-list"} -->
<div class="wp-block-group lh-faq-list"><?php foreach ( $lh_faq as $q ) : ?><!-- wp:details {"className":"lh-r"} -->
<details class="wp-block-details lh-r"><summary><?php echo esc_html( $q[0] ); ?></summary><!-- wp:paragraph -->
<p><?php echo esc_html( $q[1] ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --><?php endforeach; ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
