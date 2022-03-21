<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_BANNER_FILE', __FILE__);
define('EAFE_BANNER_DIR_PATHE', plugin_dir_path( EAFE_BANNER_FILE ) );
define('EAFE_BANNER_BASE_NAME', plugin_basename( EAFE_BANNER_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_BANNER_config');
function eafe_BANNER_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Shop Banner', 'eafe' ),
		'path'			=> EAFE_BANNER_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_BANNER_FILE ),
		'basename'		=> EAFE_BANNER_BASE_NAME,
	);
	$config[ EAFE_BANNER_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_BANNER_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
