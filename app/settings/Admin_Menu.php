<?php
namespace BAFE\settings;

defined( 'ABSPATH' ) || exit;

class Admin_Menu {

    public function __construct() {
        add_action('admin_menu', array($this, 'register_menu_page' ));
    }
    /**
     * BAFE Menu Option Page
     */
    public function register_menu_page(){
        add_menu_page( 
            'Best Addons',
            'Best Addons',
            'manage_options',
            'bafe',
            '',
            'dashicons-image-filter', 
            null
        );

        $addon_pro =  __('Widgets', 'bafe');

        add_submenu_page(
            'bafe',
            __('Widgets', 'bafe'),
            $addon_pro,
            'manage_options',
            'bafe',
            array( $this, 'bafe_manage_widgets' )
        );

        // add_submenu_page( 'bafe', __( 'Get Pro', 'bafe' ), __( '<span class="dashicons dashicons-awards bafe-get-pro-text"></span> Get Pro', 'bafe' ), 'manage_options', 'bafe-get-pro', array($this, 'bafe_get_pro') );
    }
    
    // Addon Listing
    public function bafe_manage_widgets() {
        include BAFE_DIR_PATH.'app/settings/view/Addons.php';
    }

    public function bafe_get_pro(){
		include BAFE_DIR_PATH.'app/settings/view/pages/get-pro.php';
	}
}
