<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'news-blog');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('FS_METHOD', 'direct');

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
define('AUTH_KEY',         '}R^|`&tQ<)vrs&#zc~#30>-Dw@]yN*Oa|EX?XCyiBz~SigtT=56xi^R=l|<K !i<');
define('SECURE_AUTH_KEY',  '.K|`9g@c7SyN%Wk]7}|GR=rBR0]k(X9unT^z%w!%&]k42f7v$BVi0G. ZpRa.Om+');
define('LOGGED_IN_KEY',    'ay~LfAnsPd+M0=VmB;M8o}4IH)&>;o6K-[z,H]UNensBbOB>+JY][1{Ne6%~43Wo');
define('NONCE_KEY',        'ZL-1yz+2Y0P>^m.hjMOY.AokU9 (U|QPU-1n~p(q{~OTe{FmmtDhxfc5m%JL*?5L');
define('AUTH_SALT',        'LX)*rmawm?&],aJCEAtMt,b~BK_N?L)ElR?eK/QS!t}5i]@^?^H<b:oFmeB9B{*M');
define('SECURE_AUTH_SALT', 'h>dE#w!R{~|aN2,03U:`n6eC -yh&b/PwJ4a5UUy#EC(J)1;R;[_D+EdM5q=?2P9');
define('LOGGED_IN_SALT',   'zUisQ!`1zy).@0|oeU`N`=^@]x Kno)XEKDIgOy/r`-?jgn<.vDiQ/72_FKz{7Ze');
define('NONCE_SALT',       '}`k(6vXk{k_Yw3^_Va*IB=V_mjQSoU(b>t^*2-%8i>D{;@>C:o%F~c]L%#z[2pm:');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'nb_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
