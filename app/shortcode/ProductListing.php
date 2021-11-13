<?php
namespace XEWC\shortcode;

defined( 'ABSPATH' ) || exit;

class Product_Listing {

    function __construct() {
        add_shortcode( 'product_listing', array( $this, 'products_callback_function' ) );
    }

    function products_callback_function( $atts, $shortcode ) {

		$order = get_option( 'wp_product_list_order', 'desc' );
        $post_limit = get_option( 'wp_number_of_product', 9 );
		$column_number = get_option( 'wp_number_of_coulmn', 4 );
		$category = get_option( 'wp_xewc_product_category', false );
		$page_numb = max(1, get_query_var('paged'));
		
        $atts = shortcode_atts( array(
            'number' => $post_limit,
            'column' => $column_number,
        ), $atts );

        $args = array(
            'post_type'      => 'product',
			'order' 		 => $order,
            'posts_per_page' => $atts['number'],
			'paged'             => $page_numb
        );
		ob_start();

        $query = new \WP_Query($args); 
		global $post, $product; ?>

        <div class="woocommerce">
			<ul class="products columns-<?php echo $atts['column']; ?>">
				<?php if ( $query->have_posts() ) : ?>
					<?php while ( $query->have_posts() ) : $query->the_post(); 
						$product = new \WC_Product(get_the_ID());
						$price_html = $product->get_price_html();
						$cats = get_the_term_list( get_the_ID(), 'product_cat' );
						?>
						<li class="product"> 
							<div class="inner">
								<div class="product-img">
									<a href="<?php the_permalink(); ?>">
										<?php if ( $product->is_on_sale() ) : ?>
											<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
										<?php endif; ?>
										<?php the_post_thumbnail('woocommerce_thumbnail', array('class' => 'img-fluid')); ?>
									</a>
								</div>
								<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<?php if($category == 'true') { ?>
									<span class="category"><?php echo $cats; ?></span>
								<?php } ?>
								<div class="price-box">
									<span class="product-price"><?php echo $price_html; ?></span>
								</div>
								<div class="content">
									<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
								</div>
							</div>
						</li>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				<?php endif; ?>
			</ul>
			<?php echo xewc_function()->get_pagination($page_numb, $query->max_num_pages); ?>
        </div>
        <?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
    }
}
