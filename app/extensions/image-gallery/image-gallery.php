<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_IMAGE_GALLERY_FILE', __FILE__);
define('EAFE_GALLERY_DIR_PATHE', plugin_dir_path( EAFE_IMAGE_GALLERY_FILE ) );
define('EAFE_GALLERY_BASE_NAME', plugin_basename( EAFE_IMAGE_GALLERY_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_image_gallery_config');
function eafe_image_gallery_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Image Gallery', 'eafe' ),
		'path'			=> EAFE_GALLERY_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_IMAGE_GALLERY_FILE ),
		'basename'		=> EAFE_GALLERY_BASE_NAME,
	);
	$config[ EAFE_GALLERY_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_GALLERY_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
