<?php
/**
 * contacto.php
 * Página migrada desde paginas/contacto.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 *
 * Clase 5 — Formulario con método POST:
 *   - Los datos se procesan en el servidor (no solo con JavaScript).
 *   - Validación server-side de cada campo + lista blanca de motivos.
 *   - Token CSRF para rechazar envíos que no salen de este formulario.
 *   - Campo "honeypot" oculto para frenar bots de spam.
 *   - Toda salida se escapa con e() (htmlspecialchars) para evitar XSS.
 *   - Patrón PRG (Post/Redirect/Get): tras un envío correcto se
 *     redirige con GET, así recargar la página no reenvía el formulario.
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/seguridad.php';

iniciar_sesion();

$titulo_pagina    = "Contacto - El Arte del Jaque";
$meta_descripcion = "Envíanos tus consultas, sugerencias o comentarios sobre el sitio.";
$pagina_actual    = "contacto";
$header_titulo    = "Contacto";
$header_tagline   = "Estamos para ayudarte";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

// Opciones permitidas para el <select> (lista blanca).
$motivos_validos = [
    'consulta'   => 'Consulta',
    'sugerencia' => 'Sugerencia',
    'error'      => 'Informar un error',
    'otro'       => 'Otro',
];

$NOMBRE_MAX  = 60;
$MENSAJE_MIN = 10;
$MENSAJE_MAX = 500;

// Valores que se vuelven a mostrar en el formulario si hay errores.
$datos   = ['nombre' => '', 'email' => '', 'motivo' => '', 'mensaje' => '', 'aceptar' => false];
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1) Token CSRF
    if (!csrf_valido($_POST['csrf_token'] ?? null)) {
        $errores['general'] = 'La sesión del formulario expiró o no es válida. Volvé a intentarlo.';
    }

    // 2) Honeypot: un humano nunca completa este campo (está oculto).
    $es_bot = limpiar_texto($_POST['sitio_web'] ?? '') !== '';

    // 3) Lectura y normalización de los datos
    $datos['nombre']  = limpiar_texto($_POST['nombre'] ?? '');
    $datos['email']   = limpiar_texto($_POST['email'] ?? '');
    $datos['motivo']  = limpiar_texto($_POST['motivo'] ?? '');
    $datos['mensaje'] = limpiar_texto($_POST['mensaje'] ?? '');
    $datos['aceptar'] = isset($_POST['aceptar']);

    // 4) Validación server-side
    if ($datos['nombre'] === '') {
        $errores['nombre'] = 'El nombre es obligatorio.';
    } elseif (longitud($datos['nombre']) > $NOMBRE_MAX) {
        $errores['nombre'] = "El nombre no puede superar los $NOMBRE_MAX caracteres.";
    } elseif (!preg_match("/^[\\p{L} .'-]+$/u", $datos['nombre'])) {
        $errores['nombre'] = 'El nombre solo puede contener letras, espacios, apóstrofos y guiones.';
    }

    if ($datos['email'] === '') {
        $errores['email'] = 'El correo electrónico es obligatorio.';
    } elseif (filter_var($datos['email'], FILTER_VALIDATE_EMAIL) === false) {
        $errores['email'] = 'Ingresá un correo electrónico válido.';
    }

    if (!array_key_exists($datos['motivo'], $motivos_validos)) {
        $errores['motivo'] = 'Seleccioná un motivo de contacto.';
    }

    if ($datos['mensaje'] === '') {
        $errores['mensaje'] = 'El mensaje es obligatorio.';
    } elseif (longitud($datos['mensaje']) < $MENSAJE_MIN) {
        $errores['mensaje'] = "El mensaje debe tener al menos $MENSAJE_MIN caracteres.";
    } elseif (longitud($datos['mensaje']) > $MENSAJE_MAX) {
        $errores['mensaje'] = "El mensaje no puede superar los $MENSAJE_MAX caracteres.";
    }

    if (!$datos['aceptar']) {
        $errores['aceptar'] = 'Debés aceptar el envío del formulario.';
    }

    // 5) Resultado
    if (empty($errores)) {
        if (!$es_bot) {
            // Aquí se enviaría el correo a APP_EMAIL o se guardaría en una
            // base de datos. Para la clase solo se guarda un resumen en la
            // sesión para mostrarlo después de la redirección.
            $_SESSION['contacto_enviado'] = [
                'nombre' => $datos['nombre'],
                'motivo' => $motivos_validos[$datos['motivo']],
            ];
        } else {
            // Al bot se le responde igual que a un usuario, sin revelar el filtro.
            $_SESSION['contacto_enviado'] = ['nombre' => '', 'motivo' => ''];
        }

        // Se renueva el token para que el mismo formulario no se pueda reenviar.
        unset($_SESSION['csrf_token']);

        // PRG: redirección 303 -> la página se vuelve a pedir con GET.
        header('Location: contacto.php?enviado=1', true, 303);
        exit;
    }
}

// Mensaje de éxito (solo se muestra una vez: "flash message").
$envio_ok = null;
if (isset($_GET['enviado']) && isset($_SESSION['contacto_enviado'])) {
    $envio_ok = $_SESSION['contacto_enviado'];
    unset($_SESSION['contacto_enviado']);
}

/** Devuelve la clase de error para el contenedor de un campo. */
function clase_error($campo, $errores)
{
    return isset($errores[$campo]) ? ' has-error' : '';
}

