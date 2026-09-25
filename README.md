# El Arte del Jaque

Sitio educativo dedicado a enseñar ajedrez desde cero: fundamentos, tácticas,
estrategias, aperturas, finales, partidas históricas, ejercicios, glosario y
recursos para seguir aprendiendo.

Este proyecto fue **migrado de HTML estático a PHP**, aplicando
**modularización mediante includes (SSI)** y **renderizado server-side (SSR)**
para el título de cada página y el resaltado del menú activo, en el marco del
**Trabajo Práctico N° 4** de la materia.

## Figma

Enlace al prototipo de Figma: https://www.figma.com/proto/HnivPYR3kpvHwk225olJnL/Wireframing--Copia-?node-id=1156169-107&t=4nXvyhOtqRiE2W4T-1

## Tecnologías utilizadas

- HTML5
- CSS3
- JavaScript (vanilla, sin frameworks)
- PHP 8.x
- Google Fonts (Playfair Display / Inter)
- XAMPP o Laragon (servidor local para ejecutar PHP)

> No se utilizó Bootstrap ni ningún otro framework de CSS: todo el diseño es
> CSS propio (`css/style.css`).

## Estructura del proyecto

```text
el-arte-del-jaque/
├── includes/
│   ├── config.php        Carga de variables de entorno (.env) y constantes
│   ├── header.php        DOCTYPE, <head>, meta tags, título dinámico
│   ├── nav.php           Sidebar de navegación + barra superior (SSR: menú activo)
│   └── footer.php        Footer, script común y cierre de body/html
├── css/
│   └── style.css
├── js/
│   └── main.js
├── paginas/
│   ├── aperturas.php
│   ├── contacto.php
│   ├── ejercicios.php
│   ├── estrategias.php
│   ├── finales.php
│   ├── fundamentos.php
│   ├── glosario.php
│   ├── partidas.php
│   ├── recursos.php
│   ├── sobre-el-sitio.php
│   └── tacticas.php
├── index.php
├── robots.txt
├── sitemap.xml
├── .env                  Variables de entorno locales (NO se sube a Git)
├── .env.example           Plantilla pública de variables de entorno
├── .gitignore
└── README.md
```

## Modularización (SSI) y SSR

Cada página PHP define, antes de incluir las plantillas comunes, las
variables que necesita el sitio para renderizarse correctamente:

```php
<?php
$titulo_pagina    = "Aperturas - El Arte del Jaque";
$meta_descripcion = "Descubre las aperturas del ajedrez...";
$pagina_actual    = "aperturas";
$header_titulo    = "Aperturas";
$header_tagline   = "El comienzo de toda partida";
$ruta_base        = "../";      // "" en la raíz, "../" dentro de /paginas
$ruta_paginas     = "";         // "paginas/" en la raíz, "" dentro de /paginas
$es_home          = false;

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/nav.php';
?>

<main>
    <!-- contenido específico de la página -->
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
```

- **Título dinámico:** `header.php` imprime `<title><?= $titulo_pagina ?></title>`.
- **Menú activo:** `nav.php` compara `$pagina_actual` contra el slug de cada
  enlace del sidebar mediante la función `nav_activo()` y agrega la clase
  `active` en el servidor (además, `js/main.js` sigue reforzando el resaltado
  en el cliente comparando la URL, tal como ya lo hacía el proyecto original).
- **Rutas relativas:** `$ruta_base` y `$ruta_paginas` resuelven las rutas de
  CSS, JS, imágenes e includes según la profundidad del archivo (raíz vs.
  `/paginas`), evitando enlaces rotos.

## Variables de entorno

El archivo `.env` (en la raíz del proyecto) define:

```env
APP_NAME=El Arte del Jaque
APP_EMAIL=contacto@el-arte-del-jaque.com
APP_ENV=local
```

`includes/config.php` lee este archivo con un parser simple (sin librerías
externas, ya que el nivel del TP no lo requiere) y expone las constantes
`APP_NAME`, `APP_EMAIL` y `APP_ENV` para usarlas en cualquier página
(por ejemplo, el copyright del footer usa `APP_NAME`).

