<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_INFOBOX_FILE', __FILE__);
define('EAFE_INFOBOX_DIR_PATHE', plugin_dir_path( EAFE_INFOBOX_FILE ) );
define('EAFE_INFOBOX_BASE_NAME', plugin_basename( EAFE_INFOBOX_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_infobox_config');
function eafe_infobox_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Info Box', 'eafe' ),
		'path'			=> EAFE_INFOBOX_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_INFOBOX_FILE ),
		'basename'		=> EAFE_INFOBOX_BASE_NAME,
	);
	$config[ EAFE_INFOBOX_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_INFOBOX_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
