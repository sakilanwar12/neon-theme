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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',          '&j.&^X5SF0EI ;UET)81-M.vZP*Yhv@FnK/!i0yG|0TL[0*e%+ ?He]Ky)Y[kDvJ' );
define( 'SECURE_AUTH_KEY',   '>$X#eg}Am]5#&{rn #YLtDaiZiHu]3^ .atk&*`*8:&ZR@R  nXh[Qj1]~(ilnHV' );
define( 'LOGGED_IN_KEY',     'j:Inn#pF=BGyN4SVUmX!-i.K43#Clyfb[DI.qQ8e![H*0`H/K)N $}P3U6pa7_e4' );
define( 'NONCE_KEY',         '*jLNk+9S;!P}}}3UGKi]&NyMaw3r-eB&e4|: maeWka*XnJ@AsUc2>UEz>(<wMk7' );
define( 'AUTH_SALT',         'S,|mq,hG%h1OXK7)@z->!id}RzHE?*QuV$qhO(zf<.5u[[YP{!99@=U/(YF>2h0D' );
define( 'SECURE_AUTH_SALT',  'Od$P*3~^sehRGSVZ7(B&svk25BJR,uR$g9I;%VT*`%DdMXg][@L*hQ^J)QN|#D5!' );
define( 'LOGGED_IN_SALT',    'obPMjRdF@lud.~SSgs@!}_Gzip`L-C6xQ?C7?^T:*)g]GMe%z~SM^L.ov6W(_]up' );
define( 'NONCE_SALT',        'VW6}G>Ant-#o.l8D{-R{S6<$ |s XnsTu24YHw=,o3$}KI5h[T%l>Ev4FB5QcXt4' );
define( 'WP_CACHE_KEY_SALT', 'wwyBCd-Lo:u301n8T.p-*_GS9NhD!(Zb,pq?M[GjQ3 rpgc,JwD5 8xr%eW%I#.E' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
