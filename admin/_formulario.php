<?php
/**
 * admin/_formulario.php
 * -----------------------------------------------------------------
 * Formulario de ejercicio, compartido por crear.php y editar.php.
 *
 * Variables que debe definir la página que lo incluye:
 *   $accion       URL a la que se envía el formulario
 *   $texto_boton  texto del botón de envío
 *   $datos        valores a mostrar (vacíos, de la base o lo que
 *                 escribió el usuario si hubo errores)
 *   $errores      array campo => mensaje
 *   $temas        filas de la tabla temas      (para el <select>)
 *   $autores      filas de la tabla usuarios   (para el <select>)
 *
 * XSS: TODO valor que se imprime, incluidos los value de los inputs
 * y los id de los <option>, pasa por e() = htmlspecialchars().
 * Así, si alguien escribe <script>, se muestra como texto y no se
 * ejecuta en el navegador.
 * -----------------------------------------------------------------
 */
?>
                    <form class="form-panel admin-form" action="<?= e($accion) ?>" method="post" novalidate>

                        <?php if (!empty($errores)): ?>
                        <p class="form-alert" role="alert">No se pudo guardar el ejercicio. Revisa los campos marcados en rojo.</p>
                        <?php endif; ?>

                        <div class="admin-form-grid">
                            <div class="form-group<?= admin_clase_error('tema_id', $errores) ?>">
                                <label for="tema_id">Tema *</label>
                                <select id="tema_id" name="tema_id" required>
                                    <option value="">Selecciona un tema</option>
                                    <?php foreach ($temas as $tema): ?>
                                    <option value="<?= e($tema['id']) ?>"<?= (string) $datos['tema_id'] === (string) $tema['id'] ? ' selected' : '' ?>><?= e($tema['nombre']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= admin_mensaje_error('tema_id', $errores) ?>
                            </div>

                            <div class="form-group<?= admin_clase_error('nivel', $errores) ?>">
                                <label for="nivel">Nivel *</label>
                                <select id="nivel" name="nivel" required>
                                    <option value="">Selecciona un nivel</option>
                                    <?php foreach (NIVELES_VALIDOS as $nivel): ?>
                                    <option value="<?= e($nivel) ?>"<?= $datos['nivel'] === $nivel ? ' selected' : '' ?>><?= e($nivel) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= admin_mensaje_error('nivel', $errores) ?>
                            </div>

                            <div class="form-group<?= admin_clase_error('autor_id', $errores) ?>">
                                <label for="autor_id">Autor (opcional)</label>
                                <select id="autor_id" name="autor_id">
                                    <option value="">Sin autor</option>
                                    <?php foreach ($autores as $autor): ?>
                                    <option value="<?= e($autor['id']) ?>"<?= (string) $datos['autor_id'] === (string) $autor['id'] ? ' selected' : '' ?>><?= e($autor['nombre_completo']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= admin_mensaje_error('autor_id', $errores) ?>
                            </div>
                        </div>

                        <div class="form-group<?= admin_clase_error('enunciado', $errores) ?>">
                            <label for="enunciado">Enunciado * <small>(máx. <?= ENUNCIADO_MAX ?> caracteres)</small></label>
                            <input type="text" id="enunciado" name="enunciado" maxlength="<?= ENUNCIADO_MAX ?>" placeholder="Ej: Juegan las blancas. ¿Qué jugada gana material?" value="<?= e($datos['enunciado']) ?>" required>
                            <?= admin_mensaje_error('enunciado', $errores) ?>
                        </div>

                        <div class="form-group<?= admin_clase_error('posicion_fen', $errores) ?>">
                            <label for="posicion_fen">Posición FEN (opcional) <small>(solo las piezas, máx. <?= FEN_MAX ?>)</small></label>
                            <input type="text" id="posicion_fen" name="posicion_fen" maxlength="<?= FEN_MAX ?>" placeholder="Ej: r3k3/8/8/3N4/8/8/8/4K3" value="<?= e($datos['posicion_fen']) ?>">
                            <?= admin_mensaje_error('posicion_fen', $errores) ?>
                        </div>

                        <div class="form-group<?= admin_clase_error('explicacion', $errores) ?>">
                            <label for="explicacion">Explicación de la solución * <small>(máx. <?= EXPLICACION_MAX ?> caracteres)</small></label>
                            <textarea id="explicacion" name="explicacion" rows="5" maxlength="<?= EXPLICACION_MAX ?>" required><?= e($datos['explicacion']) ?></textarea>
                            <?= admin_mensaje_error('explicacion', $errores) ?>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-gold"><?= e($texto_boton) ?></button>
                            <a href="index.php" class="btn-outline">Cancelar</a>
                        </div>
                    </form>
