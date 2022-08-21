<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function bafe_elementor_init(){
    Elementor\Plugin::instance()->elements_manager->add_category(
        'bafe-elementor',
        [
            'title'     => 'Easy Addons For Elementor',
            'icon'      => 'apps'
        ],
        1
    );
}
add_action( 'elementor/init', 'bafe_elementor_init' );

/**
 * Elementor addons
 * */ 
function bafe_add_new_elements() {
    $widgets_lists = array_filter(glob(BAFE_DIR_PATH.'app/includes/elementor/widgets/*'));
    
    if (count($widgets_lists) > 0) {
        foreach( $widgets_lists as $key => $value ) {
            $addon_dir_name = str_replace(dirname($value).'/', '', $value);
            $file_name = BAFE_DIR_PATH . 'app/includes/elementor/widgets/'.$addon_dir_name.'';
            
            if ( file_exists($file_name) ) {
                include_once $file_name;
            }
        }
    }
}
add_action( 'elementor/widgets/widgets_registered', 'bafe_add_new_elements' );


# Category List
if( !function_exists("bafe_all_category_list") ){
    # List of Group
    function bafe_all_category_list( $category ) {
        global $wpdb;
        $query = "SELECT * FROM `".$wpdb->prefix."term_taxonomy` 
                INNER JOIN `".$wpdb->prefix."terms` ON `".$wpdb->prefix."term_taxonomy`.`term_taxonomy_id`=`".$wpdb->prefix."terms`.`term_id` AND `".$wpdb->prefix."term_taxonomy`.`taxonomy`='".$category."'";

        $results = $wpdb->get_results( $wpdb->prepare( $query, $category ) );
        $cat_list = array();
        $cat_list['allpost'] = 'All Category';
        if(is_array($results)) {
            foreach ($results as $value) {
                $cat_list[$value->slug] = $value->name;
            }
        }
        return $cat_list;
    }
}
