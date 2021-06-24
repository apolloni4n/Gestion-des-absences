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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mailspwb_wp161' );

/** MySQL database username */
define( 'DB_USER', 'mailspwb_wp161' );

/** MySQL database password */
define( 'DB_PASSWORD', '5[S!-u1XC(p7RT' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );


/** Database Charset to use in creating database tables. */

define(‘DB_CHARSET’, 'utf-8');


/** The Database Collate type. Don't change this if in doubt. */
// define('DB_COLLATE', ' ');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'k3sj5fhrdhfuxyw8hjdsyhytp6bcxq1mcocvszomjlxbdk71giwabim3zwgkufk0' );
define( 'SECURE_AUTH_KEY',  'j92t6zapacyh6tw2rhlzwmxhibd9lvclkinaoqpqyxnedhr45ctzozejtuyray9p' );
define( 'LOGGED_IN_KEY',    'bzoxwxnnfbruwcel3wkcurhiegoeqosh3q6cm2s3wbgde6guhszaahocwd8b1o0v' );
define( 'NONCE_KEY',        'ohlqtwjzwyv8zpqwe9ojtlcc4daecrmfqx4k3oiqa22dm2w6znomwqryfxwu41sd' );
define( 'AUTH_SALT',        'pndpdppej3tastlrtz443wvv80wzybji1im1pziiu3q6pa56ppqtbjqupuofoxro' );
define( 'SECURE_AUTH_SALT', '3hjc1sxlapvwvoqhrlosrzknkfksrdt4bgqtq5il9cmu0gyd4o2tivehdrejds0h' );
define( 'LOGGED_IN_SALT',   '48wkfrzdkkwvmkfp0xah35djq2ztmwymtlobp1txekgqqazacyo8xblfzyqpxnnx' );
define( 'NONCE_SALT',       'px1opkehknseru4vze1kpao2nradrknpgwpwx4xle1rcbgmdsa8eer4jnqphiajn' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp4n_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
