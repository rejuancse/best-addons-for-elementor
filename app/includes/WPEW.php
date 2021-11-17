<?php
namespace WPEW;

defined( 'ABSPATH' ) || exit;

final class WPEW_Elementor {

	protected static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	function __construct() {
		$this->includes_core();
		// $this->include_shortcode();
		$this->include_extensions();
		$this->initial_activation();
		do_action('wpew_before_load');
		$this->run();
		do_action('wpew_after_load');
	}

	// Include Core
	public function includes_core() {
		require_once WPEW_DIR_PATH.'app/includes/Initial_Setup.php';
		require_once WPEW_DIR_PATH.'app/settings/Admin_Menu.php';
		new settings\Admin_Menu();
	}

	//Checking Vendor
	public function run() {
		$initial_setup = new \WPEW\Initial_Setup();
		if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || is_plugin_active_for_network( 'elementor/elementor.php' ) ) {
			require_once WPEW_DIR_PATH.'app/includes/elementor/Base.php';
			new \WPEW\elementor\Base();
		} else {
			$cf_file = WP_PLUGIN_DIR.'/elementor/elementor.php';
			if (file_exists($cf_file) && ! is_plugin_active('elementor/elementor.php')) {
				add_action( 'admin_notices', array($initial_setup, 'free_plugin_installed_but_inactive_notice') );
			} elseif ( ! file_exists($cf_file) ) {
				add_action( 'admin_notices', array($initial_setup, 'free_plugin_not_installed') );
			}
		}
	}
	
	// Include Shortcode
	// public function include_shortcode() {
	// 	if( class_exists( 'WooCommerce' ) ){
	// 		include_once WPEW_DIR_PATH.'app/shortcode/ProductListing.php';
	// 		include_once WPEW_DIR_PATH.'app/shortcode/ProductSearch.php';
	// 		$wpew_product_listing = new \WPEW\shortcode\Product_Listing();
	// 		$wpew_product_search = new \WPEW\shortcode\Product_Search();
	
	// 		//require file for compatibility
	// 		require_once WPEW_DIR_PATH.'app/includes/compatibility/Shortcodes.php';
	// 	}
	// }

	// Include Addons directory
	public function include_extensions() {
		$extensions_dir = array_filter(glob(WPEW_DIR_PATH.'app/extensions/*'), 'is_dir');
		if (count($extensions_dir) > 0) {
			foreach( $extensions_dir as $key => $value ) {
				$addon_dir_name = str_replace(dirname($value).'/', '', $value);
				$file_name = WPEW_DIR_PATH . 'app/extensions/'.$addon_dir_name.'/'.$addon_dir_name.'.php';
				if ( file_exists($file_name) ) {
					include_once $file_name;
				}
			}
		}
	}

	// Activation & Deactivation Hook
	public function initial_activation() {
		$initial_setup = new \WPEW\Initial_Setup();
		register_activation_hook( WPEW_FILE, array( $initial_setup, 'initial_plugin_activation' ) );
		register_deactivation_hook( WPEW_FILE , array( $initial_setup, 'initial_plugin_deactivation' ) );
	}
}
