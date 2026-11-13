<?php
/**
 * includes/nav.php
 * -----------------------------------------------------------------
 * Sidebar de navegación principal + barra superior (site-header).
 *
 * La página que incluye este archivo debe definir ANTES del
 * require_once (ademas de las variables que ya pide header.php):
 *
 *   $ruta_base      (string) "" en la raíz, "../" dentro de /paginas
 *   $ruta_paginas   (string) "paginas/" en la raíz, "" dentro de /paginas
 *   $pagina_actual  (string) slug de la página actual, ej: "aperturas"
 *   $header_titulo  (string) texto mostrado en la barra superior
 *   $header_tagline (string) subtítulo de la barra superior
 *   $es_home        (bool)   true solo en index.php (usa <h1> de marca)
 *
 * nav_activo() agrega la clase "active" al enlace del menú que
 * corresponde a la página que se está visitando (requisito de SSR
 * de "menú activo" del TP).
 *
 * Los enlaces del menú se generan recorriendo datos/secciones.php:
 * para agregar o reordenar una sección se edita ese archivo.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/secciones.php';
require_once __DIR__ . '/csrf.php';   // TP8: token del botón "Cerrar sesión"

if (!isset($ruta_base))      $ruta_base = '';
if (!isset($ruta_paginas))   $ruta_paginas = 'paginas/';
if (!isset($pagina_actual))  $pagina_actual = '';
if (!isset($header_titulo))  $header_titulo = APP_NAME;
if (!isset($header_tagline)) $header_tagline = '';
if (!isset($es_home))        $es_home = false;

// TP8: estado de la sesión (config/sesion.php ya la inició desde header.php).
// El menú cambia según haya o no un usuario conectado y según su rol.
$nav_conectado = isset($_SESSION['usuario_id']);
$nav_es_admin  = $nav_conectado && ($_SESSION['rol'] ?? '') === 'admin';

if (!function_exists('nav_activo')) {
    function nav_activo($slug, $paginaActual)
    {
        return $slug === $paginaActual ? ' active' : '';
    }
}
?>
        <!-- ===== SIDEBAR ===== -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 20h12M8 20c-.3-2 .2-3 1.6-4 .9-.6 1-1.2.6-2-.5-1 .2-1.6 1-1.3.6.2 1-.2.7-.9-.6-1.4.4-2.6 1.6-2.9-.3-.7.1-1.4.9-1.4 1.7 0 3.6 1.6 3.6 4.4 0 2-1 3.2-2.2 4.1-1 .8-1.4 1.6-1.3 3"/>
                </svg>
                <div class="brand-text">El Arte<br>del Jaque<span>APRENDE AJEDREZ</span></div>
            </div>

            <nav class="sidebar-nav" aria-label="Navegación principal">
                <?php // El menú se genera desde datos/secciones.php (un enlace por sección) ?>
                <?php foreach (secciones_del_sitio() as $slug => $seccion): ?>
                <?php // TP8: "Administración" solo aparece para el rol admin. ?>
                <?php if ($slug === 'admin' && !$nav_es_admin) continue; ?>
                <a href="<?= url_seccion($slug, $ruta_base, $ruta_paginas) ?>" class="nav-item<?= nav_activo($slug, $pagina_actual) ?>" data-page="<?= $slug ?>.php">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><?= $seccion['icono'] ?></svg>
                    <span><?= htmlspecialchars($seccion['titulo']) ?></span>
                </a>
                <?php endforeach; ?>

                <?php // TP8: menú de cuenta. Cambia según el estado de la sesión. ?>
                <div class="nav-account">
                    <?php if ($nav_conectado): ?>
                    <?php // El nombre sale de la sesión, pero se escapa igual que cualquier dato. ?>
                    <p class="nav-account-hola">Hola, <strong><?= e($_SESSION['usuario_nombre'] ?? '') ?></strong></p>
                    <a href="<?= $ruta_base ?>dashboard.php" class="nav-item<?= nav_activo('dashboard', $pagina_actual) ?>" data-page="dashboard.php">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8.5" r="3.6"/><path d="M5 20c.8-3.6 3.6-5.6 7-5.6s6.2 2 7 5.6"/></svg>
                        <span>Mi panel</span>
                    </a>
                    <?php // Cerrar sesión va por POST con token CSRF (logout.php). ?>
                    <form action="<?= $ruta_base ?>logout.php" method="post" class="nav-logout">
                        <?= csrf_campo() ?>
                        <button type="submit" class="nav-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4h4a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1h-4"/><path d="M10 16l-4-4 4-4"/><path d="M6 12h9"/></svg>
                            <span>Cerrar sesión</span>
                        </button>
                    </form>
                    <?php else: ?>
                    <a href="<?= $ruta_base ?>login.php" class="nav-item<?= nav_activo('login', $pagina_actual) ?>" data-page="login.php">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M10 4H6a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h4"/><path d="M14 16l4-4-4-4"/><path d="M18 12H9"/></svg>
                        <span>Iniciar sesión</span>
                    </a>
                    <a href="<?= $ruta_base ?>registro.php" class="nav-item<?= nav_activo('registro', $pagina_actual) ?>" data-page="registro.php">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="8.5" r="3.6"/><path d="M3 20c.8-3.6 3.6-5.6 7-5.6 1.4 0 2.6.3 3.7.9"/><path d="M18 14v6M15 17h6"/></svg>
                        <span>Registrarse</span>
                    </a>
                    <?php endif; ?>
                </div>
            </nav>

            <div class="sidebar-footer-note">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 9l3 3 5-6 5 6 3-3-1.6 9.5H5.6L4 9Z"/></svg>
                <p>Mejora cada día, piensa como un gran maestro.</p>
            </div>
        </aside>

        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

        <div class="content-wrap">

            <!-- ===== HEADER ===== -->
            <header class="site-header">
                <div class="header-left">
                    <button class="menu-toggle" id="menuToggle" aria-label="Abrir menú" aria-expanded="false" aria-controls="sidebar">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
                    </button>
                    <div class="header-titles">
                        <?php if ($es_home): ?>
                        <h1><?= htmlspecialchars($header_titulo) ?></h1>
                        <?php else: ?>
                        <p class="header-title"><?= htmlspecialchars($header_titulo) ?></p>
                        <?php endif; ?>
                        <p class="tagline"><?= htmlspecialchars($header_tagline) ?></p>
                    </div>
                </div>
                <div class="header-right">
                    <div class="site-clock" id="siteClock" aria-live="off"></div>
                    <button type="button" class="theme-toggle" id="themeToggle" aria-pressed="false" aria-label="Activar modo claro">
                        <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 14.5A8.5 8.5 0 1 1 9.5 4a7 7 0 0 0 10.5 10.5Z"/></svg>
                        <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="4.2"/><path d="M12 3v2.2M12 18.8V21M4.9 4.9l1.6 1.6M17.5 17.5l1.6 1.6M3 12h2.2M18.8 12H21M4.9 19.1l1.6-1.6M17.5 6.5l1.6-1.6"/></svg>
                    </button>
                    <!-- TP5: buscador con método GET. Envía la palabra al glosario (glosario.php?termino=...) -->
                    <form class="search-box" action="<?= $ruta_paginas ?>glosario.php" method="get" role="search">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="M20 20l-4.8-4.8"/></svg>
                        <input type="search" name="termino" maxlength="40" placeholder="Buscar en el glosario..." aria-label="Buscar en el glosario" value="<?= e(limpiar(filter_input(INPUT_GET, 'termino', FILTER_DEFAULT, FILTER_REQUIRE_SCALAR))) ?>">
                    </form>
                </div>
            </header>
