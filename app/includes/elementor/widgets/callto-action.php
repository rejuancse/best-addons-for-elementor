<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Kitolms_Callto_Action extends Widget_Base {
	public function get_name() {
		return 'kitolms-callto-action';
	}

	public function get_title() {
		return __( 'Call to Action', 'kitolms-core' );
	}

	public function get_icon() {
		return 'eicon-call-to-action wts-eae-pe';
	}

	public function get_categories() {
		return [ 'wpew-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Call to Action Element', 'kitolms-core' )
            ]
        );

        $this->add_control(
            'title_tags',
            [
                'label' => __( 'Title Tags', 'kitolms-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter tag title', 'kitolms-core' ),
                'default' => __( 'LISTEN TO OUR NEW ANTHEM', 'kitolms-core' ),
            ]
        );

        $this->add_control(
            'callto_action_txt',
            [
                'label' => __( 'Title', 'kitolms-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title', 'kitolms-core' ),
                'default' => __( 'This is heading', 'kitolms-core' ),
            ]
        );
        $this->add_control(
            'subtitle_content',
            [
                'label' => __( 'Sub Title Content', 'kitolms-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Enter Sub Title', 'kitolms-core' ),
                'default' => __( 'Write your sub title content of this section.', 'kitolms-core' ),
            ]
        );  
		
		$this->add_control(
			'enable_search',
			[
				'label' => esc_html__( 'Enable Search', 'kitolms-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => esc_html__( 'Show', 'kitolms-core' ),
				'label_off' => esc_html__( 'Hide', 'kitolms-core' ),
			]
		);

        $this->add_responsive_control(
			'align',
			[
				'label' 	=> __( 'Alignment', 'kitolms-core' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'left' 		=> [
						'title' => __( 'Left', 'kitolms-core' ),
						'icon' 	=> 'fa fa-align-left',
					],
					'center' 	=> [
						'title' => __( 'Center', 'kitolms-core' ),
						'icon' 	=> 'fa fa-align-center',
					],
					'right' 	=> [
						'title' => __( 'Right', 'kitolms-core' ),
						'icon' 	=> 'fa fa-align-right',
					],
					'justify' 	=> [
						'title' => __( 'Justified', 'kitolms-core' ),
						'icon' 	=> 'fa fa-align-justify',
					],
				],
				'default' 	=> 'center',
                'selectors' => [
                    '{{WRAPPER}} .simple-search-wrap .hero_search-2' => 'text-align: {{VALUE}};',
                ],
			]
		);
        $this->end_controls_section();
        # Option End

		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Title', 'kitolms-core' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label'		=> __( 'Text Color', 'kitolms-core' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_title' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography',
				'selector' 	=> '{{WRAPPER}} .banner_title',
			]
		);

		$this->add_responsive_control(
            'text_padding',
            [
                'label' 		=> __( 'Title Padding', 'kitolms-core' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .banner_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before', 
            ]
        );
        $this->add_responsive_control(
            'text_margin',
            [
                'label' 		=> __( 'Title Margin', 'kitolms-core' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .banner_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );
		$this->end_controls_section();
		# Title Section end 1


		# Sub Title Section 2
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' 	=> __( 'Sub Title', 'kitolms-core' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'		=> __( 'Subtitle Color', 'kitolms-core' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero_search-2 .font-lg' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography2',
				'selector' 	=> '{{WRAPPER}} .hero_search-2 .font-lg',
			]
		);

		$this->add_responsive_control(
            'sub_text_padding',
            [
                'label' => __( 'Sub Title Padding', 'kitolms-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .hero_search-2 .font-lg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
		# Subtitle part 2 end

        # Title Tags Section 3
		$this->start_controls_section(
			'section_title_tag_style',
			[
				'label' 	=> __( 'Title Tag', 'kitolms-core' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_tag_color',
			[
				'label'		=> __( 'Title Tag Color', 'kitolms-core' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elsio_tag' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'selector' => '{{WRAPPER}} .elsio_tag',
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography3',
				'selector' 	=> '{{WRAPPER}} .hero_search-2 .font-lg',
			]
		);

		$this->add_responsive_control(
            'title_tag_padding',
            [
                'label' => __( 'Title Tag Padding', 'kitolms-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .hero_search-2 .font-lg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
		# Subtitle part 2 end
	}

	protected function render( ) {
		$settings = $this->get_settings(); 
		$enable_search = $settings['enable_search'];
		$action = function_exists('tutor_utils') ? tutor_utils()->course_archive_page_url() : site_url('/');
		?>

        <div class="simple-search-wrap">
            <div class="hero_search-2">
                <?php if( $settings['title_tags'] ){ ?>
                    <div class="elsio_tag"><?php echo $settings['title_tags']; ?></div>
                <?php } ?>

                <?php if( $settings['callto_action_txt'] ){ ?>
                    <h1 class="banner_title mb-4"><?php echo $settings['callto_action_txt']; ?></h1>
                <?php } ?>

                <?php if( $settings['subtitle_content'] ){ ?>
                    <p class="font-lg mb-4"><?php echo $settings['subtitle_content']; ?></p>
                <?php } ?>
				
				<?php if($enable_search == 'yes') { ?> 
					<form class="input-group simple_search" action="<?php echo esc_url($action); ?>" method="get" role="search">
						<i class="fa fa-search ico"></i>
						<input type="text" name="s" value="<?php echo get_search_query(); ?>" class="form-control" placeholder="<?php esc_html_e('Search Your Cources', 'kitolms-core'); ?>">
						<div class="input-group-append">
							<button class="btn theme-bg" type="submit"><?php esc_html_e('Search', 'kitolms-core'); ?></button>
						</div>
					</form>
				<?php } ?>
            </div>
        </div>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Kitolms_Callto_Action() );
