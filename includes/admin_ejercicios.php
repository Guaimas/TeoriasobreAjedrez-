<?php
/**
 * includes/admin_ejercicios.php
 * -----------------------------------------------------------------
 * TP7 — Funciones del módulo de administración de ejercicios.
 *
 * Las usan admin/index.php, crear.php, editar.php y eliminar.php:
 *   - consultas a la base (siempre con consultas preparadas cuando
 *     reciben datos)
 *   - validación del formulario del lado del servidor
 *   - ayudas para mostrar los errores en el formulario
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../tp5/seguridad.php';   // e(), limpiar(), largo()
require_once __DIR__ . '/auth_guard.php';             // TP8: requerir_rol(), sesión segura y token CSRF

// Valores permitidos y largos máximos, tomados de tp6/schema.sql.
const NIVELES_VALIDOS = ['Principiante', 'Intermedio', 'Avanzado'];
const ENUNCIADO_MAX   = 255;    // VARCHAR(255)
const FEN_MAX         = 100;    // VARCHAR(100)
const EXPLICACION_MAX = 2000;   // TEXT admite más; se fija un límite razonable

/** Temas para el <select> (tabla maestra). No recibe datos: query() simple. */
function obtener_temas(PDO $pdo): array
{
    return $pdo->query('SELECT id, nombre FROM temas ORDER BY nombre')->fetchAll();
}

