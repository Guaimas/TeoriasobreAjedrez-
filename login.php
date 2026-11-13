<?php
/**
 * login.php
 * -----------------------------------------------------------------
 * TP8 — Inicio de sesión.
 *
 * 1. Busca el usuario por email (consulta preparada, con JOIN a roles).
 * 2. Compara la contraseña escrita con el hash guardado usando
 *    password_verify().
 * 3. Si es correcta: regenera el id de sesión, guarda los datos del
 *    usuario en $_SESSION y lo manda a su panel según el rol.
 *
 * El mensaje de error es SIEMPRE "Email o contraseña incorrectos",
 * exista o no el email, para no revelar qué cuentas están registradas.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/includes/usuarios.php';   // incluye config/sesion.php: la sesión ya está iniciada

// Si ya inició sesión, va directo a su panel.
redirigir_si_conectado();

$titulo_pagina    = "Iniciar sesión - El Arte del Jaque";
$meta_descripcion = "Ingresa a tu cuenta de El Arte del Jaque.";
$pagina_actual    = "login";
$header_titulo    = "Iniciar sesión";
$header_tagline   = "Bienvenido de nuevo";
$ruta_base        = "";
$ruta_paginas     = "paginas/";
$es_home          = false;

// Mensajes que llegan por GET. Solo se acepta un valor de esta lista:
// lo que viene en la URL nunca se imprime tal cual.
$avisos = [
    'error' => [
        'acceso_denegado' => ['form-alert',    'Tienes que iniciar sesión para ver esa página.'],
        'permiso'         => ['form-alert',    'No tienes permiso para entrar a esa página.'],
    ],
    'registro' => ['ok' => ['field-success', '¡Cuenta creada! Ya puedes iniciar sesión.']],
    'logout'   => ['ok' => ['field-success', 'Cerraste la sesión correctamente.']],
];
$aviso = null;
foreach ($avisos as $parametro => $valores) {
    $valor = filter_input(INPUT_GET, $parametro, FILTER_DEFAULT, FILTER_REQUIRE_SCALAR);
    if ($valor !== null && $valor !== false && isset($valores[$valor])) {
        $aviso = $valores[$valor];
    }
}

$email    = '';
$error    = '';
$error_db = $error_conexion;

if ($pdo !== null && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = mb_strtolower(limpiar($_POST['email'] ?? ''), 'UTF-8');
    $password = is_string($_POST['password'] ?? null) ? $_POST['password'] : '';   // no se recorta

    if (!csrf_valido()) {
        $error = 'La página expiró. Vuelve a intentarlo.';
    } elseif ($email === '' || $password === '') {
        $error = 'Escribe tu email y tu contraseña.';
    } else {
        try {
            $usuario = buscar_usuario_por_email($pdo, $email);

            // Si el email no existe se verifica igual contra un hash de
            // relleno: así la respuesta tarda lo mismo y no delata si la
            // cuenta existe o no. (Hash bcrypt de una clave aleatoria descartada.)
            $hash = $usuario['password'] ?? '$2y$10$G5FAPQQb7/JNqxuWWedLdukNuoOrUqnogBEMdOEdbyLsY/qXTxfWG';

            if (!password_verify($password, $hash) || $usuario === null) {
                $error = 'Email o contraseña incorrectos.';
            } else {
                // Opcional del TP: si el hash se generó con un costo viejo,
                // se vuelve a calcular y se guarda (UPDATE preparado).
                if (password_needs_rehash($usuario['password'], PASSWORD_BCRYPT)) {
                    $stmt = $pdo->prepare('UPDATE usuarios SET password = :password WHERE id = :id');
                    $stmt->execute([':password' => password_hash($password, PASSWORD_BCRYPT), ':id' => $usuario['id']]);
                }

                // 1) La sesión ya está iniciada (config/sesion.php).
                // 2) Nuevo id de sesión, borrando el anterior: evita la
                //    "fijación de sesión" (Session Fixation), donde un
                //    atacante le impone a la víctima un id que él conoce.
                session_regenerate_id(true);
                unset($_SESSION['csrf']);   // y un token CSRF nuevo para la sesión iniciada

                // 3) Datos del usuario en la sesión. NUNCA la contraseña ni el hash.
                $_SESSION['usuario_id']     = (int) $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'] . ' ' . $usuario['apellido'];
                $_SESSION['rol']            = $usuario['rol'];   // 'admin' o 'usuario'

                // 4) Cada rol va a su panel.
                redirigir(panel_segun_rol());
            }
        } catch (PDOException $ex) {
            error_log('Login: ' . $ex->getMessage());   // sin la contraseña
            $error = 'No se pudo iniciar sesión. Intenta de nuevo más tarde.';
        }
    }
}

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">TP8 · Acceso</span>
                    <h1>Iniciar sesión</h1>
                    <p>Ingresa con tu email y contraseña. ¿No tienes cuenta? <a href="registro.php" class="link-gold">Regístrate gratis</a>.</p>
                </div>

                <section class="page-section">
                    <?php if ($error_db !== ''): ?>
                    <p class="form-alert admin-alert" role="alert"><?= e($error_db) ?></p>
                    <?php else: ?>
                    <form class="form-panel" action="login.php" method="post" novalidate>
                        <?php if ($aviso !== null): ?>
                        <p class="<?= e($aviso[0]) ?> admin-alert" role="status"><?= e($aviso[1]) ?></p>
                        <?php endif; ?>
                        <?php if ($error !== ''): ?>
                        <p class="form-alert" role="alert"><?= e($error) ?></p>
                        <?php endif; ?>

                        <?= csrf_campo() ?>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" maxlength="<?= EMAIL_MAX ?>" autocomplete="username" value="<?= e($email) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <?php // La contraseña nunca se vuelve a mostrar en el value. ?>
                            <input type="password" id="password" name="password" autocomplete="current-password" required>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-gold">Entrar</button>
                            <a href="registro.php" class="btn-outline">Crear cuenta</a>
                        </div>
                    </form>
                    <?php endif; ?>
                </section>

            </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
