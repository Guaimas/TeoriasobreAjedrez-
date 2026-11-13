<?php
/**
 * tp5/seguridad.php
 * -----------------------------------------------------------------
 * Funciones de seguridad para los formularios del TP5.
 *
 * Hay dos ideas distintas que NO hay que confundir:
 *
 *   SANITIZAR = limpiar o normalizar el dato de entrada
 *               (ej: quitar espacios con trim()).
 *
 *   VALIDAR   = decidir si el dato es aceptable o no
 *               (ej: ¿está vacío? ¿es un email válido?).
 *               Si no lo es, se rechaza y se muestra un error.
 *
 * Y una tercera, que se hace al MOSTRAR el dato:
 *
 *   CODIFICAR LA SALIDA = convertir caracteres especiales (<, >, ", ')
 *               en entidades HTML con htmlspecialchars() para que el
 *               navegador los muestre como texto y no los ejecute (XSS).
 *
 * Limpiar un dato al recibirlo no lo vuelve seguro para todos los
 * contextos: por eso TODO dato del usuario se imprime siempre con e().
 * -----------------------------------------------------------------
 */

/**
 * Codifica un texto para imprimirlo de forma segura dentro de HTML.
 *
 * ENT_QUOTES -> convierte también las comillas simples y dobles, así el
 *               dato tampoco puede "cerrar" un atributo como value="...".
 * 'UTF-8'    -> la codificación de caracteres del sitio.
 */
function e($texto)
{
    return htmlspecialchars((string) $texto, ENT_QUOTES, 'UTF-8');
}

/**
 * Sanitiza un valor recibido por GET o POST.
 *
 * - Si el valor no existe (null) o no es texto (por ejemplo, alguien
 *   envía ?termino[]=x para mandar un array), devuelve ''.
 * - Quita los espacios del principio y del final con trim(), así un
 *   campo que solo tiene espacios queda vacío y la validación lo rechaza.
 */
function limpiar($valor)
{
    if (!is_string($valor)) {
        return '';
    }

    return trim($valor);
}

/**
 * Cuenta los caracteres de un texto respetando tildes y la ñ
 * (strlen() contaría "ñ" como 2 porque mide bytes, no letras).
 */
function largo($texto)
{
    return mb_strlen($texto, 'UTF-8');
}
