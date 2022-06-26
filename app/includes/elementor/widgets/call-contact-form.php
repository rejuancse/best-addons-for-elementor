<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function eafe_contact_form(){

	$args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);

	$contact_forms = array();
	if( $data = get_posts($args)){
		foreach($data as $key){
			$contact_forms[$key->ID] = $key->post_title;
		}
	}else{
		$contact_forms['0'] = esc_html__('No Contact Form found', 'eafe');
	}

    return $contact_forms;
}

class Widget_EAFE_Call_Contact_Form extends Widget_Base {
	public function get_name() {
		return 'eafe-call-contact-form';
	}

	public function get_title() {
		return __( 'Call Contact Form', 'eafe' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'eafe-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Call Contact Form', 'eafe' )
            ]
        );

        $this->add_control(
            'callto_action_title',
            [
                'label' => __( 'Title', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title', 'eafe' ),
                'default' => __( 'This is heading', 'eafe' ),
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
		
		$this->add_control(
            'action_button',
            [
                'label' => __( 'Button Name', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Button Name', 'eafe' ),
                'default' => __( 'Contact us Today', 'eafe' ),
            ]
        );

		$this->add_control(
			'contact_button',
			[
				'label' 		=> __( 'Contact Form', 'eafe' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options'		=> eafe_contact_form(),
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
			'section_bg_color',
			[
				'label'		=> __( 'Section Background Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .call_action_wrap-wrap' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
            'call_form_padding',
            [
                'label' 		=> __( 'Padding', 'eafe' ),
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
				'label' => esc_html__( 'Border Radius', 'eafe' ),
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
				'label'		=> __( 'Text Color', 'eafe' ),
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
				'label' 	=> __( 'Button Style', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'		=> __( 'Button Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.btn-call_action_wrap' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'		=> __( 'Button Text Hover Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.btn-call_action_wrap:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background',
			[
				'label'		=> __( 'Button BG Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.btn-call_action_wrap' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_background',
			[
				'label'		=> __( 'Button Hover BG Color', 'eafe' ),
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
                'label' 		=> __( 'Padding', 'eafe' ),
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
				'label' => esc_html__( 'Border Radius', 'eafe' ),
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
						<h3><?php echo $settings['callto_action_title']; ?></h3>
					<?php } ?>
					<?php if( $settings['subtitle_content'] ){ ?>
						<span><?php echo $settings['subtitle_content']; ?></span>
					<?php } ?>
				</div>

				<?php if( $settings['contact_button'] ){ ?>
					<a class="btn btn-call_action_wrap Click-here" data-toggle="modal" data-target="#myModal" href="#"><?php echo $settings['action_button']; ?></a>
				<?php } ?>

				<div class="custom-model-main">
					<div class="custom-model-inner">        
					<div class="close-btn">×</div>
						<div class="custom-model-wrap">
							<div class="pop-up-content-wrap">
								<?php echo '[contact-form-7 id="'.$contact_button.'" title="Contact Form"]'; ?>
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_EAFE_Call_Contact_Form() );
