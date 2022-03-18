<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_WPEW_Events_List extends Widget_Base {
	public function get_name() {
		return 'wpew-events-list';
	}

	public function get_title() {
		return __( 'Events List', 'wpew' );
	}

	public function get_icon() {
		return 'eicon-slideshow';
	}

	public function get_categories() {
		return [ 'wpew-elementor' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Event List', 'wpew' ),
			]
		);

		$this->add_control(
			'events_list',
			[
				'label' 		=> __( 'Event Items', 'wpew' ),
				'type' 			=> Controls_Manager::REPEATER,
				'show_label'  	=> true,
				'default' 		=> [
					[
						'text' => __( 'Event #1', 'wpew' ),
						'icon' => 'fa fa-check',
					],	
				],
				'fields' 		=> [
				    [
				    	'name' 			=> 'event_image',
				        'label'         => __( 'Event Image', 'wpew' ),
				        'type'          => Controls_Manager::MEDIA,
				        'label_block'   => true,
				        'default'       => [
											'url' => Utils::get_placeholder_image_src(),
										],
				    ],
					[
						'name' 			=> 'event_title',
						'label' 		=> __( 'Title', 'wpew' ),
						'type' 			=> Controls_Manager::TEXTAREA,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Title', 'wpew' ),
						'default' 		=> __( 'Join the Biggest Rock Star Event 2022', 'wpew' ),
					],
					[
						'name' 			=> 'event_content',
						'label' 		=> __( 'Events Content', 'wpew' ),
						'type' 			=> Controls_Manager::TEXTAREA,
						'label_block' 	=> true,
						'placeholder' 	=> __( '', 'wpew' ),
						'default' 		=> __('Audio player software is used to play back sound recordings in one of the many formats available for computers today. It can also play back music. There is audio player software that is native to the computer’s operating system', 'wpew'),
					],
					[
						'name' 			=> 'event_button_1',
						'label' 		=> __( 'Button Text 1', 'wpew' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'wpew' ),
						'default' 		=> __( 'Buy Now', 'wpew' ),
					],
					[
						'name' 			=> 'event_button_link_1',
						'label' 		=> __( 'Button Link 1', 'wpew' ),
						'type' 			=> Controls_Manager::TEXT,
						'placeholder' 	=> 'http://your-link.com',
						'default' 		=> '#'
					],
					[
						'name' 			=> 'event_button_2',
						'label' 		=> __( 'Button Text 2', 'wpew' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'wpew' ),
						'default' 		=> __( 'Read More', 'wpew' ),
					],
					[
						'name' 			=> 'event_button_link_2',
						'label' 		=> __( 'Button Link 2', 'wpew' ),
						'type' 			=> Controls_Manager::TEXT,
						'placeholder' 	=> 'http://your-link.com',
						'default' 		=> '#'
					],
				],
			]
		);
        $this->end_controls_section();

        # Title Section Start
        $this->start_controls_section(
			'section_style',
			[
				'label' 	=> __( 'Title Style', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Margin', 'wpew' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .event-content-inner h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
        $this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Title Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner h1' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'wpew' ),
				'selector' 	=> '{{WRAPPER}} .event-content-inner h1',
			]
		);
		$this->end_controls_section();
		# Title Section End


		# Content Section Start
		$this->start_controls_section(
			'section_content_style',
			[
				'label' 	=> __( 'Content Style', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'content_padding',
			[
				'label' 		=> __( 'Content Margin', 'wpew' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .event-content-inner p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
        $this->add_control(
			'content_color',
			[
				'label' 	=> __( 'Content Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'content_typography',
				'label' 	=> __( 'Content Typography', 'wpew' ),
				'selector' 	=> '{{WRAPPER}} .event-content-inner p',
			]
		);
		$this->end_controls_section();
		# Content Section End
		
		# Button 1 Start
		$this->start_controls_section(
			'section_button_1_style',
			[
				'label' 	=> __( 'Button 1 Style', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'button_1_color',
			[
				'label' 	=> __( 'Button 1 Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner .btn-1' => 'color: {{VALUE}};',
				],
			]
		);
		 $this->add_control(
			'button_1_hover_color',
			[
				'label' 	=> __( 'Button 1 Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner .btn-1:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_1_background_color',
			[
				'label' 	=> __( 'Background Color A', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner .btn-1' => 'background-color: {{VALUE}};',
				],
			]
		);
		 $this->add_control(
			'button_1_background_gradient_color',
			[
				'label' 	=> __( 'Background Color B', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner .btn-1' => 'background-image:linear-gradient(180deg, {{button_1_background_color.VALUE}} 0%, {{VALUE}} 100%);',
				],
			]
		);
		$this->add_control(
			'button_1_background_hover_color',
			[
				'label' 	=> __( 'Background Hover A Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner .btn-1:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		 $this->add_control(
			'button_1_background_gradient_hover_color',
			[
				'label' 	=> __( 'Background Hover B Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner .btn-1:hover' => 'background-image:linear-gradient(180deg, {{button_1_background_hover_color.VALUE}} 0%, {{VALUE}} 100%);',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_1_typography',
				'label' 	=> __( 'Button 1 Typography', 'wpew' ),
				'selector' 	=> '{{WRAPPER}} .event-content-inner .btn-1',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'button_1_border',
				'label' 		=> __( 'Border', 'wpew' ),
				'placeholder' 	=> '1px',
				'default' 		=> '1px',
				'selector' 		=> '{{WRAPPER}} .event-content-inner .btn-1',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'button_1_hover_border',
				'label' 		=> __( 'Border Hover', 'wpew' ),
				'placeholder' 	=> '1px',
				'default' 		=> '1px',
				'selector' 		=> '{{WRAPPER}} .event-content-inner .btn-1:hover',
			]
		);
		$this->add_control(
			'button_1_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'wpew' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} a.event-content-inner .btn-1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 			=> 'button_1_shadow',
				'selector' 		=> '{{WRAPPER}} .event-content-inner .btn-1',
			]
		);
		$this->add_control(
			'button_1_padding',
			[
				'label' 		=> __( 'Button 1 Padding', 'wpew' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .event-content-inner .btn-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
            'button_1_margin',
            [
                'label' 		=> __( 'Button Margin', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .event-content-inner .btn-1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
		$this->end_controls_section();
		# Button 1 End

		# Button 2 Start
		$this->start_controls_section(
			'section_button_2_style',
			[
				'label' 	=> __( 'Button 2 Style', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'button_2_color',
			[
				'label' 	=> __( 'Button 2 Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner .btn-transparent' => 'color: {{VALUE}};',
				],
			]
		);
		 $this->add_control(
			'button_2_hover_color',
			[
				'label' 	=> __( 'Button 2 Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner .btn-transparent:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_2_background_color',
			[
				'label' 	=> __( 'Background Color A', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner .btn-transparent' => 'background-color: {{VALUE}};',
				],
			]
		);
		 $this->add_control(
			'button_2_background_gradient_color',
			[
				'label' 	=> __( 'Background Color B', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner .btn-transparent' => 'background-image:linear-gradient(180deg, {{button_1_background_color.VALUE}} 0%, {{VALUE}} 100%);',
				],
			]
		);
		$this->add_control(
			'button_2_background_hover_color',
			[
				'label' 	=> __( 'Background Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner .btn-transparent:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		 $this->add_control(
			'button_2_background_gradient_hover_color',
			[
				'label' 	=> __( 'Background Hover B Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .event-content-inner .btn-transparent:hover' => 'background-image:linear-gradient(180deg, {{button_1_background_hover_color.VALUE}} 0%, {{VALUE}} 100%);',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_2_typography',
				'label' 	=> __( 'Button 2 Typography', 'wpew' ),
				'selector' 	=> '{{WRAPPER}} .event-content-inner .btn-transparent',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'button_2_border',
				'label' 		=> __( 'Border', 'wpew' ),
				'placeholder' 	=> '1px',
				'default' 		=> '1px',
				'selector' 		=> '{{WRAPPER}} .event-content-inner .btn-transparent',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'button_2_hover_border',
				'label' 		=> __( 'Border Hover', 'wpew' ),
				'placeholder' 	=> '1px',
				'default' 		=> '1px',
				'selector' 		=> '{{WRAPPER}} .event-content-inner .btn-transparent:hover',
			]
		);
		$this->add_control(
			'button_2_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'wpew' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} a.event-content-inner .btn-transparent' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 			=> 'button_2_shadow',
				'selector' 		=> '{{WRAPPER}} .event-content-inner .btn-transparent',
			]
		);
		$this->add_control(
			'button_2_padding',
			[
				'label' 		=> __( 'Button 2 Padding', 'wpew' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .event-content-inner .btn-transparent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
            'button_2_margin',
            [
                'label' 		=> __( 'Button Margin', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .event-content-inner .btn-transparent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
		$this->end_controls_section();
		# Button 2 End

	}

	protected function render( ) {
		$settings = $this->get_settings(); ?>

		<div class="event_content_wrapper">
			<?php foreach ( $settings['events_list'] as $item ) : ?>	
				<div class="event-single-wrapper">
					
					<div class="wpew-row align-items-center">
						<div class="d-inline-block wpew-col-4 about_left_img">
							<img src="<?php echo $item['event_image']['url'] ?>" alt="">
						</div>
						<div class="d-inline-block wpew-col-8 event_content">
							<div class="event-content-inner">
								<h2><?php echo $item['event_title']?></h2>
								<p><?php echo $item['event_content']?></p>
								<?php if($item['event_button_1']) { ?>
								<a href="<?php echo $item['event_button_link_1']?>" class="btn btn-1">
									<?php echo $item['event_button_1']?>
								</a>
								<?php } ?>
								<?php if($item['event_button_2']) { ?>
								<a href="<?php echo $item['event_button_link_2']?>"  class="btn btn-transparent">
									<?php echo $item['event_button_2']?>
								</a>
								<?php } ?>
							</div>
						</div>
					</div>
					
				</div>
			<?php endforeach; ?>
		</div>
	
	<?php 
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPEW_events_List() );
