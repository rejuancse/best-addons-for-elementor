<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Products_Category_Vertical_Menu extends Widget_Base {

	public function get_name() {
		return 'products-category-vertical-menu';
	}

	public function get_title() {
		return __( 'Products Category Menu', 'wpew' );
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
            'category_heading',
            [
                'label' => __( 'Category Heading', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'ALL CATEGORIES', 'wpew' ),
            ]
        );

		$this->add_control(
            'category_limit',
            [
                'label' 		=> __( 'Category Limit', 'wpew' ),
                'type' 			=> Controls_Manager::NUMBER,
                'label_block' 	=> true,
                'default' 		=> '11',
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

		$this->add_control(
			'category_orderby',
			[
				'label'     => __( 'Orderby', 'wpew' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'title',
				'options'   => [
						'title' 		=> __( 'Title', 'wpew' ),
						'name' 		=> __( 'Name', 'wpew' ),
						'date' 		=> __( 'Date', 'wpew' ),
						'rand' 		=> __( 'Rand', 'wpew' ),
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
		$category_heading = $settings['category_heading'];
		$category_limit = $settings['category_limit'];
		$category_order = $settings['category_order'];
		$category_orderby = $settings['category_orderby']; ?>

		<div class="posr logo1">
			<div id="wpew-mega-menu">
				<div class="btn-mega">
					<span class="pre_line"></span>
					<span class="ctr_title"><?php echo $category_heading; ?></span>
					<i class="flaticon-down-arrow icon"></i>
				</div>
				<ul class="menu">
					<?php
						$parent_terms = get_terms( 
											'product_cat', 
											array( 
												'parent' => 0, 
												'number' => $category_limit, 
												'order' => $category_order, 
												'orderby' => $category_orderby, 
												'hide_empty' => true 
											) 
										);  
						if ( ! empty( $parent_terms ) && ! is_wp_error( $parent_terms ) ){ 
							foreach ( $parent_terms as $pterm ) { 
								$url = get_term_link($pterm->slug, 'product_cat'); 
								$flaticons = get_term_meta( $pterm->term_id, 'flaticon-list', true );
								$offer_intro = get_term_meta( $pterm->term_id, 'wpew_offer_intro', true );
								$offer_title = get_term_meta( $pterm->term_id, 'wpew_offer_title', true );
								$image_id = get_term_meta( $pterm->term_id, 'image_id', true );
								$image_url = wp_get_attachment_url( $image_id );

								$terms = get_terms('product_cat', array( 'parent' => $pterm->term_id, 'orderby' => 'title', 'hide_empty' => true ) );?>

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
															<a href="<?php echo esc_url($url); ?>"><?php echo esc_html_e('SHOP NOW', 'wpew'); ?></a>
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
