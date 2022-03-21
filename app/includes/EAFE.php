<?php
namespace EAFE;

defined( 'ABSPATH' ) || exit;

final class EAFE_Elementor {

	protected static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	function __construct() {
		$this->includes_core();
		// $this->include_eafe_widgets();
		$this->include_extensions();
		$this->initial_activation();
		do_action('eafe_before_load');
		$this->run();
		do_action('eafe_after_load');
	}

	// Include Core
	public function includes_core() {
		require_once EAFE_DIR_PATH.'app/includes/Initial_Setup.php';
		require_once EAFE_DIR_PATH.'app/settings/Admin_Menu.php';
		new settings\Admin_Menu();
	}

	//Checking Vendor
	public function run() {
		$initial_setup = new \EAFE\Initial_Setup();
		if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || is_plugin_active_for_network( 'elementor/elementor.php' ) ) {
			require_once EAFE_DIR_PATH.'app/includes/elementor/Base.php';
			new \EAFE\elementor\Base();
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
	// public function include_eafe_widgets() {
	// 	include_once EAFE_DIR_PATH.'app/includes/elementor/elementor-core.php';
	// }

	// Include Addons directory
	public function include_extensions() {
		$extensions_dir = array_filter(glob(EAFE_DIR_PATH.'app/extensions/*'), 'is_dir');
		if (count($extensions_dir) > 0) {
			foreach( $extensions_dir as $key => $value ) {
				$addon_dir_name = str_replace(dirname($value).'/', '', $value);
				$file_name = EAFE_DIR_PATH . 'app/extensions/'.$addon_dir_name.'/'.$addon_dir_name.'.php';
				if ( file_exists($file_name) ) {
					include_once $file_name;
				}
			}
		}
	}

	// Activation & Deactivation Hook
	public function initial_activation() {
		$initial_setup = new \EAFE\Initial_Setup();
		register_activation_hook( EAFE_FILE, array( $initial_setup, 'initial_plugin_activation' ) );
		register_deactivation_hook( EAFE_FILE , array( $initial_setup, 'initial_plugin_deactivation' ) );
	}
}
