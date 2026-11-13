-- =================================================================
-- TP6 - El Arte del Jaque
-- consultas.sql: datos de prueba y consultas CRUD.
--
-- Ejecutar DESPUÉS de schema.sql, sobre la base recién creada
-- (los id que se usan en UPDATE y DELETE son los que genera
-- AUTO_INCREMENT a partir de 1).
-- =================================================================

USE arte_del_jaque;


-- =================================================================
-- CREATE: datos iniciales
-- =================================================================

-- Tabla maestra roles: los dos tipos de usuario del sitio.
INSERT INTO roles (nombre, descripcion) VALUES
    ('administrador', 'Puede cargar y editar ejercicios'),
    ('estudiante',    'Resuelve los ejercicios del sitio');

-- Tabla maestra temas: las cuatro secciones de ejercicios.
INSERT INTO temas (nombre, descripcion) VALUES
    ('Fundamentos', 'Reglas básicas y movimiento de las piezas'),
    ('Tácticas',    'Golpes tácticos: horquillas, clavadas, mates'),
    ('Estrategia',  'Evaluación de posiciones y planes'),
    ('Finales',     'Técnica de la fase final de la partida');

-- Usuarios: un administrador y una estudiante.
-- Las contraseñas están guardadas como hash generado con
-- password_hash() de PHP, nunca en texto plano.
INSERT INTO usuarios (rol_id, nombre, apellido, email, password) VALUES
    (1, 'Samuel', 'Guaimas', 'admin@arte-del-jaque.com',
        '$2y$10$UBRfLFUvhHKH.P80mZHK0OlD01s6Dtk4eX7REI77DPiKpHdwbBQmW'),
    (2, 'Ana', 'García', 'ana.garcia@correo.com',
        '$2y$10$pmwXyAQofvLpcDtGnJyzt.aU3EjfprdGPR1pwCAPxaQT9z3u9IiB2');

-- Tabla principal ejercicios: tres ejercicios reales del sitio,
-- con claves foráneas válidas (tema_id y autor_id existen).
INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    (1, 1, 'Principiante',
        '¿Cuántos peones vale aproximadamente una torre?',
        NULL,
        'Valores de referencia: peón 1, caballo y alfil 3, torre 5 y dama 9.'),
    (2, 1, 'Principiante',
        'Juegan las blancas. ¿Qué jugada gana material?',
        'r3k3/8/8/3N4/8/8/8/4K3',
        'Cc7+ es una horquilla: da jaque al rey y ataca la torre de a8 a la vez.'),
    (4, 1, 'Principiante',
        'Juegan las blancas y dan jaque mate en una jugada.',
        'k7/8/1K6/8/8/8/8/2Q5',
        'Dc8# es mate. Cuidado con Dc7: no es jaque y sería ahogado (tablas).');

-- Tabla de detalle opciones_ejercicio: las opciones de cada ejercicio.
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (1, 'A', '1', 0),
    (1, 'B', '3', 0),
    (1, 'C', '5', 1),
    (1, 'D', '9', 0),
    (2, 'A', 'Cc7+', 1),
    (2, 'B', 'Cf6+', 0),
    (2, 'C', 'Ce7',  0),
    (3, 'A', 'Dc8#', 1),
    (3, 'B', 'Dc7',  0),
    (3, 'C', 'Da3+', 0);

-- Tabla de relación N:M intentos: qué usuario respondió qué ejercicio.
-- Ana acierta el ejercicio 1, falla el 2 y después lo acierta;
-- Samuel acierta el 3.
INSERT INTO intentos (usuario_id, ejercicio_id, es_correcto) VALUES
    (2, 1, 1),
    (2, 2, 0),
    (2, 2, 1),
    (1, 3, 1);

-- Registro de prueba (se borra al final, en la sección DELETE),
-- con sus opciones y un intento, para ver el borrado en cascada.
INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, explicacion) VALUES
    (3, 2, 'Avanzado', 'Ejercicio de prueba para borrar', 'Registro temporal.');

INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (4, 'A', 'Opción de prueba 1', 1),
    (4, 'B', 'Opción de prueba 2', 0);

INSERT INTO intentos (usuario_id, ejercicio_id, es_correcto) VALUES
    (2, 4, 1);


-- =================================================================
-- READ: consultas
-- =================================================================

-- Ejercicios de nivel Principiante (WHERE), del más reciente al más
-- antiguo (ORDER BY).
SELECT id, enunciado, nivel, created_at
FROM ejercicios
WHERE nivel = 'Principiante'
ORDER BY created_at DESC, id DESC;

-- Cada ejercicio con su tema, su autor y la respuesta correcta
-- (INNER JOIN de cuatro tablas).
SELECT e.id,
       e.enunciado,
       t.nombre                          AS tema,
       CONCAT(u.nombre, ' ', u.apellido) AS autor,
       o.texto                           AS respuesta_correcta
FROM ejercicios e
INNER JOIN temas t              ON t.id = e.tema_id
INNER JOIN usuarios u           ON u.id = e.autor_id
INNER JOIN opciones_ejercicio o ON o.ejercicio_id = e.id AND o.es_correcta = 1
ORDER BY e.id;

-- Intentos de los usuarios: la relación N:M usuarios <-> ejercicios
-- (INNER JOIN de tres tablas a través de la tabla intentos).
SELECT CONCAT(u.nombre, ' ', u.apellido)                AS usuario,
       e.enunciado                                      AS ejercicio,
       IF(i.es_correcto = 1, 'Acertó', 'Se equivocó')   AS resultado,
       i.created_at                                     AS fecha
FROM intentos i
INNER JOIN usuarios u   ON u.id = i.usuario_id
INNER JOIN ejercicios e ON e.id = i.ejercicio_id
ORDER BY usuario, i.id;


-- =================================================================
-- UPDATE: modificar un registro específico
-- =================================================================

-- El ejercicio 3 (mate con la dama) pasa a nivel Intermedio.
-- updated_at se actualiza solo, gracias a ON UPDATE CURRENT_TIMESTAMP.
UPDATE ejercicios
SET nivel = 'Intermedio'
WHERE id = 3;

-- Comprobación del cambio.
SELECT id, nivel, created_at, updated_at
FROM ejercicios
WHERE id = 3;


-- =================================================================
-- DELETE: dar de baja el registro de prueba
-- =================================================================

-- Se borra el ejercicio de prueba (id 4). No rompe ninguna clave
-- foránea: sus dos opciones y su intento se borran automáticamente
-- por el ON DELETE CASCADE de opciones_ejercicio y de intentos.
DELETE FROM ejercicios
WHERE id = 4;

-- Comprobación: el ejercicio 4 ya no existe, ni sus opciones ni su intento.
SELECT COUNT(*) AS ejercicios_restantes FROM ejercicios;
SELECT COUNT(*) AS opciones_del_ejercicio_4 FROM opciones_ejercicio WHERE ejercicio_id = 4;
SELECT COUNT(*) AS intentos_del_ejercicio_4 FROM intentos WHERE ejercicio_id = 4;
