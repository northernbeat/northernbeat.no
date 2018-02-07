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
define('DB_NAME', 'nbeatno');

/** MySQL database username */
define('DB_USER', 'nbeatno');

/** MySQL database password */
define('DB_PASSWORD', 'bymeMO6');

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
define('AUTH_KEY',         ')cZRNHH.ZeHsAjmTx]q_-CfM)qwIX8-B,21aC#Iad2]C1J?=t7iq{X6N&LSyn)Xc');
define('SECURE_AUTH_KEY',  'I}{I+Ce= h)?52P)oX`%TMPGR|%x=~)NOFo~IGsI-lFl*ULYwjTi{&$e8T;kqUsH');
define('LOGGED_IN_KEY',    'dnjxr)cG*;S$qQC!{Ba3KdCp}3a4_K|F?Uc%REuwc TA{i82* f`.tvP+VL5EVr4');
define('NONCE_KEY',        '[;0e=ci_;1.:r8P!CF]TiEr Dw})M4*7jju/aK1A]+,Yyu`uENd$s0?8ENocIWvp');
define('AUTH_SALT',        'q)(z2z}+Q4[rU7}ZO1Cx]+T^x[lS1H8F)7xhY@T!x_V}mDF!4oIHk.cEl1*XXrtP');
define('SECURE_AUTH_SALT', '!84QQ6oU(yu$9tp={5$t5{bAd]juf )[E4Vv%e|t;Jkh<Av h4pE#OpYsALu6QXe');
define('LOGGED_IN_SALT',   'sj[F$ZtB*#oK&M$2/TR$7OuSk9PmeAlscDMB6I@+&DB{i9=#YBE9n0K^r}0ji&ki');
define('NONCE_SALT',       'oy2NzJ7t0U%YyX1,vX.fjz}H]Y>vS/?v.D0?8$<x/,3!MSo0F,Ejs`|+W(<_#VhV');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp2018_';

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

/**
 * Northern Beat local overrides
 */
define("FS_METHOD", "direct");
require_once(ABSPATH . 'wp-settings.php');
