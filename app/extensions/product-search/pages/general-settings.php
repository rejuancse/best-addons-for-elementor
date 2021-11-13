<?php
defined( 'ABSPATH' ) || exit;

$arr =  array(

    # Product Search
    array(
        'id'        => 'wp_product_search_image',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable Search Image','xewc'),
        'desc'      => __('Enable WooCommerce product search image on load.','xewc'),
    ),
    array(
        'id'        => 'wp_product_search_btn_off',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable Search Button','xewc'),
        'desc'      => __('Enable WooCommerce product search button.','xewc'),
    ),

    // #Save Function
    array(
        'id'        => 'wp_xewc_search_admin_tab',
        'type'      => 'hidden',
        'value'     => 'tab_style',
    ),
);
xewc_function()->generator( $arr );
