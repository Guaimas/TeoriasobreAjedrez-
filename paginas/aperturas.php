<?php
/**
 * aperturas.php
 * Página migrada desde paginas/aperturas.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 */

$titulo_pagina    = "Aperturas - El Arte del Jaque";
$meta_descripcion = "Descubre las aperturas del ajedrez, incluyendo la clásica Apertura Italiana.";
$pagina_actual    = "aperturas";
$header_titulo    = "Aperturas";
$header_tagline   = "El comienzo de toda partida";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Aperturas</span>
                    <h1>El comienzo de la partida</h1>
                    <p>La base de toda partida: desarrollo de piezas, control del centro y preparación.</p>
                </div>

                <section class="page-section">
                    <div class="simple-panel">
                        <p>
                            Las aperturas en el ajedrez son la base de toda partida. En esta fase inicial se
                            desarrollan las piezas, se controla el centro y se prepara la estrategia. Conocer
                            distintas aperturas te permitirá jugar con mayor seguridad y tomar ventaja desde el comienzo.
                        </p>
                    </div>

                    <div class="section-heading">
                        <h2>Principios de la apertura</h2>
                        <p>Antes de memorizar variantes, conviene entender qué se busca en esta fase de la partida.</p>
                    </div>

                    <div class="topic-grid">
                        <div class="card">
                            <h3>Objetivo</h3>
                            <p>Desarrollar las piezas, proteger al rey y quedar en la mejor posición posible antes del medio juego.</p>
                        </div>
                        <div class="card">
                            <h3>Control del centro</h3>
                            <p>Ocupar o influir sobre las casillas centrales (d4, d5, e4, e5) le da a las piezas más movilidad.</p>
                        </div>
                        <div class="card">
                            <h3>Desarrollo de piezas</h3>
                            <p>Sacar caballos y alfiles de sus casillas iniciales cuanto antes, antes de mover la dama o repetir jugadas.</p>
                        </div>
                        <div class="card">
                            <h3>Seguridad del rey</h3>
                            <p>Enrocar pronto para poner al rey a resguardo y conectar las torres.</p>
                        </div>
                        <div class="card">
                            <h3>No repetir pieza</h3>
                            <p>Evita mover la misma pieza varias veces en la apertura; cada jugada debería sumar desarrollo.</p>
                        </div>
                        <div class="card">
                            <h3>Cuidado con la dama</h3>
                            <p>Sacarla demasiado pronto la expone a ataques de piezas menores, perdiendo tiempo.</p>
                        </div>
                        <div class="card">
                            <h3>Conectar las torres</h3>
                            <p>Cuando ya no hay piezas entre las torres, quedan conectadas y listas para ocupar columnas abiertas.</p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Aperturas más conocidas</h2>
                    </div>

                    <div class="simple-panel">
                        <h2>Apertura Italiana</h2>
                        <p>
                            La Apertura Italiana es una de las formas más antiguas y clásicas de empezar una partida de
                            ajedrez. Surge en el siglo XVI en Italia, donde maestros como Gioachino Greco la estudiaron y
                            difundieron. En esa época, el ajedrez era más agresivo, y esta apertura encajaba perfecto con
                            ese estilo.
                        </p>
                    </div>

                    <div class="carousel-block">
                        <button class="nav-arrow" disabled aria-label="Anterior"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M15 5l-7 7 7 7"/></svg></button>
                        <div class="content-media">
                            <img src="https://images.pexels.com/photos/6114949/pexels-photo-6114949.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Apertura Italiana">
                        </div>
                        <div>
                            <p>
                                La Apertura Italiana comienza con una idea muy clara: desarrollar rápido las piezas
                                y presionar el punto f7 del rival.
                            </p>
                            <div class="move-list">
                                <ol>
                                    <li>e4 e5</li>
                                    <li>Cf3 Cc6</li>
                                    <li>Ac4</li>
                                </ol>
                            </div>
                            <p>Con estos tres movimientos ya estás dentro de la Apertura Italiana.</p>
                            <ul>
                                <li>e4: ocupás el centro y abrís líneas para tu dama y alfil</li>
                                <li>Cf3: desarrollás una pieza y atacás el peón e5</li>
                                <li>Ac4: apuntás directamente a f7</li>
                            </ul>
                        </div>
                        <button class="nav-arrow" disabled aria-label="Siguiente"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5l7 7-7 7"/></svg></button>
                    </div>

                    <div class="simple-panel">
                        <h2>Apertura Española (Ruy López)</h2>
                        <p>
                            Una de las aperturas más estudiadas y respetadas de la historia, popular en todos
                            los niveles, desde principiantes hasta campeones mundiales.
                        </p>
                        <div class="move-list">
                            <ol>
                                <li>e4 e5</li>
                                <li>Cf3 Cc6</li>
                                <li>Ab5</li>
                            </ol>
                        </div>
                        <p>El alfil en b5 presiona indirectamente al caballo que defiende el peón e5, generando presión posicional a largo plazo en lugar de un ataque inmediato.</p>
                        <p><strong>Conceptos que enseña:</strong> presión posicional sostenida, juego paciente y la importancia de una pieza bien colocada aunque no ataque de forma directa.</p>
                    </div>

                    <div class="simple-panel">
                        <h2>Defensa Siciliana</h2>
                        <p>
                            La respuesta más popular y combativa contra 1.e4. En vez de responder de forma
                            simétrica, las negras luchan por el centro desde el flanco.
                        </p>
                        <div class="move-list">
                            <ol>
                                <li>e4 c5</li>
                            </ol>
                        </div>
                        <p>Al jugar c5 en vez de e5, las negras evitan la simetría y buscan un juego desequilibrado, con posibilidades de contraataque en el flanco de dama.</p>
                        <p><strong>Conceptos que enseña:</strong> juego asimétrico, lucha por el centro sin ocuparlo directamente y la importancia de las columnas semiabiertas.</p>
                    </div>

                    <div class="simple-panel">
                        <h2>Defensa Francesa</h2>
                        <p>
                            Una apertura sólida y algo cerrada, en la que las negras aceptan un poco menos de
                            espacio a cambio de una estructura de peones muy resistente.
                        </p>
                        <div class="move-list">
                            <ol>
                                <li>e4 e6</li>
                            </ol>
                        </div>
                        <p>El peón en e6 prepara d5, desafiando el centro blanco. Suele generar cadenas de peones y partidas donde entender la estructura es más importante que la memorización.</p>
                        <p><strong>Conceptos que enseña:</strong> cadenas de peones, juego posicional cerrado y la importancia de saber cuándo abrir o mantener cerrada la posición.</p>
                    </div>

                    <div class="simple-panel">
                        <h2>Gambito de Dama</h2>
                        <p>
                            Una de las aperturas más antiguas y respetadas, en la que las blancas ofrecen un
                            peón para lograr un control superior del centro.
                        </p>
                        <div class="move-list">
                            <ol>
                                <li>d4 d5</li>
                                <li>c4</li>
                            </ol>
                        </div>
                        <p>Si las negras capturan en c4, las blancas suelen recuperar el peón poco después gracias a su fuerte control central. No es un sacrificio real, sino una forma de ganar tiempo y espacio.</p>
                        <p><strong>Conceptos que enseña:</strong> control central con peones, el concepto de gambito y cómo el material temporal puede traducirse en ventaja posicional.</p>
                    </div>

                    <div class="simple-panel">
                        <h2>Defensa Caro-Kann</h2>
                        <p>
                            Una defensa sólida contra 1.e4, muy apreciada por jugadores que prefieren
                            posiciones seguras y sin demasiados riesgos.
                        </p>
                        <div class="move-list">
                            <ol>
                                <li>e4 c6</li>
                            </ol>
                        </div>
                        <p>El peón en c6 prepara d5 sin debilitar la estructura de peones como ocurre en otras defensas, ofreciendo una posición sólida y fácil de comprender.</p>
                        <p><strong>Conceptos que enseña:</strong> solidez estructural, cómo desafiar el centro sin asumir riesgos excesivos y la importancia de una buena estructura de peones a largo plazo.</p>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
