<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Animated_Headine extends Widget_Base {
	public function get_name() {
		return 'animated-headine';
	}

	public function get_title() {
		return __( 'Animated Headine', 'eafe' );
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

        $this->add_control(
            'headine_text',
            [
                'label' => __( 'Headine Text', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter heading', 'eafe' ),
                'default' => __( 'My favourite food is', 'eafe' ),
            ]
        );

		$this->add_control(
            'animated_text',
            [
                'label' => __( 'Animated Text', 'eafe' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Pizza Sushi Steak', 'eafe' ),
				'description' => sprintf(
					esc_html__( 'For animated text please use space or new line, For example, Pizza Sushi Steak', 'eafe' ),
					'<code>',
					'</code>'
				),
            ]
        );

		$this->add_control(
            'headine_text2',
            [
                'label' => __( 'Headine Text2', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title two', 'eafe' ),
                'default' => __( 'Course', 'eafe' ),
            ]
        );

		$this->add_control(
			'headine_size',
			[
				'label' => esc_html__( 'HTML Tag', 'eafe' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'eafe' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'eafe' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'eafe' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'eafe' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'eafe' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
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
            'animated_name',
            [
                'label'     => __( 'Animated Name', 'eafe' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'clip is-full-width',
                'options'   => [
                        'clip is-full-width' 	=> __( 'Clip', 'eafe' ),
                        'rotate-1' 	=> __( 'Rotate-1', 'eafe' ),
                        'rotate-2' 	=> __( 'Rotate-2', 'eafe' ),
                        'letters rotate-3' 	=> __( 'Letters Rotate-3', 'eafe' ),
                        'letters type' 	=> __( 'Letters Type', 'eafe' ),
                        'loading-bar' 	=> __( 'Loading Bar', 'eafe' ),
                        'letters scale' 	=> __( 'Letters Scale', 'eafe' ),
                        'slide' 	=> __( 'Slide', 'eafe' ),
                        'zoom' 	=> __( 'Zoom', 'eafe' ),
                        'push' 	=> __( 'Push', 'eafe' ),
                    ],
            ]
        );

		$this->add_control(
			'animated_text_color',
			[
				'label'		=> __( 'Animated Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .animated-headine .headline .words-wrapper' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'		=> __( 'Headine Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .animated-headine .headline' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography',
				'selector' 	=> '{{WRAPPER}} .animated-headine .headline',
			]
		);

		$this->add_responsive_control(
            'text_padding',
            [
                'label' 		=> __( 'Title Padding', 'eafe' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .animated-headine .headline' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before', 
            ]
        );
		
        $this->add_responsive_control(
            'text_margin',
            [
                'label' 		=> __( 'Title Margin', 'eafe' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .animated-headine .headline' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );
		$this->end_controls_section();
		# Title Section end 1

	}

	protected function render( ) {
		$settings = $this->get_settings();
		$animated_text = $settings['animated_text'];
		$animated_name = $settings['animated_name'];
		$headine_size = $settings['headine_size'];

		$thetextstring = trim(preg_replace('/\s+/', ' ', $animated_text));
		$words = explode(" ", $thetextstring); ?>

		<div class="animated-headine">
			<<?php echo esc_html($headine_size); ?> class="headline <?php echo $animated_name; ?>">
				<span><?php echo $settings['headine_text']; ?></span>

				<?php if(!empty($animated_text)) {?>
					<span class="words-wrapper">
						<?php 
							$i = 0;
							foreach($words as $key => $word) { 
								if($key === $i) { ?>
									<b class="is-visible"><?php echo esc_html($word); ?></b>
								<?php } else { ?>
									<b><?php echo esc_html($word); ?></b>
								<?php } ?>
							<?php } 
						?>
					</span>
				<?php } ?>

				<span><?php echo $settings['headine_text2']; ?></span>
			</<?php echo esc_html($headine_size); ?>>
		</div>

		<?php 
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Animated_Headine() );
