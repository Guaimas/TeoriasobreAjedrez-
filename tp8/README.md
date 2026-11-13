# TP8 — Registro, login y control de acceso por roles

Rama: `feature/tp8-autenticacion`

El sitio **El Arte del Jaque** ahora tiene cuentas de usuario: cualquier
persona puede registrarse, iniciar y cerrar sesión, y cada rol ve páginas
distintas. Se reutiliza la conexión PDO del TP7 (`config/conexion.php`) y la
tabla `usuarios` del TP6.

## Qué se implementó

- **Registro** con validación del lado del servidor y contraseña hasheada con
  bcrypt. Todo usuario nuevo tiene rol `usuario`.
- **Login** con `password_verify()`, `session_regenerate_id(true)` y
  redirección según el rol (`admin_panel.php` o `dashboard.php`).
- **Logout** por POST: vacía la sesión, borra la cookie y destruye la sesión.
- **Sesión segura** configurada en un solo archivo (`config/sesion.php`).
- **Guardián de rutas** reutilizable: `requerir_login()` y `requerir_rol('admin')`.
- **Menú según el estado:** sin sesión muestra "Iniciar sesión" y
  "Registrarse"; con sesión, "Hola, <nombre>", "Mi panel" y "Cerrar sesión", y
  al administrador también "Administración".
- **Panel del usuario** (`dashboard.php`) y **panel del administrador**
  (`admin_panel.php`) con acceso al CRUD del TP7 y el listado de usuarios.
- **Token CSRF** en login, registro, logout y en todo el CRUD.

### La tabla `usuarios` (no hizo falta migración)

La consigna pide `id`, `nombre`, `email` UNIQUE, `password` VARCHAR(255),
`rol` y `created_at`. La tabla del TP6 ya tiene todo eso (y además `apellido`
y `updated_at`). El rol está **normalizado**: `usuarios.rol_id` es una clave
foránea a la tabla `roles` (`administrador` / `estudiante`). Para no romper
ese diseño, el rol se obtiene con un `INNER JOIN` y se traduce al guardarlo
en la sesión:

| Tabla `roles` | `$_SESSION['rol']` |
|---|---|
| `administrador` | `admin` |
| `estudiante` | `usuario` |

```sql
SELECT u.id, u.nombre, u.apellido, u.password,
       CASE r.nombre WHEN 'administrador' THEN 'admin' ELSE 'usuario' END AS rol
FROM usuarios u
INNER JOIN roles r ON r.id = u.rol_id
WHERE u.email = :email
```

## Estructura de archivos

```text
config/
├── conexion.php        (TP7) conexión PDO, reutilizada
└── sesion.php          configuración segura de la cookie + session_start()
includes/
├── auth_guard.php      requerir_login() y requerir_rol()
├── usuarios.php        consultas de usuarios, rol de la sesión, redirigir()
├── csrf.php            token CSRF: csrf_campo() y csrf_valido()
├── header.php          (modificado) incluye config/sesion.php en todo el sitio
├── nav.php             (modificado) menú según la sesión y el rol
└── admin_ejercicios.php (modificado) el CRUD usa el guardián del TP8
registro.php            alta de usuarios
login.php               inicio de sesión
logout.php              cierre de sesión (solo POST)
dashboard.php           panel de cualquier usuario con sesión
admin_panel.php         panel del administrador
admin/                  (TP7) CRUD de ejercicios, ahora solo para admin
tp8/
├── usuarios_prueba.sql un administrador y un usuario común de prueba
└── README.md           este archivo
```

El login propio del TP7 (`admin/login.php`, `admin/logout.php` e
`includes/admin_sesion.php`) se eliminó: ahora hay un único login para todo
el sitio.

## Instalación (XAMPP)

1. Copiar la carpeta del proyecto en `C:\xampp\htdocs\`.
2. Iniciar **Apache** y **MySQL** en el XAMPP Control Panel.
3. En `http://localhost/phpmyadmin` → **Importar**, en este orden:
   1. `tp6/schema.sql` (base y tablas)
   2. `tp6/consultas.sql` (roles, temas y usuarios del TP6)
   3. `tp7/datos_prueba.sql` (los 20 ejercicios del sitio)
   4. `tp8/usuarios_prueba.sql` (usuarios de prueba del TP8)
4. Abrir `http://localhost/TeoriasobreAjedrez-/login.php`.

## Credenciales de prueba

| Email | Contraseña | Rol |
|---|---|---|
| `admin@demo.com` | `Admin1234` | admin |
| `usuario@demo.com` | `Usuario1234` | usuario |

En `tp8/usuarios_prueba.sql` las contraseñas están guardadas como hash bcrypt
generado con `password_hash()`, nunca en texto plano.

## Qué página requiere qué rol

| Página | Sin sesión | Usuario | Admin |
|---|---|---|---|
| Páginas públicas (Inicio, Fundamentos, Ejercicios…) | ✔ | ✔ | ✔ |
| `registro.php`, `login.php` | ✔ | → su panel | → su panel |
| `dashboard.php` | → `login.php?error=acceso_denegado` | ✔ | ✔ |
| `admin_panel.php` | → `login.php?error=acceso_denegado` | → `dashboard.php?error=permiso` | ✔ |
| `admin/index.php`, `crear.php`, `editar.php`, `eliminar.php` | → `login.php?error=acceso_denegado` | → `dashboard.php?error=permiso` | ✔ |
| `logout.php` | solo POST con token | solo POST con token | solo POST con token |

