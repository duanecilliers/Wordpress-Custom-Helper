<?php

if( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'Custom_Initializer' ) ) :

/**
 * Custom_Initializer handles init of Custom
 *
 * @author 	Gijs Jorissen
 * @since  	2.3
 *
 */
class Custom_Initializer
{
	private static $instance;

	/**
	 * Public function to set the instance
	 *
	 * @author 	Gijs Jorissen
	 * @since  	2.3
	 *
	 */
	public static function instance()
	{
		if ( ! isset( self::$instance ) )
		{
			self::$instance = new Custom_Initializer;
			self::$instance->setup_constants();
			self::$instance->includes();
		}

		return self::$instance;
	}

	/**
	 * Setup all the constants
	 *
	 * @author 	Gijs Jorissen
	 * @since   2.3
	 *
	 */
	private function setup_constants()
	{
		if( ! defined( 'CUSTOM_VERSION' ) )
			define( 'CUSTOM_VERSION', '2.9.3' );

		if( ! defined( 'CUSTOM_DIR' ) )
			define( 'CUSTOM_DIR', plugin_dir_path( __FILE__ ) );
	}

	/**
	 * Include the necessary files
	 *
	 * @author 	Gijs Jorissen
	 * @since   2.3
	 *
	 */
	private function includes()
	{
		include CUSTOM_DIR . 'classes/custom.class.php';
		include CUSTOM_DIR . 'classes/notice.class.php';
		include CUSTOM_DIR . 'classes/post_type.class.php';
		include CUSTOM_DIR . 'classes/taxonomy.class.php';
		include CUSTOM_DIR . 'classes/sidebar.class.php';

		include CUSTOM_DIR . '/functions/post_type.php';
		include CUSTOM_DIR . '/functions/taxonomy.php';
	}

}

endif; // End class_exists check

Custom_Initializer::instance();
