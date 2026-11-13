<?php
/**
 * logout.php
 * -----------------------------------------------------------------
 * TP8 — Cierre de sesión.
 *
 * Solo por POST (el botón "Cerrar sesión" del menú es un formulario)
 * y con token CSRF: así un enlace o una imagen de otro sitio no puede
 * cerrarle la sesión al usuario. Si se entra por GET, no se hace nada.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/includes/usuarios.php';   // sesión, csrf_valido(), redirigir()

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrf_valido()) {
    redirigir(usuario_conectado() ? panel_segun_rol() : 'login.php');
}

// 1) Se vacían todos los datos de la sesión.
$_SESSION = [];

// 2) Se borra la cookie de sesión del navegador: misma cookie (nombre,
//    ruta, dominio...) pero con fecha de vencimiento en el pasado.
$cookie = session_get_cookie_params();
setcookie(session_name(), '', [
    'expires'  => time() - 42000,
    'path'     => $cookie['path'],
    'domain'   => $cookie['domain'],
    'secure'   => $cookie['secure'],
    'httponly' => $cookie['httponly'],
    'samesite' => $cookie['samesite'],
]);

// 3) Se destruye la sesión en el servidor.
session_destroy();

// 4) Vuelta al login con el aviso.
redirigir('login.php?logout=ok');
