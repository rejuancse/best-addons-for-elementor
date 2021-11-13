<?php
/**
 * Quick view.
 *
 * @author  XEWC
 * @package XEWC WooCommerce Quick View
 * @version 1.0.0
 */

defined( 'XEWC_QUICK_VIEW' ) || exit; // Exit if accessed directly.

?>

<div id="xewc-quick-view-modal">
	<div class="xewc-quick-view-overlay"></div>
	<div class="xewc-wcqv-wrapper">
		<div class="xewc-wcqv-main">
			<div class="xewc-wcqv-head">
				<a href="#" id="xewc-quick-view-close" class="xewc-wcqv-close">X</a>
			</div>
			<div id="xewc-quick-view-content" class="woocommerce single-product"></div>
		</div>
	</div>
</div>
<?php
