<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_CountDown extends Widget_Base {
	public function get_name() {
		return 'count-down';
	}

	public function get_title() {
		return __( 'Count Down', 'wpew' );
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

		# Countdown intro
		$this->add_control(
            'countdown_intro',
            [
                'label' => __( 'CountDown Intro', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter intro text', 'wpew' ),
                'default' => __( 'Ends In', 'wpew' ),
            ]
        );

		# Date time
        $this->add_control(
            'date_time',
            [
                'label' => __( 'Choose Date Time', 'wpew' ),
                'type' => Controls_Manager::DATE_TIME,
                'label_block' => true,
                'placeholder' => __( 'Enter Date Time', 'wpew' ),
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

		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'CountDown Title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Title text color
		$this->add_control(
			'title_text_color',
			[
				'label'		=> __( 'Title Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .countdown-wrap .deal_counter .list-inline-item' => 'color: {{VALUE}};',
					'{{WRAPPER}} .countdown-wrap .deal_counter .list-inline-item span.seperator' => 'color: {{VALUE}};',
				],
			]
		);

		# Title text color
		$this->add_control(
			'countdown_bg_color',
			[
				'label'		=> __( 'Background Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .countdown-wrap .deal_counter.bgc-thm' => 'background-color: {{VALUE}};',
				],
			]
		);

		# Title text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'CountDown Typography', 'wpew' ),
				'name' 		=> 'countdown_typography',
				'selector' 	=> '{{WRAPPER}} .countdown-wrap .deal_counter .list-inline-item',
			]
		);

		# Padding
		$this->add_responsive_control(
            'countdown_padding',
            [
                'label' 		=> __( 'Padding', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .countdown-wrap .deal_counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );

		/**
		 * Intro Text
		 */
		$this->add_control(
			'timeline_intro_section',
			[
				'label' => esc_html__( 'Intro Text Style', 'wpew' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		# Title text color
		$this->add_control(
			'intro_text_color',
			[
				'label'		=> __( 'Intro Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .countdown-wrap .deal_counter .list-inline-item .title' => 'color: {{VALUE}};',
				],
			]
		);

		# Title text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Intro Text Typography', 'wpew' ),
				'name' 		=> 'intro_typography',
				'selector' 	=> '{{WRAPPER}} .countdown-wrap .deal_counter .list-inline-item .title',
			]
		);

		$this->add_responsive_control(
			'intro_text_space',
			[
				'label' => esc_html__( 'Spacing', 'wpew' ),
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
					'{{WRAPPER}} .countdown-wrap .deal_counter .list-inline-item .title' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		# Title Section end 1

	}

	protected function render( ) {
		$settings = $this->get_settings();
		$countdown_intro = $settings['countdown_intro'];
		$date_time = strtotime($settings['date_time']);
		$date = date_i18n("d M Y G:i", strtotime($settings['date_time'])); ?>

		<div class="countdown-wrap">
			<div class="deal_countdown">
				<ul class="deal_counter bgc-thm" id="timer" data-endtime="<?php echo esc_html($date); ?>">
					<?php if( ! empty($countdown_intro) ) { ?>
						<li class="list-inline-item"><span class="title"><?php echo esc_html($countdown_intro); ?>:</span></li>
					<?php } ?>
					<li class="list-inline-item days"></li>
					<li class="list-inline-item"><span class="seperator">:</span></li>
					<li class="list-inline-item hours"></li>
					<li class="list-inline-item"><span class="seperator">:</span></li>
					<li class="list-inline-item minutes"></li>
					<li class="list-inline-item"><span class="seperator">:</span></li>
					<li class="list-inline-item seconds"></li>
				</ul>
			</div>
		</div>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_CountDown() );
