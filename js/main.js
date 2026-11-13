/* =========================================================
   EL ARTE DEL JAQUE — main.js
   Menú hamburguesa responsive + resaltado de página activa
   ========================================================= */

document.addEventListener('DOMContentLoaded', function () {

  var sidebar = document.querySelector('.sidebar');
  var toggleBtn = document.querySelector('.menu-toggle');
  var backdrop = document.querySelector('.sidebar-backdrop');

  function openMenu() {
    sidebar.classList.add('open');
    backdrop.classList.add('open');
    toggleBtn.setAttribute('aria-expanded', 'true');
  }

  function closeMenu() {
    sidebar.classList.remove('open');
    backdrop.classList.remove('open');
    toggleBtn.setAttribute('aria-expanded', 'false');
  }

  if (toggleBtn) {
    toggleBtn.addEventListener('click', function () {
      var isOpen = sidebar.classList.contains('open');
      isOpen ? closeMenu() : openMenu();
    });
  }

  if (backdrop) {
    backdrop.addEventListener('click', closeMenu);
  }

  // Cierra el menú al elegir una sección (en móvil)
  document.querySelectorAll('.nav-item').forEach(function (link) {
    link.addEventListener('click', function () {
      if (window.innerWidth <= 900) closeMenu();
    });
  });

  // Resalta automáticamente el ítem del sidebar correspondiente
  // a la página actual, comparando el nombre de archivo.
  var current = window.location.pathname.split('/').pop() || 'index.php';

  document.querySelectorAll('.nav-item[data-page]').forEach(function (link) {
    if (link.getAttribute('data-page') === current) {
      link.classList.add('active');
    }
  });

  // ---------------------------------------------------------
  // EJERCICIOS INTERACTIVOS (página de Ejercicios)
  // ---------------------------------------------------------
  initEjercicios();

  // ---------------------------------------------------------
  // MENSAJE DE BIENVENIDA
  // Se muestra una sola vez por sesión de navegación, sin
  // importar desde qué página del sitio se entre primero.
  // ---------------------------------------------------------
  mostrarBienvenida();

  // ---------------------------------------------------------
  // VALIDACIÓN DEL FORMULARIO DE CONTACTO
  // ---------------------------------------------------------
  initFormularioContacto();

  // ---------------------------------------------------------
  // FECHA Y HORA
  // ---------------------------------------------------------
  initRelojFechaHora();

  // ---------------------------------------------------------
  // CONTENIDO INTERACTIVO (acordeón del glosario)
  // ---------------------------------------------------------
  initAcordeon();

  // ---------------------------------------------------------
  // GALERÍA DE IMÁGENES
  // ---------------------------------------------------------
  initGaleria();

  // ---------------------------------------------------------
  // MODO OSCURO / MODO CLARO
  // ---------------------------------------------------------
  initModoOscuro();

  // ---------------------------------------------------------
  // BOTÓN "VOLVER ARRIBA"
  // ---------------------------------------------------------
  initVolverArriba();

});

/**
 * Crea un botón "volver arriba" que aparece al bajar por la página y
 * la lleva de nuevo al principio. Se crea desde aquí para que esté en
 * todas las páginas sin tener que modificar cada archivo PHP.
 */
function initVolverArriba() {
  var boton = document.createElement('button');
  boton.type = 'button';
  boton.className = 'back-to-top';
  boton.setAttribute('aria-label', 'Volver arriba');
  boton.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 19V5"/><path d="M5 12l7-7 7 7"/></svg>';
  document.body.appendChild(boton);

  // Se muestra solo después de bajar más de una pantalla.
  function actualizar() {
    boton.classList.toggle('show', window.scrollY > window.innerHeight);
  }

  window.addEventListener('scroll', actualizar, { passive: true });
  actualizar();

  boton.addEventListener('click', function () {
    // Respeta la preferencia del sistema de reducir animaciones.
    var sinAnimacion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    window.scrollTo({ top: 0, behavior: sinAnimacion ? 'auto' : 'smooth' });
  });
}

