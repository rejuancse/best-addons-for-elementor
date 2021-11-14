<?php
defined( 'ABSPATH' ) || exit;

$arr =  array(

    # Product Number
    array(
        'id'        => 'wp_product_list_order',
        'type'      => 'dropdown',
        'option'    => array(
            'asc'    => __('ASC','wpew'),
            'desc'    => __('DESC','wpew'),
        ),
        'label'     => __('Product List Order','wpew'),
        'desc'      => __('Default listing of a products','wpew'),
    ),
    array(
        'id'        => 'wp_number_of_coulmn',
        'type'      => 'dropdown',
        'option'    => array(
            '4'    => __('4 Column','wpew'),
            '3'    => __('3 Column','wpew'),
            '2'    => __('2 Column','wpew'),
            '1'    => __('1 Column','wpew'),
        ),
        'label'     => __('Number of Coulmn','wpew'),
        'desc'      => __('Select your products column','wpew'),
    ),
    array(
        'id'        => 'wp_number_of_product', 
        'type'      => 'text',
        'value'     => '9',
        'label'     => __('Number of Product','wpew'),
    ),
    array(
        'id'        => 'wp_wpew_product_category',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable Product Category','wpew'),
        'desc'      => __('Enable category for product view.','wpew'),
    ),
    # Save Function
    array(
        'id'        => 'wp_wpew_product_listing_admin_tab',
        'type'      => 'hidden',
        'value'     => 'tab_style',
    ),
);
wpew_function()->generator( $arr );
