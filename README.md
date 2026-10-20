# Tema Luis Henao

Tema de bloques para luishenaoai.online. El diseño y los efectos viven aquí; el contenido vive en páginas de WordPress.

## Qué se edita dónde

| Quiero… | Dónde |
|---|---|
| Cambiar textos o imágenes de una página | WordPress → Páginas → editar |
| Escribir un artículo | WordPress → Entradas → Añadir |
| Crear una página con secciones del Home | WordPress → Páginas → Añadir → insertar patterns "Luis Henao · …" |
| Cambiar diseño, efectos o crear una sección nueva | Este repo, con Claude → commit → push (se publica solo) |

Regla de oro: no edites plantillas en el Editor del sitio. Si lo haces, ese cambio queda en la base de datos y tapa lo que venga del código.

## Clases de animación

Agrégalas a cualquier bloque en Avanzado → Clase CSS adicional:

- `lh-r`: aparece subiendo
- `lh-r-mask`: título que se revela
- `lh-r-card`: tarjeta que se levanta
- `lh-r-img`: imagen que se abre
- `lh-parallax`: imagen con parallax

## Deploy

Cada push a `main` sube el tema a Hostinger por SSH (`.github/workflows/deploy.yml`). Solo se sincroniza esta carpeta.
