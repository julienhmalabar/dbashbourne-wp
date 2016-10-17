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
define('DB_NAME', 'dbash');


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

define('AUTH_KEY',         ' U/q>U^d#6IHuO~L+RS$snLAqV;?Rqq<p@8E8TdSFZWjm/I;/dG8g6$H3,7@{(T3');
define('SECURE_AUTH_KEY',  '=v-Mq0_)3@LR*4ror!K#8)00bG8b!8Dbsh#UzW&ej~ByEpRVq%4wfZa@Tn4`kW#D');
define('LOGGED_IN_KEY',    'z:20J-2uTid]2u+RB$aaY1)7i(b5}uO&6:$*`E0qH.6oegQrB_hnJ,rT<afaA,t6');
define('NONCE_KEY',        'yk3JBm vrs(?myu8:7fKD!Yp+@3k,ZRpAMDFfbDVz G!`Q|C$TymkEch2t7;TTrb');
define('AUTH_SALT',        '0=v<XBw:lCd-/)h;1#UK_%eA[qM6nwFF#i=!:9t.BM:#7fg>HM<dNlVCd#Qh7c l');
define('SECURE_AUTH_SALT', 'O9boQz,3$__3< |=<1Dtyys.x)|:XvhP*my7b_b~MVp=sB.`wYfLYz*Jq9X7K(Q]');
define('LOGGED_IN_SALT',   '2 [,.z..WG:kEF}%`]0=Jf[K@|}jQ=|L^9h~=q.UHT.pUsWJr}Mj(w(l`&4DtF}+');
define('NONCE_SALT',       'DQr!6o},:!3(ozZXVM[]UUj 5y<`~[oGLwL##;GWUE0zCekL{2`4P,IVDx)+ZD+F');
 */

define('AUTH_KEY',         ';/Sg93mQ[2eONV*ofc0O%]V+rSND?/{s^|Xu6x^.<PeFs}| @ j3+2K7.?^t1utM');
define('SECURE_AUTH_KEY',  'P.RSk3WUO tKS|Uk>*?z.W@*=wW|eufFitSt(t^/w;jJD?vTLw)0&CC2CtM4#9Gk');
define('LOGGED_IN_KEY',    ':avyK=Vi!itn}-3Sar:?q}<EuX.?;|r]s:P5OD;gsL|zU5C 0F-XN)-$@<qZn+,l');
define('NONCE_KEY',        '8wzRX10;A[Qf/lGh?-*-=l6~Fh{o5{zv ElNGd$;F?C^liM}&<IllitI2kc+L|cI');
define('AUTH_SALT',        'dsetD5$F6PtrHM-2J;z<v%W4*yvBw*5@Zu+T=JDD*t,9$H0E=E5yA]5vxr>&G}BI');
define('SECURE_AUTH_SALT', '/P&G_j#M2r(3[zGWl8 x}|[[f||8`+Y:#0k(3NhB`JOk<j|jyq<SH3wSors>~<F8');
define('LOGGED_IN_SALT',   '<eDSZusJXV]utT<ztWg?-M%Q:D%aor|}+I{&js~x*1y-j{Sy*]Q)BqYB5C&[VOi&');
define('NONCE_SALT',       'h?Mf8$>a11Y<ehSKee.1}?S2.D+@qQTLYUeyF6As5;,e]S;L;X-rqD.4Af<)X:M2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_dbheuk_';

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
