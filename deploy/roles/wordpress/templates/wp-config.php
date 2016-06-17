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

/** The name of the database for WordPress */
define('DB_NAME', '{{ site.slug }}');

/** MySQL database username */
define('DB_USER', '{{ site.slug }}');

/** MySQL database password */
define('DB_PASSWORD', '{{ site.slug }}');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Explicitly configure WordPress home URL and site (core install) URL */
define( 'WP_HOME', 'http://{{ site.fqdn }}' );
define( 'WP_SITEURL', 'http://{{ site.fqdn }}/wp' );

/** Define a custom content directory */
define( 'WP_CONTENT_DIR', '{{ site.public_path }}/content' );
define( 'WP_CONTENT_URL', 'http://{{ site.fqdn }}/content' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Regenerate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
{# salts are retrieved via curl: iterate over the lines of curl's stdout to render them here #}
{% for line in wp_salts.stdout_lines %}
{{ line }}
{% endfor %}

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

{% if env == "development" %}
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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
{% endif %}

/** Absolute path to the WordPress directory. */
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname(__FILE__) . '/wp' );

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );