<?php
/**
 * buscar.php
 * -----------------------------------------------------------------
 * Clase 5 — Formulario con método GET.
 *
 * Recibe la consulta del buscador del header (o del formulario de
 * esta misma página) en la URL: buscar.php?q=texto
 *
 * Se usa GET porque buscar NO modifica datos: el resultado se puede
 * recargar, guardar en favoritos o compartir con el enlace.
 *
 * Seguridad aplicada:
 *   - limpiar_texto(): descarta arrays/valores no string, quita
 *     caracteres de control y espacios sobrantes.
 *   - Longitud máxima de la consulta (60 caracteres).
 *   - Todo lo que el usuario escribió se imprime con e()
 *     (htmlspecialchars) -> evita XSS reflejado.
 *   - La búsqueda se hace sobre un índice fijo en PHP (no se usa la
 *     consulta para abrir archivos ni armar SQL).
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/seguridad.php';

$titulo_pagina    = "Buscar - El Arte del Jaque";
$meta_descripcion = "Busca contenidos dentro de El Arte del Jaque: fundamentos, tácticas, aperturas, finales y más.";
$pagina_actual    = "buscar";
$header_titulo    = "Buscar";
$header_tagline   = "Encuentra lo que necesitas";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

$Q_MIN = 2;
$Q_MAX = 60;

// Índice de contenidos del sitio (título, URL, descripción y palabras clave).
$indice = [
    ['titulo' => 'Inicio', 'url' => '../index.php',
     'descripcion' => 'Aprende ajedrez desde cero con guías, estrategias y ejercicios para mejorar tus habilidades y dominar el tablero.',
     'claves' => 'inicio home ajedrez aprender'],
    ['titulo' => 'Fundamentos', 'url' => 'fundamentos.php',
     'descripcion' => 'Qué es el ajedrez, el tablero, el movimiento y valor de cada pieza, jaque, enroque, promoción y las reglas básicas.',
     'claves' => 'tablero piezas peón alfil caballo torre dama rey reglas enroque promoción captura al paso'],
    ['titulo' => 'Tácticas', 'url' => 'tacticas.php',
     'descripcion' => 'Las tácticas más importantes del ajedrez: horquillas, clavadas, ataques descubiertos y cómo encontrarlas en tus partidas.',
     'claves' => 'horquilla clavada ataque descubierto doble ataque sacrificio combinación'],
    ['titulo' => 'Estrategias', 'url' => 'estrategias.php',
     'descripcion' => 'El medio juego, la planificación estratégica y recursos como la batería de piezas.',
     'claves' => 'medio juego plan estrategia batería espacio estructura de peones columna abierta'],
    ['titulo' => 'Aperturas', 'url' => 'aperturas.php',
     'descripcion' => 'Las aperturas del ajedrez, incluyendo la clásica Apertura Italiana.',
     'claves' => 'apertura italiana desarrollo centro gambito defensa'],
    ['titulo' => 'Finales', 'url' => 'finales.php',
     'descripcion' => 'El rey como pieza activa, el jaque, el jaque mate y el empate: todo sobre el final de la partida.',
     'claves' => 'final jaque mate empate tablas ahogado rey activo'],
    ['titulo' => 'Partidas Históricas', 'url' => 'partidas.php',
     'descripcion' => 'Cinco partidas históricas del ajedrez que todo estudiante debería conocer, con su contexto y lecciones.',
     'claves' => 'partidas historia campeones inmortal maestros'],
    ['titulo' => 'Ejercicios', 'url' => 'ejercicios.php',
     'descripcion' => 'Pon a prueba tus habilidades con ejercicios y partidas de práctica.',
     'claves' => 'ejercicios práctica problemas mate en uno solución'],
    ['titulo' => 'Glosario', 'url' => 'glosario.php',
     'descripcion' => 'Más de 30 términos de ajedrez explicados de forma sencilla, ordenados alfabéticamente.',
     'claves' => 'glosario términos definiciones diccionario vocabulario'],
    ['titulo' => 'Recursos', 'url' => 'recursos.php',
     'descripcion' => 'Libros, plataformas y herramientas recomendadas para seguir aprendiendo y practicando ajedrez.',
     'claves' => 'recursos libros plataformas herramientas jugar online'],
    ['titulo' => 'Sobre el Sitio', 'url' => 'sobre-el-sitio.php',
     'descripcion' => 'Conoce más sobre El Arte del Jaque, un sitio educativo dedicado a enseñar ajedrez.',
     'claves' => 'sobre el sitio autor proyecto acerca'],
    ['titulo' => 'Contacto', 'url' => 'contacto.php',
     'descripcion' => 'Envíanos tus consultas, sugerencias o comentarios sobre el sitio.',
     'claves' => 'contacto formulario consulta sugerencia mensaje correo'],
];

/** Pasa a minúsculas y quita tildes para comparar sin importar acentos. */
function normalizar($texto)
{
    $texto = function_exists('mb_strtolower') ? mb_strtolower($texto, 'UTF-8') : strtolower($texto);
    return strtr($texto, ['á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u', 'ü' => 'u', 'ñ' => 'n']);
}

