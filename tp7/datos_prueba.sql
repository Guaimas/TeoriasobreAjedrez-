-- =================================================================
-- TP7 - El Arte del Jaque
-- datos_prueba.sql: los 20 ejercicios del sitio, con sus opciones.
--
-- Orden de importación en phpMyAdmin:
--   1. tp6/schema.sql       (crea la base y las tablas)
--   2. tp6/consultas.sql    (roles, temas, usuarios y datos del TP6)
--   3. tp7/datos_prueba.sql (este archivo)
--
-- Reemplaza los ejercicios de prueba del TP6 por los 20 ejercicios
-- reales de la página Ejercicios (los mismos de datos/ejercicios.php).
-- Desde el TP7 esa página los lee de esta tabla.
--
-- Los id de tema y autor se buscan por nombre/email con subconsultas,
-- así el script no depende de qué id generó AUTO_INCREMENT. Cada
-- ejercicio guarda su id en @e (LAST_INSERT_ID()) para cargar sus
-- opciones de respuesta.
-- =================================================================

USE arte_del_jaque;

-- Se vacían los ejercicios de prueba del TP6. Sus opciones e intentos
-- se borran solos por el ON DELETE CASCADE.
DELETE FROM ejercicios;
ALTER TABLE ejercicios AUTO_INCREMENT = 1;
ALTER TABLE opciones_ejercicio AUTO_INCREMENT = 1;

SET @autor = (SELECT id FROM usuarios WHERE email = 'admin@arte-del-jaque.com');

