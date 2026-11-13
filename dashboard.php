<?php
/**
 * dashboard.php
 * -----------------------------------------------------------------
 * TP8 — Panel de cualquier usuario con sesión iniciada.
 *
 * Protegido con requerir_login(): sin sesión manda a
 * login.php?error=acceso_denegado.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/includes/auth_guard.php';
require_once __DIR__ . '/includes/secciones.php';

// GUARDIÁN: solo usuarios con sesión.
requerir_login();

$titulo_pagina    = "Mi panel - El Arte del Jaque";
$meta_descripcion = "Tu panel personal en El Arte del Jaque.";
$pagina_actual    = "dashboard";
$header_titulo    = "Mi panel";
$header_tagline   = "Tu espacio de aprendizaje";
$ruta_base        = "";
$ruta_paginas     = "paginas/";
$es_home          = false;

// Aviso cuando el guardián lo mandó aquí por falta de permisos.
$sin_permiso = filter_input(INPUT_GET, 'error') === 'permiso';

$cuenta    = null;
$niveles   = [];
$error_db  = $error_conexion;

if ($pdo !== null) {
    try {
        // Datos de la cuenta: CONSULTA PREPARADA con el id de la sesión.
        // Se piden solo las columnas necesarias (nunca el password).
        $stmt = $pdo->prepare('SELECT nombre, email, created_at FROM usuarios WHERE id = :id');
        $stmt->execute([':id' => $_SESSION['usuario_id']]);
        $cuenta = $stmt->fetch() ?: null;

        // Ejercicios disponibles por nivel (no recibe datos: query()).
        $niveles = $pdo->query('SELECT nivel, COUNT(*) AS total FROM ejercicios GROUP BY nivel ORDER BY nivel')
                       ->fetchAll(PDO::FETCH_KEY_PAIR);
    } catch (PDOException $ex) {
        error_log('Dashboard: ' . $ex->getMessage());
        $error_db = 'No se pudieron cargar los datos de tu cuenta.';
    }
}

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">TP8 · Mi panel</span>
                    <?php // El nombre viene de la sesión, pero igual se escapa con e() (htmlspecialchars). ?>
                    <h1>Hola, <?= e($_SESSION['usuario_nombre']) ?></h1>
                    <p>Este es tu espacio en El Arte del Jaque. Sigue el recorrido de aprendizaje y pon a prueba lo aprendido con los ejercicios.</p>
                </div>

                <section class="page-section">
                    <?php if ($sin_permiso): ?>
                    <p class="form-alert admin-alert" role="alert">No tienes permiso para entrar a esa página: es solo para administradores.</p>
                    <?php endif; ?>
                    <?php if ($error_db !== ''): ?>
                    <p class="form-alert admin-alert" role="alert"><?= e($error_db) ?></p>
                    <?php endif; ?>

                    <div class="card-grid">
                        <div class="card">
                            <h3>Tu cuenta</h3>
                            <?php if ($cuenta !== null): ?>
                            <p><strong>Email:</strong> <?= e($cuenta['email']) ?><br>
                               <strong>Rol:</strong> <?= e($_SESSION['rol'] === 'admin' ? 'Administrador' : 'Usuario') ?><br>
                               <strong>Miembro desde:</strong> <?= e(date('d/m/Y', strtotime($cuenta['created_at']))) ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="card">
                            <h3>Ejercicios disponibles</h3>
                            <?php if ($niveles): ?>
                            <p>
                                <?php foreach ($niveles as $nivel => $total): ?>
                                <strong><?= e($nivel) ?>:</strong> <?= e($total) ?><br>
                                <?php endforeach; ?>
                            </p>
                            <?php endif; ?>
                            <a class="link-gold" href="paginas/ejercicios.php">Ir a los ejercicios →</a>
                        </div>
                        <div class="card">
                            <h3>Consejo del día</h3>
                            <p>Antes de cada jugada, pregúntate: ¿qué amenaza mi rival? Revisar jaques, capturas y amenazas evita la mayoría de los errores.</p>
                        </div>
                    </div>
                </section>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Tu recorrido de aprendizaje</h2>
                        <p>Las secciones del sitio en el orden recomendado.</p>
                    </div>
                    <div class="topic-grid">
                        <?php foreach (secciones_del_sitio() as $slug => $seccion): ?>
                        <?php if (!$seccion['recorrido']) continue; ?>
                        <a class="card card--link" href="<?= e(url_seccion($slug, $ruta_base, $ruta_paginas)) ?>"><h3><?= e($seccion['titulo']) ?></h3><p><?= e($seccion['descripcion']) ?></p></a>
                        <?php endforeach; ?>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
