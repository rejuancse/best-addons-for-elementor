<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_LOG_REGISTER_FILE', __FILE__);
define('EAFE_REGISTER_DIR_PATHE', plugin_dir_path( EAFE_LOG_REGISTER_FILE ) );
define('EAFE_REGISTER_BASE_NAME', plugin_basename( EAFE_LOG_REGISTER_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_log_register_config');
function eafe_log_register_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Login/Register', 'eafe' ),
		'path'			=> EAFE_REGISTER_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_LOG_REGISTER_FILE ),
		'basename'		=> EAFE_REGISTER_BASE_NAME,
	);
	$config[ EAFE_REGISTER_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_REGISTER_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
