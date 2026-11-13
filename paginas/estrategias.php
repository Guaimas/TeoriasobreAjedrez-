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
                            <img src="../img/pexels-27098300.jpg" alt="El medio juego en ajedrez">
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

                    <div class="content-block reverse">
                        <div class="content-media">
                            <img src="../img/pexels-13761311.jpg" alt="La batería en ajedrez">
                        </div>
                        <div>
                            <h2>La batería</h2>
                            <p>
                                Se crea al colocar dos o más piezas que se mueven de forma idéntica (como dos Torres,
                                o Dama y Alfil) en la misma fila, columna o diagonal. Es como un cañón cargado: aumenta
                                drásticamente la presión sobre un punto específico de la defensa enemiga, forzando concesiones.
                            </p>
                        </div>
                    </div>

                    <div class="simple-panel">
                        <div>
                            <h2>Estrategia vs. táctica</h2>
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
                        <div class="card">
                            <h3>Puesto avanzado</h3>
                            <p>Una casilla en el campo rival, protegida por un peón propio, que ningún peón enemigo puede atacar. Un caballo instalado allí suele ser tan fuerte como una torre.</p>
                        </div>
                        <div class="card">
                            <h3>Profilaxis</h3>
                            <p>Antes de ejecutar tu plan, pregúntate qué quiere hacer el rival e impídelo. Aron Nimzowitsch la convirtió en una idea central del juego posicional.</p>
                        </div>
                        <div class="card">
                            <h3>Cuándo cambiar piezas</h3>
                            <p>Con ventaja de material conviene cambiar piezas (no peones) para simplificar. Si estás peor, evita los cambios y busca complicaciones.</p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section" id="estructuras-de-peones">
                    <div class="section-heading">
                        <h2>Estructuras de peones</h2>
                        <p>Los peones son las únicas piezas que no pueden retroceder: su ubicación define el plan de toda la partida. Cada estructura tiene ventajas y desventajas.</p>
                    </div>

                    <div class="card-grid">
                        <div class="card">
                            <h3>Peón aislado</h3>
                            <p>No tiene peones propios en las columnas vecinas, así que ningún peón puede defenderlo.</p>
                            <p class="card-note"><strong>Ventaja:</strong> deja columnas semiabiertas a sus lados y da espacio y actividad a las piezas.<br><strong>Desventaja:</strong> es un blanco fijo, y la casilla que tiene delante es un puesto ideal para una pieza rival.</p>
                        </div>
                        <div class="card">
                            <h3>Peones doblados</h3>
                            <p>Dos peones del mismo color en la misma columna, normalmente tras una captura.</p>
                            <p class="card-note"><strong>Ventaja:</strong> la captura que los dobló suele abrir una columna para las torres.<br><strong>Desventaja:</strong> no pueden protegerse entre sí y les cuesta avanzar; en un final valen menos que dos peones sanos.</p>
                        </div>
                        <div class="card">
                            <h3>Peón retrasado</h3>
                            <p>Quedó detrás de sus vecinos y no puede avanzar sin ser capturado, ni ser defendido por otros peones.</p>
                            <p class="card-note"><strong>Ventaja:</strong> a veces sostiene a los peones adelantados.<br><strong>Desventaja:</strong> está en una columna semiabierta para el rival, y la casilla que tiene delante queda débil.</p>
                        </div>
                        <div class="card">
                            <h3>Peones colgantes</h3>
                            <p>Dos peones juntos en las columnas c y d (en la cuarta fila), sin peones propios a los costados.</p>
                            <p class="card-note"><strong>Ventaja:</strong> controlan muchas casillas centrales y pueden avanzar con fuerza.<br><strong>Desventaja:</strong> si el rival los bloquea o los obliga a avanzar antes de tiempo, se vuelven débiles.</p>
                        </div>
                        <div class="card">
                            <h3>Cadena de peones</h3>
                            <p>Peones en diagonal que se protegen unos a otros, como en la <a href="aperturas.php#francesa" style="color: var(--gold);">Defensa Francesa</a>.</p>
                            <p class="card-note"><strong>Ventaja:</strong> es muy sólida y gana espacio.<br><strong>Desventaja:</strong> la "base" (el peón de atrás) no tiene defensa de peones; atacarla es el plan habitual del rival.</p>
                        </div>
                        <div class="card">
                            <h3>Mayoría de peones</h3>
                            <p>Tener más peones que el rival en un flanco del tablero.</p>
                            <p class="card-note"><strong>Ventaja:</strong> avanzándola se puede crear un peón pasado, muy valioso en el final.<br><strong>Plan típico:</strong> avanzar primero el peón que no tiene oponente en su columna.</p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section" id="piezas-buenas-y-malas">
                    <div class="section-heading">
                        <h2>Piezas buenas y piezas malas</h2>
                        <p>El valor de una pieza no es fijo: depende de la posición.</p>
                    </div>

                    <div class="content-block">
                        <div>
                            <h2>Alfil bueno y alfil malo</h2>
                            <p>
                                Un alfil es <strong>"malo"</strong> cuando sus propios peones centrales están en casillas
                                de su mismo color: le bloquean las diagonales y queda reducido a defenderlos. Es
                                <strong>"bueno"</strong> cuando los peones están en casillas del color contrario y sus
                                diagonales quedan libres.
                            </p>
                            <p>
                                Por eso, una regla práctica es ubicar los peones en casillas del color contrario al de tu
                                alfil, o cambiar el alfil malo por una pieza activa del rival.
                            </p>
                        </div>
                        <div>
                            <h2>Caballo contra alfil</h2>
                            <ul>
                                <li><strong>El caballo</strong> brilla en posiciones cerradas, con peones bloqueados, y cuando tiene un puesto avanzado. Es la única pieza que salta por encima de las demás.</li>
                                <li><strong>El alfil</strong> brilla en posiciones abiertas y en finales con peones en ambos flancos, porque llega lejos rápidamente.</li>
                                <li><strong>La pareja de alfiles</strong> suele ser una ventaja en posiciones abiertas: juntos controlan casillas de ambos colores.</li>
                            </ul>
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
