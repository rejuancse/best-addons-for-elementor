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

	}

	protected function render( ) {
		$settings = $this->get_settings();
		?>

        
    <div class="ticker_wrap">
        <div class="ticker__breaking"> Breaking News: </div>
        <div class="ticker__viewport">
        <ul class="ticker__list" data-ticker="list">
            <li class="ticker__item" data-ticker="item">
                <a href="javascrit:void(0)">In publishing and graphic design</a>   
            </li>
            <li class="ticker__item" data-ticker="item">Lorem ipsum is a placeholder text commonly used to demonstrate the visual</li>
            <li class="ticker__item" data-ticker="item">Form of a document or a typeface without relying on meaningful content.</li>
        </ul>
        </div>
    </div>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Breaking_News() );
