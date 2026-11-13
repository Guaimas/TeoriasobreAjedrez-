<?php
/**
 * datos/ejercicios.php
 * -----------------------------------------------------------------
 * Ejercicios de la página paginas/ejercicios.php, agrupados por tema.
 * Cada ejercicio se dibuja con ejercicio() de includes/componentes.php.
 *
 * Campos de cada ejercicio:
 *   nivel        Principiante | Intermedio | Avanzado
 *   enunciado    La pregunta
 *   posicion     (opcional) posición del tablero en formato FEN, solo la
 *                parte de las piezas: filas de la 8 a la 1 separadas por
 *                "/", mayúsculas = blancas, minúsculas = negras
 *                (K rey, Q dama, R torre, B alfil, N caballo, P peón) y
 *                números = casillas vacías. Se dibuja con tablero().
 *   turno        (opcional, si hay posición) 'blancas' o 'negras'
 *   opciones     Lista de [texto, true si es correcta]
 *                (puede haber más de una correcta)
 *   explicacion  Se muestra al pedir la solución
 *
 * Cada posición se verificó a mano: jugadas legales, jaques y mates.
 * -----------------------------------------------------------------
 */

return [

    'fundamentos' => [
        'titulo'      => 'Fundamentos',
        'descripcion' => 'Reglas básicas y movimiento de las piezas.',
        'ejercicios'  => [
            [
                'nivel'       => 'Principiante',
                'enunciado'   => 'El caballo blanco está en e4. ¿A cuáles de estas casillas puede moverse?',
                'posicion'    => '8/8/8/8/4N3/8/8/8',
                'turno'       => 'blancas',
                'opciones'    => [['e6', false], ['d6', true], ['f4', false], ['c3', true]],
                'explicacion' => 'El caballo se mueve en forma de "L": dos casillas en una dirección y una en perpendicular. Desde e4 puede ir a d6, f6, c5, g5, c3, g3, d2 y f2. De las opciones, d6 y c3 son correctas.',
            ],
            [
                'nivel'       => 'Principiante',
                'enunciado'   => '¿Cuáles de estas condiciones son necesarias para poder enrocar?',
                'opciones'    => [
                    ['Que ni el rey ni esa torre se hayan movido antes', true],
                    ['Que el rey esté en jaque', false],
                    ['Que no haya piezas entre el rey y la torre', true],
                    ['Que sea la primera jugada de la partida', false],
                ],
                'explicacion' => 'Para enrocar, ni el rey ni la torre deben haberse movido, no puede haber piezas entre ambos y el rey no puede estar en jaque ni pasar por una casilla atacada. No hace falta que sea la primera jugada.',
            ],
            [
                'nivel'       => 'Principiante',
                'enunciado'   => '¿Cuántos peones vale aproximadamente una torre?',
                'opciones'    => [['1', false], ['3', false], ['5', true], ['9', false]],
                'explicacion' => 'Valores de referencia: peón 1, caballo y alfil 3, torre 5 y dama 9. El rey no tiene valor numérico porque no puede perderse.',
            ],
            [
                'nivel'       => 'Intermedio',
                'enunciado'   => 'Las negras acaban de jugar su peón de d7 a d5. Juegan las blancas: ¿qué captura pueden hacer?',
                'posicion'    => '4k3/8/8/3pP3/8/8/8/4K3',
                'turno'       => 'blancas',
                'opciones'    => [
                    ['exd6, capturando al paso', true],
                    ['exd5', false],
                    ['Ninguna: los peones no pueden capturar hacia el costado', false],
                ],
                'explicacion' => 'Como el peón negro avanzó dos casillas y quedó al lado del peón blanco, las blancas pueden capturarlo "al paso": el peón de e5 va a d6 y el de d5 sale del tablero. Solo se puede en la jugada inmediata.',
            ],
            [
                'nivel'       => 'Intermedio',
                'enunciado'   => 'Juegan las negras. ¿Cómo termina la partida?',
                'posicion'    => 'k7/8/1Q6/8/8/8/8/7K',
                'turno'       => 'negras',
                'opciones'    => [
                    ['Jaque mate: ganan las blancas', false],
                    ['Ahogado: es tablas', true],
                    ['Las negras pueden jugar Rb8', false],
                ],
                'explicacion' => 'El rey negro no está en jaque, pero las tres casillas a las que podría ir (a7, b7 y b8) están atacadas por la dama, y las negras no tienen otras piezas. Sin jugadas legales y sin jaque, es ahogado: tablas.',
            ],
        ],
    ],

    'tacticas' => [
        'titulo'      => 'Tácticas',
        'descripcion' => 'Encuentra el golpe táctico. Todas estas posiciones tienen una jugada ganadora.',
        'ejercicios'  => [
            [
                'nivel'       => 'Principiante',
                'enunciado'   => 'Juegan las blancas. ¿Qué jugada gana material?',
                'posicion'    => 'r3k3/8/8/3N4/8/8/8/4K3',
                'turno'       => 'blancas',
                'opciones'    => [['Cc7+', true], ['Cf6+', false], ['Ce7', false], ['Cb6', false]],
                'explicacion' => 'Cc7+ es una horquilla: el caballo da jaque al rey de e8 y ataca la torre de a8 al mismo tiempo. Las negras deben mover el rey y pierden la torre. Cf6+ también da jaque, pero no ataca nada más; Ce7 se puede capturar con el rey, y Cb6 ataca la torre sin jaque, así que la torre se escapa.',
            ],
            [
                'nivel'       => 'Principiante',
                'enunciado'   => 'Juegan las blancas y dan jaque mate en una jugada.',
                'posicion'    => '6k1/5ppp/8/8/8/8/8/4R1K1',
                'turno'       => 'blancas',
                'opciones'    => [['Te8#', true], ['Te7', false], ['Rf2', false]],
                'explicacion' => 'Te8# es el mate del pasillo: el rey negro está encerrado por sus propios peones de f7, g7 y h7, y la torre controla toda la octava fila (f8 y h8 incluidas). Las negras no tienen piezas para tapar ni capturar.',
            ],
            [
                'nivel'       => 'Principiante',
                'enunciado'   => 'Tras 1.e4 e5 2.Ac4 Cc6 3.Dh5, juegan las negras. ¿Cuál de estas jugadas pierde de inmediato?',
                'posicion'    => 'r1bqkbnr/pppp1ppp/2n5/4p2Q/2B1P3/8/PPPP1PPP/RNB1K1NR',
                'turno'       => 'negras',
                'opciones'    => [['3...Cf6', true], ['3...g6', false], ['3...De7', false]],
                'explicacion' => '3...Cf6?? ataca a la dama, pero deja f7 sin defender: 4.Dxf7# es el Mate del Pastor (la dama está protegida por el alfil de c4). Con 3...g6 o 3...De7 las negras defienden f7 y quedan bien.',
            ],
            [
                'nivel'       => 'Intermedio',
                'enunciado'   => 'Tras 1.e4 e5 2.Cf3 Cf6 3.Cxe5 Cxe4 4.De2 Cf6, juegan las blancas. ¿Qué jugada gana la dama negra?',
                'posicion'    => 'rnbqkb1r/pppp1ppp/5n2/4N3/8/8/PPPPQPPP/RNB1KB1R',
                'turno'       => 'blancas',
                'opciones'    => [['Cc6+', true], ['Cxf7', false], ['d4', false]],
                'explicacion' => 'Cc6+ es un jaque descubierto: al salir el caballo de e5, la dama de e2 da jaque al rey por la columna e, y a la vez el caballo ataca la dama de d8. Las negras tienen que atender el jaque y pierden la dama. Es la trampa de la Defensa Petrov.',
            ],
            [
                'nivel'       => 'Avanzado',
                'enunciado'   => 'Juegan las blancas y dan mate en dos jugadas. ¿Cuál es la primera?',
                'posicion'    => '5r1k/6pp/7N/3Q4/8/8/8/2K5',
                'turno'       => 'blancas',
                'opciones'    => [['Dg8+', true], ['Cf7+', false], ['Dd8', false]],
                'explicacion' => 'Dg8+!! es un sacrificio de dama: el rey no puede capturarla porque el caballo de h6 defiende g8, así que la torre está obligada a hacerlo (1...Txg8). Entonces 2.Cf7# es un mate de la coz: el rey de h8 queda encerrado por su torre y sus peones. Con 1.Cf7+ la torre captura el caballo, y 1.Dd8 se responde con 1...Txd8.',
            ],
        ],
    ],

    'estrategia' => [
        'titulo'      => 'Estrategia',
        'descripcion' => 'Evaluación de posiciones y planes.',
        'ejercicios'  => [
            [
                'nivel'       => 'Principiante',
                'enunciado'   => 'Tienes una torre en una columna completamente abierta (sin peones de ningún color). En general, ¿qué conviene hacer?',
                'opciones'    => [
                    ['Retirarla a su casilla inicial', false],
                    ['Mantenerla activa en esa columna y, si se puede, duplicarla con la otra torre', true],
                    ['Cambiarla por un peón rival lo antes posible', false],
                ],
                'explicacion' => 'Las columnas abiertas son el mejor terreno para las torres. Mantenerlas ahí, e incluso duplicarlas (las dos torres en la misma columna), suele generar mucha presión sobre la posición rival.',
            ],
            [
                'nivel'       => 'Principiante',
                'enunciado'   => 'No encuentras un plan claro y todas tus piezas están bien ubicadas menos una. ¿Qué conviene hacer?',
                'opciones'    => [
                    ['Mover peones al azar', false],
                    ['Buscarle una mejor casilla a esa pieza', true],
                    ['Ofrecer tablas', false],
                ],
                'explicacion' => 'Cuando no aparece un plan evidente, uno de los recursos más confiables es mejorar la pieza peor ubicada: casi siempre mejora la posición general.',
            ],
            [
                'nivel'       => 'Intermedio',
                'enunciado'   => '¿Cuándo se dice que un alfil es "malo"?',
                'opciones'    => [
                    ['Cuando sus propios peones centrales están en casillas de su mismo color', true],
                    ['Cuando todavía no salió de su casilla inicial', false],
                    ['Cuando el rival tiene la pareja de alfiles', false],
                ],
                'explicacion' => 'Los propios peones fijos en casillas de su color le bloquean las diagonales y lo dejan reducido a defenderlos. Por eso conviene ubicar los peones en casillas del color contrario al del alfil.',
            ],
            [
                'nivel'       => 'Intermedio',
                'enunciado'   => 'Tienes una pieza de ventaja. En general, ¿qué conviene cambiar?',
                'opciones'    => [
                    ['Piezas, para simplificar la posición', true],
                    ['Peones, para abrir el tablero', false],
                    ['Nada: hay que evitar todos los cambios', false],
                ],
                'explicacion' => 'Con ventaja de material conviene cambiar piezas: cuanto menos material quede, más pesa la pieza de más. Los peones conviene conservarlos, porque son los que pueden coronar. Si estás en desventaja, es al revés: evita los cambios.',
            ],
            [
                'nivel'       => 'Avanzado',
                'enunciado'   => '¿Cuál es el punto más débil de una cadena de peones?',
                'opciones'    => [
                    ['La punta (el peón más adelantado)', false],
                    ['La base (el peón de más atrás)', true],
                    ['Todos los peones de la cadena son igual de débiles', false],
                ],
                'explicacion' => 'Cada peón de la cadena está defendido por el de atrás, salvo la base, que no tiene ningún peón que la proteja. Por eso el plan habitual es atacar la base, como hacen las negras con ...c5 en la Defensa Francesa.',
            ],
        ],
    ],

    'finales' => [
        'titulo'      => 'Finales',
        'descripcion' => 'Técnica de la fase final de la partida.',
        'ejercicios'  => [
            [
                'nivel'       => 'Principiante',
                'enunciado'   => 'Juegan las blancas y dan jaque mate en una jugada.',
                'posicion'    => 'k7/8/1K6/8/8/8/8/2Q5',
                'turno'       => 'blancas',
                'opciones'    => [['Dc8#', true], ['Dc7', false], ['Da3+', false]],
                'explicacion' => 'Dc8# es mate: la dama da jaque por la octava fila y controla b8, y el rey blanco cubre a7 y b7. ¡Cuidado con Dc7!: no es jaque, pero ataca a7, b7 y b8, así que el rey negro se queda sin jugadas legales y es ahogado (tablas). Da3+ da jaque por la columna a, pero el rey escapa a b8.',
            ],
            [
                'nivel'       => 'Intermedio',
                'enunciado'   => 'Juegan las blancas. ¿Puede el rey negro alcanzar al peón antes de que corone?',
                'posicion'    => '8/8/8/P7/4k3/8/8/7K',
                'turno'       => 'blancas',
                'opciones'    => [
                    ['No: el peón corona', true],
                    ['Sí: el rey lo alcanza', false],
                    ['Depende de lo que haga el rey blanco', false],
                ],
                'explicacion' => 'Regla del cuadrado: tras 1.a6, el cuadrado del peón va de a6 a c8. El rey negro, en e4, no puede entrar en él con una jugada: 1...Rd5 2.a7 Rc6 3.a8=D+ y el peón corona (además, con jaque).',
            ],
            [
                'nivel'       => 'Principiante',
                'enunciado'   => 'En un final de rey y peón contra rey, tu rey y el rival están enfrentados con una casilla entre ambos, y te toca mover a ti. ¿Quién tiene la oposición?',
                'opciones'    => [
                    ['Tú', false],
                    ['El rival', true],
                    ['Nadie: la oposición no existe en este final', false],
                ],
                'explicacion' => 'Tener la oposición significa que es el rival quien debe mover en esa posición enfrentada, y por eso tiene que ceder terreno. Si te toca mover a ti, la oposición la tiene el rival.',
            ],
            [
                'nivel'       => 'Intermedio',
                'enunciado'   => 'Tienes un peón pasado avanzado, pero tu rey está lejos y el rival está cerca. ¿Qué conviene revisar primero?',
                'opciones'    => [
                    ['Si el peón puede coronar sin ayuda', false],
                    ['Si el rey rival entra en el "cuadrado" del peón y puede alcanzarlo', true],
                    ['El valor total de las piezas del tablero', false],
                ],
                'explicacion' => 'La regla del cuadrado permite saber rápidamente, sin calcular jugada por jugada, si el rey rival llega a tiempo de detener al peón.',
            ],
            [
                'nivel'       => 'Avanzado',
                'enunciado'   => 'En la posición de Philidor (torre y peón contra torre), ¿dónde debe ubicar su torre el bando que se defiende?',
                'opciones'    => [
                    ['En su tercera fila, para que el rey rival no avance', true],
                    ['Al lado de su propio rey, para protegerlo', false],
                    ['Detrás del peón rival desde el principio', false],
                ],
                'explicacion' => 'La defensa de Philidor tiene dos pasos: primero la torre en la tercera fila propia, para cortar el avance del rey rival; cuando el peón llega a esa fila, la torre va a la última fila y da jaques desde atrás. Así se asegura el empate.',
            ],
        ],
    ],
];
