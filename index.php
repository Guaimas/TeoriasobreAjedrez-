<?php
/**
 * index.php
 * Página migrada desde index.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 */

$titulo_pagina    = "Aprender Ajedrez - El Arte del Jaque";
$meta_descripcion = "Aprende ajedrez desde cero con guías, estrategias y ejercicios para mejorar tus habilidades y dominar el tablero.";
$pagina_actual    = "index";
$header_titulo    = "El Arte del Jaque";
$header_tagline   = "Aprende. Practica. Domina.";
$ruta_base        = "";
$ruta_paginas     = "paginas/";
$es_home          = true;

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/nav.php';
?>

<main>

                <!-- ===== HERO ===== -->
                <section class="page-section">
                    <div class="hero board-texture">
                        <div class="hero-copy">
                            <span class="eyebrow">Aprende Ajedrez</span>
                            <h2>Bienvenido al<br>Tablero</h2>
                            <div class="hero-rule"></div>
                            <p>
                                Esta página está dedicada al apasionante mundo del ajedrez. Aquí encontrarás
                                recursos, guías, estrategias y ejercicios para mejorar tu juego.
                            </p>
                            <p class="hero-highlight">
                                Ya seas principiante o avanzado, este es tu espacio para aprender y crecer.
                            </p>
                        </div>
                        <div class="hero-media">
                            <img src="https://images.pexels.com/photos/4576336/pexels-photo-4576336.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Piezas de ajedrez sobre un tablero">
                        </div>
                    </div>
                </section>

                <!-- ===== APRENDE / PRACTICA / MEJORA ===== -->
                <section class="page-section">
                    <div class="card-grid">
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6.5c-1.6-1.3-3.8-2-6.5-2v13c2.7 0 4.9.7 6.5 2 1.6-1.3 3.8-2 6.5-2v-13c-2.7 0-4.9.7-6.5 2Z"/><path d="M12 6.5v13"/></svg>
                            </div>
                            <h3>Aprende</h3>
                            <p>Explora las secciones del menú para aprender desde lo más básico hasta estrategias avanzadas.</p>
                            <a href="paginas/fundamentos.php" class="card-link">Explorar lecciones
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.2"/><circle cx="12" cy="12" r="4.4"/><circle cx="12" cy="12" r=".9" fill="currentColor" stroke="none"/></svg>
                            </div>
                            <h3>Practica</h3>
                            <p>Realiza los ejercicios propuestos para poner a prueba tus habilidades.</p>
                            <a href="paginas/ejercicios.php" class="card-link">Ir a ejercicios
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 9l3 3 5-6 5 6 3-3-1.6 9.5H5.6L4 9Z"/></svg>
                            </div>
                            <h3>Mejora</h3>
                            <p>¡Pon en práctica lo aprendido y conviértete en el mejor estratega del tablero!</p>
                            <a href="paginas/estrategias.php" class="card-link">Ver estrategias
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                    </div>
                </section>

                <hr>

                <!-- ===== EXPLORA NUESTRAS SECCIONES ===== -->
                <section class="page-section">
                    <div class="section-heading">
                        <h2>Explora nuestras secciones</h2>
                        <p>Todo lo que necesitas para convertirte en un gran jugador de ajedrez.</p>
                    </div>
                    <div class="topic-grid">
                        <div class="card">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6.5c-1.6-1.3-3.8-2-6.5-2v13c2.7 0 4.9.7 6.5 2 1.6-1.3 3.8-2 6.5-2v-13c-2.7 0-4.9.7-6.5 2Z"/><path d="M12 6.5v13"/></svg>
                            </div>
                            <h3>Fundamentos</h3>
                            <p>Qué es el ajedrez, reglas básicas y el movimiento de cada pieza.</p>
                            <a href="paginas/fundamentos.php" class="card-link">Ver más
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.2"/><circle cx="12" cy="12" r="4.4"/><circle cx="12" cy="12" r=".9" fill="currentColor" stroke="none"/></svg>
                            </div>
                            <h3>Tácticas</h3>
                            <p>Patrones y combinaciones para ganar material o forzar el jaque mate.</p>
                            <a href="paginas/tacticas.php" class="card-link">Ver más
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 9l3 3 5-6 5 6 3-3-1.6 9.5H5.6L4 9Z"/></svg>
                            </div>
                            <h3>Estrategias</h3>
                            <p>El corazón de la partida: crea planes y domina el centro del tablero.</p>
                            <a href="paginas/estrategias.php" class="card-link">Ver más
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.5"/><path d="M14.5 9.5 13 13l-3.5 1.5L11 11l3.5-1.5Z"/></svg>
                            </div>
                            <h3>Aperturas</h3>
                            <p>La base de toda partida: desarrolla tus piezas desde el primer movimiento.</p>
                            <a href="paginas/aperturas.php" class="card-link">Ver más
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3v18"/><path d="M6 4h12l-3 4 3 4H6"/></svg>
                            </div>
                            <h3>Finales</h3>
                            <p>La fase técnica donde el cálculo exacto decide la victoria.</p>
                            <a href="paginas/finales.php" class="card-link">Ver más
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                    </div>
                </section>

                <!-- ===== PARTIDAS HISTORICAS ===== -->
                <section class="page-section">
                    <div class="feature-banner">
                        <div class="feature-banner-copy">
                            <span class="eyebrow">Recurso destacado</span>
                            <h3>Partidas Históricas</h3>
                            <p>
                                Muy pronto podrás estudiar partidas memorables de grandes maestros
                                y aprender de sus mejores jugadas.
                            </p>
                            <a href="paginas/partidas.php" class="btn-gold">Ver partidas
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h15M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                        <div class="feature-banner-media">
                            <img src="https://images.pexels.com/photos/59197/pexels-photo-59197.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Batalla entre piezas de ajedrez">
                        </div>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
