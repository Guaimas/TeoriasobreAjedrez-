<?php
/**
 * contacto.php
 * Página migrada desde paginas/contacto.html (HTML estático) a PHP.
 * Usa las plantillas comunes de includes/ (header, nav, footer)
 * y define las variables de SSR requeridas por el TP.
 *
 * Clase 5 — Formulario POST:
 *   El procesamiento (captura, sanitización y validación) está en
 *   clase5/procesar_contacto.php. Esta página solo muestra el
 *   formulario, los errores y el mensaje de éxito. Todo dato que
 *   escribió el usuario se imprime con e() (htmlspecialchars).
 */

$titulo_pagina    = "Contacto - El Arte del Jaque";
$meta_descripcion = "Envíanos tus consultas, sugerencias o comentarios sobre el sitio.";
$pagina_actual    = "contacto";
$header_titulo    = "Contacto";
$header_tagline   = "Estamos para ayudarte";
$ruta_base        = "../";
$ruta_paginas     = "";
$es_home          = false;

require_once __DIR__ . '/../clase5/procesar_contacto.php';

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
                    <form class="form-panel" action="contacto.php" method="post" novalidate id="contactForm">

                        <?php if ($envio_exitoso): ?>
                        <p class="field-success" id="formSuccess" role="status">¡Gracias, <?= e($nombre_enviado) ?>! Recibimos tu mensaje (<?= e($motivo_enviado) ?>) correctamente.</p>
                        <?php elseif (!empty($errores)): ?>
                        <p class="form-alert" role="alert">No se pudo enviar el formulario. Revisá los campos marcados en rojo.</p>
                        <?php endif; ?>

                        <div class="form-group<?= clase_error('nombre', $errores) ?>">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" maxlength="<?= $NOMBRE_MAX ?>" value="<?= e($datos['nombre']) ?>" required<?= aria_error('nombre', $errores) ?>>
                            <?= mensaje_error('nombre', $errores) ?>
                        </div>

                        <div class="form-group<?= clase_error('email', $errores) ?>">
                            <label for="email">Correo electrónico</label>
                            <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" value="<?= e($datos['email']) ?>" required<?= aria_error('email', $errores) ?>>
                            <?= mensaje_error('email', $errores) ?>
                        </div>

                        <div class="form-group<?= clase_error('motivo', $errores) ?>">
                            <label for="motivo">Motivo</label>
                            <select id="motivo" name="motivo" required<?= aria_error('motivo', $errores) ?>>
                                <option value="">Selecciona una opción</option>
                                <?php foreach ($motivos_validos as $valor => $texto): ?>
                                <option value="<?= e($valor) ?>"<?= $datos['motivo'] === $valor ? ' selected' : '' ?>><?= e($texto) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= mensaje_error('motivo', $errores) ?>
                        </div>

                        <div class="form-group<?= clase_error('mensaje', $errores) ?>">
                            <label for="mensaje">Mensaje</label>
                            <textarea id="mensaje" name="mensaje" rows="6" placeholder="Escribe tu mensaje..." minlength="<?= $MENSAJE_MIN ?>" maxlength="<?= $MENSAJE_MAX ?>" required<?= aria_error('mensaje', $errores) ?>><?= e($datos['mensaje']) ?></textarea>
                            <?= mensaje_error('mensaje', $errores) ?>
                        </div>

                        <div class="form-checkbox<?= clase_error('aceptar', $errores) ?>">
                            <input type="checkbox" id="aceptar" name="aceptar" value="1"<?= $datos['aceptar'] ? ' checked' : '' ?> required<?= aria_error('aceptar', $errores) ?>>
                            <label for="aceptar">Acepto enviar este formulario.</label>
                            <?= mensaje_error('aceptar', $errores) ?>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-gold">Enviar</button>
                            <button type="reset" class="btn-outline">Borrar</button>
                        </div>

                    </form>
                </section>

            </main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
