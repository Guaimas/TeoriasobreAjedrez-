<?php
/**
 * includes/paginacion.php
 * -----------------------------------------------------------------
 * Enlaces "← Anterior / Siguiente →" al final de cada sección de
 * contenido, siguiendo el orden de aprendizaje del menú.
 *
 * Lo incluye footer.php. Solo se muestra si $pagina_actual es una
 * de las secciones de la lista (no aparece en Inicio, Sobre el sitio
 * ni Contacto).
 *
 * Para cambiar el orden o agregar una sección, basta con editar
 * el array $secciones_en_orden.
 * -----------------------------------------------------------------
 */

$secciones_en_orden = [
    'fundamentos' => 'Fundamentos',
    'tacticas'    => 'Tácticas',
    'estrategias' => 'Estrategias',
    'aperturas'   => 'Aperturas',
    'finales'     => 'Finales',
    'partidas'    => 'Partidas Históricas',
    'ejercicios'  => 'Ejercicios',
    'glosario'    => 'Glosario',
    'recursos'    => 'Recursos',
];

$slugs    = array_keys($secciones_en_orden);
$posicion = array_search($pagina_actual ?? '', $slugs, true);

if ($posicion !== false):
    $anterior  = $posicion > 0 ? $slugs[$posicion - 1] : null;
    $siguiente = $posicion < count($slugs) - 1 ? $slugs[$posicion + 1] : null;
?>
            <nav class="section-pager" aria-label="Navegación entre secciones">
                <?php if ($anterior !== null): ?>
                <a class="section-pager-link prev" href="<?= $ruta_paginas ?><?= $anterior ?>.php">
                    <span class="section-pager-label">← Anterior</span>
                    <span class="section-pager-title"><?= htmlspecialchars($secciones_en_orden[$anterior]) ?></span>
                </a>
                <?php else: ?>
                <span></span>
                <?php endif; ?>

                <?php if ($siguiente !== null): ?>
                <a class="section-pager-link next" href="<?= $ruta_paginas ?><?= $siguiente ?>.php">
                    <span class="section-pager-label">Siguiente →</span>
                    <span class="section-pager-title"><?= htmlspecialchars($secciones_en_orden[$siguiente]) ?></span>
                </a>
                <?php endif; ?>
            </nav>
<?php endif; ?>
