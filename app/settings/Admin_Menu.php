<?php
namespace XEWC\settings;

defined( 'ABSPATH' ) || exit;

class Admin_Menu {

    public function __construct() {
        add_action('admin_menu', array($this, 'register_menu_page' ));
    }
    /**
     * XEWC Menu Option Page
     */
    public function register_menu_page(){
        add_menu_page( 
            'X-Extensions',
            'X-Extensions',
            'manage_options',
            'xewc',
            '',
            'dashicons-xing', 
            null
        );

        $addon_pro =  __('Extensions', 'xewc');
        if( !defined('XEWC_PRO_FILE') ){
            $addon_pro = __('Extensions <span class="dashicons dashicons-star-filled" style="color:#ef450b"/>', 'xewc');
        }
        add_submenu_page(
            'xewc',
            __('Extensions', 'xewc'),
            $addon_pro,
            'manage_options',
            'xewc',
            array( $this, 'xewc_manage_extensions' )
        );
    }
    
    // Addon Listing
    public function xewc_manage_extensions() {
        include XEWC_DIR_PATH.'settings/view/Addons.php';
    }
}
