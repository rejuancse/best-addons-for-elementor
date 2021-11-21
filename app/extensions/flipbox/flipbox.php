<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_FLIPBOX_FILE', __FILE__);
define('WPEW_FLIPBOX_DIR_PATHE', plugin_dir_path( WPEW_FLIPBOX_FILE ) );
define('WPEW_FLIPBOX_BASE_NAME', plugin_basename( WPEW_FLIPBOX_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_flipbox_config');
function wpew_flipbox_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Flip Box', 'wpew' ),
		'path'			=> WPEW_FLIPBOX_DIR_PATHE,
		'url'			=> plugin_dir_url( WPEW_FLIPBOX_FILE ),
		'basename'		=> WPEW_FLIPBOX_BASE_NAME,
	);
	$config[ WPEW_FLIPBOX_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_FLIPBOX_BASE_NAME );
// $isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
