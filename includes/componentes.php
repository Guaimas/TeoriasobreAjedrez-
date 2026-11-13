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

if (!function_exists('tablero')) {
    /**
     * Dibuja un diagrama de tablero con HTML/CSS a partir de la parte de
     * piezas de una notación FEN (ej: "r3k3/8/8/3N4/8/8/8/4K3").
     *
     * Las piezas se muestran con los símbolos Unicode de ajedrez; el color
     * (blanco o negro) se da con CSS. Para lectores de pantalla se genera
     * una descripción en texto con la posición de cada pieza.
     */
    function tablero($fen)
    {
        $simbolos = ['k' => '♚', 'q' => '♛', 'r' => '♜', 'b' => '♝', 'n' => '♞', 'p' => '♟'];
        $letras   = ['k' => 'R', 'q' => 'D', 'r' => 'T', 'b' => 'A', 'n' => 'C', 'p' => ''];
        $columnas = 'abcdefgh';

        // 1) Pasar el FEN a un array [fila][columna] => pieza
        $casillas = [];
        foreach (explode('/', $fen) as $i => $fila_fen) {
            $fila = 8 - $i;
            $col  = 0;
            foreach (str_split($fila_fen) as $c) {
                if (ctype_digit($c)) {
                    $col += (int) $c;
                } else {
                    $casillas[$fila][$col] = $c;
                    $col++;
                }
            }
        }

        // 2) Descripción accesible: "Blancas: Ce4. Negras: Ta8, Re8."
        $lista = ['blancas' => [], 'negras' => []];
        foreach ($casillas as $fila => $cols) {
            foreach ($cols as $col => $p) {
                $bando = ctype_upper($p) ? 'blancas' : 'negras';
                $lista[$bando][] = $letras[strtolower($p)] . $columnas[$col] . $fila;
            }
        }
        $descripcion = 'Diagrama. Blancas: ' . (implode(', ', $lista['blancas']) ?: 'ninguna pieza')
                     . '. Negras: ' . (implode(', ', $lista['negras']) ?: 'ninguna pieza') . '.';
        ?>
        <div class="board" role="img" aria-label="<?= e($descripcion) ?>">
            <?php for ($fila = 8; $fila >= 1; $fila--): ?>
                <?php for ($col = 0; $col < 8; $col++):
                    $clara = ($fila + $col) % 2 === 0;
                    $pieza = $casillas[$fila][$col] ?? null; ?>
                <span class="sq <?= $clara ? 'sq--light' : 'sq--dark' ?>">
                    <?php if ($col === 0): ?><span class="sq-rank"><?= $fila ?></span><?php endif; ?>
                    <?php if ($fila === 1): ?><span class="sq-file"><?= $columnas[$col] ?></span><?php endif; ?>
                    <?php if ($pieza !== null): ?>
                    <span class="piece <?= ctype_upper($pieza) ? 'piece--white' : 'piece--black' ?>" aria-hidden="true"><?= $simbolos[strtolower($pieza)] ?>&#xFE0E;</span>
                    <?php endif; ?>
                </span>
                <?php endfor; ?>
            <?php endfor; ?>
        </div>
        <?php
    }
}

if (!function_exists('ejercicio')) {
    /**
     * Imprime un ejercicio interactivo (datos/ejercicios.php).
     *
     * Las opciones son botones con data-correcta="1" o "0": js/main.js las
     * marca en verde o rojo al hacer clic. La explicación está en un
     * <details>, así que también funciona sin JavaScript.
     */
    function ejercicio(array $ej, $numero, $tema)
    {
        $letras     = 'ABCDEFGH';
        $correctas  = count(array_filter($ej['opciones'], function ($o) { return $o[1]; }));
        $tiene_tablero = !empty($ej['posicion']);
        ?>
        <article class="exercise-card" data-ejercicio>
            <div class="exercise-head">
                <span class="pill"><?= e($tema) ?></span>
                <span class="pill pill--nivel"><?= e($ej['nivel']) ?></span>
            </div>
            <h3>Ejercicio <?= (int) $numero ?></h3>

            <div class="exercise-body<?= $tiene_tablero ? ' exercise-body--board' : '' ?>">
                <?php if ($tiene_tablero): ?>
                <figure class="exercise-board">
                    <?php tablero($ej['posicion']); ?>
                    <figcaption>Juegan las <?= e($ej['turno'] ?? 'blancas') ?></figcaption>
                </figure>
                <?php endif; ?>

                <div class="exercise-main">
                    <p class="exercise-prompt"><?= e($ej['enunciado']) ?></p>
                    <?php if ($correctas > 1): ?>
                    <p class="exercise-hint">Hay <?= $correctas ?> respuestas correctas.</p>
                    <?php endif; ?>

                    <div class="exercise-options" role="group" aria-label="Opciones">
                        <?php foreach ($ej['opciones'] as $i => $opcion): ?>
                        <button type="button" class="exercise-option" data-correcta="<?= $opcion[1] ? '1' : '0' ?>">
                            <strong><?= $letras[$i] ?>.</strong> <?= e($opcion[0]) ?>
                        </button>
                        <?php endforeach; ?>
                    </div>
                    <p class="exercise-feedback" aria-live="polite"></p>

                    <details class="exercise-solution">
                        <summary>Ver la solución</summary>
                        <p><?= e($ej['explicacion']) ?></p>
                    </details>
                </div>
            </div>
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
