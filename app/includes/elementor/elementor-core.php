<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function wpew_elementor_init(){
    Elementor\Plugin::instance()->elements_manager->add_category(
        'wpew-elementor',
        [
            'title'     => 'WP Elements Widgets',
            'icon'      => 'apps'
        ],
        1
    );
}
add_action('elementor/init','wpew_elementor_init');

// 
function add_new_elements() {
    $widgets_lists = array_filter(glob(WPEW_DIR_PATH.'app/includes/elementor/widgets/*'));
    if (count($widgets_lists) > 0) {
        foreach( $widgets_lists as $key => $value ) {
            $addon_dir_name = str_replace(dirname($value).'/', '', $value);
            $file_name = WPEW_DIR_PATH . 'app/includes/elementor/widgets/'.$addon_dir_name.'';
            if ( file_exists($file_name) ) {
                include_once $file_name;
            }
        }
    }

    # Listing. 
    // require_once plugin_dir_path( __FILE__ ).'widgets/animated-headine.php';
}
add_action('elementor/widgets/widgets_registered','add_new_elements');
