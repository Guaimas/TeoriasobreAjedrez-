<?php
/**
 * admin/index.php
 * -----------------------------------------------------------------
 * TP7 — READ: listado de ejercicios guardados en MySQL.
 *
 * Muestra la tabla "ejercicios" con el NOMBRE del tema (INNER JOIN
 * con la tabla maestra temas) y del autor (LEFT JOIN con usuarios,
 * porque el autor es opcional). Desde aquí se crea, edita y elimina.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/../includes/admin_ejercicios.php';

// TP8 — GUARDIÁN: solo el rol admin. Sin sesión -> ../login.php?error=acceso_denegado;
// usuario común -> ../dashboard.php?error=permiso.
requerir_rol('admin');

$titulo_pagina    = "Administración de ejercicios - El Arte del Jaque";
$meta_descripcion = "Panel para crear, editar y eliminar los ejercicios guardados en la base de datos.";
$pagina_actual    = "admin";
$header_titulo    = "Administración";
$header_tagline   = "Ejercicios guardados en la base de datos";
$ruta_base        = "../";
$ruta_paginas     = "../paginas/";
$es_home          = false;

// Mensajes posibles después de crear, editar o eliminar (patrón PRG).
// Solo se acepta un valor de esta lista: nunca se imprime ?status= tal cual.
$mensajes = [
    'created'  => ['field-success', 'El ejercicio se creó correctamente.'],
    'updated'  => ['field-success', 'El ejercicio se actualizó correctamente.'],
    'deleted'  => ['field-success', 'El ejercicio se eliminó correctamente.'],
    'notfound' => ['form-alert',    'El ejercicio pedido no existe o el id no es válido.'],
    'fk'       => ['form-alert',    'No se puede eliminar el ejercicio porque tiene registros relacionados.'],
    'csrf'     => ['form-alert',    'La página expiró o el formulario no es válido. Vuelve a intentarlo.'],
    'error'    => ['form-alert',    'Ocurrió un error al trabajar con la base de datos. Intenta de nuevo.'],
];
$status = filter_input(INPUT_GET, 'status', FILTER_DEFAULT, FILTER_REQUIRE_SCALAR);
$alerta = $mensajes[$status] ?? null;

$ejercicios = [];
$error_db   = $error_conexion;

if ($pdo !== null) {
    try {
        // Esta consulta no recibe datos del usuario, por eso usa query().
        // INNER JOIN: trae el nombre del tema en vez de mostrar tema_id.
        // LEFT JOIN: si el ejercicio no tiene autor, igual aparece.
        $sql = "SELECT e.id, e.nivel, e.enunciado, e.posicion_fen, e.created_at,
                       t.nombre AS tema,
                       CONCAT(u.nombre, ' ', u.apellido) AS autor,
                       (SELECT COUNT(*) FROM opciones_ejercicio o WHERE o.ejercicio_id = e.id) AS opciones
                FROM ejercicios e
                INNER JOIN temas t   ON t.id = e.tema_id
                LEFT JOIN usuarios u ON u.id = e.autor_id
                ORDER BY e.id DESC";
        $ejercicios = $pdo->query($sql)->fetchAll();
    } catch (PDOException $ex) {
        error_log('Listado de ejercicios: ' . $ex->getMessage());
        $error_db = 'No se pudo leer la lista de ejercicios.';
    }
}

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">TP7 · CRUD con PDO</span>
                    <h1>Ejercicios</h1>
                    <p>Ejercicios guardados en la base de datos <strong>arte_del_jaque</strong>. Desde esta página puedes crear, editar o eliminar cada uno.</p>
                </div>

                <section class="page-section">

                    <?php // Usuario con sesión iniciada y botón para cerrarla (POST + token CSRF). ?>
                    <div class="admin-session">
                        <span>Sesión iniciada como <strong><?= e($_SESSION['usuario_nombre']) ?></strong></span>
                        <form action="../logout.php" method="post">
                            <?= csrf_campo() ?>
                            <button type="submit" class="btn-outline btn-sm">Cerrar sesión</button>
                        </form>
                    </div>

                    <?php if ($alerta !== null): ?>
                    <p class="<?= e($alerta[0]) ?> admin-alert" role="status"><?= e($alerta[1]) ?></p>
                    <?php endif; ?>

                    <?php if ($error_db !== ''): ?>
                    <p class="form-alert admin-alert" role="alert"><?= e($error_db) ?></p>
                    <?php else: ?>

                    <div class="admin-toolbar">
                        <p class="admin-count"><?= e(count($ejercicios)) ?> ejercicio(s) en total</p>
                        <a href="crear.php" class="btn-gold">+ Nuevo ejercicio</a>
                    </div>

                    <?php if (empty($ejercicios)): ?>
                    <p class="form-info">Todavía no hay ejercicios cargados. Crea el primero con el botón «Nuevo ejercicio».</p>
                    <?php else: ?>
                    <div class="admin-table-wrap">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Enunciado</th>
                                    <th>Tema</th>
                                    <th>Nivel</th>
                                    <th>Autor</th>
                                    <th>Opciones</th>
                                    <th>Creado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ejercicios as $ej): ?>
                                <tr>
                                    <td data-label="ID"><?= e($ej['id']) ?></td>
                                    <?php // Enunciado recortado a 70 caracteres; el texto completo queda en el title. ?>
                                    <td data-label="Enunciado" class="admin-col-texto" title="<?= e($ej['enunciado']) ?>"><?= e(mb_strimwidth($ej['enunciado'], 0, 70, '…', 'UTF-8')) ?></td>
                                    <td data-label="Tema"><span class="pill"><?= e($ej['tema']) ?></span></td>
                                    <td data-label="Nivel"><?= e($ej['nivel']) ?></td>
                                    <td data-label="Autor"><?= e($ej['autor'] ?? 'Sin autor') ?></td>
                                    <td data-label="Opciones"><?= e($ej['opciones']) ?></td>
                                    <td data-label="Creado"><?= e(date('d/m/Y H:i', strtotime($ej['created_at']))) ?></td>
                                    <td data-label="Acciones">
                                        <div class="admin-actions">
                                            <a href="editar.php?id=<?= e($ej['id']) ?>" class="btn-outline btn-sm">Editar</a>
                                            <?php // Eliminar va por POST (nunca por un enlace GET) y pide confirmación. ?>
                                            <form action="eliminar.php" method="post" onsubmit="return confirm('¿Seguro que quieres eliminar el ejercicio #<?= e($ej['id']) ?>? También se borran sus opciones e intentos.');">
                                                <?= csrf_campo() ?>
                                                <input type="hidden" name="id" value="<?= e($ej['id']) ?>">
                                                <button type="submit" class="btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>

                    <?php endif; ?>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
