<?php
/**
 * plan-de-estudio.php
 * Plan de estudio por niveles (Fase 7).
 *
 * No agrega contenido nuevo: ordena en tres niveles las secciones que
 * ya existen en el sitio y enlaza directamente a cada parte (#ancla).
 * Los pasos están en el array $niveles; cada paso es
 * [texto del enlace, dirección, explicación breve].
 */

$titulo_pagina    = "Plan de Estudio - El Arte del Jaque";
$meta_descripcion = "Un recorrido ordenado por niveles (principiante, intermedio y avanzado) para aprender ajedrez con las secciones de El Arte del Jaque.";
$pagina_actual    = "plan-de-estudio";
$header_titulo    = "Plan de Estudio";
$header_tagline   = "Qué aprender y en qué orden";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

$niveles = [
    [
        'nivel'    => 'Principiante',
        'objetivo' => 'Conocer las reglas, mover las piezas con seguridad y saber terminar una partida.',
        'pasos'    => [
            ['El tablero y las piezas', 'fundamentos.php#tablero', 'Cómo se ubica el tablero y cómo se mueve cada pieza.'],
            ['Reglas especiales', 'fundamentos.php#captura-al-paso', 'Captura al paso, enroque y promoción.'],
            ['Jaque, jaque mate y ahogado', 'fundamentos.php#jaque-mate-ahogado', 'Las formas en que termina una partida.'],
            ['Notación algebraica', 'fundamentos.php#notacion', 'Para poder leer todas las jugadas del sitio.'],
            ['Mates básicos', 'finales.php#mates-basicos', 'Dar mate con dama o con torre contra el rey solo.'],
            ['Principios de la apertura', 'aperturas.php', 'Desarrollo, centro y enroque, antes de memorizar jugadas.'],
            ['Trampas de apertura', 'aperturas.php#trampas', 'Para no caer en el Mate del Pastor ni en otras trampas clásicas.'],
            ['Ejercicios de fundamentos', 'ejercicios.php#fundamentos', 'Comprueba lo aprendido.'],
        ],
    ],
    [
        'nivel'    => 'Intermedio',
        'objetivo' => 'Ver las tácticas, elegir un repertorio de aperturas y empezar a pensar en planes.',
        'pasos'    => [
            ['Las 12 tácticas', 'tacticas.php', 'Horquilla, clavada, ataque descubierto y las demás, con ejemplos.'],
            ['Patrones de mate', 'tacticas.php#patrones-de-mate', 'Las figuras que se repiten en las combinaciones.'],
            ['Aperturas abiertas', 'aperturas.php?tipo=abierta#catalogo', 'Un buen punto de partida para elegir con qué jugar.'],
            ['Conceptos estratégicos', 'estrategias.php', 'Centro, columnas abiertas, casillas débiles y más.'],
            ['Conceptos de finales', 'finales.php', 'Oposición, regla del cuadrado y peones pasados.'],
            ['Partidas Históricas', 'partidas.php', 'Ver las ideas aplicadas en partidas reales.'],
            ['Historia y campeones', 'historia.php', 'De dónde viene el ajedrez y quiénes fueron sus campeones.'],
            ['Ejercicios de tácticas', 'ejercicios.php#tacticas', 'Encuentra el golpe en posiciones reales.'],
        ],
    ],
    [
        'nivel'    => 'Avanzado',
        'objetivo' => 'Entender la estructura de la posición, ampliar el repertorio y dominar los finales teóricos.',
        'pasos'    => [
            ['Estructuras de peones', 'estrategias.php#estructuras-de-peones', 'Peón aislado, colgantes, cadenas y mayorías.'],
            ['Piezas buenas y malas', 'estrategias.php#piezas-buenas-y-malas', 'Alfil bueno o malo y caballo contra alfil.'],
            ['Finales teóricos', 'finales.php#finales-teoricos', 'Las posiciones de Lucena y Philidor.'],
            ['Aperturas semiabiertas', 'aperturas.php?tipo=semiabierta#catalogo', 'Siciliana, Francesa, Caro-Kann y más.'],
            ['Defensas indias', 'aperturas.php?tipo=india#catalogo', 'India de Rey, Nimzoindia, Grünfeld y otras.'],
            ['Ejercicios de estrategia y finales', 'ejercicios.php#estrategia', 'Evaluar posiciones y aplicar la técnica.'],
            ['Recursos para seguir', 'recursos.php', 'Libros y plataformas para continuar más allá del sitio.'],
        ],
    ],
];

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Plan de Estudio</span>
                    <h1>Qué aprender y en qué orden</h1>
                    <p>Un recorrido por las secciones del sitio, ordenado en tres niveles.</p>
                </div>

                <section class="page-section">
                    <div class="simple-panel">
                        <p>
                            No hace falta leer todo el sitio de corrido. Elige tu nivel y sigue los pasos en orden:
                            cada uno te lleva directamente a la parte del sitio donde se explica. Si una palabra no
                            la conoces, búscala en el <a href="glosario.php" style="color: var(--gold);">Glosario</a>.
                        </p>
                        <p>
                            <strong>Un consejo para todos los niveles:</strong> juega partidas con regularidad y, después
                            de cada una, revisa en qué momento cambió el resultado. Lo que leas aquí se fija mucho mejor
                            cuando lo ves en tus propias partidas.
                        </p>
                    </div>
                </section>

                <?php foreach ($niveles as $n => $nivel): ?>
                <hr>

                <section class="page-section">
                    <div class="simple-panel study-level">
                        <span class="pill">Nivel <?= $n + 1 ?></span>
                        <h2><?= htmlspecialchars($nivel['nivel']) ?></h2>
                        <p class="study-goal"><strong>Objetivo:</strong> <?= htmlspecialchars($nivel['objetivo']) ?></p>

                        <ol class="study-steps">
                            <?php foreach ($nivel['pasos'] as $paso): ?>
                            <li>
                                <a href="<?= htmlspecialchars($paso[1]) ?>"><?= htmlspecialchars($paso[0]) ?></a>
                                <span><?= htmlspecialchars($paso[2]) ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </section>
                <?php endforeach; ?>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
