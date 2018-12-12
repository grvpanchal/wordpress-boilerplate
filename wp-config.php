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
 * 
 */
define('WP_POST_REVISIONS', false);

define( 'WP_MEMORY_LIMIT', '2048M' );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'wordpress');
 
/** MySQL hostname */
define('DB_HOST', 'db:3306');
 
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
define('AUTH_KEY',         'f9794a4dcbdd3f65887633776e7eab401479a48c');
define('SECURE_AUTH_KEY',  'c32ef1c277ba18537486b8b8fa28c854e04270ad');
define('LOGGED_IN_KEY',    'c36075177e4e09640f1ed609e08969a7ddda2122');
define('NONCE_KEY',        '69e74aaa35d078a0140b5e60e71fb375b92b5605');
define('AUTH_SALT',        'fb4fe6ec3550abdb91c651afddce7fcc6babf297');
define('SECURE_AUTH_SALT', '1eca1e5c7dfcf209745797aa26ffc1e67ccd42fb');
define('LOGGED_IN_SALT',   'a6fcf01ad7ffc6bb0c95cb14e3a7d5b59858f30f');
define('NONCE_SALT',       'e50013153b03e30bbab2699037a2f80ffd5e278b');

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

//GET HOSTNAME INFO
$hostname = $_SERVER['SERVER_NAME'];
//VERIFY WHICH ENVIRONMENT THE APP IS RUNNING
switch ($hostname) {
    case 'localhost':
        define('WP_ENV', 'development');
        define('WP_DEBUG', true);
        break;
    case 'dit.example.com':
        define('WP_ENV', 'staging');
        define('WP_DEBUG', true);
        break;
    case 'uat.example.cpm':
        define('WP_ENV', 'production');
        define('WP_DEBUG', false);
        break;
    case 'www.example.com':
        define('WP_ENV', 'production');
        define('WP_DEBUG', false);
        break;
    default:
        define('WP_ENV', 'production');
        define('WP_DEBUG', false);
}

// Custom Security Settings
define('DISABLE_WP_CRON', true);
// define('AUTOMATIC_UPDATER_DISABLED', true );
define('DISALLOW_FILE_EDIT', true );
define('DISALLOW_FILE_MODS', true );


// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
