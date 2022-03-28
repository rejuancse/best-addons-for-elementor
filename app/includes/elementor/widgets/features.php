<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_EAFE_Features extends \Elementor\Widget_Base {
	public function get_name() {
		return 'eafe-features';
	}

	public function get_title() {
		return __( 'EAFE Features', 'eafe' );
	}

	public function get_icon() {
		return 'eicon-editor-list-ul';
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
			'feature_icon',
			[
				'label' 	=> esc_html__( 'Feature Icon', 'eafe' ),
				'type' 		=> Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' 		=> [
					'value' 	=> 'fas fa-star',
					'library' 	=> 'fa-solid',
				],
			]
		);

        $this->add_control(
            'title_txt',
            [
                'label' => __( 'Title', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title', 'eafe' ),
                'default' => __( 'Explore Featured', 'eafe' ),
            ]
        );

        $this->add_control(
            'subtitle_content',
            [
                'label' => __( 'Sub Title Content', 'eafe' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Enter Sub Title', 'eafe' ),
                'default' => __( 'Write your sub title content of this section.', 'eafe' ),
            ]
        );         

        $this->end_controls_section();
        # Option End

		/*
		* Style
		* */ 
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' 	=> __( 'Icon', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label'		=> __( 'Icon Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .crp_box.fl_color .dro_141' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label'		=> __( 'Icon BG Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .crp_box.fl_color .dro_141' => 'background: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography_icon',
				'selector' 	=> '{{WRAPPER}} .crp_box.fl_color .dro_141',
			]
		);
		$this->end_controls_section();
		# Icon Section end 1

		# Title Sections
		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Title', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label'		=> __( 'Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_title' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography_title',
				'selector' 	=> '{{WRAPPER}} .banner_title',
			]
		);

		$this->add_responsive_control(
            'text_padding',
            [
                'label' 		=> __( 'Title Padding', 'eafe' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .banner_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'label' 	=> __( 'Sub Title', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'		=> __( 'Subtitle Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero_search-2 .font-lg' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography_subtitle',
				'selector' 	=> '{{WRAPPER}} .hero_search-2 .font-lg',
			]
		);

		$this->add_responsive_control(
            'sub_text_padding',
            [
                'label' => __( 'Sub Title Padding', 'eafe' ),
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
	}

	protected function render( ) {
		$settings = $this->get_settings(); ?>

		<div class="crp_box fl_color">
			<div class="dro_140">
				<div class="dro_141">
					<?php Icons_Manager::render_icon( $settings['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<div class="dro_142">
					<?php if( $settings['title_txt'] ){ ?>
						<h6><?php echo $settings['title_txt']; ?></h6>
					<?php } ?>
					<?php if( $settings['subtitle_content'] ){ ?>
						<p><?php echo $settings['subtitle_content']; ?></p>
					<?php } ?>
				</div>
			</div>
		</div>

		<?php 
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_EAFE_Features() );
