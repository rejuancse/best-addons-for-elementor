<?php
/**
 * Plugin Name: Best Addons for Elementor
 * Description: Expression of some beautiful, creative, awesome add-ons suitable for use in Element. Which will help in the development of WordPress and Element user.
 * Version: 1.0.4
 * Author: Rejuan Ahamed
 * Text Domain: bafe
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
* @Plugin BAFE_Base Name
*/
define('BAFE_FILE', __FILE__);
define('BAFE_VERSION', '1.0.4');
define('BAFE_DIR_URL', plugin_dir_url( BAFE_FILE ));
define('BAFE_DIR_PATH', plugin_dir_path( BAFE_FILE ));
define('BAFE_BASENAME', plugin_basename( BAFE_FILE ));

/**
* Load Text Domain Language
*/
add_action('init', 'bafe_language_load');
function bafe_language_load(){
    load_plugin_textdomain('bafe', false, basename(dirname( BAFE_FILE )).'/languages/');
}

if (!function_exists('bafe_function')) {
    function bafe_function() {
        require_once BAFE_DIR_PATH . 'app/includes/Functions.php';
        return new \BAFE\Functions();
    }
}

if (!class_exists( 'BAFE_Elementor' )) {
    require_once BAFE_DIR_PATH . 'app/includes/BAFE.php';
    new \BAFE\BAFE_Elementor();
}

require BAFE_DIR_PATH.'app/includes/elementor/elementor-core.php';
