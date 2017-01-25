<?php
/**
 * Context Bootstrapper
 *
 * @package   context
 * @author    David Cramer
 * @license   GPL-2.0+
 * @link
 * @copyright 2016 David Cramer
 *
 */
// If this file is called directly, abort.
if ( defined( 'WPINC' ) ) {

	if ( ! defined( 'DEBUG_SCRIPTS' ) ) {
		define( 'CNTXT_ASSET_DEBUG', '.min' );
	} else {
		define( 'CNTXT_ASSET_DEBUG', '' );
	}

	// include context helper functions and autoloader.
	require_once( CNTXT_PATH . 'includes/functions.php' );

	// register context autoloader
	spl_autoload_register( 'context_autoload_class', true, false );

	// bootstrap plugin load
	add_action( 'plugins_loaded', 'context' );
}
