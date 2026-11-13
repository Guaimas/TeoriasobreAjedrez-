<?php
/**
 * config/conexion.php
 * -----------------------------------------------------------------
 * TP7 — Conexión a MySQL con PDO.
 *
 * Crea la variable $pdo, que usan las páginas de admin/ para hacer
 * consultas a la base de datos del TP6 (arte_del_jaque).
 *
 * Si la conexión falla (por ejemplo, MySQL está apagado en XAMPP),
 * NO se muestra el error técnico en pantalla: se guarda en el log
 * del servidor y la página muestra un mensaje controlado.
 * -----------------------------------------------------------------
 */

// Datos de conexión de XAMPP / Laragon (usuario root sin contraseña).
$db_host     = 'localhost';
$db_nombre   = 'arte_del_jaque';
$db_usuario  = 'root';
$db_password = '';

// DSN: le dice a PDO qué motor usar, dónde está la base y con qué
// juego de caracteres conectarse (utf8mb4 = acentos, ñ y emojis).
$dsn = "mysql:host=$db_host;dbname=$db_nombre;charset=utf8mb4";

$opciones = [
    // Si una consulta falla, PDO lanza una excepción (PDOException)
    // en lugar de fallar en silencio.
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,

    // Los resultados llegan como arrays asociativos: $fila['enunciado'].
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

    // Consultas preparadas REALES: el SQL y los datos viajan por
    // separado a MySQL, así los datos nunca se interpretan como SQL
    // (protección contra inyección SQL).
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo           = null;   // queda en null si no hay conexión
$error_conexion = '';

try {
    $pdo = new PDO($dsn, $db_usuario, $db_password, $opciones);
} catch (PDOException $ex) {
    // El detalle técnico (usuario, servidor, motivo) va solo al log.
    error_log('Error de conexión a MySQL: ' . $ex->getMessage());

    // Mensaje controlado para mostrar en la página.
    $error_conexion = 'No se pudo conectar con la base de datos. Verifica que MySQL esté '
                    . 'iniciado en XAMPP y que la base "arte_del_jaque" esté importada.';
}
