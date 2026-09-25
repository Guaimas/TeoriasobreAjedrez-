<?php
/**
 * tacticas.php
 * Página migrada desde paginas/tacticas.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 */

$titulo_pagina    = "Tácticas - El Arte del Jaque";
$meta_descripcion = "Aprende las tácticas más importantes del ajedrez: horquillas, clavadas, ataques descubiertos y cómo encontrarlas en tus propias partidas.";
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

                    <div class="content-block">
                        <div>
                            <h2>Táctica vs. Estrategia</h2>
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
                        <p>Once recursos que todo jugador debería reconocer a simple vista.</p>
                    </div>

                    <div class="card-grid">
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 19 19 5"/><path d="M5 5l6 6M13 13l6 6"/></svg>
                            </div>
                            <h3>Horquilla</h3>
                            <p>Una pieza ataca a dos o más piezas rivales al mismo tiempo, obligando al oponente a elegir cuál salvar. El caballo es especialmente temido por sus horquillas.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v18M6 8l6-5 6 5"/></svg>
                            </div>
                            <h3>Clavada</h3>
                            <p>Una pieza no se puede (o no conviene) mover porque detrás de ella hay una pieza más valiosa, o el propio rey, que quedaría expuesto a un ataque.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="7" cy="12" r="3"/><circle cx="17" cy="12" r="3"/><path d="M10 12h4"/></svg>
                            </div>
                            <h3>Ataque doble</h3>
                            <p>Un solo movimiento crea dos amenazas distintas a la vez (por ejemplo, un jaque y la captura de una pieza), imposibles de resolver ambas en la misma jugada.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h9"/><path d="M17 6l-6 6 6 6"/><circle cx="20" cy="12" r="1.4" fill="currentColor" stroke="none"/></svg>
                            </div>
                            <h3>Ataque descubierto</h3>
                            <p>Una pieza se mueve y "descubre" el ataque de otra pieza que estaba detrás de ella, generando una amenaza que el rival no ve venir en la pieza que se movió.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4l3 3"/><path d="M11 4h9v9"/><path d="M20 4 9 15"/><circle cx="6" cy="18" r="3"/></svg>
                            </div>
                            <h3>Jaque descubierto</h3>
                            <p>Un caso particular del ataque descubierto: al mover una pieza, queda expuesto un jaque directo al rey rival. Es uno de los recursos tácticos más fuertes que existen.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h9"/><path d="M11 6l6 6-6 6"/></svg>
                            </div>
                            <h3>Desviación</h3>
                            <p>Se obliga a una pieza defensora a abandonar la casilla o la línea que protegía, generalmente con una amenaza mayor que no puede ignorar.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20V10"/><path d="M7 15l5 5 5-5"/><circle cx="12" cy="6" r="2.4"/></svg>
                            </div>
                            <h3>Atracción</h3>
                            <p>Lo opuesto a la desviación: se atrae a una pieza (a menudo el rey) hacia una casilla desfavorable, normalmente con un sacrificio, para explotarla justo después.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16M4 12h16M4 18h10"/><path d="M18 16l3 3-3 3" stroke-width="1.4"/></svg>
                            </div>
                            <h3>Eliminación del defensor</h3>
                            <p>Se captura o se elimina, mediante un intercambio favorable, a la pieza que estaba defendiendo un punto clave, dejando ese punto disponible para atacarlo.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.5"/><path d="M8.5 9.5h3M8.5 14.5h7M12.5 9.5v9"/></svg>
                            </div>
                            <h3>Sobrecarga</h3>
                            <p>Una pieza tiene que defender dos cosas importantes a la vez. Si se la obliga a ocuparse de una, la otra queda desprotegida.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h6M14 12h6"/><rect x="9" y="9" width="6" height="6" rx="1"/></svg>
                            </div>
                            <h3>Interferencia</h3>
                            <p>Se coloca una pieza propia entre dos piezas rivales que se defendían o se comunicaban entre sí, cortando esa conexión.</p>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v6M12 15v6M4.2 7l5.2 3M14.6 14l5.2 3M4.2 17l5.2-3M14.6 10l5.2-3"/></svg>
                            </div>
                            <h3>Sacrificio táctico</h3>
                            <p>Entregar material deliberadamente a cambio de una ventaja mayor: un ataque decisivo, la exposición del rey rival o una combinación que termina en jaque mate.</p>
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
