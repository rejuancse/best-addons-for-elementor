<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Animated_Headine extends Widget_Base {
	public function get_name() {
		return 'animated-headine';
	}

	public function get_title() {
		return __( 'Animated Headine', 'wpew' );
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

        $this->add_control(
            'headine_text',
            [
                'label' => __( 'Headine Text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter heading', 'wpew' ),
                'default' => __( 'My favourite food is', 'wpew' ),
            ]
        );

		$this->add_control(
            'animated_text',
            [
                'label' => __( 'Animated Text', 'wpew' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Pizza Sushi Steak', 'wpew' ),
				'description' => sprintf(
					esc_html__( 'For animated text please use space or new line, For example, Pizza Sushi Steak', 'wpew' ),
					'<code>',
					'</code>'
				),
            ]
        );

		$this->add_control(
            'headine_text2',
            [
                'label' => __( 'Headine Text2', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title two', 'wpew' ),
                'default' => __( 'Course', 'wpew' ),
            ]
        );

		$this->add_control(
			'headine_size',
			[
				'label' => esc_html__( 'HTML Tag', 'wpew' ),
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
				'label' => esc_html__( 'Alignment', 'wpew' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'wpew' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpew' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'wpew' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'wpew' ),
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
				'label' 	=> __( 'Title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'animated_name',
            [
                'label'     => __( 'Animated Name', 'wpew' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'clip is-full-width',
                'options'   => [
                        'clip is-full-width' 	=> __( 'Clip', 'wpew' ),
                        'rotate-1' 	=> __( 'Rotate-1', 'wpew' ),
                        'rotate-2' 	=> __( 'Rotate-2', 'wpew' ),
                        'letters rotate-3' 	=> __( 'Letters Rotate-3', 'wpew' ),
                        'letters type' 	=> __( 'Letters Type', 'wpew' ),
                        'loading-bar' 	=> __( 'Loading Bar', 'wpew' ),
                        'letters scale' 	=> __( 'Letters Scale', 'wpew' ),
                        'slide' 	=> __( 'Slide', 'wpew' ),
                        'zoom' 	=> __( 'Zoom', 'wpew' ),
                        'push' 	=> __( 'Push', 'wpew' ),
                    ],
            ]
        );

		$this->add_control(
			'animated_text_color',
			[
				'label'		=> __( 'Animated Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .animated-headine .headline .words-wrapper' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'		=> __( 'Headine Text Color', 'wpew' ),
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
                'label' 		=> __( 'Title Padding', 'wpew' ),
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
                'label' 		=> __( 'Title Margin', 'wpew' ),
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
