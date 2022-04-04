<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Widget_EAFE_Restaurant_Schedule extends Widget_Base {
	public function get_name() {
		return 'eafe-restaurant-schedule';
	}

	public function get_title() {
		return __( 'Restaurant Schedule', 'eafe' );
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
            'schedule_header_text',
            [
                'label' => __( 'Header Text', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title', 'eafe' ),
                'default' => __( 'SCHEDULE', 'eafe' ),
            ]
        );

		# Special Menu List
		$this->add_control(
			'schedule_menu_list',
			[
				'label' 		=> __( 'Schedule Menu Items', 'eafe' ),
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
						'name' 			=> 'schedule_title_text',
						'label' 		=> __( 'Title Text', 'eafe' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'eafe' ),
						'default' => __( 'Tuesday - Thursday', 'eafe' ),
					],
					[
						'name' 			=> 'schedule_time_text',
						'label' 		=> __( 'Time Text', 'eafe' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'eafe' ),
						'default' 		=> __( '@ 6pm and 9:30pm', 'eafe' ),
					]
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

		# Header text color
		$this->add_control(
			'schedule_header_text_color',
			[
				'label'		=> __( 'Header Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe-addon-title' => 'color: {{VALUE}};',
				],
			]
		);

		# Header text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Header Typography', 'eafe' ),
				'name' 		=> 'schedule_header_header_text_typography',
				'selector' 	=> '{{WRAPPER}} .eafe-addon-title',
			]
		);

		# Title text color
		$this->add_control(
			'schedule_title_text_color',
			[
				'label'		=> __( 'Title Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe-addon-content h4' => 'color: {{VALUE}};',
				],
			]
		);

		# Title text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Title Text Typography', 'eafe' ),
				'name' 		=> 'schedule_title_text__typography',
				'selector' 	=> '{{WRAPPER}} .eafe-addon-content h4',
			]
		);

		# Time text color
		$this->add_control(
			'schedule_time_text_color',
			[
				'label'		=> __( 'Time Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe-addon-content .spdiner-time' => 'color: {{VALUE}};',
				],
			]
		);

		# Time text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Header Typography', 'eafe' ),
				'name' 		=> 'schedule_time_text_typography',
				'selector' 	=> '{{WRAPPER}} .eafe-addon-content .spdiner-time',
			]
		);

		$this->add_control(
			'schedule_border_one_color',
			[
				'label'		=> __( 'Border-1 Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe-diner-schedule-info:befter' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_responsive_control(
			'schedule_spacing',
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
					'{{WRAPPER}} .eafe-addon-content .spdiner-time' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
	}

	protected function render( ) {
		$settings = $this->get_settings();  ?>
		
		<!-- eafe-restaurant-schedule -->
		<div id="eafe-restaurant-schedule">
			<div id="restaurant-schedule" class="clearfix ">
				<div class="eafe-addon eafe-addon-text-block eafe-text-center eafe-diner-schedule-info">
					<h5 class="eafe-addon-title"><?php echo $settings['schedule_header_text'];?></h5>
					<div class="eafe-addon-content">
						<?php foreach($settings['schedule_menu_list'] as $list) { ?>
							<h4><?php echo $list['schedule_title_text'];?></h4>
							<h4 class="spdiner-time"><?php echo $list['schedule_time_text'];?></h4>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<?php 
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_EAFE_Restaurant_Schedule() );
