<?php

//define( 'WP_SITEURL',         'http://development.example.org' );		// Use these if dev/staging environments have their own hostnames
//define( 'WP_HOME',            'http://development.example.org' );

define( 'DB_NAME',              '' );
define( 'DB_USER',              '' );
define( 'DB_PASSWORD',          '' );
define( 'DB_HOST',              'localhost' );
define( 'DB_CHARSET',           'utf8' );
define( 'DB_COLLATE',           '' );

$table_prefix = 'xyz_';

// @link https://api.wordpress.org/secret-key/1.1/salt/
define( 'AUTH_KEY',             '' );
define( 'SECURE_AUTH_KEY',      '' );
define( 'LOGGED_IN_KEY',        '' );
define( 'NONCE_KEY',            '' );
define( 'AUTH_SALT',            '' );
define( 'SECURE_AUTH_SALT',     '' );
define( 'LOGGED_IN_SALT',       '' );
define( 'NONCE_SALT',           '' );

ini_set( 'log_errors',          'On' );
ini_set( 'display_errors',      'On' );
ini_set( 'error_reporting',     E_ALL );

define( 'WP_DEBUG',             true );
define( 'WP_DEBUG_LOG',         true );
define( 'WP_DEBUG_DISPLAY',     true );
define( 'SAVEQUERIES',          true );
define( 'JETPACK_DEV_DEBUG',    true );
define( 'WP_CACHE',             false );
