<?php
defined( 'ABSPATH' ) || exit;

$arr =  array(
    // #General Seperator
    array(
        'type'      => 'seperator',
        'label'     => __('WooCommerce Quick View Settings', 'wpew'),
        'top_line'  => 'true',
    ),
    # Enable Quick View
    array(
        'id'        => 'wp_quick_view',
        'type'      => 'checkbox',
        'value'     => 'true',
        'label'     => __('Enable Quick View','wpew'),
    ),
    # Enable Quick View on mobile device
    array(
        'id'        => 'mobile_quick_view',
        'type'      => 'checkbox', 
        'value'     => 'true',
        'label'     => __('Enable Quick View on mobile','wpew'),
        'desc'      => '<p>'.__('Enable quick view features on mobile device too','wpew').'</p>',
    ),
    # Enable Quick View on mobile device
    array(
        'id'        => 'btn_quick_view',
        'type'      => 'text', 
        'value'     => 'Quick View',
        'label'     => __('Quick View Button Label','wpew'),
        'desc'      => '<p>'.__('Label for the quick view button in the WooCommerce loop.','wpew').'</p>',
    ),

    // #Style Seperator
    array(
        'type'      => 'seperator',
        'label'     => __('Style Settings','wpew'),
        'top_line'  => 'true',
    ),

    # Button Background Color
    array(
        'id'        => 'wp_button_bg_color',
        'type'      => 'color',
        'label'     => __('Button BG Color','wpew'),
        'desc'      => __('Select button background color.','wpew'),
        'value'     => '#1adc68',
    ),
    # Close Button Color
    array(
        'id'        => 'wp_close_button_color',
        'type'      => 'color',
        'label'     => __('Modal close button color','wpew'),
        'desc'      => __('Select quick view modal close button color.','wpew'),
        'value'     => '#2b74aa',
    ),
    # Modal close button hover color
    array(
        'id'        => 'wp_close_button_hover_color',
        'type'      => 'color',
        'label'     => __('Modal close button hover color','wpew'),
        'desc'      => __('Select quick view modal close button hover color.','wpew'),
        'value'     => '#2554ec',
    ),
    # Save Function
    array(
        'id'        => 'wp_wpew_quick_view_admin_tab',
        'type'      => 'hidden',
        'value'     => 'tab_style',
    ),
);
wpew_function()->generator( $arr );
