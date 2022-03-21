<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Photo_Gallery extends Widget_Base {
	public function get_name() {
		return 'photo-gallery';
	}

	public function get_title() {
		return __( 'Photo Gallery', 'eafe' );
	}

	public function get_icon() {	
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'eafe-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Photo Gallery', 'eafe' ),
			]
		);

		$this->add_control(
			'photogallery',
			[
				'label' => esc_html__( 'Add Images', 'eafe' ),
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
                'label'     => __( 'Number of Column', 'eafe' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 4,
                'options'   => [
                        '12' 	=> __( 'One Column', 'eafe' ),
                        '6' 	=> __( 'Two Column', 'eafe' ),
                        '4' 	=> __( 'Three Column', 'eafe' ),
                        '3' 	=> __( 'Four Column', 'eafe' ),
                    ],
            ]
        );

		$this->add_responsive_control(
			'gallery_border',
			[
				'label' => esc_html__( 'Border Radius', 'eafe' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .eafe-photo-gallery .popup-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'image_overlay_color',
			[
				'label'		=> __( 'Background Overlay', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe-photo-gallery .popup-image:before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'image_overlay_hover_color',
			[
				'label'		=> __( 'Background Hover Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eafe-photo-gallery .popup-image:hover:before' => 'background: {{VALUE}};',
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

		<div class="eafe-photo-gallery">
			<div class="eafe-row">
			<?php foreach ( $settings['photogallery'] as $item ) { ?>
				<div class="eafe-col-<?php echo $gallery_column; ?>">
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

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Photo_Gallery() );
