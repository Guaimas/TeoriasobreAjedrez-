<?php
/**
 * admin/logout.php
 * -----------------------------------------------------------------
 * TP7 — Cerrar sesión. Solo por POST y con token CSRF, para que un
 * enlace o una imagen de otro sitio no pueda cerrar la sesión.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/../includes/admin_ejercicios.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrf_valido()) {
    header('Location: index.php');
    exit;
}

// Se vacían los datos, se borra la cookie y se destruye la sesión.
$_SESSION = [];
$cookie = session_get_cookie_params();
setcookie(session_name(), '', time() - 3600, $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly']);
session_destroy();

header('Location: login.php?salida=1');
exit;
