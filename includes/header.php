<?php
/**
 * includes/header.php
 * -----------------------------------------------------------------
 * Encabezado común (DOCTYPE, <html>, <head> y apertura de <body>).
 *
 * La página que incluye este archivo debe definir ANTES del
 * require_once:
 *
 *   $titulo_pagina     (string) Título que se muestra en la pestaña
 *   $meta_descripcion  (string) Meta description SEO de la página
 *   $ruta_base         (string) "" si el archivo está en la raíz del
 *                       sitio, "../" si está dentro de /paginas
 *
 * Si alguna de estas variables no fue definida, se usan valores
 * por defecto para que el sitio no se rompa.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/config.php';

if (!isset($titulo_pagina)) {
    $titulo_pagina = APP_NAME;
}
if (!isset($meta_descripcion)) {
    $meta_descripcion = 'Aprende ajedrez desde cero con guías, estrategias y ejercicios para mejorar tus habilidades y dominar el tablero.';
}
if (!isset($ruta_base)) {
    $ruta_base = '';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($titulo_pagina) ?></title>

    <meta name="description" content="<?= htmlspecialchars($meta_descripcion) ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="<?= $ruta_base ?>css/style.css">
</head>

<body>
    <!-- Entorno de ejecución (APP_ENV) cargado desde .env: <?= htmlspecialchars(APP_ENV) ?> -->

    <div class="app-shell">
