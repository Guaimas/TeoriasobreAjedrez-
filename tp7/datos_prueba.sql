-- =================================================================
-- TP7 - El Arte del Jaque
-- datos_prueba.sql: ejercicios extra para probar el CRUD.
--
-- Orden de importación en phpMyAdmin:
--   1. tp6/schema.sql      (crea la base y las tablas)
--   2. tp6/consultas.sql   (roles, temas, usuarios y 3 ejercicios)
--   3. tp7/datos_prueba.sql (este archivo: 5 ejercicios más)
--
-- Los id de tema y autor se buscan por nombre/email con subconsultas,
-- así el script no depende de qué número de id generó AUTO_INCREMENT.
-- =================================================================

USE arte_del_jaque;

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Fundamentos'),
     (SELECT id FROM usuarios WHERE email = 'admin@arte-del-jaque.com'),
     'Principiante',
     '¿Qué pieza es la única que puede saltar por encima de otras piezas?',
     NULL,
     'El caballo se mueve en forma de L y es la única pieza que puede saltar sobre las demás.'),

    ((SELECT id FROM temas WHERE nombre = 'Tácticas'),
     (SELECT id FROM usuarios WHERE email = 'admin@arte-del-jaque.com'),
     'Intermedio',
     'Juegan las blancas. La torre negra está clavada: ¿cómo se aprovecha?',
     '4k3/4r3/8/8/8/8/4R3/4K3',
     'La torre de e7 no puede moverse sin dejar al rey en jaque: está clavada. Ganar tiempo atacándola con más piezas.'),

    ((SELECT id FROM temas WHERE nombre = 'Estrategia'),
     (SELECT id FROM usuarios WHERE email = 'admin@arte-del-jaque.com'),
     'Intermedio',
     '¿Por qué conviene ocupar una columna abierta con la torre?',
     NULL,
     'Una columna sin peones deja que la torre llegue a la séptima fila y ataque los peones y el rey rival.'),

    ((SELECT id FROM temas WHERE nombre = 'Finales'),
     NULL,
     'Avanzado',
     'Rey y peón contra rey: ¿por qué es clave la oposición?',
     '8/8/4k3/8/4K3/4P3/8/8',
     'Los reyes están enfrentados con una casilla entre medio. Quien NO tiene que mover tiene la oposición y decide si el peón corona o si es tablas. Ejercicio sin autor (autor_id NULL).'),

    ((SELECT id FROM temas WHERE nombre = 'Finales'),
     (SELECT id FROM usuarios WHERE email = 'ana.garcia@correo.com'),
     'Principiante',
     '¿Cuál es el mate básico más sencillo de aprender?',
     NULL,
     'El mate de dama y rey contra rey: se encierra al rey en un borde y la dama da mate con apoyo del rey.');

-- Opciones de respuesta para dos de los ejercicios nuevos
-- (el listado del panel muestra cuántas opciones tiene cada uno).
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    ((SELECT id FROM ejercicios WHERE enunciado LIKE '¿Qué pieza es la única%'), 'A', 'El alfil',   0),
    ((SELECT id FROM ejercicios WHERE enunciado LIKE '¿Qué pieza es la única%'), 'B', 'El caballo', 1),
    ((SELECT id FROM ejercicios WHERE enunciado LIKE '¿Qué pieza es la única%'), 'C', 'La dama',    0),
    ((SELECT id FROM ejercicios WHERE enunciado LIKE '¿Cuál es el mate básico%'), 'A', 'Dama y rey contra rey', 1),
    ((SELECT id FROM ejercicios WHERE enunciado LIKE '¿Cuál es el mate básico%'), 'B', 'Dos alfiles y rey',     0);

-- Comprobación: ejercicios con el nombre del tema (INNER JOIN).
SELECT e.id, t.nombre AS tema, e.nivel, e.enunciado
FROM ejercicios e
INNER JOIN temas t ON t.id = e.tema_id
ORDER BY e.id;
