<?php
/**
 * contacto.php
 * Página migrada desde paginas/contacto.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 */

$titulo_pagina    = "Contacto - El Arte del Jaque";
$meta_descripcion = "Envíanos tus consultas, sugerencias o comentarios sobre el sitio.";
$pagina_actual    = "contacto";
$header_titulo    = "Contacto";
$header_tagline   = "Estamos para ayudarte";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>

                <div class="page-title-block">
                    <span class="eyebrow">Contacto</span>
                    <h1>Hablemos</h1>
                    <p>Si tienes alguna consulta, sugerencia o comentario sobre el sitio, puedes enviarnos un mensaje mediante el siguiente formulario.</p>
                </div>

                <section class="page-section">
                    <form class="form-panel" action="#" method="post" novalidate id="contactForm">

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
                        </div>

                        <div class="form-group">
                            <label for="motivo">Motivo</label>
                            <select id="motivo" name="motivo" required>
                                <option value="">Selecciona una opción</option>
                                <option value="consulta">Consulta</option>
                                <option value="sugerencia">Sugerencia</option>
                                <option value="error">Informar un error</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="mensaje">Mensaje</label>
                            <textarea id="mensaje" name="mensaje" rows="6" placeholder="Escribe tu mensaje..." maxlength="500" required></textarea>
                        </div>

                        <div class="form-checkbox">
                            <input type="checkbox" id="aceptar" name="aceptar" required>
                            <label for="aceptar">Acepto enviar este formulario.</label>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-gold">Enviar</button>
                            <button type="reset" class="btn-outline">Borrar</button>
                        </div>

                        <p class="field-success hidden" id="formSuccess">¡Gracias! Tu mensaje fue enviado correctamente.</p>

                    </form>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
