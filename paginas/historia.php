<?php
/**
 * historia.php
 * Historia del ajedrez y campeones del mundo (Fase 7).
 * Los datos están en datos/historia.php.
 */

$titulo_pagina    = "Historia y Campeones - El Arte del Jaque";
$meta_descripcion = "Breve historia del ajedrez, desde el chaturanga de la India hasta hoy, y la lista completa de campeones del mundo.";
$pagina_actual    = "historia";
$header_titulo    = "Historia";
$header_tagline   = "Quince siglos sobre el tablero";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

$historia = require __DIR__ . '/../datos/historia.php';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Historia</span>
                    <h1>Historia del ajedrez</h1>
                    <p>De un juego de estrategia militar en la India a un deporte que hoy se juega en todo el mundo.</p>
                </div>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Línea de tiempo</h2>
                        <p>Los momentos que fueron dando forma al ajedrez que conocemos.</p>
                    </div>

                    <ol class="timeline">
                        <?php foreach ($historia['linea_de_tiempo'] as $hito): ?>
                        <li>
                            <span class="timeline-date"><?= htmlspecialchars($hito[0]) ?></span>
                            <p><?= htmlspecialchars($hito[1]) ?></p>
                        </li>
                        <?php endforeach; ?>
                    </ol>
                </section>

                <hr>

                <section class="page-section" id="campeones">
                    <div class="section-heading">
                        <h2>Campeones del mundo</h2>
                        <p>Todos los campeones del mundo desde el primer campeonato oficial, en 1886.</p>
                    </div>

                    <div class="table-wrap">
                        <table class="champions-table">
                            <thead>
                                <tr>
                                    <th scope="col">N.º</th>
                                    <th scope="col">Campeón</th>
                                    <th scope="col">País</th>
                                    <th scope="col">Años como campeón</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($historia['campeones'] as $i => $c): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <th scope="row"><?= htmlspecialchars($c[0]) ?></th>
                                    <td><?= htmlspecialchars($c[1]) ?></td>
                                    <td><?= htmlspecialchars($c[2]) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="simple-panel champions-notes">
                        <h2>Para tener en cuenta</h2>
                        <ul>
                            <li><strong>Un título dividido (1993–2006):</strong> en 1993 Kasparov y Nigel Short jugaron su match fuera de la FIDE, y durante trece años hubo dos campeones. Los campeones de la FIDE en ese período fueron <?= htmlspecialchars($historia['fide_1993_2006']) ?>. El título se reunificó en 2006, cuando Kramnik venció a Topalov.</li>
                            <li><strong>Títulos sin jugar:</strong> Alekhine murió siendo campeón en 1946, y el título se definió en un torneo en 1948. Fischer no defendió su corona en 1975, y Karpov fue proclamado campeón. Carlsen decidió no defenderla en 2023, y Ding Liren la ganó frente a Ian Nepomniachtchi.</li>
                            <li><strong>Datos actualizados a mediados de 2026.</strong> Si después hubo un nuevo match por el título, puede que esta lista no lo incluya todavía.</li>
                        </ul>
                        <p>Muchos de estos campeones aparecen en las <a href="partidas.php" style="color: var(--gold);">Partidas Históricas</a> y en las fichas de las <a href="aperturas.php" style="color: var(--gold);">Aperturas</a> que hicieron famosas.</p>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
