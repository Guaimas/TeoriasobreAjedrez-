<?php
/**
 * recursos.php
 * Página migrada desde paginas/recursos.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 */

$titulo_pagina    = "Recursos - El Arte del Jaque";
$meta_descripcion = "Libros, plataformas y herramientas recomendadas para seguir aprendiendo y practicando ajedrez.";
$pagina_actual    = "recursos";
$header_titulo    = "Recursos";
$header_tagline   = "Para seguir aprendiendo";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Recursos</span>
                    <h1>Sigue aprendiendo</h1>
                    <p>Una selección de libros, plataformas y herramientas para continuar tu formación más allá de este sitio.</p>
                </div>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Libros</h2>
                        <p>Clásicos recomendados según lo que quieras mejorar.</p>
                    </div>
                    <div class="card-grid">
                        <div class="card">
                            <span class="pill">Principiantes</span>
                            <h3>Bobby Fischer Enseña Ajedrez</h3>
                            <p>Un curso progresivo en forma de preguntas y respuestas, pensado para aprender tácticas básicas y mates elementales desde cero.</p>
                        </div>
                        <div class="card">
                            <span class="pill">Táctica</span>
                            <h3>1001 Combinaciones Ganadoras</h3>
                            <p>De Fred Reinfeld. Una colección enorme de ejercicios tácticos cortos, ideal para entrenar la vista de combinación de forma constante.</p>
                        </div>
                        <div class="card">
                            <span class="pill">Estrategia</span>
                            <h3>Mi Sistema</h3>
                            <p>De Aron Nimzowitsch. Un clásico que explica de forma ordenada conceptos como el bloqueo, la casilla débil o los peones pasados.</p>
                        </div>
                        <div class="card">
                            <span class="pill">Finales</span>
                            <h3>Manual de Finales de Ajedrez</h3>
                            <p>De Mark Dvoretsky. Referencia exigente pero completa sobre finales de reyes, peones, torres y piezas menores.</p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Jugar</h2>
                        <p>Plataformas para poner en práctica lo aprendido contra otras personas.</p>
                    </div>
                    <div class="card-grid">
                        <div class="card">
                            <h3>Chess.com</h3>
                            <p>Una de las plataformas más grandes del mundo para jugar partidas online, con salas para todos los niveles.</p>
                            <a href="https://www.chess.com" target="_blank" rel="noopener" class="card-link">chess.com
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                        <div class="card">
                            <h3>Lichess</h3>
                            <p>Plataforma gratuita y de código abierto para jugar partidas en vivo, sin publicidad ni límites de uso.</p>
                            <a href="https://lichess.org" target="_blank" rel="noopener" class="card-link">lichess.org
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Practicar</h2>
                        <p>Ejercicios y puzzles para entrenar la vista táctica.</p>
                    </div>
                    <div class="card-grid">
                        <div class="card">
                            <h3>Puzzles de Lichess</h3>
                            <p>Miles de ejercicios tácticos gratuitos, adaptados automáticamente a tu nivel de juego.</p>
                            <a href="https://lichess.org/training" target="_blank" rel="noopener" class="card-link">lichess.org/training
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                        <div class="card">
                            <h3>Puzzles de Chess.com</h3>
                            <p>Ejercicios tácticos diarios y por temas (clavadas, horquillas, ataques descubiertos, entre otros).</p>
                            <a href="https://www.chess.com/puzzles" target="_blank" rel="noopener" class="card-link">chess.com/puzzles
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Estudiar</h2>
                        <p>Lecciones guiadas sobre teoría, aperturas, estrategia y finales.</p>
                    </div>
                    <div class="card-grid">
                        <div class="card">
                            <h3>Lichess Learn</h3>
                            <p>Lecciones interactivas gratuitas, desde el movimiento de las piezas hasta conceptos estratégicos.</p>
                            <a href="https://lichess.org/learn" target="_blank" rel="noopener" class="card-link">lichess.org/learn
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                        <div class="card">
                            <h3>Chess.com Lessons</h3>
                            <p>Cursos estructurados por nivel, con explicaciones en video y ejercicios de aperturas, estrategia y finales.</p>
                            <a href="https://www.chess.com/lessons" target="_blank" rel="noopener" class="card-link">chess.com/lessons
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Analizar partidas</h2>
                        <p>Herramientas para revisar tus propias partidas y entender tus errores.</p>
                    </div>
                    <div class="card-grid">
                        <div class="card">
                            <h3>Tablero de análisis de Lichess</h3>
                            <p>Permite cargar cualquier partida y analizarla con un motor de ajedrez gratuito, señalando los errores e imprecisiones.</p>
                            <a href="https://lichess.org/analysis" target="_blank" rel="noopener" class="card-link">lichess.org/analysis
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                        <div class="card">
                            <h3>Análisis de partidas en Chess.com</h3>
                            <p>Revisión automática de partidas jugadas en la plataforma, con clasificación de jugadas y sugerencias del motor.</p>
                            <a href="https://www.chess.com/analysis" target="_blank" rel="noopener" class="card-link">chess.com/analysis
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
