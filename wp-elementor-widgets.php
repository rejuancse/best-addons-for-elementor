<?php
/**
 * Plugin Name: WP Elementor Widgets for Elementor
 * Description: Simple Elementor Widgets
 * Version: 1.0.0
 * Author: Rejuan Ahamed
 * Text Domain: wpew
 * Domain Path: /languages/
 *
 * @package UserRegistration
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
* Support for Multi Network Site
*/
if( !function_exists('is_plugin_active_for_network') ){
    require_once(ABSPATH . '/wp-admin/includes/plugin.php');
}

/**
* @Type
* @Version
* @Directory URL
* @Directory Path
* @Plugin Base Name
*/
define('WPEW_FILE', __FILE__);
define('WPEW_VERSION', '1.0.0');
define('WPEW_DIR_URL', plugin_dir_url( WPEW_FILE ));
define('WPEW_DIR_PATH', plugin_dir_path( WPEW_FILE ));
define('WPEW_BASENAME', plugin_basename( WPEW_FILE ));
/**
* Load Text Domain Language
*/
add_action('init', 'wpew_language_load');
function wpew_language_load(){
    load_plugin_textdomain('wpew', false, basename(dirname( WPEW_FILE )).'/languages/');
}

if (!function_exists('wpew_function')) {
    function wpew_function() {
        require_once WPEW_DIR_PATH . 'app/includes/Functions.php';
        return new \WPEW\Functions();
    }
}

if (!class_exists( 'WPEW_Elementor' )) {
    require_once WPEW_DIR_PATH . 'app/includes/WPEW.php';
    new \WPEW\WPEW_Elementor();
}
