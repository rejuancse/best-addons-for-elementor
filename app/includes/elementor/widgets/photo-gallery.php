<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class BAFE_Widget_Photo_Gallery extends Widget_Base {
	public function get_name() {
		return 'photo-gallery';
	}

	public function get_title() {
		return __( 'Photo Gallery', 'bafe' );
	}

	public function get_icon() {	
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'bafe-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Photo Gallery', 'bafe' ),
			]
		);

		$this->add_control(
			'photogallery',
			[
				'label' => esc_html__( 'Add Images', 'bafe' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
				'show_label' => false,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
            'gallery_column',
            [
                'label'     => __( 'Number of Column', 'bafe' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 4,
                'options'   => [
                        '12' 	=> __( 'One Column', 'bafe' ),
                        '6' 	=> __( 'Two Column', 'bafe' ),
                        '4' 	=> __( 'Three Column', 'bafe' ),
                        '3' 	=> __( 'Four Column', 'bafe' ),
                    ],
            ]
        );

		$this->add_responsive_control(
			'gallery_border',
			[
				'label' => esc_html__( 'Border Radius', 'bafe' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bafe-photo-gallery .popup-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'image_overlay_color',
			[
				'label'		=> __( 'Background Overlay', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bafe-photo-gallery .popup-image:before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'image_overlay_hover_color',
			[
				'label'		=> __( 'Background Hover Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bafe-photo-gallery .popup-image:hover:before' => 'background: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings(); 
		$gallery_column = $settings['gallery_column'];

		if ( empty( $settings['photogallery'] ) ) {
			return;
		} ?>

		<div class="bafe-photo-gallery">
			<div class="bafe-row">
			<?php foreach ( $settings['photogallery'] as $item ) { ?>
				<div class="bafe-col-<?php echo esc_attr($gallery_column); ?>">
					<div class="gallery_grid_thumb">
						<a class="popup-image" href="<?php echo esc_url( $item['url'] ); ?>">
							<img class="slide-image" src="<?php echo esc_url( $item['url'] ); ?>" />
						</a>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>

	<?php 
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new BAFE_Widget_Photo_Gallery() );
