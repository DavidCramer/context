<?php

/**
 * Context Plugin Main Class
 *
 * @package   context_plugin
 * @author    David Cramer
 * @license   GPL-2.0+
 * @link
 * @copyright 2016 David Cramer
 */
class Context_Plugin {

	/**
	 * Holds instance of the class
	 *
	 * @since   1.0.0
	 *
	 * @var     Context_Plugin
	 */
	private static $instance;

	/**
	 * Holds request data
	 *
	 * @since   1.0.0
	 *
	 * @var     array
	 */
	public $request_data;

	/**
	 * Context Plugin constructor.
	 */
	public function __construct() {

		// setup notifications
		add_action( 'init', array( $this, 'setup' ) );

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @return  Context_Plugin  A single instance
	 */
	public static function init() {

		// If the single instance hasn't been set, set it now.
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Set request vars
	 *
	 * @param array $request_data Array of request variables
	 *
	 * @since 1.0.0
	 */
	public function set_request_data( $request_data ) {
		$this->request_data = $request_data;
	}

	/**
	 * Register Admin Pages
	 *
	 * @since 1.0.0
	 */
	public function register_admin_pages() {
	}

	/**
	 * Setup hooks
	 *
	 * @since 1.0.0
	 */
	public function setup() {
		add_action( 'admin_menu', array( $this, 'register_admin_pages' ) );
	}

}
