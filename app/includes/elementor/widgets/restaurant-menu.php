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
            'title_txt',
            [
                'label' => __( 'First Title Text', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title', 'eafe' ),
                'default' => __( 'Explore Featured', 'eafe' ),
            ]
        );

		$this->add_control(
            'title_txt2',
            [
                'label' => __( 'Second Title Text', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title two', 'eafe' ),
                'default' => __( 'Cources', 'eafe' ),
            ]
        );

        $this->add_control(
            'subtitle_content',
            [
                'label' => __( 'Sub Title Content', 'eafe' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Enter Sub Title', 'eafe' ),
                'default' => __( 'Write your sub title content of this section.', 'eafe' ),
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

		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Title', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'forst_title_color',
			[
				'label'		=> __( 'First Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe_heading_caption h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'second_title_color',
			[
				'label'		=> __( 'Second Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe_heading_caption .theme-cl' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography',
				'selector' 	=> '{{WRAPPER}} .eafe_heading_caption h2',
			]
		);

        $this->add_responsive_control(
			'eafe_title_space',
			[
				'label' => esc_html__( 'Spacing', 'eafe' ),
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
					'{{WRAPPER}} .eafe_heading_caption h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		# Title Section end 1


		# Sub Title Section 2
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' 	=> __( 'Sub Title', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'		=> __( 'Subtitle Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe_heading_caption p' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography2',
				'selector' 	=> '{{WRAPPER}} .eafe_heading_caption p',
			]
		);

        $this->end_controls_section();
		# Subtitle part 2 end
	}

	protected function render( ) {
		$settings = $this->get_settings();  ?>

		<div id="popular" class="restaurent-menu-item">
	
			<div class="module-header wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
				<h2 class="module-title">Popular Dishes</h2>
				<h3 class="module-subtitle">Our most popular menu</h3>
			</div>
				
			<div class="menu-item-list">
				<div class="eafe-row">
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
					</div>

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
