<?php
/**
 * admin/editar.php
 * -----------------------------------------------------------------
 * TP7 — UPDATE: modificar un ejercicio existente.
 *
 * GET  editar.php?id=3 -> formulario con los datos actuales.
 * POST editar.php?id=3 -> valida y hace el UPDATE; luego redirige.
 *
 * El id se valida con filter_input(FILTER_VALIDATE_INT): si no es un
 * entero positivo o no existe en la base, se vuelve al listado con
 * un mensaje, sin mostrar errores de PHP.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/../includes/admin_ejercicios.php';

// TP8 — GUARDIÁN: solo el rol admin. Sin sesión -> ../login.php?error=acceso_denegado;
// usuario común -> ../dashboard.php?error=permiso.
requerir_rol('admin');

$titulo_pagina    = "Editar ejercicio - El Arte del Jaque";
$meta_descripcion = "Formulario para modificar un ejercicio de la base de datos.";
$pagina_actual    = "admin";
$header_titulo    = "Administración";
$header_tagline   = "Editar ejercicio";
$ruta_base        = "../";
$ruta_paginas     = "../paginas/";
$es_home          = false;

$errores  = [];
$temas    = [];
$autores  = [];
$error_db = $error_conexion;

// El id llega en la URL. Solo se acepta un entero >= 1.
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);

if ($pdo !== null) {
    if (!$id) {
        volver_al_listado('notfound');   // id ausente, con letras, negativo...
    }

    try {
        $ejercicio = buscar_ejercicio($pdo, $id);
        if ($ejercicio === null) {
            volver_al_listado('notfound');   // id con formato válido pero inexistente
        }

        // Valores iniciales del formulario: los que están en la base.
        $datos = $ejercicio;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // CSRF: si el token no coincide, el formulario no salió de este panel.
            if (!csrf_valido()) {
                volver_al_listado('csrf');
            }

            [$datos, $errores] = validar_ejercicio($pdo);

            if (empty($errores)) {
                // CONSULTA PREPARADA: también el id del WHERE va como
                // parámetro (:id), no pegado al texto del SQL.
                $stmt = $pdo->prepare('UPDATE ejercicios
                                       SET tema_id      = :tema_id,
                                           autor_id     = :autor_id,
                                           nivel        = :nivel,
                                           enunciado    = :enunciado,
                                           posicion_fen = :posicion_fen,
                                           explicacion  = :explicacion
                                       WHERE id = :id');
                $stmt->execute(parametros_ejercicio($datos) + [':id' => $id]);

                volver_al_listado('updated');
            }
        }

        $temas   = obtener_temas($pdo);
        $autores = obtener_autores($pdo);
    } catch (PDOException $ex) {
        error_log('Editar ejercicio: ' . $ex->getMessage());
        volver_al_listado('error');
    }
}

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">TP7 · Editar</span>
                    <h1>Editar ejercicio<?= $id ? ' #' . e($id) : '' ?></h1>
                    <p>Modifica los datos y guarda los cambios. Los campos con * son obligatorios.</p>
                </div>

                <section class="page-section">
                    <?php if ($error_db !== ''): ?>
                    <p class="form-alert admin-alert" role="alert"><?= e($error_db) ?></p>
                    <?php else: ?>
                    <?php
                    // El id viaja en la URL del action; se escapa dentro del formulario con e().
                    $accion      = 'editar.php?id=' . $id;
                    $texto_boton = 'Guardar cambios';
                    require __DIR__ . '/_formulario.php';
                    ?>
                    <?php endif; ?>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
