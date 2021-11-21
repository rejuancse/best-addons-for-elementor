<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_PIC_FILE', __FILE__);
define('WPEW_PIC_DIR_PATHE', plugin_dir_path( WPEW_PIC_FILE ) );
define('WPEW_PIC_BASE_NAME', plugin_basename( WPEW_PIC_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_PIC_config');
function wpew_PIC_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Pie Progress', 'wpew' ),
		'path'			=> WPEW_PIC_DIR_PATHE,
		'url'			=> plugin_dir_url( WPEW_PIC_FILE ),
		'basename'		=> WPEW_PIC_BASE_NAME,
	);
	$config[ WPEW_PIC_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_PIC_BASE_NAME );
// $isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
