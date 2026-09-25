<?php
/**
 * partidas.php
 * Página migrada desde paginas/partidas.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 */

$titulo_pagina    = "Partidas Históricas - El Arte del Jaque";
$meta_descripcion = "Cinco partidas históricas del ajedrez que todo estudiante debería conocer, con su contexto y las lecciones que enseñan.";
$pagina_actual    = "partidas";
$header_titulo    = "Partidas Históricas";
$header_tagline   = "Aprende de los grandes maestros";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Partidas Históricas</span>
                    <h1>Partidas que enseñan</h1>
                    <p>Estudiar cómo pensaron los grandes maestros es una de las formas más efectivas de mejorar.</p>
                </div>

                <section class="page-section">
                    <div class="simple-panel">
                        <p>
                            Repasar partidas históricas no es solo un ejercicio de memoria: es ver ideas
                            estratégicas y tácticas aplicadas por los mejores jugadores de la historia, en
                            situaciones reales. Cada una de estas cinco partidas se volvió famosa porque
                            enseña algo concreto: una combinación brillante, un sacrificio audaz o una forma
                            distinta de entender el tablero. No hace falta memorizar los movimientos exactos;
                            basta con entender la idea detrás de cada una.
                        </p>
                    </div>
                </section>

                <section class="page-section">

                    <article class="game-card">
                        <span class="eyebrow">1851</span>
                        <h2>La Partida Inmortal</h2>
                        <p class="game-players">Adolf Anderssen vs. Lionel Kieseritzky</p>

                        <h4>Contexto</h4>
                        <p>Jugada de forma informal en Londres durante un descanso del primer gran torneo internacional de ajedrez de la historia.</p>

                        <h4>Por qué es importante</h4>
                        <p>Anderssen sacrifica ambas torres, un alfil y su dama para lograr un jaque mate con las tres piezas menores que le quedaban. Es el ejemplo más citado de ajedrez romántico: priorizar el ataque por encima del material.</p>

                        <h4>Qué se puede aprender</h4>
                        <p>El valor del material es relativo cuando el rey rival queda expuesto: a veces entregar piezas está justificado si el ataque es lo bastante fuerte. También muestra la importancia de calcular una secuencia forzada hasta el final antes de sacrificar.</p>
                    </article>

                    <article class="game-card">
                        <span class="eyebrow">1858</span>
                        <h2>La Partida de la Ópera</h2>
                        <p class="game-players">Paul Morphy vs. Duque de Brunswick y Conde de Isouard</p>

                        <h4>Contexto</h4>
                        <p>Jugada por Morphy contra dos aficionados que jugaban en equipo, en un palco de la Ópera de París, mientras se representaba "El Barbero de Sevilla".</p>

                        <h4>Por qué es importante</h4>
                        <p>Es el ejemplo clásico de desarrollo rápido y eficiente: Morphy saca sus piezas con cada movimiento mientras sus rivales pierden tiempo, y remata con un sacrificio de dama que fuerza el jaque mate.</p>

                        <h4>Qué se puede aprender</h4>
                        <p>La importancia de desarrollar las piezas rápido, no mover la misma pieza dos veces sin motivo, y cómo la ventaja de desarrollo se puede convertir en un ataque decisivo.</p>
                    </article>

                    <article class="game-card">
                        <span class="eyebrow">1918</span>
                        <h2>Capablanca vs. Marshall</h2>
                        <p class="game-players">José Raúl Capablanca vs. Frank Marshall</p>

                        <h4>Contexto</h4>
                        <p>Marshall había preparado en secreto una nueva variante de ataque (el "Contragambito Marshall") específicamente para sorprender a Capablanca, considerado el jugador más sólido de su época.</p>

                        <h4>Por qué es importante</h4>
                        <p>A pesar de caer en la preparación de su rival, Capablanca defendió con una precisión extraordinaria y logró neutralizar el ataque, ganando la partida. La variante que Marshall estrenó ese día todavía lleva su nombre y se juega hoy en día.</p>

                        <h4>Qué se puede aprender</h4>
                        <p>El valor de la defensa precisa y la calma bajo presión frente a un ataque preparado, además de mostrar cómo nace una apertura: muchas variantes que hoy conocemos surgieron de una sola partida histórica.</p>
                    </article>

                    <article class="game-card">
                        <span class="eyebrow">1972</span>
                        <h2>Fischer vs. Spassky</h2>
                        <p class="game-players">Bobby Fischer vs. Boris Spassky</p>

                        <h4>Contexto</h4>
                        <p>El "Match del Siglo" por el título mundial, disputado en Reikiavik en plena Guerra Fría, enfrentando al retador estadounidense contra el campeón soviético.</p>

                        <h4>Por qué es importante</h4>
                        <p>Más allá del contexto político, el enfrentamiento mostró un ajedrez de altísimo nivel técnico y psicológico. Fischer terminó ganando el título, rompiendo más de dos décadas de dominio soviético.</p>

                        <h4>Qué se puede aprender</h4>
                        <p>La preparación exhaustiva de aperturas, la fortaleza psicológica durante un match largo y la importancia de aprovechar cada pequeño error del rival en partidas de altísimo nivel.</p>
                    </article>

                    <article class="game-card">
                        <span class="eyebrow">1999</span>
                        <h2>Kasparov vs. Topalov</h2>
                        <p class="game-players">Garry Kasparov vs. Veselin Topalov</p>

                        <h4>Contexto</h4>
                        <p>Jugada en el torneo de Wijk aan Zee, esta partida es conocida por una combinación tan larga y profunda que todavía se estudia como una de las mejores jamás calculadas por un ser humano.</p>

                        <h4>Por qué es importante</h4>
                        <p>Kasparov sacrifica una pieza y calcula con precisión una secuencia de más de 15 movimientos, incluyendo varios jaques y sacrificios adicionales, hasta forzar la victoria.</p>

                        <h4>Qué se puede aprender</h4>
                        <p>Hasta qué punto se puede llevar el cálculo táctico cuando se combina con una visión estratégica clara del final de la combinación: cada sacrificio tenía un propósito exacto dentro del plan general.</p>
                    </article>

                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
