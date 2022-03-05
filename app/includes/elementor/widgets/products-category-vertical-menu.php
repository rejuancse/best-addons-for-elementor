<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Products_Category_Vertical_Menu extends Widget_Base {
	public function get_name() {
		return 'products-category-vertical-menu';
	}

	public function get_title() {
		return __( 'Products Category Vertical Menu', 'wpew' );
	}

	public function get_icon() {	
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'wpew-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Category List', 'wpew' ),
			]
		);

		$this->add_control(
			'photogallery',
			[
				'label' => esc_html__( 'Add Images', 'wpew' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
				'show_label' => false,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
            'gallery_column',
            [
                'label'     => __( 'Number of Column', 'wpew' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 4,
                'options'   => [
                        '12' 	=> __( 'One Column', 'wpew' ),
                        '6' 	=> __( 'Two Column', 'wpew' ),
                        '4' 	=> __( 'Three Column', 'wpew' ),
                        '3' 	=> __( 'Four Column', 'wpew' ),
                    ],
            ]
        );

		$this->add_responsive_control(
			'gallery_border',
			[
				'label' => esc_html__( 'Border Radius', 'wpew' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wpew-photo-gallery .popup-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'image_overlay_color',
			[
				'label'		=> __( 'Background Overlay', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpew-photo-gallery .popup-image:before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'image_overlay_hover_color',
			[
				'label'		=> __( 'Background Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpew-photo-gallery .popup-image:hover:before' => 'background: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings(); 

		$gallery_column = $settings['gallery_column'];

		?>

		<div class="posr logo1">
			<div id="mega-menu">
				<div class="btn-mega">
					<span class="pre_line"></span>
					<span class="ctr_title"><?php echo esc_html('ALL CATEGORIES', 'freshen'); ?></span>
					<i class="fa fa-angle-down icon"></i>
				</div>
				<ul class="menu">
					<?php
						$parent_terms = get_terms( 'product_cat', array( 'parent' => 0, 'orderby' => 'id', 'hide_empty' => true ) );  
						if ( ! empty( $parent_terms ) && ! is_wp_error( $parent_terms ) ){ 
							foreach ( $parent_terms as $pterm ) { 
								$url = get_term_link($pterm->slug, 'product_cat'); 
								$flaticons = get_term_meta( $pterm->term_id, 'flaticon-list', true );
								$offer_intro = get_term_meta( $pterm->term_id, 'freshen_offer_intro', true );
								$offer_title = get_term_meta( $pterm->term_id, 'freshen_offer_title', true );
								$image_id = get_term_meta( $pterm->term_id, 'image_id', true );
								$image_url = wp_get_attachment_url( $image_id );

								$terms = get_terms('product_cat', array( 'parent' => $pterm->term_id, 'orderby' => 'id', 'hide_empty' => true ) );?>

								<li>
									<a class="<?php echo (!empty($terms) ? 'dropdown' : ''); ?>" href="<?php echo esc_url($url); ?>">
										<?php if(!empty($flaticons)) { ?>
											<span class="menu-icn flaticon-<?php echo get_term_meta( $pterm->term_id, 'flaticon-list', true ); ?>"></span>
										<?php } ?>
										<span class="menu-title"><?php echo esc_html($pterm->name); ?></span>
									</a>

									<?php 		
									if(isset($terms) && !empty($terms)) { ?>
										<div class="drop-menu">
											<div class="one-third">
												
												<div class="cat-list">
													<div class="cat-title"><?php echo esc_html($pterm->name); ?></div>
													<ul class="mb0">
														<?php
															foreach ( $terms as $term ) {
																echo '<li><a href="' . get_term_link( $term ) . '">' . esc_html($term->name) . '</a></li>';   
															}
														?>
													</ul>
												</div>

												<?php if( ! empty( $offer_intro ) || ! empty( $offer_title ) ) { ?>
													<div class="product-offer">
														<div class="fresh-fruit">
															<p><?php echo esc_html($offer_intro); ?></p>
															<h3 class="title"><?php echo $offer_title; ?></h3>
														</div>
														<div class="show">
															<a href="<?php echo esc_url($url); ?>"><?php echo esc_html_e('SHOP NOW', 'freshen'); ?></a>
														</div>
													</div>
												<?php } ?>
											</div>
											<?php if( ! empty( $image_url ) ) { ?>
												<div class="fruit_thumg">
													<img src="<?php echo esc_url($image_url); ?>" alt="menu-fruit.png" />
												</div>
											<?php } ?>
										</div>
									<?php } ?>
								</li>
						<?php } 
						} 
					?>
				</ul>
			</div>
		</div>

	<?php 
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Products_Category_Vertical_Menu() );
