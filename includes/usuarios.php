<?php
/**
 * includes/usuarios.php
 * -----------------------------------------------------------------
 * TP8 — Funciones de usuarios: consultas a la tabla usuarios, rol de
 * la sesión y rutas a los paneles.
 *
 * El rol se guarda normalizado (TP6): usuarios.rol_id es una clave
 * foránea a la tabla roles, cuyos nombres son 'administrador' y
 * 'estudiante'. Con un JOIN se obtiene el nombre y se traduce al rol
 * de la aplicación que se guarda en $_SESSION['rol']:
 *     administrador -> 'admin'
 *     estudiante    -> 'usuario'
 *
 * TODAS las consultas que reciben datos son CONSULTAS PREPARADAS:
 * el SQL lleva marcadores (:email) y los valores viajan por separado
 * en execute(), así nunca se interpretan como SQL.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/../config/sesion.php';
require_once __DIR__ . '/../config/conexion.php';     // $pdo (TP7), la misma conexión de siempre
require_once __DIR__ . '/../clase5/seguridad.php';    // e(), limpiar(), largo()
require_once __DIR__ . '/csrf.php';

// Largos máximos tomados de tp6/schema.sql.
const NOMBRE_MAX   = 80;    // usuarios.nombre   VARCHAR(80)
const APELLIDO_MAX = 80;    // usuarios.apellido VARCHAR(80)
const EMAIL_MAX    = 150;   // usuarios.email    VARCHAR(150)
const PASSWORD_MIN = 8;
const PASSWORD_MAX = 72;    // bcrypt solo usa los primeros 72 bytes

if (!function_exists('ruta_raiz')) {

    /**
     * Prefijo para llegar a la raíz del sitio desde la página actual:
     * "" en la raíz (login.php) y "../" dentro de admin/ o paginas/.
     * Así las redirecciones funcionan desde cualquier carpeta.
     */
    function ruta_raiz(): string
    {
        $raiz = realpath(__DIR__ . '/..');
        $dir  = realpath(dirname($_SERVER['SCRIPT_FILENAME'] ?? ''));
        if ($raiz === false || $dir === false) {
            return '';
        }

        $raiz = str_replace('\\', '/', $raiz);
        $dir  = str_replace('\\', '/', $dir);
        if (!str_starts_with($dir, $raiz)) {
            return '';
        }

        $resto = trim(substr($dir, strlen($raiz)), '/');

        return $resto === '' ? '' : str_repeat('../', substr_count($resto, '/') + 1);
    }

    /** Redirige (ruta relativa a la raíz del sitio) y SIEMPRE corta el script. */
    function redirigir(string $destino): never
    {
        header('Location: ' . ruta_raiz() . $destino);
        exit;
    }

    /** ¿Hay un usuario con sesión iniciada? */
    function usuario_conectado(): bool
    {
        return isset($_SESSION['usuario_id']);
    }

    /** ¿El usuario conectado es administrador? */
    function es_admin(): bool
    {
        return usuario_conectado() && ($_SESSION['rol'] ?? '') === 'admin';
    }

    /** Panel que le corresponde a cada rol. */
    function panel_segun_rol(): string
    {
        return es_admin() ? 'admin_panel.php' : 'dashboard.php';
    }

    /** Si ya hay sesión (login.php y registro.php), manda al panel del usuario. */
    function redirigir_si_conectado(): void
    {
        if (usuario_conectado()) {
            redirigir(panel_segun_rol());
        }
    }

    /**
     * Busca un usuario por email, con su rol ya traducido a 'admin' o
     * 'usuario' (INNER JOIN con roles). Devuelve la fila o null.
     */
    function buscar_usuario_por_email(PDO $pdo, string $email): ?array
    {
        $stmt = $pdo->prepare("SELECT u.id, u.nombre, u.apellido, u.password,
                                      CASE r.nombre WHEN 'administrador' THEN 'admin' ELSE 'usuario' END AS rol
                               FROM usuarios u
                               INNER JOIN roles r ON r.id = u.rol_id
                               WHERE u.email = :email");
        $stmt->execute([':email' => $email]);
        $fila = $stmt->fetch();

        return $fila === false ? null : $fila;
    }

    /** ¿Ya hay una cuenta con ese email? (consulta preparada) */
    function email_registrado(PDO $pdo, string $email): bool
    {
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuarios WHERE email = :email');
        $stmt->execute([':email' => $email]);

        return (int) $stmt->fetchColumn() > 0;
    }

    /* ---- Ayudas para mostrar errores en los formularios ---- */

    function clase_error_campo(string $campo, array $errores): string
    {
        return isset($errores[$campo]) ? ' has-error' : '';
    }

    function mensaje_error_campo(string $campo, array $errores): string
    {
        return isset($errores[$campo])
            ? '<span class="field-error" role="alert">' . e($errores[$campo]) . '</span>'
            : '';
    }
}
