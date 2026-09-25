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
 * -----------------------------------------------------------------
 */

if (!isset($ruta_base))      $ruta_base = '';
if (!isset($ruta_paginas))   $ruta_paginas = 'paginas/';
if (!isset($pagina_actual))  $pagina_actual = '';
if (!isset($header_titulo))  $header_titulo = APP_NAME;
if (!isset($header_tagline)) $header_tagline = '';
if (!isset($es_home))        $es_home = false;

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
                <a href="<?= $ruta_base ?>index.php" class="nav-item<?= nav_activo('index', $pagina_actual) ?>" data-page="index.php">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11.5 12 4l9 7.5"/><path d="M5.5 10v9a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-9"/><path d="M9.5 20v-6h5v6"/></svg>
                    <span>Inicio</span>
                
                </a>
                <a href="<?= $ruta_paginas ?>fundamentos.php" class="nav-item<?= nav_activo('fundamentos', $pagina_actual) ?>" data-page="fundamentos.php">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6.5c-1.6-1.3-3.8-2-6.5-2v13c2.7 0 4.9.7 6.5 2 1.6-1.3 3.8-2 6.5-2v-13c-2.7 0-4.9.7-6.5 2Z"/><path d="M12 6.5v13"/></svg>
                    <span>Fundamentos</span>
                
                </a>
                <a href="<?= $ruta_paginas ?>tacticas.php" class="nav-item<?= nav_activo('tacticas', $pagina_actual) ?>" data-page="tacticas.php">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.2"/><circle cx="12" cy="12" r="4.4"/><circle cx="12" cy="12" r=".9" fill="currentColor" stroke="none"/></svg>
                    <span>Tácticas</span>
                
                </a>
                <a href="<?= $ruta_paginas ?>estrategias.php" class="nav-item<?= nav_activo('estrategias', $pagina_actual) ?>" data-page="estrategias.php">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 9l3 3 5-6 5 6 3-3-1.6 9.5H5.6L4 9Z"/><path d="M5.6 18.5h12.8"/></svg>
                    <span>Estrategias</span>
                
                </a>
                <a href="<?= $ruta_paginas ?>aperturas.php" class="nav-item<?= nav_activo('aperturas', $pagina_actual) ?>" data-page="aperturas.php">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.5"/><path d="M14.5 9.5 13 13l-3.5 1.5L11 11l3.5-1.5Z"/></svg>
                    <span>Aperturas</span>
                
                </a>
                <a href="<?= $ruta_paginas ?>finales.php" class="nav-item<?= nav_activo('finales', $pagina_actual) ?>" data-page="finales.php">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3v18"/><path d="M6 4h12l-3 4 3 4H6"/></svg>
                    <span>Finales</span>
                
                </a>
                <a href="<?= $ruta_paginas ?>partidas.php" class="nav-item<?= nav_activo('partidas', $pagina_actual) ?>" data-page="partidas.php">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3.5 8a8.5 8.5 0 1 1-1 4"/><path d="M3 4v4h4"/><path d="M12 8v4.5l3 2"/></svg>
                    <span>Partidas Históricas</span>
                
                </a>
                <a href="<?= $ruta_paginas ?>ejercicios.php" class="nav-item<?= nav_activo('ejercicios', $pagina_actual) ?>" data-page="ejercicios.php">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 9h3a2 2 0 1 1 0 4H4v3a2 2 0 0 0 2 2h3v-3a2 2 0 1 1 4 0v3h3a2 2 0 0 0 2-2v-3a2 2 0 1 1 0-4V6a2 2 0 0 0-2-2h-3a2 2 0 1 1-4 0H6a2 2 0 0 0-2 2v3Z"/></svg>
                    <span>Ejercicios</span>
                
                </a>
                <a href="<?= $ruta_paginas ?>glosario.php" class="nav-item<?= nav_activo('glosario', $pagina_actual) ?>" data-page="glosario.php">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16M4 12h10M4 18h7"/></svg>
                    <span>Glosario</span>
                
                </a>
                <a href="<?= $ruta_paginas ?>recursos.php" class="nav-item<?= nav_activo('recursos', $pagina_actual) ?>" data-page="recursos.php">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3.5 7a1.5 1.5 0 0 1 1.5-1.5h4l2 2.2H19A1.5 1.5 0 0 1 20.5 9v8A1.5 1.5 0 0 1 19 18.5H5A1.5 1.5 0 0 1 3.5 17V7Z"/></svg>
                    <span>Recursos</span>
                
                </a>
                <a href="<?= $ruta_paginas ?>sobre-el-sitio.php" class="nav-item<?= nav_activo('sobre-el-sitio', $pagina_actual) ?>" data-page="sobre-el-sitio.php">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.5"/><path d="M12 11v5.2"/><circle cx="12" cy="8" r=".9" fill="currentColor" stroke="none"/></svg>
                    <span>Sobre el Sitio</span>
                
                </a>
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
                    <div class="search-box">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="M20 20l-4.8-4.8"/></svg>
                        <input type="search" placeholder="Buscar en el sitio..." aria-label="Buscar en el sitio">
                    </div>
                </div>
            </header>
