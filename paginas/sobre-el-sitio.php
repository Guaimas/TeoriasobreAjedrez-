<?php
/**
 * sobre-el-sitio.php
 * Página migrada desde paginas/sobre-el-sitio.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 */

$titulo_pagina    = "Sobre el Sitio - El Arte del Jaque";
$meta_descripcion = "Conoce más sobre El Arte del Jaque, un sitio educativo dedicado a enseñar ajedrez.";
$pagina_actual    = "sobre-el-sitio";
$header_titulo    = "Sobre el Sitio";
$header_tagline   = "Nuestra filosofía";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Sobre el Sitio</span>
                    <h1>El Arte del Jaque</h1>
                    <p>Qué es este sitio, para quién fue pensado, qué vas a encontrar en él y cómo está construido.</p>
                </div>

                <section class="page-section">
                    <div class="content-block">
                        <div>
                            <h2>¿Qué es El Arte del Jaque?</h2>
                            <p>
                                El Arte del Jaque es un sitio educativo dedicado a enseñar ajedrez de forma
                                clara y ordenada, desde los movimientos más básicos hasta los conceptos
                                estratégicos y tácticos que usan los jugadores más avanzados.
                            </p>
                        </div>
                        <div>
                            <h2>Objetivo</h2>
                            <p>
                                Ofrecer un espacio educativo para aprender ajedrez de forma clara y accesible,
                                sin tecnicismos innecesarios, organizado por temas para que cada persona
                                avance a su propio ritmo.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>¿A quién está dirigido?</h2>
                    </div>
                    <div class="card-grid">
                        <div class="card">
                            <h3>Principiantes</h3>
                            <p>Personas que nunca jugaron al ajedrez y quieren aprender las reglas desde cero.</p>
                        </div>
                        <div class="card">
                            <h3>Quienes quieren mejorar sus fundamentos</h3>
                            <p>Jugadores que ya conocen las reglas pero quieren ordenar y afirmar sus bases.</p>
                        </div>
                        <div class="card">
                            <h3>Curiosos del ajedrez</h3>
                            <p>Cualquier persona interesada en aprender más sobre este juego, su historia y sus ideas.</p>
                        </div>
                    </div>
                </section>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>¿Qué encontrarás?</h2>
                    </div>
                    <div class="topic-grid">
                        <a class="card card--link" href="fundamentos.php"><h3>Fundamentos</h3><p>Tablero, piezas y reglas básicas.</p></a>
                        <a class="card card--link" href="tacticas.php"><h3>Tácticas</h3><p>Golpes que ganan material o la partida.</p></a>
                        <a class="card card--link" href="estrategias.php"><h3>Estrategias</h3><p>Planes y conceptos del medio juego.</p></a>
                        <a class="card card--link" href="aperturas.php"><h3>Aperturas</h3><p>Principios y aperturas más conocidas.</p></a>
                        <a class="card card--link" href="finales.php"><h3>Finales</h3><p>La fase técnica y decisiva.</p></a>
                        <a class="card card--link" href="partidas.php"><h3>Partidas Históricas</h3><p>Cinco partidas que enseñan.</p></a>
                        <a class="card card--link" href="ejercicios.php"><h3>Ejercicios</h3><p>Pon a prueba lo aprendido.</p></a>
                        <a class="card card--link" href="glosario.php"><h3>Glosario</h3><p>Términos con buscador incluido.</p></a>
                        <a class="card card--link" href="recursos.php"><h3>Recursos</h3><p>Libros y plataformas recomendadas.</p></a>
                        <a class="card card--link" href="contacto.php"><h3>Contacto</h3><p>Envía consultas o sugerencias.</p></a>
                    </div>
                </section>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Tecnologías utilizadas</h2>
                        <p>Este sitio fue construido con tecnologías web estándar, sin frameworks ni librerías externas.</p>
                    </div>
                    <div class="card-grid card-grid--4">
                        <div class="card">
                            <h3>HTML</h3>
                            <p>Define la estructura y el contenido de cada página: textos, imágenes, enlaces y secciones.</p>
                        </div>
                        <div class="card">
                            <h3>CSS</h3>
                            <p>Se encarga del diseño visual: colores, tipografías, espaciados y la adaptación del sitio a distintas pantallas.</p>
                        </div>
                        <div class="card">
                            <h3>JavaScript</h3>
                            <p>Aporta la interactividad: el menú desplegable en móvil, el modo claro y oscuro, el acordeón del glosario y las soluciones de los ejercicios.</p>
                        </div>
                        <div class="card">
                            <h3>PHP</h3>
                            <p>Arma cada página en el servidor: reutiliza el encabezado, el menú y el pie de página, y procesa de forma segura el formulario de contacto y el buscador del glosario.</p>
                        </div>
                    </div>
                </section>

                <hr>

                <section class="page-section">
                    <div class="section-heading">
                        <h2>Galería</h2>
                        <p>Un vistazo visual a algunos de los temas que vas a encontrar recorriendo el sitio.</p>
                    </div>

                    <div class="gallery" id="chessGallery">
                        <div class="gallery-viewer">
                            <button type="button" class="nav-arrow gallery-prev" aria-label="Imagen anterior">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 6l-6 6 6 6"/></svg>
                            </button>

                            <button type="button" class="gallery-zoom-btn" id="galleryZoomBtn" aria-label="Ampliar imagen">
                                <img id="galleryMainImg" src="https://images.pexels.com/photos/4576336/pexels-photo-4576336.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Piezas de ajedrez sobre un tablero">
                            </button>

                            <button type="button" class="nav-arrow gallery-next" aria-label="Imagen siguiente">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
                            </button>
                        </div>

                        <p class="gallery-caption" id="galleryCaption">Piezas de ajedrez sobre un tablero</p>

                        <div class="gallery-thumbs" id="galleryThumbs">
                            <button type="button" class="gallery-thumb active" data-index="0">
                                <img src="https://images.pexels.com/photos/4576336/pexels-photo-4576336.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Piezas de ajedrez sobre un tablero">
                            </button>
                            <button type="button" class="gallery-thumb" data-index="1">
                                <img src="https://images.pexels.com/photos/59197/pexels-photo-59197.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Batalla entre piezas de ajedrez">
                            </button>
                            <button type="button" class="gallery-thumb" data-index="2">
                                <img src="https://images.pexels.com/photos/8438872/pexels-photo-8438872.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Tablero de práctica">
                            </button>
                            <button type="button" class="gallery-thumb" data-index="3">
                                <img src="https://images.pexels.com/photos/6114949/pexels-photo-6114949.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Apertura Italiana">
                            </button>
                            <button type="button" class="gallery-thumb" data-index="4">
                                <img src="https://images.pexels.com/photos/37707936/pexels-photo-37707936.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="El jaque">
                            </button>
                            <button type="button" class="gallery-thumb" data-index="5">
                                <img src="https://images.pexels.com/photos/139392/checkmate-chess-resignation-conflict-139392.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="El jaque mate">
                            </button>
                            <button type="button" class="gallery-thumb" data-index="6">
                                <img src="https://images.pexels.com/photos/8438946/pexels-photo-8438946.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Movimiento de piezas">
                            </button>
                            <button type="button" class="gallery-thumb" data-index="7">
                                <img src="https://images.pexels.com/photos/27098300/pexels-photo-27098300.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="El medio juego en ajedrez">
                            </button>
                        </div>
                    </div>
                </section>

                <div class="lightbox" id="galleryLightbox" hidden>
                    <div class="lightbox-backdrop" data-lightbox-close></div>
                    <div class="lightbox-content" role="dialog" aria-modal="true" aria-label="Imagen ampliada">
                        <button type="button" class="lightbox-close" id="lightboxClose" aria-label="Cerrar imagen ampliada">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 6l12 12M18 6L6 18"/></svg>
                        </button>
                        <button type="button" class="nav-arrow lightbox-prev" aria-label="Imagen anterior">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 6l-6 6 6 6"/></svg>
                        </button>
                        <img id="lightboxImg" src="" alt="">
                        <button type="button" class="nav-arrow lightbox-next" aria-label="Imagen siguiente">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
                        </button>
                    </div>
                </div>

                <hr>

                <section class="page-section">
                    <div class="simple-panel">
                        <h2>¿Cómo aprovechar el sitio?</h2>
                        <p>
                            Si estás empezando, te recomendamos seguir las secciones en el orden del menú:
                            primero los <a href="fundamentos.php" style="color: var(--gold);">Fundamentos</a>
                            para conocer el tablero y las reglas; después las tácticas y las estrategias, que
                            explican cómo se gana material y cómo se arma un plan; y por último las aperturas
                            y los finales, que se entienden mejor cuando ya conoces lo anterior.
                        </p>
                        <p>
                            Al final de cada sección encontrarás enlaces para pasar a la anterior o a la
                            siguiente. Cuando aparezca una palabra que no conoces, búscala en el
                            <a href="glosario.php" style="color: var(--gold);">Glosario</a>, y cuando
                            termines un tema, comprueba lo aprendido en
                            <a href="ejercicios.php" style="color: var(--gold);">Ejercicios</a>.
                        </p>
                    </div>
                    <div class="simple-panel">
                        <h2>Un proyecto en crecimiento</h2>
                        <p>
                            El Arte del Jaque es un sitio educativo creado por Samuel como proyecto de
                            aprendizaje de desarrollo web, y se sigue ampliando con nuevos contenidos. Si
                            encuentras un error, tienes una sugerencia o quieres proponer un tema, puedes
                            escribirnos desde la página de
                            <a href="contacto.php" style="color: var(--gold);">Contacto</a>.
                        </p>
                    </div>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
