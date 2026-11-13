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

                    <div class="content-block">
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

                    <div class="content-block reverse">
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
                                Es la única pieza que nunca puede retroceder, por eso cada avance de peón es una
                                decisión importante: deja casillas que ya no podrá volver a defender.
                            </p>
                            <p>
                                En su primer movimiento puede avanzar dos casillas, pero solamente si no hay piezas
                                bloqueando su camino. Es una pieza esencial para proteger y controlar el ritmo de la partida.
                            </p>
                        </div>
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

                    <div class="simple-panel" id="captura-al-paso">
                        <h2>Captura al paso</h2>
                        <p>
                            Es la regla que más sorprende a quienes empiezan. Si un peón avanza <strong>dos casillas</strong>
                            desde su posición inicial y queda justo al lado de un peón rival, ese peón rival puede capturarlo
                            <strong>como si hubiera avanzado una sola casilla</strong>.
                        </p>
                        <ul>
                            <li><strong>Ejemplo:</strong> un peón blanco está en e5. Las negras juegan d7-d5 y su peón queda en d5, al lado del blanco. Las blancas pueden responder <strong>exd6</strong>: el peón blanco pasa a d6 y el peón negro de d5 sale del tablero.</li>
                            <li>Solo se puede hacer <strong>en la jugada inmediata</strong>. Si no se aprovecha en ese momento, se pierde el derecho.</li>
                            <li>Solo la hacen los peones, y solo contra un peón que acaba de avanzar dos casillas.</li>
                        </ul>
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

                <hr>

                <section id="notacion" class="page-section">
                    <div class="simple-panel">
                        <h2>Notación algebraica: cómo se anotan las jugadas</h2>
                        <p>
                            Es el "idioma" que se usa en libros, sitios web y torneos para escribir las partidas, y el
                            que usamos en todo este sitio. Cada casilla se nombra con su columna (letras de la
                            <strong>a</strong> a la <strong>h</strong>) y su fila (números del <strong>1</strong> al
                            <strong>8</strong>), como en "e4" o "g7".
                        </p>
                        <ul>
                            <li><strong>Piezas:</strong> R = rey, D = dama, T = torre, A = alfil, C = caballo. Los peones no llevan letra. En inglés se usan K, Q, R, B y N.</li>
                            <li><strong>Movimiento:</strong> letra de la pieza + casilla de llegada. <em>Cf3</em> = caballo a f3; <em>e4</em> = peón a e4.</li>
                            <li><strong>Captura:</strong> se agrega una "x". <em>Axc6</em> = el alfil captura en c6; <em>exd5</em> = el peón de la columna e captura en d5.</li>
                            <li><strong>Jaque y mate:</strong> "+" indica jaque y "#" jaque mate. <em>Dh5+</em>, <em>Dxf7#</em>.</li>
                            <li><strong>Enroque:</strong> O-O es el enroque corto y O-O-O el largo.</li>
                            <li><strong>Promoción:</strong> se indica la pieza elegida. <em>e8=D</em> = el peón corona en dama.</li>
                            <li><strong>Dos piezas iguales pueden ir a la misma casilla:</strong> se agrega la columna o la fila de origen. <em>Cbd2</em> = el caballo de la columna b va a d2.</li>
                            <li><strong>Comentarios:</strong> "!" marca una buena jugada, "?" un error y "??" un error grave.</li>
                        </ul>
                        <p>Por ejemplo, <em>1.e4 e5 2.Cf3 Cc6 3.Ac4</em> se lee: "1, peón a e4, peón a e5; 2, caballo a f3, caballo a c6; 3, alfil a c4". Es la <a href="aperturas.php#italiana" style="color: var(--gold);">Apertura Italiana</a>.</p>
                    </div>
                </section>

                <hr>

                <section id="ritmos" class="page-section">
                    <div class="section-heading">
                        <h2>Ritmos de juego y reloj</h2>
                        <p>Cada jugador tiene un tiempo total para toda la partida, que se mide con un reloj de dos relojes: al terminar la jugada, se pulsa el propio y empieza a correr el del rival. Si a alguien se le acaba el tiempo, en general pierde.</p>
                    </div>

                    <div class="topic-grid topic-grid--4">
                        <div class="card">
                            <h3>Bala</h3>
                            <p>Menos de 3 minutos por jugador. Muy popular en internet; se juega casi por reflejo.</p>
                        </div>
                        <div class="card">
                            <h3>Blitz (relámpago)</h3>
                            <p>Hasta 10 minutos por jugador. Exige decidir rápido, pero ya permite algo de cálculo.</p>
                        </div>
                        <div class="card">
                            <h3>Rápidas</h3>
                            <p>Más de 10 y menos de 60 minutos por jugador. Un buen equilibrio entre pensar y jugar.</p>
                        </div>
                        <div class="card">
                            <h3>Clásicas</h3>
                            <p>60 minutos o más por jugador. Es el ritmo de los torneos más importantes y del Campeonato del Mundo.</p>
                        </div>
                    </div>
                    <p class="section-note">El <strong>incremento</strong> suma unos segundos al reloj por cada jugada realizada. Se escribe, por ejemplo, <strong>3+2</strong>: 3 minutos para toda la partida y 2 segundos más por jugada.</p>
                </section>

                <hr>

                <section id="elo" class="page-section">
                    <div class="content-block">
                        <div>
                            <h2>La puntuación ELO</h2>
                            <p>
                                Es el sistema que mide la fuerza de juego. Lo creó el profesor de física
                                <strong>Arpad Elo</strong> y la FIDE (Federación Internacional de Ajedrez) lo adoptó en 1970.
                                Después de cada partida, el ganador suma puntos y el perdedor los resta; ganarle a alguien
                                con más puntuación suma más que ganarle a alguien con menos.
                            </p>
                            <p>
                                El récord histórico lo tiene Magnus Carlsen, que llegó a 2882 en 2014.
                            </p>
                        </div>
                        <div>
                            <h2>Valores de referencia</h2>
                            <ul>
                                <li><strong>Menos de 1200:</strong> principiantes.</li>
                                <li><strong>1200 a 1800:</strong> jugadores de club, de nivel inicial a intermedio.</li>
                                <li><strong>1800 a 2200:</strong> jugadores fuertes y expertos.</li>
                                <li><strong>2300 a 2400:</strong> Maestro FIDE y Maestro Internacional.</li>
                                <li><strong>2500 o más:</strong> nivel de Gran Maestro, el título más alto (además de la puntuación, exige buenos resultados, llamados "normas", en torneos internacionales).</li>
                            </ul>
                            <p>Las plataformas online usan sistemas parecidos, pero sus números no son iguales a los de la FIDE.</p>
                        </div>
                    </div>
                </section>

                <hr>

                <section id="reglas-de-torneo" class="page-section">
                    <div class="section-heading">
                        <h2>Reglas de torneo que conviene conocer</h2>
                        <p>En una partida oficial no hay "árbitro automático": estas normas se aplican aunque el rival no las reclame.</p>
                    </div>

                    <div class="card-grid">
                        <div class="card">
                            <h3>Pieza tocada, pieza movida</h3>
                            <p>Si tocas a propósito una pieza propia, tienes que moverla (si tiene alguna jugada legal). Si tocas una pieza rival, tienes que capturarla si puedes.</p>
                        </div>
                        <div class="card">
                            <h3>"Compongo"</h3>
                            <p>Para acomodar una pieza mal centrada en su casilla sin tener que moverla, primero se avisa diciendo "compongo" (en francés, <em>j'adoube</em>).</p>
                        </div>
                        <div class="card">
                            <h3>Jugadas ilegales</h3>
                            <p>En partidas clásicas y rápidas, la primera jugada ilegal se corrige y el rival recibe dos minutos más. La segunda jugada ilegal pierde la partida.</p>
                        </div>
                        <div class="card">
                            <h3>Ofrecer tablas</h3>
                            <p>Se ofrecen después de mover y antes de pulsar el reloj. El rival puede aceptar o simplemente seguir jugando, lo que equivale a rechazar.</p>
                        </div>
                        <div class="card">
                            <h3>Una sola mano</h3>
                            <p>Se mueve, se captura y se pulsa el reloj con la misma mano, como explicamos en <a href="#reglas" style="color: var(--gold);">Reglas Básicas</a>.</p>
                        </div>
                        <div class="card">
                            <h3>Teléfono celular</h3>
                            <p>En la mayoría de los torneos está prohibido tenerlo encendido en la sala de juego. Si suena, el jugador puede perder la partida.</p>
                        </div>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
