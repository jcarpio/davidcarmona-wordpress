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

define( 'DB_NAME', 'yvkgpfly_davidcarmona' );  // <-- este es el nombre correcto
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );  // mejor para compatibilidad moderna
define( 'DB_COLLATE', '' );
$table_prefix = 'A8xve95QAI_';      // <-- este es clave para que encuentre las tablas

define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);

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
define( 'AUTH_KEY',          '8G|,Ojb;vB|wM`_oFC$y7n65U2gptdeFTj>F_e^%T%~o{eKB]X^{V|&%c1-&qF]f' );
define( 'SECURE_AUTH_KEY',   'XoHDg=[K/?O^d`Hsk8]]v[YGBAKn2iU}Y.ZmG0cLmm-.x/gT~D0}V|`5!2 ?>z72' );
define( 'LOGGED_IN_KEY',     'OV7RrkDXKIoJ)aLthZ(sV2~.f-N)d+;aX<84Ipg5Ez0Bo>C/<e_Jvi$E0_;Cy&4`' );
define( 'NONCE_KEY',         'l%S %8t(3/.NDJ>)^=BZy8w($kVB1@4VH%K`p}P8tB$:3O~w7J8NvTc5}P4vq(W!' );
define( 'AUTH_SALT',         '{p_*kG[f=Mf`rv@%}l+X bAMcU/](Od(ivV9XArHo-Xv9*IEu/)wpY0fz0PP=ke4' );
define( 'SECURE_AUTH_SALT',  'TpgXjBtZeBF#G@puKk1[?z?<uIOz!gwq=[`l@R0Orz9!__5/SE4*}&/3%|7KGH>D' );
define( 'LOGGED_IN_SALT',    'nH!T4Zq;|4)sci}WPu0B&H!.A[|IBmW#j+?F#oS>SRdt]MZL%:EAF1e+R;MXE;F:' );
define( 'NONCE_SALT',        'BLfv/1]Ag8TpC!Cp|<tU0%-hGTi?i;zhi]h11kIdW5BQU@-PF<LKyv@kx$2|k)qC' );
define( 'WP_CACHE_KEY_SALT', 'ySL&m2OKDJhT`.b1$gUD27)5%C8^BF|+-+NCqBlX9mg$331>lSQ`|_-=vJ{b)~P.' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */


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
