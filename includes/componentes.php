<?php
/**
 * includes/componentes.php
 * -----------------------------------------------------------------
 * Funciones que imprimen bloques de HTML reutilizables a partir de
 * datos (arrays de la carpeta datos/).
 *
 * Todo texto que viene de los datos se imprime con e() (htmlspecialchars):
 * aunque hoy los escribe el sitio, así el componente es seguro si en
 * el futuro los datos vinieran de otra fuente.
 * -----------------------------------------------------------------
 */

// e() = htmlspecialchars($texto, ENT_QUOTES, 'UTF-8'), definida en la Clase 5
require_once __DIR__ . '/../clase5/seguridad.php';

if (!function_exists('lista_jugadas')) {
    /**
     * Imprime las jugadas de una apertura con el estilo .move-list.
     * $jugadas es un array con una entrada por número de jugada,
     * por ejemplo ['e4 e5', 'Cf3 Cc6', 'Ac4'].
     */
    function lista_jugadas(array $jugadas)
    {
        ?>
        <div class="move-list" aria-label="Jugadas iniciales">
            <ol>
                <?php foreach ($jugadas as $jugada): ?>
                <li><?= e($jugada) ?></li>
                <?php endforeach; ?>
            </ol>
        </div>
        <?php
    }
}

if (!function_exists('ficha_apertura')) {
    /**
     * Imprime la ficha completa de una apertura (datos/aperturas.php).
     *
     * @param string $clave  identificador; se usa como id para enlazar (#italiana)
     * @param array  $a      datos de la apertura
     * @param array  $tipos  tipos de apertura (datos/tipos-apertura.php)
     */
    function ficha_apertura($clave, array $a, array $tipos)
    {
        $tipo = $tipos[$a['tipo']]['singular'] ?? $a['tipo'];
        ?>
        <article class="simple-panel opening-card" id="<?= e($clave) ?>">
            <div class="opening-head">
                <h3><?= e($a['nombre']) ?></h3>
                <div class="opening-tags">
                    <span class="pill"><?= e($tipo) ?></span>
                    <span class="pill pill--nivel"><?= e($a['nivel']) ?></span>
                    <span class="pill pill--soft">ECO <?= e($a['eco']) ?></span>
                </div>
            </div>

            <p><?= e($a['resumen']) ?></p>

            <?php lista_jugadas($a['jugadas']); ?>

            <div class="opening-ideas">
                <div>
                    <h4>Idea de las blancas</h4>
                    <p><?= e($a['idea_blancas']) ?></p>
                </div>
                <div>
                    <h4>Idea de las negras</h4>
                    <p><?= e($a['idea_negras']) ?></p>
                </div>
            </div>

            <p><strong>Conceptos que enseña:</strong> <?= e($a['conceptos']) ?></p>

            <details class="opening-more">
                <summary>Planes típicos, errores comunes y jugadores</summary>

                <h4>Planes típicos</h4>
                <ul>
                    <?php foreach ($a['planes'] as $plan): ?>
                    <li><?= e($plan) ?></li>
                    <?php endforeach; ?>
                </ul>

                <h4>Errores comunes y trampas</h4>
                <ul>
                    <?php foreach ($a['errores'] as $error): ?>
                    <li><?= e($error) ?></li>
                    <?php endforeach; ?>
                </ul>

                <p><strong>Jugadores:</strong> <?= e($a['jugadores']) ?></p>
            </details>
        </article>
        <?php
    }
}

if (!function_exists('tarjeta_trampa')) {
    /**
     * Imprime una trampa de apertura (datos/trampas.php).
     *
     * @param array $t         datos de la trampa
     * @param array $aperturas catálogo, para enlazar a la ficha de su apertura
     */
    function tarjeta_trampa(array $t, array $aperturas)
    {
        $tiene_ficha = $t['apertura'] !== null && isset($aperturas[$t['apertura']]);
        ?>
        <article class="card trap-card">
            <h3><?= e($t['nombre']) ?></h3>
            <p class="trap-origin">
                <?php if ($tiene_ficha): ?>
                <a href="aperturas.php#<?= e($t['apertura']) ?>"><?= e($t['origen']) ?></a>
                <?php else: ?>
                <?= e($t['origen']) ?>
                <?php endif; ?>
            </p>
            <p class="trap-line"><?= e($t['jugadas']) ?></p>
            <p><?= e($t['explicacion']) ?></p>
            <p class="trap-lesson"><strong>Lección:</strong> <?= e($t['leccion']) ?></p>
        </article>
        <?php
    }
}
