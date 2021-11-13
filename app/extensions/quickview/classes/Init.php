<?php

namespace XEWC\extensions\quickview;

defined( 'ABSPATH' ) || exit;

class Xwoo_Extensions {
    /**
     * @var null
     *
     * Instance of this class
     */
    protected static $_instance = null;

    /**
     * @return null|XEWC
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        add_action('admin_menu', array($this, 'xewc_add_quick_view_page'));
        add_action('admin_init', array($this, 'save_menu_settings' ));
    }

    public function xewc_add_quick_view_page(){
        add_submenu_page(
            'xewc', 
            __('Product Quick View', 'xewc'), 
            __('Product Quick View', 'xewc'), 
            'manage_options', 
            'xewc-quick-view', 
            array($this, 'xewc_quick_view_func')
        );
    }

    /**
     * Display a custom menu page
     */
    public function xewc_quick_view_func(){
        if (xewc_function()->post('wp_settings_page_nonce_field')){
            echo '<div class="notice notice-success is-dismissible">';
                echo '<p>'.__( "Quick view data have been Saved.", "xewc" ).'</p>';
            echo '</div>';
        } ?>

        <form id="xewc" role="form" method="post" action="">
            <?php
            //Load tab file
            include_once XEWC_DIR_PATH.'extensions/quickview/classes/quick-view-tab.php';
            
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
        
        if (xewc_function()->post('wp_settings_page_nonce_field') && wp_verify_nonce( sanitize_text_field(xewc_function()->post('wp_settings_page_nonce_field')), 'wp_settings_page_action' ) ){

            $current_tab = sanitize_text_field(xewc_function()->post('wp_xewc_quick_view_admin_tab'));

            if( ! empty($current_tab) ){
                /**
                 * General Settings
                 */
                $styling = sanitize_text_field(xewc_function()->post('wp_quick_view'));
                xewc_function()->update_checkbox( 'wp_quick_view', $styling);

                $mobile_view = sanitize_text_field(xewc_function()->post('mobile_quick_view'));
                xewc_function()->update_text('mobile_quick_view', $mobile_view);

                $product_status = sanitize_text_field(xewc_function()->post('btn_quick_view'));
                xewc_function()->update_text('btn_quick_view', $product_status);

                # Style.
                $button_bg_color = sanitize_text_field(xewc_function()->post('wp_button_bg_color'));
                xewc_function()->update_text('wp_button_bg_color', $button_bg_color);

                $button_bg_hover_color = sanitize_text_field(xewc_function()->post('wp_close_button_hover_color'));
                xewc_function()->update_text('wp_close_button_hover_color', $button_bg_hover_color);

                $button_text_color = sanitize_text_field(xewc_function()->post('wp_close_button_color'));
                xewc_function()->update_text('wp_close_button_color', $button_text_color);
            }
        }
    }

}
Xwoo_Extensions::instance();
