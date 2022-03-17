<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Products_Category_List extends Widget_Base {

	public function get_name() {
		return 'products-category-list';
	}

	public function get_title() {
		return __( 'Products Category List', 'wpew' );
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
				'label' => __( 'Product Category List', 'wpew' ),
			]
		);

		$this->add_control(
            'coulmn_number',
            [
                'label'     => __( 'Coulmn Number', 'wpew' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => '6',
                'options'   => [
                        '1' 	=> __( 'Column 1', 'wpew' ),
                        '2' 	=> __( 'Column 2', 'wpew' ),
						'3' 	=> __( 'Column 3', 'wpew' ),
                        '4' 	=> __( 'Column 4', 'wpew' ),
						'5' 	=> __( 'Column 5', 'wpew' ),
                        '6' 	=> __( 'Column 6', 'wpew' ),
						'7' 	=> __( 'Column 7', 'wpew' ),
                        '8' 	=> __( 'Column 8', 'wpew' ),
                    ],
            ]
        );

		$this->add_control(
            'category_limit',
            [
                'label' 		=> __( 'Category Limit', 'wpew' ),
                'type' 			=> Controls_Manager::NUMBER,
                'label_block' 	=> false,
                'default' 		=> '5',
            ]
        );

		$this->add_control(
			'category_order',
			[
				'label'     => __( 'Order', 'wpew' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'DESC',
				'options'   => [
						'DESC' 		=> __( 'Descending', 'wpew' ),
						'ASC' 		=> __( 'Ascending', 'wpew' ),
					],
			]
	  	);

        $this->end_controls_section();

		/**
		 * All Categories Style
		 */
		$this->start_controls_section(
			'all_categories_title_style',
			[
				'label' 	=> __( 'ALL Categories', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'all_category_text_color',
			[
				'label'		=> __( 'All Category Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .animated-headine .headline' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		# End All Categories

		/**
		 * All Categories List Style
		 */
		$this->start_controls_section(
			'all_categories_list_style',
			[
				'label' 	=> __( 'Categories List Style', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'all_category_list_color',
			[
				'label'		=> __( 'Category Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .animated-headine .headline' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		# End All Categories List

		/**
		 * All Categories Megamenu Style
		 */
		$this->start_controls_section(
			'all_categories_megamenu_style',
			[
				'label' 	=> __( 'Megamenu Style', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'all_category_megamenu_color',
			[
				'label'		=> __( 'Megamenu Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .animated-headine .headline' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		# End All Categories megamenu
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
					'parent' => 0, 
					'number' => $category_limit, 
					'order' => $category_order,
					'hide_empty' => true 
				) 
			); ?>

			<div class="header-carousel position-relative">
				<div class="wpew-row">
					<?php
						$i = 0;
						if ( ! empty( $parent_terms ) && ! is_wp_error( $parent_terms ) ){ 
							foreach ( $parent_terms as $pterm ) { 

								$terms = get_terms('product_cat', array( 'parent' => $pterm->term_id, 'orderby' => 'title', 'hide_empty' => true ) );
								$image_id = get_term_meta($pterm->term_id, 'thumbnail_id', true );
								$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'large') : ''; ?>
					
								<div class="wpew-col-<?php echo $coulmn_number; ?>">
								<div class="item">
									<a href="<?php echo get_term_link($pterm->term_id); ?>">
										<div class="iconbox">
											<div class="icon">
												<img src="<?php echo esc_url($image_url); ?>" alt="">
											</div>
											<div class="details">
												<h5 class="title"><?php echo esc_html($pterm->name); ?></h5>
												<p><?php echo esc_html($pterm->count).' '.__('Products', 'wpew'); ?></p>
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
				<h3>You need to install or activate woocommer plugin</h3>
				<p><a href="#">Woocommerce enable</a></p>
			</div>
		<?php }
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Products_Category_List() );
