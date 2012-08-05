<?php
/**
 * The base configurations of the WordPress.
 * @package WordPress
 */

require_once( dirname( __FILE__ ) . '/database.php' );

define( 'WP_CONTENT_DIR',	dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL',	'http://'. $_SERVER[ 'HTTP_HOST' ] . '/content' );
define( 'WPLANG',               '' );
define( 'WP_DEBUG',             false );

if( !defined( 'ABSPATH' ) )
        define( 'ABSPATH', dirname(__FILE__) . '/' );

require_once( ABSPATH . 'wp-settings.php' );

