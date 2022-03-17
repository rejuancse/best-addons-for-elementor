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

		# Post Search Box Text
		$this->start_controls_section(
			'searchbox_style',
			[
				'label' 	=> __( 'Search Settings', 'wpew' ),
			]
		);

		# Text color
		$this->add_control(
			'post_searchbox_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .input-group .form-control' => 'color: {{VALUE}};',
				],
			]
		);

		# Input placeholder color
		$this->add_control(
			'post_searchbox_placeholder_color',
			[
				'label'		=> __( 'Placeholder Color', 'wpew' ),
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
				'name' 		=> 'searchbox_text_typography',
				'selector' 	=> '{{WRAPPER}} .input-group .form-control',
			]
		);

		# Icon color
		$this->add_control(
			'searchbox_icon_color',
			[
				'label'		=> __( 'Icon Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .input-group.simple_search .ico' => 'color: {{VALUE}};',
				],
			]
		);

		# Background Color
		$this->add_control(
			'searchbox_background_color',
			[
				'label'		=> __( 'Backgound Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .input-group .form-control' => 'background: {{VALUE}};',
				],
			]
		);

		# Background Border Color
		$this->add_control(
			'searchbox_background_border_color',
			[
				'label'		=> __( 'Border Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .input-group .form-control' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		# Post Search Box Button Style
		$this->start_controls_section(
			'searchbox_result_button_style',
			[
				'label' 	=> __( 'Button', 'wpew' ),
			]
		);

		# Text color
		$this->add_control(
			'searchbox_button_text_color',
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
			'searchbox_button_text_hover_color',
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
				'name' 		=> 'searchbox_button_text_typography',
				'selector' 	=> '{{WRAPPER}} .simple_search .btn',
			]
		);

		# Background color
		$this->add_control(
			'searchbox_button_background_color',
			[
				'label'		=> __( 'Background Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .simple_search .btn' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'searchbox_button_border_color',
			[
				'label'		=> __( 'Border Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .simple_search .btn' => 'border-color: {{VALUE}};',
				],
			]
		);

		# Background hover color
		$this->add_control(
			'searchbox_button_background_hover_color',
			[
				'label'		=> __( 'Background Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .simple_search .btn:hover' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'searchbox_button_border_hover_color',
			[
				'label'		=> __( 'Border hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .simple_search .btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		# Background Padding
		$this->add_responsive_control(
            'searchbox_button_background_padding',
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

		# Post Search Box Results Style
		$this->start_controls_section(
			'searchbox_result_style',
			[
				'label' 	=> __( 'Search Result', 'wpew' ),
			]
		);

		# Search box bottom spacing
		$this->add_responsive_control(
			'searchbox_result_bottom_spacing',
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
					'{{WRAPPER}} .wpew-search-results .search-results-list' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		# Text color
		$this->add_control(
			'searchbox_search_result_text_color',
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
			'searchbox_search_result_text_hover_color',
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
				'name' 		=> 'searchbox_search_result_text_typography_color',
				'selector' 	=> '{{WRAPPER}} .search-results-list .pack-thumb a',
			]
		);

		# Background color
		$this->add_control(
			'searchbox_search_result_background_color',
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
			'searchbox_search_result_background_border_color',
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
            'searchbox_search_result_background_padding_color',
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
	}

	protected function render( ) {
		$settings = $this->get_settings(); ?>

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
