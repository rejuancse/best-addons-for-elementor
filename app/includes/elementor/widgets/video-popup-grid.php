<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Charity_Video extends Widget_Base {
	public function get_name() {
		return 'thm-video-link';
	}

	public function get_title() {
		return __( 'Section Video', 'charity-essential' );
	}

	public function get_icon() {
		return 'eicon-apps wts-eae-pe';
	}

	public function get_categories() {
		return [ 'wpew-elementor' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Title Element', 'charity-essential' )
            ]
        );
		$this->add_control(
            'video_link',
            [
                'label' => __( 'Video Link', 'charity-essential' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '',
            ]
        );
        $this->add_control(
            'title_txt',
            [
                'label' => __( 'Title', 'charity-essential' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title', 'charity-essential' ),
                'default' => __( 'What is', 'charity-essential' ),
            ]
        );
        $this->add_control(
            'subtitle_content',
            [
                'label' => __( 'Sub Title Content', 'charity-essential' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Enter Sub Title', 'charity-essential' ),
                'default' => __( 'Our ministries', 'charity-essential' ),
            ]
        );   
        $this->add_control(
            'video_intro',
            [
                'label' => __( 'Video Intro', 'charity-essential' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter Intro Title', 'charity-essential' ),
                'default' => __( 'New Here ?', 'charity-essential' ),
            ]
        ); 
        $this->add_control(
		    'upload_image',
		    [
		        'label'         => __( 'Upload Image', 'charity-essential' ),
		        'type'          => Controls_Manager::MEDIA,
		        'label_block'   => true,
		        'default'       => [
		                'url' => Utils::get_placeholder_image_src(),
		            ],
		    ]
		);     
		$this->add_control(
			'hover_bg_color',
			[
				'label'		=> __( 'Hover Background Color', 'charity-essential' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hover-info' => 'background: {{VALUE}};',
				],
			]
		);   
        $this->end_controls_section();

        // Style Content.
		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Title', 'charity-essential' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'		=> __( 'Text Color', 'charity-essential' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .about-content span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
            'text_padding',
            [
                'label' 		=> __( 'Title Padding', 'charity-essential' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .about-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );
        $this->add_responsive_control(
            'text_margin',
            [
                'label' 		=> __( 'Title Margin', 'charity-essential' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .about-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography',
				'selector' 	=> '{{WRAPPER}} .about-content span',
				'default' 	=> 'Open Sans"',
			]
		);

		$this->end_controls_section();
		# Title Section end 1


		# Sub Title Section 2
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' 	=> __( 'Sub Title', 'charity-essential' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'		=> __( 'Subtitle Color', 'charity-essential' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .about-content h4' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
            'sub_text_padding',
            [
                'label' => __( 'Sub Title Padding', 'charity-essential' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .about-content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography2',
				'selector' 	=> '{{WRAPPER}} .about-content h4',
				'default' 	=> 'Open Sans"',
			]
		);
		$this->end_controls_section();
		# Subtitle part 2 end

		# Video Section 3
		$this->start_controls_section(
			'section_video_style',
			[
				'label' 	=> __( 'Video Intro', 'charity-essential' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'videointro_color',
			[
				'label'		=> __( 'Video Intro Color', 'charity-essential' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .hover-info h4' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
            'videointro_padding',
            [
                'label' => __( 'Video Intro Padding', 'charity-essential' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .hover-info h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography3',
				'selector' 	=> '{{WRAPPER}} .hover-info h4',
				'default' 	=> 'Open Sans"',
			]
		);
		$this->end_controls_section();
		# Subtitle part 2 end

	}

	protected function render( ) {
		$settings = $this->get_settings();
		$image = $settings['upload_image']; 
		$title_txt = $settings['title_txt']; 
		$subtitle_content = $settings['subtitle_content']; 
		$video_intro = $settings['video_intro']; 
		?>

		<div class="right-thumb">
			<div class="single-item">
	            <div class="thumb-area">
	                <?php if ( $image['url'] ) { ?>
						<img class="img-responsive" src="<?php echo esc_url($image['url']); ?>" alt="video thumbmnail">    
					<?php } ?>
	                <div class="about-content">
	                    <div class="content-inner">
	                        <span><?php echo $title_txt; ?></span>
	                        <h4><?php echo $subtitle_content; ?></h4>
	                    </div>
	                </div>
	                <div class="hover-info">
	                    <div class="content-inner">
	                        <h4><?php echo $video_intro; ?></h4>
	                        <div class="icon video-play-btn">
	                            <a class="video-link" href="<?php echo $settings['video_link']; ?>"><i class="icofont icofont-play-alt-2"></i></a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
        </div>

	<?php }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Charity_Video() );