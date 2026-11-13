<?php
/**
 * tp5/buscar_glosario.php
 * -----------------------------------------------------------------
 * Búsqueda en el glosario (método GET).
 *
 * Se incluye al principio de paginas/glosario.php. Lee el parámetro
 * de la URL:   glosario.php?termino=enroque
 *
 * ¿Por qué GET? Porque buscar NO modifica nada en el servidor: solo
 * consulta. Al quedar en la URL, el resultado se puede recargar,
 * guardar en favoritos o compartir con un enlace.
 *
 * Deja preparadas estas variables para la vista:
 *
 *   $termino        (string) lo que buscó el usuario, ya sanitizado
 *   $hay_busqueda   (bool)   true si llegó el parámetro "termino"
 *   $error_busqueda (string) mensaje si el parámetro no es válido
 *   $resultados     (array)  términos que coinciden con la búsqueda
 *   $terminos_por_letra (array) términos a mostrar, agrupados por
 *                    letra inicial (todos, o solo los resultados)
 *   $TERMINO_MAX    (int)    largo máximo (también va al maxlength)
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/seguridad.php';

$glosario = require __DIR__ . '/datos/glosario.php';

$TERMINO_MIN = 2;
$TERMINO_MAX = 40;

/**
 * Pasa el texto a minúsculas y le quita las tildes, para que buscar
 * "tactica" encuentre "Táctica" y "PEON" encuentre "Peón".
 */
function normalizar($texto)
{
    $texto = mb_strtolower($texto, 'UTF-8');

    return strtr($texto, [
        'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u', 'ü' => 'u', 'ñ' => 'n',
    ]);
}

/**
 * Codifica el texto con e() y marca con <mark> las partes que coinciden
 * con la búsqueda (sin importar mayúsculas ni tildes).
 *
 * Se recorre el texto ORIGINAL buscando las coincidencias y cada parte
 * se codifica por separado: así la etiqueta <mark> la agrega el sitio,
 * pero ningún texto del usuario llega al HTML sin pasar por e().
 */
function resaltar($texto, $busqueda)
{
    if ($busqueda === '') {
        return e($texto);
    }

    $texto_normalizado    = normalizar($texto);
    $busqueda_normalizada = normalizar($busqueda);
    $largo_busqueda       = largo($busqueda_normalizada);

    $html     = '';
    $posicion = 0;

    // normalizar() no cambia la cantidad de letras, así que las posiciones
    // encontradas en el texto normalizado sirven también para el original.
    while (($encontrado = mb_strpos($texto_normalizado, $busqueda_normalizada, $posicion, 'UTF-8')) !== false) {
        $html .= e(mb_substr($texto, $posicion, $encontrado - $posicion, 'UTF-8'));
        $html .= '<mark>' . e(mb_substr($texto, $encontrado, $largo_busqueda, 'UTF-8')) . '</mark>';
        $posicion = $encontrado + $largo_busqueda;
    }

    return $html . e(mb_substr($texto, $posicion, null, 'UTF-8'));
}

// -------------------------------------------------------------------
// 1) CAPTURA + SANITIZACIÓN
//    filter_input() lee $_GET['termino']: devuelve null si no existe y
//    false si llega un array (?termino[]=x) gracias a FILTER_REQUIRE_SCALAR.
//    limpiar() aplica trim().
// -------------------------------------------------------------------
$hay_busqueda   = isset($_GET['termino']);
$termino        = limpiar(filter_input(INPUT_GET, 'termino', FILTER_DEFAULT, FILTER_REQUIRE_SCALAR));
$error_busqueda = '';
$resultados     = [];

// -------------------------------------------------------------------
// 2) VALIDACIÓN
// -------------------------------------------------------------------
if ($hay_busqueda) {
    if (empty($termino)) {
        $error_busqueda = 'Escribe una palabra para buscar en el glosario.';
    } elseif (largo($termino) < $TERMINO_MIN) {
        $error_busqueda = "La búsqueda debe tener al menos $TERMINO_MIN caracteres.";
    } elseif (largo($termino) > $TERMINO_MAX) {
        $error_busqueda = "La búsqueda no puede superar los $TERMINO_MAX caracteres.";
    } elseif (!preg_match("/^[\\p{L}0-9 '-]+$/u", $termino)) {
        // Los términos del glosario solo tienen letras, números, espacios,
        // apóstrofos y guiones: cualquier otro carácter (<, >, ", ;, etc.)
        // es un parámetro incorrecto.
        $error_busqueda = 'La búsqueda solo puede contener letras, números, espacios, apóstrofos y guiones.';
    } else {
        // -----------------------------------------------------------
        // 3) BÚSQUEDA: se recorre el glosario y se guardan los términos
        //    cuyo nombre o definición contienen la palabra buscada.
        // -----------------------------------------------------------
        $busqueda = normalizar($termino);

        foreach ($glosario as $item) {
            $en_termino    = mb_strpos(normalizar($item['termino']), $busqueda, 0, 'UTF-8') !== false;
            $en_definicion = mb_strpos(normalizar($item['definicion']), $busqueda, 0, 'UTF-8') !== false;

            if ($en_termino || $en_definicion) {
                $resultados[] = $item;
            }
        }
    }
}

// -------------------------------------------------------------------
// 4) AGRUPAR POR LETRA para dibujar el glosario igual que antes
//    (encabezado A, C, D... con su acordeón).
//    - Sin búsqueda (o con búsqueda inválida): se muestran todos.
//    - Con búsqueda válida: solo los resultados.
// -------------------------------------------------------------------
$a_mostrar = ($hay_busqueda && $error_busqueda === '') ? $resultados : $glosario;

$terminos_por_letra = [];
foreach ($a_mostrar as $item) {
    $letra = mb_strtoupper(mb_substr(normalizar($item['termino']), 0, 1, 'UTF-8'), 'UTF-8');
    $terminos_por_letra[$letra][] = $item;
}
