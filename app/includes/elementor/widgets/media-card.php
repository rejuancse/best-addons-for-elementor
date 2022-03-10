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
            'section_title',
            [
                'label' => __( 'Title Element', 'wpew' )
            ]
        );

        $this->add_control(
            'mediacard_image',
            [
                'label' => esc_html__( 'Upload Background Image', 'wpew' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

		# Media image
		$this->add_control(
			'media_image',
			[
				'label' => esc_html__( 'Upload Image', 'wpew' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		# Media card vertical image position
        $this->add_responsive_control(
			'vertical_image_position',
			[
				'label' => esc_html__( 'Vertical Image Position', 'wpew' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => -30,
				],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpew-card__image--barbarian img' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		# Media card horizontal image position
		$this->add_responsive_control(
			'horizontal_image_position',
			[
				'label' => esc_html__( 'Horizontal Image Position', 'wpew' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => -30,
				],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpew-card__image--barbarian img' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'content_wrap_section',
			[
				'label' => esc_html__( 'Main Contents', 'wpew' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		# Media title text
		$this->add_control(
            'title_text',
            [
                'label' => __( 'Title Text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title text', 'wpew' ),
                'default' => __( 'The Barbarian', 'wpew' ),
            ]
        );

        $this->add_control(
            'subtitle_text',
            [
                'label' => __( 'Sub Title Text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter subtitle text', 'wpew' ),
                'default' => __( 'LEVEL 1', 'wpew' ),
            ]
        );

		# Media description text
		$this->add_control(
            'description_text',
            [
                'label' => __( 'Description Text', 'wpew' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'The Barbarian is a kilt-clad Scottish warrior with an angry, battle-ready expression, hungry for destruction. He has Killer yellow horseshoe mustache.', 'wpew' ),
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
					'{{WRAPPER}} .wpew-card .content' => 'text-align: {{VALUE}};',
				],
			]
		);

		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'footer_title',
			[
				'label' => __( 'Footer Title', 'wpew' ),
				'type' => Controls_Manager::TEXT,
                'default'   => '20',   
            ]
		);

		$repeater->add_control(
			'footer_subtitle',
			[
				'label' => __( 'Footer Sub-Title', 'wpew' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tranning', 'wpew' ),
            ]
		);

		$this->add_control(
			'footer',
			[
				'label' => esc_html__( 'Footer', 'wpew' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'footer_title' => esc_html__( '20', 'wpew' ),
						'footer_subtitle' => 'Tranning'
					],
				],
			]
		);


        $this->end_controls_section();
        # Option End

		# Media card content style
		$this->start_controls_section(
			'media_content_style',
			[
				'label' 	=> __( 'Content', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Media content padding
		$this->add_responsive_control(
            'media_content_padding',
            [
                'label' 		=> __( 'Padding', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );

		$this->end_controls_section();

		# Media card title
		$this->start_controls_section(
			'media_title_style',
			[
				'label' 	=> __( 'Title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Media title text color
		$this->add_control(
			'media_title_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpew-card__unit-name' => 'color: {{VALUE}};',
				],
			]
		);

		# Media Title text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Text Typography', 'wpew' ),
				'name' 		=> 'media_title_typography',
				'selector' 	=> '{{WRAPPER}} .wpew-card__unit-name',
			]
		);

		# Media Title text spacing
		$this->add_responsive_control(
			'media_title_space',
			[
				'label' => esc_html__( 'Spacing', 'wpew' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpew-card__unit-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		# Media card sub-title
		$this->start_controls_section(
			'media_subtitle_style',
			[
				'label' 	=> __( 'Sub-title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Media sub-title text color
		$this->add_control(
			'media_sub_title_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpew-card__level--barbarian' => 'color: {{VALUE}};',
				],
			]
		);

		# Media sub-title text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Text Typography', 'wpew' ),
				'name' 		=> 'media_subtitle_typography',
				'selector' 	=> '{{WRAPPER}} .wpew-card__level--barbarian',
			]
		);

		# Media sub-title text spacing
		$this->add_responsive_control(
			'media_subtitle_space',
			[
				'label' => esc_html__( 'Spacing', 'wpew' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpew-card__level--barbarian' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		# Media card description
		$this->start_controls_section(
			'media_description_style',
			[
				'label' 	=> __( 'Description', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Media description text color
		$this->add_control(
			'media_description_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpew-card__unit-description' => 'color: {{VALUE}};',
				],
			]
		);

		# Media description text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Text Typography', 'wpew' ),
				'name' 		=> 'media_description_typography',
				'selector' 	=> '{{WRAPPER}} .wpew-card__unit-description',
			]
		);

		# Media description text spacing
		$this->add_responsive_control(
			'media_description_space',
			[
				'label' => esc_html__( 'Spacing', 'wpew' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpew-card__unit-description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		# Media card 
		$this->start_controls_section(
			'media_card_style',
			[
				'label' 	=> __( 'Media Card', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpew' ),
				'selector' => '{{WRAPPER}} .wpew-card',
			]
		);

		$this->end_controls_section();

		# Media card footer
		$this->start_controls_section(
			'media_card_footer_style',
			[
				'label' 	=> __( 'Footer', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Media footer background color
		$this->add_control(
			'media_footer_background_color',
			[
				'label'		=> __( 'Background Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpew-card__unit-stats--barbarian' => 'background: {{VALUE}};',
				],
			]
		);

		# Media footer title text color
		$this->add_control(
			'media_footer_title_text_color',
			[
				'label'		=> __( 'Title Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpew-card__unit-stats--barbarian .stat' => 'color: {{VALUE}};',
				],
			]
		);

		# Media footer Title text spacing
		$this->add_responsive_control(
			'media_footer_title_space',
			[
				'label' => esc_html__( 'Title Spacing', 'wpew' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpew-card__unit-stats--barbarian .stat' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		# Media footer sub-title text color
		$this->add_control(
			'media_footer_subtitle_text_color',
			[
				'label'		=> __( 'Sub-title Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpew-card__unit-stats--barbarian .stat-value' => 'color: {{VALUE}};',
				],
			]
		);


		# Media footer sub-title text spacing
		$this->add_responsive_control(
			'media_sub_title_space',
			[
				'label' => esc_html__( 'Sub-title Spacing', 'wpew' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpew-card__unit-stats--barbarian .stat-value' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);


		# Media footer padding
		$this->add_responsive_control(
            'media_footer_padding',
            [
                'label' 		=> __( 'Padding', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .wpew-card__unit-stats--barbarian' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );

		$this->end_controls_section();

	}

	protected function render( ) {
		$settings = $this->get_settings();
		$mediacard_image = $settings['mediacard_image'];
		$media_image = $settings['media_image'];
		$title_text = $settings['title_text'];
		$subtitle_text = $settings['subtitle_text'];
		$description_text = $settings['description_text'];

		$footer = $settings['footer'];
		?>

        <div class="slide-container">
            <div class="wrapper">
                <div class="wpew-card barbarian">
                    <div class="wpew-card__image wpew-card__image--barbarian" style="background-image: url(<?php echo $mediacard_image['url']; ?>)">
                        <?php if( ! empty($media_image['url']) ) { ?>
                            <img src="<?php echo $media_image['url']; ?>" alt="barbarian" />
                        <?php } ?>
                    </div>

                    <div class="content">
                        <div class="wpew-card__level wpew-card__level--barbarian"><?php echo $subtitle_text; ?></div>
                        <div class="wpew-card__unit-name"><?php echo $title_text ?></div>
                        <div class="wpew-card__unit-description"><?php echo $description_text ?></div>
                    </div>
                    
                    <div class="wpew-card__unit-stats wpew-card__unit-stats--barbarian clearfix">
						<?php foreach($footer as $value) { ?>
							<div class="one-third">
								<div class="stat"> <?php echo $value['footer_title']; ?> <sup>S</sup></div>
								<div class="stat-value"> <?php echo $value['footer_subtitle']; ?></div>
							</div>
						<?php } ?>

                        <!-- <div class="one-third">
                            <div class="stat">16</div>
                            <div class="stat-value">Speed</div>
                        </div>

                        <div class="one-third no-border">
                            <div class="stat">150</div>
                            <div class="stat-value">Cost</div>
                        </div> -->
                    </div>
                </div>
                <!-- end wpew-card barbarian-->
            </div>
            <!-- end wrapper -->

        </div>
        <!-- end container -->

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Media_Card() );