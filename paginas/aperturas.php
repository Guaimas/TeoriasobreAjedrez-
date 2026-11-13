<?php
/**
 * aperturas.php
 * Página migrada desde paginas/aperturas.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 *
 * Catálogo de aperturas (Fase 4):
 *   - Las aperturas están en datos/aperturas.php y se dibujan con
 *     ficha_apertura() de includes/componentes.php.
 *   - Filtro por tipo con método GET: aperturas.php?tipo=semiabierta
 *     El valor se valida contra la lista blanca de datos/tipos-apertura.php
 *     y todo lo que se imprime pasa por htmlspecialchars.
 */

$titulo_pagina    = "Aperturas - El Arte del Jaque";
$meta_descripcion = "Catálogo de aperturas de ajedrez: abiertas, semiabiertas, cerradas, indias y de flanco, con sus jugadas, ideas, planes y las trampas más comunes.";
$pagina_actual    = "aperturas";
$header_titulo    = "Aperturas";
$header_tagline   = "El comienzo de toda partida";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../tp5/seguridad.php';     // e() y limpiar()
require_once __DIR__ . '/../includes/componentes.php';  // ficha_apertura()

$aperturas = require __DIR__ . '/../datos/aperturas.php';
$tipos     = require __DIR__ . '/../datos/tipos-apertura.php';
$trampas   = require __DIR__ . '/../datos/trampas.php';

// Cantidad de aperturas de cada tipo (para los filtros y las tarjetas).
$cantidad_por_tipo = array_fill_keys(array_keys($tipos), 0);
foreach ($aperturas as $a) {
    $cantidad_por_tipo[$a['tipo']]++;
}

// Solo se ofrecen los tipos que ya tienen aperturas cargadas.
$tipos_disponibles = array_filter($tipos, function ($clave) use ($cantidad_por_tipo) {
    return $cantidad_por_tipo[$clave] > 0;
}, ARRAY_FILTER_USE_KEY);

// ---- Filtro GET: ?tipo=... ----
// 1) Captura y sanitización (trim, rechaza arrays)
$tipo_elegido = limpiar(filter_input(INPUT_GET, 'tipo', FILTER_DEFAULT, FILTER_REQUIRE_SCALAR));
$error_tipo   = '';

// 2) Validación contra la lista blanca de tipos
if ($tipo_elegido !== '' && !isset($tipos_disponibles[$tipo_elegido])) {
    $error_tipo   = 'El tipo de apertura indicado no existe. Se muestran todas las aperturas.';
    $tipo_elegido = '';
}

