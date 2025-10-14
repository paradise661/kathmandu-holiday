<?php
define( 'WP_CACHE', true ); // Added by WP Rocket


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
define( 'DB_NAME', 'kathmandu_old_db' );

/** Database username */
define( 'DB_USER', 'kathmandu_old_db' );

/** Database password */
define( 'DB_PASSWORD', 'Zvps629_3' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'Z[%oR?cOqQZG}nv0*e9dSr*7ye*iJQ{#R*G:IG]`xwk~0]gS>A|tOLC{>tu,O^ki' );
define( 'SECURE_AUTH_KEY',  '+A2[.[a8B|HpK!l4e.V:HTho!Q=*MjC|;vT=/k?`8Xq!pDD/.T1{^kLTzGg0Lk)A' );
define( 'LOGGED_IN_KEY',    's{j9;O--qv&;T}z(MzQWDgj^b<HlRn]yNriyLRY8x)QD5B<~z&6sZg(n`,aQxhh6' );
define( 'NONCE_KEY',        '2oanS{P|qBKQg=%Z9}QppqLsd_!@5ec*!Sqp_]D_%x%z)MglA]9ez&r16>:WX&V!' );
define( 'AUTH_SALT',        'vM=GJqu^/~8*.zb/xqKmH9EeR%muCyE(KF_>mB8=:!)J,<.Jv1(>*KwtGj<O[Xdz' );
define( 'SECURE_AUTH_SALT', 'kq8|<Y;Tpp:W&~7>s%yh=)FPL8a+J`m0R]uO~QK5CI<CgWA:7Dd*B0}hU:d-7!3q' );
define( 'LOGGED_IN_SALT',   ']# #/m~LzI)KkrlLo8.2fQ}LzSDc5CTI^`6`6(tzXEyYz<yhVZ]M[keP&(}GaJib' );
define( 'NONCE_SALT',       'JlPB_(d!;N}~u`a8e)$7mT&h*xgG1+Z2`s*15GbLVLyH$/EcI[X#o]Exnb>Ue?UM' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'rad_';

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
define('UPLOADS', 'media');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';