<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_WPEW_Call_Action_Wrap extends Widget_Base {
	public function get_name() {
		return 'wpew-call-action-wrap';
	}

	public function get_title() {
		return __( 'Call Action Wrap', 'wpew' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'wpew-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Call to Action Element', 'wpew' )
            ]
        );

        $this->add_control(
            'callto_action_title',
            [
                'label' => __( 'Title', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title', 'wpew' ),
                'default' => __( 'This is heading', 'wpew' ),
            ]
        );
        $this->add_control(
            'subtitle_content',
            [
                'label' => __( 'Sub Title Content', 'wpew' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Enter Sub Title', 'wpew' ),
                'default' => __( 'Write your sub title content of this section.', 'wpew' ),
            ]
        );    
		
		$this->add_control(
            'action_button',
            [
                'label' => __( 'Button Name', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Button Name', 'wpew' ),
                'default' => __( 'Contact us Today', 'wpew' ),
            ]
        );

		$this->add_control(
            'action_button_url',
            [
                'label' => __( 'Button URL', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Use url', 'wpew' ),
                'default' => '#',
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

		$this->add_control(
			'section_bg_color',
			[
				'label'		=> __( 'Section Background Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-bg' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
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
				'label' 	=> __( 'Sub Title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'		=> __( 'Subtitle Color', 'wpew' ),
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
				'label' 	=> __( 'Button Style', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'		=> __( 'Button Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.btn-call_action_wrap' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background',
			[
				'label'		=> __( 'Button BG Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.btn-call_action_wrap' => 'color: {{VALUE}};',
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

		# Subtitle part 2 end
	}

	protected function render( ) {
		$settings = $this->get_settings();  ?>

		<section class="theme-bg call_action_wrap-wrap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						
						<div class="call_action_wrap">
							<div class="call_action_wrap-head">
								<?php if( $settings['callto_action_title'] ){ ?>
									<h3><?php echo $settings['callto_action_title']; ?></h3>
								<?php } ?>
								<?php if( $settings['subtitle_content'] ){ ?>
									<span><?php echo $settings['subtitle_content']; ?></span>
								<?php } ?>
							</div>
							<?php if( $settings['action_button_url'] ){ ?>
								<a href="<?php echo $settings['action_button_url']; ?>" class="btn btn-call_action_wrap"><?php echo $settings['action_button']; ?></a>
							<?php } ?>
						</div>
						
					</div>
				</div>
			</div>
		</section>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPEW_Call_Action_Wrap() );
