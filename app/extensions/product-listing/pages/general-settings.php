<?php
defined( 'ABSPATH' ) || exit;

$arr =  array(

    # Product Number
    array(
        'id'        => 'wp_product_list_order',
        'type'      => 'dropdown',
        'option'    => array(
            'asc'    => __('ASC','xewc'),
            'desc'    => __('DESC','xewc'),
        ),
        'label'     => __('Product List Order','xewc'),
        'desc'      => __('Default listing of a products','xewc'),
    ),
    array(
        'id'        => 'wp_number_of_coulmn',
        'type'      => 'dropdown',
        'option'    => array(
            '4'    => __('4 Column','xewc'),
            '3'    => __('3 Column','xewc'),
            '2'    => __('2 Column','xewc'),
            '1'    => __('1 Column','xewc'),
        ),
        'label'     => __('Number of Coulmn','xewc'),
        'desc'      => __('Select your products column','xewc'),
    ),
    array(
        'id'        => 'wp_number_of_product', 
        'type'      => 'text',
        'value'     => '9',
        'label'     => __('Number of Product','xewc'),
    ),
    array(
        'id'        => 'wp_xewc_product_category',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable Product Category','xewc'),
        'desc'      => __('Enable category for product view.','xewc'),
    ),
    # Save Function
    array(
        'id'        => 'wp_xewc_product_listing_admin_tab',
        'type'      => 'hidden',
        'value'     => 'tab_style',
    ),
);
xewc_function()->generator( $arr );
