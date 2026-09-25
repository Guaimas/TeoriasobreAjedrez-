<?php
/**
 * estrategias.php
 * Página migrada desde paginas/estrategias.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 */

$titulo_pagina    = "Estrategias - El Arte del Jaque";
$meta_descripcion = "Aprende sobre el medio juego, la planificación estratégica y recursos como la batería de piezas.";
$pagina_actual    = "estrategias";
$header_titulo    = "Estrategias";
$header_tagline   = "El corazón de la partida";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Estrategias</span>
                    <h1>El medio juego</h1>
                    <p>Donde el cálculo táctico y la planificación a largo plazo se encuentran.</p>
                </div>

                <section class="page-section">
                    <div class="content-block">
                        <div class="content-media">
                            <img src="https://images.pexels.com/photos/27098300/pexels-photo-27098300.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="El medio juego en ajedrez">
                        </div>
                        <div>
                            <h2>Estrategia</h2>
                            <p>
                                El medio juego comienza cuando las piezas han salido de sus casillas iniciales
                                y el rey ha buscado refugio. Es el corazón de la partida, donde la estrategia pura y el
                                cálculo táctico se encuentran. Aquí no hay recetas fijas; es el momento de crear planes,
                                explotar debilidades y dominar el centro para inclinar la balanza a tu favor.
                            </p>
                        </div>
                    </div>

                    <div class="carousel-block">
                        <button class="nav-arrow" disabled aria-label="Anterior"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M15 5l-7 7 7 7"/></svg></button>
                        <div class="content-media">
                            <img src="https://images.pexels.com/photos/13761311/pexels-photo-13761311.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="La batería en ajedrez">
                        </div>
                        <div>
                            <h2>La Batería</h2>
                            <p>
                                Se crea al colocar dos o más piezas que se mueven de forma idéntica (como dos Torres,
                                o Dama y Alfil) en la misma fila, columna o diagonal. Es como un cañón cargado: aumenta
                                drásticamente la presión sobre un punto específico de la defensa enemiga, forzando concesiones.
                            </p>
                        </div>
                        <button class="nav-arrow" disabled aria-label="Siguiente"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5l7 7-7 7"/></svg></button>
                    </div>

                    <div class="content-block reverse">
                        <div>
                            <h2>Estrategia vs. Táctica</h2>
                            <p>
                                Conviene tener clara la diferencia entre ambos términos:
                            </p>
                            <ul>
                                <li><strong>Estrategia</strong> es el plan general: qué tipo de posición buscar, qué casillas controlar, hacia dónde dirigir la partida a mediano o largo plazo.</li>
                                <li><strong>Táctica</strong> es el cálculo concreto y forzado de unas pocas jugadas para aprovechar una oportunidad inmediata.</li>
                            </ul>
                            <p>
                                Una buena estrategia va creando, poco a poco, las condiciones para que
                                aparezcan oportunidades tácticas. Puedes ver los recursos tácticos en detalle
                                en la sección de <a href="tacticas.php" style="color: var(--gold);">Tácticas</a>.
                            </p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Conceptos estratégicos clave</h2>
                        <p>Las ideas que guían la toma de decisiones durante toda la partida.</p>
                    </div>

                    <div class="topic-grid">
                        <div class="card">
                            <h3>Control del centro</h3>
                            <p>Dominar las casillas centrales le da a las piezas más movilidad y opciones de ataque.</p>
                        </div>
                        <div class="card">
                            <h3>Desarrollo</h3>
                            <p>Tener las piezas activas y en juego, en lugar de quietas en sus casillas iniciales.</p>
                        </div>
                        <div class="card">
                            <h3>Estructura de peones</h3>
                            <p>La forma en que están ubicados los peones determina qué casillas quedan débiles o fuertes.</p>
                        </div>
                        <div class="card">
                            <h3>Columnas abiertas</h3>
                            <p>Las columnas sin peones son ideales para colocar torres y generar presión.</p>
                        </div>
                        <div class="card">
                            <h3>Casillas débiles</h3>
                            <p>Casillas que el rival ya no puede defender con peones, ideales como punto de apoyo.</p>
                        </div>
                        <div class="card">
                            <h3>Pareja de alfiles</h3>
                            <p>Conservar los dos alfiles suele ser una ventaja, ya que juntos controlan casillas de ambos colores.</p>
                        </div>
                        <div class="card">
                            <h3>Actividad de las piezas</h3>
                            <p>Una pieza activa, con muchas casillas disponibles, vale más que una pieza pasiva del mismo tipo.</p>
                        </div>
                        <div class="card">
                            <h3>Seguridad del rey</h3>
                            <p>Ninguna ventaja material o posicional sirve de mucho si el propio rey queda expuesto a un ataque.</p>
                        </div>
                        <div class="card">
                            <h3>Espacio</h3>
                            <p>Controlar más terreno le da a las propias piezas más libertad de movimiento y limita al rival.</p>
                        </div>
                        <div class="card">
                            <h3>Peones pasados</h3>
                            <p>Un peón sin rivales que puedan detenerlo es una amenaza constante de coronación.</p>
                        </div>
                        <div class="card">
                            <h3>Mejorar la peor pieza</h3>
                            <p>Cuando no hay un plan claro, buscar la pieza peor ubicada y encontrarle una casilla mejor suele ser un buen recurso.</p>
                        </div>
                        <div class="card">
                            <h3>Creación de planes</h3>
                            <p>Jugar con un objetivo concreto en mente, en lugar de mover piezas sin rumbo.</p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>¿Cómo crear un plan?</h2>
                        <p>Una guía sencilla para no quedarte sin ideas en medio de la partida.</p>
                    </div>

                    <div class="simple-panel">
                        <ol>
                            <li><strong>Evaluar la posición.</strong> Observa quién tiene más espacio, cómo están los peones y qué piezas están mejor colocadas.</li>
                            <li><strong>Identificar fortalezas y debilidades.</strong> Tanto propias como del rival: casillas débiles, piezas mal ubicadas, estructura de peones.</li>
                            <li><strong>Buscar un objetivo.</strong> Puede ser una casilla débil, una columna abierta o el propio rey rival.</li>
                            <li><strong>Determinar qué piezas deben participar.</strong> Piensa qué piezas necesitas reubicar o activar para cumplir el objetivo.</li>
                            <li><strong>Ejecutar el plan.</strong> Lleva adelante la idea de forma ordenada, jugada a jugada.</li>
                            <li><strong>Revisar la respuesta del rival.</strong> Ningún plan es fijo: ajústalo según lo que haga tu oponente en cada jugada.</li>
                        </ol>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
