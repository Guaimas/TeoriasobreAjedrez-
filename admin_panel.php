<?php
/**
 * admin_panel.php
 * -----------------------------------------------------------------
 * TP8 — Panel de administración: solo para el rol 'admin'.
 *
 * Protegido con requerir_rol('admin'):
 *   - sin sesión         -> login.php?error=acceso_denegado
 *   - usuario sin permiso -> dashboard.php?error=permiso
 *
 * Tiene el acceso al CRUD de ejercicios del TP7 (admin/) y el listado
 * de usuarios registrados. El listado NUNCA muestra los hashes de las
 * contraseñas: la consulta ni siquiera pide esa columna.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/includes/auth_guard.php';

// GUARDIÁN: solo administradores.
requerir_rol('admin');

$titulo_pagina    = "Panel de administración - El Arte del Jaque";
$meta_descripcion = "Panel de administración del sitio.";
$pagina_actual    = "admin";
$header_titulo    = "Administración";
$header_tagline   = "Panel del administrador";
$ruta_base        = "";
$ruta_paginas     = "paginas/";
$es_home          = false;

$usuarios         = [];
$total_ejercicios = 0;
$error_db         = $error_conexion;

if ($pdo !== null) {
    try {
        // Estas consultas no reciben datos del usuario: se usa query().
        // INNER JOIN con roles para mostrar el nombre del rol.
        // Se eligen las columnas una por una: el password no se pide.
        $usuarios = $pdo->query("SELECT u.id, u.nombre, u.apellido, u.email, u.created_at,
                                        CASE r.nombre WHEN 'administrador' THEN 'admin' ELSE 'usuario' END AS rol
                                 FROM usuarios u
                                 INNER JOIN roles r ON r.id = u.rol_id
                                 ORDER BY u.created_at DESC, u.id DESC")->fetchAll();

        $total_ejercicios = (int) $pdo->query('SELECT COUNT(*) FROM ejercicios')->fetchColumn();
    } catch (PDOException $ex) {
        error_log('Panel de administración: ' . $ex->getMessage());
        $error_db = 'No se pudieron cargar los datos del panel.';
    }
}

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">TP8 · Solo administradores</span>
                    <h1>Panel de administración</h1>
                    <p>Hola, <strong><?= e($_SESSION['usuario_nombre']) ?></strong>. Desde aquí gestionas los ejercicios del sitio y ves los usuarios registrados.</p>
                </div>

                <section class="page-section">
                    <?php if ($error_db !== ''): ?>
                    <p class="form-alert admin-alert" role="alert"><?= e($error_db) ?></p>
                    <?php endif; ?>

                    <div class="card-grid">
                        <a class="card card--link" href="admin/index.php">
                            <h3>Ejercicios (CRUD)</h3>
                            <p><?= e($total_ejercicios) ?> ejercicios en la base. Crear, editar y eliminar (TP7).</p>
                        </a>
                        <a class="card card--link" href="admin/crear.php">
                            <h3>Nuevo ejercicio</h3>
                            <p>Cargar un ejercicio nuevo: aparece enseguida en la página Ejercicios.</p>
                        </a>
                        <div class="card">
                            <h3>Usuarios</h3>
                            <p><?= e(count($usuarios)) ?> cuentas registradas, de las cuales <?= e(count(array_filter($usuarios, fn($u) => $u['rol'] === 'admin'))) ?> son administradores.</p>
                        </div>
                    </div>
                </section>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Usuarios registrados</h2>
                        <p>Las contraseñas se guardan como hash bcrypt y no se muestran nunca.</p>
                    </div>

                    <?php if ($usuarios): ?>
                    <div class="admin-table-wrap">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Registrado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($usuarios as $u): ?>
                                <tr>
                                    <td data-label="ID"><?= e($u['id']) ?></td>
                                    <td data-label="Nombre" class="admin-col-texto"><?= e($u['nombre'] . ' ' . $u['apellido']) ?></td>
                                    <td data-label="Email"><?= e($u['email']) ?></td>
                                    <td data-label="Rol"><span class="pill<?= $u['rol'] === 'admin' ? '' : ' pill--soft' ?>"><?= e($u['rol']) ?></span></td>
                                    <td data-label="Registrado"><?= e(date('d/m/Y H:i', strtotime($u['created_at']))) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                </section>

            </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
