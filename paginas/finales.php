<?php
/**
 * finales.php
 * Página migrada desde paginas/finales.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 */

$titulo_pagina    = "Finales - El Arte del Jaque";
$meta_descripcion = "El rey como pieza activa, el jaque, el jaque mate y el empate: todo sobre el final de la partida.";
$pagina_actual    = "finales";
$header_titulo    = "Finales";
$header_tagline   = "La fase técnica y decisiva";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Finales</span>
                    <h1>La fase decisiva</h1>
                    <p>Cuando pocas piezas quedan en el tablero, el cálculo exacto sustituye a la intuición.</p>
                </div>

                <section class="page-section">
                    <div class="content-block">
                        <div class="content-media">
                            <img src="../img/pexels-131616.jpg" alt="Finales de ajedrez">
                        </div>
                        <div>
                            <h2>Finales de Juego</h2>
                            <p>
                                Cuando el humo de la batalla se disipa y quedan pocas piezas, entramos en la fase
                                técnica del ajedrez. En el final, el cálculo exacto sustituye a la intuición. Es el momento
                                donde los peones sueñan con coronarse y el Rey, antes protegido, abandona su refugio para
                                convertirse en una pieza de ataque activa y fundamental para decidir la victoria.
                            </p>
                        </div>
                    </div>

                    <div class="content-block reverse">
                        <div class="content-media">
                            <img src="../img/pexels-131615.jpg" alt="El rey como pieza atacante">
                        </div>
                        <div>
                            <h2>El Rey Como Atacante</h2>
                            <p>
                                A diferencia del inicio, en el final el Rey es una pieza ofensiva. Su objetivo es
                                escoltar a sus propios peones hacia la promoción o atacar los peones débiles
                                del oponente. Un Rey centralizado y activo suele ser la diferencia entre una
                                victoria y un empate.
                            </p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Cómo termina una partida</h2>
                    </div>

                    <div class="content-block">
                        <div class="content-media">
                            <img src="../img/pexels-37707936.jpg" alt="El jaque">
                        </div>
                        <div>
                            <h2>Jaque</h2>
                            <p>
                                El Jaque es una advertencia. Ocurre cuando el Rey está bajo el ataque inmediato
                                de una o más piezas enemigas. En este estado, el jugador está obligado a realizar
                                una acción para poner a salvo a su monarca: capturar la pieza atacante, interponer
                                una pieza propia o mover el Rey a una casilla segura.
                            </p>
                        </div>
                    </div>

                    <div class="content-block reverse">
                        <div class="content-media">
                            <img src="../img/pexels-139392.jpg" alt="El jaque mate">
                        </div>
                        <div>
                            <h2>Jaque Mate</h2>
                            <p>
                                Es el objetivo máximo del ajedrez. Se produce cuando el Rey está en jaque y no
                                existe ninguna jugada legal para escapar de la amenaza. En el momento en que se
                                logra el Jaque Mate, la partida termina instantáneamente, declarando como ganador
                                al bando que ha acorralado al Rey rival.
                            </p>
                        </div>
                    </div>

                    <div class="content-block">
                        <div class="content-media">
                            <img src="../img/pexels-1762815.jpg" alt="El empate o tablas">
                        </div>
                        <div>
                            <h2>Empate</h2>
                            <p>
                                No siempre hay un ganador. Las "Tablas" pueden ocurrir por varias razones:
                                insuficiencia de piezas para dar mate, la regla de los 50 movimientos, triple
                                repetición de posición o, el más común, el Ahogado (cuando un jugador no tiene
                                jugadas legales pero su Rey no está en jaque). Es el arte de resistir hasta el final.
                            </p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Conceptos técnicos del final</h2>
                        <p>Las ideas que permiten convertir una ventaja mínima en victoria.</p>
                    </div>

                    <div class="topic-grid">
                        <div class="card">
                            <h3>Rey y peón contra rey</h3>
                            <p>El final más básico de todos. Saber si el peón puede coronar o no depende de la posición de ambos reyes, no solo del peón.</p>
                        </div>
                        <div class="card">
                            <h3>Oposición</h3>
                            <p>Cuando los dos reyes se enfrentan separados por una casilla, el jugador que no debe mover tiene la oposición, una ventaja clave en estos finales.</p>
                        </div>
                        <div class="card">
                            <h3>Regla del cuadrado</h3>
                            <p>Truco visual rápido para saber si el rey rival puede alcanzar a un peón pasado antes de que corone, sin necesidad de calcular jugada por jugada.</p>
                        </div>
                        <div class="card">
                            <h3>Promoción</h3>
                            <p>El objetivo de casi todo final de peones: llevar un peón hasta la última fila para convertirlo en dama u otra pieza.</p>
                        </div>
                        <div class="card">
                            <h3>Peones pasados</h3>
                            <p>Un peón sin rivales que lo detengan es el recurso más valioso en muchos finales, ya que amenaza con coronar en cualquier momento.</p>
                        </div>
                        <div class="card">
                            <h3>Finales de torres</h3>
                            <p>Los más frecuentes en la práctica. La actividad de la torre suele importar más que la cantidad exacta de peones.</p>
                        </div>
                        <div class="card">
                            <h3>Finales de piezas menores</h3>
                            <p>Finales con alfiles y/o caballos, donde la estructura de peones y la actividad del rey son determinantes.</p>
                        </div>
                        <div class="card">
                            <h3>Conceptos básicos de mate</h3>
                            <p>Dar mate con rey y dama, o con rey y torre, contra el rey solitario, son patrones esenciales que todo jugador debería dominar de memoria. Los explicamos <a href="#mates-basicos" style="color: var(--gold);">paso a paso más abajo</a>.</p>
                        </div>
                        <div class="card">
                            <h3>Triangulación</h3>
                            <p>Maniobra del rey en tres casillas que forman un triángulo para "perder" un tiempo: se vuelve a la misma posición, pero con el turno del rival. Sirve para ganar la oposición.</p>
                        </div>
                        <div class="card">
                            <h3>Fortaleza</h3>
                            <p>Una posición defensiva que el bando con ventaja de material no puede romper. Reconocerla permite salvar finales que parecen perdidos.</p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section" id="mates-basicos">
                    <div class="section-heading">
                        <h2>Mates básicos paso a paso</h2>
                        <p>Con mucha ventaja de material hay que saber terminar la partida. Estos tres mates contra el rey solo son la base de toda técnica de finales.</p>
                    </div>

                    <div class="simple-panel">
                        <h2>Rey y dama contra rey</h2>
                        <p>El más fácil, pero con una trampa: el <strong>ahogado</strong>. Si el rey rival no tiene jugadas legales y no está en jaque, la partida termina en tablas.</p>
                        <ol>
                            <li><strong>Encierra al rey en una "caja".</strong> Ubica la dama a salto de caballo del rey rival: así le quita muchas casillas sin darle jaque.</li>
                            <li><strong>Achica la caja.</strong> Cada vez que el rey rival se mueva, mueve la dama para mantener esa distancia de caballo. El rey queda cada vez más cerca del borde.</li>
                            <li><strong>Cuando llegue al borde, frena la dama.</strong> Deja de acercarla: ahora es el turno de tu rey.</li>
                            <li><strong>Acerca tu rey</strong> hasta que defienda una casilla vecina al rey rival.</li>
                            <li><strong>Da el mate</strong> con la dama en la fila del borde o justo delante del rey rival, protegida por tu rey.</li>
                        </ol>
                        <p><strong>Antes de cada jugada:</strong> comprueba que el rey rival tenga al menos una jugada legal. Si no la tiene y no está en jaque, es ahogado.</p>
                    </div>

                    <div class="simple-panel">
                        <h2>Rey y torre contra rey</h2>
                        <p>Requiere la colaboración del rey: la torre sola no puede dar mate.</p>
                        <ol>
                            <li><strong>Corta al rey con la torre.</strong> Ubica la torre en una fila o columna que divida el tablero y deje al rey rival del lado más chico.</li>
                            <li><strong>Lleva tu rey enfrente del rey rival</strong>, en la misma columna (o fila) y con una casilla entre ambos: es la <em>oposición</em>.</li>
                            <li><strong>Da jaque con la torre</strong> cuando los reyes estén en oposición: el rey rival tiene que retroceder una fila.</li>
                            <li><strong>Si el rey rival se aleja hacia un costado,</strong> síguelo con tu rey o haz una jugada de espera con la torre, sin perder el corte.</li>
                            <li><strong>Repite</strong> hasta llevarlo al borde: el jaque final con los reyes en oposición es mate.</li>
                        </ol>
                    </div>

                    <div class="simple-panel">
                        <h2>Dos torres contra rey (mate de la escalera)</h2>
                        <p>No hace falta el rey: las dos torres trabajan juntas.</p>
                        <ol>
                            <li><strong>Una torre corta</strong> una fila para que el rey rival no pueda volver atrás.</li>
                            <li><strong>La otra da jaque</strong> en la fila siguiente, empujando al rey hacia el borde.</li>
                            <li><strong>Se turnan</strong>, fila por fila, como subiendo una escalera, hasta que el jaque se da en la última fila: es mate.</li>
                        </ol>
                        <p><strong>Cuidado:</strong> si el rey rival se acerca a una torre para atacarla, llévala al otro extremo de la misma fila, lejos del rey, y sigue con el método.</p>
                    </div>
                </section>

                <hr>

                <section class="page-section" id="finales-teoricos">
                    <div class="section-heading">
                        <h2>Finales teóricos que todo jugador debe conocer</h2>
                        <p>Los finales de torre son los más frecuentes en la práctica. Estas dos posiciones son la base para jugarlos bien.</p>
                    </div>

                    <div class="content-block">
                        <div>
                            <h2>Posición de Lucena (cómo ganar)</h2>
                            <p>
                                Torre y peón contra torre. El peón está en la séptima fila, el rey del bando fuerte está
                                delante de él, en la casilla de coronación, y el rey rival está cortado al menos a una
                                columna de distancia.
                            </p>
                            <p>
                                El método ganador se llama <strong>"construir un puente"</strong>: se lleva la torre a la
                                cuarta fila, se saca el rey de delante del peón y, cuando la torre rival da jaques desde
                                el costado, se interpone la torre propia para cortarlos. El peón corona.
                            </p>
                            <p>Lleva el nombre de Luis Ramírez de Lucena (siglo XV), aunque curiosamente la posición no aparece en su libro.</p>
                        </div>
                        <div>
                            <h2>Posición de Philidor (cómo defender)</h2>
                            <p>
                                Torre y peón contra torre, con el rey defensor delante del peón. La defensa consiste en
                                dos pasos:
                            </p>
                            <ol>
                                <li>Ubicar la torre en la <strong>tercera fila propia</strong>, para que el rey rival no pueda avanzar.</li>
                                <li>Cuando el peón avance a esa fila, llevar la torre a la <strong>última fila</strong> y dar jaques desde atrás: el rey rival ya no tiene dónde esconderse.</li>
                            </ol>
                            <p>Fue analizada por François-André Danican Philidor en 1777 y asegura las tablas.</p>
                        </div>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
