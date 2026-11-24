<?php
/**
 * Title: CTA final con calendario
 * Slug: luishenao/cta-final
 * Categories: lh-home, lh-secciones
 * Description: Bloque oscuro con el calendario de GHL embebido: la única acción de conversión (llamada de 20 minutos). URL en inc/offer.php.
 */
$lh_o = lh_offer();
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"agendar","className":"lh-sec lh-dark lh-final"} -->
<section id="agendar" class="wp-block-group alignfull lh-sec lh-dark lh-final"><!-- wp:group {"className":"lh-wrap lh-final-grid"} -->
<div class="wp-block-group lh-wrap lh-final-grid"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Agenda una llamada de 20 minutos</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Veamos si tu negocio <em>encaja.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-r"} -->
<p class="lh-r">20 minutos conmigo. Si no encaja, te lo digo. Al reservar te pido estos datos para llegar preparado:</p>
<!-- /wp:paragraph -->

<?php echo lh_list( array( 'Nombre, correo y teléfono', 'Nombre del negocio y ciudad', 'Cuánto inviertes hoy en anuncios' ), 'lh-dash lh-r' ); ?></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-form lh-cal lh-r-card"} -->
<div class="wp-block-group lh-form lh-cal lh-r-card"><!-- wp:html -->
<?php if ( $lh_o['calendar'] ) : ?><iframe class="lh-cal-frame" src="<?php echo esc_url( $lh_o['calendar'] ); ?>" title="Agenda una llamada de 20 minutos" loading="lazy" scrolling="yes"></iframe><?php else : ?><p class="lh-ph-note">[CONFIRM] Aquí va el calendario de GoHighLevel (URL en inc/offer.php)</p><div class="lh-mock-form" aria-hidden="true"><span class="lh-mock-btn">Agenda una llamada de 20 minutos</span></div><?php endif; ?>
<p class="lh-consent">Al agendar aceptas que te contacte por correo o teléfono sobre tu llamada. <a href="/politica-privacidad/">Política de privacidad</a></p>
<!-- /wp:html --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
