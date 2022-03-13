<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Breaking_News extends Widget_Base {
	public function get_name() {
		return 'breaking-news';
	}

	public function get_title() {
		return __( 'Breaking News', 'wpew' );
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
            'countdown_style',
            [
                'label'     => __( 'CountDown Style', 'wpew' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'style1',
                'options'   => [
                        'style1' 	=> __( 'Style 1', 'wpew' ),
                        'style2' 	=> __( 'Style 2', 'wpew' ),
                    ],
            ]
        );

		$this->end_controls_section();
		# Title Section end 1

		# Breaking news title
		$this->start_controls_section(
			'news_title_style',
			[
				'label' 	=> __( 'Title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Breaking news title text color
		$this->add_control(
			'news_title_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ticker__breaking' => 'color: {{VALUE}};',
				],
			]
		);

        # Breaking news text background color
		$this->add_control(
			'news_title_backgound_color',
			[
				'label'		=> __( 'Backgound Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ticker__breaking' => 'background: {{VALUE}};',
				],
			]
		);

		# Breaking news text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Text Typography', 'wpew' ),
				'name' 		=> 'breaking_news_title_typography',
				'selector' 	=> '{{WRAPPER}} .ticker__breaking',
			]
		);

        # Breaking news title padding
		$this->add_responsive_control(
            'news_title_padding',
            [
                'label' 		=> __( 'Padding', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .ticker__breaking' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );

        $this->end_controls_section();

        # Breaking news headline title
		$this->start_controls_section(
			'news_headline_title_style',
			[
				'label' 	=> __( 'Headline Title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Breaking news headline title text color
		$this->add_control(
			'news_headline_title_text_color',
			[
				'label'		=> __( 'Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ticker__item' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .ticker__item a' => 'color: {{VALUE}};',
				],
			]
		);


		# Breaking news headline title link hover color
		$this->add_control(
			'news_headline_title_link_hover_color',
			[
				'label'		=> __( 'Link Hover Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ticker__item a:hover' => 'color: {{VALUE}};',
				],
			]
		);

        # Breaking news headline text background color
		$this->add_control(
			'news_headline_title_backgound_color',
			[
				'label'		=> __( 'Backgound Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ticker__viewport' => 'background: {{VALUE}};',
				],
			]
		);

		# Breaking news headline text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Text Typography', 'wpew' ),
				'name' 		=> 'breaking_news_headline_text_typography',
				'selector' 	=> '{{WRAPPER}} .ticker__item',
			]
		);

        # Breaking news headline text padding
		$this->add_responsive_control(
            'news_headline_text_padding',
            [
                'label' 		=> __( 'Padding', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .ticker__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );

        # Breaking news headline text border color
        $this->add_control(
			'news_headline_title_border_color',
			[
				'label'		=> __( 'Border Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ticker__viewport' => 'border-color: {{VALUE}};',
				],
			]
		);

        # Breaking news headline text border radius color
		$this->add_responsive_control(
			'news_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpew' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ticker__viewport' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        # Breaking news box shadow
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpew' ),
				'selector' => '{{WRAPPER}} .ticker_wrap',
			]
		);

        $this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings();

		?>

		<div class="breaking-news">
			<div class="ticker-wrap">
				<div class="ticker-heading">Breaking News</div>
				<div class="ticker">
					<div class="ticker__item"><a href="">Letterpress chambray brunch.</a></div>
					<div class="ticker__item">Vice mlkshk crucifix beard chillwave meditation hoodie asymmetrical Helvetica.</div>
					<div class="ticker__item">Ugh PBR&B kale chips Echo Park.</div>
					<div class="ticker__item">Gluten-free mumblecore chambray mixtape food truck. </div>
				</div>
			</div>
		</div>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Breaking_News() );
