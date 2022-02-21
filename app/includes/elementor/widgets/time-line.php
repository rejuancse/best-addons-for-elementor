<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Time_Line extends Widget_Base {
	public function get_name() {
		return 'time-line';
	}

	public function get_title() {
		return __( 'Time Line', 'wpew' );
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


		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'timeline_title',
			[
				'label' => __( 'Timeline Title', 'wpew' ),
				'type' => Controls_Manager::TEXT,
                'default'   => 'Co-Founder',   
            ]
		);

        $repeater->add_control(
			'timeline_intro',
			[
				'label' => __( 'Timeline Intro', 'wpew' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem ipsum dolor sit amet', 'wpew' ),
            ]
		);

		$repeater->add_control(
			'timeline_datetime',
			[
				'label' => __( 'Timeline date Intro', 'wpew' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '18 March, 2021', 'wpew' ),
            ]
		);


		$this->add_control(
			'timeline_list',
			[
				'label' => esc_html__( 'Timeline List', 'wpew' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'timeline_title' => esc_html__( 'Co-Founder', 'wpew' ),
						'timeline_intro' => 'Lorem ipsum dolor sit amet',
						'timeline_datetime' => '18 March, 2021'
					],
				],
			]
		);

        $this->end_controls_section();
        # Option End

		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Timeline Title
		$this->add_control(
			'timeline_title',
			[
				'label'		=> __( 'Timeline Title Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .timeline-description h6' => 'color: {{VALUE}};',
					'{{WRAPPER}} .timeline-description:hover:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .timeline-date:hover:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		# Timeline Intro
		$this->add_control(
			'timeline_intro',
			[
				'label'		=> __( 'Timeline Intro Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .timeline-description p' => 'color: {{VALUE}};',
				],
			]
		);

		# Timeline Datetime
		$this->add_control(
			'timeline_datetime',
			[
				'label'		=> __( 'Timeline Datetime Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .timeline-date p' => 'color: {{VALUE}};',
				],
			]
		);

		# Timeline Row 
		$this->add_control(
			'timeline_row',
			[
				'label'		=> __( 'Timeline Line Color', 'wpew' ),
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


		# Timeline Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Timeline Title Typography', 'wpew' ),
				'name' 		=> 'title_typography',
				'selector' 	=> '{{WRAPPER}} .timeline-description h6',
			]
		);

		

		# Timeline Intro Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Timeline Intro Typography', 'wpew' ),
				'name' 		=> 'intro_typography',
				'selector' 	=> '{{WRAPPER}} .timeline-description p',
			]
		);



		# Timeline Datetime Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Timeline Datetime Typography', 'wpew' ),
				'name' 		=> 'datetime_typography',
				'selector' 	=> '{{WRAPPER}} .timeline-date p',
			]
		);


        $this->add_responsive_control(
            'text_margin',
            [
                'label' 		=> __( 'Title Margin', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .banner_one' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );
		$this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings();
		$timeline_list = $settings['timeline_list'];
		?>


		<section class="timeline-area">
            <div class="time-line-row pos-reletive">

                <div class="timeline-row"></div>
				
				<?php $counter = 0 ?>
				<?php foreach($timeline_list as $value) { ?>
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
