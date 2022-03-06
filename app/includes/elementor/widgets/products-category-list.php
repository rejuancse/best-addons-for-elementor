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
		$category_orderby = $settings['category_orderby'];
        
        $parent_terms = get_terms( 
            'product_cat', 
            array( 
                'parent' => 0, 
                'number' => $category_limit, 
                'order' => $category_order, 
                'orderby' => $category_orderby, 
                'hide_empty' => true 
            ) 
        ); ?>

        <div class="wpew-category-list">
            <div class="wpew-row"> 
                <?php
                    $i = 0;
                    if ( ! empty( $parent_terms ) && ! is_wp_error( $parent_terms ) ){ 
                        foreach ( $parent_terms as $pterm ) { 

                            $url = get_term_link($pterm->slug, 'product_cat'); 
                            $image_id = get_term_meta( $pterm->term_id, 'image_id', true );
                            $image_url = wp_get_attachment_url( $image_id );

                            $terms = get_terms('product_cat', array( 'parent' => $pterm->term_id, 'orderby' => 'title', 'hide_empty' => true ) );?>

                            <?php if ( $i === 0 ) { ?>
                                <div class="wpew-col-6 first category-grid-item cat-design-default categories-with-shadow product-category product first">
                                    <div class="wrapp-category">
                                        <div class="category-image-wrapp">
                                            <a href="https://woodmart.xtemos.com/product-category/furniture/" class="category-image">
                                                <picture class="wd-lazy-load woodmart-lazy-load wd-lazy-fade wd-loaded" data-wood-src="https://z9d7c4u6.rocketcdn.me/wp-content/uploads/2016/06/cat-23-860x860.jpg">
                                                    <source type="image/webp" srcset="https://z9d7c4u6.rocketcdn.me/wp-content/uploads/2016/06/cat-23-860x860.jpg">
                                                    <img src="https://z9d7c4u6.rocketcdn.me/wp-content/uploads/2016/06/cat-23-860x860.jpg" data-wood-src="https://z9d7c4u6.rocketcdn.me/wp-content/uploads/2016/06/cat-23-860x860.jpg" alt="Furniture" width="860" height="860">
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="hover-mask">
                                            <h3 class="wd-entities-title category-title"> Furniture <mark class="count">(22)</mark>
                                            </h3>
                                            <div class="more-products">
                                                <a href="https://woodmart.xtemos.com/product-category/furniture/">22 products</a>
                                            </div>
                                        </div>
                                        <a href="https://woodmart.xtemos.com/product-category/furniture/" class="category-link wd-fill" aria-label="Product category furniture"></a>
                                    </div>
                                </div>
                            <?php }else { ?>

                                <?php if ($i==1): ?>	
                                <div class="col-sm-6 section-content-second">
                                    <div class="wpew-row">
                                <?php endif ?>
                                        
                                        <div class="wpew-col-6  category-grid-item cat-design-default categories-with-shadow product-category product">
                                            <div class="wrapp-category">
                                                <div class="category-image-wrapp">
                                                    <a href="https://woodmart.xtemos.com/product-category/clocks/" class="category-image">
                                                        <picture class="wd-lazy-load woodmart-lazy-load wd-lazy-fade wd-loaded" data-wood-src="https://z9d7c4u6.rocketcdn.me/wp-content/uploads/2016/06/cat-klock-430x430.jpg">
                                                            <source type="image/webp" srcset="https://z9d7c4u6.rocketcdn.me/wp-content/uploads/2016/06/cat-klock-430x430.jpg">
                                                            <img src="https://z9d7c4u6.rocketcdn.me/wp-content/uploads/2016/06/cat-klock-430x430.jpg" data-wood-src="https://z9d7c4u6.rocketcdn.me/wp-content/uploads/2016/06/cat-klock-430x430.jpg" alt="Clocks" width="430" height="430">
                                                        </picture>
                                                    </a>
                                                </div>
                                                <div class="hover-mask">
                                                    <h3 class="wd-entities-title category-title"> Clocks <mark class="count">(12)</mark>
                                                    </h3>
                                                    <div class="more-products">
                                                        <a href="https://woodmart.xtemos.com/product-category/clocks/">12 products</a>
                                                    </div>
                                                </div>
                                                <a href="https://woodmart.xtemos.com/product-category/clocks/" class="category-link wd-fill" aria-label="Product category clocks"></a>
                                            </div>
                                        </div>

                                <?php 
                                $cunt_nbr = $i+1; 
                                if ($cunt_nbr == $category_limit): ?>
                                    </div>
                                </div>
                                <?php endif ?>	
                            <?php } $i++; ?>
                    <?php } 
                    } 
                ?>
                
            </div>
        </div>
	<?php 
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Products_Category_List() );
