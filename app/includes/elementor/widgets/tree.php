<?php
namespace Elementor;

use Elementor\Icons_Manager;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_WPEW_Tree extends Widget_Base {
	public function get_name() {
		return 'wpew-tree';
	}

	public function get_title() {
		return __( 'Simple Tree', 'wpew' );
	}

	public function get_icon() {
		return 'eicon-apps wts-eae-pe';
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
            'service_tree',
            [
                'label' => __( 'Service Tree', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Tree Name', 'wpew' ),
                'default' => __( 'Our Service', 'wpew' ),
            ]
        );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'tree_name',
			[
				'label' => __( 'Name of Tree', 'wpew' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Client | Project Base', 'wpew' ),
            ]
		);

		$repeater->add_control(
			'custom_url',
			[
				'label' => __( 'Custom URL', 'wpew' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '#', 'wpew' ),
            ]
		);

		$repeater->add_control(
			'animation_name',
			[
				'label' => __( 'Animation Name', 'wpew' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'slideInLeft', 'wpew' ),
            ]
		);

		$this->add_control(
			'service_list_tree',
			[
				'label' => esc_html__( 'Service Tree List', 'wpew' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'custom_url' 			=> esc_html__( '#', 'wpew' ),
						'animation_name' 	=> esc_html__( 'slideInLeft', 'wpew' ),
						'tree_name' 	=> esc_html__( 'Client | Project Base', 'wpew' ),
					],
				],
			]
		);

        $this->end_controls_section();

	}

	protected function render( ) {
		$settings = $this->get_settings_for_display();
		$service_tree = $settings['service_tree'];  
		$service_list_tree = $settings['service_list_tree'];
		
		?>

		<div class="tree">
			<ul>
				<li class="tree-header">
					<a href="#" class="wow zoomIn"><?php echo $service_tree; ?></a>
					<ul>
						<?php foreach ( $settings['service_list_tree'] as $item ) : ?>
							<li class="top-level wow <?php echo $item['animation_name']; ?>">
								<a href="<?php echo $item['custom_url']; ?>" class="btn"><?php echo $item['tree_name']; ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
			</ul>
		</div>					

		<?php wp_reset_postdata(); 
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPEW_Tree() );