function initRelojFechaHora() {
  var contenedor = document.getElementById('siteClock');
  if (!contenedor) return;

  var elHora = document.createElement('span');
  elHora.className = 'site-clock-time';

  var elFecha = document.createElement('span');
  elFecha.className = 'site-clock-date';

  contenedor.appendChild(elHora);
  contenedor.appendChild(elFecha);

  var opcionesFecha = { weekday: 'long', day: 'numeric', month: 'long' };

  function actualizarReloj() {
    var ahora = new Date();
    elHora.textContent = ahora.toLocaleTimeString('es-AR', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    elFecha.textContent = ahora.toLocaleDateString('es-AR', opcionesFecha);
  }

  actualizarReloj();
  setInterval(actualizarReloj, 1000);
}

/**
 * Ejercicios: al hacer clic en una opción se marca como correcta (verde)
 * o incorrecta (rojo) según su atributo data-correcta. Cuando se
 * encuentran todas las respuestas correctas, se bloquea el ejercicio y se
 * abre la explicación.
 */
function initEjercicios() {
  var tarjetas = document.querySelectorAll('[data-ejercicio]');
  if (!tarjetas.length) return;

  tarjetas.forEach(function (tarjeta) {
    var opciones = tarjeta.querySelectorAll('.exercise-option');
    var feedback = tarjeta.querySelector('.exercise-feedback');
    var solucion = tarjeta.querySelector('.exercise-solution');
    var totalCorrectas = tarjeta.querySelectorAll('.exercise-option[data-correcta="1"]').length;
    var encontradas = 0;

    opciones.forEach(function (opcion) {
      opcion.addEventListener('click', function () {
        // Una opción ya marcada no cuenta dos veces.
        if (opcion.classList.contains('is-correct') || opcion.classList.contains('is-wrong')) return;

        if (opcion.getAttribute('data-correcta') === '1') {
          opcion.classList.add('is-correct');
          encontradas++;

          if (encontradas === totalCorrectas) {
            feedback.textContent = totalCorrectas > 1
              ? '¡Muy bien! Encontraste todas las respuestas correctas.'
              : '¡Correcto!';
            feedback.className = 'exercise-feedback is-correct';
            // Ejercicio resuelto: se bloquean las opciones y se muestra la explicación.
            opciones.forEach(function (o) { o.disabled = true; });
            if (solucion) solucion.open = true;
          } else {
            feedback.textContent = 'Correcto. Todavía falta otra respuesta correcta.';
            feedback.className = 'exercise-feedback is-correct';
          }
        } else {
          opcion.classList.add('is-wrong');
          feedback.textContent = 'Esa no es. Inténtalo de nuevo o abre la solución.';
          feedback.className = 'exercise-feedback is-wrong';
        }
      });
    });
  });
}

function initAcordeon() {
  var botones = document.querySelectorAll('.accordion-toggle');
  if (!botones.length) return;

  botones.forEach(function (boton) {
    boton.addEventListener('click', function () {
      var panelId = boton.getAttribute('aria-controls');
      var panel = document.getElementById(panelId);
      if (!panel) return;

      var estaAbierto = boton.getAttribute('aria-expanded') === 'true';

      if (estaAbierto) {
        boton.setAttribute('aria-expanded', 'false');
        panel.hidden = true;
      } else {
        boton.setAttribute('aria-expanded', 'true');
        panel.hidden = false;
      }
    });
  });
}

function mostrarBienvenida() {
  try {
    if (sessionStorage.getItem('jaqueBienvenidaMostrada')) return;
  } catch (e) {
    // Si sessionStorage no está disponible, se continúa igual
    // y simplemente podría repetirse entre pestañas.
  }

  var toast = document.createElement('div');
  toast.className = 'welcome-toast';
  toast.setAttribute('role', 'status');
  toast.setAttribute('aria-live', 'polite');
  toast.innerHTML =
    '<svg class="welcome-toast-icon" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 20h12M8 20c-.3-2 .2-3 1.6-4 .9-.6 1-1.2.6-2-.5-1 .2-1.6 1-1.3.6.2 1-.2.7-.9-.6-1.4.4-2.6 1.6-2.9-.3-.7.1-1.4.9-1.4 1.7 0 3.6 1.6 3.6 4.4 0 2-1 3.2-2.2 4.1-1 .8-1.4 1.6-1.3 3"/></svg>' +
    '<div class="welcome-toast-body">' +
      '<h3>¡Bienvenido a El Arte del Jaque!</h3>' +
      '<p>Explora fundamentos, tácticas y partidas históricas para pensar cada jugada como un gran maestro.</p>' +
    '</div>' +
    '<button type="button" class="welcome-toast-close" aria-label="Cerrar mensaje de bienvenida">&times;</button>';

  document.body.appendChild(toast);

  // Pequeño retraso para permitir la transición de entrada.
  window.setTimeout(function () { toast.classList.add('show'); }, 150);

  function cerrarToast() {
    toast.classList.remove('show');
    window.setTimeout(function () {
      if (toast.parentNode) toast.parentNode.removeChild(toast);
    }, 400);
  }

  toast.querySelector('.welcome-toast-close').addEventListener('click', cerrarToast);

  // Se cierra automáticamente a los 6 segundos si el usuario no interactúa.
  window.setTimeout(cerrarToast, 6000);

  try {
    sessionStorage.setItem('jaqueBienvenidaMostrada', '1');
  } catch (e) { /* noop */ }
}

function initFormularioContacto() {
  var form = document.getElementById('contactForm');
  if (!form) return;

  var campos = {
    nombre: document.getElementById('nombre'),
    email: document.getElementById('email'),
    motivo: document.getElementById('motivo'),
    mensaje: document.getElementById('mensaje'),
    aceptar: document.getElementById('aceptar')
  };

  var successMsg = document.getElementById('formSuccess');

  // Crea (o reutiliza) el <span> de error debajo de cada campo.
  function obtenerSpanError(campo) {
    var contenedor = campo.closest('.form-group') || campo.closest('.form-checkbox');
    if (!contenedor) return null;

    var span = contenedor.querySelector('.field-error');
    if (!span) {
      span = document.createElement('span');
      span.className = 'field-error';
      span.setAttribute('role', 'alert');
      contenedor.appendChild(span);
    }
    return { contenedor: contenedor, span: span };
  }

  function mostrarError(campo, mensaje) {
    var ref = obtenerSpanError(campo);
    if (!ref) return;
    ref.span.textContent = mensaje;
    ref.contenedor.classList.add('has-error');
    campo.setAttribute('aria-invalid', 'true');
  }

  function limpiarError(campo) {
    var ref = obtenerSpanError(campo);
    if (!ref) return;
    ref.span.textContent = '';
    ref.contenedor.classList.remove('has-error');
    campo.removeAttribute('aria-invalid');
  }

  function validarEmail(valor) {
    var patron = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return patron.test(valor);
  }

  function validarCampo(campo) {
    var valor = (campo.value || '').trim();

    if (campo === campos.nombre) {
      if (!valor) { mostrarError(campo, 'El nombre es obligatorio.'); return false; }
      limpiarError(campo);
      return true;
    }

    if (campo === campos.email) {
      if (!valor) { mostrarError(campo, 'El correo electrónico es obligatorio.'); return false; }
      if (!validarEmail(valor)) { mostrarError(campo, 'Ingresa un correo electrónico válido.'); return false; }
      limpiarError(campo);
      return true;
    }

    if (campo === campos.motivo) {
      if (!valor) { mostrarError(campo, 'Selecciona un motivo de contacto.'); return false; }
      limpiarError(campo);
      return true;
    }

    if (campo === campos.mensaje) {
      if (!valor) { mostrarError(campo, 'El mensaje es obligatorio.'); return false; }
      var minimo = parseInt(campo.getAttribute('minlength'), 10) || 0;
      if (valor.length < minimo) { mostrarError(campo, 'El mensaje debe tener al menos ' + minimo + ' caracteres.'); return false; }
      limpiarError(campo);
      return true;
    }

    if (campo === campos.aceptar) {
      if (!campo.checked) { mostrarError(campo, 'Debes aceptar el envío del formulario.'); return false; }
      limpiarError(campo);
      return true;
    }

    return true;
  }

  // Validación en tiempo real: al corregir, el error desaparece o se actualiza.
  Object.keys(campos).forEach(function (clave) {
    var campo = campos[clave];
    if (!campo) return;

    var eventos = (campo.tagName === 'SELECT' || campo.type === 'checkbox') ? ['change'] : ['input', 'blur'];
    eventos.forEach(function (evento) {
      campo.addEventListener(evento, function () { validarCampo(campo); });
    });
  });

  form.addEventListener('submit', function (e) {
    if (successMsg) successMsg.classList.add('hidden');

    var esValido = true;
    Object.keys(campos).forEach(function (clave) {
      var campo = campos[clave];
      if (!campo) return;
      if (!validarCampo(campo)) esValido = false;
    });

    if (!esValido) {
      // Solo se cancela el envío si hay errores en el cliente.
      e.preventDefault();
      var primerError = form.querySelector('.has-error input, .has-error select, .has-error textarea');
      if (primerError) primerError.focus();
      return;
    }

    // Formulario válido: se envía por POST a contacto.php, donde PHP
    // vuelve a validar todo (la validación del cliente se puede saltear).
  });

  form.addEventListener('reset', function () {
    window.setTimeout(function () {
      Object.keys(campos).forEach(function (clave) {
        var campo = campos[clave];
        if (!campo) return;
        // Si PHP devolvió el formulario con valores cargados (por un error),
        // "reset" volvería a esos valores: se vacían explícitamente.
        if (campo.type === 'checkbox') campo.checked = false;
        else campo.value = '';
        limpiarError(campo);
      });
      var errorGeneral = form.querySelector('.form-alert');
      if (errorGeneral) errorGeneral.remove();
      if (successMsg) successMsg.classList.add('hidden');
    }, 0);
  });
}

/* ---------------------------------------------------------
   GALERÍA DE IMÁGENES
   Anterior / Siguiente, miniaturas e imagen ampliada (lightbox).
   --------------------------------------------------------- */
function initGaleria() {
  var galeria = document.getElementById('chessGallery');
  if (!galeria) return;

  var mainImg = document.getElementById('galleryMainImg');
  var caption = document.getElementById('galleryCaption');
  var thumbsCont = document.getElementById('galleryThumbs');
  var thumbs = thumbsCont ? Array.prototype.slice.call(thumbsCont.querySelectorAll('.gallery-thumb')) : [];
  var prevBtn = galeria.querySelector('.gallery-prev');
  var nextBtn = galeria.querySelector('.gallery-next');
  var zoomBtn = document.getElementById('galleryZoomBtn');

  var lightbox = document.getElementById('galleryLightbox');
  var lightboxImg = document.getElementById('lightboxImg');
  var lightboxClose = document.getElementById('lightboxClose');
  var lightboxPrev = lightbox ? lightbox.querySelector('.lightbox-prev') : null;
  var lightboxNext = lightbox ? lightbox.querySelector('.lightbox-next') : null;
  var lightboxBackdrop = lightbox ? lightbox.querySelector('[data-lightbox-close]') : null;

  if (!mainImg || !thumbs.length) return;

  // Los datos de cada imagen se toman de las miniaturas ya presentes en el HTML.
  var items = thumbs.map(function (thumb) {
    var img = thumb.querySelector('img');
    return { src: img.getAttribute('src'), alt: img.getAttribute('alt') };
  });

  var indice = 0;

  function mostrar(nuevoIndice) {
    indice = (nuevoIndice + items.length) % items.length;
    var item = items[indice];

    mainImg.setAttribute('src', item.src);
    mainImg.setAttribute('alt', item.alt);
    if (caption) caption.textContent = item.alt;

    thumbs.forEach(function (thumb, idx) {
      var activo = idx === indice;
      thumb.classList.toggle('active', activo);
      thumb.setAttribute('aria-current', activo ? 'true' : 'false');
    });

    if (lightbox && !lightbox.hidden && lightboxImg) {
      lightboxImg.setAttribute('src', item.src);
      lightboxImg.setAttribute('alt', item.alt);
    }
  }

  if (prevBtn) prevBtn.addEventListener('click', function () { mostrar(indice - 1); });
  if (nextBtn) nextBtn.addEventListener('click', function () { mostrar(indice + 1); });

  thumbs.forEach(function (thumb, idx) {
    thumb.addEventListener('click', function () { mostrar(idx); });
  });

  function onKeydownLightbox(e) {
    if (e.key === 'Escape') { cerrarLightbox(); return; }
    if (e.key === 'ArrowLeft') { mostrar(indice - 1); return; }
    if (e.key === 'ArrowRight') { mostrar(indice + 1); }
  }

  function abrirLightbox() {
    if (!lightbox) return;
    lightbox.hidden = false;
    mostrar(indice);
    document.addEventListener('keydown', onKeydownLightbox);
    if (lightboxClose) lightboxClose.focus();
  }

  function cerrarLightbox() {
    if (!lightbox) return;
    lightbox.hidden = true;
    document.removeEventListener('keydown', onKeydownLightbox);
    if (zoomBtn) zoomBtn.focus();
  }

  if (zoomBtn) zoomBtn.addEventListener('click', abrirLightbox);
  if (lightboxClose) lightboxClose.addEventListener('click', cerrarLightbox);
  if (lightboxBackdrop) lightboxBackdrop.addEventListener('click', cerrarLightbox);
  if (lightboxPrev) lightboxPrev.addEventListener('click', function () { mostrar(indice - 1); });
  if (lightboxNext) lightboxNext.addEventListener('click', function () { mostrar(indice + 1); });

  mostrar(0);
}

/* ---------------------------------------------------------
   MODO OSCURO / MODO CLARO
   Alterna una clase CSS sobre <html> y recuerda la preferencia.
   --------------------------------------------------------- */
function initModoOscuro() {
  var boton = document.getElementById('themeToggle');
  if (!boton) return;

  var CLAVE_STORAGE = 'jaqueTema';

  function aplicarTema(tema) {
    var esClaro = tema === 'light';
    document.documentElement.classList.toggle('light-mode', esClaro);
    boton.setAttribute('aria-pressed', esClaro ? 'true' : 'false');
    boton.setAttribute('aria-label', esClaro ? 'Activar modo oscuro' : 'Activar modo claro');
  }

  var temaGuardado = null;
  try {
    temaGuardado = localStorage.getItem(CLAVE_STORAGE);
  } catch (e) { /* localStorage no disponible: se usa el tema por defecto */ }

  aplicarTema(temaGuardado === 'light' ? 'light' : 'dark');

  boton.addEventListener('click', function () {
    var temaActual = document.documentElement.classList.contains('light-mode') ? 'light' : 'dark';
    var nuevoTema = temaActual === 'light' ? 'dark' : 'light';
    aplicarTema(nuevoTema);
    try {
      localStorage.setItem(CLAVE_STORAGE, nuevoTema);
    } catch (e) { /* noop */ }
  });
}
