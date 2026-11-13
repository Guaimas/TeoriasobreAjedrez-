<?php
/**
 * includes/ejercicios_bd.php
 * -----------------------------------------------------------------
 * TP7 — Ejercicios de la página pública leídos desde MySQL.
 *
 * ejercicios_desde_bd() devuelve los ejercicios con el MISMO formato
 * que datos/ejercicios.php (agrupados por tema), así la página y el
 * componente ejercicio() no cambian. Si la base no está disponible
 * devuelve null y la página usa datos/ejercicios.php como respaldo.
 *
 * Lo que se carga o edita en admin/ aparece directamente en
 * paginas/ejercicios.php.
 * -----------------------------------------------------------------
 */

require_once __DIR__ . '/../config/conexion.php';

if (!function_exists('slug_tema')) {
    /** "Tácticas" -> "tacticas": el id de cada pestaña (lo usan enlaces como ejercicios.php#finales). */
    function slug_tema(string $nombre): string
    {
        $slug = strtr(mb_strtolower($nombre, 'UTF-8'), ['á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u', 'ñ' => 'n']);

        return trim(preg_replace('/[^a-z0-9]+/', '-', $slug), '-');
    }
}

if (!function_exists('ejercicios_desde_bd')) {
    function ejercicios_desde_bd(?PDO $pdo): ?array
    {
        if ($pdo === null) {
            return null;
        }

        try {
            // Estas consultas no reciben datos del usuario: se usa query().
            $temas = $pdo->query('SELECT id, nombre, descripcion FROM temas ORDER BY id')->fetchAll();

            $ejercicios = $pdo->query('SELECT id, tema_id, nivel, enunciado, posicion_fen, explicacion
                                       FROM ejercicios ORDER BY id')->fetchAll();

            // Opciones de todos los ejercicios, agrupadas por ejercicio_id.
            $opciones = [];
            foreach ($pdo->query('SELECT ejercicio_id, texto, es_correcta
                                  FROM opciones_ejercicio ORDER BY ejercicio_id, letra') as $op) {
                $opciones[$op['ejercicio_id']][] = [$op['texto'], (bool) $op['es_correcta']];
            }
        } catch (PDOException $ex) {
            error_log('Ejercicios públicos: ' . $ex->getMessage());
            return null;
        }

        $grupos = [];
        foreach ($temas as $tema) {
            $grupos[$tema['id']] = [
                'clave'       => slug_tema($tema['nombre']),
                'titulo'      => $tema['nombre'],
                'descripcion' => (string) $tema['descripcion'],
                'ejercicios'  => [],
            ];
        }

        foreach ($ejercicios as $ej) {
            $grupos[$ej['tema_id']]['ejercicios'][] = [
                'nivel'       => $ej['nivel'],
                'enunciado'   => $ej['enunciado'],
                'posicion'    => $ej['posicion_fen'],
                // La tabla no guarda de quién es el turno: se deduce del
                // enunciado ("Juegan las negras..."); si no lo dice, blancas.
                'turno'       => preg_match('/juegan las negras/iu', $ej['enunciado']) ? 'negras' : 'blancas',
                'opciones'    => $opciones[$ej['id']] ?? [],
                'explicacion' => $ej['explicacion'],
            ];
        }

        // Mismo formato que datos/ejercicios.php: clave => tema.
        // Los temas sin ejercicios no se muestran.
        $resultado = [];
        foreach ($grupos as $grupo) {
            if ($grupo['ejercicios']) {
                $resultado[$grupo['clave']] = $grupo;
            }
        }

        return $resultado;
    }
}
