<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'iveondwp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

    define('AUTH_KEY',         'm3M6_W*Ew=e1!w9v(kOCgO<@M5aw|pS8RIFF5rIt*fQG`<J8B{MM!-%+O?dS*q|:');
	define('SECURE_AUTH_KEY',  '2]GkPBT:cPlL^pua1gWfs&vw<%LFuPn)vYS{+FEh=)j%B/eP&,>-v-:|+T)$M@Lk');
	define('LOGGED_IN_KEY',    ']]4qM{.!~d0`/x*)j43_wQz]4y@4ldOd::o.4I[!Uz2Gr`>=I%7r0$HE8#[Mk(ue');
	define('NONCE_KEY',        '3yV-4,@H2|c*A10O7o$3>OnE|+|B|*Uv@vdUUU3Xnz+Mu9TM|WvWOYpliGWvqzsD');
	define('AUTH_SALT',        'N|F^Cct&HtwFV=9&r+Q}UCRy!bi]]%5(4ep_u!-,-sL-PJ{W?Wr:]}f6XH>TX/[(');
	define('SECURE_AUTH_SALT', '.rob<a-|aU5kfgr1czP)7c.B?*x>Ju{X|~7+,J%A5vJ&XM<mYv-8xyRm^/}]$uL|');
	define('LOGGED_IN_SALT',   'dQ-Wi[f?#8k].A[~nC|W0/QGPGAu3y#is.9r1B|4*-!@_9W#1$fpQoHYTcWP,_N<');
	define('NONCE_SALT',       'GhA@}9+S>OrQH|]&] Q,8)gNk9^xHMllx%,zaW_=hW2IkPKho#P/q?@$y`a71_-d');

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
