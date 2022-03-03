<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Online_Delivery extends Widget_Base {
	public function get_name() {
		return 'online-delivery';
	}

	public function get_title() {
		return __( 'Online Delivery', 'wpew' );
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

		# Title text field
        $this->add_control(
            'title_text',
            [
                'label' => __( 'Title Text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter title text', 'wpew' ),
                'default' => __( 'WHATSAPP ORDERING SERVICE PLACE YOUR ORDERS AT', 'wpew' ),
            ]
        );
		

		# Hotline text field
		$this->add_control(
            'hotline_text',
            [
                'label' => __( 'Hotline Text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter hotline', 'wpew' ),
                'default' => __( '392 96 32', 'wpew' ),
            ]
        );

		# Delivery image
		$this->add_control(
			'delivery_image',
			[
				'label' => esc_html__( 'Choose Image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		# Icon
		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
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

		# Title Text Color
		$this->add_control(
			'title_text_color',
			[
				'label'		=> __( 'Title Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .online_delivery .title' => 'color: {{VALUE}};',
				],
			]
		);

		# Hotline Text Color
		$this->add_control(
			'hotline_text_color',
			[
				'label'		=> __( 'Hotline Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .online_delivery .text-thm' => 'color: {{VALUE}};',
				],
			]
		);

		# Timeline Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Timeline Title Typography', 'wpew' ),
				'name' 		=> 'title_typography',
				'selector' 	=> '{{WRAPPER}} .online_delivery h3',
			]
		);

		$this->end_controls_section();
		# Title Section end 1

	}

	protected function render( ) {
		$settings = $this->get_settings();
		$title_text = $settings['title_text'];
		$hotline_text = $settings['hotline_text'];
		$delivery_image = $settings['delivery_image'];
		?>

		<!-- https://creativelayers.net/themes/freshen-html/images/shop-items/delivery.png -->

		<div class="online_delivery text-center">
            <div class="delivery_bike">
				<img src=<?php echo $delivery_image['url'] ?> alt="delivery.png">
			</div>
            <h3 class="title text-thm2">
				<span class="flaticon-whatsapp text-thm vam mr15">
					<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</span>
				<?php echo $title_text ?>
				<span class="text-thm"> <?php echo $hotline_text ?> </span>
			</h3>
        </div>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Online_Delivery() );
