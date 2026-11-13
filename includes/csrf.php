<?php
/**
 * includes/csrf.php
 * -----------------------------------------------------------------
 * Protección CSRF (Cross-Site Request Forgery).
 *
 * Otra página podría tener un formulario oculto que envíe un POST a
 * este sitio usando la sesión abierta del usuario (por ejemplo, para
 * borrar un ejercicio). Para evitarlo, cada formulario lleva un token
 * secreto guardado en la sesión; si el token enviado no coincide con
 * el de la sesión, el pedido se rechaza.
 *
 * Lo usan: login, registro, logout y el CRUD de admin/.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/../config/sesion.php';
require_once __DIR__ . '/../clase5/seguridad.php';   // e()

if (!function_exists('csrf_token')) {
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
}
