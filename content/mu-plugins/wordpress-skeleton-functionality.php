<?php
/*
Plugin Name: WordPress Skeleton Functionality
Plugin URI: https://github.com/iandunn/WordPress-Skeleton
Description: Random snippets for the WordPress Skeleton deployment
Version: 0.1
Author: Ian Dunn
Author URI: http://iandunn.name
License: GPL2
*/

if( !defined( 'ABSPATH' ) )
    die( 'WordPress Skeleton Functionality error' );

register_theme_directory( ABSPATH . 'wp-content/themes/' );		// Include themes from the core directory in addition to the custom content directory

add_filter( 'xmlrpc_enabled', '__return_false' );				// Disable for security -- http://core.trac.wordpress.org/ticket/21509#comment:5

?>