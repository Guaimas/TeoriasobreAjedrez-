<?php
/**
 * admin/crear.php
 * -----------------------------------------------------------------
 * TP7 — CREATE: alta de un ejercicio nuevo.
 *
 * GET  -> muestra el formulario vacío.
 * POST -> valida; si hay errores vuelve a mostrar el formulario con
 *         los datos escritos; si está todo bien hace el INSERT y
 *         redirige al listado (patrón PRG: Post / Redirect / Get,
 *         así recargar la página no vuelve a insertar el registro).
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/../includes/admin_ejercicios.php';

// LOGIN: sin sesión de administrador, esta página manda a login.php.
requerir_admin();

$titulo_pagina    = "Nuevo ejercicio - El Arte del Jaque";
$meta_descripcion = "Formulario para cargar un ejercicio nuevo en la base de datos.";
$pagina_actual    = "admin";
$header_titulo    = "Administración";
$header_tagline   = "Nuevo ejercicio";
$ruta_base        = "../";
$ruta_paginas     = "../paginas/";
$es_home          = false;

// El autor sugerido es el administrador que inició sesión.
$datos   = ['tema_id' => '', 'autor_id' => usuario_admin()['id'], 'nivel' => '', 'enunciado' => '', 'posicion_fen' => '', 'explicacion' => ''];
$errores = [];
$temas   = [];
$autores = [];
$error_db = $error_conexion;

if ($pdo !== null) {
    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // CSRF: si el token no coincide, el formulario no salió de este panel.
            if (!csrf_valido()) {
                volver_al_listado('csrf');
            }

            [$datos, $errores] = validar_ejercicio($pdo);

            if (empty($errores)) {
                // CONSULTA PREPARADA: el SQL lleva marcadores (:nivel,
                // :enunciado...) y los valores se envían por separado en
                // execute(). Nunca se concatena lo que escribió el usuario.
                $stmt = $pdo->prepare('INSERT INTO ejercicios
                                           (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion)
                                       VALUES
                                           (:tema_id, :autor_id, :nivel, :enunciado, :posicion_fen, :explicacion)');
                $stmt->execute(parametros_ejercicio($datos));

                volver_al_listado('created');
            }
        }

        $temas   = obtener_temas($pdo);
        $autores = obtener_autores($pdo);
    } catch (PDOException $ex) {
        error_log('Crear ejercicio: ' . $ex->getMessage());
        volver_al_listado('error');
    }
}

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">TP7 · Crear</span>
                    <h1>Nuevo ejercicio</h1>
                    <p>Completa los datos del ejercicio. Los campos con * son obligatorios.</p>
                </div>

                <section class="page-section">
                    <?php if ($error_db !== ''): ?>
                    <p class="form-alert admin-alert" role="alert"><?= e($error_db) ?></p>
                    <?php else: ?>
                    <?php
                    $accion      = 'crear.php';
                    $texto_boton = 'Guardar ejercicio';
                    require __DIR__ . '/_formulario.php';
                    ?>
                    <?php endif; ?>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
