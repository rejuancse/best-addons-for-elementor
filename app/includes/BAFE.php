<?php
namespace BAFE;

defined( 'ABSPATH' ) || exit;

final class BAFE_Elementor {

	protected static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	function __construct() {
		$this->includes_core();
		// $this->include_bafe_widgets();
		$this->include_extensions();
		$this->initial_activation();
		do_action('bafe_before_load');
		$this->run();
		do_action('bafe_after_load');
	}

	// Include Core
	public function includes_core() {
		require_once BAFE_DIR_PATH.'app/includes/BAFE_Initial_Setup.php';
		require_once BAFE_DIR_PATH.'app/settings/Admin_Menu.php';
		new settings\Admin_Menu();
	}

	//Checking Vendor
	public function run() {
		$initial_setup = new \BAFE\BAFE_Initial_Setup();
		if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || is_plugin_active_for_network( 'elementor/elementor.php' ) ) {
			require_once BAFE_DIR_PATH.'app/includes/elementor/BAFE_Base.php';
			new \BAFE\elementor\BAFE_Base();
		} else { 
			$cf_file = WP_PLUGIN_DIR.'/elementor/elementor.php';
			if (file_exists($cf_file) && ! is_plugin_active('elementor/elementor.php')) {
				add_action( 'admin_notices', array($initial_setup, 'bafe_free_plugin_installed_but_inactive_notice') );
			} elseif ( ! file_exists($cf_file) ) {
				add_action( 'admin_notices', array($initial_setup, 'bafe_free_plugin_not_installed') );
			}
		}
	}

	// Include Addons directory
	public function include_extensions() {
		$extensions_dir = array_filter(glob(BAFE_DIR_PATH.'app/extensions/*'), 'is_dir');
		if (count($extensions_dir) > 0) {
			foreach( $extensions_dir as $key => $value ) {
				$addon_dir_name = str_replace(dirname($value).'/', '', $value);
				$file_name = BAFE_DIR_PATH . 'app/extensions/'.$addon_dir_name.'/'.$addon_dir_name.'.php';
				if ( file_exists($file_name) ) {
					include_once $file_name;
				}
			}
		}
	}

	// Activation & Deactivation Hook
	public function initial_activation() {
		$initial_setup = new \BAFE\BAFE_Initial_Setup();
		register_activation_hook( BAFE_FILE, array( $initial_setup, 'bafe_initial_plugin_activation' ) );
		register_deactivation_hook( BAFE_FILE , array( $initial_setup, 'initial_plugin_deactivation' ) );
	}
}
