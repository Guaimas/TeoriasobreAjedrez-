<?php
/**
 * glosario.php
 * Página migrada desde paginas/glosario.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 */

$titulo_pagina    = "Glosario - El Arte del Jaque";
$meta_descripcion = "Glosario con más de 30 términos de ajedrez explicados de forma sencilla, ordenados alfabéticamente.";
$pagina_actual    = "glosario";
$header_titulo    = "Glosario";
$header_tagline   = "El vocabulario del ajedrez";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Glosario</span>
                    <h1>Glosario de Ajedrez</h1>
                    <p>Los términos más usados en el mundo del ajedrez, explicados de forma simple y ordenados de la A a la Z.</p>
                </div>

                <section class="page-section">

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-A">
                            <span>A</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-A">
                        <div class="definition-card"><dt>Ahogado</dt><dd>Situación en la que un jugador no tiene ningún movimiento legal disponible, pero su rey no está en jaque. La partida termina en tablas.</dd></div>
                        <div class="definition-card"><dt>Alfil</dt><dd>Pieza que se mueve en diagonal cualquier cantidad de casillas. Cada jugador tiene dos: uno de casillas claras y otro de casillas oscuras.</dd></div>
                        <div class="definition-card"><dt>Apertura</dt><dd>Fase inicial de la partida, en la que ambos jugadores desarrollan sus piezas y luchan por el control del centro.</dd></div>
                        <div class="definition-card"><dt>Ataque doble</dt><dd>Jugada que amenaza dos objetivos al mismo tiempo, de modo que el rival no puede defender ambos.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-C">
                            <span>C</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-C">
                        <div class="definition-card"><dt>Caballo</dt><dd>Pieza que se mueve en forma de "L": dos casillas en una dirección y una en perpendicular. Es la única pieza que puede saltar sobre otras.</dd></div>
                        <div class="definition-card"><dt>Captura al paso</dt><dd>Regla especial que permite a un peón capturar a un peón rival que acaba de avanzar dos casillas, como si solo hubiera avanzado una.</dd></div>
                        <div class="definition-card"><dt>Casilla débil</dt><dd>Casilla que ya no puede ser defendida por un peón y puede convertirse en un buen punto de apoyo para las piezas rivales.</dd></div>
                        <div class="definition-card"><dt>Centro</dt><dd>Las cuatro casillas centrales del tablero (d4, d5, e4, e5), clave para controlar el movimiento de las piezas.</dd></div>
                        <div class="definition-card"><dt>Clavada</dt><dd>Situación en la que una pieza no puede moverse sin exponer a otra pieza más valiosa (o al rey) a un ataque.</dd></div>
                        <div class="definition-card"><dt>Columna abierta</dt><dd>Columna del tablero que no tiene peones de ningún color, ideal para colocar torres.</dd></div>
                        <div class="definition-card"><dt>Columna semiabierta</dt><dd>Columna en la que solo uno de los dos jugadores tiene un peón, aprovechable por el bando que no lo tiene.</dd></div>
                        <div class="definition-card"><dt>Combinación</dt><dd>Secuencia de jugadas, generalmente con sacrificios, calculada para conseguir una ventaja concreta.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-D">
                            <span>D</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-D">
                        <div class="definition-card"><dt>Dama</dt><dd>La pieza más poderosa del tablero: se mueve en línea recta y en diagonal, cualquier cantidad de casillas.</dd></div>
                        <div class="definition-card"><dt>Desarrollo</dt><dd>Proceso de sacar las piezas de sus casillas iniciales para ponerlas en juego durante la apertura.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-E">
                            <span>E</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-E">
                        <div class="definition-card"><dt>Enroque</dt><dd>Movimiento especial en el que el rey se desplaza dos casillas hacia una torre, y esa torre salta al otro lado del rey. Sirve para proteger al rey y activar la torre.</dd></div>
                        <div class="definition-card"><dt>Espacio</dt><dd>Cantidad de terreno que controlan las piezas y peones de un jugador. Tener más espacio suele dar más libertad de movimiento.</dd></div>
                        <div class="definition-card"><dt>Estrategia</dt><dd>Plan general a mediano o largo plazo: dónde ubicar las piezas y qué objetivos perseguir durante la partida.</dd></div>
                        <div class="definition-card"><dt>Estructura de peones</dt><dd>La disposición de los peones sobre el tablero, que determina qué casillas están débiles o fuertes para cada bando.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-F">
                            <span>F</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-F">
                        <div class="definition-card"><dt>Final</dt><dd>Última fase de la partida, cuando quedan pocas piezas sobre el tablero y el rey pasa a jugar un papel activo.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-G">
                            <span>G</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-G">
                        <div class="definition-card"><dt>Gambito</dt><dd>Apertura en la que un jugador ofrece un peón (o más material) a cambio de ganar tiempo, desarrollo o iniciativa.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-H">
                            <span>H</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-H">
                        <div class="definition-card"><dt>Horquilla</dt><dd>Jugada en la que una sola pieza ataca a dos o más piezas rivales al mismo tiempo.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-J">
                            <span>J</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-J">
                        <div class="definition-card"><dt>Jaque</dt><dd>Ataque directo al rey. El jugador debe responder de inmediato: mover el rey, capturar la pieza atacante o interponer otra pieza.</dd></div>
                        <div class="definition-card"><dt>Jaque mate</dt><dd>Jaque del que el rey no puede escapar de ninguna manera. Termina la partida de forma inmediata.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-M">
                            <span>M</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-M">
                        <div class="definition-card"><dt>Medio juego</dt><dd>Fase de la partida entre la apertura y el final, donde suelen decidirse los planes estratégicos y tácticos.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-N">
                            <span>N</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-N">
                        <div class="definition-card"><dt>Notación algebraica</dt><dd>Sistema estándar para anotar las jugadas de una partida, usando letras (a–h) y números (1–8) para nombrar cada casilla.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-O">
                            <span>O</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-O">
                        <div class="definition-card"><dt>Oposición</dt><dd>Posición en la que los dos reyes se enfrentan separados por una casilla, en un final de reyes y peones. Tener la oposición suele ser una ventaja decisiva.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-P">
                            <span>P</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-P">
                        <div class="definition-card"><dt>Pareja de alfiles</dt><dd>Conservar los dos alfiles mientras el rival ha perdido uno, lo que suele dar ventaja por controlar casillas de ambos colores.</dd></div>
                        <div class="definition-card"><dt>Peón</dt><dd>La pieza más numerosa y de menor valor. Avanza en línea recta pero captura en diagonal.</dd></div>
                        <div class="definition-card"><dt>Peón pasado</dt><dd>Peón que ya no tiene peones rivales que puedan detener su avance hacia la coronación, ni en su columna ni en las adyacentes.</dd></div>
                        <div class="definition-card"><dt>Promoción</dt><dd>Cuando un peón llega a la última fila del tablero, se convierte (corona) en la pieza que el jugador elija: generalmente dama.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-R">
                            <span>R</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-R">
                        <div class="definition-card"><dt>Rey</dt><dd>La pieza más importante: si queda en jaque mate, la partida termina. Se mueve una casilla en cualquier dirección.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-S">
                            <span>S</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-S">
                        <div class="definition-card"><dt>Sacrificio</dt><dd>Entregar material de forma voluntaria a cambio de una ventaja mayor, como un ataque fuerte o una combinación ganadora.</dd></div>
                        <div class="definition-card"><dt>Sobrecarga</dt><dd>Situación en la que una pieza defiende dos elementos importantes a la vez y no puede ocuparse de ambos.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-T">
                            <span>T</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-T">
                        <div class="definition-card"><dt>Tablas</dt><dd>Resultado de empate en una partida, ya sea por ahogado, acuerdo mutuo, triple repetición o falta de material suficiente para dar mate.</dd></div>
                        <div class="definition-card"><dt>Táctica</dt><dd>Secuencia corta y calculada de jugadas, casi siempre forzada, que aprovecha una oportunidad concreta en la posición.</dd></div>
                        <div class="definition-card"><dt>Torre</dt><dd>Pieza que se mueve en línea recta, horizontal o vertical, cualquier cantidad de casillas.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-V">
                            <span>V</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-V">
                        <div class="definition-card"><dt>Valor de las piezas</dt><dd>Estimación aproximada de la importancia de cada pieza en puntos: peón 1, caballo y alfil 3, torre 5, dama 9. El rey no tiene valor numérico porque no puede perderse.</dd></div>
                    </dl>

                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-Z">
                            <span>Z</span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-Z">
                        <div class="definition-card"><dt>Zugzwang</dt><dd>Situación en la que un jugador estaría mejor si no tuviera que mover, porque cualquier jugada disponible empeora su posición.</dd></div>
                    </dl>

                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