/** Escapa el texto y resalta con <mark> las coincidencias exactas de la consulta. */
function resaltar($texto, $consulta)
{
    if ($consulta === '') {
        return e($texto);
    }

    // Se divide el texto ORIGINAL por la consulta y se escapa cada parte por
    // separado: así el <mark> nunca rompe una entidad HTML (&amp;, &quot;...).
    // Cada vocal/ñ de la consulta acepta también su versión con tilde.
    $patron = strtr(preg_quote(normalizar($consulta), '/'), [
        'a' => '[aá]', 'e' => '[eé]', 'i' => '[ií]', 'o' => '[oó]', 'u' => '[uúü]', 'n' => '[nñ]',
    ]);
    $partes = preg_split('/(' . $patron . ')/iu', $texto, -1, PREG_SPLIT_DELIM_CAPTURE);
    if ($partes === false) {
        return e($texto);
    }

    $html = '';
    foreach ($partes as $i => $parte) {
        // Las posiciones impares son las coincidencias capturadas.
        $html .= ($i % 2 === 1) ? '<mark>' . e($parte) . '</mark>' : e($parte);
    }
    return $html;
}

// ---- Lectura y validación del parámetro GET ----
$q          = limpiar_texto($_GET['q'] ?? '');
$hay_q      = array_key_exists('q', $_GET);
$error      = '';
$resultados = [];

if ($hay_q) {
    if ($q === '') {
        $error = 'Escribí algo para buscar.';
    } elseif (longitud($q) < $Q_MIN) {
        $error = "La búsqueda debe tener al menos $Q_MIN caracteres.";
    } elseif (longitud($q) > $Q_MAX) {
        $error = "La búsqueda no puede superar los $Q_MAX caracteres.";
    } else {
        $q_norm = normalizar($q);
        foreach ($indice as $item) {
            $texto = normalizar($item['titulo'] . ' ' . $item['descripcion'] . ' ' . $item['claves']);
            if (strpos($texto, $q_norm) !== false) {
                $resultados[] = $item;
            }
        }
    }
}

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Buscar</span>
                    <h1>Buscar en el sitio</h1>
                    <p>Escribe un tema, una pieza o un término de ajedrez para encontrar la sección donde se explica.</p>
                </div>

                <section class="page-section">
                    <form class="search-page-form" action="buscar.php" method="get" role="search">
                        <label for="q-pagina" class="sr-only">Término de búsqueda</label>
                        <input type="search" id="q-pagina" name="q" maxlength="<?= $Q_MAX ?>" placeholder="Ej: enroque, horquilla, italiana..." value="<?= e($q) ?>">
                        <button type="submit" class="btn-gold">Buscar</button>
                    </form>

                    <?php if ($error !== ''): ?>
                    <p class="form-alert" role="alert"><?= e($error) ?></p>
                    <?php elseif ($hay_q): ?>
                    <p class="search-summary" role="status">
                        <?= count($resultados) ?> resultado<?= count($resultados) === 1 ? '' : 's' ?> para «<?= e($q) ?>»
                    </p>

                    <?php if (!empty($resultados)): ?>
                    <div class="search-results">
                        <?php foreach ($resultados as $item): ?>
                        <article class="card">
                            <h3><a href="<?= e($item['url']) ?>"><?= resaltar($item['titulo'], $q) ?></a></h3>
                            <p><?= resaltar($item['descripcion'], $q) ?></p>
                            <a class="card-link" href="<?= e($item['url']) ?>">Ir a la sección</a>
                        </article>
                        <?php endforeach; ?>
                    </div>
                    <?php else: ?>
                    <p>No encontramos contenidos que coincidan. Probá con otra palabra o revisá el <a href="glosario.php">glosario</a>.</p>
                    <?php endif; ?>
                    <?php endif; ?>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
