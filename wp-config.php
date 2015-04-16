<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wcg');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '?c.RgH.15*uu4JjGi ,wP>euyteuWgiJnv3#:SoV*XVyu8-jfy-AaI$$Eti(cwK-');
define('SECURE_AUTH_KEY',  'F/?dZ/mTkgV+zfZft%7:GPt`]i-UA2{pzCSq-m2?Zbn41It$`y=kH[|Qyy,y)avO');
define('LOGGED_IN_KEY',    '6*4OA=w=hJTE1=qp?D=g-GKf56q|pIe~pasLs1Y>Q^Df:;:Gk$Dp7I_N*{,?2^p{');
define('NONCE_KEY',        '(!*v 2?|yM>9lA-~r(]t}h!{;YT8nG*]-/>R1C)Mu->HE+EVThZ<N BP6~D]x|C@');
define('AUTH_SALT',        'v9i]XJW!f9}?emr{7U,xytZpJLq!AZ3(S%V7$}C%bvL%D$&(&u3@V4Ss8FQxiN L');
define('SECURE_AUTH_SALT', '&#ywQS[jgyF6(KN&h?|wkqs6l*(-.-a6GfY(-%K!/]0r+#n~05yjnsxWd#R&Sph,');
define('LOGGED_IN_SALT',   '+oKV!olZmZmE-,3TkKyR@-<(^,LZbtfHk(ssQr~SXC^vUhw8an/&=rV[%eFp(Ms>');
define('NONCE_SALT',       ',wd5$Fz/MZyEeH@4}9h_%w1[bO{k-S@wC|J; g{86pU<lc%eOEp=rV_OB1[RqB&>');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
