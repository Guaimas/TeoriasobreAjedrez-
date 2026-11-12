<?php
/**
 * clase5/procesar_contacto.php
 * -----------------------------------------------------------------
 * Procesamiento del formulario de contacto (método POST).
 *
 * Se incluye al principio de paginas/contacto.php, ANTES de imprimir
 * el HTML. Deja preparadas estas variables para la vista:
 *
 *   $motivos_validos  (array)  opciones permitidas del <select>
 *   $datos            (array)  valores ya sanitizados (para volver a
 *                              mostrarlos en el formulario si hay error)
 *   $errores          (array)  mensaje de error por cada campo
 *   $envio_exitoso    (bool)   true si el formulario pasó la validación
 *   $nombre_enviado   (string) nombre de quien envió (mensaje de éxito)
 *   $motivo_enviado   (string) texto del motivo elegido (mensaje de éxito)
 *
 * ¿Por qué POST? Porque el formulario ENVÍA información al servidor
 * (un mensaje con datos personales): no debe quedar en la URL, en el
 * historial ni en los favoritos, como pasaría con GET.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/seguridad.php';

// Opciones permitidas para el campo "motivo" (lista blanca).
// Solo se aceptan estas claves: cualquier otro valor se rechaza.
$motivos_validos = [
    'consulta'   => 'Consulta',
    'sugerencia' => 'Sugerencia',
    'error'      => 'Informar un error',
    'otro'       => 'Otro',
];

// Límites de longitud (se usan en PHP y también en los atributos maxlength del HTML).
$NOMBRE_MAX  = 60;
$MENSAJE_MIN = 10;
$MENSAJE_MAX = 500;

// Valores iniciales: formulario vacío y sin errores.
$datos = [
    'nombre'  => '',
    'email'   => '',
    'motivo'  => '',
    'mensaje' => '',
    'aceptar' => false,
];
$errores        = [];
$envio_exitoso  = false;
$nombre_enviado = '';
$motivo_enviado = '';

// Solo se procesa si la página se pidió con POST (es decir, si se envió el formulario).
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    // ---------------------------------------------------------------
    // 1) CAPTURA + SANITIZACIÓN
    //    filter_input() lee el valor de $_POST de forma controlada:
    //    - devuelve null si el campo no existe;
    //    - FILTER_REQUIRE_SCALAR hace que devuelva false si llega un
    //      array en lugar de un texto.
    //    Después limpiar() aplica trim() y descarta lo que no sea texto.
    // ---------------------------------------------------------------
    $datos['nombre']  = limpiar(filter_input(INPUT_POST, 'nombre',  FILTER_DEFAULT, FILTER_REQUIRE_SCALAR));
    $datos['email']   = limpiar(filter_input(INPUT_POST, 'email',   FILTER_DEFAULT, FILTER_REQUIRE_SCALAR));
    $datos['motivo']  = limpiar(filter_input(INPUT_POST, 'motivo',  FILTER_DEFAULT, FILTER_REQUIRE_SCALAR));
    $datos['mensaje'] = limpiar(filter_input(INPUT_POST, 'mensaje', FILTER_DEFAULT, FILTER_REQUIRE_SCALAR));

    // Un checkbox sin marcar NO se envía: alcanza con comprobar si existe.
    $datos['aceptar'] = isset($_POST['aceptar']);

    // ---------------------------------------------------------------
    // 2) VALIDACIÓN (en el servidor: no depende de "required",
    //    type="email" ni de JavaScript, que el usuario puede saltear)
    // ---------------------------------------------------------------

    // Nombre: obligatorio, largo máximo y solo letras/espacios/apóstrofos/guiones.
    if (empty($datos['nombre'])) {
        $errores['nombre'] = 'El nombre es obligatorio.';
    } elseif (largo($datos['nombre']) > $NOMBRE_MAX) {
        $errores['nombre'] = "El nombre no puede superar los $NOMBRE_MAX caracteres.";
    } elseif (!preg_match("/^[\\p{L} '-]+$/u", $datos['nombre'])) {
        $errores['nombre'] = 'El nombre solo puede contener letras, espacios, apóstrofos y guiones.';
    }

    // Email: obligatorio, sin caracteres prohibidos y con formato válido.
    if (empty($datos['email'])) {
        $errores['email'] = 'El correo electrónico es obligatorio.';
    } elseif (filter_var($datos['email'], FILTER_SANITIZE_EMAIL) !== $datos['email']) {
        // FILTER_SANITIZE_EMAIL (sanitización) quita los caracteres que no
        // pueden ir en un email. Si el resultado es distinto del original,
        // el dato traía caracteres prohibidos. No se corrige en silencio:
        // se avisa al usuario para que lo revise.
        $errores['email'] = 'El correo electrónico contiene caracteres no permitidos (espacios, <, >, comillas, etc.).';
    } elseif (filter_var($datos['email'], FILTER_VALIDATE_EMAIL) === false) {
        // FILTER_VALIDATE_EMAIL (validación) comprueba el formato: usuario@dominio.ext
        $errores['email'] = 'Ingresa un correo electrónico válido (por ejemplo: nombre@correo.com).';
    }

    // Motivo: tiene que ser una de las opciones de la lista blanca.
    if (empty($datos['motivo'])) {
        $errores['motivo'] = 'Selecciona un motivo de contacto.';
    } elseif (!array_key_exists($datos['motivo'], $motivos_validos)) {
        $errores['motivo'] = 'El motivo seleccionado no es válido.';
    }

    // Mensaje: obligatorio y con largo mínimo y máximo.
    if (empty($datos['mensaje'])) {
        $errores['mensaje'] = 'El mensaje es obligatorio.';
    } elseif (largo($datos['mensaje']) < $MENSAJE_MIN) {
        $errores['mensaje'] = "El mensaje debe tener al menos $MENSAJE_MIN caracteres.";
    } elseif (largo($datos['mensaje']) > $MENSAJE_MAX) {
        $errores['mensaje'] = "El mensaje no puede superar los $MENSAJE_MAX caracteres.";
    }

    // Aceptación: la casilla tiene que estar marcada.
    if (!$datos['aceptar']) {
        $errores['aceptar'] = 'Debes aceptar el envío del formulario.';
    }

    // ---------------------------------------------------------------
    // 3) RESULTADO
    // ---------------------------------------------------------------
    if (empty($errores)) {
        $envio_exitoso  = true;
        $nombre_enviado = $datos['nombre'];
        $motivo_enviado = $motivos_validos[$datos['motivo']];

        // Aquí se enviaría el mensaje por correo a APP_EMAIL o se guardaría
        // en una base de datos. El TP no lo exige, así que no se almacena.

        // Se vacía el formulario para que quede listo para un nuevo mensaje.
        $datos = ['nombre' => '', 'email' => '', 'motivo' => '', 'mensaje' => '', 'aceptar' => false];
    }
    // Si hubo errores, $datos conserva lo que escribió el usuario
    // y la vista lo vuelve a mostrar (siempre con e()).
}

/** Devuelve " has-error" si el campo tiene error (clase CSS ya existente). */
function clase_error($campo, $errores)
{
    return isset($errores[$campo]) ? ' has-error' : '';
}

/** Devuelve el <span> con el mensaje de error del campo (mismo formato que usa main.js). */
function mensaje_error($campo, $errores)
{
    if (!isset($errores[$campo])) {
        return '';
    }

    return '<span class="field-error" role="alert">' . e($errores[$campo]) . '</span>';
}

/** Devuelve aria-invalid="true" para que los lectores de pantalla anuncien el error. */
function aria_error($campo, $errores)
{
    return isset($errores[$campo]) ? ' aria-invalid="true"' : '';
}
