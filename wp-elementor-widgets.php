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






add_action( 'product_cat_add_form_fields', 'wpew_add_term_fields' );

function wpew_add_term_fields( $taxonomy ) {

	echo '<div class="form-field">
	<label for="wpew_offer_intro">Offer Intro</label>
	<input type="text" name="wpew_offer_intro" id="wpew_offer_intro" />
	<p>Product offer intro text</p>
	</div>';

    echo '<div class="form-field">
	<label for="wpew_offer_title">Offer Title</label>
    <textarea name="wpew_offer_title" id="wpew_offer_title" rows="5" cols="40"></textarea>
	<p>Product offer Title text</p>
	</div>';

    echo '<div class="form-field term-group">
        <label for="image_id">'.__('Offer Image', 'wpew').'</label>
        <input type="hidden" id="image_id" name="image_id" class="custom_media_url" value="">
        <div id="image_wrapper"></div>
        <p>
            <input type="button" class="button button-secondary taxonomy_media_button" id="taxonomy_media_button" name="taxonomy_media_button" value="'.__( 'Add Image', 'wpew' ).'">
            <input type="button" class="button button-secondary taxonomy_media_remove" id="taxonomy_media_remove" name="taxonomy_media_remove" value="'.__( 'Remove Image', 'wpew' ).'">
        </p>
    </div>';
}

add_action( 'product_cat_edit_form_fields', 'wpew_edit_term_fields', 10, 2 );

function wpew_edit_term_fields( $term, $taxonomy ) {

	$offer_intro = get_term_meta( $term->term_id, 'wpew_offer_intro', true );
	$offer_title = get_term_meta( $term->term_id, 'wpew_offer_title', true );
	$image_id = get_term_meta( $term->term_id, 'image_id', true );
	
	echo '<tr class="form-field">
        <th>
            <label for="wpew_offer_intro">Offer Intro</label>
        </th>
        <td>
            <input name="wpew_offer_intro" id="wpew_offer_intro" type="text" value="' . esc_attr( $offer_intro ) .'" />
            <p class="description">Field description may go here.</p>
        </td>
	</tr>';

    echo '<tr class="form-field">
        <th>
            <label for="wpew_offer_title">Offer Title</label>
        </th>
        <td>
            <textarea name="wpew_offer_title" id="wpew_offer_title" rows="5" cols="40">' . esc_attr( $offer_title ) .'</textarea>
            <p class="description">Field description may go here.</p>
        </td>
	</tr>';


    echo '<tr class="form-field term-group-wrap">
            <th scope="row">
                <label for="image_id">'.__( 'Offer Image', 'wpew' ).'</label>
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
                <input type="button" class="button button-secondary taxonomy_media_button" id="taxonomy_media_button" name="taxonomy_media_button" value="'.__( 'Add Image', 'wpew' ).'">
                <input type="button" class="button button-secondary taxonomy_media_remove" id="taxonomy_media_remove" name="taxonomy_media_remove" value="'.__( 'Remove Image', 'wpew' ).'">
            </p>
        </td>
    </tr>';
}


add_action( 'created_product_cat', 'wpew_save_term_fields' );
add_action( 'edited_product_cat', 'wpew_save_term_fields' );

function wpew_save_term_fields( $term_id ) {
	update_term_meta(
		$term_id,
		'wpew_offer_intro',
		sanitize_text_field( $_POST[ 'wpew_offer_intro' ] )
	);

    update_term_meta(
		$term_id,
		'wpew_offer_title',
		sanitize_text_field( $_POST[ 'wpew_offer_title' ] )
	);

    update_term_meta(
		$term_id,
		'image_id',
		sanitize_text_field( $_POST[ 'image_id' ] )
	);
}


//Enqueue the wp_media library
add_action( 'admin_enqueue_scripts', 'wpew_product_taxonomy_load_media' );
function wpew_product_taxonomy_load_media() {
    if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'product_cat' ) {
       return;
    }
    wp_enqueue_media();
}

