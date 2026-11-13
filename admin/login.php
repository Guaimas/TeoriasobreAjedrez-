<?php
/**
 * admin/login.php
 * -----------------------------------------------------------------
 * TP7 — Inicio de sesión del panel de administración.
 *
 * Busca el usuario por email (consulta preparada) y compara la
 * contraseña escrita con el hash guardado usando password_verify().
 * Solo pueden entrar los usuarios con rol "administrador".
 *
 * El mensaje de error es el mismo si el email no existe o si la
 * contraseña es incorrecta: así no se revela qué emails están
 * registrados.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/../includes/admin_ejercicios.php';

// Si ya hay sesión, no tiene sentido mostrar el login.
if (usuario_admin() !== null) {
    header('Location: index.php');
    exit;
}

$titulo_pagina    = "Iniciar sesión - El Arte del Jaque";
$meta_descripcion = "Acceso al panel de administración de ejercicios.";
$pagina_actual    = "admin";
$header_titulo    = "Administración";
$header_tagline   = "Acceso restringido";
$ruta_base        = "../";
$ruta_paginas     = "../paginas/";
$es_home          = false;

$email    = '';
$error    = '';
$error_db = $error_conexion;
$salida   = filter_input(INPUT_GET, 'salida') === '1';   // viene de cerrar sesión

if ($pdo !== null && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = limpiar($_POST['email'] ?? '');
    $password = is_string($_POST['password'] ?? null) ? $_POST['password'] : '';   // la contraseña no se recorta

    if (!csrf_valido()) {
        $error = 'La página expiró. Vuelve a intentarlo.';
    } elseif ($email === '' || $password === '') {
        $error = 'Escribe tu email y tu contraseña.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'El email no tiene un formato válido.';
    } else {
        try {
            $usuario = buscar_usuario_por_email($pdo, $email);

            // password_verify() calcula el hash de lo escrito y lo compara
            // con el hash guardado: la contraseña nunca se guarda en texto plano.
            if ($usuario === null || !password_verify($password, $usuario['password'])) {
                $error = 'Email o contraseña incorrectos.';
            } elseif ($usuario['rol'] !== 'administrador') {
                $error = 'Tu usuario no tiene permiso para entrar al panel.';
            } else {
                // Nuevo id de sesión al iniciar sesión (evita la fijación de sesión).
                session_regenerate_id(true);
                unset($_SESSION['csrf']);   // y un token CSRF nuevo para la sesión iniciada
                $_SESSION['admin'] = [
                    'id'     => (int) $usuario['id'],
                    'nombre' => $usuario['nombre_completo'],
                ];
                volver_al_listado('login');
            }
        } catch (PDOException $ex) {
            error_log('Login: ' . $ex->getMessage());
            $error = 'No se pudo iniciar sesión. Intenta de nuevo.';
        }
    }
}

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">TP7 · Acceso</span>
                    <h1>Iniciar sesión</h1>
                    <p>El panel de administración de ejercicios es solo para usuarios con rol de administrador.</p>
                </div>

                <section class="page-section">
                    <?php if ($error_db !== ''): ?>
                    <p class="form-alert admin-alert" role="alert"><?= e($error_db) ?></p>
                    <?php else: ?>
                    <form class="form-panel" action="login.php" method="post" novalidate>
                        <?php if ($salida): ?>
                        <p class="field-success admin-alert" role="status">Cerraste la sesión correctamente.</p>
                        <?php endif; ?>
                        <?php if ($error !== ''): ?>
                        <p class="form-alert" role="alert"><?= e($error) ?></p>
                        <?php endif; ?>

                        <?= csrf_campo() ?>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" maxlength="150" autocomplete="username" value="<?= e($email) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <?php // La contraseña nunca se vuelve a mostrar en el value. ?>
                            <input type="password" id="password" name="password" autocomplete="current-password" required>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-gold">Entrar</button>
                        </div>
                    </form>
                    <?php endif; ?>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