- `.env` **no se sube a GitHub** (está en `.gitignore`).
- `.env.example` sí se sube, como plantilla sin datos sensibles.

## Instalación y ejecución local

### Con XAMPP

1. Clonar (o descargar) este repositorio.
2. Copiar la carpeta `el-arte-del-jaque` dentro de `htdocs` de tu instalación
   de XAMPP (por ejemplo: `C:\xampp\htdocs\el-arte-del-jaque`).
3. Copiar `.env.example` como `.env` (si no existe ya) y ajustar los valores
   si hace falta.
4. Iniciar el módulo **Apache** desde el panel de control de XAMPP.
5. Abrir el navegador en:
   ```
   http://localhost/el-arte-del-jaque/index.php
   ```

### Con Laragon

1. Clonar (o descargar) este repositorio dentro de la carpeta `www` de Laragon.
2. Copiar `.env.example` como `.env`.
3. Iniciar Laragon (Apache + PHP).
4. Abrir el navegador en:
   ```
   http://localhost/el-arte-del-jaque/index.php
   ```
   o usar el dominio virtual que genera Laragon automáticamente.

## Rama y commits (Git)

Este trabajo corresponde a la rama:

```text
feature/migracion-php-ssi
```

Commits sugeridos (organizados por tema, no todos en uno solo):

```text
feat: migra paginas html a php
feat: agrega plantillas header nav y footer
feat: implementa titulos dinamicos
feat: implementa navegacion activa
feat: agrega configuracion de entorno
docs: actualiza README con instrucciones
```

> [TODO: crear la rama, realizar los commits y el Pull Request desde tu
> entorno de Git local/GitHub — esto no pudo automatizarse porque el
> proyecto fue procesado fuera de un repositorio Git.]

## Evidencias

*(Completar con capturas propias antes de la entrega)*

- [ ] Sitio funcionando en `localhost` (página de inicio)
- [ ] Contenido de `includes/header.php`
- [ ] Contenido de `includes/nav.php`
- [ ] Contenido de `includes/footer.php`
- [ ] Título dinámico visible en la pestaña del navegador (dos páginas distintas)
- [ ] Menú activo resaltando la sección correspondiente
- [ ] Contenido de `.env.example`

## Checklist de cumplimiento del TP N° 4

### Migración
- [x] Páginas migradas de `.html` a `.php`
- [ ] Verificado que funciona mediante servidor local (XAMPP/Laragon) — *pendiente de prueba manual*

### Modularización
- [x] `includes/header.php`
- [x] `includes/nav.php`
- [x] `includes/footer.php`
- [x] No se repite código de header/nav/footer entre páginas
- [x] Todas las páginas utilizan las plantillas comunes

### SSR
- [x] `$titulo_pagina` definido en cada página
- [x] `<title>` dinámico en `header.php`
- [x] Menú con clase `active` calculada dinámicamente (`$pagina_actual` + `nav_activo()`)

### Configuración
- [x] `.env`
- [x] `.env.example`
- [x] `.gitignore`
- [x] `.env` excluido de Git

### Documentación
- [x] README con instalación, ejecución local y tecnologías
- [x] Enlace de Figma marcado como pendiente (no inventado)
- [x] Sección de evidencias lista para completar

### Integridad
- [x] CSS enlazado correctamente desde raíz y desde `/paginas`
- [x] JavaScript (`main.js`) enlazado correctamente desde ambos niveles
- [x] Imágenes (URLs externas) sin cambios
- [x] Enlaces internos entre páginas actualizados a `.php`
- [x] Diseño, contenido y estructura visual original conservados
- [x] Nada de contenido genérico o de relleno: todo el contenido real del
      sitio (Samuel, textos, aperturas, glosario, etc.) se mantuvo intacto

## Créditos

Sitio educativo creado por **Samuel**.
