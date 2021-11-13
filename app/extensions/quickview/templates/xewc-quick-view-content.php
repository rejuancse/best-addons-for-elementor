<?php
/**
 * Quick view content.
 *
 * @author  XEWC
 * @package XEWC WooCommerce Quick View
 * @version 1.0.0
 */

defined( 'XEWC_QUICK_VIEW' ) || exit; // Exit if accessed directly.

while ( have_posts() ) :
	the_post();
	?>

	<div class="product">

		<div id="product-<?php the_ID(); ?>" <?php post_class( 'product' ); ?>>

			<?php do_action( 'xewc_quickview_product_image' ); ?>

			<div class="summary entry-summary">
				<div class="summary-content">
					<?php do_action( 'xewc_quickview_product_summary' ); ?>
				</div>
			</div>

		</div>

	</div>
	<?php
endwhile; // end of the loop.
