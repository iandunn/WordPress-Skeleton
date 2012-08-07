<?php
/**
 * The base configurations of the WordPress.
 * @package WordPress
 */

require_once( dirname( __FILE__ ) . '/environment-config.php' );

define( 'WP_CONTENT_DIR',        dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL',	'http://'. $_SERVER[ 'HTTP_HOST' ] . '/content' );
define( 'WPLANG',               '' );

// Uncomment the SSL constants if the site has a certificate
define('DISALLOW_FILE_EDIT',true);
//define( 'FORCE_SSL_LOGIN',	true );
//define( 'FORCE_SSL_ADMIN',	true );

if( !defined( 'ABSPATH' ) )
        define( 'ABSPATH', dirname( __FILE__ ) . '/' );

require_once( ABSPATH . 'wp-settings.php' );

?>
