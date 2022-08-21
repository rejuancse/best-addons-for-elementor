<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class BAFE_Widget_BAFE_Restaurant_Schedule extends Widget_Base {

	public function get_name() {
		return 'bafe-restaurant-schedule';
	}

	public function get_title() {
		return __( 'Restaurant Schedule', 'bafe' );
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
            'schedule_header_text',
            [
                'label' => __( 'Header Text', 'bafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title', 'bafe' ),
                'default' => __( 'SCHEDULE', 'bafe' ),
            ]
        );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'schedule_title_text', [
				'label' => esc_html__( 'Title Text', 'bafe' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Friday - Saturday' , 'bafe' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'schedule_time_text', [
				'label' => esc_html__( 'Time Text', 'bafe' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '@ 6pm and 9:30pm' , 'bafe' ),
				'show_label' => true,
			]
		);

		$this->add_control(
			'schedule_menu_list',
			[
				'label' => esc_html__( 'Schedule Menu Items', 'bafe' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'schedule_title_text' => esc_html__( 'Friday - Saturday', 'bafe' ),
						'schedule_time_text' => esc_html__( '@ 9am and 9:30pm', 'bafe' ),
					],
					[
						'schedule_title_text' => esc_html__( 'Tuesday - Thursday', 'bafe' ),
						'schedule_time_text' => esc_html__( '@ 6pm and 9:30pm', 'bafe' ),
					],
				],
				'title_field' => '{{{ schedule_title_text }}}',
			]
		);

        $this->end_controls_section();
        # Option End

		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Title', 'bafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Header text color
		$this->add_control(
			'schedule_header_text_color',
			[
				'label'		=> __( 'Header Text Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bafe-addon-title' => 'color: {{VALUE}};',
				],
			]
		);

		# Header text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Header Typography', 'bafe' ),
				'name' 		=> 'schedule_header_header_text_typography',
				'selector' 	=> '{{WRAPPER}} .bafe-addon-title',
			]
		);

		# Title text color
		$this->add_control(
			'schedule_title_text_color',
			[
				'label'		=> __( 'Title Text Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bafe-addon-content h4' => 'color: {{VALUE}};',
				],
			]
		);

		# Title text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Title Text Typography', 'bafe' ),
				'name' 		=> 'schedule_title_text__typography',
				'selector' 	=> '{{WRAPPER}} .bafe-addon-content h4',
			]
		);

		# Time text color
		$this->add_control(
			'schedule_time_text_color',
			[
				'label'		=> __( 'Time Text Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bafe-addon-content .spdiner-time' => 'color: {{VALUE}};',
				],
			]
		);

		# Time text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Header Typography', 'bafe' ),
				'name' 		=> 'schedule_time_text_typography',
				'selector' 	=> '{{WRAPPER}} .bafe-addon-content .spdiner-time',
			]
		);

		$this->add_control(
			'schedule_border_one_color',
			[
				'label'		=> __( 'Border-1 Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bafe-diner-schedule-info:befter' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_responsive_control(
			'schedule_spacing',
			[
				'label' => esc_html__( 'Spacing', 'bafe' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bafe-addon-content .spdiner-time' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
	}

	protected function render( ) {
		$settings = $this->get_settings(); ?>
		
		<!-- bafe-restaurant-schedule -->
		<div id="bafe-restaurant-schedule">
			<div id="restaurant-schedule" class="clearfix ">
				<div class="bafe-addon bafe-addon-text-block bafe-text-center bafe-diner-schedule-info">
					<?php if( !empty($settings['schedule_header_text']) ) { ?>
						<h5 class="bafe-addon-title"><?php echo esc_html($settings['schedule_header_text']); ?></h5>
					<?php } ?>
					<div class="bafe-addon-content">
						<?php foreach($settings['schedule_menu_list'] as $list) { ?>
							<h4><?php echo esc_html($list['schedule_title_text']); ?></h4>
							<h4 class="spdiner-time"><?php echo esc_html($list['schedule_time_text']);?></h4>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<?php 
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new BAFE_Widget_BAFE_Restaurant_Schedule() );
