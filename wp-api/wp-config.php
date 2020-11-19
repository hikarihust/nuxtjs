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
define( 'DB_NAME', 'wp_api' );

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
define('AUTH_KEY',         '!f(pj!KDShD(Die&fmL(<X_^OB+v+QYUGS;s^;3R/@1%1D3A+2NK[P@Cr+61Qo$|');
define('SECURE_AUTH_KEY',  '*M-=o %P-]Z(S$Cm]{v, AH3rXC7^g!wl]UzZVNFJ3|fwG;0|OdAWeP!ySYQ~qpQ');
define('LOGGED_IN_KEY',    ')&wdFjR_Up-Td[?rv]3b,|[{jj7*1;+[rgx~,d#`GxMzw$X(]4`L^*XN,o.Mi:gT');
define('NONCE_KEY',        '%cI~S}DJwO&j<>V<;j|+/e-m:GiVt.neFc+]]6XdBYz>I(n:!ybzD]b0mdh[$g,Z');
define('AUTH_SALT',        'wvo,gJ>me.=h+vKMhXt@NG5$|iE7Fd[F-fNVYn(wtXcr}gdXPC|E(zv8SJD,c7tV');
define('SECURE_AUTH_SALT', 'Jzo*xcZ[H*,HDg8MrIShxR^l82^c}(IaQYnvknv5{_{a4kH>UC6s_jM|WreXk+-O');
define('LOGGED_IN_SALT',   't!6du!kB~+ 5 PCj{6zo4;++[+Sz*w;+TQBhi+pP*5~)OLf{gZ_f_Z$&.&Q~u[ ?');
define('NONCE_SALT',       '2Qu!3A7|?=+.$=x&Z`Gvy3Q_|2m>MB(O|8*6mSiB}!#pG|2Dg~Cg]HO?ST`L<`qi');

define('JWT_AUTH_SECRET_KEY', 'N#+hc:VHPV@O,|H)]mr%m6dH?&36iUV2%6sVg=}N,uGtK.{#FFvBV)4(SdJE?df8');

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
require_once ABSPATH . 'wp-custom-api.php';
