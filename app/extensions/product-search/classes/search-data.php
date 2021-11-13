<?php
define('WP_USE_THEMES', false);
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $parse_uri[0].'wp-load.php';
require_once($wp_load);

$search_image = get_option( 'wp_product_search_image', true);

if(isset($_POST['raw_data'])){
	$row_data = $_POST['raw_data'];
	$args = array(
		'post_type' => 'product',
		's'					=> $row_data,
		'posts_per_page' 	=> 10
	);

    $search_data = new \WP_Query($args);

    $output 	= '';

    if(!empty($row_data)){
        if($search_data->have_posts()){
            $output .= '<ul class="xewc-productss-search results-list">';
            while ($search_data->have_posts()): $search_data->the_post();
                $output .= '<li>';
                    $output .= '<div class="pack-thumb">';
                        if($search_image == 'true') { 
                            $output .= get_the_post_thumbnail($search_data->post->ID, 'thumbnail');
                        }
                        $output .= '<span><a href="'.get_permalink().'">'.get_the_title().'</a></span>';
                    $output .= '</div>';
                $output .= '</li>';
            endwhile;
            $output .= '</ul>';
            wp_reset_postdata();
        }
    }
    echo $output;
}
