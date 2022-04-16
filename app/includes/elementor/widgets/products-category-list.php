<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Products_Category_List extends Widget_Base {

	public function get_name() {
		return 'products-category-list';
	}

	public function get_title() {
		return __( 'Products Category List', 'eafe' );
	}

	public function get_icon() {	
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'eafe-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Product Category List', 'eafe' ),
			]
		);

		$this->add_control(
            'coulmn_number',
            [
                'label'     => __( 'Coulmn Number', 'eafe' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => '71',
                'options'   => [
                        '12' 	=> __( 'Column 1', 'eafe' ),
                        '6' 	=> __( 'Column 2', 'eafe' ),
						'4' 	=> __( 'Column 3', 'eafe' ),
                        '3' 	=> __( 'Column 4', 'eafe' ),
                        '2' 	=> __( 'Column 6', 'eafe' ),
						'71'	=> __( 'Column 7', 'eafe' ),
                    ],
            ]
        );

		$this->add_control(
            'category_limit',
            [
                'label' 		=> __( 'Category Limit', 'eafe' ),
                'type' 			=> Controls_Manager::NUMBER,
                'label_block' 	=> false,
                'default' 		=> '7',
            ]
        );

		$this->add_control(
			'category_order',
			[
				'label'     => __( 'Order', 'eafe' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'DESC',
				'options'   => [
						'DESC' 		=> __( 'Descending', 'eafe' ),
						'ASC' 		=> __( 'Ascending', 'eafe' ),
					],
			]
	  	);

        $this->end_controls_section();

		# Categories product title text style
		$this->start_controls_section(
			'categories_text_style',
			[
				'label' 	=> __( 'Categories Text Style', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Categories product title text color
		$this->add_control(
			'categories_text_color',
			[
				'label'		=> __( 'Category Text Color', 'eafe' ),
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
				'label'		=> __( 'Category Text Hover Color', 'eafe' ),
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
				'label'		=> __( 'Category Text Typography', 'eafe' ),
				'name' 		=> 'categories_text_typography',
				'selector' 	=> '{{WRAPPER}} .iconbox .details .title',
			]
		);

		# Categories product title text spacing
		$this->add_responsive_control(
			'categories_text_spacing',
			[
				'label' => esc_html__( 'Spacing', 'eafe' ),
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
				'label' 	=> __( 'Products Count Style', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Categories product number text color
		$this->add_control(
			'categories_product_number_text_color',
			[
				'label'		=> __( 'Count Products Text Color', 'eafe' ),
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
				'label'		=> __( 'Typography', 'eafe' ),
				'name' 		=> 'count_product_typography',
				'selector' 	=> '{{WRAPPER}} .header-carousel .details p',
			]
		);

		$this->end_controls_section();

		# Categories Images Style
		$this->start_controls_section(
			'categories_image_style',
			[
				'label' 	=> __( 'Category Image Style', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Image border color
		$this->add_control(
			'categories_image_border_color',
			[
				'label'		=> __( 'Border Color', 'eafe' ),
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
				'label'		=> __( 'Border Hover Color', 'eafe' ),
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
				'label' => esc_html__( 'Border Radius', 'eafe' ),
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
				'label' => esc_html__( 'Image Size', 'eafe' ),
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
                'label' 		=> __( 'Padding', 'eafe' ),
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
					'number' 		=> $category_limit, 
					'order' 		=> $category_order,
					'hide_empty' 	=> true 
				) 
			); ?>

			<div class="header-carousel position-relative">
				<div class="eafe-row">
					<?php
						if ( ! empty( $parent_terms ) && ! is_wp_error( $parent_terms ) ){ 
							foreach ( $parent_terms as $pterm ) { 
								$terms = get_terms('product_cat', array( 'parent' => $pterm->term_id, 'orderby' => 'title', 'hide_empty' => true ) );
								$image_id = get_term_meta($pterm->term_id, 'thumbnail_id', true );
								$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : ''; ?>
					
								<div class="eafe-col-<?php echo $coulmn_number; ?>">
									<div class="item">
										<a href="<?php echo get_term_link($pterm->term_id); ?>">
											<div class="iconbox">
												<div class="icon">
													<img src="<?php echo esc_url($image_url); ?>" alt="">
												</div>
												<div class="details">
													<h5 class="title"><?php echo esc_html($pterm->name); ?></h5>
													<p><?php echo esc_html($pterm->count).' '.__('Products', 'eafe'); ?></p>
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
					<?php esc_html_e('You need to install or activate woocommer plugin', 'eafe'); ?>
					<a href="<?php echo esc_url(home_url()); ?>/wp-admin/plugin-install.php?s=woocommerce&tab=search"><?php esc_html_e('Install Woocommer', 'eafe'); ?></a>
				</h3>
			</div>
		<?php }
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Products_Category_List() );
