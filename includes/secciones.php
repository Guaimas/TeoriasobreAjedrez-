<?php
/**
 * includes/secciones.php
 * -----------------------------------------------------------------
 * Funciones para trabajar con la lista de secciones del sitio
 * (datos/secciones.php). Las usan nav.php, paginacion.php y la
 * página "Sobre el sitio".
 * -----------------------------------------------------------------
 */

if (!function_exists('secciones_del_sitio')) {
    /**
     * Devuelve el array de secciones. Lo lee una sola vez y lo guarda
     * en una variable estática, aunque se llame desde varios archivos.
     */
    function secciones_del_sitio()
    {
        static $secciones = null;

        if ($secciones === null) {
            $secciones = require __DIR__ . '/../datos/secciones.php';
        }

        return $secciones;
    }
}

if (!function_exists('url_seccion')) {
    /**
     * Arma el enlace a una sección según dónde está la página actual.
     *
     *   url_seccion('index', '../', '')        -> "../index.php"
     *   url_seccion('glosario', '', 'paginas/') -> "paginas/glosario.php"
     */
    function url_seccion($slug, $ruta_base, $ruta_paginas)
    {
        if ($slug === 'index') {
            return $ruta_base . 'index.php';
        }

        // TP7: el panel de administración está en la carpeta admin/.
        if ($slug === 'admin') {
            return $ruta_base . 'admin/index.php';
        }

        return $ruta_paginas . $slug . '.php';
    }
}
