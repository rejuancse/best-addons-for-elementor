<?php

// namespace WPEW\extensions\quickview;

defined( 'ABSPATH' ) || exit;

class WPEW_Product_Listing_Extensions {
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
        add_action('admin_menu', array($this, 'wpew_add_product_listing_page'));
        add_action('admin_init', array($this, 'save_listing_menu_settings' ));
    }

    public function wpew_add_product_listing_page(){
        add_submenu_page(
            'wpew', 
            __('Product Listing AA', 'wpew'), 
            __('Product Listing QQ', 'wpew'), 
            'manage_options', 
            'wpew-listing', 
            array($this, 'wpew_listing_products_func')
        );
    }

    /**
     * Display a custom menu page
     */
    public function wpew_listing_products_func(){
        if (wpew_function()->post('wp_settings_page_nonce_field')){
            echo '<div class="notice notice-success is-dismissible">';
                echo '<p>'.__( "Quick view data have been Saved.", "wpew" ).'</p>';
            echo '</div>';
        }

        $default_file = WPEW_DIR_PATH.'extensions/product-listing/pages/general-settings.php';
        $shortcode_file = WPEW_DIR_PATH.'extensions/product-listing/pages/shortcode.php';

        // Settings Tab With slug and Display name
        $tabs = apply_filters('wpew_listing_page_panel_tabs', array(
                'general_settings' 	=>
                    array(
                        'tab_name' => __('General Settings','wpew'),
                        'load_form_file' => $default_file
                    ),
                'listing_shortcode' 	=>
                    array(
                        'tab_name' => __('Shortcodes','wpew'),
                        'load_form_file' => $shortcode_file
                    )
            )
        );

        $current_page = 'general_settings';
        if( ! empty($_GET['tab']) ){
            $current_page = sanitize_text_field($_GET['tab']);
        }

        // Print the Tab Title
        echo '<h2 class="wpew-setting-title">'.__( "WPEW Product Listing" , "wpew" ).'</h2>';
        echo '<h2 class="nav-tab-wrapper">';
        foreach( $tabs as $tab => $name ){
            $class = ( $tab == $current_page ) ? ' nav-tab-active' : '';
            echo "<a class='nav-tab$class' href='?page=wpew-listing&tab=$tab'>{$name['tab_name']}</a>";
        }
        echo '</h2>'; ?>

        <form id="wpew" role="form" method="post" action="">
            <?php
            //Load tab file
            $request_file = $tabs[$current_page]['load_form_file'];

            if (array_key_exists(trim(esc_attr($current_page)), $tabs)){
                if (file_exists($default_file)){
                    include_once $request_file;
                }else{
                    include_once $default_file;
                }
            } else {
                include_once $default_file;
            }
            wp_nonce_field( 'wp_settings_page_action', 'wp_settings_page_nonce_field' );
            submit_button( null, 'primary', 'wp_admin_settings_submit_btn' );
            ?>
        </form>
        <?php
    }

    /**
     * Add menu settings action
     */
    public function save_listing_menu_settings() {
        
        if (wpew_function()->post('wp_settings_page_nonce_field') && wp_verify_nonce( sanitize_text_field(wpew_function()->post('wp_settings_page_nonce_field')), 'wp_settings_page_action' ) ){

            $current_tab = sanitize_text_field(wpew_function()->post('wp_wpew_product_listing_admin_tab'));

            if( ! empty($current_tab) ){
                /**
                 * General Settings
                 */
                $product_order = sanitize_text_field(wpew_function()->post('wp_product_list_order'));
                wpew_function()->update_text( 'wp_product_list_order', $product_order);

                $product_number = sanitize_text_field(wpew_function()->post('wp_number_of_product'));
                wpew_function()->update_text( 'wp_number_of_product', $product_number);

                $column_number = sanitize_text_field(wpew_function()->post('wp_number_of_coulmn'));
                wpew_function()->update_text('wp_number_of_coulmn', $column_number);

                $wp_product_category = sanitize_text_field(wpew_function()->post('wp_wpew_product_category'));
                wpew_function()->update_checkbox('wp_wpew_product_category', $wp_product_category);
            }
        }
    }

}
WPEW_Product_Listing_Extensions::instance();
