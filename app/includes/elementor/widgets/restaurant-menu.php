<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Widget_EAFE_Restaurant_Menu extends \Elementor\Widget_Base {
	public function get_name() {
		return 'eafe-restaurant-menu';
	}

	public function get_title() {
		return __( 'EAFE Restaurant Menu', 'eafe' );
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
            'popular_dishes_menu_column',
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
				'label' 		=> __( 'Popular Dishes Menu Items', 'eafe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'show_label'  	=> true,
				'default' 		=> [
					[
						'text' => __( 'Event #1', 'eafe' ),
						'icon' => 'fa fa-check',
					],	
				],
				'fields' 		=> [
					[
						'name' 			=> 'popular_dishes_menu_title_text',
						'label' 		=> __( 'Menu Title Text', 'eafe' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'eafe' ),
						'default' => __( 'Wild Mushroom Bucatini with Kale', 'eafe' ),
					],
					[
						'name' 			=> 'popular_dishes_menu_details_text',
						'label' 		=> __( 'Menu Details Text', 'eafe' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'eafe' ),
						'default' 		=> __( 'Mushroom / Veggie / White Sources', 'eafe' ),
					],

					[
						'name' 			=> 'popular_dishes_menu_price_text',
						'label' 		=> __( 'Menu Price Text', 'eafe' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'eafe' ),
						'default' 		=> __( '10.5', 'eafe' ),
					]
				],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'eafe' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'eafe' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'eafe' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'eafe' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'eafe' ),
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
				'label'		=> __( 'Header Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #header' => 'color: {{VALUE}};',
				],
			]
		);

		# Header typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Header Typography', 'eafe' ),
				'name' 		=> 'popular_dishes_header_typorgraphy',
				'selector' 	=> '{{WRAPPER}} #header',
			]
		);

		# Sub header color
		$this->add_control(
			'popular_dishes_sub_header_color',
			[
				'label'		=> __( 'Sub Header Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #subheader' => 'color: {{VALUE}};',
				],
			]
		);

		# Sub header typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Sub Header Typography', 'eafe' ),
				'name' 		=> 'popular_dishes_sub_header_typorgraphy',
				'selector' 	=> '{{WRAPPER}} #subheader',
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
					'{{WRAPPER}} .menu-title' => 'color: {{VALUE}};',
				],
			]
		);

		# Title typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Title Typography', 'eafe' ),
				'name' 		=> 'popular_dishes_menu_title_typorgraphy',
				'selector' 	=> '{{WRAPPER}} .menu-title',
			]
		);

		# Details color
		$this->add_control(
			'popular_dishes_menu_details_color',
			[
				'label'		=> __( 'Details Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu-detail' => 'color: {{VALUE}};',
				],
			]
		);

		# Details typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Details Typography', 'eafe' ),
				'name' 		=> 'popular_dishes_menu_details_typorgraphy',
				'selector' 	=> '{{WRAPPER}} .menu-detail',
			]
		);

		# Price color
		$this->add_control(
			'popular_dishes_menu_price_color',
			[
				'label'		=> __( 'Price Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu-price' => 'color: {{VALUE}};',
				],
			]
		);

		# Details typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Price Text Typography', 'eafe' ),
				'name' 		=> 'popular_dishes_menu_price_typorgraphy',
				'selector' 	=> '{{WRAPPER}} .menu-price',
			]
		);
        $this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings();  ?>

		<div id="popular" class="restaurent-menu-item">
	
			<div class="module-header wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
				<h2 id="header" class="module-title"><?php echo $settings['popular_dishes_header_text']; ?></h2>
				<h3 id="subheader" class="module-subtitle"><?php echo $settings['popular_dishes_sub_header_text']; ?></h3>
			</div>
				
			<div class="menu-item-list">
				<div class="eafe-row">
					<?php foreach($settings['popular_dishes_menu_list'] as $list){ ?>
						<div class="eafe-col-<?php echo $settings['popular_dishes_menu_column'];?>">
							<div class="menu">
								<div class="eafe-row">
									<div class="eafe-col-8">
										<h4 class="menu-title"><?php echo $list['popular_dishes_menu_title_text'];?></h4>
										<div class="menu-detail"><?php echo $list['popular_dishes_menu_details_text'];?></div>
									</div>
									<div class="col-sm-4 menu-price-detail">
										<h4 class="menu-price">$<?php echo $list['popular_dishes_menu_price_text'];?></h4>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>

					<!-- <div class="eafe-col-6">
						<div class="menu">
							<div class="eafe-row">
								<div class="eafe-col-8">
									<h4 class="menu-title">Wild Mushroom Bucatini with Kale</h4>
									<div class="menu-detail">Mushroom / Veggie / White Sources</div>
								</div>
								<div class="col-sm-4 menu-price-detail">
									<h4 class="menu-price">$10.5</h4>
								</div>
							</div>
						</div>
					</div>

					<div class="eafe-col-6">
						<div class="menu">
							<div class="eafe-row">
								<div class="eafe-col-8">
									<h4 class="menu-title">Wild Mushroom Bucatini with Kale</h4>
									<div class="menu-detail">Mushroom / Veggie / White Sources</div>
								</div>
								<div class="col-sm-4 menu-price-detail">
									<h4 class="menu-price">$10.5</h4>
								</div>
							</div>
						</div>
					</div>

					<div class="eafe-col-6">
						<div class="menu">
							<div class="eafe-row">
								<div class="eafe-col-8">
									<h4 class="menu-title">Wild Mushroom Bucatini with Kale</h4>
									<div class="menu-detail">Mushroom / Veggie / White Sources</div>
								</div>
								<div class="col-sm-4 menu-price-detail">
									<h4 class="menu-price">$10.5</h4>
								</div>
							</div>
						</div>
					</div> -->

					<!-- <div class="menu">
						<div class="row">
							<div class="col-sm-8">
								<h4 class="menu-title">Lemon and Garlic Green Beans</h4>
								<div class="menu-detail">Lemon / Garlic / Beans</div>
							</div>
							<div class="col-sm-4 menu-price-detail">
								<h4 class="menu-price">$14.5</h4>
								<div class="menu-label">New</div>
							</div>
						</div>
					</div>

				
					<div class="menu">
						<div class="row">
							<div class="col-sm-8">
								<h4 class="menu-title">Wild Mushroom Bucatini with Kale</h4>
								<div class="menu-detail">Mushroom / Veggie / White Sources</div>
							</div>
							<div class="col-sm-4 menu-price-detail">
								<h4 class="menu-price">$14.5</h4>
							</div>
						</div>
					</div>

					<div class="menu">
						<div class="row">
							<div class="col-sm-8">
								<h4 class="menu-title">Lemon and Garlic Green Beans</h4>
								<div class="menu-detail">Lemon / Garlic / Beans</div>
							</div>
							<div class="col-sm-4 menu-price-detail">
								<h4 class="menu-price">$14.5</h4>
							</div>
						</div>
					</div> -->
				</div>
			</div>
					
		</div>

		<?php 
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_EAFE_Restaurant_Menu() );
