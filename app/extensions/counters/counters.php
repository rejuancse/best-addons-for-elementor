<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_COUNTERS_FILE', __FILE__);
define('WPEW_COUNTERS_DIR_PATHE', plugin_dir_path( WPEW_COUNTERS_FILE ) );
define('WPEW_COUNTERS_BASE_NAME', plugin_basename( WPEW_COUNTERS_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_counters_config');
function wpew_counters_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Counters', 'wpew' ),
		'path'			=> WPEW_COUNTERS_DIR_PATHE,
		'url'			=> plugin_dir_url( WPEW_COUNTERS_FILE ),
		'basename'		=> WPEW_COUNTERS_BASE_NAME,
	);
	$config[ WPEW_COUNTERS_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_COUNTERS_BASE_NAME );
// $isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
