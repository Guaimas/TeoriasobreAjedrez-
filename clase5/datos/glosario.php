<?php
/**
 * clase5/datos/glosario.php
 * -----------------------------------------------------------------
 * Términos del glosario de ajedrez como array de PHP.
 *
 * Antes estaban escritos a mano en el HTML de paginas/glosario.php.
 * Al tenerlos como datos, PHP puede recorrerlos para dibujar el
 * glosario y también filtrarlos con el buscador (formulario GET).
 *
 * Cada elemento: 'termino' => nombre, 'definicion' => explicación.
 * Estos textos los escribe el sitio (no el usuario), pero igual se
 * imprimen con e() por buena práctica.
 * -----------------------------------------------------------------
 */

return [
    ['termino' => 'Ahogado',
     'definicion' => 'Situación en la que un jugador no tiene ningún movimiento legal disponible, pero su rey no está en jaque. La partida termina en tablas.'],
    ['termino' => 'Alfil',
     'definicion' => 'Pieza que se mueve en diagonal cualquier cantidad de casillas. Cada jugador tiene dos: uno de casillas claras y otro de casillas oscuras.'],
    ['termino' => 'Apertura',
     'definicion' => 'Fase inicial de la partida, en la que ambos jugadores desarrollan sus piezas y luchan por el control del centro.'],
    ['termino' => 'Ataque doble',
     'definicion' => 'Jugada que amenaza dos objetivos al mismo tiempo, de modo que el rival no puede defender ambos.'],
    ['termino' => 'Caballo',
     'definicion' => 'Pieza que se mueve en forma de "L": dos casillas en una dirección y una en perpendicular. Es la única pieza que puede saltar sobre otras.'],
    ['termino' => 'Captura al paso',
     'definicion' => 'Regla especial que permite a un peón capturar a un peón rival que acaba de avanzar dos casillas, como si solo hubiera avanzado una.'],
    ['termino' => 'Casilla débil',
     'definicion' => 'Casilla que ya no puede ser defendida por un peón y puede convertirse en un buen punto de apoyo para las piezas rivales.'],
    ['termino' => 'Centro',
     'definicion' => 'Las cuatro casillas centrales del tablero (d4, d5, e4, e5), clave para controlar el movimiento de las piezas.'],
    ['termino' => 'Clavada',
     'definicion' => 'Situación en la que una pieza no puede moverse sin exponer a otra pieza más valiosa (o al rey) a un ataque.'],
    ['termino' => 'Columna abierta',
     'definicion' => 'Columna del tablero que no tiene peones de ningún color, ideal para colocar torres.'],
    ['termino' => 'Columna semiabierta',
     'definicion' => 'Columna en la que solo uno de los dos jugadores tiene un peón, aprovechable por el bando que no lo tiene.'],
    ['termino' => 'Combinación',
     'definicion' => 'Secuencia de jugadas, generalmente con sacrificios, calculada para conseguir una ventaja concreta.'],
    ['termino' => 'Dama',
     'definicion' => 'La pieza más poderosa del tablero: se mueve en línea recta y en diagonal, cualquier cantidad de casillas.'],
    ['termino' => 'Desarrollo',
     'definicion' => 'Proceso de sacar las piezas de sus casillas iniciales para ponerlas en juego durante la apertura.'],
    ['termino' => 'Enroque',
     'definicion' => 'Movimiento especial en el que el rey se desplaza dos casillas hacia una torre, y esa torre salta al otro lado del rey. Sirve para proteger al rey y activar la torre.'],
    ['termino' => 'Espacio',
     'definicion' => 'Cantidad de terreno que controlan las piezas y peones de un jugador. Tener más espacio suele dar más libertad de movimiento.'],
    ['termino' => 'Estrategia',
     'definicion' => 'Plan general a mediano o largo plazo: dónde ubicar las piezas y qué objetivos perseguir durante la partida.'],
    ['termino' => 'Estructura de peones',
     'definicion' => 'La disposición de los peones sobre el tablero, que determina qué casillas están débiles o fuertes para cada bando.'],
    ['termino' => 'Final',
     'definicion' => 'Última fase de la partida, cuando quedan pocas piezas sobre el tablero y el rey pasa a jugar un papel activo.'],
    ['termino' => 'Gambito',
     'definicion' => 'Apertura en la que un jugador ofrece un peón (o más material) a cambio de ganar tiempo, desarrollo o iniciativa.'],
    ['termino' => 'Horquilla',
     'definicion' => 'Jugada en la que una sola pieza ataca a dos o más piezas rivales al mismo tiempo.'],
    ['termino' => 'Jaque',
     'definicion' => 'Ataque directo al rey. El jugador debe responder de inmediato: mover el rey, capturar la pieza atacante o interponer otra pieza.'],
    ['termino' => 'Jaque mate',
     'definicion' => 'Jaque del que el rey no puede escapar de ninguna manera. Termina la partida de forma inmediata.'],
    ['termino' => 'Medio juego',
     'definicion' => 'Fase de la partida entre la apertura y el final, donde suelen decidirse los planes estratégicos y tácticos.'],
    ['termino' => 'Notación algebraica',
     'definicion' => 'Sistema estándar para anotar las jugadas de una partida, usando letras (a–h) y números (1–8) para nombrar cada casilla.'],
    ['termino' => 'Oposición',
     'definicion' => 'Posición en la que los dos reyes se enfrentan separados por una casilla, en un final de reyes y peones. Tener la oposición suele ser una ventaja decisiva.'],
    ['termino' => 'Pareja de alfiles',
     'definicion' => 'Conservar los dos alfiles mientras el rival ha perdido uno, lo que suele dar ventaja por controlar casillas de ambos colores.'],
    ['termino' => 'Peón',
     'definicion' => 'La pieza más numerosa y de menor valor. Avanza en línea recta pero captura en diagonal.'],
    ['termino' => 'Peón pasado',
     'definicion' => 'Peón que ya no tiene peones rivales que puedan detener su avance hacia la coronación, ni en su columna ni en las adyacentes.'],
    ['termino' => 'Promoción',
     'definicion' => 'Cuando un peón llega a la última fila del tablero, se convierte (corona) en la pieza que el jugador elija: generalmente dama.'],
    ['termino' => 'Rey',
     'definicion' => 'La pieza más importante: si queda en jaque mate, la partida termina. Se mueve una casilla en cualquier dirección.'],
    ['termino' => 'Sacrificio',
     'definicion' => 'Entregar material de forma voluntaria a cambio de una ventaja mayor, como un ataque fuerte o una combinación ganadora.'],
    ['termino' => 'Sobrecarga',
     'definicion' => 'Situación en la que una pieza defiende dos elementos importantes a la vez y no puede ocuparse de ambos.'],
    ['termino' => 'Tablas',
     'definicion' => 'Resultado de empate en una partida, ya sea por ahogado, acuerdo mutuo, triple repetición o falta de material suficiente para dar mate.'],
    ['termino' => 'Táctica',
     'definicion' => 'Secuencia corta y calculada de jugadas, casi siempre forzada, que aprovecha una oportunidad concreta en la posición.'],
    ['termino' => 'Torre',
     'definicion' => 'Pieza que se mueve en línea recta, horizontal o vertical, cualquier cantidad de casillas.'],
    ['termino' => 'Valor de las piezas',
     'definicion' => 'Estimación aproximada de la importancia de cada pieza en puntos: peón 1, caballo y alfil 3, torre 5, dama 9. El rey no tiene valor numérico porque no puede perderse.'],
    ['termino' => 'Zugzwang',
     'definicion' => 'Situación en la que un jugador estaría mejor si no tuviera que mover, porque cualquier jugada disponible empeora su posición.'],
];
