<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios - El Arte del Jaque</title>
    <meta name="description" content="Pon a prueba tus habilidades enfrentándote a partidas de práctica.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600;700&display=swap" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600;700&display=swap"></noscript>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="app-shell">

        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 20h12M8 20c-.3-2 .2-3 1.6-4 .9-.6 1-1.2.6-2-.5-1 .2-1.6 1-1.3.6.2 1-.2.7-.9-.6-1.4.4-2.6 1.6-2.9-.3-.7.1-1.4.9-1.4 1.7 0 3.6 1.6 3.6 4.4 0 2-1 3.2-2.2 4.1-1 .8-1.4 1.6-1.3 3"/></svg>
                <div class="brand-text">El Arte<br>del Jaque<span>APRENDE AJEDREZ</span></div>
            </div>

            <nav class="sidebar-nav" aria-label="Navegación principal">
                <a href="../index.html" class="nav-item" data-page="index.html">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11.5 12 4l9 7.5"/><path d="M5.5 10v9a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-9"/><path d="M9.5 20v-6h5v6"/></svg>
                    <span>Inicio</span>
                </a>
                <a href="fundamentos.html" class="nav-item" data-page="fundamentos.html">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6.5c-1.6-1.3-3.8-2-6.5-2v13c2.7 0 4.9.7 6.5 2 1.6-1.3 3.8-2 6.5-2v-13c-2.7 0-4.9.7-6.5 2Z"/><path d="M12 6.5v13"/></svg>
                    <span>Fundamentos</span>
                </a>
                <a href="tacticas.html" class="nav-item" data-page="tacticas.html">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.2"/><circle cx="12" cy="12" r="4.4"/><circle cx="12" cy="12" r=".9" fill="currentColor" stroke="none"/></svg>
                    <span>Tácticas</span>
                </a>
                <a href="estrategias.html" class="nav-item" data-page="estrategias.html">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 9l3 3 5-6 5 6 3-3-1.6 9.5H5.6L4 9Z"/><path d="M5.6 18.5h12.8"/></svg>
                    <span>Estrategias</span>
                </a>
                <a href="aperturas.html" class="nav-item" data-page="aperturas.html">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.5"/><path d="M14.5 9.5 13 13l-3.5 1.5L11 11l3.5-1.5Z"/></svg>
                    <span>Aperturas</span>
                </a>
                <a href="finales.html" class="nav-item" data-page="finales.html">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3v18"/><path d="M6 4h12l-3 4 3 4H6"/></svg>
                    <span>Finales</span>
                </a>
                <a href="partidas.html" class="nav-item" data-page="partidas.html">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3.5 8a8.5 8.5 0 1 1-1 4"/><path d="M3 4v4h4"/><path d="M12 8v4.5l3 2"/></svg>
                    <span>Partidas Históricas</span>
                </a>
                <a href="ejercicios.html" class="nav-item" data-page="ejercicios.html">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 9h3a2 2 0 1 1 0 4H4v3a2 2 0 0 0 2 2h3v-3a2 2 0 1 1 4 0v3h3a2 2 0 0 0 2-2v-3a2 2 0 1 1 0-4V6a2 2 0 0 0-2-2h-3a2 2 0 1 1-4 0H6a2 2 0 0 0-2 2v3Z"/></svg>
                    <span>Ejercicios</span>
                </a>
                <a href="glosario.html" class="nav-item" data-page="glosario.html">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16M4 12h10M4 18h7"/></svg>
                    <span>Glosario</span>
                </a>
                <a href="recursos.html" class="nav-item" data-page="recursos.html">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3.5 7a1.5 1.5 0 0 1 1.5-1.5h4l2 2.2H19A1.5 1.5 0 0 1 20.5 9v8A1.5 1.5 0 0 1 19 18.5H5A1.5 1.5 0 0 1 3.5 17V7Z"/></svg>
                    <span>Recursos</span>
                </a>
                <a href="sobre-el-sitio.html" class="nav-item" data-page="sobre-el-sitio.html">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.5"/><path d="M12 11v5.2"/><circle cx="12" cy="8" r=".9" fill="currentColor" stroke="none"/></svg>
                    <span>Sobre el Sitio</span>
                </a>
            </nav>

            <div class="sidebar-footer-note">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 9l3 3 5-6 5 6 3-3-1.6 9.5H5.6L4 9Z"/><path d="M5.6 18.5h12.8"/></svg>
                <p>Mejora cada día, piensa como un gran maestro.</p>
            </div>
        </aside>

        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

        <div class="content-wrap">

        <header class="site-header">
                <div class="header-left">
                    <button class="menu-toggle" id="menuToggle" aria-label="Abrir menú" aria-expanded="false" aria-controls="sidebar">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
                    </button>
                    <div class="header-titles">
                        <p class="header-title">Ejercicios</p>
                        <p class="tagline">Pon a prueba lo aprendido</p>
                    </div>
                </div>
                <div class="header-right">
                    <div class="site-clock" id="siteClock" aria-live="off"></div>
                    <button type="button" class="theme-toggle" id="themeToggle" aria-pressed="false" aria-label="Activar modo claro">
                        <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 14.5A8.5 8.5 0 1 1 9.5 4a7 7 0 0 0 10.5 10.5Z"/></svg>
                        <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="4.2"/><path d="M12 3v2.2M12 18.8V21M4.9 4.9l1.6 1.6M17.5 17.5l1.6 1.6M3 12h2.2M18.8 12H21M4.9 19.1l1.6-1.6M17.5 6.5l1.6-1.6"/></svg>
                    </button>
                    <div class="search-box">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="M20 20l-4.8-4.8"/></svg>
                        <input type="search" placeholder="Buscar en el sitio..." aria-label="Buscar en el sitio">
                    </div>
                </div>
            </header>

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

        <footer class="site-footer">
                <div class="footer-grid">
                    <div class="footer-brand-col">
                        <div class="footer-brand">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 20h12M8 20c-.3-2 .2-3 1.6-4 .9-.6 1-1.2.6-2-.5-1 .2-1.6 1-1.3.6.2 1-.2.7-.9-.6-1.4.4-2.6 1.6-2.9-.3-.7.1-1.4.9-1.4 1.7 0 3.6 1.6 3.6 4.4 0 2-1 3.2-2.2 4.1-1 .8-1.4 1.6-1.3 3"/></svg>
                            <div class="brand-text">El Arte<br>del Jaque<span>APRENDE AJEDREZ</span></div>
                        </div>
                        <p class="footer-desc">
                            El ajedrez es arte, ciencia y pasión. Sitio educativo creado por Samuel
                            para acompañarte en tu camino hacia la maestría.
                        </p>
                    </div>
                    <div class="footer-col">
                        <h4>Enlaces rápidos</h4>
                        <a href="../index.html">Inicio</a>
                        <a href="sobre-el-sitio.html">Sobre el sitio</a>
                        <a href="recursos.html">Recursos</a>
                        <a href="glosario.html">Glosario</a>
                    </div>
                    <div class="footer-col">
                        <h4>Contacto</h4>
                        <a href="contacto.html">Formulario de contacto</a>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>© 2026 El Arte del Jaque. Todos los derechos reservados.</p>
                </div>
            </footer>

        </div>
    </div>

    <script src="../js/main.js"></script>
</body>

</html>
