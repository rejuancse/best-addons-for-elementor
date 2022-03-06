<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Media_Card extends Widget_Base {
	public function get_name() {
		return 'media-card';
	}

	public function get_title() {
		return __( 'Media Card', 'wpew' );
	}

	public function get_icon() {
		return 'eicon-site-title';
	}

	public function get_categories() {
		return [ 'wpew-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_button',
			[
				'label' => esc_html__( 'Button', 'elementor' ),
			]
		);

		# Media applynow button type
		$this->add_control(
			'media_button_type',
			[
				'label' => esc_html__( 'Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'elementor' ),
					'primary' => esc_html__( 'Primay', 'elementor' ),
					'success' => esc_html__( 'Success', 'elementor' ),
					'info' => esc_html__( 'Info', 'elementor' ),
					'warning' => esc_html__( 'Warning', 'elementor' ),
					'danger' => esc_html__( 'Danger', 'elementor' ),
					'dark' => esc_html__( 'Dark', 'elementor' ),
				],
			]
		);

		# Media applynow button text
		$this->add_control(
			'media_applynow_button_text',
			[
				'label' => esc_html__( 'Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Apply Now', 'elementor' ),
				'placeholder' => esc_html__( 'Apply Now', 'elementor' ),
			]
		);

		# Media applynow button url
		$this->add_control(
			'media_applynow_button_url',
			[
				'label' => esc_html__( 'Url', 'elementor' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-url.com', 'elementor' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		# Media applynow button responsive
		$this->add_responsive_control(
			'media_applynow_button_align',
			[
				'label' => esc_html__( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);

		$this->add_control(
			'media_applynow_button_selected_icon',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'skin' => 'inline',
				'label_block' => false,
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label' => esc_html__( 'Icon Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'elementor' ),
					'right' => esc_html__( 'After', 'elementor' ),
				],
				'condition' => [
					'selected_icon[value]!' => '',
				],
			]
		);

		// $this->add_control(
		// 	'icon_indent',
		// 	[
		// 		'label' => esc_html__( 'Icon Spacing', 'elementor' ),
		// 		'type' => Controls_Manager::SLIDER,
		// 		'range' => [
		// 			'px' => [
		// 				'max' => 50,
		// 			],
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .elementor-button .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
		// 			'{{WRAPPER}} .elementor-button .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
		// 		],
		// 	]
		// );

		$this->end_controls_section();

		# Button Style
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Button', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		# Media card apply now button typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Media Card Apply Now Button Typography', 'wpew' ),
				'name' 		=> 'media_apply_now_btn_typography',
				'selector' 	=> '{{WRAPPER}} .btn',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .btn',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'elementor' ),
			]
		);

		// $this->add_control(
		// 	'button_text_color',
		// 	[
		// 		'label' => esc_html__( 'Text Color', 'elementor' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'default' => '',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .elementor-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	Group_Control_Background::get_type(),
		// 	[
		// 		'name' => 'background',
		// 		'label' => esc_html__( 'Background', 'elementor' ),
		// 		'types' => [ 'classic', 'gradient' ],
		// 		'exclude' => [ 'image' ],
		// 		'selector' => '{{WRAPPER}} .elementor-button',
		// 		'fields_options' => [
		// 			'background' => [
		// 				'default' => 'classic',
		// 			],
		// 			'color' => [
		// 				'global' => [
		// 					'default' => Global_Colors::COLOR_ACCENT,
		// 				],
		// 			],
		// 		],
		// 	]
		// );

		// $this->end_controls_tab();

		// $this->start_controls_tab(
		// 	'tab_button_hover',
		// 	[
		// 		'label' => esc_html__( 'Hover', 'elementor' ),
		// 	]
		// );

		// $this->add_control(
		// 	'hover_color',
		// 	[
		// 		'label' => esc_html__( 'Text Color', 'elementor' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .elementor-button:hover, {{WRAPPER}} .elementor-button:focus' => 'color: {{VALUE}};',
		// 			'{{WRAPPER}} .elementor-button:hover svg, {{WRAPPER}} .elementor-button:focus svg' => 'fill: {{VALUE}};',
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	Group_Control_Background::get_type(),
		// 	[
		// 		'name' => 'button_background_hover',
		// 		'label' => esc_html__( 'Background', 'elementor' ),
		// 		'types' => [ 'classic', 'gradient' ],
		// 		'exclude' => [ 'image' ],
		// 		'selector' => '{{WRAPPER}} .elementor-button:hover, {{WRAPPER}} .elementor-button:focus',
		// 		'fields_options' => [
		// 			'background' => [
		// 				'default' => 'classic',
		// 			],
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'button_hover_border_color',
		// 	[
		// 		'label' => esc_html__( 'Border Color', 'elementor' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'condition' => [
		// 			'border_border!' => '',
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .elementor-button:hover, {{WRAPPER}} .elementor-button:focus' => 'border-color: {{VALUE}};',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'hover_animation',
		// 	[
		// 		'label' => esc_html__( 'Hover Animation', 'elementor' ),
		// 		'type' => Controls_Manager::HOVER_ANIMATION,
		// 	]
		// );

		// $this->end_controls_tab();

		// $this->end_controls_tabs();

		// $this->add_group_control(
		// 	Group_Control_Border::get_type(),
		// 	[
		// 		'name' => 'border',
		// 		'selector' => '{{WRAPPER}} .elementor-button',
		// 		'separator' => 'before',
		// 	]
		// );

		// $this->add_control(
		// 	'border_radius',
		// 	[
		// 		'label' => esc_html__( 'Border Radius', 'elementor' ),
		// 		'type' => Controls_Manager::DIMENSIONS,
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	Group_Control_Box_Shadow::get_type(),
		// 	[
		// 		'name' => 'button_box_shadow',
		// 		'selector' => '{{WRAPPER}} .elementor-button',
		// 	]
		// );

		// $this->add_responsive_control(
		// 	'text_padding',
		// 	[
		// 		'label' => esc_html__( 'Padding', 'elementor' ),
		// 		'type' => Controls_Manager::DIMENSIONS,
		// 		'size_units' => [ 'px', 'em', '%' ],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 		'separator' => 'before',
		// 	]
		// );

		$this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings();
		// $media_title_text = $settings['media_title_text'];
		// $media_description_text = $settings['media_description_text'];
		$media_applynow_button_text = $settings['media_applynow_button_text'];
		// $media_apply_now_button_url = $settings['media_apply_now_button_url'];
		// $media_message_button_name = $settings['media_message_button_name'];
		// $media_message_button_url = $settings['media_message_button_url'];

		$button_type = $settings['media_button_type'];
		$media_applynow_button_url = $settings['media_applynow_button_url'];
		$media_applynow_button_selected_icon = $settings['media_applynow_button_selected_icon'];

		$icon_align = $settings['icon_align'];

		?>

		<!-- <section class="elementor-section elementor-top-section elementor-element elementor-element-27eb5c9 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="27eb5c9" data-element_type="section"> -->
			<!-- <div class="elementor-container elementor-column-gap-default">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b1a5c98" data-id="b1a5c98" data-element_type="column">
				<div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-0178a12 elementor-align-center elementor-widget elementor-widget-button" data-id="0178a12" data-element_type="widget" data-widget_type="button.default">
					<div class="elementor-widget-container"> -->
					<div class="wpew-btn">
						<a href="<?php echo $media_applynow_button_url['url']; ?>" class="btn <?php echo $button_type;?> <?php echo $icon_align?>" role="button">
							<?php Icons_Manager::render_icon( $media_applynow_button_selected_icon, [ 'aria-hidden' => 'true' , 'id' => $icon_align] ); ?>
							<span class=""><?php echo $media_applynow_button_text; ?></span>
						</a>
					</div>
					<!-- </div>
					</div>
				</div>
				</div>
			</div> -->
		<!-- </section> -->
		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Media_Card() );
