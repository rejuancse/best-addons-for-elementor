<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_IMAGE_GALLERY_FILE', __FILE__);
define('WPEW_GALLERY_DIR_PATHE', plugin_dir_path( WPEW_IMAGE_GALLERY_FILE ) );
define('WPEW_GALLERY_BASE_NAME', plugin_basename( WPEW_IMAGE_GALLERY_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_image_gallery_config');
function wpew_image_gallery_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Image Gallery', 'wpew' ),
		'path'			=> WPEW_GALLERY_DIR_PATHE,
		'url'			=> plugin_dir_url( WPEW_IMAGE_GALLERY_FILE ),
		'basename'		=> WPEW_GALLERY_BASE_NAME,
	);
	$config[ WPEW_GALLERY_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_GALLERY_BASE_NAME );
// $isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