## Seguridad

- **Hashing con bcrypt.** Al registrarse, `password_hash($password,
  PASSWORD_BCRYPT)` genera un hash de 60 caracteres con una "sal" aleatoria:
  dos usuarios con la misma contraseña tienen hashes distintos, y del hash no
  se puede volver a la contraseña. Al iniciar sesión, `password_verify()`
  compara lo escrito con el hash. La contraseña no se guarda nunca en texto
  plano: ni en la base, ni en la sesión, ni en los logs. Si el hash quedó con
  un costo viejo, `password_needs_rehash()` lo actualiza al entrar.
- **Mensaje de error genérico.** El login responde siempre "Email o
  contraseña incorrectos", exista o no el email. Si el email no existe se
  verifica igual contra un hash de relleno, para que la respuesta tarde lo
  mismo y no delate qué cuentas están registradas.
- **`session_regenerate_id(true)` y Session Fixation.** En un ataque de
  fijación de sesión, el atacante consigue que la víctima use un id de sesión
  que él ya conoce; cuando la víctima inicia sesión, el atacante entra con ese
  mismo id. Por eso, al iniciar sesión se genera un id nuevo y se borra el
  anterior. Además, `session.use_strict_mode` hace que PHP rechace ids que él
  no generó, y `session.use_only_cookies` impide pasar el id por la URL.
- **Cookie de sesión.** `httponly` impide que JavaScript lea la cookie (si
  hubiera un XSS, no se podría robar la sesión con `document.cookie`).
  `samesite=Lax` hace que el navegador no la envíe en formularios POST que
  vienen de otros sitios. `secure` se activa solo cuando la página va por
  HTTPS, así sigue funcionando en `http://localhost`.
- **Guardián de rutas.** Cada página privada llama a `requerir_login()` o a
  `requerir_rol('admin')` antes de imprimir HTML. Si no corresponde, redirige
  y hace `exit`, así el resto de la página nunca se ejecuta. El guardián
  confirma en la base que el usuario sigue existiendo y toma su rol actual.
  Las rutas de redirección se calculan solas (`ruta_raiz()`), así funcionan
  desde la raíz y desde `admin/`. Las páginas privadas se envían con
  `Cache-Control: no-store`: después de cerrar sesión, el botón "atrás" no
  las muestra desde la caché.
- **Consultas preparadas.** Todas las consultas que reciben datos usan
  `prepare()` con marcadores (`:email`, `:id`…) y `execute()`. Con
  `ATTR_EMULATE_PREPARES = false`, el SQL y los datos viajan por separado,
  así que un email como `' OR 1=1 --` se busca como texto y no cambia la
  consulta (inyección SQL). El rol de un usuario nuevo está fijo en el SQL:
  nunca se toma del formulario.
- **XSS.** Todo lo que se imprime pasa por `e()` = `htmlspecialchars()` con
  `ENT_QUOTES` y UTF-8, incluido el nombre del usuario que sale de la sesión
  ("Hola, …"). Si alguien se registra con el nombre `<script>…</script>`, se
  muestra como texto. Los avisos que llegan por GET (`?error=`,
  `?registro=`…) no se imprimen tal cual: solo se acepta un valor de una
  lista fija.
- **Token CSRF.** Cada formulario lleva un token aleatorio (`random_bytes`)
  guardado en la sesión, que se compara con `hash_equals()`. Sin un token
  válido no se puede iniciar sesión, registrarse, cerrar sesión ni usar el
  CRUD. El token se renueva al iniciar sesión.
- **Errores de PDO.** Todas las consultas están en `try/catch`: el detalle
  técnico va al log con `error_log()` y el usuario ve un mensaje claro.

**Limitación conocida:** el login no limita los intentos fallidos (para un
sitio publicado convendría bloquear temporalmente después de varios errores).

## Guion para la demostración en vivo

1. **Registrarse:** "Registrarse" en el menú → completar el formulario →
   aparece "¡Cuenta creada!" en el login.
2. **Email repetido:** registrarse otra vez con `usuario@demo.com` →
   "Ya existe una cuenta con ese email".
3. **Login incorrecto:** `usuario@demo.com` con una contraseña equivocada →
   "Email o contraseña incorrectos".
4. **Login correcto:** `usuario@demo.com` / `Usuario1234` → "Mi panel"; el
   menú ahora dice "Hola, Usuario Demo".
5. **Bloqueo por rol:** escribir `admin_panel.php` en la barra → vuelve al
   panel con "No tienes permiso…". Lo mismo con `admin/index.php`.
6. **Sin sesión:** cerrar sesión y escribir `dashboard.php` → manda a
   `login.php?error=acceso_denegado`.
7. **Cerrar sesión y "atrás":** iniciar sesión, cerrar sesión y apretar
   "atrás" en el navegador → la página no vuelve a mostrar el panel; al
   recargar, pide iniciar sesión.
8. **Admin:** entrar con `admin@demo.com` / `Admin1234` → panel de
   administración con la lista de usuarios y acceso al CRUD.
9. **phpMyAdmin:** abrir la tabla `usuarios` → la columna `password` tiene
   hashes `$2y$10$…`, nunca la contraseña.
