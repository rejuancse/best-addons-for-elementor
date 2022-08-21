<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class BAFE_Widget_BAFE_Restaurant_Menu extends Widget_Base {
	
	public function get_name() {
		return 'bafe-restaurant-menu';
	}

	public function get_title() {
		return __( 'Restaurant Menu', 'bafe' );
	}

	public function get_icon() {
		return 'eicon-site-title';
	}

	public function get_categories() {
		return [ 'bafe-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Title Element', 'bafe' )
            ]
        );

		$this->add_control(
            'menu_column',
            [
                'label'     => __( 'Coulmn Number', 'bafe' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => '6',
                'options'   => [
                        '12' 	=> __( 'Column 1', 'bafe' ),
                        '6' 	=> __( 'Column 2', 'bafe' ),
						'4' 	=> __( 'Column 3', 'bafe' ),
                        '3' 	=> __( 'Column 4', 'bafe' ),
                        '2' 	=> __( 'Column 6', 'bafe' ),
                    ],
            ]
        );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'dishes_menu_title', [
				'label' => esc_html__( 'Menu Title', 'bafe' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Grilled Angus Hamburger' , 'bafe' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'dishes_menu_details', [
				'label' => esc_html__( 'Menu Details', 'bafe' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Mushroom / Veggie / White Sources' , 'bafe' ),
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'dishes_menu_price', [
				'label' 	=> esc_html__( 'Item Price', 'bafe' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
				'default' 	=> esc_html__( '7.00' , 'bafe' ),
				'show_label' => true,
			]
		);

		$this->add_control(
			'dishes_menu_list',
			[
				'label' => esc_html__( 'Dishes Menu Items', 'bafe' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'dishes_menu_title' 	=> esc_html__( 'Grilled Angus Hamburger', 'bafe' ),
						'dishes_menu_details' 	=> esc_html__( 'Mushroom / Veggie / White Sources', 'bafe' ),
						'dishes_menu_price' 	=> esc_html__( '7.00', 'bafe' ),
					],
					[
						'dishes_menu_title' 	=> esc_html__( 'Grilled Angus Hamburger', 'bafe' ),
						'dishes_menu_details' 	=> esc_html__( 'Mushroom / Veggie / White Sources', 'bafe' ),
						'dishes_menu_price' 	=> esc_html__( '5.00', 'bafe' ),
					],
				],
				'title_field' => '{{{ dishes_menu_title }}}',
			]
		);

		$this->add_control(
			'currency',
			[
				'label'    => __( 'Currency', 'bafe' ),
				'type'     => Controls_Manager::SELECT,
				'options'  => getCurrencyList(),
				'multiple' => false,
				'default'  => 'USD:$',
			]
		);

		$this->add_control(
			'menu_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label'		=> __( 'Divider Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restaurent-menu-item .menu' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'border_width',
			[
				'label' => esc_html__( 'Border Width', 'bafe' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .restaurent-menu-item .menu' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'divider_type',
			[
				'label'     => __( 'Border Type', 'bafe' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'dotted',
				'options'   => [
						'solid' 		=> __( 'Solid', 'bafe' ),
						'dotted' 		=> __( 'Dotted', 'bafe' ),
						'dashed' 		=> __( 'dashed', 'bafe' ),
					],
				'selectors' => [
						'{{WRAPPER}} .restaurent-menu-item .menu' => 'border-style: none none {{VALUE}} none;',
					],
			]
	  	);

        $this->end_controls_section();
        # Option End

		# Menu style
		$this->start_controls_section(
			'dishes_menu_style',
			[
				'label' 	=> __( 'Menu Style', 'bafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Title color
		$this->add_control(
			'dishes_menu_title_color',
			[
				'label'		=> __( 'Dishes Menu Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restaurent-menu-item .menu-item-list .menu-title' => 'color: {{VALUE}};',
				],
			]
		);

		# Title typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Dishes Menu Typography', 'bafe' ),
				'name' 		=> 'dishes_menu_title_typorgraphy',
				'selector' 	=> '{{WRAPPER}} .restaurent-menu-item .menu-item-list .menu-title',
			]
		);

		$this->add_responsive_control(
			'menu_item_gap',
			[
				'label' => esc_html__( 'Menu Item Spacing', 'bafe' ),
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
					'{{WRAPPER}} .restaurent-menu-item .menu-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .restaurent-menu-item .menu-price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'first_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		# Details color
		$this->add_control(
			'dishes_menu_details_color',
			[
				'label'		=> __( 'Menu Details Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restaurent-menu-item .menu-detail' => 'color: {{VALUE}};',
				],
			]
		);

		# Details typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Menu Details Typography', 'bafe' ),
				'name' 		=> 'dishes_menu_details_typorgraphy',
				'selector' 	=> '{{WRAPPER}} .restaurent-menu-item .menu-detail',
			]
		);

		$this->add_responsive_control(
			'dishe_menu_item_gap',
			[
				'label' => esc_html__( 'Menu Details Spacing', 'bafe' ),
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
					'{{WRAPPER}} .restaurent-menu-item .menu' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'second_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		# Price color
		$this->add_control(
			'dishes_menu_price_color',
			[
				'label'		=> __( 'Menu Price Text Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restaurent-menu-item .menu-price' => 'color: {{VALUE}};',
				],
			]
		);

		# Details typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Price Text Typography', 'bafe' ),
				'name' 		=> 'dishes_menu_price_typorgraphy',
				'selector' 	=> '{{WRAPPER}} .restaurent-menu-item .menu-price',
			]
		);

		$this->add_control(
			'four_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'item_gap',
			[
				'label' => esc_html__( 'Menu Item Spacing', 'bafe' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .restaurent-menu-item .menu' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();
	}

	protected function render( ) {
		$settings 	= $this->get_settings();
		$currency   = $settings['currency'];
		$crcy_code = explode(':', $currency); ?>

		<div class="restaurent-menu-item">			
			<div class="menu-item-list">
				<div class="bafe-row">
					<?php foreach($settings['dishes_menu_list'] as $list){ ?>
						<div class="bafe-col-<?php echo $settings['menu_column'];?>">
							<div class="menu">
								<div class="bafe-row">
									<div class="bafe-col-8">
										<?php if( !empty($list['dishes_menu_title']) ) { ?>
											<h4 class="menu-title"><?php echo esc_html($list['dishes_menu_title']); ?></h4>
										<?php } ?>

										<?php if( !empty($list['dishes_menu_details']) ) { ?>
											<div class="menu-detail"><?php echo esc_html($list['dishes_menu_details']); ?></div>
										<?php } ?>
									</div>
									
									<div class="bafe-col-4 menu-price-detail">
										<?php if( !empty($list['dishes_menu_price']) ) { ?>
											<h4 class="menu-price"><?php echo esc_html($crcy_code[1]); ?><?php echo esc_html($list['dishes_menu_price']);?></h4>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>		
		</div>

		<?php 
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new BAFE_Widget_BAFE_Restaurant_Menu() );
