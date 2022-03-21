<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_COUNTDOWN_FILE', __FILE__);
define('EAFE_COUNTDOWN_DIR_PATHE', plugin_dir_path( EAFE_COUNTDOWN_FILE ) );
define('EAFE_COUNTDOWN_BASE_NAME', plugin_basename( EAFE_COUNTDOWN_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_countdown_config');
function eafe_countdown_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Countdown', 'eafe' ),
		'path'			=> EAFE_COUNTDOWN_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_COUNTDOWN_FILE ),
		'basename'		=> EAFE_COUNTDOWN_BASE_NAME,
	);
	$config[ EAFE_COUNTDOWN_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_COUNTDOWN_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