/** Usuarios que pueden figurar como autor del ejercicio. */
function obtener_autores(PDO $pdo): array
{
    return $pdo->query("SELECT id, CONCAT(nombre, ' ', apellido) AS nombre_completo
                        FROM usuarios ORDER BY nombre, apellido")->fetchAll();
}

/**
 * Busca un ejercicio por id. Devuelve el array de la fila o null.
 *
 * CONSULTA PREPARADA: el id viaja aparte del SQL, en el marcador
 * :id. Aunque alguien mande "1 OR 1=1", MySQL lo trata como un dato,
 * nunca como parte de la consulta.
 */
function buscar_ejercicio(PDO $pdo, int $id): ?array
{
    $stmt = $pdo->prepare('SELECT id, tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion
                           FROM ejercicios WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $fila = $stmt->fetch();

    return $fila === false ? null : $fila;
}

/** ¿Existe una fila con ese id en la tabla indicada? (solo tablas fijas del código) */
function existe_id(PDO $pdo, string $tabla, int $id): bool
{
    // El nombre de la tabla NO viene del usuario: se elige de esta lista fija.
    if (!in_array($tabla, ['temas', 'usuarios', 'ejercicios'], true)) {
        return false;
    }

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM $tabla WHERE id = :id");
    $stmt->execute([':id' => $id]);

    return (int) $stmt->fetchColumn() > 0;
}

/**
 * Comprueba que una posición FEN (solo la parte de las piezas) tenga
 * 8 filas separadas por "/" y que cada fila sume 8 casillas.
 */
function fen_valida(string $fen): bool
{
    $filas = explode('/', $fen);
    if (count($filas) !== 8) {
        return false;
    }

    foreach ($filas as $fila) {
        if (!preg_match('/^[prnbqkPRNBQK1-8]+$/', $fila)) {
            return false;
        }
        $casillas = 0;
        foreach (str_split($fila) as $c) {
            $casillas += ctype_digit($c) ? (int) $c : 1;
        }
        if ($casillas !== 8) {
            return false;
        }
    }

    return true;
}

/**
 * Lee el formulario enviado por POST y lo valida del lado del servidor.
 * Devuelve [$datos, $errores]:
 *   $datos   -> valores limpios (para guardar o para volver a mostrar)
 *   $errores -> array campo => mensaje (vacío si todo está bien)
 */
function validar_ejercicio(PDO $pdo): array
{
    $datos = [
        'tema_id'      => limpiar($_POST['tema_id'] ?? ''),
        'autor_id'     => limpiar($_POST['autor_id'] ?? ''),
        'nivel'        => limpiar($_POST['nivel'] ?? ''),
        'enunciado'    => limpiar($_POST['enunciado'] ?? ''),
        'posicion_fen' => limpiar($_POST['posicion_fen'] ?? ''),
        'explicacion'  => limpiar($_POST['explicacion'] ?? ''),
    ];
    $errores = [];

    // Tema: obligatorio, entero y que exista en la tabla temas (FK).
    $tema_id = filter_var($datos['tema_id'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    if ($datos['tema_id'] === '') {
        $errores['tema_id'] = 'Elegí un tema.';
    } elseif ($tema_id === false || !existe_id($pdo, 'temas', $tema_id)) {
        $errores['tema_id'] = 'El tema elegido no es válido.';
    }

    // Autor: opcional; si viene, entero y existente en usuarios.
    if ($datos['autor_id'] !== '') {
        $autor_id = filter_var($datos['autor_id'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        if ($autor_id === false || !existe_id($pdo, 'usuarios', $autor_id)) {
            $errores['autor_id'] = 'El autor elegido no es válido.';
        }
    }

    // Nivel: obligatorio y uno de los valores del ENUM.
    if ($datos['nivel'] === '') {
        $errores['nivel'] = 'Elegí un nivel.';
    } elseif (!in_array($datos['nivel'], NIVELES_VALIDOS, true)) {
        $errores['nivel'] = 'El nivel elegido no es válido.';
    }

    // Enunciado: obligatorio, entre 10 y 255 caracteres.
    if ($datos['enunciado'] === '') {
        $errores['enunciado'] = 'El enunciado es obligatorio.';
    } elseif (largo($datos['enunciado']) < 10) {
        $errores['enunciado'] = 'El enunciado debe tener al menos 10 caracteres.';
    } elseif (largo($datos['enunciado']) > ENUNCIADO_MAX) {
        $errores['enunciado'] = 'El enunciado no puede superar los ' . ENUNCIADO_MAX . ' caracteres.';
    }

    // Posición FEN: opcional; si viene, máximo 100 caracteres y formato válido.
    if ($datos['posicion_fen'] !== '') {
        if (largo($datos['posicion_fen']) > FEN_MAX) {
            $errores['posicion_fen'] = 'La posición no puede superar los ' . FEN_MAX . ' caracteres.';
        } elseif (!fen_valida($datos['posicion_fen'])) {
            $errores['posicion_fen'] = 'Formato FEN no válido: 8 filas separadas por "/" (ej: r3k3/8/8/3N4/8/8/8/4K3).';
        }
    }

    // Explicación: obligatoria, entre 10 y 2000 caracteres.
    if ($datos['explicacion'] === '') {
        $errores['explicacion'] = 'La explicación es obligatoria.';
    } elseif (largo($datos['explicacion']) < 10) {
        $errores['explicacion'] = 'La explicación debe tener al menos 10 caracteres.';
    } elseif (largo($datos['explicacion']) > EXPLICACION_MAX) {
        $errores['explicacion'] = 'La explicación no puede superar los ' . EXPLICACION_MAX . ' caracteres.';
    }

    return [$datos, $errores];
}

/**
 * Convierte $datos en los parámetros de la consulta preparada.
 * Los campos opcionales vacíos se guardan como NULL.
 */
function parametros_ejercicio(array $datos): array
{
    return [
        ':tema_id'      => (int) $datos['tema_id'],
        ':autor_id'     => $datos['autor_id'] === '' ? null : (int) $datos['autor_id'],
        ':nivel'        => $datos['nivel'],
        ':enunciado'    => $datos['enunciado'],
        ':posicion_fen' => $datos['posicion_fen'] === '' ? null : $datos['posicion_fen'],
        ':explicacion'  => $datos['explicacion'],
    ];
}

/** Redirige al listado con un estado (patrón PRG) y termina el script. */
function volver_al_listado(string $estado): never
{
    header('Location: index.php?status=' . urlencode($estado));
    exit;
}

/* ---- Ayudas para mostrar los errores en el formulario ---- */

function admin_clase_error(string $campo, array $errores): string
{
    return isset($errores[$campo]) ? ' has-error' : '';
}

function admin_mensaje_error(string $campo, array $errores): string
{
    // El mensaje se escapa con e() como cualquier otro texto impreso.
    return isset($errores[$campo])
        ? '<span class="field-error" role="alert">' . e($errores[$campo]) . '</span>'
        : '';
}
