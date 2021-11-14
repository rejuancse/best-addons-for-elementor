<?php

namespace WPEW\extensions\quickview;

defined( 'ABSPATH' ) || exit;

class WPEW_Extensions {
    /**
     * @var null
     *
     * Instance of this class
     */
    protected static $_instance = null;

    /**
     * @return null|WPEW
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        add_action('admin_menu', array($this, 'wpew_add_quick_view_page'));
        add_action('admin_init', array($this, 'save_menu_settings' ));
    }

    public function wpew_add_quick_view_page(){
        add_submenu_page(
            'wpew', 
            __('Product Quick View', 'wpew'), 
            __('Product Quick View', 'wpew'), 
            'manage_options', 
            'wpew-quick-view', 
            array($this, 'wpew_quick_view_func')
        );
    }

    /**
     * Display a custom menu page
     */
    public function wpew_quick_view_func(){
        if (wpew_function()->post('wp_settings_page_nonce_field')){
            echo '<div class="notice notice-success is-dismissible">';
                echo '<p>'.__( "Quick view data have been Saved.", "wpew" ).'</p>';
            echo '</div>';
        } ?>

        <form id="wpew" role="form" method="post" action="">
            <?php
            //Load tab file
            include_once WPEW_DIR_PATH.'extensions/quickview/classes/quick-view-tab.php';
            
            wp_nonce_field( 'wp_settings_page_action', 'wp_settings_page_nonce_field' );
            submit_button( null, 'primary', 'wp_admin_settings_submit_btn' );
            ?>
        </form>
        <?php
    }

    /**
     * Add menu settings action
     */
    public function save_menu_settings() {
        
        if (wpew_function()->post('wp_settings_page_nonce_field') && wp_verify_nonce( sanitize_text_field(wpew_function()->post('wp_settings_page_nonce_field')), 'wp_settings_page_action' ) ){

            $current_tab = sanitize_text_field(wpew_function()->post('wp_wpew_quick_view_admin_tab'));

            if( ! empty($current_tab) ){
                /**
                 * General Settings
                 */
                $styling = sanitize_text_field(wpew_function()->post('wp_quick_view'));
                wpew_function()->update_checkbox( 'wp_quick_view', $styling);

                $mobile_view = sanitize_text_field(wpew_function()->post('mobile_quick_view'));
                wpew_function()->update_text('mobile_quick_view', $mobile_view);

                $product_status = sanitize_text_field(wpew_function()->post('btn_quick_view'));
                wpew_function()->update_text('btn_quick_view', $product_status);

                # Style.
                $button_bg_color = sanitize_text_field(wpew_function()->post('wp_button_bg_color'));
                wpew_function()->update_text('wp_button_bg_color', $button_bg_color);

                $button_bg_hover_color = sanitize_text_field(wpew_function()->post('wp_close_button_hover_color'));
                wpew_function()->update_text('wp_close_button_hover_color', $button_bg_hover_color);

                $button_text_color = sanitize_text_field(wpew_function()->post('wp_close_button_color'));
                wpew_function()->update_text('wp_close_button_color', $button_text_color);
            }
        }
    }

}
WPEW_Extensions::instance();
