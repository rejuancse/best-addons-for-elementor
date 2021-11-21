<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_INFOBOX_FILE', __FILE__);
define('WPEW_INFOBOX_DIR_PATHE', plugin_dir_path( WPEW_INFOBOX_FILE ) );
define('WPEW_INFOBOX_BASE_NAME', plugin_basename( WPEW_INFOBOX_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_infobox_config');
function wpew_infobox_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Info Box', 'wpew' ),
		'path'			=> WPEW_INFOBOX_DIR_PATHE,
		'url'			=> plugin_dir_url( WPEW_INFOBOX_FILE ),
		'basename'		=> WPEW_INFOBOX_BASE_NAME,
	);
	$config[ WPEW_INFOBOX_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_INFOBOX_BASE_NAME );
// $isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