// 3) Tipos que se van a mostrar (todos o solo el elegido)
$tipos_a_mostrar = $tipo_elegido === ''
    ? $tipos_disponibles
    : [$tipo_elegido => $tipos_disponibles[$tipo_elegido]];

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Aperturas</span>
                    <h1>El comienzo de la partida</h1>
                    <p>La base de toda partida: desarrollo de piezas, control del centro y preparación.</p>
                </div>

                <section class="page-section">
                    <div class="simple-panel">
                        <p>
                            Las aperturas en el ajedrez son la base de toda partida. En esta fase inicial se
                            desarrollan las piezas, se controla el centro y se prepara la estrategia. Conocer
                            distintas aperturas te permitirá jugar con mayor seguridad y tomar ventaja desde el comienzo.
                        </p>
                    </div>

                    <div class="section-heading">
                        <h2>Principios de la apertura</h2>
                        <p>Antes de memorizar variantes, conviene entender qué se busca en esta fase de la partida.</p>
                    </div>

                    <div class="topic-grid">
                        <div class="card">
                            <h3>Objetivo</h3>
                            <p>Desarrollar las piezas, proteger al rey y quedar en la mejor posición posible antes del medio juego.</p>
                        </div>
                        <div class="card">
                            <h3>Control del centro</h3>
                            <p>Ocupar o influir sobre las casillas centrales (d4, d5, e4, e5) le da a las piezas más movilidad.</p>
                        </div>
                        <div class="card">
                            <h3>Desarrollo de piezas</h3>
                            <p>Sacar caballos y alfiles de sus casillas iniciales cuanto antes, antes de mover la dama o repetir jugadas.</p>
                        </div>
                        <div class="card">
                            <h3>Seguridad del rey</h3>
                            <p>Enrocar pronto para poner al rey a resguardo y conectar las torres.</p>
                        </div>
                        <div class="card">
                            <h3>No repetir pieza</h3>
                            <p>Evita mover la misma pieza varias veces en la apertura; cada jugada debería sumar desarrollo.</p>
                        </div>
                        <div class="card">
                            <h3>Cuidado con la dama</h3>
                            <p>Sacarla demasiado pronto la expone a ataques de piezas menores, perdiendo tiempo.</p>
                        </div>
                        <div class="card">
                            <h3>Conectar las torres</h3>
                            <p>Cuando ya no hay piezas entre las torres, quedan conectadas y listas para ocupar columnas abiertas.</p>
                        </div>
                        <div class="card">
                            <h3>Vigila f7 y f2</h3>
                            <p>Al comienzo son las casillas más débiles de cada bando, porque solo las defiende el rey. Muchas trampas apuntan ahí.</p>
                        </div>
                        <div class="card">
                            <h3>Caballos antes que alfiles</h3>
                            <p>Una guía útil: los caballos suelen tener una sola buena casilla, mientras que los alfiles pueden esperar a ver dónde conviene ubicarlos.</p>
                        </div>
                        <div class="card">
                            <h3>Ideas antes que jugadas</h3>
                            <p>Memorizar sin entender sirve hasta que el rival sale de lo conocido. Entender el plan de cada apertura sirve siempre.</p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section" id="catalogo">
                    <div class="section-heading">
                        <h2>Catálogo de aperturas</h2>
                        <p><?= count($aperturas) ?> aperturas clasificadas por tipo. Cada ficha muestra las jugadas iniciales, la idea de cada bando, los planes típicos y los errores más comunes. Más abajo encontrarás las <a href="#trampas" style="color: var(--gold);">trampas de apertura</a> más conocidas.</p>
                    </div>

                    <!-- Filtro por tipo con método GET: cada opción es un enlace aperturas.php?tipo=... -->
                    <nav class="filter-chips" aria-label="Filtrar aperturas por tipo">
                        <a class="filter-chip<?= $tipo_elegido === '' ? ' active' : '' ?>" href="aperturas.php#catalogo"<?= $tipo_elegido === '' ? ' aria-current="true"' : '' ?>>
                            Todas <span class="filter-count"><?= count($aperturas) ?></span>
                        </a>
                        <?php foreach ($tipos_disponibles as $clave => $tipo): ?>
                        <a class="filter-chip<?= $tipo_elegido === $clave ? ' active' : '' ?>" href="aperturas.php?tipo=<?= e($clave) ?>#catalogo"<?= $tipo_elegido === $clave ? ' aria-current="true"' : '' ?>>
                            <?= e($tipo['nombre']) ?> <span class="filter-count"><?= $cantidad_por_tipo[$clave] ?></span>
                        </a>
                        <?php endforeach; ?>
                    </nav>

                    <?php if ($error_tipo !== ''): ?>
                    <p class="form-alert" role="alert"><?= e($error_tipo) ?></p>
                    <?php endif; ?>

                    <?php foreach ($tipos_a_mostrar as $clave_tipo => $tipo): ?>
                    <div class="opening-group">
                        <div class="opening-group-head">
                            <h2><?= e($tipo['nombre']) ?> <span class="opening-group-move"><?= e($tipo['jugada']) ?></span></h2>
                            <p><?= e($tipo['descripcion']) ?></p>
                        </div>

                        <?php foreach ($aperturas as $clave => $apertura): ?>
                            <?php if ($apertura['tipo'] === $clave_tipo) ficha_apertura($clave, $apertura, $tipos); ?>
                        <?php endforeach; ?>
                    </div>
                    <?php endforeach; ?>
                </section>

                <hr>

                <section class="page-section" id="trampas">
                    <div class="section-heading">
                        <h2>Trampas de apertura</h2>
                        <p>Secuencias cortas en las que un error en las primeras jugadas cuesta material o la partida. Conocerlas sirve para no caer en ellas y para entender por qué los principios de la apertura son importantes.</p>
                    </div>

                    <div class="trap-grid">
                        <?php foreach ($trampas as $trampa) tarjeta_trampa($trampa, $aperturas); ?>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
