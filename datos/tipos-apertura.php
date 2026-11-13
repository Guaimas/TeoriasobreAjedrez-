<?php
/**
 * datos/tipos-apertura.php
 * -----------------------------------------------------------------
 * Tipos (familias) de aperturas. La clave es el valor que usa el
 * filtro GET de paginas/aperturas.php (?tipo=semiabierta) y el campo
 * 'tipo' de cada apertura en datos/aperturas.php.
 *
 * El filtro solo acepta estas claves (lista blanca): cualquier otro
 * valor en la URL se rechaza.
 * -----------------------------------------------------------------
 */

return [
    'abierta' => [
        'nombre'      => 'Abiertas',
        'singular'    => 'Abierta',
        'jugada'      => '1.e4 e5',
        'descripcion' => 'Ambos bandos avanzan su peón de rey dos casillas. Suelen llevar a posiciones abiertas, con juego rápido de piezas y ataques directos. Son las más recomendables para empezar.',
    ],
    'semiabierta' => [
        'nombre'      => 'Semiabiertas',
        'singular'    => 'Semiabierta',
        'jugada'      => '1.e4 y las negras responden otra cosa',
        'descripcion' => 'Las blancas juegan 1.e4, pero las negras eligen no responder 1...e5. Generan posiciones desequilibradas, donde las negras buscan contraatacar en lugar de copiar a las blancas.',
    ],
    'cerrada' => [
        'nombre'      => 'Cerradas',
        'singular'    => 'Cerrada',
        'jugada'      => '1.d4 d5',
        'descripcion' => 'Empiezan con el peón de dama. El centro suele quedar bloqueado por peones, y las partidas son más estratégicas y de maniobra que tácticas.',
    ],
    'india' => [
        'nombre'      => 'Indias y otras defensas',
        'singular'    => 'India',
        'jugada'      => '1.d4 Cf6, 1.d4 f5…',
        'descripcion' => 'Las negras responden a 1.d4 sin jugar 1...d5. Lo más común es el caballo (los sistemas "indios"), que suele ir acompañado de un alfil en fianchetto: controlan el centro con piezas antes que con peones. Aquí también se incluye la Holandesa (1...f5).',
    ],
    'flanco' => [
        'nombre'      => 'De flanco',
        'singular'    => 'De flanco',
        'jugada'      => '1.c4, 1.Cf3 u otras',
        'descripcion' => 'Las blancas no ocupan el centro de inmediato: lo controlan desde los costados del tablero y deciden su estructura más adelante.',
    ],
];
