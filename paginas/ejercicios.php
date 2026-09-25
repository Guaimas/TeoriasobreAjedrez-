<?php
/**
 * ejercicios.php
 * Página migrada desde paginas/ejercicios.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 */

$titulo_pagina    = "Ejercicios - El Arte del Jaque";
$meta_descripcion = "Pon a prueba tus habilidades enfrentándote a partidas de práctica.";
$pagina_actual    = "ejercicios";
$header_titulo    = "Ejercicios";
$header_tagline   = "Pon a prueba lo aprendido";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Ejercicios</span>
                    <h1>Práctica</h1>
                    <p>La teoría solo es el principio; el verdadero maestro se forja en el tablero.</p>
                </div>

                <section class="page-section">
                    <div class="content-block">
                        <div class="content-media">
                            <img src="https://images.pexels.com/photos/8438872/pexels-photo-8438872.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Tablero de práctica">
                        </div>
                        <div>
                            <h2>Practica</h2>
                            <p>
                                La teoría solo es el principio; el verdadero maestro se forja en el tablero. En este
                                apartado podrás enfrentarte a nuestra IA en partidas reales para consolidar lo aprendido
                                sobre aperturas, medio juego y finales. No te confíes: el sistema analizará tu juego y, con
                                cada victoria que consigas, el bot subirá su nivel de precisión, obligándote a perfeccionar
                                tu técnica constantemente.
                            </p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Fundamentos</h2>
                        <p>Ejercicios sobre reglas básicas y movimiento de piezas.</p>
                    </div>

                    <div class="exercise-card">
                        <span class="pill">Fundamentos</span>
                        <h3>Ejercicio 1</h3>
                        <p class="exercise-prompt">Tienes un caballo en e4. ¿A cuáles de estas casillas puede moverse?</p>
                        <ul class="exercise-options">
                            <li><strong>A.</strong> e6</li>
                            <li><strong>B.</strong> d6</li>
                            <li><strong>C.</strong> f4</li>
                            <li><strong>D.</strong> c3</li>
                        </ul>
                        <button class="btn-outline exercise-toggle">Mostrar solución</button>
                        <div class="exercise-answer hidden">
                            <p>Solución: <span class="solution-move">B y D</span></p>
                            <p>El caballo se mueve en forma de "L": dos casillas en una dirección y una en perpendicular. Desde e4, puede saltar a d6, f6, c5, g5, c3, g3, d2 y f2. De las opciones, d6 y c3 son las correctas.</p>
                        </div>
                    </div>

                    <div class="exercise-card">
                        <span class="pill">Fundamentos</span>
                        <h3>Ejercicio 2</h3>
                        <p class="exercise-prompt">¿Cuáles de estas condiciones son necesarias para poder enrocar?</p>
                        <ul class="exercise-options">
                            <li><strong>A.</strong> El rey no se movió en toda la partida</li>
                            <li><strong>B.</strong> El rey está en jaque</li>
                            <li><strong>C.</strong> No hay piezas entre el rey y la torre</li>
                            <li><strong>D.</strong> Es la primera jugada de la partida</li>
                        </ul>
                        <button class="btn-outline exercise-toggle">Mostrar solución</button>
                        <div class="exercise-answer hidden">
                            <p>Solución: <span class="solution-move">A y C</span></p>
                            <p>Para enrocar, ni el rey ni la torre deben haberse movido antes, no puede haber piezas entre ambos, y el rey no puede estar en jaque (ni pasar por una casilla atacada). No es necesario que sea la primera jugada de la partida.</p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Tácticas</h2>
                        <p>Ejercicios para entrenar la vista táctica.</p>
                    </div>

                    <div class="exercise-card">
                        <span class="pill">Tácticas</span>
                        <h3>Ejercicio 1</h3>
                        <p class="exercise-prompt">Es el turno de las blancas. Tienen un caballo en f3 y la dama negra está en d4, con el rey negro en e8. ¿Qué recurso táctico conviene buscar?</p>
                        <ul class="exercise-options">
                            <li><strong>A.</strong> Buscar una horquilla con el caballo</li>
                            <li><strong>B.</strong> Retirar la dama propia sin motivo</li>
                            <li><strong>C.</strong> Mover un peón sin ningún objetivo</li>
                        </ul>
                        <button class="btn-outline exercise-toggle">Mostrar solución</button>
                        <div class="exercise-answer hidden">
                            <p>Solución: <span class="solution-move">A</span></p>
                            <p>Cuando una pieza rival avanzada (como una dama en d4) queda expuesta, conviene revisar si algún caballo propio puede saltar a una casilla desde la que ataque a dos piezas rivales a la vez: eso es justamente una horquilla.</p>
                        </div>
                    </div>

                    <div class="exercise-card">
                        <span class="pill">Tácticas</span>
                        <h3>Ejercicio 2</h3>
                        <p class="exercise-prompt">Tu alfil está clavado contra tu rey por una torre rival en la misma columna. ¿Qué deberías evitar hacer con ese alfil?</p>
                        <ul class="exercise-options">
                            <li><strong>A.</strong> Moverlo, dejando al rey en jaque</li>
                            <li><strong>B.</strong> Dejarlo donde está mientras siga siendo útil</li>
                            <li><strong>C.</strong> Protegerlo con otra pieza si es necesario</li>
                        </ul>
                        <button class="btn-outline exercise-toggle">Mostrar solución</button>
                        <div class="exercise-answer hidden">
                            <p>Solución: <span class="solution-move">Evitar A</span></p>
                            <p>Una pieza clavada frente al propio rey no se puede mover, porque dejaría al rey en jaque: sería una jugada ilegal. Lo correcto es evaluar si conviene reforzarla o esperar el momento adecuado para resolver la clavada.</p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Estrategia</h2>
                        <p>Ejercicios de evaluación y planificación.</p>
                    </div>

                    <div class="exercise-card">
                        <span class="pill">Estrategia</span>
                        <h3>Ejercicio 1</h3>
                        <p class="exercise-prompt">Tienes una torre propia en una columna completamente abierta (sin peones de ningún color). ¿Qué deberías hacer con ella, en general?</p>
                        <ul class="exercise-options">
                            <li><strong>A.</strong> Retirarla a su casilla inicial</li>
                            <li><strong>B.</strong> Mantenerla activa en esa columna, y si es posible duplicarla con la otra torre</li>
                            <li><strong>C.</strong> Cambiarla por un peón rival lo antes posible</li>
                        </ul>
                        <button class="btn-outline exercise-toggle">Mostrar solución</button>
                        <div class="exercise-answer hidden">
                            <p>Solución: <span class="solution-move">B</span></p>
                            <p>Las columnas abiertas son el mejor terreno para las torres. Mantenerlas ahí, e incluso duplicarlas (poner ambas torres en la misma columna), suele generar mucha presión sobre la posición rival.</p>
                        </div>
                    </div>

                    <div class="exercise-card">
                        <span class="pill">Estrategia</span>
                        <h3>Ejercicio 2</h3>
                        <p class="exercise-prompt">No encuentras ningún plan claro y todas tus piezas parecen estar bien ubicadas menos una. ¿Qué deberías hacer?</p>
                        <ul class="exercise-options">
                            <li><strong>A.</strong> Mover peones al azar</li>
                            <li><strong>B.</strong> Buscar una mejor casilla para esa pieza peor ubicada</li>
                            <li><strong>C.</strong> Ofrecer tablas</li>
                        </ul>
                        <button class="btn-outline exercise-toggle">Mostrar solución</button>
                        <div class="exercise-answer hidden">
                            <p>Solución: <span class="solution-move">B</span></p>
                            <p>Cuando no aparece un plan evidente, uno de los recursos más confiables es identificar la pieza peor colocada y buscarle una casilla mejor: casi siempre mejora la posición general.</p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Finales</h2>
                        <p>Ejercicios sobre la fase final de la partida.</p>
                    </div>

                    <div class="exercise-card">
                        <span class="pill">Finales</span>
                        <h3>Ejercicio 1</h3>
                        <p class="exercise-prompt">Estás en un final de rey y peón contra rey. Tu rey está justo delante de tu peón, enfrentado al rey rival, y te toca mover a ti. ¿Qué ocurre con la oposición?</p>
                        <ul class="exercise-options">
                            <li><strong>A.</strong> Tienes tú la oposición</li>
                            <li><strong>B.</strong> La tiene el rival</li>
                            <li><strong>C.</strong> La oposición no existe en este final</li>
                        </ul>
                        <button class="btn-outline exercise-toggle">Mostrar solución</button>
                        <div class="exercise-answer hidden">
                            <p>Solución: <span class="solution-move">B</span></p>
                            <p>En estos finales, tener la oposición significa que el rival es quien debe mover, quedando en desventaja. Si te toca mover a ti en esa posición enfrentada, es el rival quien tiene la oposición, no tú.</p>
                        </div>
                    </div>

                    <div class="exercise-card">
                        <span class="pill">Finales</span>
                        <h3>Ejercicio 2</h3>
                        <p class="exercise-prompt">Tienes un peón pasado muy avanzado, pero tu rey está lejos y el rey rival está cerca del peón. ¿Qué deberías revisar primero?</p>
                        <ul class="exercise-options">
                            <li><strong>A.</strong> Si el peón puede coronar sin ayuda</li>
                            <li><strong>B.</strong> Si el rey rival entra en el "cuadrado" del peón y puede alcanzarlo</li>
                            <li><strong>C.</strong> El valor total de las piezas en el tablero</li>
                        </ul>
                        <button class="btn-outline exercise-toggle">Mostrar solución</button>
                        <div class="exercise-answer hidden">
                            <p>Solución: <span class="solution-move">B</span></p>
                            <p>La regla del cuadrado permite saber rápidamente, sin calcular jugada por jugada, si el rey rival llega a tiempo de detener al peón antes de que corone.</p>
                        </div>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
