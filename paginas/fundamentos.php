<?php
/**
 * fundamentos.php
 * Página migrada desde paginas/fundamentos.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 */

$titulo_pagina    = "Fundamentos - El Arte del Jaque";
$meta_descripcion = "Aprende qué es el ajedrez, el tablero, el movimiento y valor de cada pieza, jaque, enroque, promoción y las reglas básicas.";
$pagina_actual    = "fundamentos";
$header_titulo    = "Fundamentos";
$header_tagline   = "Los cimientos de todo gran jugador";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Fundamentos</span>
                    <h1>Los cimientos del juego</h1>
                    <p>Todo lo que necesitas saber antes de sentarte frente al tablero: qué es el ajedrez, sus reglas y cómo se mueve cada pieza.</p>
                </div>

                <section id="que-es" class="page-section">
                    <div class="content-block">
                        <div class="content-media">
                            <img src="https://images.pexels.com/photos/35793270/pexels-photo-35793270.png?auto=compress&cs=tinysrgb&w=1200" alt="Historia y origen del ajedrez">
                        </div>
                        <div>
                            <h2>¿Qué es el Ajedrez?</h2>
                            <p>
                                El ajedrez es un juego de mesa milenario que combina estrategia, táctica y
                                pensamiento lógico. Se juega entre dos personas en un tablero de 64 casillas,
                                con dieciséis piezas por jugador, y el objetivo es dar jaque mate al rey
                                contrario. Más que un juego, es un arte que estimula la mente, mejora la
                                concentración y desarrolla la capacidad de análisis y toma de decisiones.
                            </p>
                        </div>
                    </div>

                    <div class="content-block reverse">
                        <div class="content-media">
                            <img src="https://images.pexels.com/photos/8438875/pexels-photo-8438875.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Datos adicionales sobre el ajedrez">
                        </div>
                        <div>
                            <h2>Características del Ajedrez</h2>
                            <ul>
                                <li>Nació en la India hace más de 1.500 años y se ha convertido en un lenguaje universal.</li>
                                <li>Cada pieza tiene un movimiento único y cada decisión puede cambiar el rumbo de la partida.</li>
                                <li>Mejora la memoria, la concentración, la creatividad y la resolución de problemas.</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <hr>

                <section id="tablero" class="page-section">
                    <div class="simple-panel">
                        <h2>El Tablero</h2>
                        <p>
                            El ajedrez se juega sobre un tablero de 64 casillas, organizadas en 8 filas
                            (numeradas del 1 al 8) y 8 columnas (nombradas de la "a" a la "h"), alternando
                            colores claros y oscuros. Cada casilla tiene una dirección única, como "e4" o "g7",
                            lo que permite anotar y seguir cualquier partida con precisión.
                        </p>
                        <ul>
                            <li>El tablero siempre se coloca con una casilla clara en la esquina inferior derecha de cada jugador.</li>
                            <li>Las cuatro casillas centrales (d4, d5, e4, e5) son las más importantes: quien las controla, controla el juego.</li>
                            <li>Cada jugador comienza con sus piezas ubicadas en las dos filas más cercanas a él.</li>
                        </ul>
                    </div>
                </section>

                <hr>

                <section id="reglas" class="page-section">
                    <div class="simple-panel">
                        <h2>Reglas Básicas</h2>
                        <p>
                            Todo juego de mesa tiene reglas específicas que cada jugador debe seguir y, en este caso,
                            el ajedrez no es la excepción. Cuando juegas en una aplicación o plataforma digital, el
                            sistema suele actuar como "árbitro" automático, impidiéndote realizar jugadas
                            ilegales o presionar el reloj por error. Sin embargo, en una partida real frente a un
                            tablero físico, tú eres el único responsable de cumplir con las leyes de la competición.
                        </p>
                        <p>
                            Ten en cuenta los siguientes puntos para que tu partida sea válida y evitar que te
                            sancionen o te den la partida por perdida:
                        </p>
                    </div>

                    <div class="carousel-block">
                        <button class="nav-arrow" disabled aria-label="Anterior"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M15 5l-7 7 7 7"/></svg></button>
                        <div class="content-media">
                            <img src="https://images.pexels.com/photos/8438946/pexels-photo-8438946.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Movimiento de piezas">
                        </div>
                        <div>
                            <h2>Movimiento</h2>
                            <p>
                                A diferencia de un clic o un deslizamiento en pantalla, en el tablero físico debes
                                usar la misma mano para todo.
                            </p>
                            <ul>
                                <li>Si mueves una pieza con la mano derecha, debes capturar y presionar el reloj con esa misma mano.</li>
                                <li>Está prohibido usar ambas manos simultáneamente.</li>
                                <li>Por ejemplo, una para mover y otra para detener el reloj.</li>
                            </ul>
                        </div>
                        <button class="nav-arrow" disabled aria-label="Siguiente"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5l7 7-7 7"/></svg></button>
                    </div>
                </section>

                <hr>

                <section id="piezas" class="page-section">
                    <div class="simple-panel">
                        <h2>Piezas y Movimientos</h2>
                        <p>
                            Cada pieza en el ajedrez tiene un movimiento único que define su rol dentro del tablero.
                            Comprender cómo se desplaza cada una es el primer paso para desarrollar una estrategia sólida.
                        </p>
                    </div>

                    <div class="carousel-block">
                        <button class="nav-arrow" disabled aria-label="Anterior"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M15 5l-7 7 7 7"/></svg></button>
                        <div class="content-media">
                            <img src="https://images.pexels.com/photos/136349/pexels-photo-136349.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="El peón y su movimiento">
                        </div>
                        <div>
                            <h2>Peón</h2>
                            <p>
                                El peón es la pieza más básica del ajedrez, pero también una de las más importantes.
                                Se mueve hacia adelante una sola casilla, pero captura en diagonal.
                            </p>
                            <p>
                                A diferencia de otras piezas, captura en diagonal, lo que lo convierte en una pieza
                                estratégica para controlar el centro.
                            </p>
                            <p>
                                En su primer movimiento puede avanzar dos casillas, pero solamente si no hay piezas
                                bloqueando su camino. Es una pieza esencial para proteger y controlar el ritmo de la partida.
                            </p>
                        </div>
                        <button class="nav-arrow" disabled aria-label="Siguiente"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5l7 7-7 7"/></svg></button>
                    </div>
                    <div class="topic-grid">
                        <div class="card">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16M4 12h16M4 18h10"/></svg>
                            </div>
                            <h3>Torre</h3>
                            <p>Se mueve en línea recta, en horizontal o vertical, tantas casillas como quiera. Es muy fuerte en columnas y filas abiertas.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 20h9M8 20c0-4 4-3 4-7 0-2-2-2-2-4a2 2 0 1 1 4 0c0 3-3 4-3 7"/></svg>
                            </div>
                            <h3>Caballo</h3>
                            <p>Se mueve en forma de "L": dos casillas en una dirección y una en perpendicular. Es la única pieza que salta sobre las demás.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4l6 6-6 12-6-12 6-6Z"/></svg>
                            </div>
                            <h3>Alfil</h3>
                            <p>Se mueve en diagonal, cualquier cantidad de casillas. Cada jugador tiene uno de casillas claras y otro de oscuras.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 9l3 3 5-6 5 6 3-3-1.6 9.5H5.6L4 9Z"/></svg>
                            </div>
                            <h3>Dama</h3>
                            <p>La pieza más poderosa: combina el movimiento de la torre y el alfil, en línea recta y en diagonal.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v4M9 5h6M6 20h12l-1.5-8h-9L6 20Z"/></svg>
                            </div>
                            <h3>Rey</h3>
                            <p>Se mueve una casilla en cualquier dirección. Es la pieza más importante: si queda en jaque mate, la partida termina.</p>
                        </div>
                    </div>

                    <div class="simple-panel" style="margin-top: 1.8rem;">
                        <h2>Valor Aproximado de las Piezas</h2>
                        <p>Para decidir si un intercambio conviene, se suele asignar un valor orientativo en puntos a cada pieza. El rey no tiene valor numérico porque nunca puede capturarse.</p>
                        <ul>
                            <li><strong>Peón:</strong> 1 punto</li>
                            <li><strong>Caballo:</strong> 3 puntos</li>
                            <li><strong>Alfil:</strong> 3 puntos</li>
                            <li><strong>Torre:</strong> 5 puntos</li>
                            <li><strong>Dama:</strong> 9 puntos</li>
                        </ul>
                    </div>
                </section>

                <hr>

                <section id="capturas" class="page-section">
                    <div class="simple-panel">
                        <h2>Capturas</h2>
                        <p>
                            Cuando una pieza se mueve a una casilla ocupada por una pieza rival, la captura:
                            la pieza enemiga sale del tablero y la propia ocupa su lugar. Todas las piezas
                            capturan de la misma forma en que se mueven, excepto el peón, que se mueve hacia
                            adelante pero captura en diagonal, una casilla hacia adelante.
                        </p>
                    </div>
                </section>

                <hr>

                <section id="jaque-mate-ahogado" class="page-section">
                    <div class="simple-panel">
                        <h2>Jaque, Jaque Mate y Ahogado</h2>
                        <p>
                            Estas son las tres formas en que puede terminar una partida en relación directa con el rey:
                        </p>
                        <ul>
                            <li><strong>Jaque:</strong> el rey está siendo atacado y el jugador debe resolverlo de inmediato.</li>
                            <li><strong>Jaque mate:</strong> el rey está en jaque y no hay ninguna forma de evitarlo. La partida termina.</li>
                            <li><strong>Ahogado:</strong> el jugador no tiene jugadas legales disponibles, pero su rey no está en jaque. Es tablas.</li>
                        </ul>
                        <p>
                            Estos tres conceptos se explican con más profundidad, junto con ejemplos, en la
                            sección de <a href="finales.php" style="color: var(--gold);">Finales</a>.
                        </p>
                    </div>
                </section>

                <hr>

                <section id="enroque" class="page-section">
                    <div class="simple-panel">
                        <h2>Enroque</h2>
                        <p>
                            El enroque es el único movimiento en el que se mueven dos piezas propias a la vez:
                            el rey se desplaza dos casillas hacia una de sus torres, y esa torre salta al lado
                            contrario del rey. Sirve para poner al rey a salvo y, de paso, activar la torre.
                        </p>
                        <p>Para poder enrocar se deben cumplir estas condiciones:</p>
                        <ul>
                            <li>Ni el rey ni la torre involucrada se movieron antes en la partida.</li>
                            <li>No puede haber ninguna pieza entre el rey y la torre.</li>
                            <li>El rey no puede estar en jaque, ni pasar, ni terminar en una casilla atacada.</li>
                        </ul>
                    </div>
                </section>

                <hr>

                <section id="promocion" class="page-section">
                    <div class="simple-panel">
                        <h2>Promoción</h2>
                        <p>
                            Cuando un peón logra llegar a la última fila del tablero (la fila 8 para las
                            blancas o la fila 1 para las negras), se corona: se convierte en la pieza que el
                            jugador elija, casi siempre una dama, aunque también puede transformarse en torre,
                            alfil o caballo. Es uno de los objetivos principales de los finales de partida.
                        </p>
                    </div>
                </section>

                <hr>

                <section id="como-comienza" class="page-section">
                    <div class="simple-panel">
                        <h2>Cómo Comienza una Partida</h2>
                        <p>
                            Todas las partidas de ajedrez comienzan con la misma posición inicial: cada jugador
                            tiene 8 peones en su segunda fila y, detrás, de izquierda a derecha, torre, caballo,
                            alfil, dama, rey, alfil, caballo y torre. La dama siempre comienza en su propio
                            color (dama blanca en casilla clara, dama negra en casilla oscura).
                        </p>
                        <p>
                            Las blancas siempre mueven primero, y luego los jugadores alternan turnos hasta que
                            la partida termina en jaque mate, ahogado o tablas por otro motivo.
                        </p>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
