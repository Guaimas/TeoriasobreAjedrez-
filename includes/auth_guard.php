<?php
/**
 * includes/auth_guard.php
 * -----------------------------------------------------------------
 * TP8 — Guardián de rutas (control de acceso).
 *
 * Se llama al principio de cada página protegida, ANTES de imprimir
 * cualquier HTML:
 *
 *   requerir_login();        // cualquier usuario con sesión
 *   requerir_rol('admin');   // solo administradores
 *
 * Si el usuario no cumple, se lo redirige y el script se corta con
 * exit: el resto de la página nunca se ejecuta.
 *
 * Las rutas de las redirecciones se calculan con ruta_raiz(), así
 * funcionan igual desde la raíz (dashboard.php) que desde admin/.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/usuarios.php';   // sesión, $pdo, redirigir(), usuario_conectado()

if (!function_exists('requerir_login')) {

    /**
     * Exige un usuario con sesión iniciada. Si no hay, manda a
     * login.php?error=acceso_denegado.
     */
    function requerir_login(): void
    {
        global $pdo;

        if (!usuario_conectado()) {
            redirigir('login.php?error=acceso_denegado');
        }

        // Se confirma en la base que el usuario sigue existiendo y se
        // toma su rol ACTUAL (si un admin pasó a usuario, deja de entrar
        // al panel aunque su sesión diga otra cosa). Consulta preparada.
        if ($pdo !== null) {
            try {
                $stmt = $pdo->prepare("SELECT CASE r.nombre WHEN 'administrador' THEN 'admin' ELSE 'usuario' END AS rol
                                       FROM usuarios u
                                       INNER JOIN roles r ON r.id = u.rol_id
                                       WHERE u.id = :id");
                $stmt->execute([':id' => $_SESSION['usuario_id']]);
                $rol = $stmt->fetchColumn();

                if ($rol === false) {
                    // La cuenta fue eliminada: se cierra la sesión.
                    $_SESSION = [];
                    session_regenerate_id(true);
                    redirigir('login.php?error=acceso_denegado');
                }
                $_SESSION['rol'] = $rol;
            } catch (PDOException $ex) {
                error_log('Guardián de rutas: ' . $ex->getMessage());
            }
        }

        // Las páginas privadas no se guardan en la caché del navegador:
        // después de cerrar sesión, el botón "atrás" no las vuelve a mostrar.
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Pragma: no-cache');
    }

    /**
     * Exige un rol. Primero exige sesión; si el rol no alcanza, manda a
     * dashboard.php?error=permiso (el usuario está conectado, pero no
     * puede ver esa página).
     */
    function requerir_rol(string $rol): void
    {
        requerir_login();

        if (($_SESSION['rol'] ?? '') !== $rol) {
            redirigir('dashboard.php?error=permiso');
        }
    }
}
