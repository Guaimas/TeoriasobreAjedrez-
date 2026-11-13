<?php
/**
 * datos/piezas.php
 * -----------------------------------------------------------------
 * Las 6 piezas del ajedrez, para el carrusel de paginas/fundamentos.php.
 *
 * Campos:
 *   nombre, valor     Nombre y valor aproximado
 *   letra             Letra en notación FEN (P, N, B, R, Q, K)
 *   posicion          Diagrama (FEN, solo piezas) que se muestra
 *   desde             Casilla de la pieza que se explica. Las casillas
 *                     a las que puede moverse las calcula PHP con
 *                     casillas_alcanzables() (includes/componentes.php),
 *                     salvo el peón, que tiene reglas propias:
 *   marcas, capturas  (solo peón) casillas marcadas a mano
 *   movimiento, captura, consejo, dato   Textos de la ficha. Pueden incluir
 *                     enlaces internos (<a>): son textos escritos por el
 *                     propio sitio, no datos del usuario, por eso se
 *                     imprimen como HTML.
 * -----------------------------------------------------------------
 */

return [
    'peon' => [
        'nombre'     => 'Peón',
        'valor'      => '1 punto',
        'letra'      => 'P',
        'posicion'   => '8/8/8/8/8/3p1p2/4P3/8',
        'desde'      => 'e2',
        'marcas'     => ['e3', 'e4'],
        'capturas'   => ['d3', 'f3'],
        'movimiento' => 'Avanza una casilla hacia adelante. Desde su casilla inicial puede avanzar dos, si ninguna pieza le bloquea el paso. Es la única pieza que nunca retrocede.',
        'captura'    => 'A diferencia de cómo se mueve, captura una casilla en diagonal hacia adelante. Tiene además dos reglas especiales: la <a href="#captura-al-paso">captura al paso</a> y la <a href="#promocion">promoción</a> al llegar a la última fila.',
        'consejo'    => 'Piensa bien antes de avanzar un peón: como no puede volver atrás, las casillas que deja a sus espaldas ya no las podrá defender.',
        'dato'       => 'Cada bando empieza con 8 peones. Philidor, uno de los grandes jugadores del siglo XVIII, decía que "los peones son el alma del ajedrez".',
    ],
    'caballo' => [
        'nombre'     => 'Caballo',
        'valor'      => '3 puntos',
        'letra'      => 'N',
        'posicion'   => '8/8/8/8/3N4/8/8/8',
        'desde'      => 'd4',
        'movimiento' => 'Se mueve en forma de "L": dos casillas en una dirección (horizontal o vertical) y una más en perpendicular.',
        'captura'    => 'Captura la pieza que está en la casilla donde cae. Es la única pieza que puede saltar por encima de las demás, propias o rivales.',
        'consejo'    => 'Llévalo hacia el centro: en d4 controla 8 casillas, pero en una esquina solo 2. Por eso se dice que un caballo en el borde rinde poco.',
        'dato'       => 'En cada salto cambia de color de casilla: si está en una casilla clara, siempre salta a una oscura, y al revés.',
    ],
    'alfil' => [
        'nombre'     => 'Alfil',
        'valor'      => '3 puntos',
        'letra'      => 'B',
        'posicion'   => '8/8/8/8/3B4/8/8/8',
        'desde'      => 'd4',
        'movimiento' => 'Se mueve en diagonal, tantas casillas como quiera, mientras no haya piezas en el camino.',
        'captura'    => 'Captura la primera pieza rival que encuentra en su diagonal. No puede saltar piezas.',
        'consejo'    => 'Busca diagonales largas y abiertas. Los dos alfiles juntos, la "pareja de alfiles", suelen ser una ventaja en posiciones abiertas.',
        'dato'       => 'Cada bando tiene un alfil de casillas claras y otro de casillas oscuras. Como solo se mueve en diagonal, nunca cambia de color.',
    ],
    'torre' => [
        'nombre'     => 'Torre',
        'valor'      => '5 puntos',
        'letra'      => 'R',
        'posicion'   => '8/8/8/8/3R4/8/8/8',
        'desde'      => 'd4',
        'movimiento' => 'Se mueve en línea recta, en horizontal o en vertical, tantas casillas como quiera, mientras no haya piezas en el camino.',
        'captura'    => 'Captura la primera pieza rival que encuentra en su fila o en su columna. También participa en el <a href="#enroque">enroque</a>.',
        'consejo'    => 'Ubícala en columnas abiertas (sin peones). Dos torres en la misma columna, o una torre en la séptima fila rival, suelen ser muy fuertes.',
        'dato'       => 'En un tablero vacío controla siempre 14 casillas, esté donde esté: 7 en su fila y 7 en su columna.',
    ],
    'dama' => [
        'nombre'     => 'Dama',
        'valor'      => '9 puntos',
        'letra'      => 'Q',
        'posicion'   => '8/8/8/8/3Q4/8/8/8',
        'desde'      => 'd4',
        'movimiento' => 'Combina los movimientos de la torre y del alfil: en línea recta y en diagonal, tantas casillas como quiera.',
        'captura'    => 'Captura en cualquiera de esas ocho direcciones la primera pieza rival que encuentra en el camino.',
        'consejo'    => 'No la saques demasiado pronto: las piezas menores rivales la atacan y te hacen perder tiempo moviéndola.',
        'dato'       => 'Desde el centro de un tablero vacío controla 27 casillas. Hasta fines del siglo XV era una pieza débil: solo se movía una casilla en diagonal.',
    ],
    'rey' => [
        'nombre'     => 'Rey',
        'valor'      => 'Sin valor numérico',
        'letra'      => 'K',
        'posicion'   => '8/8/8/8/3K4/8/8/8',
        'desde'      => 'd4',
        'movimiento' => 'Se mueve una sola casilla en cualquier dirección. Nunca puede ir a una casilla atacada por el rival, ni quedar al lado del rey contrario.',
        'captura'    => 'Puede capturar una pieza rival que esté al lado, siempre que esa pieza no esté defendida. Hace también el <a href="#enroque">enroque</a> junto con una torre.',
        'consejo'    => 'En la apertura y el medio juego, protégelo con el enroque. En el final se convierte en una pieza de ataque: <a href="finales.php">acércalo al centro</a>.',
        'dato'       => 'No tiene valor en puntos porque no puede perderse: si recibe jaque mate, termina la partida.',
    ],
];
