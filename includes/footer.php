<?php
/**
 * includes/footer.php
 * -----------------------------------------------------------------
 * Pie de página común + scripts JS + cierre de <body></html>.
 *
 * Requiere que la página haya definido:
 *   $ruta_base      (string) "" en la raíz, "../" dentro de /paginas
 *   $ruta_paginas   (string) "paginas/" en la raíz, "" dentro de /paginas
 * -----------------------------------------------------------------
 */

if (!isset($ruta_base))    $ruta_base = '';
if (!isset($ruta_paginas)) $ruta_paginas = 'paginas/';
?>
<!-- ===== FOOTER ===== -->
            <footer class="site-footer">
                <div class="footer-grid">
                    <div class="footer-brand-col">
                        <div class="footer-brand">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 20h12M8 20c-.3-2 .2-3 1.6-4 .9-.6 1-1.2.6-2-.5-1 .2-1.6 1-1.3.6.2 1-.2.7-.9-.6-1.4.4-2.6 1.6-2.9-.3-.7.1-1.4.9-1.4 1.7 0 3.6 1.6 3.6 4.4 0 2-1 3.2-2.2 4.1-1 .8-1.4 1.6-1.3 3"/>
                            </svg>
                            <div class="brand-text">El Arte<br>del Jaque<span>APRENDE AJEDREZ</span></div>
                        </div>
                        <p class="footer-desc">
                            El ajedrez es arte, ciencia y pasión. Sitio educativo creado por Samuel
                            para acompañarte en tu camino hacia la maestría.
                        </p>
                    </div>
                    <div class="footer-col">
                        <h4>Enlaces rápidos</h4>
                        <a href="<?= $ruta_base ?>index.php">Inicio</a>
                        <a href="<?= $ruta_paginas ?>sobre-el-sitio.php">Sobre el sitio</a>
                        <a href="<?= $ruta_paginas ?>recursos.php">Recursos</a>
                        <a href="<?= $ruta_paginas ?>glosario.php">Glosario</a>
                    </div>
                    <div class="footer-col">
                        <h4>Contacto</h4>
                        <a href="<?= $ruta_paginas ?>contacto.php">Formulario de contacto</a>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>© 2026 <?= htmlspecialchars(APP_NAME) ?>. Todos los derechos reservados.</p>
                </div>
            </footer>
        </div>
    </div>

    <script src="<?= $ruta_base ?>js/main.js"></script>
</body>

</html>
