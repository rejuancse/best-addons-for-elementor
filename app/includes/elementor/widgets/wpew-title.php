<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Widget_WPEW_Title extends \Elementor\Widget_Base {
	public function get_name() {
		return 'wpew-title';
	}

	public function get_title() {
		return __( 'WPEW Title', 'wpew' );
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
            'title_txt',
            [
                'label' => __( 'First Title Text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title', 'wpew' ),
                'default' => __( 'Explore Featured', 'wpew' ),
            ]
        );

		$this->add_control(
            'title_txt2',
            [
                'label' => __( 'Second Title Text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title two', 'wpew' ),
                'default' => __( 'Cources', 'wpew' ),
            ]
        );

        $this->add_control(
            'subtitle_content',
            [
                'label' => __( 'Sub Title Content', 'wpew' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Enter Sub Title', 'wpew' ),
                'default' => __( 'Write your sub title content of this section.', 'wpew' ),
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
			'forst_title_color',
			[
				'label'		=> __( 'First Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpew_heading_caption h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'second_title_color',
			[
				'label'		=> __( 'Second Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpew_heading_caption .theme-cl' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography',
				'selector' 	=> '{{WRAPPER}} .wpew_heading_caption h2',
			]
		);

        $this->add_responsive_control(
			'wpew_title_space',
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
					'{{WRAPPER}} .wpew_heading_caption h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		# Title Section end 1


		# Sub Title Section 2
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' 	=> __( 'Sub Title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'		=> __( 'Subtitle Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpew_heading_caption p' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography2',
				'selector' 	=> '{{WRAPPER}} .wpew_heading_caption p',
			]
		);

        $this->end_controls_section();
		# Subtitle part 2 end
	}

	protected function render( ) {
		$settings = $this->get_settings();  ?>

		<div class="wpew_heading_caption">
			<?php if( $settings['title_txt'] ){ ?>
				<h2><?php echo $settings['title_txt']; ?> <?php if( $settings['title_txt'] ){ ?><span class="theme-cl"><?php echo $settings['title_txt2']; ?></span><?php } ?></h2>
			<?php } ?>

			<?php if( $settings['subtitle_content'] ){ ?>
                <p><?php echo $settings['subtitle_content']; ?></p>
            <?php } ?>
		</div>

		<?php 
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPEW_Title() );
