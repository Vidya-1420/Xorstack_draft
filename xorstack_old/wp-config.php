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
define( 'DB_NAME', 'xorstrpl_wp935' );

/** MySQL database username */
define( 'DB_USER', 'xorstrpl_wp935' );

/** MySQL database password */
define( 'DB_PASSWORD', '7pU.98XS-7' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'mxlpd6tf5wxogchlnjq7g8engncw4cyuduxqcyu0gxaqn7ghhqofn24qs2kwrzfu' );
define( 'SECURE_AUTH_KEY',  'mechdyjlbtjf605r8pmfw6kq8zaktwtiaehgsvbhlfne6ttyxmrwk3l4rn9juiib' );
define( 'LOGGED_IN_KEY',    'sonq62joq1skgldjqmif3ugv4sa1jdevfwdzsj06x60mcjkdi8xsddjqlqxiq79w' );
define( 'NONCE_KEY',        'bnh7kabqkwimhinhkmwrecteizvlgjlwlesj3yqcjqbwiuzb9xtai8jp0f6suxl0' );
define( 'AUTH_SALT',        'hxljjeiqr1iub9dol1d2iw0ck4ec8jg2pehdvmzujdupljbuq7xtwsmftoscohay' );
define( 'SECURE_AUTH_SALT', 'zfetihowhmtw27mufjb7i5qprmjhfoor1ts1khpxor0nw26lklrvxljrabcktspg' );
define( 'LOGGED_IN_SALT',   '6bggpi1xmklza3vds6zw1oag265xguwqyyppnxvrpxdpagmdnydkqwa5o4ddswkt' );
define( 'NONCE_SALT',       '0rn2ubpzcqiymyqzh2f2ldxfecf454sbvmrjddt5azmx8rsqh8dhouwfdr8lzuzl' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp5g_';

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
define( 'WP_DEBUG', false );

define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', 5 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
