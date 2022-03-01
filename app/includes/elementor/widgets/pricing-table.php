<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_WPEW_Pricing_Table extends Widget_Base {
	public function get_name() {
		return 'wpew-pricing-table';
	}

	public function get_title() {
		return __( 'Pricing Table', 'wpew' );
	}

	public function get_icon() {	
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'wpew-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Pricing Table', 'wpew' ),
			]
		);

        $this->add_control(
            'pricing_plan',
            [
                'label'     => __( 'Pricing Plan', 'wpew' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'basic',
                'options'   => [
                        'basic' 	=> __( 'Basic', 'wpew' ),
                        'standard' 	=> __( 'Standard', 'wpew' ),
                        'platinum' 	=> __( 'Platinum', 'wpew' ),
                    ],
            ]
        );

        $this->add_control(
            'pricing_intro_text',
            [
                'label' => __( 'Price intro text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your pricing intro text', 'wpew' ),
                'default' => __( 'Best Value', 'wpew' ),
            ]
        ); 

        $this->add_control(
            'currency',
            [
                'label' => __( 'Add your currency', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter Sub Title', 'wpew' ),
                'default' => '$',
            ]
        );
        $this->add_control(
            'price',
            [
                'label' => __( 'Price', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your price', 'wpew' ),
                'default' => '29',
            ]
        );
        $this->add_control(
            'plan_users',
            [
                'label' => __( 'Pricing Plan users', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your pricing plan users', 'wpew' ),
                'default' => __( 'per user, per month', 'wpew' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'features_enable',
			[
				'label' => __( 'Pricing Features', 'wpew' ),
				'type' => Controls_Manager::SELECT,
                'default'   => 'show',
                'options'   => [
                        'show' 	=> __( 'Show', 'wpew' ),
                        'none' 	=> __( 'cross', 'wpew' ),
                    ],
                    
            ]
		);

        $repeater->add_control(
			'features_intro',
			[
				'label' => __( 'Features Intro', 'wpew' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '99.5% Uptime Guarantee', 'wpew' ),
            ]
		);

		$this->add_control(
			'pricing_table_list',
			[
				'label' => esc_html__( 'Accordion Items', 'wpew' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'features_intro' => esc_html__( 'Lorem ipsum', 'wpew' ),
						'features_enable' => 'show',
					],
				],
			]
		);

        $this->add_control(
            'pricing_button',
            [
                'label' => __( 'Button Name', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your button name', 'wpew' ),
                'default' => __( 'Start Basic', 'wpew' ),
            ]
        );

		$this->add_control(
            'pricing_button_url',
            [
                'label' => __( 'Button Name URL', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your url', 'wpew' ),
                'default' => '#',
            ]
        );

        $this->end_controls_section();

        # Style.
		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Pricing Table Style', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'pricing_table_bgcolor',
			[
				'label'		=> __( 'Table Background Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpew-pricing .pricing_wrap' => 'background: {{VALUE}};',
				],
			]
		);

		
		$this->add_responsive_control(
			'table_border',
			[
				'label' => esc_html__( 'Table Radius', 'wpew' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wpew-pricing .pricing_wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		# Table section style
		$this->add_control(
			'table_section_style',
			[
				'label' => esc_html__( 'Table Section Style', 'wpew' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'pricing_table_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .prt_price h2, 
                    {{WRAPPER}} .pricing_wrap .prt_head h4, 
                    {{WRAPPER}} .prt_price span, 
                    {{WRAPPER}} .prt_body ul li' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'pricing_table_icon_color',
			[
				'label'		=> __( 'Icons Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .prt_body ul li:before' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'pricing_table_icon_bg_color',
			[
				'label'		=> __( 'Icons BG Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .prt_body ul li:before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography',
				'selector' 	=> '{{WRAPPER}} .prt_body ul li',
			]
		);
		$this->end_controls_section();

        # Style.
		$this->start_controls_section(
			'section_button_style',
			[
				'label' 	=> __( 'Button Style', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography2',
				'selector' 	=> '{{WRAPPER}} .btn.choose_package',
			]
		);

        $this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'wpew' ),
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'		=> __( 'Button Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.choose_package' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'button_bg_color',
			[
				'label'		=> __( 'Button BG Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.choose_package' => 'background: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .btn.choose_package',
				'separator' => 'before',
			]
		);
		$this->end_controls_tab();


		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'wpew' ),
			]
		);

		# Hover Section
        $this->add_control(
			'button_text_hover_color',
			[
				'label'		=> __( 'Button Text Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.choose_package:hover' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'button_bg_hover_color',
			[
				'label'		=> __( 'Button BG Hover
                 Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.choose_package:hover' => 'background: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'button_border_hover_color',
			[
				'label'		=> __( 'Button Border Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.choose_package:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();
		
		$this->end_controls_section();
		
	}

	protected function render( ) {
		$settings = $this->get_settings_for_display(); 
        $pricing_plan = $settings['pricing_plan']; ?>

        <div class="wpew-pricing">
			<div class="pricing_wrap <?php echo $pricing_plan; ?>">
				<div class="prt_head">
					<?php if($settings['pricing_intro_text']) { ?>
						<div class="recommended"><?php echo $settings['pricing_intro_text']; ?></div>
					<?php } ?>
					<h4><?php echo $pricing_plan; ?></h4>
				</div>
				<div class="prt_price">
					<h2><span><?php echo $settings['currency']; ?></span><?php echo $settings['price']; ?></h2>
					<span><?php echo $settings['plan_users']; ?></span>
				</div>
				<div class="prt_body">
					<ul>
						<?php foreach ( $settings['pricing_table_list'] as $item ) : ?>	
							<?php $show = $item['features_enable']; ?>
							<li class="<?php echo $show; ?>"><?php echo $item['features_intro']; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<?php if( !empty($settings['pricing_button_url']) ) { ?>
					<div class="prt_footer">
						<a href="<?php echo $settings['pricing_button_url']; ?>" class="btn choose_package <?php echo ($pricing_plan === 'standard') ? 'active' : ''; ?>"><?php echo $settings['pricing_button']; ?></a>
					</div>
				<?php } ?>

			</div>
		</div>

	<?php 
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPEW_Pricing_Table() );