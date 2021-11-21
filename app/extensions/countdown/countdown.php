<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_COUNTDOWN_FILE', __FILE__);
define('WPEW_COUNTDOWN_DIR_PATHE', plugin_dir_path( WPEW_COUNTDOWN_FILE ) );
define('WPEW_COUNTDOWN_BASE_NAME', plugin_basename( WPEW_COUNTDOWN_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_countdown_config');
function wpew_countdown_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Countdown', 'wpew' ),
		'path'			=> WPEW_COUNTDOWN_DIR_PATHE,
		'url'			=> plugin_dir_url( WPEW_COUNTDOWN_FILE ),
		'basename'		=> WPEW_COUNTDOWN_BASE_NAME,
	);
	$config[ WPEW_COUNTDOWN_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_COUNTDOWN_BASE_NAME );
// $isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
