<?php
defined( 'ABSPATH' ) || exit;

$arr =  array(

    # Product Search
    array(
        'id'        => 'wp_product_search_image',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable Search Image','wpew'),
        'desc'      => __('Enable WooCommerce product search image on load.','wpew'),
    ),
    array(
        'id'        => 'wp_product_search_btn_off',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable Search Button','wpew'),
        'desc'      => __('Enable WooCommerce product search button.','wpew'),
    ),

    // #Save Function
    array(
        'id'        => 'wp_wpew_search_admin_tab',
        'type'      => 'hidden',
        'value'     => 'tab_style',
    ),
);
wpew_function()->generator( $arr );
