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
define('AUTH_KEY',         '!^M`zYsx-.KBTvWFUvQMrP3.(GgU~`!m?kU1f_*_J,ywJT`Xe3=*2tR=G}^V!68Z');
define('SECURE_AUTH_KEY',  '>Nom:/U7Ie,C4S_,}^?h}yKpNY-X;B?p@-`laODC-6Pqr$oHJ<SJH:0_~d;RPn=`');
define('LOGGED_IN_KEY',    ':6,u&z.xzd9-uWYN5(I7.iOXNFqwWh^;.O}2l]iJke0]+L)eH{2T^Yb~|D9a=}C@');
define('NONCE_KEY',        '0:yPw4Xf{|_XQlb5ceau8vgz*.-3+5-utN$CLnc1W`Yz9n4=CN;eHL; $kTJCaAh');
define('AUTH_SALT',        'ZHLy3)e{(NF}f4}<v;`zU;=|(:`-`8hP`hkdEye5E|+STS,/09<Qpx lzA@v?B2&');
define('SECURE_AUTH_SALT', ';F8~a9B=Ko@0_JDYi@gw^vQ{!K14gdKuUkA;o/.xeERG{+1z_[>x,Wit*%93>Hhi');
define('LOGGED_IN_SALT',   '=jXscz<tl.!?{BPpQh1CPq`WhcLzvEW;+4@C$k|l)CMLQU#b42zz }7Jc)C&CrYa');
define('NONCE_SALT',       'y.`%`Usm-C%hc:`-ozxBt/WkgN#T~MY|o]-/H=xvq =lX,(eNdIj>H<?mYB8EbcC');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_2017_';

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

/**
 * Northern Beat local overrides
 */
define("FS_METHOD", "direct");