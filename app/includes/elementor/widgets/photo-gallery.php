<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Photo_Gallery extends Widget_Base {
	public function get_name() {
		return 'photo-gallery';
	}

	public function get_title() {
		return __( 'Photo Gallery', 'wpew' );
	}

	public function get_icon() {	
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'wpew-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Photo Gallery', 'wpew' ),
			]
		);

		$this->add_control(
			'photogallery',
			[
				'label' => esc_html__( 'Add Images', 'elementor' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
				'show_label' => false,
				'dynamic' => [
					'active' => true,
				],
			]
		);

        $this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings(); 

		if ( empty( $settings['photogallery'] ) ) {
			return;
		} ?>

		<div class="wpew-photo-gallery">
			<div class="row">
			<?php foreach ( $settings['photogallery'] as $item ) {
				$photo_gallery_url = wp_get_attachment_image_url( $item['id'], 'full' ); ?>
				<div class="col-md-4">
					<div class="crs_grid_thumb">
						<a class="popup-image" href="<?php echo esc_url($photo_gallery_url); ?>">
							<img class="swiper-slide-image" src="<?php echo esc_attr( $photo_gallery_url ); ?>" />
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
