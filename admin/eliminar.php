<?php
/**
 * admin/eliminar.php
 * -----------------------------------------------------------------
 * TP7 — DELETE: baja de un ejercicio.
 *
 * Solo acepta POST (el botón "Eliminar" del listado es un formulario
 * con confirmación). Si se entra por GET, por ejemplo escribiendo
 * eliminar.php?id=1 en la barra, no se borra nada: así un simple
 * enlace no puede borrar datos.
 *
 * No muestra HTML: hace el trabajo y redirige al listado con el
 * resultado (patrón PRG).
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/../includes/admin_ejercicios.php';

// TP8 — GUARDIÁN: solo el rol admin. Sin sesión -> ../login.php?error=acceso_denegado;
// usuario común -> ../dashboard.php?error=permiso.
requerir_rol('admin');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    volver_al_listado('error');
}

// CSRF: el formulario de borrado tiene que traer el token de la sesión.
if (!csrf_valido()) {
    volver_al_listado('csrf');
}

if ($pdo === null) {
    volver_al_listado('error');   // sin conexión: el listado muestra el aviso
}

// El id llega en un campo oculto del formulario. Solo enteros >= 1.
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if (!$id) {
    volver_al_listado('notfound');
}

try {
    if (!existe_id($pdo, 'ejercicios', $id)) {
        volver_al_listado('notfound');
    }

    // CONSULTA PREPARADA con el id como parámetro.
    // Las opciones y los intentos del ejercicio se borran solos por el
    // ON DELETE CASCADE definido en tp6/schema.sql.
    $stmt = $pdo->prepare('DELETE FROM ejercicios WHERE id = :id');
    $stmt->execute([':id' => $id]);

    volver_al_listado('deleted');
} catch (PDOException $ex) {
    error_log('Eliminar ejercicio: ' . $ex->getMessage());

    // SQLSTATE 23000 = violación de integridad (por ejemplo, una clave
    // foránea con RESTRICT que impide el borrado). Mensaje amigable.
    volver_al_listado($ex->getCode() === '23000' ? 'fk' : 'error');
}
