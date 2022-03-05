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

		# Media image
		$this->add_control(
			'media_image',
			[
				'label' => esc_html__( 'Choose Image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
                'default' => __( 'Lead Product Design', 'wpew' ),
            ]
        );

		# Media description text
		$this->add_control(
            'description_text',
            [
                'label' => __( 'Description Text', 'wpew' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Some quick example text to build on the card title and make up the bulk of the card s content.', 'wpew' ),
				'description' => sprintf(
					esc_html__( 'For description text please use space or new line.', 'wpew' ),
					'<code>',
					'</code>'
				),
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
		$media_image = $settings['media_image'];
		$title_text = $settings['title_text'];
		$description_text = $settings['description_text'];
		?>

        <div class="div-style">
            <div class="card-1">
				<div class="img-style">
					<img src=<?php echo $media_image['url'] ?> alt="delivery.png">
				</div>
        
                <div class="card-2">
                    <h5 class="title-style"> <?php echo $title_text ?>
                        <span class="icon-design"></span>
                    </h5>
                    <p class="">
						<?php echo $description_text ?>
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <div>
                        <a href="#" class="btn-1"> Full Time</a>
                        <a href="#" class="btn-2"> Min, 1 Year </a>
                        <a href="#" class="btn-3"> Director</a>
                    </div>
                    <div>
                        <img src="..." alt="">
                        <img src="..." alt="">
                        <img src="..." alt="">
                    </div>
                    <div class="">
                        <a href="#" class="btn-style-1"> Apply Now</a>
                        <a href="#" class="btn-style-2"> Message </a>
                    </div>
                </div>
            </div>   
        </div>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Media_Card() );
