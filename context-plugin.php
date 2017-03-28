<?php
/*
 * Plugin Name: Context Plugin
 * Plugin URI: %plugin_url%
 * Description: %description%
 * Version: 1.0.0
 * Author: %author%
 * Author URI: %author_url%
 * Text Domain: %textdomain%
 * License: GPL2+
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Constants
define( 'CNTXT_PATH', plugin_dir_path( __FILE__ ) );
define( 'CNTXT_CORE', __FILE__ );
define( 'CNTXT_URL', plugin_dir_url( __FILE__ ) );
define( 'CNTXT_VER', '1.0.0' );

if ( ! version_compare( PHP_VERSION, '5.3.0', '>=' ) ) {
	if ( is_admin() ) {
		add_action( 'admin_notices', 'context_plugin_php_ver' );
	}
} else {
	//Includes and run
	include_once CNTXT_PATH . 'context-plugin-bootstrap.php';
}

function context_plugin_php_ver() {
	$message = __( 'Context Plugin requires PHP version 5.3 or later. We strongly recommend PHP 5.5 or later for security and performance reasons.', 'context-plugin' );
	echo '<div id="context_plugin_error" class="error notice notice-error"><p>' . $message . '</p></div>';
}