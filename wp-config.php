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
define('DB_NAME', 'apamama');

/** MySQL database username */
define('DB_USER', 'apamama');

/** MySQL database password */
define('DB_PASSWORD', 'n3WPi@8@S7');

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
define('AUTH_KEY',         '8a3z4osp9xh3bcy73geovvq83n0mz2lgahckn9nhq6m50geowo3grahqdjkhzaz0');
define('SECURE_AUTH_KEY',  'v5mstjehofrbpbraywf7uzxqmqpchnqqqwhxjqu0kbpgqlyijt0a9mvplwclrixz');
define('LOGGED_IN_KEY',    'wzpqeg0isvtd6d5nibhuqxp3z1fbkdo5uj41g8a0z0hguncwvh6yivurkxt9d3js');
define('NONCE_KEY',        'm5rxrughlq8ssvqli5ozazqzlctbijtl1ydfnqknjegubwravaei8vyadpfzc2rz');
define('AUTH_SALT',        'vs0fa5nkvcxxqrf0d0pstwu0xh1fjbuxlhvgb0ybs3hkpydtoorqvywfbvkjajud');
define('SECURE_AUTH_SALT', 'eaujaap8m5yo0lpieuw7if6x5x7wmpfvexxo3js8r5v9kbwowzrknfcdytwbphxj');
define('LOGGED_IN_SALT',   'c916swqfuxs1iduxwwjmzdl4jb7zua2inwybckas7b6zy6dpwulgxhcxnd5dtej5');
define('NONCE_SALT',       '8lgtwdnkkr65oxwjfwyf5t9y73vbxfhnha44kaydincdktmayuoqxpxyckzwphqd');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'apamama_';

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
