<?php
/**
 * Plugin Name: Easy Addons for Elementor
 * Description: Simple Elementor Widgets
 * Version: 1.0.0
 * Author: Rejuan Ahamed
 * Text Domain: eafe
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
define('EAFE_FILE', __FILE__);
define('EAFE_VERSION', '1.0.0');
define('EAFE_DIR_URL', plugin_dir_url( EAFE_FILE ));
define('EAFE_DIR_PATH', plugin_dir_path( EAFE_FILE ));
define('EAFE_BASENAME', plugin_basename( EAFE_FILE ));

/**
* Load Text Domain Language
*/
add_action('init', 'eafe_language_load');
function eafe_language_load(){
    load_plugin_textdomain('eafe', false, basename(dirname( EAFE_FILE )).'/languages/');
}

if (!function_exists('eafe_function')) {
    function eafe_function() {
        require_once EAFE_DIR_PATH . 'app/includes/Functions.php';
        return new \EAFE\Functions();
    }
}

if (!class_exists( 'EAFE_Elementor' )) {
    require_once EAFE_DIR_PATH . 'app/includes/EAFE.php';
    new \EAFE\EAFE_Elementor();
}

require EAFE_DIR_PATH.'app/includes/elementor/elementor-core.php';
