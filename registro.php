<?php
/**
 * registro.php
 * -----------------------------------------------------------------
 * TP8 — Alta de usuarios.
 *
 * GET  -> formulario vacío.
 * POST -> valida del lado del servidor; si hay errores vuelve a
 *         mostrar el formulario con los mensajes y los datos (menos
 *         la contraseña). Si todo está bien, guarda el usuario con la
 *         contraseña hasheada y redirige a login.php?registro=ok.
 *
 * El rol de todo usuario nuevo es SIEMPRE "usuario" (en la base,
 * el rol 'estudiante'). Nunca se toma del formulario: si alguien
 * agrega un campo "rol" con las herramientas del navegador, se ignora.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/includes/usuarios.php';

// Si ya inició sesión, no tiene sentido registrarse: va a su panel.
redirigir_si_conectado();

$titulo_pagina    = "Crear cuenta - El Arte del Jaque";
$meta_descripcion = "Crea tu cuenta gratuita en El Arte del Jaque.";
$pagina_actual    = "registro";
$header_titulo    = "Crear cuenta";
$header_tagline   = "Súmate y sigue tu progreso";
$ruta_base        = "";
$ruta_paginas     = "paginas/";
$es_home          = false;

$datos    = ['nombre' => '', 'apellido' => '', 'email' => ''];
$errores  = [];
$error_db = $error_conexion;

if ($pdo !== null && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // trim() a cada campo de texto (limpiar() también descarta arrays).
    $datos = [
        'nombre'   => limpiar($_POST['nombre'] ?? ''),
        'apellido' => limpiar($_POST['apellido'] ?? ''),
        'email'    => mb_strtolower(limpiar($_POST['email'] ?? ''), 'UTF-8'),
    ];
    // Las contraseñas NO se recortan: un espacio también es un carácter válido.
    $password  = is_string($_POST['password'] ?? null) ? $_POST['password'] : '';
    $confirmar = is_string($_POST['confirmar'] ?? null) ? $_POST['confirmar'] : '';

    if (!csrf_valido()) {
        $errores['general'] = 'La página expiró. Vuelve a enviar el formulario.';
    }

    // Nombre y apellido: obligatorios y con el largo máximo del schema.
    foreach (['nombre' => NOMBRE_MAX, 'apellido' => APELLIDO_MAX] as $campo => $max) {
        if ($datos[$campo] === '') {
            $errores[$campo] = 'Este campo es obligatorio.';
        } elseif (largo($datos[$campo]) < 2) {
            $errores[$campo] = 'Debe tener al menos 2 caracteres.';
        } elseif (largo($datos[$campo]) > $max) {
            $errores[$campo] = "No puede superar los $max caracteres.";
        }
    }

    // Email: obligatorio, formato válido, largo máximo y que no exista.
    if ($datos['email'] === '') {
        $errores['email'] = 'El email es obligatorio.';
    } elseif (largo($datos['email']) > EMAIL_MAX) {
        $errores['email'] = 'El email no puede superar los ' . EMAIL_MAX . ' caracteres.';
    } elseif (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'Escribe un email válido (ej: nombre@correo.com).';
    }

    // Contraseña: al menos 8 caracteres, máximo 72 bytes (límite de bcrypt)
    // y que coincida con la confirmación.
    if ($password === '') {
        $errores['password'] = 'La contraseña es obligatoria.';
    } elseif (largo($password) < PASSWORD_MIN) {
        $errores['password'] = 'La contraseña debe tener al menos ' . PASSWORD_MIN . ' caracteres.';
    } elseif (strlen($password) > PASSWORD_MAX) {
        $errores['password'] = 'La contraseña es demasiado larga (máximo ' . PASSWORD_MAX . ' caracteres).';
    }
    if (!isset($errores['password']) && $password !== $confirmar) {
        $errores['confirmar'] = 'Las contraseñas no coinciden.';
    }

    if (empty($errores)) {
        try {
            if (email_registrado($pdo, $datos['email'])) {
                $errores['email'] = 'Ya existe una cuenta con ese email.';
            } else {
                // password_hash() con bcrypt: genera una "sal" aleatoria y
                // guarda un hash de 60 caracteres. La contraseña original
                // no se guarda en ningún lado.
                $hash = password_hash($password, PASSWORD_BCRYPT);

                // INSERT preparado. El rol está fijo en el SQL ('estudiante',
                // que la aplicación llama 'usuario'): no viene del formulario.
                $stmt = $pdo->prepare("INSERT INTO usuarios (rol_id, nombre, apellido, email, password)
                                       VALUES ((SELECT id FROM roles WHERE nombre = 'estudiante'),
                                               :nombre, :apellido, :email, :password)");
                $stmt->execute([
                    ':nombre'   => $datos['nombre'],
                    ':apellido' => $datos['apellido'],
                    ':email'    => $datos['email'],
                    ':password' => $hash,
                ]);

                // PRG: se redirige para que recargar no repita el alta.
                redirigir('login.php?registro=ok');
            }
        } catch (PDOException $ex) {
            // 23000 = el UNIQUE del email (dos registros al mismo tiempo).
            if ($ex->getCode() === '23000') {
                $errores['email'] = 'Ya existe una cuenta con ese email.';
            } else {
                error_log('Registro: ' . $ex->getMessage());   // sin datos del usuario ni contraseñas
                $errores['general'] = 'No se pudo crear la cuenta. Intenta de nuevo más tarde.';
            }
        }
    }
}

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">TP8 · Registro</span>
                    <h1>Crear cuenta</h1>
                    <p>Regístrate para tener tu propio panel. Si ya tienes cuenta, <a href="login.php" class="link-gold">inicia sesión</a>.</p>
                </div>

                <section class="page-section">
                    <?php if ($error_db !== ''): ?>
                    <p class="form-alert admin-alert" role="alert"><?= e($error_db) ?></p>
                    <?php else: ?>
                    <form class="form-panel" action="registro.php" method="post" novalidate>

                        <?php if (isset($errores['general'])): ?>
                        <p class="form-alert" role="alert"><?= e($errores['general']) ?></p>
                        <?php elseif (!empty($errores)): ?>
                        <p class="form-alert" role="alert">No se pudo crear la cuenta. Revisa los campos marcados en rojo.</p>
                        <?php endif; ?>

                        <?= csrf_campo() ?>

                        <div class="admin-form-grid admin-form-grid--2">
                            <div class="form-group<?= clase_error_campo('nombre', $errores) ?>">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" maxlength="<?= NOMBRE_MAX ?>" autocomplete="given-name" value="<?= e($datos['nombre']) ?>" required>
                                <?= mensaje_error_campo('nombre', $errores) ?>
                            </div>

                            <div class="form-group<?= clase_error_campo('apellido', $errores) ?>">
                                <label for="apellido">Apellido</label>
                                <input type="text" id="apellido" name="apellido" maxlength="<?= APELLIDO_MAX ?>" autocomplete="family-name" value="<?= e($datos['apellido']) ?>" required>
                                <?= mensaje_error_campo('apellido', $errores) ?>
                            </div>
                        </div>

                        <div class="form-group<?= clase_error_campo('email', $errores) ?>">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" maxlength="<?= EMAIL_MAX ?>" autocomplete="email" placeholder="nombre@correo.com" value="<?= e($datos['email']) ?>" required>
                            <?= mensaje_error_campo('email', $errores) ?>
                        </div>

                        <?php // Las contraseñas nunca se vuelven a mostrar en el value. ?>
                        <div class="form-group<?= clase_error_campo('password', $errores) ?>">
                            <label for="password">Contraseña <small>(mínimo <?= PASSWORD_MIN ?> caracteres)</small></label>
                            <input type="password" id="password" name="password" minlength="<?= PASSWORD_MIN ?>" autocomplete="new-password" required>
                            <?= mensaje_error_campo('password', $errores) ?>
                        </div>

                        <div class="form-group<?= clase_error_campo('confirmar', $errores) ?>">
                            <label for="confirmar">Confirmar contraseña</label>
                            <input type="password" id="confirmar" name="confirmar" autocomplete="new-password" required>
                            <?= mensaje_error_campo('confirmar', $errores) ?>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-gold">Crear cuenta</button>
                            <a href="login.php" class="btn-outline">Ya tengo cuenta</a>
                        </div>
                    </form>
                    <?php endif; ?>
                </section>

            </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
