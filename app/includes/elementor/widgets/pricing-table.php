<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Kitolms_Pricing_Table extends Widget_Base {
	public function get_name() {
		return 'kitolms-pricing-table';
	}

	public function get_title() {
		return __( 'Pricing Table', 'kitolms-core' );
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
				'label' => __( 'Pricing Table', 'kitolms-core' ),
			]
		);

        $this->add_control(
            'pricing_plan',
            [
                'label'     => __( 'Pricing Plan', 'kitolms-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'basic',
                'options'   => [
                        'basic' 	=> __( 'Basic', 'kitolms-core' ),
                        'standard' 	=> __( 'Standard', 'kitolms-core' ),
                        'platinum' 	=> __( 'Platinum', 'kitolms-core' ),
                    ],
            ]
        );

        $this->add_control(
            'pricing_intro_text',
            [
                'label' => __( 'Price intro text', 'kitolms-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your pricing intro text', 'kitolms-core' ),
                'default' => __( 'Best Value', 'kitolms-core' ),
            ]
        ); 

        $this->add_control(
            'currency',
            [
                'label' => __( 'Add your currency', 'kitolms-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter Sub Title', 'kitolms-core' ),
                'default' => '$',
            ]
        );
        $this->add_control(
            'price',
            [
                'label' => __( 'Price', 'kitolms-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your price', 'kitolms-core' ),
                'default' => '29',
            ]
        );
        $this->add_control(
            'plan_users',
            [
                'label' => __( 'Pricing Plan users', 'kitolms-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your pricing plan users', 'kitolms-core' ),
                'default' => __( 'per user, per month', 'kitolms-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'features_enable',
			[
				'label' => __( 'Pricing Features', 'kitolms-core' ),
				'type' => Controls_Manager::SELECT,
                'default'   => 'show',
                'options'   => [
                        'show' 	=> __( 'Check', 'kitolms-core' ),
                        'none' 	=> __( 'Cross', 'kitolms-core' ),
                    ],
                    
            ]
		);

        $repeater->add_control(
			'features_intro',
			[
				'label' => __( 'Features Intro', 'kitolms-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '99.5% Uptime Guarantee', 'kitolms-core' ),
            ]
		);

		$this->add_control(
			'pricing_table_list',
			[
				'label' => esc_html__( 'Accordion Items', 'kitolms-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'features_intro' => esc_html__( 'Lorem ipsum', 'kitolms-core' ),
						'features_enable' => 'show',
					],
				],
			]
		);

        $this->add_control(
            'pricing_button',
            [
                'label' => __( 'Button Name', 'kitolms-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your button name', 'kitolms-core' ),
                'default' => __( 'Start Basic', 'kitolms-core' ),
            ]
        );

        $this->end_controls_section();

        # Style.
		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Pricing Table Style', 'kitolms-core' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'pricing_table_color',
			[
				'label'		=> __( 'Text Color', 'kitolms-core' ),
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
				'label'		=> __( 'Icons Color', 'kitolms-core' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .prt_body ul li:before' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'pricing_table_icon_bg_color',
			[
				'label'		=> __( 'Icons BG Color', 'kitolms-core' ),
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
				'label' 	=> __( 'Button Style', 'kitolms-core' ),
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
				'label' => esc_html__( 'Normal', 'kitolms-core' ),
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'		=> __( 'Button Text Color', 'kitolms-core' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.choose_package' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'button_bg_color',
			[
				'label'		=> __( 'Button BG Color', 'kitolms-core' ),
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
				'label' => esc_html__( 'Hover', 'kitolms-core' ),
			]
		);

		# Hover Section
        $this->add_control(
			'button_text_hover_color',
			[
				'label'		=> __( 'Button Text Hover Color', 'kitolms-core' ),
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
                 Color', 'kitolms-core' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn.choose_package:hover' => 'background: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'button_border_hover_color',
			[
				'label'		=> __( 'Button Border Hover Color', 'kitolms-core' ),
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
		$settings = $this->get_settings(); 
        $pricing_plan = $settings['pricing_plan']; ?>

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
                        <li class="<?php echo esc_html($show); ?>"><?php echo $item['features_intro']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="prt_footer">
                <a href="#" class="btn choose_package <?php echo ($pricing_plan === 'standard') ? 'active' : ''; ?>"><?php echo $settings['pricing_button']; ?></a>
            </div>
        </div>




    
		<div class="pricing pricing-palden">
            <div class="pricing-item features-item ja-animate" data-animation="move-from-bottom" data-delay="item-0" style="min-height: 497px;">
                <div class="pricing-deco">
                    <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" y="0px">
                        <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                        <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                    </svg>
                    <div class="pricing-price"><span class="pricing-currency">$</span>29
                        <span class="pricing-period">/ mo</span>
                    </div>
                    <h3 class="pricing-title">Freelance</h3>
                </div>
                <ul class="pricing-feature-list">
                    <li class="pricing-feature">1 GB of space</li>
                    <li class="pricing-feature">Support at $25/hour</li>
                    <li class="pricing-feature">Limited cloud access</li>
                </ul>
                <button class="pricing-action">Choose plan</button>
            </div>

            <div class="pricing-item features-item ja-animate pricing__item--featured" data-animation="move-from-bottom" data-delay="item-1" style="min-height: 497px;">
                <div class="pricing-deco" style="background: linear-gradient(135deg,#a93bfe,#584efd)">
                    <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" y="0px">
                        <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                        <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                    </svg>
                    <div class="pricing-price"><span class="pricing-currency">$</span>59
                        <span class="pricing-period">/ mo</span>
                    </div>
                    <h3 class="pricing-title">Business</h3>
                </div>
                <ul class="pricing-feature-list">
                    <li class="pricing-feature">5 GB of space</li>
                    <li class="pricing-feature">Support at $5/hour</li>
                    <li class="pricing-feature">Full cloud access</li>
                </ul>
                <button class="pricing-action">Choose plan</button>
            </div>

            <div class="pricing-item features-item ja-animate" data-animation="move-from-bottom" data-delay="item-2" style="min-height: 497px;">
                <div class="pricing-deco">
                    <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" y="0px">
                        <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                        <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                    </svg>
                    <div class="pricing-price"><span class="pricing-currency">$</span>99
                        <span class="pricing-period">/ mo</span>
                    </div>
                    <h3 class="pricing-title">Enterprise</h3>
                </div>
                <ul class="pricing-feature-list">
                    <li class="pricing-feature">10 GB of space</li>
                    <li class="pricing-feature">Support at $5/hour</li>
                    <li class="pricing-feature">Full cloud access</li>
                </ul>
                <button class="pricing-action">Choose plan</button>
            </div>
        </div>
    


	<?php 
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Kitolms_Pricing_Table() );
