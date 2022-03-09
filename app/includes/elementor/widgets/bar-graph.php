<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Bar_Graph extends Widget_Base {
	public function get_name() {
		return 'bar-graph';
	}

	public function get_title() {
		return __( 'Bar Graph', 'wpew' );
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

	}

	protected function render( ) {
		$settings = $this->get_settings();
		?>

        <div class="wrapper">
            <canvas id='c'></canvas>
            <div class="label">text</div>
        </div>
        <p>Please mouse over the dots</p>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Bar_Graph() );
