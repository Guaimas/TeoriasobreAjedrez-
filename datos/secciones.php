<?php
/**
 * datos/secciones.php
 * -----------------------------------------------------------------
 * Lista única de las secciones del sitio, en el orden del menú.
 *
 * A partir de esta lista se generan:
 *   - el menú lateral                     (includes/nav.php)
 *   - los enlaces "Anterior / Siguiente"   (includes/paginacion.php)
 *   - las tarjetas "¿Qué encontrarás?"     (paginas/sobre-el-sitio.php)
 *
 * Para agregar, quitar o reordenar una sección alcanza con editar
 * este array: los tres lugares se actualizan solos.
 *
 * Cada sección tiene:
 *   'titulo'      => texto del menú y del paginador
 *   'descripcion' => frase corta (tarjetas de "Sobre el sitio")
 *   'icono'       => contenido del <svg> del menú (dibujado a mano)
 *   'recorrido'   => true si forma parte del recorrido de aprendizaje
 *                    (enlaces "Anterior / Siguiente")
 *
 * La clave de cada elemento es el "slug": coincide con el nombre del
 * archivo (fundamentos -> paginas/fundamentos.php) y con la variable
 * $pagina_actual de cada página. "index" es la única que vive en la
 * raíz del sitio.
 * -----------------------------------------------------------------
 */

return [
    'index' => [
        'titulo'      => 'Inicio',
        'descripcion' => 'Página principal del sitio.',
        'icono'       => '<path d="M3 11.5 12 4l9 7.5"/><path d="M5.5 10v9a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-9"/><path d="M9.5 20v-6h5v6"/>',
        'recorrido'   => false,
    ],
    'fundamentos' => [
        'titulo'      => 'Fundamentos',
        'descripcion' => 'Tablero, piezas y reglas básicas.',
        'icono'       => '<path d="M12 6.5c-1.6-1.3-3.8-2-6.5-2v13c2.7 0 4.9.7 6.5 2 1.6-1.3 3.8-2 6.5-2v-13c-2.7 0-4.9.7-6.5 2Z"/><path d="M12 6.5v13"/>',
        'recorrido'   => true,
    ],
    'tacticas' => [
        'titulo'      => 'Tácticas',
        'descripcion' => 'Golpes que ganan material o la partida.',
        'icono'       => '<circle cx="12" cy="12" r="8.2"/><circle cx="12" cy="12" r="4.4"/><circle cx="12" cy="12" r=".9" fill="currentColor" stroke="none"/>',
        'recorrido'   => true,
    ],
    'estrategias' => [
        'titulo'      => 'Estrategias',
        'descripcion' => 'Planes y conceptos del medio juego.',
        'icono'       => '<path d="M4 9l3 3 5-6 5 6 3-3-1.6 9.5H5.6L4 9Z"/><path d="M5.6 18.5h12.8"/>',
        'recorrido'   => true,
    ],
    'aperturas' => [
        'titulo'      => 'Aperturas',
        'descripcion' => 'Principios y aperturas más conocidas.',
        'icono'       => '<circle cx="12" cy="12" r="8.5"/><path d="M14.5 9.5 13 13l-3.5 1.5L11 11l3.5-1.5Z"/>',
        'recorrido'   => true,
    ],
    'finales' => [
        'titulo'      => 'Finales',
        'descripcion' => 'La fase técnica y decisiva.',
        'icono'       => '<path d="M6 3v18"/><path d="M6 4h12l-3 4 3 4H6"/>',
        'recorrido'   => true,
    ],
    'partidas' => [
        'titulo'      => 'Partidas Históricas',
        'descripcion' => 'Cinco partidas que enseñan.',
        'icono'       => '<path d="M3.5 8a8.5 8.5 0 1 1-1 4"/><path d="M3 4v4h4"/><path d="M12 8v4.5l3 2"/>',
        'recorrido'   => true,
    ],
    'ejercicios' => [
        'titulo'      => 'Ejercicios',
        'descripcion' => 'Pon a prueba lo aprendido.',
        'icono'       => '<path d="M4 9h3a2 2 0 1 1 0 4H4v3a2 2 0 0 0 2 2h3v-3a2 2 0 1 1 4 0v3h3a2 2 0 0 0 2-2v-3a2 2 0 1 1 0-4V6a2 2 0 0 0-2-2h-3a2 2 0 1 1-4 0H6a2 2 0 0 0-2 2v3Z"/>',
        'recorrido'   => true,
    ],
    'glosario' => [
        'titulo'      => 'Glosario',
        'descripcion' => 'Términos con buscador incluido.',
        'icono'       => '<path d="M4 6h16M4 12h10M4 18h7"/>',
        'recorrido'   => true,
    ],
    'recursos' => [
        'titulo'      => 'Recursos',
        'descripcion' => 'Libros y plataformas recomendadas.',
        'icono'       => '<path d="M3.5 7a1.5 1.5 0 0 1 1.5-1.5h4l2 2.2H19A1.5 1.5 0 0 1 20.5 9v8A1.5 1.5 0 0 1 19 18.5H5A1.5 1.5 0 0 1 3.5 17V7Z"/>',
        'recorrido'   => true,
    ],
    'sobre-el-sitio' => [
        'titulo'      => 'Sobre el Sitio',
        'descripcion' => 'Qué es este sitio y cómo está hecho.',
        'icono'       => '<circle cx="12" cy="12" r="8.5"/><path d="M12 11v5.2"/><circle cx="12" cy="8" r=".9" fill="currentColor" stroke="none"/>',
        'recorrido'   => false,
    ],
    'contacto' => [
        'titulo'      => 'Contacto',
        'descripcion' => 'Envía consultas o sugerencias.',
        'icono'       => '<rect x="3.5" y="5.5" width="17" height="13" rx="1.5"/><path d="m4 7 8 6 8-6"/>',
        'recorrido'   => false,
    ],
];
