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
        'nombre'      => 'Indias',
        'singular'    => 'India',
        'jugada'      => '1.d4 Cf6',
        'descripcion' => 'Las negras responden a 1.d4 con el caballo en lugar del peón y suelen colocar un alfil en fianchetto. Controlan el centro con piezas antes que con peones.',
    ],
    'flanco' => [
        'nombre'      => 'De flanco',
        'singular'    => 'De flanco',
        'jugada'      => '1.c4, 1.Cf3 u otras',
        'descripcion' => 'Las blancas no ocupan el centro de inmediato: lo controlan desde los costados del tablero y deciden su estructura más adelante.',
    ],
];
