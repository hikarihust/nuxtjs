<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-api-test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8+b9c&U{1L=>X4Fs)Pj5+bOq}J2C>|.@^5m.,^]-S9p[%QTG)f#%k?}jKu~uL6:%');
define('SECURE_AUTH_KEY',  '5^j5_iRQLmjg!#+xWCP.JrQ%~Gt.yLT[}/.=Yo@w?2T+f|x=FvFI?a4+#T0IUA}y');
define('LOGGED_IN_KEY',    ',ZabOpq,-&|y#dje3a[sv[myWhMCR/aXD)C}T~E)y;mu,Wg7;LJSIk* cs{]VxjJ');
define('NONCE_KEY',        'mLw45kbVmqi09[Gv CV,AlG/M$KmasGqBzC@k:.bw]z^p+{Dwv~%Q|%1x/*Zol6j');
define('AUTH_SALT',        'Ru17QYZ`imv];(0eOJdt+|)$NDos~F57zgijW@a#4t5V12$gojN Ry-3?WQp.7+`');
define('SECURE_AUTH_SALT', '9C6b@^VK8m*H3NBh%V-rA@q&oN1oI+#0vT28Kuo.WIGij@MvL_udX=:z(O%VAYz|');
define('LOGGED_IN_SALT',   '}}ORpu7!3/mRA0rGDF,NE;k5tZAW2ffE^[Hs|&ny4XK~;-|J*hU2XU;=Fl6Out@-');
define('NONCE_SALT',       'c>)[|Dx?{n|9s6 .S|o`;YDJ8nuG!p@aODd=YiYP-kw!zi{QVW5g 4(<P(I7[k D');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
