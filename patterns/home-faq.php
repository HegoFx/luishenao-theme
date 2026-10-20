<?php
/**
 * Title: Preguntas frecuentes
 * Slug: luishenao/faq
 * Categories: lh-home, lh-secciones
 * Description: Título a la izquierda y preguntas desplegables (bloque Detalles).
 */

$lh_faq = array(
	array( '¿Quién paga los anuncios?', 'Tú, directamente en tu propia cuenta de Meta. Mínimo $900/mes. Mi tarifa de $650 es aparte. Tú mantienes el control y la propiedad de la cuenta y de los datos.' ),
	array( '¿Cómo mides si está funcionando?', 'Por la cantidad de home owners pre-filtrados que llegan a tu WhatsApp y lo que cuesta cada uno. Al final del mes recibes un reporte claro.' ),
	array( '¿Qué pasa si no funciona?', 'Si la campaña no está montada y aprobada por Meta en 21 días, te devuelvo el 100% de la tarifa. Después del primer mes, si los números no te sirven, simplemente paras.' ),
	array( '¿Puedo cancelar?', 'Sí. El piloto es un mes de prueba. No hay compromiso a largo plazo ni comisión sobre tus ventas.' ),
	array( '¿Garantizas ventas?', 'No, y desconfía de quien lo haga. Me comprometo a entregarte home owners pre-filtrados. Cerrar el trabajo sigue siendo tu oficio.' ),
	array( '¿También tengo que publicar en redes?', 'No está incluido, pero te recomiendo seguir publicando en Instagram mientras corren los anuncios. Los dos juntos funcionan mucho mejor.' ),
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
