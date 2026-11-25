<?php
/**
 * Title: Landing · Precio y cupos
 * Slug: luishenao/landing-precio
 * Categories: lh-home, lh-secciones
 * Description: Escalera de precios y cupos reales leídos de inc/offer.php (spots_taken). Nunca contador falso.
 */
$lh_o = lh_offer();
$lh_p = lh_pricing();
$lh_tier = fn( $t ) => null === $t['to'] ? sprintf( 'Clientes %d en adelante', $t['from'] ) : sprintf( 'Clientes %d a %d', $t['from'], $t['to'] );
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"precio","className":"lh-sec lh-pilot lh-pricing"} -->
<section id="precio" class="wp-block-group alignfull lh-sec lh-pilot lh-pricing"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Precio y cupos</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Precio de fundador, <em>cupos reales.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-pilot-grid"} -->
<div class="wp-block-group lh-pilot-grid"><!-- wp:group {"className":"lh-card lh-price lh-r-card"} -->
<div class="wp-block-group lh-card lh-price lh-r-card"><!-- wp:paragraph {"className":"is-style-label"} -->
<p class="is-style-label">Precio vigente · por mes</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lh-amt"} -->
<p class="lh-amt"><?php echo esc_html( lh_usd( $lh_p['tier']['price'] ) ); ?></p>
<!-- /wp:paragraph -->

<?php if ( null !== $lh_p['left'] ) : ?><!-- wp:html -->
<div class="lh-spots"><p><strong><?php printf( 'Quedan %d de %d cupos a este precio', (int) $lh_p['left'], (int) $lh_p['size'] ); ?></strong></p><div class="lh-spots-bar" aria-hidden="true"><?php for ( $i = 0; $i < $lh_p['size']; $i++ ) : ?><span<?php echo $i < $lh_p['size'] - $lh_p['left'] ? ' class="is-taken"' : ''; ?>></span><?php endfor; ?></div></div>
<!-- /wp:html --><?php endif; ?>

<?php if ( $lh_p['next_tier'] ) : ?><!-- wp:paragraph {"className":"lh-anchor"} -->
<p class="lh-anchor"><?php printf( 'Después: %s/mes', esc_html( lh_usd( $lh_p['next_tier']['price'] ) ) ); ?></p>
<!-- /wp:paragraph --><?php endif; ?>

<?php echo lh_list( array(
	sprintf( 'Mínimo %d meses. Después, mes a mes y cancelas avisando con 30 días', $lh_o['min_months'] ),
	sprintf( 'Pauta mínima de %s al mes, pagada directo a Meta desde tu propia cuenta', lh_usd( $lh_o['min_spend'] ) ),
	'Dar accesos y material a tiempo',
), 'lh-dash' ); ?>

<!-- wp:buttons {"className":"lh-full"} -->
<div class="wp-block-buttons lh-full"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#agendar">Agenda una llamada →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-card lh-r-card"} -->
<div class="wp-block-group lh-card lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">La escalera</h3>
<!-- /wp:heading -->

<!-- wp:html -->
<ol class="lh-ladder"><?php foreach ( $lh_o['tiers'] as $i => $t ) : ?><li class="<?php echo $i === $lh_p['index'] ? 'is-now' : ( $i < $lh_p['index'] ? 'is-full' : '' ); ?>"><span><?php echo esc_html( $lh_tier( $t ) ); ?></span><span><?php echo esc_html( lh_usd( $t['price'] ) ); ?>/mes<?php echo $i === $lh_p['index'] ? ' <em>Ahora</em>' : ( $i < $lh_p['index'] ? ' <em>Lleno</em>' : '' ); ?></span></li><?php endforeach; ?></ol>
<!-- /wp:html -->

<!-- wp:paragraph {"className":"lh-tip"} -->
<p class="lh-tip">Conservas tu precio de por vida mientras tu suscripción siga activa y sin interrupciones. El sistema va a seguir mejorando y se le irán sumando funciones: todas las actualizaciones están incluidas en tu precio de fundador. Si cancelas y vuelves, pagas el precio vigente en ese momento.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