//Custom script
add_action( 'admin_footer', 'wpew_add_product_taxonomy_script' );
function wpew_add_product_taxonomy_script() {
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
add_filter( 'manage_edit-product_cat_columns', 'wpew_display_products_taxonomy_image' ); 
function wpew_display_products_taxonomy_image( $columns ) {
    $columns['category_image'] = __( 'Image', 'wpew' );
    return $columns;
}

//Display new columns values
add_action( 'manage_product_cat_custom_column', 'wpew_display_product_taxonomy_image_value_column' , 10, 3); 
function wpew_display_product_taxonomy_image_value_column( $columns, $column, $id ) {
    if ( 'category_image' == $column ) {
        $image_id = esc_html( get_term_meta($id, 'image_id', true) );
        $columns = wp_get_attachment_image ( $image_id, array('50', '50') );
    }
    return $columns;
}


/**
 * FlatIcons list in WooCommerce
 */
$flaticon_lists = array(
    'cookie'            => __('Cookie', 'wpew'),
    'shop'              => __('Shop', 'wpew'),
    'map'               => __('Map', 'wpew'),
    'wall-clock'        => __('Wall Clock', 'wpew'),
    'location'          => __('Location', 'wpew'),
    'play-button-arrowhead'  => __('Play Button', 'wpew'),
    'salad-1'           => __('Salad', 'wpew'),
    'apple'             => __('Apple', 'wpew'),
    'broccoli'          => __('Broccoli', 'wpew'),
    'lemon'             => __('Lemon', 'wpew'),
    'love'              => __('Love', 'wpew'),
    'check'             => __('Check', 'wpew'),
    'controls'          => __('Controls', 'wpew'),
    'setting-lines'     => __('Setting Lines', 'wpew'),
    'filter'            => __('Filter', 'wpew'),
    'trophy'            => __('Trophy', 'wpew'),
    'vegetarian'        => __('Vegetarian', 'wpew'),
    'customer-1'        => __('Vustomer', 'wpew'),
    'customer'          => __('Customer', 'wpew'),
    'support'           => __('Support', 'wpew'),
    'returning'         => __('Returning', 'wpew'),
    'hot-sale'          => __('Hot Sale', 'wpew'),
    'bell'              => __('Bell', 'wpew'),
    'discount'          => __('Discount', 'wpew'),
    'harvest'           => __('Harvest', 'wpew'),
    'vegetable'         => __('Vegetable', 'wpew'),
    'plastic-bottle'    => __('Plastic Bottle', 'wpew'),
    'bread-1'           => __('Bread', 'wpew'),
    'boiled-egg'        => __('Boiled Egg', 'wpew'),
    'milk-1'            => __('Milk', 'wpew'),
    'fish'              => __('Fish', 'wpew'),
    'meat'              => __('meat', 'wpew'),
    'play'              => __('play', 'wpew'),
    'email-1'           => __('email-1', 'wpew'),
    'shopping-cart'     => __('shopping-cart', 'wpew'),
    'chat'              => __('chat', 'wpew'),
    'whatsapp'          => __('whatsapp', 'wpew'),
    'up-arrow'          => __('up-arrow', 'wpew'),
    'down-arrow'        => __('down-arrow', 'wpew'),
    'left-arrow'        => __('left-arrow', 'wpew'),
    'chevron'           => __('chevron', 'wpew'),
    'shuffle'           => __('shuffle', 'wpew'),
    'star'              => __('star', 'wpew'),
    'heart'             => __('Heart', 'wpew'),
    'phone-call'        => __('phone-call', 'wpew'),
);

add_action( 'product_cat_add_form_fields', 'wpew_add_flaticon_list_field', 10, 2 );
function wpew_add_flaticon_list_field($taxonomy) {
    global $flaticon_lists;
    ?><div class="form-field term-group">
        <label for="flaticon-list"><?php _e('Flaticon List', 'wpew'); ?></label>
        <select class="postform" id="equipment-group" name="flaticon-list">
            <option value=""><?php _e('Select Icons', 'wpew'); ?></option>
            <?php foreach ($flaticon_lists as $_group_key => $_group) : ?>
                <option value="<?php echo $_group_key; ?>" class=""><?php echo $_group; ?></option>
            <?php endforeach; ?>
        </select>
    </div><?php
}

add_action( 'created_product_cat', 'wpew_save_feature_meta', 10, 2 );

function wpew_save_feature_meta( $term_id, $tt_id ){
    if( isset( $_POST['flaticon-list'] ) && ’ !== $_POST['flaticon-list'] ){
        $group = sanitize_title( $_POST['flaticon-list'] );
        add_term_meta( $term_id, 'flaticon-list', $group, true );
    }
}
add_action( 'product_cat_edit_form_fields', 'wpew_edit_flaticon_list_field', 10, 2 );

function wpew_edit_flaticon_list_field( $term, $taxonomy ){

    global $flaticon_lists;

    // get current group
    $flaticon_list = get_term_meta( $term->term_id, 'flaticon-list', true );

    ?><tr class="form-field term-group-wrap">
        <th scope="row"><label for="flaticon-list"><?php _e( 'Flaticon List', 'wpew' ); ?></label></th>
        <td><select class="postform" id="flaticon-list" name="flaticon-list">
            <option value=""><?php _e('Update icons', 'wpew'); ?></option>
            <?php foreach( $flaticon_lists as $_group_key => $_group ) : ?>
                <option value="<?php echo $_group_key; ?>" <?php selected( $flaticon_list, $_group_key ); ?>><?php echo $_group; ?></option>
            <?php endforeach; ?>
        </select></td>
    </tr><?php
}

add_action( 'edited_product_cat', 'wpew_update_feature_meta', 10, 2 );

function wpew_update_feature_meta( $term_id, $tt_id ){

    if( isset( $_POST['flaticon-list'] ) && ’ !== $_POST['flaticon-list'] ){
        $group = sanitize_title( $_POST['flaticon-list'] );
        update_term_meta( $term_id, 'flaticon-list', $group );
    }
}

add_filter('manage_edit-product_cat_columns', 'wpew_add_flaticon_list_column' );

function wpew_add_flaticon_list_column( $columns ){
    $columns['flaticon_list'] = __( 'Group', 'wpew' );
    return $columns;
}
add_filter('manage_product_cat_custom_column', 'wpew_add_flaticon_list_column_content', 10, 3 );

function wpew_add_flaticon_list_column_content( $content, $column_name, $term_id ){
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

add_filter( 'manage_edit-product_cat_sortable_columns', 'wpew_add_flaticon_list_column_sortable' );

function wpew_add_flaticon_list_column_sortable( $sortable ){
    $sortable[ 'flaticon_list' ] = 'flaticon_list';
    return $sortable;
}


/**
 * Woocommerce Display Fields @Offer Tag
 * */ 
add_action('woocommerce_product_options_general_product_data', 'wpew_product_custom_fields');
function wpew_product_custom_fields()
{
    global $woocommerce, $post;
    echo '<div class="product_custom_field">';
    woocommerce_wp_text_input(
        array(
            'id' => 'wpew_offertag_text_field',
            'placeholder' => 'Offer Tag',
            'label' => __('Offer Tag', 'wpew'),
            'desc_tip' => 'true'
        )
    );
    echo '</div>';
}
    
// Save Fields
add_action('woocommerce_process_product_meta', 'wpew_product_custom_fields_save');
function wpew_product_custom_fields_save($post_id)
{
    // Offer Tag
    $woocommerce_wpew_offertag_text_field = $_POST['wpew_offertag_text_field'];
    update_post_meta($post_id, 'wpew_offertag_text_field', esc_attr($woocommerce_wpew_offertag_text_field));
}



/*-------------------------------------------*
 *      WPEW Pagination
 *------------------------------------------- */
if(!function_exists('wpew_pagination')):
    function wpew_pagination( $page_numb , $max_page ){
        $pagination = paginate_links( array(
            'base'          => get_pagenum_link(1) . '%_%',
            'format'        => '?paged=%#%',
            'type'          => 'array', 
            'current'       => $page_numb,
            'total'         => $max_page,
            'prev_text'     => '<span class="flaticon-left-arrow"></span>',
            'next_text'     => '<span class="flaticon-chevron"></span>',
        )); ?>

        <?php if ( ! empty( $pagination ) ) { ?>
            <ul class="page_navigation">
                <?php foreach ( $pagination as $page_link ) : ?>
                    <li class="page-item <?php if ( strpos( $page_link, 'current' ) !== false ) { echo 'active'; } ?>">
                        <?php echo wp_kses_post($page_link); ?>
                    </li>
                <?php endforeach ?>
            </ul>
        <?php 
        }
    }
endif;
