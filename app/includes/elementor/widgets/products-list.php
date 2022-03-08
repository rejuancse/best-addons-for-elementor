<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_WPEW_Products_List extends Widget_Base {
	public function get_name() {
		return 'products-list';
	}

	public function get_title() {
		return __( 'Products List', 'wpew' );
	}

	public function get_icon() {
		return 'eicon-site-title';
	}

	public function get_categories() {
		return [ 'wpew-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Title Element', 'wpew' )
            ]
        );

        # Product type title
        $this->add_control(
            'product_type_title_text',
            [
                'label' => __( 'Product Type Title Text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter heading', 'wpew' ),
                'default' => __( 'Fruits', 'wpew' ),
            ]
        );

        # Product title text
        $this->add_control(
            'product_title_text',
            [
                'label' => __( 'Product Title Text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter heading', 'wpew' ),
                'default' => __( 'Pineapple (Tropical Gold)', 'wpew' ),
            ]
        );

        # Product quantity text
		$this->add_control(
            'product_quantity_text',
            [
                'label' => __( 'Product Quantity Text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title two', 'wpew' ),
                'default' => __( '1 lb', 'wpew' ),
            ]
        );

        # Product price text
		$this->add_control(
            'product_price_text',
            [
                'label' => __( 'Product Price Text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title two', 'wpew' ),
                'default' => __( '2.00', 'wpew' ),
            ]
        );

		$this->add_control(
			'headine_size',
			[
				'label' => esc_html__( 'HTML Tag', 'wpew' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'wpew' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'wpew' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpew' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'wpew' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'wpew' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();
        # Option End

        # Background
		$this->start_controls_section(
			'background_style',
			[
				'label' 	=> __( 'Background', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        # Product background color
		$this->add_control(
			'product_bgColor',
			[
				'label'		=> __( 'Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_item' => 'background: {{VALUE}};',
				],
			]
		);

        # Product background hover color
		$this->add_control(
			'product_hover_bgColor',
			[
				'label'		=> __( 'Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_item:hover' => 'background: {{VALUE}};',
				],
			]
		);

		# Product background border hover color
		$this->add_control(
			'product_border_hover_Color',
			[
				'label'		=> __( 'Hover Border Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_item:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'product_border_hover_radius',
			[
				'label' => esc_html__( 'Hover Border Radius', 'wpew' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .shop_item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        # offer
        $this->start_controls_section(
			'offer_title_style',
			[
				'label' 	=> __( 'Offer Title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Offer title background color
		$this->add_control(
			'offer_title_bgColor',
			[
				'label'		=> __( 'Background Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_item .offer_badge ul li a.offr_tag' => 'background: {{VALUE}};',
				],
			]
		);
	
		# Offer title background hover color
		$this->add_control(
			'offer_title_hover_bgColor',
			[
				'label'		=> __( 'Backgournd Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_item .offer_badge ul li a.offr_tag:hover' => 'background: {{VALUE}};',
				],
			]
		);

        # Offer title text color
        $this->add_control(
			'offer_title_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_item .offer_badge ul li a.offr_tag' => 'color: {{VALUE}};',
				],
			]
		);

        # Offer title hover text color
        $this->add_control(
			'offer_title_hover_text_color',
			[
				'label'		=> __( 'Hover Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_item .offer_badge ul li a.offr_tag:hover' => 'color: {{VALUE}};',
				],
			]
		);

        # Offer title text typography
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Typography', 'wpew' ),
				'name' 		=> 'offer_typography',
				'selector' 	=> '{{WRAPPER}} .shop_item .offer_badge ul li a.offr_tag',
			]
		);

		# Offer border radius
		$this->add_responsive_control(
			'offer_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpew' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .shop_item .offer_badge ul li a.offr_tag' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_responsive_control(
			'offer_title_space',
			[
				'label' => esc_html__( 'Spacing', 'wpew' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 12,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .shop_item .offer_badge ul li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

		// discount
		$this->start_controls_section(
			'offer_discount_style',
			[
				'label' 	=> __( 'Offer Discount', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Discount title background color
		$this->add_control(
			'discount_title_bgColor',
			[
				'label'		=> __( 'Background Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_item .offer_badge ul li a.comison_rate' => 'background: {{VALUE}};',
				],
			]
		);
	
		# Discount title background hover color
		$this->add_control(
			'discount_title_hover_bgColor',
			[
				'label'		=> __( 'Backgournd Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_item .offer_badge ul li a.comison_rate:hover' => 'background: {{VALUE}};',
				],
			]
		);

        # Discount title text color
        $this->add_control(
			'discount_title_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_item .offer_badge ul li a.comison_rate' => 'color: {{VALUE}};',
				],
			]
		);

        # Discount title hover text color
        $this->add_control(
			'discount_title_hover_text_color',
			[
				'label'		=> __( 'Hover Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_item .offer_badge ul li a.comison_rate:hover' => 'color: {{VALUE}};',
				],
			]
		);

        # Discount title text typography
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Typography', 'wpew' ),
				'name' 		=> 'discount_typography',
				'selector' 	=> '{{WRAPPER}} .shop_item .offer_badge ul li a.comison_rate',
			]
		);

		# Discount border radius
		$this->add_responsive_control(
			'discount_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpew' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .shop_item .offer_badge ul li a.comison_rate' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		
		$this->end_controls_section();

		# Title
        $this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        # Product title text color
        $this->add_control(
			'product_title_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}};',
				],
			]
		);

        # Product title hover text color
        $this->add_control(
			'product_title_hover_text_color',
			[
				'label'		=> __( 'Hover Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title:hover' => 'color: {{VALUE}};',
				],
			]
		);

        # Product title text typography
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Typography', 'wpew' ),
				'name' 		=> 'product_title_text_typography',
				'selector' 	=> '{{WRAPPER}} .title',
			]
		);

		$this->add_responsive_control(
			'product_title_space',
			[
				'label' => esc_html__( 'Spacing', 'wpew' ),
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
					'{{WRAPPER}} .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

         # Icon
         $this->start_controls_section(
			'icon_style',
			[
				'label' 	=> __( 'Rating Icon', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        # Rating color
        $this->add_control(
			'rating_color',
			[
				'label'		=> __( 'Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .flaticon-star' => 'color: {{VALUE}};',
				],
			]
		);

        # Rating typography
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label'		=> __( 'Typography', 'wpew' ),
				'name' 		=> 'rating_typography',
				'selector' 	=> '{{WRAPPER}} .flaticon-star',
			]
		);

		$this->add_responsive_control(
			'rating_space',
			[
				'label' => esc_html__( 'Spacing', 'wpew' ),
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
					'{{WRAPPER}}  .review .mb0' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        # Sub-Title
        $this->start_controls_section(
			'sub_title_style',
			[
				'label' 	=> __( 'Sub-Title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        # Product Sub-title text color
        $this->add_control(
			'product_subtitle_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_item .details .sub_title' => 'color: {{VALUE}};',
				],
			]
		);

         # Product sub-title typography
         $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Typography', 'wpew' ),
				'name' 		=> 'subtitle_typography',
				'selector' 	=> '{{WRAPPER}} .shop_item .details .sub_title',
			]
		);


		$this->add_responsive_control(
			'subtitle_space',
			[
				'label' => esc_html__( 'Spacing', 'wpew' ),
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
					'{{WRAPPER}} .shop_item .details .sub_title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        # Price
        $this->start_controls_section(
			'price',
			[
				'label' 	=> __( 'Price', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        # Product price text color
        $this->add_control(
			'product_price_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price' => 'color: {{VALUE}};',
				],
			]
		);

        # Product price typography
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label'		=> __( 'Typography', 'wpew' ),
				'name' 		=> 'price_typography',
				'selector' 	=> '{{WRAPPER}} .price',
			]
		);


		$this->add_responsive_control(
			'price_space',
			[
				'label' => esc_html__( 'Spacing', 'wpew' ),
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
					'{{WRAPPER}} .price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();

        # Button style
        $this->start_controls_section(
			'button',
			[
				'label' 	=> __( 'Button', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        # Button background color
		$this->add_control(
			'button_bgColor',
			[
				'label'		=> __( 'Background Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-thm' => 'background: {{VALUE}};',
				],
			]
		);

        # Product hover background color
		$this->add_control(
			'button_hover_bgColor',
			[
				'label'		=> __( 'Background Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-thm:hover' => 'background: {{VALUE}};',
				],
			]
		);

        # Button text color
        $this->add_control(
			'button_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-thm' => 'color: {{VALUE}};',
				],
			]
		);

        # Button hover text color
        $this->add_control(
			'button_hover_text_color',
			[
				'label'		=> __( 'Hover Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-thm:hover' => 'color: {{VALUE}};',
				],
			]
		);

        # Product price typography
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label'		=> __( 'Typography', 'wpew' ),
				'name' 		=> 'button_typography',
				'selector' 	=> '{{WRAPPER}} .btn-thm',
			]
		);

        $this->end_controls_section();

        # Wist List style
        $this->start_controls_section(
			'wist_list_style',
			[
				'label' 	=> __( 'Wist List', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        # Wist list color
		$this->add_control(
			'wist_list_color',
			[
				'label'		=> __( 'Icon Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .flaticon-heart' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .flaticon-search' => 'color: {{VALUE}};',
					'{{WRAPPER}} .flaticon-shuffle' => 'color: {{VALUE}};',
				],
			]
		);

        # Wist list hover color
		$this->add_control(
			'wist_list_hover_color',
			[
				'label'		=> __( 'Icon Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .flaticon-heart:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .flaticon-search:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .flaticon-shuffle:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .shop_item .thumb_info ul li:hover' => 'border-color: {{VALUE}};',
				],
			]
		);


		$this->add_responsive_control(
			'wist_list_space',
			[
				'label' => esc_html__( 'Spacing', 'wpew' ),
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
					'{{WRAPPER}}  .shop_item .thumb_info ul li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

		# Pagination style
		$this->start_controls_section(
			'pagination_style',
			[
				'label' 	=> __( 'Pagination', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Pagination text color
		$this->add_control(
			'pagination_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .page-link' => 'color: {{VALUE}};',
				],
			]
		);

        # Pagination typography
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label'		=> __( 'Typography', 'wpew' ),
				'name' 		=> 'pagination_typography',
				'selector' 	=> '{{WRAPPER}} .page-link',
			]
		);

		# Pagination text color
		$this->add_control(
			'pagination_active_text_Color',
			[
				'label'		=> __( 'Active Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mbp_pagination ul.page_navigation li.active .page-link' => 'color: {{VALUE}};',
				],
			]
		);

		# Pagination text hover color
		$this->add_control(
			'pagination_active_text_hover_Color',
			[
				'label'		=> __( 'Active Text Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mbp_pagination ul.page_navigation li.active .page-link:hover' => 'color: {{VALUE}};',
				],
			]
		);

        # Pagination text background color
		$this->add_control(
			'pagination_text_bgColor',
			[
				'label'		=> __( 'Active Text Background Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mbp_pagination ul.page_navigation li.active .page-link' => 'background: {{VALUE}};',
				],
			]
		);


		$this->end_controls_section();


	}

	protected function render( ) {
		$settings = $this->get_settings();

        $product_type_title_text = $settings['product_type_title_text'];
        $product_title_text = $settings['product_title_text'];
        $product_quantity_text = $settings['product_quantity_text'];
        $product_price_text = $settings['product_price_text'];
	 
        ?>

        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="shop_item">
                <div class="thumb">
                    <div class="offer_badge">
                        <ul class="mb0">
                        <li><a class="offr_tag" href="#"><span>HOT</span></a></li>
                        <li><a class="comison_rate" href="#"><span>-4 %</span></a></li>
                        </ul>
                    </div>
                    <img src="https://creativelayers.net/themes/freshen-html/images/shop-items/fp1.png" alt="fp1.png">
                    <div class="thumb_info">
                        <ul class="mb0">
                            <li><a href="page-dashboard-wish-list.html"><span class="flaticon-heart"></span></a></li>
                            <li><a href="page-dashboard-wish-list.html"><span class="flaticon-search"></span></a></li>
                            <li><a href="page-shop-list-v6.html"><span class="flaticon-shuffle"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="details text-center">
                    <div class="title"> <?php echo $product_type_title_text; ?> </div>
                    <div class="review">
                        <ul class="mb0">
                            <li class="list-inline-item"><a href="#"><i class="flaticon-star"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="flaticon-star"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="flaticon-star"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="flaticon-star"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="flaticon-star"></i></a></li>
                        </ul>
                    </div>
                    <div class="sub_title"> <?php echo $product_title_text; ?> <br> <?php echo $product_quantity_text; ?> </div>
                    <div class="si_footer">
                        <div class="price">$ <span> <?php echo $product_price_text; ?> </span> </div>
                        <a href="page-shop-cart.html" class="cart_btn btn-thm"><span class="flaticon-shopping-cart mr10"></span>ADD TO CART</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mbp_pagination mt10">
            <ul class="page_navigation">
                <li class="page-item">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="fa fa-arrow-left"></span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">3 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">15</a></li>
                <li class="page-item">
                    <a class="page-link" href="#"><span class="fa fa-arrow-right"></span></a>
                </li>
            </ul>
          </div>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPEW_Products_List() );
