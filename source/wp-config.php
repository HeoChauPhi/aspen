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
define('DB_NAME', 'demowp_aspen');

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
define('AUTH_KEY',         '6=o00Q1rY0%Nq3K31GOUayIj%[]__Lc[D}.C1t;YR{z>%52C|I~?z1xd0D-xgjhx');
define('SECURE_AUTH_KEY',  '.m2q:L~[aHl.a6MaJiQIm.!t*z7+Ya(.[1Ls z7TSHVHBrq:hMQNhc{K$>V=AvLk');
define('LOGGED_IN_KEY',    'JJ{jVYAT?jD4eKdf#6#yigNXN&A}I<NY]N~twO_(PYL+7BC6;zH<X<me<<5G#>}]');
define('NONCE_KEY',        '*P$8@b#Z#t38Lz XA(-TiEe[RsMi3CQxKQ%ZH399]q_]d^jGW4:}brx{xkqs+`6;');
define('AUTH_SALT',        'I?a^S0$JC,|gBLXIN?{,y|U}+u<j-^9U9HTwk<#g-[I@ 0M5424Og-<.w>^Qx;U6');
define('SECURE_AUTH_SALT', '=+^(d;j9?)(kyVcqQ9<1LaP@,tulQP`!uHfoE:OCkIeAMm>/!GXL^]X@hkI^%59i');
define('LOGGED_IN_SALT',   'tzS(uSWa53a~WhT<,ZKz~||C#`ULM__NeP=an_!/mPr] C/42_S?Pd/859GI<2br');
define('NONCE_SALT',       'D{vPoW]014C5cqG8VM;*ofM|  T <B *t,WQI&3DiZvxs=[IsT(6/To1Y1q-5_/G');

/** A couple extra tweaks to help things run well on Pantheon. **/
if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] == "localhost") {
  define('WP_HOME', "http://localhost/demowp/aspen/source/");
  define('WP_SITEURL', "http://localhost/demowp/aspen/source/");
} elseif (isset($_SERVER['HTTP_HOST'])) {
  // HTTP is still the default scheme for now. 
  $scheme = 'http';
  // If we have detected that the end use is HTTPS, make sure we pass that
  // through here, so <img> tags and the like don't generate mixed-mode
  // content warnings.
  if (isset($_SERVER['HTTP_USER_AGENT_HTTPS']) && $_SERVER['HTTP_USER_AGENT_HTTPS'] == 'ON') {
      $scheme = 'https';
  }
  define('WP_HOME', $scheme . '://' . $_SERVER['HTTP_HOST']);
  define('WP_SITEURL', $scheme . '://' . $_SERVER['HTTP_HOST']);
}

/**#@-*/

// Load packages from Composer
if ( file_exists( __DIR__ . '/wp-content/plugins/timber-library/vendor/autoload.php')) {
  require_once( __DIR__  . '/wp-content/plugins/timber-library/vendor/autoload.php');
}

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
if ( ! defined( 'WP_DEBUG' ) ) {
  define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
