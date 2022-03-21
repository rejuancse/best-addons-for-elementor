<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_VIDEO_POPUP_FILE', __FILE__);
define('EAFE_VIDEO_POPUP_DIR_PATHE', plugin_dir_path( EAFE_VIDEO_POPUP_FILE ) );
define('EAFE_VIDEO_POPUP_BASE_NAME', plugin_basename( EAFE_VIDEO_POPUP_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_video_popup_config');
function eafe_video_popup_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Video Popup', 'eafe' ),
		'path'			=> EAFE_VIDEO_POPUP_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_VIDEO_POPUP_FILE ),
		'basename'		=> EAFE_VIDEO_POPUP_BASE_NAME,
	);
	$config[ EAFE_VIDEO_POPUP_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_VIDEO_POPUP_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
