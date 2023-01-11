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
define( 'DB_NAME', 'wordpress' );

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
define('AUTH_KEY',         '3sJ&zRJh9$2(feAH[Lb%na9KY3~A4#E[-e|>Gx}~|ijS.HFpwFUqf.PP`k6Nlb Z');
define('SECURE_AUTH_KEY',  '[Prk=s{f5t7:q7irLZ`cuP$fW /f][;?+/;lm>y/`0<H!oey.|_jQn;[AW*s;|DR');
define('LOGGED_IN_KEY',    'AnR*2(&/+]{{!OLu8FaHL0*nA&>vi$2WY2-^Vt:n],!+86s80ko:L|(<(x-&>i0c');
define('NONCE_KEY',        ';?K|tx.Fc_:i-ohnsXk@;?8OQJ#e,BGtVJ8|1zHZGOW%Jg+d|V}J~BRC_u@.^Q~1');
define('AUTH_SALT',        'K9uU!g*${;5eLV$[PlrA|h)F1bdX4p>)csoGDb=#|<@.vr]no@(h{x|qI3He|)>B');
define('SECURE_AUTH_SALT', 'jd/%:|6@L@cg#XK8gA?>RQ=v-`9TeU#H4ztytK+0Ew}l};8/- y&~,)5WTzKO)eC');
define('LOGGED_IN_SALT',   '-yN` VQ*0XwHHHnQ-WOGHYQ8Q7p[?A}=M;g6j56kj<<9PhINXHP=b:?rZ@]M[^|e');
define('NONCE_SALT',       '+%Tt~y~Fuf0j1D_GaOj:-{rNdV:-|YM<avP++X%x$YPO+&y)Wcq|<IYPU9@x~Zbs');


@ini_set( 'upload_max_filesize' , '150M' );
@ini_set( 'post_max_size', '150M');
@ini_set( 'memory_limit', '256M' );
@ini_set( 'max_execution_time', '300' );
@ini_set( 'max_input_time', '300' );
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
