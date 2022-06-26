<?php
namespace EAFE\settings;

defined( 'ABSPATH' ) || exit;

class Admin_Menu {

    public function __construct() {
        add_action('admin_menu', array($this, 'register_menu_page' ));
    }
    /**
     * EAFE Menu Option Page
     */
    public function register_menu_page(){
        add_menu_page( 
            'Easy Addons',
            'Easy Addons',
            'manage_options',
            'eafe',
            '',
            'dashicons-image-filter', 
            null
        );

        $addon_pro =  __('Widgets', 'eafe');

        add_submenu_page(
            'eafe',
            __('Widgets', 'eafe'),
            $addon_pro,
            'manage_options',
            'eafe',
            array( $this, 'eafe_manage_widgets' )
        );

        // add_submenu_page( 'eafe', __( 'Get Pro', 'eafe' ), __( '<span class="dashicons dashicons-awards eafe-get-pro-text"></span> Get Pro', 'eafe' ), 'manage_options', 'eafe-get-pro', array($this, 'eafe_get_pro') );
    }
    
    // Addon Listing
    public function eafe_manage_widgets() {
        include EAFE_DIR_PATH.'app/settings/view/Addons.php';
    }

    public function eafe_get_pro(){
		include EAFE_DIR_PATH.'app/settings/view/pages/get-pro.php';
	}
}
