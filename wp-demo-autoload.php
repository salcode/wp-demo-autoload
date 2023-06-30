<?php
/**
 * Plugin Name: WP Demo Autoload (salcode)
 * Plugin URI: https://github.com/salcode/wp-demo-autoload
 * Description: Demo how to autoload classes in a plugin.
 * Version: 0.1.0
 * Update URI: https://github.com/salcode/wp-demo-autoload
 * Author: Sal Ferrarello
 * Author URI: http://salferrarello.com/
 * License: apache-2.0
 * Text Domain: wp-demo-autoload
 * Domain Path: /languages
 *
 * @package wp-demo-autoload
 */

namespace salcode\WpDemoAutoload;

use salcode\WpDemoAutoload\RestApiRoutes\Owner;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action(
	'rest_api_init',
	[ Owner::class, 'register_rest_route' ]
);

spl_autoload_register( function( $class ) {
	switch( $class ) {
		case 'salcode\WpDemoAutoload\RestApiRoutes\Owner':
			require( __DIR__ . '/inc/RestApiRoutes/Owner.php' );
			break;
	}
});
