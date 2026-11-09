<?php
/**
 * includes/seguridad.php
 * -----------------------------------------------------------------
 * Funciones de seguridad reutilizables (Clase 5: formularios y
 * seguridad).
 *
 *   e($texto)            -> escapa texto para imprimirlo en HTML
 *                           (previene XSS).
 *   limpiar_texto($v)    -> normaliza un valor recibido por GET/POST:
 *                           acepta solo strings, quita espacios y
 *                           caracteres de control.
 *   iniciar_sesion()     -> inicia la sesión con cookies seguras
 *                           (HttpOnly + SameSite).
 *   csrf_token()         -> genera/devuelve el token anti-CSRF.
 *   csrf_campo()         -> imprime el <input hidden> con el token.
 *   csrf_valido($token)  -> compara el token recibido con el de la
 *                           sesión usando hash_equals().
 *   enviar_cabeceras_seguridad() -> cabeceras HTTP defensivas.
 * -----------------------------------------------------------------
 */

if (!function_exists('e')) {
    function e($texto)
    {
        return htmlspecialchars((string) $texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

if (!function_exists('limpiar_texto')) {
    function limpiar_texto($valor)
    {
        // Si llega un array (ej: ?q[]=x) o null, se descarta.
        if (!is_string($valor)) {
            return '';
        }

        // Quita caracteres de control (salvo saltos de línea y tabulaciones).
        $valor = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $valor);

        // preg_replace devuelve null si el texto no es UTF-8 válido.
        if ($valor === null) {
            return '';
        }

        return trim($valor);
    }
}

if (!function_exists('longitud')) {
    function longitud($texto)
    {
        return function_exists('mb_strlen') ? mb_strlen($texto, 'UTF-8') : preg_match_all('/./us', $texto);
    }
}

if (!function_exists('iniciar_sesion')) {
    function iniciar_sesion()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            return;
        }

        session_set_cookie_params([
            'lifetime' => 0,
            'path'     => '/',
            'secure'   => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
            'httponly' => true,     // JavaScript no puede leer la cookie
            'samesite' => 'Lax',    // no se envía en POST desde otros sitios
        ]);
        ini_set('session.use_strict_mode', '1');
        ini_set('session.use_only_cookies', '1');

        session_start();
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token()
    {
        iniciar_sesion();

        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }
}

if (!function_exists('csrf_campo')) {
    function csrf_campo()
    {
        return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
    }
}

if (!function_exists('csrf_valido')) {
    function csrf_valido($tokenRecibido)
    {
        iniciar_sesion();

        return is_string($tokenRecibido)
            && !empty($_SESSION['csrf_token'])
            && hash_equals($_SESSION['csrf_token'], $tokenRecibido);
    }
}

if (!function_exists('enviar_cabeceras_seguridad')) {
    function enviar_cabeceras_seguridad()
    {
        if (headers_sent()) {
            return;
        }

        header('X-Content-Type-Options: nosniff');         // evita "MIME sniffing"
        header('X-Frame-Options: DENY');                   // evita clickjacking (iframes)
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}
