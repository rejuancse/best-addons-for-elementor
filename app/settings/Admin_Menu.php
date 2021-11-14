<?php
namespace WPEW\settings;

defined( 'ABSPATH' ) || exit;

class Admin_Menu {

    public function __construct() {
        add_action('admin_menu', array($this, 'register_menu_page' ));
    }
    /**
     * WPEW Menu Option Page
     */
    public function register_menu_page(){
        add_menu_page( 
            'Elementor Widgets',
            'Elementor Widgets',
            'manage_options',
            'wpew',
            '',
            'dashicons-xing', 
            null
        );

        $addon_pro =  __('Widgets', 'wpew');

        add_submenu_page(
            'wpew',
            __('Widgets', 'wpew'),
            $addon_pro,
            'manage_options',
            'wpew',
            array( $this, 'wpew_manage_widgets' )
        );

        add_submenu_page('wpew', __('Tools', 'wpew'), __('Tools', 'wpew'), 'manage_options', 'wpew-tools', array($this, 'wpew_tools') );

        add_submenu_page( 'wpew', __( 'Get Pro', 'wpew' ), __( '<span class="dashicons dashicons-awards wpew-get-pro-text"></span> Get Pro', 'wpew' ), 'manage_options', 'wpew-get-pro', array($this, 'wpew_get_pro') );
    }
    
    // Addon Listing
    public function wpew_manage_widgets() {
        include WPEW_DIR_PATH.'app/settings/view/Addons.php';
    }

    public function wpew_tools(){
		include WPEW_DIR_PATH.'app/settings/view/pages/tools.php';	
	}

    public function wpew_get_pro(){
		include WPEW_DIR_PATH.'app/settings/view/pages/get-pro.php';
	}
}
