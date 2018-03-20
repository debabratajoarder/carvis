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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'jimja');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'R0q:tSt5CQZC4O)#rbS^2#C;E>oe+mFW*8O.`5viFM]@dj(;-~=HP9M]l<,VviJJ');
define('SECURE_AUTH_KEY',  'yfnvX,U@Kj&NPhYTUGR3;*j.T?0,VFH?L1fxcp`PM{[?-Q5}qZ-oiv&Uw*KUS]7+');
define('LOGGED_IN_KEY',    't./nD]-x_N8welRsT<SbiG-]l78X|![GXwEBIbU10X^NQ`4C`8CER?zK-&;2!(HN');
define('NONCE_KEY',        '_Dd;Gn_^G*pTDP=4,!]*E=%)neo+Y<~+j/X7ts9<-m4FzRQDr}Eab{9~yF19>uc3');
define('AUTH_SALT',        'cGUHhjE,>kx9`U!<kww2m_:%B2*>D-DY=M.v^OJ#%P2!<,[CC#]b<vD5k^3JjL#B');
define('SECURE_AUTH_SALT', '(O+]<+=HKQ0,(Yl~<aJ}l&POF#LNg4,]rY@|M1UYX8dZ4LF&B,WHWEf1ecoX*dC1');
define('LOGGED_IN_SALT',   'R9<0m%`K#J)I+Q:/DCI@e[-b4) Aeupoj1O}sFgAq;bQ?g#w#6;ir.s<PWNy,63+');
define('NONCE_SALT',       'H1aj/LNezZgxkhma~}zS-XX0rWO:y{Y`mFpNd^*c5c8*%vNCa~i{._|zs.nQ0YdK');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'blog_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
