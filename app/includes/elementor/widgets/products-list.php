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
            'charity_woo_product',
            [
                'label' 	=> __( 'Product Element', 'wpew' )
            ]
        );

		$this->add_control(
			'woo_number',
			[
				'label'         => __( 'Number of Products', 'wpew' ),
				'type'          => Controls_Manager::NUMBER,
				'label_block'   => true,
				'default'       => __( '9', 'wpew' ),

			]
		); 
		$this->add_control(
            'woo_column',
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
        $this->add_control(
			'woo_cat',
			[
				'label'    => __( 'Product Category', 'wpew' ),
				'type'     => Controls_Manager::SELECT,
				'options'  => wpew_all_category_list( 'product_cat' ),
				'multiple' => true,
				'default'  => 'allpost',
			]
        );
        $this->add_control(
            'woo_order_by',
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
			'woo_pagination',
			[
				'label' => __( 'Product Pagination', 'wpew' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'wpew' ),
				'label_off' => __( 'Hide', 'wpew' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->end_controls_section();
        # Option End


        /**
		 * # Background
		 */
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
		$woo_number 		= $settings['woo_number'];
		$woo_column 		= $settings['woo_column'];
		$woo_cat 			= $settings['woo_cat'];
		$woo_order_by 		= $settings['woo_order_by'];
		$woo_pagination 	= $settings['woo_pagination'];
		$page_numb 			= max( 1, get_query_var('paged') );

		//Query Build
		$arg = array(
				'post_type'   =>  'product',
				'post_status' => 'publish',
			);
		if( $woo_order_by ){
			$arg['order'] = $woo_order_by;
		}
		if( $page_numb ){
			$arg['paged'] = $page_numb;
		}
		if( $woo_number ){
			$arg['posts_per_page'] = $woo_number;
		}

		if( $woo_cat ){
			$cat_data = array();
			$cat_data['relation'] = 'AND';
			$cat_data[] = array(
			            'taxonomy' => 'product_type',
			            'field'    => 'slug',
			            'terms'    => 'crowdfunding',
			            'operator' => 'NOT IN',
			        );
			if( $woo_cat != 'allpost' ){
				$cat_data[] = array(
						'taxonomy' 	=> 'product_cat',
			          	'field' 	=> 'slug',
			          	'terms' 	=> $woo_cat
					);
			}
			$arg['tax_query'] = $cat_data;
		}

		$data = new \WP_Query( $arg ); ?>


<div class="shop-area">
<div class="shop-list-item">
<div class="wpew-row">

	<?php if ( $data->have_posts() ) : ?>
	<?php while ( $data->have_posts() ) : $data->the_post(); 
		$product = new \WC_Product(get_the_ID());
		$price_html = $product->get_price_html(); 

		?>


			<div class="col-sm-<?php echo $woo_column; ?> col-lg-4 col-xl-3">
				<div class="shop_item">
					<div class="thumb">
						<div class="offer_badge">
							<ul class="mb0">
							<li><a class="offr_tag" href="#"><span>HOT</span></a></li>
							<li><a class="comison_rate" href="#"><span>-4 %</span></a></li>
							</ul>
						</div>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?></a>
						<!-- <img src="https://creativelayers.net/themes/freshen-html/images/shop-items/fp1.png" alt="fp1.png"> -->
						<div class="thumb_info">
							<ul class="mb0">
								<li><a href="page-dashboard-wish-list.html"><span class="flaticon-heart"></span></a></li>
								<li><a href="page-dashboard-wish-list.html"><span class="flaticon-search"></span></a></li>
								<li><a href="page-shop-list-v6.html"><span class="flaticon-shuffle"></span></a></li>
							</ul>
						</div>
					</div>
					<div class="details text-center">
						<div class="title"><?php echo get_the_term_list( get_the_ID(), 'product_cat', ' ', ', ', ' ' ); ?></div>
						<div class="review">
							<ul class="mb0">
								<?php
									$product = wc_get_product( get_the_ID() );

									$rating  = $product->get_average_rating();
									
									$count   = $product->get_rating_count();
									
									echo wc_get_rating_html( $rating, $count );

									?>

<div id="wrapper">
  <div class="star-rating">
    <span style="width:30%"></span>
  </div>
</div>


								<li class="list-inline-item"><a href="#"><i class="flaticon-star"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="flaticon-star"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="flaticon-star"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="flaticon-star"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="flaticon-star"></i></a></li>
							</ul>
						</div>
						<div class="sub_title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
						<div class="si_footer">
							<div class="price"><span><?php echo $price_html; ?></span></div>
							<a rel="nofollow" href="?add-to-cart=<?php echo $data->post->ID ?>" data-quantity="1" data-product_id="<?php echo $data->post->ID ?>" data-product_sku="" class="cart_btn btn-thm filled-button button product_type_simple add_to_cart_button ajax_add_to_cart"><span class="flaticon-shopping-cart mr10"></span> <?php _e('Add to cart','charity-essential'); ?></a>
						</div>
					</div>
				</div>
			</div>

	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
	<?php endif; ?>

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