/** Imprime el <span> de error de un campo (el mismo que usa main.js). */
function span_error($campo, $errores)
{
    if (!isset($errores[$campo])) {
        return '';
    }
    return '<span class="field-error" role="alert">' . e($errores[$campo]) . '</span>';
}

/** Atributo aria-invalid para los campos con error. */
function aria_error($campo, $errores)
{
    return isset($errores[$campo]) ? ' aria-invalid="true"' : '';
}

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Contacto</span>
                    <h1>Hablemos</h1>
                    <p>Si tienes alguna consulta, sugerencia o comentario sobre el sitio, puedes enviarnos un mensaje mediante el siguiente formulario.</p>
                </div>

                <section class="page-section">
                    <form class="form-panel" action="contacto.php" method="post" novalidate id="contactForm">

                        <?php if ($envio_ok !== null): ?>
                        <p class="field-success" id="formSuccess" role="status">
                            ¡Gracias<?= $envio_ok['nombre'] !== '' ? ', ' . e($envio_ok['nombre']) : '' ?>! Tu mensaje<?= $envio_ok['motivo'] !== '' ? ' (' . e($envio_ok['motivo']) . ')' : '' ?> fue enviado correctamente.
                        </p>
                        <?php endif; ?>

                        <?php if (isset($errores['general'])): ?>
                        <p class="form-alert" role="alert"><?= e($errores['general']) ?></p>
                        <?php elseif (!empty($errores)): ?>
                        <p class="form-alert" role="alert">Revisá los campos marcados antes de enviar el formulario.</p>
                        <?php endif; ?>

                        <?= csrf_campo() ?>

                        <!-- Honeypot anti-spam: oculto para personas, visible para bots -->
                        <div class="form-honeypot" aria-hidden="true">
                            <label for="sitio_web">No completar este campo</label>
                            <input type="text" id="sitio_web" name="sitio_web" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="form-group<?= clase_error('nombre', $errores) ?>">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" maxlength="<?= $NOMBRE_MAX ?>" value="<?= e($datos['nombre']) ?>" required<?= aria_error('nombre', $errores) ?>>
                            <?= span_error('nombre', $errores) ?>
                        </div>

                        <div class="form-group<?= clase_error('email', $errores) ?>">
                            <label for="email">Correo electrónico</label>
                            <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" value="<?= e($datos['email']) ?>" required<?= aria_error('email', $errores) ?>>
                            <?= span_error('email', $errores) ?>
                        </div>

                        <div class="form-group<?= clase_error('motivo', $errores) ?>">
                            <label for="motivo">Motivo</label>
                            <select id="motivo" name="motivo" required<?= aria_error('motivo', $errores) ?>>
                                <option value="">Selecciona una opción</option>
                                <?php foreach ($motivos_validos as $valor => $texto): ?>
                                <option value="<?= e($valor) ?>"<?= $datos['motivo'] === $valor ? ' selected' : '' ?>><?= e($texto) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= span_error('motivo', $errores) ?>
                        </div>

                        <div class="form-group<?= clase_error('mensaje', $errores) ?>">
                            <label for="mensaje">Mensaje</label>
                            <textarea id="mensaje" name="mensaje" rows="6" placeholder="Escribe tu mensaje..." minlength="<?= $MENSAJE_MIN ?>" maxlength="<?= $MENSAJE_MAX ?>" required<?= aria_error('mensaje', $errores) ?>><?= e($datos['mensaje']) ?></textarea>
                            <?= span_error('mensaje', $errores) ?>
                        </div>

                        <div class="form-checkbox<?= clase_error('aceptar', $errores) ?>">
                            <input type="checkbox" id="aceptar" name="aceptar" value="1"<?= $datos['aceptar'] ? ' checked' : '' ?> required<?= aria_error('aceptar', $errores) ?>>
                            <label for="aceptar">Acepto enviar este formulario.</label>
                            <?= span_error('aceptar', $errores) ?>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-gold">Enviar</button>
                            <button type="reset" class="btn-outline">Borrar</button>
                        </div>

                    </form>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
