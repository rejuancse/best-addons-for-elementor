<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Media_Card extends Widget_Base {
	
	public function get_name() {
		return 'media-card';
	}

	public function get_title() {
		return __( 'Media Card', 'eafe' );
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
            'mediacard_image',
            [
                'label' => esc_html__( 'Upload Background Image', 'eafe' ),
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
				'label' => esc_html__( 'Upload Image', 'eafe' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		# Media card vertical image position
        $this->add_responsive_control(
			'vertical_image_position',
			[
				'label' => esc_html__( 'Vertical Image Position', 'eafe' ),
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
					'{{WRAPPER}} .eafe-card__image--barbarian img' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		# Media card horizontal image position
		$this->add_responsive_control(
			'horizontal_image_position',
			[
				'label' => esc_html__( 'Horizontal Image Position', 'eafe' ),
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
					'{{WRAPPER}} .eafe-card__image--barbarian img' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'content_wrap_section',
			[
				'label' => esc_html__( 'Main Contents', 'eafe' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		# Media title text
		$this->add_control(
            'media_title',
            [
                'label' => __( 'Title Text', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title text', 'eafe' ),
                'default' => __( 'The Barbarian', 'eafe' ),
            ]
        );

        $this->add_control(
            'media_subtitle',
            [
                'label' => __( 'Sub Title Text', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter subtitle text', 'eafe' ),
                'default' => __( 'LEVEL 1', 'eafe' ),
            ]
        );

		# Media description text
		$this->add_control(
            'media_description',
            [
                'label' => __( 'Description Text', 'eafe' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'The Barbarian is a kilt-clad Scottish warrior with an angry, battle-ready expression, hungry for destruction. He has Killer yellow horseshoe mustache.', 'eafe' ),
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
					'{{WRAPPER}} .eafe-card .content' => 'text-align: {{VALUE}};',
				],
			]
		);

		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'footer_title',
			[
				'label' => __( 'Footer Title', 'eafe' ),
				'type' => Controls_Manager::TEXT,
                'default'   => '20',   
            ]
		);

		$repeater->add_control(
			'footer_subtitle',
			[
				'label' => __( 'Footer Sub-Title', 'eafe' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tranning', 'eafe' ),
            ]
		);

		$this->add_control(
			'footer',
			[
				'label' => esc_html__( 'Footer', 'eafe' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'footer_title' => esc_html__( '20', 'eafe' ),
						'footer_subtitle' => 'Tranning'
					],
				],
			]
		);


        $this->end_controls_section();
        # Option End

		# Media card content style
		$this->start_controls_section(
			'media_card_style',
			[
				'label' 	=> __( 'Settings', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Media content padding
		$this->add_responsive_control(
            'media_border-radius',
            [
                'label' 		=> __( 'Border Radius', 'eafe' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .media-card-container .eafe-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'eafe' ),
				'selector' => '{{WRAPPER}} .media-card-container .eafe-card',
			]
		);

		$this->end_controls_section();

		# Media card title
		$this->start_controls_section(
			'media_content_style',
			[
				'label' 	=> __( 'Content Settings', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Media title text color
		$this->add_control(
			'media_title_text_color',
			[
				'label'		=> __( 'Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe-card__unit-name' => 'color: {{VALUE}};',
				],
			]
		);

		# Media Title text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Text Typography', 'eafe' ),
				'name' 		=> 'media_title_typography',
				'selector' 	=> '{{WRAPPER}} .eafe-card__unit-name',
			]
		);

		# Media Title text spacing
		$this->add_responsive_control(
			'media_title_space',
			[
				'label' => esc_html__( 'Spacing', 'eafe' ),
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
					'{{WRAPPER}} .eafe-card__unit-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'subtitle_settings',
			[
				'label' => esc_html__( 'Sub Title Settings', 'eafe' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		# Media sub-title text color
		$this->add_control(
			'media_sub_title_text_color',
			[
				'label'		=> __( 'Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe-card__level--barbarian' => 'color: {{VALUE}};',
				],
			]
		);

		# Media sub-title text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Text Typography', 'eafe' ),
				'name' 		=> 'media_subtitle_typography',
				'selector' 	=> '{{WRAPPER}} .eafe-card__level--barbarian',
			]
		);

		# Media sub-title text spacing
		$this->add_responsive_control(
			'media_subtitle_space',
			[
				'label' => esc_html__( 'Spacing', 'eafe' ),
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
					'{{WRAPPER}} .eafe-card__level--barbarian' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		# Media card description
		$this->add_control(
			'media_description_style',
			[
				'label' => esc_html__( 'Description Settings', 'eafe' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		# Media description text color
		$this->add_control(
			'media_media_description_color',
			[
				'label'		=> __( 'Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe-card__unit-description' => 'color: {{VALUE}};',
				],
			]
		);

		# Media description text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Text Typography', 'eafe' ),
				'name' 		=> 'media_description_typography',
				'selector' 	=> '{{WRAPPER}} .eafe-card__unit-description',
			]
		);

		# Media description text spacing
		$this->add_responsive_control(
			'media_description_space',
			[
				'label' => esc_html__( 'Spacing', 'eafe' ),
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
					'{{WRAPPER}} .eafe-card__unit-description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		# Media content padding
		$this->add_responsive_control(
            'media_content_padding',
            [
                'label' 		=> __( 'Padding', 'eafe' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .media-card-container .eafe-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );

		$this->end_controls_section();

		# Media card footer
		$this->start_controls_section(
			'media_card_footer_style',
			[
				'label' 	=> __( 'Footer', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Media footer background color
		$this->add_control(
			'media_footer_background_color',
			[
				'label'		=> __( 'Background Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe-card__unit-stats--barbarian' => 'background: {{VALUE}};',
				],
			]
		);

		# Media footer title text color
		$this->add_control(
			'media_footer_title_text_color',
			[
				'label'		=> __( 'Title Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe-card__unit-stats--barbarian .stat' => 'color: {{VALUE}};',
				],
			]
		);

		# Media border color
		$this->add_control(
			'media_footer_border_color',
			[
				'label'		=> __( 'Border Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .media-card-container .eafe-card__unit-stats--barbarian .one-third' => 'border-color: {{VALUE}};',
				],
			]
		);

		# Media footer Title text spacing
		$this->add_responsive_control(
			'media_footer_title_space',
			[
				'label' => esc_html__( 'Title Spacing', 'eafe' ),
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
					'{{WRAPPER}} .eafe-card__unit-stats--barbarian .stat' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		# Media footer sub-title text color
		$this->add_control(
			'media_footer_subtitle_text_color',
			[
				'label'		=> __( 'Sub-title Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe-card__unit-stats--barbarian .stat-value' => 'color: {{VALUE}};',
				],
			]
		);


		# Media footer sub-title text spacing
		$this->add_responsive_control(
			'media_sub_title_space',
			[
				'label' => esc_html__( 'Sub-title Spacing', 'eafe' ),
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
					'{{WRAPPER}} .eafe-card__unit-stats--barbarian .stat-value' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		# Media footer padding
		$this->add_responsive_control(
            'media_footer_padding',
            [
                'label' 		=> __( 'Padding', 'eafe' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .eafe-card__unit-stats--barbarian' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$media_title = $settings['media_title'];
		$media_subtitle = $settings['media_subtitle'];
		$media_description = $settings['media_description'];
		$footer = $settings['footer']; ?>

        <div class="media-card-container">
            <div class="wrapper">
                <div class="eafe-card barbarian">
                    <div class="eafe-card__image eafe-card__image--barbarian" style="background-image: url(<?php echo $mediacard_image['url']; ?>)">
                        <?php if( ! empty($media_image['url']) ) { ?>
                            <img src="<?php echo $media_image['url']; ?>" alt="barbarian" />
                        <?php } ?>
                    </div>

                    <div class="content">
						<?php if( !empty( $media_subtitle ) ) { ?>
                        	<div class="eafe-card__level eafe-card__level--barbarian"><?php echo $media_subtitle; ?></div>
						<?php } ?>

						<?php if( !empty( $media_title ) ) { ?>
                        	<div class="eafe-card__unit-name"><?php echo $media_title ?></div>
						<?php } ?>

						<?php if( !empty( $media_description ) ) { ?>
                        	<div class="eafe-card__unit-description"><?php echo $media_description ?></div>
						<?php } ?>
                    </div>
                    
                    <div class="eafe-card__unit-stats eafe-card__unit-stats--barbarian clearfix">
						<?php 
						$col = count($footer);
						foreach($footer as $value) { ?>
							<div class="one-third val-<?php echo $col; ?>">
								<div class="stat"><?php echo $value['footer_title']; ?></div>
								<div class="stat-value"><?php echo $value['footer_subtitle']; ?></div>
							</div>
						<?php } ?>
                    </div>
                </div>
                <!-- end eafe-card barbarian-->
            </div>
            <!-- end wrapper -->

        </div>
        <!-- end container -->

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Media_Card() );