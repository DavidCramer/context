<?php
/**
 * Context Plugin Helper Functions
 *
 * @package   context_plugin
 * @author    David Cramer
 * @license   GPL-2.0+
 * @copyright 2017 David Cramer
 */


/**
 * Context Plugin Object class autoloader.
 * It locates and finds class via classes folder structure.
 *
 * @since 1.0.0
 *
 * @param string $class class name to be checked and autoloaded
 */
function context_plugin_autoload_class( $class ) {
	$parts = explode( '\\', $class );
	$name  = strtolower( str_replace( '_', '-', array_shift( $parts ) ) );
	if ( file_exists( CNTXT_PATH . 'classes/' . $name ) ) {
		if ( ! empty( $parts ) ) {
			$name .= '/' . implode( '/', $parts );
		}
		$class_file = CNTXT_PATH . 'classes/class-' . $name . '.php';
		if ( file_exists( $class_file ) ) {
			include_once $class_file;
		}
	} elseif ( empty( $parts ) && file_exists( CNTXT_PATH . 'classes/class-' . $name . '.php' ) ) {
		include_once CNTXT_PATH . 'classes/class-' . $name . '.php';
	}
}

/**
 * Context Plugin Helper to load and manipulate the overall instance.
 *
 * @since 1.0.0
 * @return  Context_Plugin  A single instance
 */
function context_plugin() {
	$request_data = array(
		'post'    => $_POST,
		'get'     => $_GET,
		'files'   => $_FILES,
		'request' => $_REQUEST,
		'server'  => $_SERVER,
	);

	// init Context
	$instance = Context_Plugin::init();
	$instance->set_request_data( $request_data );

	return $instance;
}
