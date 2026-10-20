<?php
/**
 * Title: Hero de página interna
 * Slug: luishenao/page-hero
 * Categories: lh-secciones
 * Description: Etiqueta, título gigante con revelado, intro y foto con parallax. Para páginas que no usan el hero automático.
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"lh-sec lh-page-hero"} -->
<section class="wp-block-group alignfull lh-sec lh-page-hero"><!-- wp:group {"className":"lh-wrap"} -->
<div class="wp-block-group lh-wrap"><!-- wp:paragraph {"className":"is-style-label lh-r"} -->
<p class="is-style-label lh-r">Sobre mí</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"lh-giant-title lh-r-mask"} -->
<h1 class="wp-block-heading lh-giant-title lh-r-mask">Hola, soy <em>Luis.</em></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lh-intro lh-r"} -->
<p class="lh-intro lh-r">Escribe aquí una intro de una o dos frases que diga de qué va esta página.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"sizeSlug":"full","className":"lh-ph lh-r-img lh-parallax"} -->
<figure class="wp-block-image size-full lh-ph lh-r-img lh-parallax"><img src="<?php echo lh_img( 'bts-grabando.webp' ); ?>" alt="Luis Henao grabando contenido"/><figcaption class="wp-element-caption">Placeholder IA → foto real panorámica</figcaption></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
