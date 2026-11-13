-- =================================================================
-- TP8 - El Arte del Jaque
-- usuarios_prueba.sql: un administrador y un usuario común de prueba.
--
-- Orden de importación en phpMyAdmin:
--   1. tp6/schema.sql        (crea la base y las tablas)
--   2. tp6/consultas.sql     (roles, temas y usuarios del TP6)
--   3. tp7/datos_prueba.sql  (los 20 ejercicios del sitio)
--   4. tp8/usuarios_prueba.sql (este archivo)
--
-- No hace falta migración: la tabla usuarios del TP6 ya tiene todo
-- lo que pide el TP8 (nombre, email UNIQUE, password VARCHAR(255),
-- created_at). El rol se guarda normalizado: rol_id es una clave
-- foránea a la tabla roles ('administrador' o 'estudiante'). Al
-- iniciar sesión, PHP lo traduce a 'admin' o 'usuario'.
--
-- Las contraseñas son HASHES bcrypt reales generados con
-- password_hash($password, PASSWORD_BCRYPT). Nunca se guarda la
-- contraseña en texto plano. Credenciales de prueba (ver tp8/README.md):
--   admin@demo.com   / Admin1234    -> rol admin
--   usuario@demo.com / Usuario1234  -> rol usuario
-- =================================================================

USE arte_del_jaque;

-- Si el script se vuelve a ejecutar, se borran antes los dos usuarios
-- de prueba para que no choque con el UNIQUE del email.
DELETE FROM usuarios WHERE email IN ('admin@demo.com', 'usuario@demo.com');

-- El rol se busca por nombre en la tabla roles (subconsulta), así no
-- depende del id que haya generado AUTO_INCREMENT.
INSERT INTO usuarios (rol_id, nombre, apellido, email, password) VALUES
    ((SELECT id FROM roles WHERE nombre = 'administrador'), 'Admin', 'Demo', 'admin@demo.com',
        '$2y$10$vhGbAcFRA6SQsLgBO6kEIuyILp5qamdJPGaFL7S2LbDSyiJL5m2ie'),
    ((SELECT id FROM roles WHERE nombre = 'estudiante'), 'Usuario', 'Demo', 'usuario@demo.com',
        '$2y$10$fv2nymLwtztHrvlMCwZI4uiuhM/bm7KPZeMivvdyD6eeqBlbaN7OW');

-- Comprobación: usuarios con el nombre de su rol (INNER JOIN).
-- La columna password muestra el hash, nunca la contraseña.
SELECT u.id, u.nombre, u.apellido, u.email, r.nombre AS rol,
       LEFT(u.password, 7) AS inicio_del_hash, u.created_at
FROM usuarios u
INNER JOIN roles r ON r.id = u.rol_id
ORDER BY u.id;
