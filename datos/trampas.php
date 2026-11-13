<?php
/**
 * datos/trampas.php
 * -----------------------------------------------------------------
 * Trampas de apertura clásicas. Se muestran en paginas/aperturas.php
 * (sección "Trampas de apertura") con tarjeta_trampa() de
 * includes/componentes.php.
 *
 * Campos:
 *   nombre       Nombre de la trampa
 *   apertura     Clave de la apertura en datos/aperturas.php (para
 *                enlazar a su ficha) o null si no está en el catálogo
 *   origen       Texto que indica en qué apertura aparece
 *   jugadas      Secuencia completa, en notación algebraica en español
 *   explicacion  Qué pasa y por qué funciona
 *   leccion      Qué enseña / cómo evitarla
 * -----------------------------------------------------------------
 */

return [
    [
        'nombre'      => 'Mate del Loco',
        'apertura'    => null,
        'origen'      => 'Cualquier apertura en la que las blancas mueven f3 y g4',
        'jugadas'     => '1.f3 e5 2.g4?? Dh4#',
        'explicacion' => 'El mate más rápido posible: en la segunda jugada. Las blancas abrieron por completo la diagonal e1-h4 y la dama negra da jaque mate al rey, que no tiene casillas ni piezas para defenderse.',
        'leccion'     => 'Los peones de f y g protegen al rey. Moverlos al comienzo de la partida, sin motivo, abre caminos hacia él.',
    ],
    [
        'nombre'      => 'Mate del Pastor',
        'apertura'    => null,
        'origen'      => 'Aperturas abiertas (1.e4 e5)',
        'jugadas'     => '1.e4 e5 2.Ac4 Cc6 3.Dh5 Cf6?? 4.Dxf7#',
        'explicacion' => 'La dama y el alfil atacan juntos f7, la casilla que solo defiende el rey. Las negras atacaron a la dama con el caballo, pero no defendieron f7.',
        'leccion'     => 'Es el error más común entre principiantes. Se evita con 3...g6 o 3...De7, que defienden f7; después de 3...g6 4.Df3 Cf6, las negras quedan bien desarrolladas y la dama blanca salió demasiado pronto.',
    ],
    [
        'nombre'      => 'Mate de Légal',
        'apertura'    => null,
        'origen'      => 'Defensa Philidor (1.e4 e5 2.Cf3 d6)',
        'jugadas'     => '1.e4 e5 2.Cf3 d6 3.Ac4 Ag4 4.Cc3 g6? 5.Cxe5! Axd1?? 6.Axf7+ Re7 7.Cd5#',
        'explicacion' => 'Las blancas "entregan" la dama: el caballo de f3 parecía clavado, pero se mueve igual. Si las negras se comen la dama, el alfil y los dos caballos dan mate al rey en el centro. Lleva el nombre de Kermur de Légal, maestro francés del siglo XVIII.',
        'leccion'     => 'Una clavada contra la dama no es absoluta: la pieza clavada puede moverse si lo que gana es más valioso. Antes de capturar material, revisa qué amenaza el rival.',
    ],
    [
        'nombre'      => 'Trampa de Blackburne-Shilling',
        'apertura'    => 'italiana',
        'origen'      => 'Apertura Italiana',
        'jugadas'     => '1.e4 e5 2.Cf3 Cc6 3.Ac4 Cd4 4.Cxe5? Dg5! 5.Cxf7 Dxg2 6.Tf1 Dxe4+ 7.Ae2 Cf3#',
        'explicacion' => 'Las negras dejan el peón de e5 sin defensa a propósito. Si las blancas lo capturan, la dama negra ataca el caballo y el peón de g2 a la vez, y el ataque termina en mate.',
        'leccion'     => 'Un peón "regalado" puede ser un anzuelo. Lo correcto es responder 4.O-O o 4.c3 en lugar de capturar.',
    ],
    [
        'nombre'      => 'Trampa de la Petrov',
        'apertura'    => 'petrov',
        'origen'      => 'Defensa Petrov',
        'jugadas'     => '1.e4 e5 2.Cf3 Cf6 3.Cxe5 Cxe4? 4.De2! Cf6?? 5.Cc6+',
        'explicacion' => 'El caballo de c6 da jaque descubierto: la dama de e2 ataca al rey por la columna e y, al mismo tiempo, el caballo ataca a la dama negra de d8. Las negras pierden la dama.',
        'leccion'     => 'Copiar las jugadas del rival no siempre funciona. En la Petrov hay que jugar primero 3...d6 y recién después recuperar el peón.',
    ],
    [
        'nombre'      => 'Mate en la Caro-Kann',
        'apertura'    => 'caro-kann',
        'origen'      => 'Defensa Caro-Kann',
        'jugadas'     => '1.e4 c6 2.d4 d5 3.Cc3 dxe4 4.Cxe4 Cd7 5.De2 Cgf6?? 6.Cd6#',
        'explicacion' => 'Es un "mate de la coz": un caballo da mate a un rey rodeado de sus propias piezas. El peón de e7 no puede capturar al caballo porque está clavado por la dama blanca de e2.',
        'leccion'     => 'Antes de mover, revisa los jaques del rival. Una pieza clavada no defiende las casillas que parece defender.',
    ],
    [
        'nombre'      => 'Trampa del Elefante',
        'apertura'    => 'gambito-dama',
        'origen'      => 'Gambito de Dama Rehusado',
        'jugadas'     => '1.d4 d5 2.c4 e6 3.Cc3 Cf6 4.Ag5 Cbd7 5.cxd5 exd5 6.Cxd5?? Cxd5! 7.Axd8 Ab4+ 8.Dd2 Axd2+ 9.Rxd2 Rxd8',
        'explicacion' => 'Parece que las blancas ganan un peón porque el caballo de f6 está clavado. Pero las negras entregan la dama, recuperan la dama blanca con un jaque y terminan con una pieza de más.',
        'leccion'     => 'Antes de ganar material, mira las respuestas con jaque del rival: un jaque intermedio puede cambiarlo todo.',
    ],
    [
        'nombre'      => 'Trampa del Gambito From',
        'apertura'    => 'bird',
        'origen'      => 'Apertura Bird',
        'jugadas'     => '1.f4 e5 2.fxe5 d6 3.exd6 Axd6 4.Cc3?? Dh4+ 5.g3 Dxg3+ 6.hxg3 Axg3#',
        'explicacion' => 'Las negras entregan un peón para abrir líneas hacia el rey blanco, que perdió el peón de f. Si las blancas no controlan la casilla h4, la dama y el alfil dan mate.',
        'leccion'     => 'Cuando un rey queda expuesto en la diagonal e1-h4, hay que cerrarla o controlarla. Lo correcto es 4.Cf3.',
    ],
];
