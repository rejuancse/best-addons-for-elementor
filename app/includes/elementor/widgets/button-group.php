<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_WPQX_Button_Group extends Widget_Base {
	public function get_name() {
		return 'button-group';
	}

	public function get_title() {
		return __( 'Button Group', 'wpew' );
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


		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'button_title',
			[
				'label' => __( 'Button Title', 'wpew' ),
				'type' => Controls_Manager::TEXT,
                'default' => 'Click me',
            ]
		);

        $repeater->add_control(
			'button_title_color',
			[
				'label'		=> __( 'Button Title Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bg-btn-group a' => 'color: {{VALUE}};',
				],
            ]
		);


		$this->add_control(
			'button_list',
			[
				'label' => esc_html__( 'Button List', 'wpew' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
                        'button_title' => esc_html__( 'Co-Founder', 'wpew' ),
					],
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



        $this->add_responsive_control(
            'text_margin',
            [
                'label' 		=> __( 'Title Margin', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .banner_one' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );
		$this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings();
		$button_list = $settings['button_list'];
		?>

        <div class="bg-btn-group">
            <?php foreach($button_list as $value) { ?>
                <a href="#" class="btn-design" role="button"> <?php echo $value['button_title'] ?> </a>
            <?php } ?>
        </div>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPQX_Button_Group() );
