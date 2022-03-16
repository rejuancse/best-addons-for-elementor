<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_WPEW_Post_Search extends Widget_Base {
	public function get_name() {
		return 'wpew-post-search';
	}

	public function get_title() {
		return __( 'Post Ajax Search', 'wpew' );
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
                'label' => __( 'Post Ajax Search', 'wpew' )
            ]
        );

		$this->add_control(
			'enable_search',
			[
				'label' => esc_html__( 'Enable Search', 'wpew' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => esc_html__( 'Show', 'wpew' ),
				'label_off' => esc_html__( 'Hide', 'wpew' ),
			]
		);

		$this->add_control(
            'search_width',
            [
                'label' => __( 'Fixed Search Width', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter width', 'wpew' ),
                'default' => '600',
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
					'{{WRAPPER}} .simple-search-wrap .hero_search-2' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->end_controls_section();
        # Option End

		# Post Search Box Text
		$this->start_controls_section(
			'post_search_box_test_tyle',
			[
				'label' 	=> __( 'Search Box Text', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Text color
		$this->add_control(
			'post_search_box_text_color',
			[
				'label'		=> __( 'Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .input-group .form-control' => 'color: {{VALUE}};',
				],
			]
		);

		# Input placeholder color
		$this->add_control(
			'post_search_box_placeholder_color',
			[
				'label'		=> __( 'Input Placeholder Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .input-group .form-control::placeholder' => 'color: {{VALUE}};',
				],
			]
		);


		# Typography
		 $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Typography', 'wpew' ),
				'name' 		=> 'post_search_box_text_typography',
				'selector' 	=> '{{WRAPPER}} .input-group .form-control',
			]
		);

		$this->end_controls_section();

		# Post Search Box Icon Style
		$this->start_controls_section(
			'post_search_box_icon_tyle',
			[
				'label' 	=> __( 'Search Box Icon', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Icon color
		$this->add_control(
			'post_search_box_icon_color',
			[
				'label'		=> __( 'Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .input-group.simple_search .ico' => 'color: {{VALUE}};',
				],
			]
		);

		# Icon size
		 $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Typography', 'wpew' ),
				'name' 		=> 'post_search_box_text_typography',
				'selector' 	=> '{{WRAPPER}} .input-group .form-control',
			]
		);

		$this->end_controls_section();

		# Post Search Box Background Style
		$this->start_controls_section(
			'post_search_box_background_style',
			[
				'label' 	=> __( 'Search Box Background', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Background Color
		$this->add_control(
			'post_search_box_background_color',
			[
				'label'		=> __( 'Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .input-group .form-control' => 'background: {{VALUE}};',
				],
			]
		);

		# Background Border Color
		$this->add_control(
			'post_search_box_background_border_color',
			[
				'label'		=> __( 'Border Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .input-group .form-control' => 'border-color: {{VALUE}};',
				],
			]
		);

		# Background Border Radius
		$this->add_responsive_control(
			'post_search_box_background_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpew' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .input-group .simple_search' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		# Background Padding
		$this->add_responsive_control(
            'post_search_box_background_padding',
            [
                'label' 		=> __( 'Padding', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .input-group .form-control' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before', 
            ]
        );

		$this->end_controls_section();

		# Post Search Box Bottom Style
		$this->start_controls_section(
			'post_search_box_bottom_style',
			[
				'label' 	=> __( 'Search Box Bottom Style', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Search box bottom spacing
		$this->add_responsive_control(
			'post_search_box_result_bottom_spacing',
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
					'{{WRAPPER}} .simple_search' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		# Title Section end 1

		# Post Search Box Results Style
		$this->start_controls_section(
			'post_search_box_result_style',
			[
				'label' 	=> __( 'Search Result', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Text color
		$this->add_control(
			'post_search_box_search_result_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .search-results-list .pack-thumb a' => 'color: {{VALUE}};',
				],
			]
		);

		# Text Hover color
		$this->add_control(
			'post_search_box_search_result_text_hover_color',
			[
				'label'		=> __( 'Text Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .search-results-list .pack-thumb a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		# Text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Typography', 'wpew' ),
				'name' 		=> 'post_search_box_search_result_text_typography_color',
				'selector' 	=> '{{WRAPPER}} .search-results-list .pack-thumb a',
			]
		);

		# Background color
		$this->add_control(
			'post_search_box_search_result_background_color',
			[
				'label'		=> __( 'Background Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .search-results-list' => 'background: {{VALUE}};',
				],
			]
		);


		# Background Border Radius
		$this->add_responsive_control(
			'post_search_box_search_result_background_border_color',
			[
				'label' => esc_html__( 'Background Border Radius', 'wpew' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .search-results-list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		# Background Padding
		$this->add_responsive_control(
            'post_search_box_search_result_background_padding_color',
            [
                'label' 		=> __( 'Background Padding', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .search-results-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before', 
            ]
        );

		$this->end_controls_section();


		# Post Search Box Button Style
		$this->start_controls_section(
			'post_search_box_result_button_style',
			[
				'label' 	=> __( 'Button', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Text color
		$this->add_control(
			'post_search_box_button_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .simple_search .btn' => 'color: {{VALUE}};',
				],
			]
		);

		# Text hover color
		$this->add_control(
			'post_search_box_button_text_hover_color',
			[
				'label'		=> __( 'Text Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .simple_search .btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

		# Text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Typography', 'wpew' ),
				'name' 		=> 'post_search_box_button_text_typography',
				'selector' 	=> '{{WRAPPER}} .simple_search .btn',
			]
		);

		# Background color
		$this->add_control(
			'post_search_box_button_background_color',
			[
				'label'		=> __( 'Background Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .simple_search .btn' => 'background: {{VALUE}};',
				],
			]
		);

		# Background hover color
		$this->add_control(
			'post_search_box_button_background_hover_color',
			[
				'label'		=> __( 'Background Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .simple_search .btn:hover' => 'background: {{VALUE}};',
				],
			]
		);

		# Background Padding
		$this->add_responsive_control(
            'post_search_box_button_background_padding',
            [
                'label' 		=> __( 'Background Padding', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .simple_search .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before', 
            ]
        );

		$this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings(); 
		$enable_search = $settings['enable_search'];
		?>

        <div class="simple-search-wrap">
            <div class="hero_search-2">
				<form class="input-group simple_search" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	            	<i class="flaticon-search ico"></i>
		            <input class="wpew-ajax-search form-control" data-url="<?php echo plugin_dir_url('', __FILE__).'wp-elementor-widgets-lite/app/extensions/post-search/classes/search-data.php'; ?>" type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_html_e('Search Your Post', 'wpew'); ?>"/>
		            <div class="input-group-append">
		            	<button class="btn theme-bg" type="submit"><?php esc_html_e('Search', 'wpew'); ?></button>
		            </div>
		        </form>
		        <div class="wpew-search-results"></div>
            </div>
        </div>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPEW_Post_Search() );
