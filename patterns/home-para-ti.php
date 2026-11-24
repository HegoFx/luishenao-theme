<?php
/**
 * Title: Home · ¿Es para ti?
 * Slug: luishenao/home-para-ti
 * Categories: lh-home, lh-secciones
 * Description: Dos columnas: para quién es y para quién no.
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"lh-sec lh-fit"} -->
<section class="wp-block-group alignfull lh-sec lh-fit"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">¿Es para ti?</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"lh-title lh-r-mask"} -->
<h2 class="wp-block-heading lh-title lh-r-mask">Ahorrémonos tiempo <em>los dos.</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lh-two"} -->
<div class="wp-block-group lh-two"><!-- wp:group {"className":"lh-card lh-r-card"} -->
<div class="wp-block-group lh-card lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Es para ti si</h3>
<!-- /wp:heading -->

<?php echo lh_list( array(
	'Tienes un negocio independiente de custom closets en USA',
	'Tienes proyectos terminados que te enorgullece mostrar',
	'Llevas de 1 a 4 años operando y tienes reseñas reales en Google',
	'Puedes invertir al menos $1,200 al mes en anuncios',
	'Quieres un sistema que se mide, no solo "poner ads"',
) ); ?></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-card lh-r-card"} -->
<div class="wp-block-group lh-card lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">No es para ti si</h3>
<!-- /wp:heading -->

<?php echo lh_list( array(
	'Eres una franquicia nacional',
	'No tienes presupuesto para anuncios',
	'Todavía no tienes trabajos terminados',
	'Buscas ventas garantizadas',
), 'lh-checks is-no' ); ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
