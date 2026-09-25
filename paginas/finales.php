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
                            <img src="https://images.pexels.com/photos/131616/pexels-photo-131616.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Finales de ajedrez">
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

                    <div class="carousel-block">
                        <button class="nav-arrow" disabled aria-label="Anterior"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M15 5l-7 7 7 7"/></svg></button>
                        <div class="content-media">
                            <img src="https://images.pexels.com/photos/131615/pexels-photo-131615.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="El rey como pieza atacante">
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
                        <button class="nav-arrow" disabled aria-label="Siguiente"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5l7 7-7 7"/></svg></button>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Cómo termina una partida</h2>
                    </div>

                    <div class="content-block">
                        <div class="content-media">
                            <img src="https://images.pexels.com/photos/37707936/pexels-photo-37707936.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="El jaque">
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
                            <img src="https://images.pexels.com/photos/139392/checkmate-chess-resignation-conflict-139392.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="El jaque mate">
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
                            <img src="https://images.pexels.com/photos/1762815/pexels-photo-1762815.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="El empate o tablas">
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
                            <p>Dar mate con rey y dama, o con rey y torre, contra el rey solitario, son patrones esenciales que todo jugador debería dominar de memoria.</p>
                        </div>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
