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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'e%.]ZbfJ?,ruXEv2^pJl/YS=oBjj&rMtP* v],oJ|)/tFs!uXS*T:[&)>,2ne6HX' );
define( 'SECURE_AUTH_KEY',  '}%5&gnTG0*UqM5tkL&Gg!PFWmFP-uV&:%+k2nQ|u=`TNPx<#=t~,|k]u$67~*wx$' );
define( 'LOGGED_IN_KEY',    '4K#F_Y,S%#T^|gcn8t-$g5S rf<m0Qb=1%YFp$L34P}!G%Bpqr.$3omBrsT*lwN&' );
define( 'NONCE_KEY',        '3_ oK!M  C_fE #cHiB2w @6{iy{GCK/*SbDZ$=fBh:at8Wc0(w1FGI*!We0;teS' );
define( 'AUTH_SALT',        '-xFouq&8s;wKvlik#m)?bIK*Gjbh=2W1khTS{k4r6j?dSp&z[2k:[BsZ-l{L,z5>' );
define( 'SECURE_AUTH_SALT', 'pG)+VFLh[LzTJeVy[3X&R9i+`zU_yb,2-{/J6uZ]TFujuV1=|C._BC,1u/;v&P}[' );
define( 'LOGGED_IN_SALT',   'K}9zf=Ieo&Pa7h?FE+Amb}3%[YHw~Ic6Us>`/`)f=h7ryk[lal=K8/_[I2PVa0xQ' );
define( 'NONCE_SALT',       '=&ahT +{g (9nW Mjdl3D]PTRGvE7ksYe~xRqPF@H!;~T{y}%WeNZ=VQvblccau&' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
