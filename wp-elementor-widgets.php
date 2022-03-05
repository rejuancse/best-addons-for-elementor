<?php
/**
 * Plugin Name: WP Elementor Widgets for Elementor
 * Description: Simple Elementor Widgets
 * Version: 1.0.0
 * Author: Rejuan Ahamed
 * Text Domain: wpew
 * Domain Path: /languages/
 *
 * @package UserRegistration
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
* Support for Multi Network Site
*/
if( !function_exists('is_plugin_active_for_network') ){
    require_once(ABSPATH . '/wp-admin/includes/plugin.php');
}
 
/**
* @Type
* @Version
* @Directory URL
* @Directory Path
* @Plugin Base Name
*/
define('WPEW_FILE', __FILE__);
define('WPEW_VERSION', '1.0.0');
define('WPEW_DIR_URL', plugin_dir_url( WPEW_FILE ));
define('WPEW_DIR_PATH', plugin_dir_path( WPEW_FILE ));
define('WPEW_BASENAME', plugin_basename( WPEW_FILE ));

/**
* Load Text Domain Language
*/
add_action('init', 'wpew_language_load');
function wpew_language_load(){
    load_plugin_textdomain('wpew', false, basename(dirname( WPEW_FILE )).'/languages/');
}

if (!function_exists('wpew_function')) {
    function wpew_function() {
        require_once WPEW_DIR_PATH . 'app/includes/Functions.php';
        return new \WPEW\Functions();
    }
}

if (!class_exists( 'WPEW_Elementor' )) {
    require_once WPEW_DIR_PATH . 'app/includes/WPEW.php';
    new \WPEW\WPEW_Elementor();
}

require WPEW_DIR_PATH.'app/includes/elementor/elementor-core.php';













add_action( 'product_cat_add_form_fields', 'freshen_add_term_fields' );

function freshen_add_term_fields( $taxonomy ) {

	echo '<div class="form-field">
	<label for="freshen_offer_intro">Offer Intro</label>
	<input type="text" name="freshen_offer_intro" id="freshen_offer_intro" />
	<p>Product offer intro text</p>
	</div>';

    echo '<div class="form-field">
	<label for="freshen_offer_title">Offer Title</label>
    <textarea name="freshen_offer_title" id="freshen_offer_title" rows="5" cols="40"></textarea>
	<p>Product offer Title text</p>
	</div>';

    echo '<div class="form-field term-group">
        <label for="image_id">'.__('Offer Image', 'freshen').'</label>
        <input type="hidden" id="image_id" name="image_id" class="custom_media_url" value="">
        <div id="image_wrapper"></div>
        <p>
            <input type="button" class="button button-secondary taxonomy_media_button" id="taxonomy_media_button" name="taxonomy_media_button" value="'.__( 'Add Image', 'freshen' ).'">
            <input type="button" class="button button-secondary taxonomy_media_remove" id="taxonomy_media_remove" name="taxonomy_media_remove" value="'.__( 'Remove Image', 'freshen' ).'">
        </p>
    </div>';
}

add_action( 'product_cat_edit_form_fields', 'misha_edit_term_fields', 10, 2 );

function misha_edit_term_fields( $term, $taxonomy ) {

	$offer_intro = get_term_meta( $term->term_id, 'freshen_offer_intro', true );
	$offer_title = get_term_meta( $term->term_id, 'freshen_offer_title', true );
	$image_id = get_term_meta( $term->term_id, 'image_id', true );
	
	echo '<tr class="form-field">
        <th>
            <label for="freshen_offer_intro">Offer Intro</label>
        </th>
        <td>
            <input name="freshen_offer_intro" id="freshen_offer_intro" type="text" value="' . esc_attr( $offer_intro ) .'" />
            <p class="description">Field description may go here.</p>
        </td>
	</tr>';

    echo '<tr class="form-field">
        <th>
            <label for="freshen_offer_title">Offer Title</label>
        </th>
        <td>
            <textarea name="freshen_offer_title" id="freshen_offer_title" rows="5" cols="40">' . esc_attr( $offer_title ) .'</textarea>
            <p class="description">Field description may go here.</p>
        </td>
	</tr>';


    echo '<tr class="form-field term-group-wrap">
            <th scope="row">
                <label for="image_id">'.__( 'Offer Image', 'freshen' ).'</label>
            </th>
        <td>';

            $image_id = get_term_meta ( $term -> term_id, 'image_id', true );
            echo '<input type="hidden" id="image_id" name="image_id" value="'.$image_id.'">';

            echo '<div id="image_wrapper">';
                if ( $image_id ) {
                    echo wp_get_attachment_image ( $image_id, 'thumbnail' );
                }
            echo '</div>';

            echo '<p>
                <input type="button" class="button button-secondary taxonomy_media_button" id="taxonomy_media_button" name="taxonomy_media_button" value="'.__( 'Add Image', 'freshen' ).'">
                <input type="button" class="button button-secondary taxonomy_media_remove" id="taxonomy_media_remove" name="taxonomy_media_remove" value="'.__( 'Remove Image', 'freshen' ).'">
            </p>
        </td>
    </tr>';
}


