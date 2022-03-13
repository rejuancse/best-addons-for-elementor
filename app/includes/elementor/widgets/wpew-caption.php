<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_WPEW_Lmp_Caption extends Widget_Base {
	public function get_name() {
		return 'kitolms-lmp-caption';
	}

	public function get_title() {
		return __( 'WPEW Caption', 'wpew' );
	}

	public function get_icon() {	
		return 'eicon-bullet-list';
	}

	public function get_categories() {
		return [ 'wpew-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'WPEW Caption', 'wpew' ),
			]
		);

		$this->add_control(
            'style',
            [
                'label'     => __( 'Icons/Digit', 'wpew' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'digit',
                'options'   => [
                        'digit' 	=> __( 'Digit', 'wpew' ),
                        'icon' 	=> __( 'Icon', 'wpew' ),
                    ],
            ]
        );

		$this->add_control(
			'caption_icon',
			[
				'label' 	=> esc_html__( 'Caption Icon', 'wpew' ),
				'type' 		=> Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' 		=> [
					'value' 	=> 'fas fa-star',
					'library' 	=> 'fa-solid',
				],
				'condition' => [
					'style' => 'icon'
				]
			]
		);

		$this->add_control(
			'caption_digit',
			[
				'label' => esc_html__( 'Digit Number', 'wpew' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 1,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'style' => 'digit'
				]
			]
		);

		$this->add_control(
            'caption_title',
            [
                'label' => __( 'Title', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Create Account', 'wpew' ),
            ]
        );

        $this->add_control(
            'caption_descriptions',
            [
                'label' => __( 'Description', 'wpew' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Oluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.', 'wpew', 'wpew' ),
            ]
        ); 

        $this->end_controls_section();


		# Icon Style.
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' 	=> __( 'Caption Digit/Icon Style', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'caption_icon_color',
			[
				'label'		=> __( 'Digit/Icons Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .lmp_caption .theme-bg .h5' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'caption_icon_bg_color',
			[
				'label'		=> __( 'Digit/Icons BG Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lmp_caption .theme-bg' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography_icon',
				'selector' 	=> '{{WRAPPER}} .lmp_caption .theme-bg .h5',
			]
		);

		$this->end_controls_section();


        # Title Style.
		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Caption Title Style', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'caption_title_color',
			[
				'label'		=> __( 'Title Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lmp_caption h4' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography',
				'selector' 	=> '{{WRAPPER}} .lmp_caption h4',
			]
		);

		$this->add_responsive_control(
            'caption_title_margin',
            [
                'label' => __( 'Title Margin', 'wpew' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .lmp_caption h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

		$this->end_controls_section();

		# SubTitle Style.
		$this->start_controls_section(
			'section_descriptions_style',
			[
				'label' 	=> __( 'Caption Descriptions Style', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'caption_descriptions_color',
			[
				'label'		=> __( 'Descriptions Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lmp_caption p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography_descriptions',
				'selector' 	=> '{{WRAPPER}} .lmp_caption p',
			]
		);

		$this->add_responsive_control(
            'caption_descriptions_margin',
            [
                'label' => __( 'Title Margin', 'wpew' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .lmp_caption p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
		
		$this->end_controls_section();

	}

	protected function render( ) {
		$settings = $this->get_settings();
		$style = $settings['style'];
		$caption_digit = $settings['caption_digit'];
		$caption_title = $settings['caption_title'];
		$descriptions = $settings['caption_descriptions']; ?>

		<div class="lmp_caption">
			<div class="d-flex align-items-start">
				<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">	
					<div class="position-absolute h5 mb-0">
						<?php
							if($style === 'digit') {
								echo esc_html($caption_digit);
							}else {
								Icons_Manager::render_icon( $settings['caption_icon'], [ 'aria-hidden' => 'true' ] );
							}
						?>
					</div>
				</div>

				<div class="ml-3 ml-md-4">
					<?php if( $settings['caption_title'] ){ ?>
						<h4><?php echo $settings['caption_title']; ?></h4>
					<?php } ?>
					<?php if( $settings['caption_descriptions'] ){ ?>
						<p><?php echo $settings['caption_descriptions']; ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
	
	<?php 
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPEW_Lmp_Caption() );
