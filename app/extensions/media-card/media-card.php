<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_MEDIA_CARD_FILE', __FILE__);
define('EAFE_MEDIA_DIR_PATHE', plugin_dir_path( EAFE_MEDIA_CARD_FILE ) );
define('EAFE_MEDIA_BASE_NAME', plugin_basename( EAFE_MEDIA_CARD_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_MEDIA_CARD_config');
function eafe_MEDIA_CARD_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Media Card', 'eafe' ),
		'path'			=> EAFE_MEDIA_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_MEDIA_CARD_FILE ),
		'basename'		=> EAFE_MEDIA_BASE_NAME,
	);
	$config[ EAFE_MEDIA_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_MEDIA_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
