<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_EAFE_Restaurant_Menu extends Widget_Base {
	
	public function get_name() {
		return 'eafe-restaurant-menu';
	}

	public function get_title() {
		return __( 'Restaurant Menu', 'eafe' );
	}

	public function get_icon() {
		return 'eicon-site-title';
	}

	public function get_categories() {
		return [ 'eafe-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Title Element', 'eafe' )
            ]
        );

        $this->add_control(
            'popular_dishes_header_text',
            [
                'label' => __( 'Header Text', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title', 'eafe' ),
                'default' => __( 'Popular Dishes', 'eafe' ),
            ]
        );

		$this->add_control(
            'popular_dishes_sub_header_text',
            [
                'label' => __( 'Sub Header Text', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title two', 'eafe' ),
                'default' => __( 'Our Most Popular Menu', 'eafe' ),
            ]
        );

		$this->add_control(
            'menu_column',
            [
                'label'     => __( 'Coulmn Number', 'eafe' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => '6',
                'options'   => [
                        '12' 	=> __( 'Column 1', 'eafe' ),
                        '6' 	=> __( 'Column 2', 'eafe' ),
						'4' 	=> __( 'Column 3', 'eafe' ),
                        '3' 	=> __( 'Column 4', 'eafe' ),
                        '2' 	=> __( 'Column 6', 'eafe' ),
                    ],
            ]
        );

		# Menu List
		$this->add_control(
			'popular_dishes_menu_list',
			[
				'label' 		=> __( 'Dishes Menu Items', 'eafe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'show_label'  	=> true,
				'default' 		=> [
					[
						'text' => __( 'Dishes #1', 'eafe' ),
					],	
				],
				'fields' 		=> [
					[
						'name' 			=> 'dishes_menu_title',
						'label' 		=> __( 'Menu Title Text', 'eafe' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'eafe' ),
						'default' 		=> __( 'Wild Mushroom Bucatini with Kale', 'eafe' ),
					],
					[
						'name' 			=> 'dishes_menu_details',
						'label' 		=> __( 'Menu Details Text', 'eafe' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'eafe' ),
						'default' 		=> __( 'Mushroom / Veggie / White Sources', 'eafe' ),
					],
					[
						'name' 			=> 'dishes_menu_price',
						'label' 		=> __( 'Menu Price Text', 'eafe' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'eafe' ),
						'default' 		=> __( '10.5', 'eafe' ),
					]
				],
			]
		);

		$this->add_control(
			'currency',
			[
				'label'    => __( 'Currency', 'eafe' ),
				'type'     => Controls_Manager::SELECT,
				'options'  => getCurrencyList(),
				'multiple' => false,
				'default'  => 'USD:$',
			]
		);

        $this->end_controls_section();
        # Option End

		# Header style
		$this->start_controls_section(
			'popular_dishes_header_style',
			[
				'label' 	=> __( 'Header Title', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Header color
		$this->add_control(
			'popular_dishes_header_color',
			[
				'label'		=> __( 'Heading Title Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restaurent-menu-item .module-header .module-title' => 'color: {{VALUE}};',
				],
			]
		);

		# Header typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Heading Title Typography', 'eafe' ),
				'name' 		=> 'popular_dishes_header_typorgraphy',
				'selector' 	=> '{{WRAPPER}} .restaurent-menu-item .module-header .module-title',
			]
		);

		# Sub header color
		$this->add_control(
			'popular_dishes_sub_header_color',
			[
				'label'		=> __( 'Sub Header Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restaurent-menu-item .module-header .module-subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		# Sub header typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Sub Header Typography', 'eafe' ),
				'name' 		=> 'popular_dishes_sub_header_typorgraphy',
				'selector' 	=> '{{WRAPPER}} .restaurent-menu-item .module-header .module-subtitle',
			]
		);

        $this->end_controls_section();
		
		# Menu style
		$this->start_controls_section(
			'popular_dishes_menu_style',
			[
				'label' 	=> __( 'Menu', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Title color
		$this->add_control(
			'popular_dishes_menu_title_color',
			[
				'label'		=> __( 'Title Color', 'eafe' ),
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
				'label'		=> __( 'Title Typography', 'eafe' ),
				'name' 		=> 'popular_dishes_menu_title_typorgraphy',
				'selector' 	=> '{{WRAPPER}} .restaurent-menu-item .menu-item-list .menu-title',
			]
		);

		# Details color
		$this->add_control(
			'popular_dishes_menu_details_color',
			[
				'label'		=> __( 'Details Color', 'eafe' ),
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
				'label'		=> __( 'Details Typography', 'eafe' ),
				'name' 		=> 'popular_dishes_menu_details_typorgraphy',
				'selector' 	=> '{{WRAPPER}} .restaurent-menu-item .menu-detail',
			]
		);

		# Price color
		$this->add_control(
			'popular_dishes_menu_price_color',
			[
				'label'		=> __( 'Price Text Color', 'eafe' ),
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
				'label'		=> __( 'Price Text Typography', 'eafe' ),
				'name' 		=> 'popular_dishes_menu_price_typorgraphy',
				'selector' 	=> '{{WRAPPER}} .restaurent-menu-item .menu-price',
			]
		);
        $this->end_controls_section();
	}

	protected function render( ) {
		$settings 	= $this->get_settings();
		$currency   = $settings['currency'];

		$crcy_code = explode(':', $currency); ?>

		<div class="restaurent-menu-item">
			<div class="module-header">
				<?php if( !empty($settings['popular_dishes_header_text']) ) { ?>
					<h2 class="module-title"><?php echo $settings['popular_dishes_header_text']; ?></h2>
				<?php } ?>
				<?php if( !empty($settings['popular_dishes_sub_header_text']) ) { ?>
					<h3 class="module-subtitle"><?php echo $settings['popular_dishes_sub_header_text']; ?></h3>
				<?php } ?>
			</div>
				
			<div class="menu-item-list">
				<div class="eafe-row">
					<?php foreach($settings['popular_dishes_menu_list'] as $list){ ?>
						<div class="eafe-col-<?php echo $settings['menu_column'];?>">
							<div class="menu">
								<div class="eafe-row">
									<div class="eafe-col-8">
										<?php if( !empty($list['dishes_menu_title']) ) { ?>
											<h4 class="menu-title"><?php echo $list['dishes_menu_title']; ?></h4>
										<?php } ?>

										<?php if( !empty($list['dishes_menu_details']) ) { ?>
											<div class="menu-detail"><?php echo $list['dishes_menu_details']; ?></div>
										<?php } ?>
									</div>
									
									<div class="eafe-col-4 menu-price-detail">
										<?php if( !empty($list['dishes_menu_price']) ) { ?>
											<h4 class="menu-price"><?php echo $crcy_code[1]; ?><?php echo $list['dishes_menu_price'];?></h4>
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

Plugin::instance()->widgets_manager->register_widget_type( new Widget_EAFE_Restaurant_Menu() );
