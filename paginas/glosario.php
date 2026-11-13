<?php
/**
 * glosario.php
 * Página migrada desde paginas/glosario.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 *
 * Clase 5 — Formulario GET:
 *   El buscador envía la palabra en la URL (glosario.php?termino=...).
 *   La lógica está en clase5/buscar_glosario.php y los términos en
 *   clase5/datos/glosario.php. Sin búsqueda, el glosario se ve igual
 *   que antes (todas las letras con su acordeón).
 */

$titulo_pagina    = "Glosario - El Arte del Jaque";
$meta_descripcion = "Glosario con más de 60 términos de ajedrez explicados de forma sencilla, ordenados alfabéticamente.";
$pagina_actual    = "glosario";
$header_titulo    = "Glosario";
$header_tagline   = "El vocabulario del ajedrez";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../clase5/buscar_glosario.php';

// Solo se resaltan coincidencias si la búsqueda fue válida.
$busqueda_valida = $hay_busqueda && $error_busqueda === '';
$texto_resaltado = $busqueda_valida ? $termino : '';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Glosario</span>
                    <h1>Glosario de Ajedrez</h1>
                    <p>Los términos más usados en el mundo del ajedrez, explicados de forma simple y ordenados de la A a la Z.</p>
                </div>

                <section class="page-section">

                    <!-- Clase 5: buscador con método GET -->
                    <form class="search-page-form" action="glosario.php" method="get" role="search">
                        <label for="termino" class="sr-only">Buscar un término del glosario</label>
                        <input type="search" id="termino" name="termino" maxlength="<?= $TERMINO_MAX ?>" placeholder="Buscar un término: enroque, clavada, peón..." value="<?= e($termino) ?>">
                        <button type="submit" class="btn-gold">Buscar</button>
                    </form>

                    <?php if ($error_busqueda !== ''): ?>
                    <p class="form-alert" role="alert"><?= e($error_busqueda) ?> Se muestra el glosario completo.</p>
                    <?php elseif ($busqueda_valida && empty($resultados)): ?>
                    <p class="form-info" role="status">No se encontraron términos para «<?= e($termino) ?>». Prueba con otra palabra o <a href="glosario.php">mira el glosario completo</a>.</p>
                    <?php elseif ($busqueda_valida): ?>
                    <p class="search-summary" role="status">
                        <?= count($resultados) ?> <?= count($resultados) === 1 ? 'término encontrado' : 'términos encontrados' ?> para «<?= e($termino) ?>» · <a href="glosario.php">Ver glosario completo</a>
                    </p>
                    <?php endif; ?>

                    <?php foreach ($terminos_por_letra as $letra => $items): ?>
                    <h2 class="letter-heading">
                        <button type="button" class="accordion-toggle" aria-expanded="true" aria-controls="glosario-<?= e($letra) ?>">
                            <span><?= e($letra) ?></span>
                            <svg class="accordion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                    </h2>
                    <dl class="definition-grid accordion-panel" id="glosario-<?= e($letra) ?>">
                        <?php foreach ($items as $item): ?>
                        <div class="definition-card"><dt><?= resaltar($item['termino'], $texto_resaltado) ?></dt><dd><?= resaltar($item['definicion'], $texto_resaltado) ?></dd></div>
                        <?php endforeach; ?>
                    </dl>

                    <?php endforeach; ?>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
