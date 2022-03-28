<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_EAFE_Post_Search extends Widget_Base {
	public function get_name() {
		return 'eafe-post-search';
	}

	public function get_title() {
		return __( 'Post Ajax Search', 'eafe' );
	} 

	public function get_icon() {
		return 'eicon-call-to-action wts-eae-pe';
	}

	public function get_categories() {
		return [ 'eafe-elementor' ];
	}

	protected function register_controls() {

		# Post Search Box Text
		$this->start_controls_section(
			'searchbox_style',
			[
				'label' 	=> __( 'Search Settings', 'eafe' ),
			]
		);

		# Text color
		$this->add_control(
			'post_searchbox_text_color',
			[
				'label'		=> __( 'Text Color', 'eafe' ),
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
				'label'		=> __( 'Placeholder Color', 'eafe' ),
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
				'label'		=> __( 'Typography', 'eafe' ),
				'name' 		=> 'searchbox_text_typography',
				'selector' 	=> '{{WRAPPER}} .input-group .form-control',
			]
		);

		# Icon color
		$this->add_control(
			'searchbox_icon_color',
			[
				'label'		=> __( 'Icon Color', 'eafe' ),
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
				'label'		=> __( 'Backgound Color', 'eafe' ),
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
				'label'		=> __( 'Border Color', 'eafe' ),
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
				'label' 	=> __( 'Button', 'eafe' ),
			]
		);

		# Text color
		$this->add_control(
			'searchbox_button_text_color',
			[
				'label'		=> __( 'Text Color', 'eafe' ),
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
				'label'		=> __( 'Text Hover Color', 'eafe' ),
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
				'label'		=> __( 'Typography', 'eafe' ),
				'name' 		=> 'searchbox_button_text_typography',
				'selector' 	=> '{{WRAPPER}} .simple_search .btn',
			]
		);

		# Background color
		$this->add_control(
			'searchbox_button_background_color',
			[
				'label'		=> __( 'Background Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .simple_search .btn' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'searchbox_button_border_color',
			[
				'label'		=> __( 'Border Color', 'eafe' ),
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
				'label'		=> __( 'Background Hover Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .simple_search .btn:hover' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'searchbox_button_border_hover_color',
			[
				'label'		=> __( 'Border hover Color', 'eafe' ),
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
                'label' 		=> __( 'Background Padding', 'eafe' ),
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
				'label' 	=> __( 'Search Result', 'eafe' ),
			]
		);

		# Search box bottom spacing
		$this->add_responsive_control(
			'searchbox_result_bottom_spacing',
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
					'{{WRAPPER}} .eafe-search-results .search-results-list' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		# Text color
		$this->add_control(
			'searchbox_search_result_text_color',
			[
				'label'		=> __( 'Text Color', 'eafe' ),
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
				'label'		=> __( 'Text Hover Color', 'eafe' ),
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
				'label'		=> __( 'Typography', 'eafe' ),
				'name' 		=> 'searchbox_search_result_text_typography_color',
				'selector' 	=> '{{WRAPPER}} .search-results-list .pack-thumb a',
			]
		);

		# Background color
		$this->add_control(
			'searchbox_search_result_background_color',
			[
				'label'		=> __( 'Background Color', 'eafe' ),
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
				'label' => esc_html__( 'Background Border Radius', 'eafe' ),
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
                'label' 		=> __( 'Background Padding', 'eafe' ),
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
		            <input class="eafe-ajax-search form-control" data-url="<?php echo plugin_dir_url('', __FILE__).'wp-elementor-widgets-lite/app/extensions/post-search/classes/search-data.php'; ?>" type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_html_e('Search Your Post', 'eafe'); ?>"/>
		            <div class="input-group-append">
		            	<button class="btn theme-bg" type="submit"><?php esc_html_e('Search', 'eafe'); ?></button>
		            </div>
		        </form>
		        <div class="eafe-search-results"></div>
            </div>
        </div>
		
		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_EAFE_Post_Search() );
