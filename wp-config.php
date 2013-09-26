<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ')!k~.1zAlR!CxO6B>A3Y28>WOSh]D%>aKR&L6}xiY6-AL R2@E~ax+lHaNh6V|rZ');
define('SECURE_AUTH_KEY',  '6aGlQX1uptkd$a6fo$;>-|Io8gMPl2Amq/jc2Rl^H@%$|#OrTRaU$+=|T]zvILXv');
define('LOGGED_IN_KEY',    'P70V7Av3Oe1m&01{a#vhoydwu9l/z/[oD:Q,Kft7e%p+.76,o2z`psoa~}aYu#mz');
define('NONCE_KEY',        'B4mS8sUl!I0xV~vI6Nqnh5~)uuHf6A$bSD<#_PljQ^Q/CKZ%)+F6x8V&mwG/$)aM');
define('AUTH_SALT',        'C5R<Ux)=&t;Hlli;jowH<u[3jE8K(4q//Z))`[<E:N8RD|bq+@lK[$(NyWM.fY^f');
define('SECURE_AUTH_SALT', 'sbp}}vO(Ne{Q}C%z$~5E[R>|bZ#BCf#&r# dajj=/z{p1pL[XG*km:v*q#H2-ZYH');
define('LOGGED_IN_SALT',   'H6<8( .Cr?l{!m/:Pu%e ]zJWf,B}E>[$~Q.WSb3&ToD`?`BOzGH|l@~l//,7)$;');
define('NONCE_SALT',       '/6t9[/FGHdu2vWM>ar_4_f=V<jypB|o|.+v39p,<zj[(1*_a@,x<gY#EUO(NRz*/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
