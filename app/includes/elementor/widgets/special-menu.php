<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_EAFE_Special_Menu extends \Elementor\Widget_Base {
	public function get_name() {
		return 'eafe-special-menu';
	}

	public function get_title() {
		return __( 'Special Menu', 'eafe' );
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

		<!-- <section class="special_menu mt-60 mb-60"> -->
			<div class="section-title text-center">
				<p>Famous for good food</p>
				<h4>special menu</h4>
			</div>
			<div class="single_special">
				<img src="http://infinityflamesoft.com/html/restarunt-preview/assets/img/sp1.jpg" alt="">
				<ul class="set_menu">
					<li>Fried Rice x 1<span>Price: $9.00</span></li>
					<li>Checken x 2<span>Price: $15.00</span></li>
					<li>Salad x 1<span>Price: $7.00</span></li>
					<li>1 250ml x 1<span>Price: $3.00</span></li>
					<li class="total">Total:<span>$24.00</span></li>
				</ul>
			</div>
		<!-- </section> -->

		<?php 
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_EAFE_Special_Menu() );