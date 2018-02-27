<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'u499587875_blog');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'u499587875_blogi');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'ielsi123');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'A?g )>vFMO&U>u$ecEzTG>GE*8C&jH0i(|/l+Q[w>16pwE`{;qb^D_d}IGJo]U/Q');
define('SECURE_AUTH_KEY', 'X`z>`&1{`>F^6zXI]#V(!g]P|5t:UDfkC6}|S.N./M.oGhpDcXR<^:]faA]g[2=e');
define('LOGGED_IN_KEY', 'fmYLb^^0[VA!2C:I%Ht>&um!+jDcV)o1<7j9k!nEHj#Du{5&zN!Bclllm1-VSvro');
define('NONCE_KEY', 'V=6~sU*{=h<_7$9W/hWhMRUNFMfzJFAxYVhBcS(G@gmZX(chL1-/:rdUAA.<7,oq');
define('AUTH_SALT', 'Y-4bqV$Q)kZd8ZjgBIBO5H$&A%j97ZnA/44r?(V-971lpCw._nC3tS|B/OM] t1b');
define('SECURE_AUTH_SALT', 'd`eYa{UUw)73;$PXr5uD[UWF#b;*Oe(2DWFf@I|=U/#t&cL%%dV#r(dQ,^l@j.K,');
define('LOGGED_IN_SALT', 'k~ILqWS rz;xK)t8[zllKmCp^lY(s^mxPFR?kV43X049Msd(bX3jjC6d@#6?.sMB');
define('NONCE_SALT', ']*w{rg2z$p~}Bl+y<7@V*f}uFTX)k^=eYI3~L aZ98D=^Xx.>@!5hDM4mM)^!9${');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

