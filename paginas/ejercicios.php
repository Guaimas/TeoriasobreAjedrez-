<?php
/**
 * ejercicios.php
 * Página migrada desde paginas/ejercicios.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 *
 * Ejercicios interactivos (Fase 6):
 *   - Los ejercicios están en datos/ejercicios.php, agrupados por tema.
 *   - ejercicio() y tablero() (includes/componentes.php) dibujan cada
 *     tarjeta y su diagrama.
 *   - js/main.js (initEjercicios) marca cada opción como correcta o
 *     incorrecta al hacer clic. La solución está en un <details>, así
 *     que también se puede ver sin JavaScript.
 */

$titulo_pagina    = "Ejercicios - El Arte del Jaque";
$meta_descripcion = "Ejercicios interactivos de ajedrez con diagramas: fundamentos, tácticas, estrategia y finales, con su solución explicada.";
$pagina_actual    = "ejercicios";
$header_titulo    = "Ejercicios";
$header_tagline   = "Pon a prueba lo aprendido";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../includes/componentes.php';  // ejercicio() y tablero()

$temas = require __DIR__ . '/../datos/ejercicios.php';

$total = 0;
foreach ($temas as $tema) {
    $total += count($tema['ejercicios']);
}

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Ejercicios</span>
                    <h1>Práctica</h1>
                    <p>La teoría solo es el principio; el verdadero maestro se forja en el tablero.</p>
                </div>

                <section class="page-section">
                    <div class="content-block">
                        <div class="content-media">
                            <img src="https://images.pexels.com/photos/8438872/pexels-photo-8438872.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Tablero de práctica">
                        </div>
                        <div>
                            <h2>¿Cómo funcionan los ejercicios?</h2>
                            <p>
                                Hay <?= $total ?> ejercicios agrupados por tema (fundamentos, tácticas, estrategia y
                                finales), en el mismo orden en que se presentan en el sitio. Muchos incluyen un
                                diagrama con la posición del tablero.
                            </p>
                            <p>
                                Piensa tu respuesta y <strong>haz clic en una opción</strong>: se marcará en verde si es
                                correcta o en rojo si no lo es, y puedes seguir intentando. Después abre
                                <strong>Ver la solución</strong> para leer la explicación. Si quieres seguir practicando,
                                en <a href="recursos.php" style="color: var(--gold);">Recursos</a> encontrarás plataformas
                                con miles de ejercicios gratuitos.
                            </p>
                        </div>
                    </div>
                </section>

                <?php foreach ($temas as $clave => $tema): ?>
                <hr>

                <section class="page-section" id="<?= e($clave) ?>">
                    <div class="section-heading">
                        <h2><?= e($tema['titulo']) ?></h2>
                        <p><?= e($tema['descripcion']) ?></p>
                    </div>

                    <?php foreach ($tema['ejercicios'] as $i => $ej): ?>
                        <?php ejercicio($ej, $i + 1, $tema['titulo']); ?>
                    <?php endforeach; ?>
                </section>
                <?php endforeach; ?>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
