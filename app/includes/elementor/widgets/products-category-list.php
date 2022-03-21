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

		/**
		 * All Categories Style
		 */
		$this->start_controls_section(
			'all_categories_title_style',
			[
				'label' 	=> __( 'ALL Categories', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'all_category_text_color',
			[
				'label'		=> __( 'All Category Text Color', 'eafe' ),
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
				'label' 	=> __( 'Categories List Style', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'all_category_list_color',
			[
				'label'		=> __( 'Category Text Color', 'eafe' ),
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
				'label' 	=> __( 'Megamenu Style', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'all_category_megamenu_color',
			[
				'label'		=> __( 'Megamenu Color', 'eafe' ),
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
								$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'large') : ''; ?>
					
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
				<h3><?php esc_html_e('You need to install or activate woocommer plugin', 'eafe'); ?></h3>
			</div>
		<?php }
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Products_Category_List() );
