<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_BUTTON_GROUP_FILE', __FILE__);
define('EAFE_BUTTON_DIR_PATHE', plugin_dir_path( EAFE_BUTTON_GROUP_FILE ) );
define('EAFE_BUTTON_BASE_NAME', plugin_basename( EAFE_BUTTON_GROUP_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_button_group_config');
function eafe_button_group_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Button Group', 'eafe' ),
		'path'			=> EAFE_BUTTON_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_BUTTON_GROUP_FILE ),
		'basename'		=> EAFE_BUTTON_BASE_NAME,
	);
	$config[ EAFE_BUTTON_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_BUTTON_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
