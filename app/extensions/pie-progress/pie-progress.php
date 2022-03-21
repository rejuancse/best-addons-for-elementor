<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_PIC_FILE', __FILE__);
define('EAFE_PIC_DIR_PATHE', plugin_dir_path( EAFE_PIC_FILE ) );
define('EAFE_PIC_BASE_NAME', plugin_basename( EAFE_PIC_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_PIC_config');
function eafe_PIC_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Pie Progress', 'eafe' ),
		'path'			=> EAFE_PIC_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_PIC_FILE ),
		'basename'		=> EAFE_PIC_BASE_NAME,
	);
	$config[ EAFE_PIC_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_PIC_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
