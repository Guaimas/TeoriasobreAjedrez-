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
  var current = window.location.pathname.split('/').pop() || 'index.html';

  document.querySelectorAll('.nav-item[data-page]').forEach(function (link) {
    if (link.getAttribute('data-page') === current) {
      link.classList.add('active');
    }
  });

  // Muestra u oculta la solución de un ejercicio (página de Ejercicios).
  document.querySelectorAll('.exercise-toggle').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var answer = btn.closest('.exercise-card').querySelector('.exercise-answer');
      if (!answer) return;
      var isHidden = answer.classList.contains('hidden');
      answer.classList.toggle('hidden');
      btn.textContent = isHidden ? 'Ocultar solución' : 'Mostrar solución';
    });
  });

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

});

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
      '<p>Explorá fundamentos, tácticas y partidas históricas para pensar cada jugada como un gran maestro.</p>' +
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
      if (!validarEmail(valor)) { mostrarError(campo, 'Ingresá un correo electrónico válido.'); return false; }
      limpiarError(campo);
      return true;
    }

    if (campo === campos.motivo) {
      if (!valor) { mostrarError(campo, 'Seleccioná un motivo de contacto.'); return false; }
      limpiarError(campo);
      return true;
    }

    if (campo === campos.mensaje) {
      if (!valor) { mostrarError(campo, 'El mensaje es obligatorio.'); return false; }
      limpiarError(campo);
      return true;
    }

    if (campo === campos.aceptar) {
      if (!campo.checked) { mostrarError(campo, 'Debés aceptar el envío del formulario.'); return false; }
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
    e.preventDefault();

    if (successMsg) successMsg.classList.add('hidden');

    var esValido = true;
    Object.keys(campos).forEach(function (clave) {
      var campo = campos[clave];
      if (!campo) return;
      if (!validarCampo(campo)) esValido = false;
    });

    if (!esValido) {
      var primerError = form.querySelector('.has-error input, .has-error select, .has-error textarea');
      if (primerError) primerError.focus();
      return;
    }

    // El formulario es válido: aquí continuaría el envío real (fetch, etc.).
    if (successMsg) successMsg.classList.remove('hidden');
    form.reset();
    Object.keys(campos).forEach(function (clave) {
      if (campos[clave]) limpiarError(campos[clave]);
    });
  });

  form.addEventListener('reset', function () {
    window.setTimeout(function () {
      Object.keys(campos).forEach(function (clave) {
        if (campos[clave]) limpiarError(campos[clave]);
      });
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
