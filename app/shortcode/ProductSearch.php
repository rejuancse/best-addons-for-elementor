<?php
namespace WPEW\shortcode;

defined( 'ABSPATH' ) || exit;

class Product_Search {

    function __construct() {
        add_shortcode( 'wpew_product_search', array( $this, 'products_search_callback_function' ) );
    }

    function products_search_callback_function() {

        $btn_off = get_option( 'wp_product_search_btn_off', true);

        $output = '';
        
        $output .= '<form class="search_form_shortcode" role="search" action="'.esc_url( home_url( '/' ) ).'" method="get">';
            $output .= '<input class="wpew-ajax-search" data-url="'.plugin_dir_url('', __FILE__).'x-extensions-for-woocommerce/extensions/product-search/classes/search-data.php'.'" type="text" name="s" value="'.get_search_query().'" placeholder="'.esc_attr__( 'Search products...', 'wpew' ).'"/>';
            if($btn_off == 'true') { 
                $output .= '<button type="submit">Product Search</button>';
            }
            $output .= '<div class="wpew-products-search-results"></div>';
        $output .= '</form>';
        
        return $output;
    }
}