-- -----------------------------------------------------------------
-- Fundamentos
-- -----------------------------------------------------------------

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Fundamentos'), @autor, 'Principiante',
     'El caballo blanco está en e4. ¿A cuáles de estas casillas puede moverse?',
     '8/8/8/8/4N3/8/8/8',
     'El caballo se mueve en forma de "L": dos casillas en una dirección y una en perpendicular. Desde e4 puede ir a d6, f6, c5, g5, c3, g3, d2 y f2. De las opciones, d6 y c3 son correctas.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'e6', 0),
    (@e, 'B', 'd6', 1),
    (@e, 'C', 'f4', 0),
    (@e, 'D', 'c3', 1);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Fundamentos'), @autor, 'Principiante',
     '¿Cuáles de estas condiciones son necesarias para poder enrocar?',
     NULL,
     'Para enrocar, ni el rey ni la torre deben haberse movido, no puede haber piezas entre ambos y el rey no puede estar en jaque ni pasar por una casilla atacada. No hace falta que sea la primera jugada.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'Que ni el rey ni esa torre se hayan movido antes', 1),
    (@e, 'B', 'Que el rey esté en jaque', 0),
    (@e, 'C', 'Que no haya piezas entre el rey y la torre', 1),
    (@e, 'D', 'Que sea la primera jugada de la partida', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Fundamentos'), @autor, 'Principiante',
     '¿Cuántos peones vale aproximadamente una torre?',
     NULL,
     'Valores de referencia: peón 1, caballo y alfil 3, torre 5 y dama 9. El rey no tiene valor numérico porque no puede perderse.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', '1', 0),
    (@e, 'B', '3', 0),
    (@e, 'C', '5', 1),
    (@e, 'D', '9', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Fundamentos'), @autor, 'Intermedio',
     'Las negras acaban de jugar su peón de d7 a d5. Juegan las blancas: ¿qué captura pueden hacer?',
     '4k3/8/8/3pP3/8/8/8/4K3',
     'Como el peón negro avanzó dos casillas y quedó al lado del peón blanco, las blancas pueden capturarlo "al paso": el peón de e5 va a d6 y el de d5 sale del tablero. Solo se puede en la jugada inmediata.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'exd6, capturando al paso', 1),
    (@e, 'B', 'exd5', 0),
    (@e, 'C', 'Ninguna: los peones no pueden capturar hacia el costado', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Fundamentos'), @autor, 'Intermedio',
     'Juegan las negras. ¿Cómo termina la partida?',
     'k7/8/1Q6/8/8/8/8/7K',
     'El rey negro no está en jaque, pero las tres casillas a las que podría ir (a7, b7 y b8) están atacadas por la dama, y las negras no tienen otras piezas. Sin jugadas legales y sin jaque, es ahogado: tablas.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'Jaque mate: ganan las blancas', 0),
    (@e, 'B', 'Ahogado: es tablas', 1),
    (@e, 'C', 'Las negras pueden jugar Rb8', 0);

-- -----------------------------------------------------------------
-- Tácticas
-- -----------------------------------------------------------------

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Tácticas'), @autor, 'Principiante',
     'Juegan las blancas. ¿Qué jugada gana material?',
     'r3k3/8/8/3N4/8/8/8/4K3',
     'Cc7+ es una horquilla: el caballo da jaque al rey de e8 y ataca la torre de a8 al mismo tiempo. Las negras deben mover el rey y pierden la torre. Cf6+ también da jaque, pero no ataca nada más; Ce7 se puede capturar con el rey, y Cb6 ataca la torre sin jaque, así que la torre se escapa.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'Cc7+', 1),
    (@e, 'B', 'Cf6+', 0),
    (@e, 'C', 'Ce7', 0),
    (@e, 'D', 'Cb6', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Tácticas'), @autor, 'Principiante',
     'Juegan las blancas y dan jaque mate en una jugada.',
     '6k1/5ppp/8/8/8/8/8/4R1K1',
     'Te8# es el mate del pasillo: el rey negro está encerrado por sus propios peones de f7, g7 y h7, y la torre controla toda la octava fila (f8 y h8 incluidas). Las negras no tienen piezas para tapar ni capturar.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'Te8#', 1),
    (@e, 'B', 'Te7', 0),
    (@e, 'C', 'Rf2', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Tácticas'), @autor, 'Principiante',
     'Tras 1.e4 e5 2.Ac4 Cc6 3.Dh5, juegan las negras. ¿Cuál de estas jugadas pierde de inmediato?',
     'r1bqkbnr/pppp1ppp/2n5/4p2Q/2B1P3/8/PPPP1PPP/RNB1K1NR',
     '3...Cf6?? ataca a la dama, pero deja f7 sin defender: 4.Dxf7# es el Mate del Pastor (la dama está protegida por el alfil de c4). Con 3...g6 o 3...De7 las negras defienden f7 y quedan bien.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', '3...Cf6', 1),
    (@e, 'B', '3...g6', 0),
    (@e, 'C', '3...De7', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Tácticas'), @autor, 'Intermedio',
     'Tras 1.e4 e5 2.Cf3 Cf6 3.Cxe5 Cxe4 4.De2 Cf6, juegan las blancas. ¿Qué jugada gana la dama negra?',
     'rnbqkb1r/pppp1ppp/5n2/4N3/8/8/PPPPQPPP/RNB1KB1R',
     'Cc6+ es un jaque descubierto: al salir el caballo de e5, la dama de e2 da jaque al rey por la columna e, y a la vez el caballo ataca la dama de d8. Las negras tienen que atender el jaque y pierden la dama. Es la trampa de la Defensa Petrov.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'Cc6+', 1),
    (@e, 'B', 'Cxf7', 0),
    (@e, 'C', 'd4', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Tácticas'), @autor, 'Avanzado',
     'Juegan las blancas y dan mate en dos jugadas. ¿Cuál es la primera?',
     '5r1k/6pp/7N/3Q4/8/8/8/2K5',
     'Dg8+!! es un sacrificio de dama: el rey no puede capturarla porque el caballo de h6 defiende g8, así que la torre está obligada a hacerlo (1...Txg8). Entonces 2.Cf7# es un mate de la coz: el rey de h8 queda encerrado por su torre y sus peones. Con 1.Cf7+ la torre captura el caballo, y 1.Dd8 se responde con 1...Txd8.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'Dg8+', 1),
    (@e, 'B', 'Cf7+', 0),
    (@e, 'C', 'Dd8', 0);

-- -----------------------------------------------------------------
-- Estrategia
-- -----------------------------------------------------------------

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Estrategia'), @autor, 'Principiante',
     'Tienes una torre en una columna completamente abierta (sin peones de ningún color). En general, ¿qué conviene hacer?',
     NULL,
     'Las columnas abiertas son el mejor terreno para las torres. Mantenerlas ahí, e incluso duplicarlas (las dos torres en la misma columna), suele generar mucha presión sobre la posición rival.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'Retirarla a su casilla inicial', 0),
    (@e, 'B', 'Mantenerla activa en esa columna y, si se puede, duplicarla con la otra torre', 1),
    (@e, 'C', 'Cambiarla por un peón rival lo antes posible', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Estrategia'), @autor, 'Principiante',
     'No encuentras un plan claro y todas tus piezas están bien ubicadas menos una. ¿Qué conviene hacer?',
     NULL,
     'Cuando no aparece un plan evidente, uno de los recursos más confiables es mejorar la pieza peor ubicada: casi siempre mejora la posición general.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'Mover peones al azar', 0),
    (@e, 'B', 'Buscarle una mejor casilla a esa pieza', 1),
    (@e, 'C', 'Ofrecer tablas', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Estrategia'), @autor, 'Intermedio',
     '¿Cuándo se dice que un alfil es "malo"?',
     NULL,
     'Los propios peones fijos en casillas de su color le bloquean las diagonales y lo dejan reducido a defenderlos. Por eso conviene ubicar los peones en casillas del color contrario al del alfil.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'Cuando sus propios peones centrales están en casillas de su mismo color', 1),
    (@e, 'B', 'Cuando todavía no salió de su casilla inicial', 0),
    (@e, 'C', 'Cuando el rival tiene la pareja de alfiles', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Estrategia'), @autor, 'Intermedio',
     'Tienes una pieza de ventaja. En general, ¿qué conviene cambiar?',
     NULL,
     'Con ventaja de material conviene cambiar piezas: cuanto menos material quede, más pesa la pieza de más. Los peones conviene conservarlos, porque son los que pueden coronar. Si estás en desventaja, es al revés: evita los cambios.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'Piezas, para simplificar la posición', 1),
    (@e, 'B', 'Peones, para abrir el tablero', 0),
    (@e, 'C', 'Nada: hay que evitar todos los cambios', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Estrategia'), @autor, 'Avanzado',
     '¿Cuál es el punto más débil de una cadena de peones?',
     NULL,
     'Cada peón de la cadena está defendido por el de atrás, salvo la base, que no tiene ningún peón que la proteja. Por eso el plan habitual es atacar la base, como hacen las negras con ...c5 en la Defensa Francesa.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'La punta (el peón más adelantado)', 0),
    (@e, 'B', 'La base (el peón de más atrás)', 1),
    (@e, 'C', 'Todos los peones de la cadena son igual de débiles', 0);

-- -----------------------------------------------------------------
-- Finales
-- -----------------------------------------------------------------

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Finales'), @autor, 'Principiante',
     'Juegan las blancas y dan jaque mate en una jugada.',
     'k7/8/1K6/8/8/8/8/2Q5',
     'Dc8# es mate: la dama da jaque por la octava fila y controla b8, y el rey blanco cubre a7 y b7. ¡Cuidado con Dc7!: no es jaque, pero ataca a7, b7 y b8, así que el rey negro se queda sin jugadas legales y es ahogado (tablas). Da3+ da jaque por la columna a, pero el rey escapa a b8.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'Dc8#', 1),
    (@e, 'B', 'Dc7', 0),
    (@e, 'C', 'Da3+', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Finales'), @autor, 'Intermedio',
     'Juegan las blancas. ¿Puede el rey negro alcanzar al peón antes de que corone?',
     '8/8/8/P7/4k3/8/8/7K',
     'Regla del cuadrado: tras 1.a6, el cuadrado del peón va de a6 a c8. El rey negro, en e4, no puede entrar en él con una jugada: 1...Rd5 2.a7 Rc6 3.a8=D+ y el peón corona (además, con jaque).');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'No: el peón corona', 1),
    (@e, 'B', 'Sí: el rey lo alcanza', 0),
    (@e, 'C', 'Depende de lo que haga el rey blanco', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Finales'), @autor, 'Principiante',
     'En un final de rey y peón contra rey, tu rey y el rival están enfrentados con una casilla entre ambos, y te toca mover a ti. ¿Quién tiene la oposición?',
     NULL,
     'Tener la oposición significa que es el rival quien debe mover en esa posición enfrentada, y por eso tiene que ceder terreno. Si te toca mover a ti, la oposición la tiene el rival.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'Tú', 0),
    (@e, 'B', 'El rival', 1),
    (@e, 'C', 'Nadie: la oposición no existe en este final', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Finales'), @autor, 'Intermedio',
     'Tienes un peón pasado avanzado, pero tu rey está lejos y el rival está cerca. ¿Qué conviene revisar primero?',
     NULL,
     'La regla del cuadrado permite saber rápidamente, sin calcular jugada por jugada, si el rey rival llega a tiempo de detener al peón.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'Si el peón puede coronar sin ayuda', 0),
    (@e, 'B', 'Si el rey rival entra en el "cuadrado" del peón y puede alcanzarlo', 1),
    (@e, 'C', 'El valor total de las piezas del tablero', 0);

INSERT INTO ejercicios (tema_id, autor_id, nivel, enunciado, posicion_fen, explicacion) VALUES
    ((SELECT id FROM temas WHERE nombre = 'Finales'), @autor, 'Avanzado',
     'En la posición de Philidor (torre y peón contra torre), ¿dónde debe ubicar su torre el bando que se defiende?',
     NULL,
     'La defensa de Philidor tiene dos pasos: primero la torre en la tercera fila propia, para cortar el avance del rey rival; cuando el peón llega a esa fila, la torre va a la última fila y da jaques desde atrás. Así se asegura el empate.');
SET @e = LAST_INSERT_ID();
INSERT INTO opciones_ejercicio (ejercicio_id, letra, texto, es_correcta) VALUES
    (@e, 'A', 'En su tercera fila, para que el rey rival no avance', 1),
    (@e, 'B', 'Al lado de su propio rey, para protegerlo', 0),
    (@e, 'C', 'Detrás del peón rival desde el principio', 0);

-- Comprobación: cantidad de ejercicios por tema (INNER JOIN + GROUP BY).
SELECT t.nombre AS tema, COUNT(e.id) AS ejercicios
FROM temas t
INNER JOIN ejercicios e ON e.tema_id = t.id
GROUP BY t.id, t.nombre
ORDER BY t.id;
