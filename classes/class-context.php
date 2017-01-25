<?php

/**
 * Context Main Class
 *
 * @package   sontext
 * @author    David Cramer
 * @license   GPL-2.0+
 * @link
 * @copyright 2016 David Cramer
 */
class Context {

	/**
	 * Holds instance of the class
	 *
	 * @since   1.0.0
	 *
	 * @var     Context
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
	 * Context constructor.
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
	 * @return  Context  A single instance
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
	 * @since 1.0.0
	 */
	public function set_request_data( $request_data ) {
		$this->request_data = $request_data;
	}

	/**
	 * Setup hooks
	 *
	 * @since 1.0.0
	 */
	public function setup() {
		add_action( 'admin_menu', array( $this, 'register_pages' ) );
	}

}
