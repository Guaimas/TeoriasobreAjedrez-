<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finales - El Arte del Jaque</title>
    <meta name="description" content="El rey como pieza activa, el jaque, el jaque mate y el empate: todo sobre el final de la partida.">
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
                        <p class="header-title">Finales</p>
                        <p class="tagline">La fase técnica y decisiva</p>
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
