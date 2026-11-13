<?php
/**
 * includes/admin_sesion.php
 * -----------------------------------------------------------------
 * TP7 — Sesión del administrador y protección CSRF.
 *
 * LOGIN: login.php guarda en $_SESSION['admin'] el id y el nombre
 * del usuario que inició sesión. Las páginas de admin/ llaman a
 * requerir_admin(): si no hay sesión, mandan a login.php.
 *
 * CSRF (Cross-Site Request Forgery): otra página podría tener un
 * formulario oculto que envíe un POST a admin/eliminar.php usando la
 * sesión abierta del administrador. Para evitarlo, cada formulario
 * lleva un token secreto guardado en la sesión; si el token enviado
 * no coincide con el de la sesión, el pedido se rechaza.
 * -----------------------------------------------------------------
 */

if (session_status() === PHP_SESSION_NONE) {
    // Cookie de sesión: inaccesible desde JavaScript (httponly) y que
    // no se envía en formularios que vienen de otros sitios (SameSite).
    session_set_cookie_params([
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

/** Datos del administrador con sesión iniciada, o null. */
function usuario_admin(): ?array
{
    return $_SESSION['admin'] ?? null;
}

/** Si no hay sesión de administrador, redirige al login y corta el script. */
function requerir_admin(): void
{
    if (usuario_admin() === null) {
        header('Location: login.php');
        exit;
    }
}

/** Devuelve el token CSRF de la sesión (lo crea la primera vez). */
function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        // 32 bytes aleatorios criptográficamente seguros -> 64 caracteres hex.
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf'];
}

/** Campo oculto con el token, para poner dentro de cada <form method="post">. */
function csrf_campo(): string
{
    return '<input type="hidden" name="csrf" value="' . e(csrf_token()) . '">';
}

/** ¿El token enviado por POST coincide con el de la sesión? */
function csrf_valido(): bool
{
    $enviado = $_POST['csrf'] ?? '';

    // hash_equals() compara en tiempo constante (no da pistas por tiempo).
    return is_string($enviado) && !empty($_SESSION['csrf'])
        && hash_equals($_SESSION['csrf'], $enviado);
}
