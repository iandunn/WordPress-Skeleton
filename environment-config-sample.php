<?php

//define( 'WP_SITEURL',         'http://development.example.org' );		// Use these if dev/staging environments have their own hostnames
//define( 'WP_HOME',            'http://development.example.org' );

define( 'DB_NAME',              'database_name_here' );
define( 'DB_USER',              'username_here' );
define( 'DB_PASSWORD',          'password_here' );
define( 'DB_HOST',              'localhost' );
define( 'DB_CHARSET',           'utf8' );
define( 'DB_COLLATE',           '' );

$table_prefix = 'wp_';

// @link https://api.wordpress.org/secret-key/1.1/salt/
define( 'AUTH_KEY',             'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',      'put your unique phrase here' );
define( 'LOGGED_IN_KEY',        'put your unique phrase here' );
define( 'NONCE_KEY',            'put your unique phrase here' );
define( 'AUTH_SALT',            'put your unique phrase here' );
define( 'SECURE_AUTH_SALT',     'put your unique phrase here' );
define( 'LOGGED_IN_SALT',       'put your unique phrase here' );
define( 'NONCE_SALT',           'put your unique phrase here' );

ini_set( 'log_errors',          'On' );
ini_set( 'display_errors',      'On' );
ini_set( 'error_reporting',     E_ALL );

define( 'WP_DEBUG',             true );
define( 'WP_DEBUG_LOG',         true );
define( 'WP_DEBUG_DISPLAY',     true );
define( 'SAVEQUERIES',          true );
define( 'JETPACK_DEV_DEBUG',    true );
define( 'WP_CACHE',             false );