add_action( 'created_product_cat', 'freshen_save_term_fields' );
add_action( 'edited_product_cat', 'freshen_save_term_fields' );

function freshen_save_term_fields( $term_id ) {
	update_term_meta(
		$term_id,
		'freshen_offer_intro',
		sanitize_text_field( $_POST[ 'freshen_offer_intro' ] )
	);

    update_term_meta(
		$term_id,
		'freshen_offer_title',
		sanitize_text_field( $_POST[ 'freshen_offer_title' ] )
	);

    update_term_meta(
		$term_id,
		'image_id',
		sanitize_text_field( $_POST[ 'image_id' ] )
	);
}


//Enqueue the wp_media library
add_action( 'admin_enqueue_scripts', 'freshen_product_taxonomy_load_media' );
function freshen_product_taxonomy_load_media() {
    if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'product_cat' ) {
       return;
    }
    wp_enqueue_media();
}

//Custom script
add_action( 'admin_footer', 'add_product_taxonomy_script' );
function add_product_taxonomy_script() {
    if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'product_cat' ) {
       return;
    } ?>

    <script>
        jQuery(document).ready( function($) {
            function taxonomy_media_upload(button_class) {
                var custom_media = true,
                original_attachment = wp.media.editor.send.attachment;
                $('body').on('click', button_class, function(e) {
                    var button_id = '#'+$(this).attr('id');
                    var send_attachment = wp.media.editor.send.attachment;
                    var button = $(button_id);
                    custom_media = true;
                    wp.media.editor.send.attachment = function(props, attachment){
                        if ( custom_media ) {
                            $('#image_id').val(attachment.id);
                            $('#image_wrapper').html('<img class="custom_media_image" src="" style="margin:0; padding:0; max-height:100px; float:none;" />');
                            $('#image_wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
                        } else {
                            return original_attachment.apply( button_id, [props, attachment] );
                        }
                    }
                    wp.media.editor.open(button);
                    return false;
                });
            }

            taxonomy_media_upload('.taxonomy_media_button.button'); 
            $('body').on('click','.taxonomy_media_remove',function(){
                $('#image_id').val('');
                $('#image_wrapper').html('<img class="custom_media_image" src="" style="margin:0; padding:0; max-height:100px; float:none;" />');
            });

            $(document).ajaxComplete(function(event, xhr, settings) {
                var queryStringArr = settings.data.split('&');
                if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
                    var xml = xhr.responseXML;
                    $response = $(xml).find('term_id').text();
                    if($response!=""){
                        $('#image_wrapper').html('');
                    }
                }
            });
        });
    </script>
    <?php
}

//Add new column heading
add_filter( 'manage_edit-product_cat_columns', 'freshen_display_products_taxonomy_image' ); 
function freshen_display_products_taxonomy_image( $columns ) {
    $columns['category_image'] = __( 'Image', 'freshen' );
    return $columns;
}

//Display new columns values
add_action( 'manage_product_cat_custom_column', 'freshen_display_product_taxonomy_image_value_column' , 10, 3); 
function freshen_display_product_taxonomy_image_value_column( $columns, $column, $id ) {
    if ( 'category_image' == $column ) {
        $image_id = esc_html( get_term_meta($id, 'image_id', true) );
        $columns = wp_get_attachment_image ( $image_id, array('50', '50') );
    }
    return $columns;
}



















