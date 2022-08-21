<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class BAFE_Widget_Products_Category_List extends Widget_Base {

	public function get_name() {
		return 'products-category-list';
	}

	public function get_title() {
		return __( 'Products Category List', 'bafe' );
	}

	public function get_icon() {	
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'bafe-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Product Category List', 'bafe' ),
			]
		);

		$this->add_control(
            'coulmn_number',
            [
                'label'     => __( 'Coulmn Number', 'bafe' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => '3',
                'options'   => [
                        '12' 	=> __( 'Column 1', 'bafe' ),
                        '6' 	=> __( 'Column 2', 'bafe' ),
						'4' 	=> __( 'Column 3', 'bafe' ),
                        '3' 	=> __( 'Column 4', 'bafe' ),
                        '2' 	=> __( 'Column 6', 'bafe' ),
						'71'	=> __( 'Column 7', 'bafe' ),
                    ],
            ]
        );

		$this->add_control(
            'category_limit',
            [
                'label' 		=> __( 'Category Limit', 'bafe' ),
                'type' 			=> Controls_Manager::NUMBER,
                'label_block' 	=> false,
                'default' 		=> '4',
            ]
        );

		$this->add_control(
			'category_order',
			[
				'label'     => __( 'Order', 'bafe' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'DESC',
				'options'   => [
						'DESC' 		=> __( 'Descending', 'bafe' ),
						'ASC' 		=> __( 'Ascending', 'bafe' ),
					],
			]
	  	);

        $this->end_controls_section();

		# Categories product title text style
		$this->start_controls_section(
			'categories_text_style',
			[
				'label' 	=> __( 'Categories Text Style', 'bafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Categories product title text color
		$this->add_control(
			'categories_text_color',
			[
				'label'		=> __( 'Category Text Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iconbox .details .title' => 'color: {{VALUE}};',
				],
			]
		);

		# Categories product title text hover color
		$this->add_control(
			'categories_text_hover_color',
			[
				'label'		=> __( 'Category Text Hover Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .iconbox .details .title:hover' => 'color: {{VALUE}};',
				],
			]
		);

		# Categories product title text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Category Text Typography', 'bafe' ),
				'name' 		=> 'categories_text_typography',
				'selector' 	=> '{{WRAPPER}} .iconbox .details .title',
			]
		);

		# Categories product title text spacing
		$this->add_responsive_control(
			'categories_text_spacing',
			[
				'label' => esc_html__( 'Spacing', 'bafe' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .iconbox .details .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		# End All Categories

		# Categories product style
		$this->start_controls_section(
			'categories_product_style',
			[
				'label' 	=> __( 'Products Count Style', 'bafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Categories product number text color
		$this->add_control(
			'categories_product_number_text_color',
			[
				'label'		=> __( 'Count Products Text Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-carousel .details p' => 'color: {{VALUE}};',
				],
			]
		);

		# Categories product number text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Typography', 'bafe' ),
				'name' 		=> 'count_product_typography',
				'selector' 	=> '{{WRAPPER}} .header-carousel .details p',
			]
		);

		$this->end_controls_section();

		# Categories Images Style
		$this->start_controls_section(
			'categories_image_style',
			[
				'label' 	=> __( 'Category Image Style', 'bafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Image border color
		$this->add_control(
			'categories_image_border_color',
			[
				'label'		=> __( 'Border Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-carousel .iconbox .icon' => 'border-color: {{VALUE}};',
				],
			]
		);

		# Image border hover color
		$this->add_control(
			'categories_image_border_hover_color',
			[
				'label'		=> __( 'Border Hover Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-carousel .iconbox .icon:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		# Image border radius
		$this->add_responsive_control(
			'categories_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bafe' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .header-carousel .iconbox .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		# Image size
		$this->add_control(
			'category_image_width',
			[
				'label' => esc_html__( 'Image Size', 'bafe' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .header-carousel .iconbox .icon img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		# Image padding
		$this->add_responsive_control(
            'categories_image_padding',
            [
                'label' 		=> __( 'Padding', 'bafe' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .header-carousel .iconbox .icon img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before', 
            ]
        );

		$this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings(); 
		$coulmn_number = $settings['coulmn_number'];
		$category_limit = $settings['category_limit'];
		$category_order = $settings['category_order'];

		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			$parent_terms = get_terms( 
				'product_cat', 
				array( 
					'parent' 		=> 0, 
					'number' 		=> esc_html($category_limit), 
					'order' 		=> esc_html($category_order),
					'hide_empty' 	=> true 
				) 
			); ?>

			<div class="header-carousel position-relative">
				<div class="bafe-row">
					<?php
						if ( ! empty( $parent_terms ) && ! is_wp_error( $parent_terms ) ){ 
							foreach ( $parent_terms as $pterm ) { 
								$terms = get_terms('product_cat', array( 'parent' => $pterm->term_id, 'orderby' => 'title', 'hide_empty' => true ) );
								$image_id = get_term_meta($pterm->term_id, 'thumbnail_id', true );
								$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : ''; ?>
					
								<div class="bafe-col-<?php echo esc_attr($coulmn_number); ?>">
									<div class="item">
										<a href="<?php echo get_term_link($pterm->term_id); ?>">
											<div class="iconbox">
												<div class="icon">
													<img src="<?php echo esc_url($image_url); ?>" alt="">
												</div>
												<div class="details">
													<h5 class="title"><?php echo esc_html($pterm->name); ?></h5>
													<p><?php echo esc_html($pterm->count).' '.__('Products', 'bafe'); ?></p>
												</div>
											</div>
										</a>
									</div>
								</div>
							<?php 
							} 
						} 
					?>
				</div>
			</div>
		<?php
		} else { ?>
			<div class="info-woo">
				<h3>
					<?php esc_html_e('You need to install or activate woocommer plugin', 'bafe'); ?>
					<a href="<?php echo esc_url(home_url()); ?>/wp-admin/plugin-install.php?s=woocommerce&tab=search"><?php esc_html_e('Install Woocommer', 'bafe'); ?></a>
				</h3>
			</div>
		<?php }
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new BAFE_Widget_Products_Category_List() );
