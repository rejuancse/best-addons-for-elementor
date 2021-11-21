<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_LOG_REGISTER_FILE', __FILE__);
define('WPEW_REGISTER_DIR_PATHE', plugin_dir_path( WPEW_LOG_REGISTER_FILE ) );
define('WPEW_REGISTER_BASE_NAME', plugin_basename( WPEW_LOG_REGISTER_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_log_register_config');
function wpew_log_register_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Login/Register', 'wpew' ),
		'path'			=> WPEW_REGISTER_DIR_PATHE,
		'url'			=> plugin_dir_url( WPEW_LOG_REGISTER_FILE ),
		'basename'		=> WPEW_REGISTER_BASE_NAME,
	);
	$config[ WPEW_REGISTER_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_REGISTER_BASE_NAME );
// $isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