$flaticon_lists = array(
    'hot-sale'         => __('Hot Sale', 'freshen-core'),
    'bell'             => __('Bell', 'freshen-core'),
    'discount'         => __('Discount', 'freshen-core'),
    'harvest'          => __('Harvest', 'freshen-core'),
    'vegetable'        => __('Vegetable', 'freshen-core'),
    'plastic-bottle'   => __('Plastic Bottle', 'freshen-core'),
    'bread-1'          => __('Bread', 'freshen-core'),
    'boiled-egg'       => __('Boiled Egg', 'freshen-core'),
    'milk-1'           => __('Milk', 'freshen-core'),
    'meat'             => __('Meat', 'freshen-core'),
    'fish'             => __('Fish', 'freshen-core'),
);

add_action( 'product_cat_add_form_fields', 'add_flaticon_list_field', 10, 2 );
function add_flaticon_list_field($taxonomy) {
    global $flaticon_lists;
    ?><div class="form-field term-group">
        <label for="flaticon-list"><?php _e('Flaticon List', 'freshen-core'); ?></label>
        <select class="postform" id="equipment-group" name="flaticon-list">
            <option value=""><?php _e('Select Icons', 'freshen-core'); ?></option>
            <?php foreach ($flaticon_lists as $_group_key => $_group) : ?>
                <option value="<?php echo $_group_key; ?>" class=""><?php echo $_group; ?></option>
            <?php endforeach; ?>
        </select>
    </div><?php
}

add_action( 'created_product_cat', 'save_feature_meta', 10, 2 );

function save_feature_meta( $term_id, $tt_id ){
    if( isset( $_POST['flaticon-list'] ) && ’ !== $_POST['flaticon-list'] ){
        $group = sanitize_title( $_POST['flaticon-list'] );
        add_term_meta( $term_id, 'flaticon-list', $group, true );
    }
}
add_action( 'product_cat_edit_form_fields', 'edit_flaticon_list_field', 10, 2 );

function edit_flaticon_list_field( $term, $taxonomy ){

    global $flaticon_lists;

    // get current group
    $flaticon_list = get_term_meta( $term->term_id, 'flaticon-list', true );

    ?><tr class="form-field term-group-wrap">
        <th scope="row"><label for="flaticon-list"><?php _e( 'Flaticon List', 'freshen-core' ); ?></label></th>
        <td><select class="postform" id="flaticon-list" name="flaticon-list">
            <option value=""><?php _e('Update icons', 'freshen-core'); ?></option>
            <?php foreach( $flaticon_lists as $_group_key => $_group ) : ?>
                <option value="<?php echo $_group_key; ?>" <?php selected( $flaticon_list, $_group_key ); ?>><?php echo $_group; ?></option>
            <?php endforeach; ?>
        </select></td>
    </tr><?php
}

add_action( 'edited_product_cat', 'update_feature_meta', 10, 2 );

function update_feature_meta( $term_id, $tt_id ){

    if( isset( $_POST['flaticon-list'] ) && ’ !== $_POST['flaticon-list'] ){
        $group = sanitize_title( $_POST['flaticon-list'] );
        update_term_meta( $term_id, 'flaticon-list', $group );
    }
}

add_filter('manage_edit-product_cat_columns', 'add_flaticon_list_column' );

function add_flaticon_list_column( $columns ){
    $columns['flaticon_list'] = __( 'Group', 'freshen-core' );
    return $columns;
}
add_filter('manage_product_cat_custom_column', 'add_flaticon_list_column_content', 10, 3 );

function add_flaticon_list_column_content( $content, $column_name, $term_id ){
    global $flaticon_lists;

    if( $column_name !== 'flaticon_list' ){
        return $content;
    }

    $term_id = absint( $term_id );
    $flaticon_list = get_term_meta( $term_id, 'flaticon-list', true );
    
    if( !empty( $flaticon_list ) ){
        $content .= esc_attr( $flaticon_lists[ $flaticon_list ] );
    }

    return $content;
}

add_filter( 'manage_edit-product_cat_sortable_columns', 'add_flaticon_list_column_sortable' );

function add_flaticon_list_column_sortable( $sortable ){
    $sortable[ 'flaticon_list' ] = 'flaticon_list';
    return $sortable;
}
