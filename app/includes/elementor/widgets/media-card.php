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

        $this->add_responsive_control(
			'image_position',
			[
				'label' => esc_html__( 'Image Position', 'wpew' ),
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

        $this->end_controls_section();
        # Option End

		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'CountDown Title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Media title text color
		$this->add_control(
			'title_color',
			[
				'label'		=> __( 'Title Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title-style' => 'color: {{VALUE}};',
				],
			]
		);

		# Media description text color
		$this->add_control(
			'description_color',
			[
				'label'		=> __( 'Description Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} p' => 'color: {{VALUE}};',
				],
			]
		);

		# Media Title text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Title Text Typography', 'wpew' ),
				'name' 		=> 'title_typography',
				'selector' 	=> '{{WRAPPER}} .title-style',
			]
		);

		# Media description text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Description Text Typography', 'wpew' ),
				'name' 		=> 'description_typography',
				'selector' 	=> '{{WRAPPER}} p',
			]
		);

		$this->end_controls_section();
		# Title Section end 1

	}

	protected function render( ) {
		$settings = $this->get_settings();
		$mediacard_image = $settings['mediacard_image'];
		$media_image = $settings['media_image'];
		$title_text = $settings['title_text'];
		$subtitle_text = $settings['subtitle_text'];
		$description_text = $settings['description_text'];
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
                        <div class="one-third">
                            <div class="stat">20<sup>S</sup></div>
                            <div class="stat-value">Training</div>
                        </div>

                        <div class="one-third">
                            <div class="stat">16</div>
                            <div class="stat-value">Speed</div>
                        </div>

                        <div class="one-third no-border">
                            <div class="stat">150</div>
                            <div class="stat-value">Cost</div>
                        </div>
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
