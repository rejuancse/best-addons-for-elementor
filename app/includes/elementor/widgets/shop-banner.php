<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Shop_Banner extends Widget_Base {
	public function get_name() {
		return 'shop-banner';
	}

	public function get_title() {
		return __( 'Shop Banner', 'wpew' );
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

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
            'sales',
            [
                'label' => __( 'Seasonal Sales', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your sales name', 'wpew' ),
                'default' => __( 'Seasonal Sales', 'wpew' ),
            ]
        );

		$this->add_control(
            'sales_offer',
            [
                'label' => __( 'Sales Offers', 'wpew' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Enter your offer', 'wpew' ),
                'default' => __( 'Up To Breads', 'wpew' ),
            ]
        );

		$this->add_control(
            'highlight_text',
            [
                'label' => __( 'Highlight Text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your Highlight text', 'wpew' ),
                'default' => __( '50% Off', 'wpew' ),
            ]
        );

		$this->add_control(
            'shop_button_name',
            [
                'label' => __( 'Shop Button Name', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your button name', 'wpew' ),
                'default' => __( 'Shop Now', 'wpew' ),
            ]
        );

        $this->add_control(
            'shop_button_url', 
            [
                'label' => __( 'Shop Button URL', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your url', 'wpew' ),
                'default' => __( '#', 'wpew' ),
            ]
        );

		// Vertical Align
		$this->add_responsive_control(
			'vertical_align',
			[
				'label' => esc_html__( 'Vertical Alignment', 'wpew' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Top', 'wpew' ),
						'icon' => 'eicon-justify-start-v', 
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpew' ),
						'icon' => 'eicon-justify-space-between-v',
					],
					'flex-end' => [
						'title' => esc_html__( 'Bottom', 'wpew' ),
						'icon' => ' eicon-justify-end-v',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .banner_one .details' => 'align-items: {{VALUE}};',
				],
			]
		);

		// Align
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


		# Style
		$this->start_controls_section(
			'section_banner_style',
			[
				'label' 	=> __( 'Banner Section', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Seasonal Sales
		$this->add_control(
			'seasonal_title_sales',
			[
				'label'		=> __( 'Seasonal Sales Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_one .details .para' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Sales Text Typography', 'wpew' ),
				'name' 		=> 'sales_typography',
				'selector' 	=> '{{WRAPPER}} .banner_one .details .para',
			]
		);

		$this->add_responsive_control(
			'section_title_space',
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
					'{{WRAPPER}} .banner_one .details .para' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);


		# Banner Title
		$this->add_control(
			'banner_title',
			[
				'label' => esc_html__( 'Banner Title', 'wpew' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		# Title Sales
		$this->add_control(
			'title_sales',
			[
				'label'		=> __( 'Sales Title Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_one .details .title' => 'color: {{VALUE}};',
				],
			]
		);
		# Title Sales Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Sales Title Typography', 'wpew' ),
				'name' 		=> 'title_typography',
				'selector' 	=> '{{WRAPPER}} .banner_one .details .title',
			]
		);

		$this->add_responsive_control(
			'banner_title_space',
			[
				'label' => esc_html__( 'Title Spacing', 'wpew' ),
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
					'{{WRAPPER}} .banner_one .details .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
            'banner_padding',
            [
                'label' 		=> __( 'Banner Padding', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .banner_one .details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );

		$this->end_controls_section();
		# Title Section end 1



		# Shop Now btn Style
		$this->start_controls_section(
			'section_btn_style',
			[
				'label' 	=> __( 'Button', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'shopnow_btn_color',
			[
				'label'		=> __( 'Shop Now Button Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .shop_btn:before' => 'background-color: {{VALUE}};',

					
				],
			]
		);

		$this->add_control(
			'shopnow_btn_hover_color',
			[
				'label'		=> __( 'Shop Now Button Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_btn:hover' => 'color: {{VALUE}};',

					
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Button Typography', 'wpew' ),
				'name' 		=> 'btn_typography',
				'selector' 	=> '{{WRAPPER}} .shop_btn',
			]
		);

		$this->end_controls_section();
		# Title Section end 1

	}

	protected function render( ) {
		$settings = $this->get_settings();
		$sales = $settings['sales'];
		$sales_offer = $settings['sales_offer'];
		$highlight_text = $settings['highlight_text'];
		$shop_button_name = $settings['shop_button_name'];
		$shop_button_url = $settings['shop_button_url']; ?>


		<div class="banner_one">
			<?php if( !empty( $settings['image'] ) ){ ?>
            	<div class="thumb"><img src="<?php echo $settings['image']['url']; ?>" alt="2.jpg"></div>
			<?php } ?>

            <div class="details">
				<div class="content-wrap">
					<?php if( ! empty($sales) ) { ?>
						<p class="para"><?php echo $sales; ?></p>
					<?php } ?>
					
					<?php if( !empty($sales_offer) || !empty ($highlight_text) ) { ?>
						<h2 class="title"><?php echo $sales_offer; ?> <span class="text-thm2"><?php echo $highlight_text; ?></span></h2>
					<?php } ?>

					<?php if( !empty( $shop_button_url )) { ?>
						<a href="<?php echo $shop_button_url; ?>" class="shop_btn"><?php echo $shop_button_name; ?></a>
					<?php } ?>
				</div>
            </div>
        </div>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Shop_Banner() );
