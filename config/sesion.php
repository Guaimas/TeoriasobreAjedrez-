<?php
/**
 * config/sesion.php
 * -----------------------------------------------------------------
 * TP8 — Configuración segura de la sesión.
 *
 * Todas las páginas que usan la sesión incluyen este archivo en vez
 * de llamar a session_start() sueltas. Lo incluye includes/header.php,
 * así que está activo en todo el sitio, y también las páginas que
 * necesitan la sesión antes de imprimir HTML (login, guardián, CRUD).
 * -----------------------------------------------------------------
 */

if (session_status() === PHP_SESSION_NONE) {

    // ¿La página se pidió por HTTPS? En XAMPP/Laragon (http://localhost)
    // da false; en un hosting con certificado da true.
    $es_https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
             || (int) ($_SERVER['SERVER_PORT'] ?? 0) === 443;

    // Modo estricto: PHP rechaza ids de sesión que él no generó
    // (un atacante no puede "inventar" o imponer un id).
    ini_set('session.use_strict_mode', '1');

    // El id de sesión viaja solo en la cookie, nunca en la URL.
    ini_set('session.use_only_cookies', '1');

    session_set_cookie_params([
        'lifetime' => 0,          // la cookie se borra al cerrar el navegador
        'path'     => '/',
        'secure'   => $es_https,  // solo por HTTPS cuando hay HTTPS
        'httponly' => true,       // JavaScript no puede leerla (document.cookie): frena el robo por XSS
        'samesite' => 'Lax',      // no se envía en formularios POST que vienen de otros sitios
    ]);

    session_start();
}
