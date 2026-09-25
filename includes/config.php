<?php
/**
 * includes/config.php
 * -----------------------------------------------------------------
 * Configuración global de la aplicación.
 *
 * Carga las variables definidas en el archivo .env (ubicado en la
 * raíz del proyecto) y las expone como constantes PHP:
 *
 *   APP_NAME   -> nombre del sitio
 *   APP_EMAIL  -> correo de contacto de la aplicación
 *   APP_ENV    -> entorno de ejecución (local, production, etc.)
 *
 * No se utiliza ninguna librería externa (como vlucas/phpdotenv)
 * porque el nivel del TP no lo requiere: se implementa un lector
 * de .env simple y suficiente para este proyecto.
 * -----------------------------------------------------------------
 */

if (!function_exists('cargarEnv')) {
    function cargarEnv($rutaArchivo)
    {
        if (!file_exists($rutaArchivo) || !is_readable($rutaArchivo)) {
            return;
        }

        $lineas = file($rutaArchivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lineas as $linea) {
            $linea = trim($linea);

            // Ignora comentarios y líneas vacías
            if ($linea === '' || strpos($linea, '#') === 0) {
                continue;
            }

            if (strpos($linea, '=') === false) {
                continue;
            }

            list($clave, $valor) = explode('=', $linea, 2);
            $clave = trim($clave);
            $valor = trim($valor);

            // Quita comillas envolventes si existen ("valor" o 'valor')
            if (strlen($valor) >= 2) {
                $primero = substr($valor, 0, 1);
                $ultimo  = substr($valor, -1);
                if (($primero === '"' && $ultimo === '"') || ($primero === "'" && $ultimo === "'")) {
                    $valor = substr($valor, 1, -1);
                }
            }

            if ($clave !== '' && !array_key_exists($clave, $_ENV)) {
                putenv("$clave=$valor");
                $_ENV[$clave]    = $valor;
                $_SERVER[$clave] = $valor;
            }
        }
    }
}

// El archivo .env vive en la raíz del proyecto (un nivel por encima de includes/)
cargarEnv(__DIR__ . '/../.env');

if (!defined('APP_NAME')) {
    define('APP_NAME', $_ENV['APP_NAME'] ?? 'El Arte del Jaque');
}

if (!defined('APP_EMAIL')) {
    define('APP_EMAIL', $_ENV['APP_EMAIL'] ?? 'contacto@el-arte-del-jaque.com');
}

if (!defined('APP_ENV')) {
    define('APP_ENV', $_ENV['APP_ENV'] ?? 'local');
}
