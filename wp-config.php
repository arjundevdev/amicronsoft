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
define('DB_NAME', 'amicron2');

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
define('AUTH_KEY',         '-I]l$k9e(40=8Tw,nl~Vq@s|X$IrPzNK0TX~H>dNF(><4g=x~J%oBar8(W8fTEE&');
define('SECURE_AUTH_KEY',  'O5gMFima.^ +{y>~-Hr~17k7:<*mzf?4^n !p?w!g -Q@/&QFX{RuKCQ5k(3a,`Q');
define('LOGGED_IN_KEY',    '>2y4QaH1TYs.)/x%8tTB<(LSb?yM.jH?2JW~VB8+>HV`=+GLscnM|@?OR$7+6=EK');
define('NONCE_KEY',        '7zX7Fa%`+jvO*.sKvlRoV~*ppjD([D0g+!o1L{ %o+k!3_r,5zEy<2VZ0qL9l;9~');
define('AUTH_SALT',        'J/GfPDZI%#EKuIyhc<@HPwG(^Ik8AfC7`TA3&J9A.4WBK$[~&>Ha#<~xD#Augo(b');
define('SECURE_AUTH_SALT', 'k>.4&4KW>Q5%p{F3[NW/`FD+&9Y@f-L|U)-M9~AH6(l{v{0Xs#wkR)(`|JSGp*vW');
define('LOGGED_IN_SALT',   '9Pa!^N o6r`[KFnSuqEz;I^$Bx e+|L}h,Uj~5Ah:_8.Ft6oO%@><L{WA!p=M`]j');
define('NONCE_SALT',       'qtUCkP&U*_<l} RIi3=OJ )ZHLdF.uJG}hp>::Wko#Ay00TQJvR8mu[Kn#~tRp?]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
