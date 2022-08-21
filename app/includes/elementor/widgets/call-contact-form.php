<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function bafe_contact_form(){

	$args = array( 'post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1 );

	$contact_forms = array();
	if( $data = get_posts($args)){
		foreach($data as $key){
			$contact_forms[$key->ID] = $key->post_title;
		}
	}else{
		$contact_forms['0'] = esc_html__('No Contact Form found', 'bafe');
	}

    return $contact_forms;
}

class BAFE_Widget_BAFE_Call_Contact_Form extends Widget_Base {
	public function get_name() {
		return 'bafe-call-contact-form';
	}

	public function get_title() {
		return __( 'Call Contact Form', 'bafe' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'bafe-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Call Contact Form', 'bafe' )
            ]
        );

        $this->add_control(
            'callto_action_title',
            [
                'label' => __( 'Title', 'bafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title', 'bafe' ),
                'default' => __( 'This is heading', 'bafe' ),
            ]
        );

        $this->add_control(
            'subtitle_content',
            [
                'label' => __( 'Sub Title Content', 'bafe' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Enter Sub Title', 'bafe' ),
                'default' => __( 'Write your sub title content of this section.', 'bafe' ),
            ]
        );    
		
		$this->add_control(
            'action_button',
            [
                'label' => __( 'Button Name', 'bafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Button Name', 'bafe' ),
                'default' => __( 'Contact us Today', 'bafe' ),
            ]
        );

		$this->add_control(
			'contact_button',
			[
				'label' 		=> __( 'Contact Form', 'bafe' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options'		=> bafe_contact_form(),
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

		$this->add_control(
			'section_bg_color',
			[
				'label'		=> __( 'Section Background Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .call_action_wrap-wrap' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
            'call_form_padding',
            [
                'label' 		=> __( 'Padding', 'bafe' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .call_action_wrap-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );

        $this->add_responsive_control(
			'contact_form_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bafe' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .call_action_wrap-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'		=> __( 'Text Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .call_action_wrap h3' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography',
				'selector' 	=> '{{WRAPPER}} .call_action_wrap h3',
			]
		);

		$this->end_controls_section();
		# Title Section end 1

		# Sub Title Section 2
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' 	=> __( 'Sub Title', 'bafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'		=> __( 'Subtitle Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .call_action_wrap span' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography2',
				'selector' 	=> '{{WRAPPER}} .call_action_wrap span',
			]
		);
		$this->end_controls_section();
		# Subtitle part 2 end

        # Button Style
		$this->start_controls_section(
			'action_button_style',
			[
				'label' 	=> __( 'Button Style', 'bafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'		=> __( 'Button Text Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.btn-call_action_wrap' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'		=> __( 'Button Text Hover Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.btn-call_action_wrap:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background',
			[
				'label'		=> __( 'Button BG Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.btn-call_action_wrap' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_background',
			[
				'label'		=> __( 'Button Hover BG Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.btn-call_action_wrap:hover' => 'background: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography3',
				'selector' 	=> '{{WRAPPER}} .btn.btn-call_action_wrap',
			]
		);

		$this->add_responsive_control(
            'call_form_btn_padding',
            [
                'label' 		=> __( 'Padding', 'bafe' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .btn.btn-call_action_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );

		$this->add_responsive_control(
			'contact_form_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bafe' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .btn.btn-call_action_wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		# Subtitle part 2 end
	}

	protected function render( ) {
		$settings = $this->get_settings(); 
		$contact_button = $settings['contact_button']; ?>

		<div class="call_action_wrap-wrap">		
			<div class="call_action_wrap">
				<div class="call_action_wrap-head">
					<?php if( $settings['callto_action_title'] ){ ?>
						<h3><?php echo esc_html($settings['callto_action_title']); ?></h3>
					<?php } ?>
					<?php if( $settings['subtitle_content'] ){ ?>
						<span><?php echo esc_html($settings['subtitle_content']); ?></span>
					<?php } ?>
				</div>

				<?php if( $settings['contact_button'] ){ ?>
					<a class="btn btn-call_action_wrap Click-here" data-toggle="modal" data-target="#myModal" href="#"><?php echo esc_html($settings['action_button']); ?></a>
				<?php } ?>

				<div class="custom-model-main">
					<div class="custom-model-inner">        
					<div class="close-btn">×</div>
						<div class="custom-model-wrap">
							<div class="pop-up-content-wrap">
								<?php echo '[contact-form-7 id="'.__($contact_button, 'bafe').'" title="Contact Form"]'; ?>
							</div>
						</div>  
					</div>  
					<div class="bg-overlay"></div>
				</div> 

			</div>	
		</div>

		<?php 
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new BAFE_Widget_BAFE_Call_Contact_Form() );
