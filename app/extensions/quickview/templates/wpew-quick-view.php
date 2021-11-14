<?php
/**
 * Quick view.
 *
 * @author  WPEW
 * @package WPEW WooCommerce Quick View
 * @version 1.0.0
 */

defined( 'WPEW_QUICK_VIEW' ) || exit; // Exit if accessed directly.

?>

<div id="wpew-quick-view-modal">
	<div class="wpew-quick-view-overlay"></div>
	<div class="wpew-wcqv-wrapper">
		<div class="wpew-wcqv-main">
			<div class="wpew-wcqv-head">
				<a href="#" id="wpew-quick-view-close" class="wpew-wcqv-close">X</a>
			</div>
			<div id="wpew-quick-view-content" class="woocommerce single-product"></div>
		</div>
	</div>
</div>
<?php
