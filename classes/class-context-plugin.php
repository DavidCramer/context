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
	 * Holds the main admin page suffix
	 *
	 * @since   1.0.0
	 *
	 * @var     array
	 */
	public $admin_page;

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
	 * @uses "admin_menu" action
	 */
	public function register_admin_pages() {
		$this->admin_page = add_menu_page( 'Context Plugin', 'Context Plugin', 'manage_options', 'context-plugin', array(
			$this,
			'admin_render',
		) );
		// enqueue admin scripts and styles
		add_action( 'admin_print_styles-' . $this->admin_page, array( $this, 'style_scripts' ) );
	}

	/**
	 * enqueue style and scripts for admin
	 *
	 * @since 1.0.0
	 */
	public function style_scripts() {

	}

	/**
	 * enqueue style and scripts for admin
	 *
	 * @since 1.0.0
	 */
	public function admin_render(){
		// render your admin screen
	}

	/**
	 * Setup hooks and text load domain
	 *
	 * @since 1.0.0
	 * @uses "init" action
	 */
	public function setup() {
		load_plugin_textdomain( 'context-plugin', false, CNTXT_CORE . '/languages' );
		add_action( 'admin_menu', array( $this, 'register_admin_pages' ) );
	}

}
