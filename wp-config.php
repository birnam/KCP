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
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'kcp');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'kcpDBuser');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'kcpDBpass');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

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
define('AUTH_KEY',         '+=9R+VcX|QjG8{&M8LZ#|fpY|>CpbB+HHBgCn!K0jTtb:>X[7Ple{.{!L&,^Aq_I');
define('SECURE_AUTH_KEY',  '*@%O5 JWON;r+;iZ@} C5[$D>6eFGtt2dkoHqM|(ACxBcYS?.WFiX$K!(mA82*w/');
define('LOGGED_IN_KEY',    '_+@Z9jV@D>K[*)Mp[} `o&i+sfC4:,Mph6,*tg?%y/+kdm-U&M&jH~!g*]4m]4*U');
define('NONCE_KEY',        '~4e8VEg+jyl*Ed`]|4d~$SG:Yg|9#JW0W!F7Hye<zfjy15>5nC,gLwQ[M{HXSO6>');
define('AUTH_SALT',        '1TgBaCXWTe[n @66seSQu7K=+4-MEH!E-5:|w^,CQ91~y&|GdWn2YDz_knsxDj3)');
define('SECURE_AUTH_SALT', 't0=x}{IPnIm>kY+41#2J|w]b6O-<#{1-67)9d-xiaRca86z=IBc--QfZ?Y&;GgXp');
define('LOGGED_IN_SALT',   'VT| %QdZ,>EBu-j{$-eef?fU~s_60DUA+*$XZv*!+_ZnQ@(.$v@bE|-+b<oh)?Qc');
define('NONCE_SALT',       'pR9Fm=^FYZO/Uq8^ }AV%oNTaaaOV]Gl l-;%joIU-|3ey.8#}ym3d{^m,5S!@|c');

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
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
