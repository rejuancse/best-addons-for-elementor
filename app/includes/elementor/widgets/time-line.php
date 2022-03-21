<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Time_Line extends Widget_Base {
	public function get_name() {
		return 'time-line';
	}

	public function get_title() {
		return __( 'Time Line', 'eafe' );
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

		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'timeline_title',
			[
				'label' => __( 'Timeline Title', 'eafe' ),
				'type' => Controls_Manager::TEXT,
                'default'   => 'Co-Founder',   
            ]
		);

        $repeater->add_control(
			'timeline_intro',
			[
				'label' => __( 'Timeline Intro', 'eafe' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem ipsum dolor sit amet', 'eafe' ),
            ]
		);

		$repeater->add_control(
			'timeline_datetime',
			[
				'label' => __( 'Timeline date Intro', 'eafe' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '18 March, 2021', 'eafe' ),
            ]
		);

		$this->add_control(
			'timeline_list',
			[
				'label' => esc_html__( 'Timeline List', 'eafe' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'timeline_title' => esc_html__( 'Co-Founder', 'eafe' ),
						'timeline_intro' => 'Lorem ipsum dolor sit amet',
						'timeline_datetime' => '18 March, 2021'
					],
				],
			]
		);

        $this->end_controls_section();
        # Option End


		// Timeline Style
		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Title Style', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Timeline Title
		$this->add_control(
			'timeline_title',
			[
				'label'		=> __( 'Timeline Title Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .timeline-description h6' => 'color: {{VALUE}};',
					'{{WRAPPER}} .timeline-description:hover:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .timeline-date:hover:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		# Timeline Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Timeline Title Typography', 'eafe' ),
				'name' 		=> 'title_typography',
				'selector' 	=> '{{WRAPPER}} .timeline-description h6',
			]
		);

		$this->add_responsive_control(
			'timeline_title_space',
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
					'{{WRAPPER}} .timeline-area .timeline-description h6' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		/**
		 * Timeline Intro Style
		 */
		$this->add_control(
			'timeline_intro_section',
			[
				'label' => esc_html__( 'Intro Text Style', 'eafe' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		# Timeline Intro
		$this->add_control(
			'timeline_intro',
			[
				'label'		=> __( 'Timeline Intro Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .timeline-description p' => 'color: {{VALUE}};',
				],
			]
		);

		# Timeline Intro Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Timeline Intro Typography', 'eafe' ),
				'name' 		=> 'intro_typography',
				'selector' 	=> '{{WRAPPER}} .timeline-description p',
			]
		);

		$this->add_control(
			'timeline_datetime_section',
			[
				'label' => esc_html__( 'Datetime Style', 'eafe' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		# Timeline Datetime
		$this->add_control(
			'timeline_datetime',
			[
				'label'		=> __( 'Timeline Datetime Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .timeline-date p' => 'color: {{VALUE}};',
				],
			]
		);

		# Timeline Datetime Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Timeline Datetime Typography', 'eafe' ),
				'name' 		=> 'datetime_typography',
				'selector' 	=> '{{WRAPPER}} .timeline-date p',
			]
		);

		$this->add_control(
			'timeline_style',
			[
				'label' => esc_html__( 'Timeline Style', 'eafe' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		# Timeline Row 
		$this->add_control(
			'timeline_row',
			[
				'label'		=> __( 'Timeline Line Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .timeline-row' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .timeline-row:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .timeline-row:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .timeline-description::after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .timeline-description::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .timeline-date::after' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings();
		$timeline_list = $settings['timeline_list']; ?>

		<section class="timeline-area">
            <div class="time-line-row pos-reletive">
                <div class="timeline-row"></div>
				<?php 
				$counter = 0;
				foreach($timeline_list as $value) { ?>
					<?php if($counter%2==0){ ?>
						<div class="timeline-col-6"> 
							<div class="timeline-left-content timeline-text-right">
									<div class="timeline-description">
										<?php if($value['timeline_title']) { ?>
											<h6> <?php echo $value['timeline_title'] ?> </h6>
										<?php } ?>

										<?php if($value['timeline_intro']) { ?>
											<p> <?php echo $value['timeline_intro'] ?> </p>
										<?php } ?>
									</div>
							</div>
						</div>

						<div class="timeline-col-6">
							<div class="timeline-right-content text-left">
									<div class="timeline-date">
										<?php if($value['timeline_datetime']) { ?>
											<p> <?php echo $value['timeline_datetime'] ?> </p>
										<?php } ?>
									</div>
							</div>
						</div>
					<?php }else{ ?>
						<div class="timeline-col-6"> 
							<div class="timeline-left-content timeline-text-right">
									<div class="timeline-date">
									    <?php if($value['timeline_datetime']) { ?>
											<p> <?php echo $value['timeline_datetime'] ?> </p>
										<?php } ?>
									</div>
							</div>
						</div>

						<div class="timeline-col-6">
							<div class="timeline-right-content text-left">
									<div class="timeline-description">
										<?php if($value['timeline_title']) { ?>
											<h6> <?php echo $value['timeline_title'] ?> </h6>
										<?php } ?>

										<?php if($value['timeline_intro']) { ?>
											<p> <?php echo $value['timeline_intro'] ?> </p>
										<?php } ?>
									</div>
							</div>
						</div>
					<?php } ?>
					<?php $counter++ ?>
				<?php } ?> 
            </div>
        </section>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Time_Line() );
