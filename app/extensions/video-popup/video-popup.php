<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_VIDEO_POPUP_FILE', __FILE__);
define('WPEW_VIDEO_POPUP_DIR_PATHE', plugin_dir_path( WPEW_VIDEO_POPUP_FILE ) );
define('WPEW_VIDEO_POPUP_BASE_NAME', plugin_basename( WPEW_VIDEO_POPUP_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_video_popup_config');
function wpew_video_popup_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Video Popup', 'wpew' ),
		'path'			=> WPEW_VIDEO_POPUP_DIR_PATHE,
		'url'			=> plugin_dir_url( WPEW_VIDEO_POPUP_FILE ),
		'basename'		=> WPEW_VIDEO_POPUP_BASE_NAME,
	);
	$config[ WPEW_VIDEO_POPUP_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_VIDEO_POPUP_BASE_NAME );
// $isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
