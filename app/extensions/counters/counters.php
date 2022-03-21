<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_COUNTERS_FILE', __FILE__);
define('EAFE_COUNTERS_DIR_PATHE', plugin_dir_path( EAFE_COUNTERS_FILE ) );
define('EAFE_COUNTERS_BASE_NAME', plugin_basename( EAFE_COUNTERS_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_counters_config');
function eafe_counters_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Counters', 'eafe' ),
		'path'			=> EAFE_COUNTERS_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_COUNTERS_FILE ),
		'basename'		=> EAFE_COUNTERS_BASE_NAME,
	);
	$config[ EAFE_COUNTERS_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_COUNTERS_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
