<?php
/**
 * tacticas.php
 * Página migrada desde paginas/tacticas.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 */

$titulo_pagina    = "Tácticas - El Arte del Jaque";
$meta_descripcion = "Las 12 tácticas más importantes del ajedrez con ejemplos (horquilla, clavada, ataque descubierto...), los patrones de mate clásicos y un método para encontrarlas.";
$pagina_actual    = "tacticas";
$header_titulo    = "Tácticas";
$header_tagline   = "Golpes que deciden partidas";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Tácticas</span>
                    <h1>Golpes tácticos</h1>
                    <p>Los recursos de corto plazo que ganan material, tiempo o directamente la partida.</p>
                </div>

                <section class="page-section">
                    <div class="simple-panel">
                        <h2>¿Qué son las tácticas?</h2>
                        <p>
                            Una táctica es una secuencia corta de jugadas, casi siempre forzada, que le saca
                            una ventaja concreta al rival: ganar una pieza, mejorar la posición del rey enemigo
                            o directamente dar jaque mate. A diferencia de un plan estratégico, una táctica se
                            calcula: se ve, se verifica y se juega en pocos movimientos.
                        </p>
                        <p>
                            La inmensa mayoría de las partidas, sobre todo entre jugadores que están aprendiendo,
                            se deciden por un error táctico: una pieza que queda indefensa, un jaque que no se vio
                            venir. Por eso entrenar la vista táctica es una de las formas más rápidas de mejorar.
                        </p>
                    </div>

                    <div class="simple-panel">
                        <div>
                            <h2>Táctica vs. estrategia</h2>
                            <p>
                                Es fácil confundir ambos términos, pero la diferencia es simple:
                            </p>
                            <ul>
                                <li><strong>Estrategia</strong> es el plan a largo plazo: dónde poner las piezas, qué casillas controlar, hacia dónde dirigir la partida.</li>
                                <li><strong>Táctica</strong> es la ejecución concreta y calculada: la secuencia de jugadas forzadas que aprovecha una oportunidad ahora mismo.</li>
                            </ul>
                            <p>
                                En la práctica, una buena estrategia crea las condiciones para que aparezcan
                                oportunidades tácticas. Puedes ampliar esta comparación en la sección de
                                <a href="estrategias.php" style="color: var(--gold);">Estrategias</a>.
                            </p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Las tácticas más importantes</h2>
                        <p>Doce recursos que todo jugador debería reconocer a simple vista. Abre "Ver ejemplo" en cada tarjeta para ver cómo funciona.</p>
                    </div>

                    <div class="card-grid">
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 19 19 5"/><path d="M5 5l6 6M13 13l6 6"/></svg>
                            </div>
                            <h3>Horquilla</h3>
                            <p>Una pieza ataca a dos o más piezas rivales al mismo tiempo, obligando al oponente a elegir cuál salvar. El caballo es especialmente temido por sus horquillas.</p>
                            <details class="card-example">
                                <summary>Ver ejemplo</summary>
                                <p>Un caballo blanco salta a c7 con jaque al rey negro de e8 y, al mismo tiempo, ataca la torre de a8 (<strong>Cc7+</strong>). Las negras están obligadas a mover el rey y pierden la torre.</p>
                            </details>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v18M6 8l6-5 6 5"/></svg>
                            </div>
                            <h3>Clavada</h3>
                            <p>Una pieza no se puede (o no conviene) mover porque detrás de ella hay una pieza más valiosa, o el propio rey, que quedaría expuesto a un ataque.</p>
                            <details class="card-example">
                                <summary>Ver ejemplo</summary>
                                <p>Con la casilla d7 libre, un alfil blanco en b5 clava al caballo negro de c6 contra el rey de e8: el caballo no puede moverse porque dejaría al rey en jaque (<strong>clavada absoluta</strong>). Si detrás del caballo hubiera una dama en lugar del rey, sería una <strong>clavada relativa</strong>: moverlo es legal, pero se pierde la dama.</p>
                            </details>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="7" cy="12" r="3"/><circle cx="17" cy="12" r="3"/><path d="M10 12h4"/></svg>
                            </div>
                            <h3>Ataque doble</h3>
                            <p>Un solo movimiento crea dos amenazas distintas a la vez (por ejemplo, un jaque y la captura de una pieza), imposibles de resolver ambas en la misma jugada.</p>
                            <details class="card-example">
                                <summary>Ver ejemplo</summary>
                                <p>Con las casillas intermedias libres, la dama blanca juega <strong>Da4+</strong>: da jaque al rey de e8 por la diagonal a4-e8 y, al mismo tiempo, ataca un alfil negro sin defensa en h4 por la fila 4. Las negras deben atender el jaque y pierden el alfil.</p>
                            </details>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h9"/><path d="M17 6l-6 6 6 6"/><circle cx="20" cy="12" r="1.4" fill="currentColor" stroke="none"/></svg>
                            </div>
                            <h3>Ataque descubierto</h3>
                            <p>Una pieza se mueve y "descubre" el ataque de otra pieza que estaba detrás de ella, generando una amenaza que el rival no ve venir en la pieza que se movió.</p>
                            <details class="card-example">
                                <summary>Ver ejemplo</summary>
                                <p>Una torre blanca en d1 tiene delante a su propio alfil en d3, y más adelante, en la misma columna, está la dama negra en d7. Si el alfil se mueve con una amenaza propia (por ejemplo, atacando una torre), la torre de d1 queda atacando a la dama: el rival no puede resolver las dos amenazas a la vez.</p>
                            </details>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4l3 3"/><path d="M11 4h9v9"/><path d="M20 4 9 15"/><circle cx="6" cy="18" r="3"/></svg>
                            </div>
                            <h3>Jaque descubierto</h3>
                            <p>Un caso particular del ataque descubierto: al mover una pieza, queda expuesto un jaque directo al rey rival. Es uno de los recursos tácticos más fuertes que existen.</p>
                            <details class="card-example">
                                <summary>Ver ejemplo</summary>
                                <p>Es lo que ocurre en la <a href="aperturas.php#trampas">trampa de la Petrov</a>: la dama blanca está en e2, el caballo en e5 y el rey negro en e8. El caballo salta a c6 (<strong>Cc6+</strong>), la dama da jaque por la columna e y el caballo ataca la dama negra de d8. Las negras deben salvar al rey y pierden la dama.</p>
                            </details>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h9"/><path d="M11 6l6 6-6 6"/></svg>
                            </div>
                            <h3>Desviación</h3>
                            <p>Se obliga a una pieza defensora a abandonar la casilla o la línea que protegía, generalmente con una amenaza mayor que no puede ignorar.</p>
                            <details class="card-example">
                                <summary>Ver ejemplo</summary>
                                <p>El rey negro está en g8, encerrado por sus peones de f7, g7 y h7, y la única pieza que defiende la fila 8 es su dama en d8. Las blancas tienen una torre en e1 con la columna libre. Si una jugada blanca obliga a la dama a salir de la fila 8 (por ejemplo, atacándola), llega <strong>Te8#</strong>, el clásico mate del pasillo.</p>
                            </details>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20V10"/><path d="M7 15l5 5 5-5"/><circle cx="12" cy="6" r="2.4"/></svg>
                            </div>
                            <h3>Atracción</h3>
                            <p>Lo opuesto a la desviación: se atrae a una pieza (a menudo el rey) hacia una casilla desfavorable, normalmente con un sacrificio, para explotarla justo después.</p>
                            <details class="card-example">
                                <summary>Ver ejemplo</summary>
                                <p>El sacrificio clásico <strong>Axh7+</strong> (el "regalo griego"): si el rey negro captura (Rxh7), queda atraído a una casilla expuesta y llegan Cg5+ y la dama a h5 con un ataque muy fuerte. Funciona cuando las negras enrocaron corto y no tienen un caballo en f6 que defienda h7.</p>
                            </details>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16M4 12h16M4 18h10"/><path d="M18 16l3 3-3 3" stroke-width="1.4"/></svg>
                            </div>
                            <h3>Eliminación del defensor</h3>
                            <p>Se captura o se elimina, mediante un intercambio favorable, a la pieza que estaba defendiendo un punto clave, dejando ese punto disponible para atacarlo.</p>
                            <details class="card-example">
                                <summary>Ver ejemplo</summary>
                                <p>Un caballo negro en f6 es la única pieza que defiende h7, y la dama blanca apunta a esa casilla. Las blancas cambian ese caballo (por ejemplo, con un alfil: Axf6) y, sin su defensor, la dama da mate en h7.</p>
                            </details>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.5"/><path d="M8.5 9.5h3M8.5 14.5h7M12.5 9.5v9"/></svg>
                            </div>
                            <h3>Sobrecarga</h3>
                            <p>Una pieza tiene que defender dos cosas importantes a la vez. Si se la obliga a ocuparse de una, la otra queda desprotegida.</p>
                            <details class="card-example">
                                <summary>Ver ejemplo</summary>
                                <p>La dama negra defiende a la vez una torre en e8 y la casilla g7, donde las blancas amenazan mate. Si las blancas capturan la torre de e8 con jaque, la dama no puede recapturar sin abandonar g7, y tampoco puede quedarse defendiendo g7 sin perder la torre.</p>
                            </details>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h6M14 12h6"/><rect x="9" y="9" width="6" height="6" rx="1"/></svg>
                            </div>
                            <h3>Interferencia</h3>
                            <p>Se coloca una pieza propia entre dos piezas rivales que se defendían o se comunicaban entre sí, cortando esa conexión.</p>
                            <details class="card-example">
                                <summary>Ver ejemplo</summary>
                                <p>Dos torres negras se defienden entre sí sobre la fila 8 (por ejemplo, en c8 y f8). Las blancas colocan una pieza en una casilla intermedia (d8 o e8), a menudo con jaque o con una amenaza, y cortan la conexión: ahora una de las torres queda sin defensa.</p>
                            </details>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v6M12 15v6M4.2 7l5.2 3M14.6 14l5.2 3M4.2 17l5.2-3M14.6 10l5.2-3"/></svg>
                            </div>
                            <h3>Sacrificio táctico</h3>
                            <p>Entregar material deliberadamente a cambio de una ventaja mayor: un ataque decisivo, la exposición del rey rival o una combinación que termina en jaque mate.</p>
                            <details class="card-example">
                                <summary>Ver ejemplo</summary>
                                <p>El ejemplo más famoso es la <a href="partidas.php">Partida Inmortal</a> (1851): Anderssen entregó las dos torres, un alfil y la dama, y aun así dio jaque mate con las tres piezas menores que le quedaban. El sacrificio solo vale si se calculó lo que viene después.</p>
                            </details>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h4M16 12h4"/><path d="M12 5v14"/><path d="M9 8l3-3 3 3"/></svg>
                            </div>
                            <h3>Jugada intermedia</h3>
                            <p>En lugar de hacer la jugada "obligada" (por ejemplo, recapturar), se intercala antes otra más fuerte, casi siempre un jaque o una amenaza que el rival debe atender. Recién después se hace la jugada esperada.</p>
                            <details class="card-example">
                                <summary>Ver ejemplo</summary>
                                <p>En la <a href="aperturas.php#trampas">Trampa del Elefante</a>, las blancas capturan la dama negra con 7.Axd8 y esperan que las negras recapturen. Pero las negras intercalan <strong>7...Ab4+</strong>: el jaque obliga a las blancas a tapar con la dama (8.Dd2), las negras la capturan (8...Axd2+ 9.Rxd2) y recién después capturan con el rey el alfil de d8 (9...Rxd8). Terminan con una pieza de más.</p>
                            </details>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section" id="patrones-de-mate">
                    <div class="section-heading">
                        <h2>Patrones de mate</h2>
                        <p>Muchas combinaciones terminan siempre con las mismas figuras. Reconocerlas permite ver el mate varias jugadas antes.</p>
                    </div>

                    <div class="card-grid">
                        <div class="card">
                            <h3>Mate del pasillo</h3>
                            <p>El rey está en su primera fila, encerrado por sus propios peones (por ejemplo, rey en g8 con peones en f7, g7 y h7). Una torre o la dama entra en esa fila y da mate, porque el rey no tiene adónde escapar.</p>
                            <p class="card-note"><strong>Cómo evitarlo:</strong> abrir una "ventana" con un peón (h6 o g6) o mantener una pieza defendiendo la última fila.</p>
                        </div>
                        <div class="card">
                            <h3>Mate de la coz</h3>
                            <p>Un caballo da mate a un rey rodeado de sus propias piezas. El ejemplo clásico: rey negro en h8, torre en f8 y peones en g7 y h7. La dama blanca se sacrifica en g8 con jaque, la torre la captura y el caballo da mate en f7.</p>
                            <p class="card-note"><strong>Cómo reconocerlo:</strong> el rey en una esquina, sin casillas libres alrededor, y un caballo que puede darle jaque.</p>
                        </div>
                        <div class="card">
                            <h3>Mate de Anastasia</h3>
                            <p>Un caballo en e7 cubre las casillas g8 y g6, y una torre o la dama da mate al rey negro en h7 por la columna h, con el peón de g7 bloqueando la última salida. Su nombre viene de una novela alemana de 1803.</p>
                            <p class="card-note"><strong>Cómo reconocerlo:</strong> rey en h7 o h8, columna h abierta y un caballo que llega a e7.</p>
                        </div>
                        <div class="card">
                            <h3>Mate de Boden</h3>
                            <p>Dos alfiles en diagonales que se cruzan dan mate a un rey enrocado largo. Por ejemplo, rey negro en c8 con su torre en d8 y otra pieza en d7: un alfil da jaque desde a6 (y cubre b7) y el otro, desde f4, controla c7 y b8. Lleva el nombre de Samuel Boden, que lo jugó en 1853.</p>
                            <p class="card-note"><strong>Cómo reconocerlo:</strong> rey en el flanco de dama, rodeado de piezas propias, y dos diagonales abiertas que apuntan hacia él.</p>
                        </div>
                        <div class="card">
                            <h3>Mate del beso</h3>
                            <p>La dama se coloca justo al lado del rey rival, defendida por otra pieza, de modo que el rey no puede capturarla. Por ejemplo, dama en g7 apoyada por un alfil en la gran diagonal o por un peón en f6.</p>
                            <p class="card-note"><strong>Cómo reconocerlo:</strong> la dama puede llegar a una casilla vecina del rey y otra pieza la protege allí.</p>
                        </div>
                        <div class="card">
                            <h3>Mate de la escalera</h3>
                            <p>Dos torres (o torre y dama) se turnan para dar jaque fila por fila: una corta el paso al rey mientras la otra da jaque en la fila siguiente, hasta llevarlo al borde del tablero y dar mate.</p>
                            <p class="card-note"><strong>Cómo reconocerlo:</strong> dos piezas pesadas contra un rey sin defensores. Lo explicamos paso a paso en <a href="finales.php#mates-basicos">Finales</a>.</p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>¿Cómo encontrar una táctica?</h2>
                        <p>Un método sencillo para entrenar el ojo táctico en cualquier posición.</p>
                    </div>

                    <div class="simple-panel">
                        <ol>
                            <li><strong>Buscar jaques.</strong> Antes que nada, revisa si tienes algún jaque disponible, aunque parezca que no lleva a nada: a veces abre líneas insospechadas.</li>
                            <li><strong>Buscar capturas.</strong> Repasa todas las piezas rivales que puedas capturar y evalúa si alguna está mal defendida.</li>
                            <li><strong>Buscar amenazas.</strong> Piensa qué jugada le complicaría más la vida a tu rival, aunque no capture nada de inmediato.</li>
                            <li><strong>Revisar piezas indefensas.</strong> Observa si el rival dejó alguna pieza sin protección, propia o ajena, que puedas aprovechar.</li>
                            <li><strong>Analizar las respuestas posibles del rival.</strong> Antes de jugar, pregúntate cómo puede responder tu oponente y si esa respuesta arruina tu plan.</li>
                        </ol>
                        <p>
                            Practicar este orden en cada jugada, de forma consciente, es la manera más simple
                            de entrenar la vista táctica hasta que se vuelva automática.
                        </p>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
