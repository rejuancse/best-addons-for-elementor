<?php
namespace XEWC;

defined( 'ABSPATH' ) || exit;

final class XEWC_Extensions {

	protected static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	function __construct() {
		$this->includes_core();
		$this->include_shortcode();
		$this->include_extensions();
		$this->initial_activation();
		do_action('xewc_before_load');
		$this->run();
		do_action('xewc_after_load');
	}

	// Include Core
	public function includes_core() {
		require_once XEWC_DIR_PATH.'app/includes/Initial_Setup.php';
		require_once XEWC_DIR_PATH.'app/settings/Admin_Menu.php';
		new settings\Admin_Menu();
	}

	//Checking Vendor
	public function run() {
		if( xewc_function()->is_woocommerce() ) {
			$initial_setup = new \XEWC\Initial_Setup();
			if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || is_plugin_active_for_network( 'woocommerce/woocommerce.php' ) ) {
				if ( xewc_function()->wc_version() ) {
					require_once XEWC_DIR_PATH.'app/includes/woocommerce/Base.php';
					new \XEWC\woocommerce\Base();
				} else {
					add_action( 'admin_notices', array( $initial_setup , 'wc_low_version' ) );
					deactivate_plugins( plugin_basename( __FILE__ ) );
				}
			} else {
				$cf_file = WP_PLUGIN_DIR.'/woocommerce/woocommerce.php';
				if (file_exists($cf_file) && ! is_plugin_active('woocommerce/woocommerce.php')) {
					add_action( 'admin_notices', array($initial_setup, 'free_plugin_installed_but_inactive_notice') );
				} elseif ( ! file_exists($cf_file) ) {
					add_action( 'admin_notices', array($initial_setup, 'free_plugin_not_installed') );
				}
			}
		}else{
			// Local Code
		}
	}
	
	// Include Shortcode
	public function include_shortcode() {
		if( class_exists( 'WooCommerce' ) ){
			include_once XEWC_DIR_PATH.'app/shortcode/ProductListing.php';
			include_once XEWC_DIR_PATH.'app/shortcode/ProductSearch.php';
			$xewc_product_listing = new \XEWC\shortcode\Product_Listing();
			$xewc_product_search = new \XEWC\shortcode\Product_Search();
	
			//require file for compatibility
			require_once XEWC_DIR_PATH.'app/includes/compatibility/Shortcodes.php';
		}
	}

	// Include Addons directory
	public function include_extensions() {
		$extensions_dir = array_filter(glob(XEWC_DIR_PATH.'extensions/*'), 'is_dir');
		if (count($extensions_dir) > 0) {
			foreach( $extensions_dir as $key => $value ) {
				$addon_dir_name = str_replace(dirname($value).'/', '', $value);
				$file_name = XEWC_DIR_PATH . 'extensions/'.$addon_dir_name.'/'.$addon_dir_name.'.php';
				if ( file_exists($file_name) ) {
					include_once $file_name;
				}
			}
		}
	}

	// Activation & Deactivation Hook
	public function initial_activation() {
		$initial_setup = new \XEWC\Initial_Setup();
		register_activation_hook( XEWC_FILE, array( $initial_setup, 'initial_plugin_activation' ) );
		register_deactivation_hook( XEWC_FILE , array( $initial_setup, 'initial_plugin_deactivation' ) );
	}
}
