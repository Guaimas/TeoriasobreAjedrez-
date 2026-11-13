-- =================================================================
-- TP6 - El Arte del Jaque
-- schema.sql: creación de la base de datos y de sus tablas.
--
-- Se ejecuta de una sola vez en phpMyAdmin (XAMPP / Laragon).
-- Las tablas se crean en orden: primero las maestras (roles, temas),
-- después las que tienen claves foráneas hacia ellas, y al final la
-- tabla de relación N:M (intentos).
-- =================================================================

CREATE DATABASE IF NOT EXISTS arte_del_jaque
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE arte_del_jaque;

-- Si el script se vuelve a ejecutar, se borran las tablas en orden
-- inverso (primero las que tienen FK) para poder crearlas de nuevo.
DROP TABLE IF EXISTS intentos;
DROP TABLE IF EXISTS opciones_ejercicio;
DROP TABLE IF EXISTS ejercicios;
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS temas;
DROP TABLE IF EXISTS roles;


-- -----------------------------------------------------------------
-- Tabla maestra: roles
-- Tipos de usuario del sitio (administrador, estudiante).
-- -----------------------------------------------------------------
CREATE TABLE roles (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    nombre      VARCHAR(50)  NOT NULL UNIQUE,
    descripcion VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- -----------------------------------------------------------------
-- Tabla maestra: temas
-- Categorías de los ejercicios: fundamentos, tácticas, estrategia
-- y finales (las mismas secciones del sitio).
-- -----------------------------------------------------------------
CREATE TABLE temas (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    nombre      VARCHAR(50)  NOT NULL UNIQUE,
    descripcion VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- -----------------------------------------------------------------
-- Tabla: usuarios
-- Personas registradas. Guarda los datos para iniciar sesión
-- (email y password) y sus datos personales.
-- La contraseña NUNCA se guarda en texto plano: se guarda el hash
-- generado con password_hash() de PHP (60 caracteres hoy, pero se
-- usa VARCHAR(255) porque el algoritmo puede cambiar en el futuro).
-- -----------------------------------------------------------------
CREATE TABLE usuarios (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    rol_id     INT          NOT NULL,
    nombre     VARCHAR(80)  NOT NULL,
    apellido   VARCHAR(80)  NOT NULL,
    email      VARCHAR(150) NOT NULL UNIQUE,
    password   VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    -- ON DELETE RESTRICT: no se puede borrar un rol si hay usuarios
    -- que lo tienen asignado (se quedarían sin rol).
    -- ON UPDATE CASCADE: si cambia el id del rol, se actualiza aquí.
    CONSTRAINT fk_usuarios_rol
        FOREIGN KEY (rol_id) REFERENCES roles (id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- -----------------------------------------------------------------
-- Tabla principal de negocio: ejercicios
-- Cada ejercicio de la página "Ejercicios" del sitio: su tema, su
-- nivel, el enunciado, la posición del tablero (opcional) y la
-- explicación de la solución.
-- -----------------------------------------------------------------
CREATE TABLE ejercicios (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    tema_id      INT          NOT NULL,
    autor_id     INT          NULL,
    nivel        ENUM('Principiante', 'Intermedio', 'Avanzado') NOT NULL,
    enunciado    VARCHAR(255) NOT NULL,
    posicion_fen VARCHAR(100) NULL,   -- posición en notación FEN (solo las piezas)
    explicacion  TEXT         NOT NULL,
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    -- ON DELETE RESTRICT: no se puede borrar un tema que todavía
    -- tiene ejercicios (primero hay que moverlos o borrarlos).
    CONSTRAINT fk_ejercicios_tema
        FOREIGN KEY (tema_id) REFERENCES temas (id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    -- ON DELETE SET NULL: si se borra el usuario que escribió el
    -- ejercicio, el ejercicio se conserva y queda sin autor.
    CONSTRAINT fk_ejercicios_autor
        FOREIGN KEY (autor_id) REFERENCES usuarios (id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- -----------------------------------------------------------------
-- Tabla de detalle: opciones_ejercicio
-- Las opciones de respuesta (A, B, C, D) de cada ejercicio.
-- Un ejercicio tiene varias opciones (relación 1:N) y puede tener
-- más de una correcta.
-- -----------------------------------------------------------------
CREATE TABLE opciones_ejercicio (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    ejercicio_id INT          NOT NULL,
    letra        CHAR(1)      NOT NULL,
    texto        VARCHAR(255) NOT NULL,
    es_correcta  TINYINT(1)   NOT NULL DEFAULT 0,   -- 1 = correcta, 0 = incorrecta

    -- Un mismo ejercicio no puede tener dos opciones con la misma letra.
    CONSTRAINT uq_opcion_letra UNIQUE (ejercicio_id, letra),

    -- ON DELETE CASCADE: las opciones no tienen sentido sin su
    -- ejercicio, así que se borran automáticamente con él.
    CONSTRAINT fk_opciones_ejercicio
        FOREIGN KEY (ejercicio_id) REFERENCES ejercicios (id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- -----------------------------------------------------------------
-- Tabla de relación N:M: intentos
-- Une usuarios con ejercicios: un usuario responde muchos ejercicios
-- y un ejercicio es respondido por muchos usuarios. Cada fila es un
-- intento: quién respondió, qué ejercicio, si acertó y cuándo.
-- (Un usuario puede intentar el mismo ejercicio más de una vez.)
-- -----------------------------------------------------------------
CREATE TABLE intentos (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id   INT        NOT NULL,
    ejercicio_id INT        NOT NULL,
    es_correcto  TINYINT(1) NOT NULL,   -- 1 = acertó, 0 = se equivocó
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,   -- fecha y hora del intento

    -- ON DELETE CASCADE: si se borra el usuario, se borra su historial
    -- de intentos (no tiene sentido sin la persona).
    CONSTRAINT fk_intentos_usuario
        FOREIGN KEY (usuario_id) REFERENCES usuarios (id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    -- ON DELETE CASCADE: si se borra un ejercicio, sus intentos
    -- también se borran.
    CONSTRAINT fk_intentos_ejercicio
        FOREIGN KEY (ejercicio_id) REFERENCES ejercicios (id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- -----------------------------------------------------------------
-- Índice explícito
-- La página de Ejercicios filtra con frecuencia por nivel
-- (ej: "solo ejercicios para principiantes"). Este índice evita que
-- MySQL recorra toda la tabla en cada consulta.
-- (Las columnas UNIQUE, como usuarios.email, y las claves foráneas
-- ya tienen un índice automático, por eso se eligió nivel.)
-- -----------------------------------------------------------------
CREATE INDEX idx_ejercicios_nivel ON ejercicios (nivel);
