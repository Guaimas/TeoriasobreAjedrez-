<?php
/**
 * includes/paginacion.php
 * -----------------------------------------------------------------
 * Enlaces "← Anterior / Siguiente →" al final de cada sección de
 * contenido, siguiendo el orden de aprendizaje del menú.
 *
 * Lo incluye footer.php. Solo se muestra si $pagina_actual es una
 * sección marcada con 'recorrido' => true en datos/secciones.php
 * (no aparece en Inicio, Sobre el sitio ni Contacto).
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/secciones.php';

// Slugs de las secciones que forman el recorrido, en orden.
$recorrido = [];
foreach (secciones_del_sitio() as $slug => $seccion) {
    if ($seccion['recorrido']) {
        $recorrido[] = $slug;
    }
}

$posicion = array_search($pagina_actual ?? '', $recorrido, true);

if ($posicion !== false):
    $todas     = secciones_del_sitio();
    $anterior  = $posicion > 0 ? $recorrido[$posicion - 1] : null;
    $siguiente = $posicion < count($recorrido) - 1 ? $recorrido[$posicion + 1] : null;
?>
            <nav class="section-pager" aria-label="Navegación entre secciones">
                <?php if ($anterior !== null): ?>
                <a class="section-pager-link prev" href="<?= url_seccion($anterior, $ruta_base, $ruta_paginas) ?>">
                    <span class="section-pager-label">← Anterior</span>
                    <span class="section-pager-title"><?= htmlspecialchars($todas[$anterior]['titulo']) ?></span>
                </a>
                <?php else: ?>
                <span></span>
                <?php endif; ?>

                <?php if ($siguiente !== null): ?>
                <a class="section-pager-link next" href="<?= url_seccion($siguiente, $ruta_base, $ruta_paginas) ?>">
                    <span class="section-pager-label">Siguiente →</span>
                    <span class="section-pager-title"><?= htmlspecialchars($todas[$siguiente]['titulo']) ?></span>
                </a>
                <?php endif; ?>
            </nav>
<?php endif; ?>
