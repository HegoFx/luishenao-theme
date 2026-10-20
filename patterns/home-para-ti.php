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
	'Eres dueño de un negocio independiente de custom closets',
	'Llevas de 1 a 4 años operando con tracción real',
	'Tienes 10+ reviews en Google con rating de 4.4+',
	'Vendes de 3 a 8 closets al mes, con ticket de $5k a $8k',
	'Puedes invertir mínimo $900/mes en anuncios',
	'Estás en Florida, Texas o Arizona',
) ); ?></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lh-card lh-r-card"} -->
<div class="wp-block-group lh-card lh-r-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">No es para ti si</h3>
<!-- /wp:heading -->

<?php echo lh_list( array(
	'Eres una franquicia (California Closets, Closet Factory y similares)',
	'Ahora mismo no tienes presupuesto para anuncios',
	'Estás arrancando y todavía no tienes tracción',
	'Quieres que alguien te garantice un número de ventas',
), 'lh-checks is-no' ); ?></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
