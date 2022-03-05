<?php
namespace Elementor;

use Elementor\Icons_Manager;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Tree_Diagram extends Widget_Base {
	public function get_name() {
		return 'wpew-tree';
	}

	public function get_title() {
		return __( 'Tree Diagram', 'wpew' );
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
            'tree_diagram',
            [
                'label' => __( 'Tree Diagram', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Tree Name', 'wpew' ),
                'default' => __( 'Tree Diagram', 'wpew' ),
            ]
        );

		$repeater = new \Elementor\Repeater();	

		$repeater->add_control(
			'tree_name',
			[
				'label' => __( 'Name of Tree', 'wpew' ),
				'type' => Controls_Manager::TEXT,
				'default' 		=> __( 'Parent', 'wpew' ),
				'label_block' => true,
            ],
		);

		$repeater->add_control(
			'custom_url',
			[
				'label' => __( 'Custom URL', 'wpew' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '#', 'wpew' ),
				'label_block' => true,
            ]
		);

		$repeater->add_control(
			'child_tree',
			[
				'label' => __( 'Child Tree', 'wpew' ),
				'type' => Controls_Manager::REPEATER,
				'default' => __( 'Child Tree', 'wpew' ),
				'fields' => [
					[
						'name' => 'childtree_text',
						'label' => __( 'Button Text', 'wpew' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Button Text', 'wpew' ),
						'label_block' => true,
					],
				],
				'default' => [
					[
						'childtree_text' => __( 'Child #1', 'wpew' ),
					],
					[
						'childtree_text' => __( 'Child #2', 'wpew' ),
					],
				],
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
						'tree_name' 	=> esc_html__( 'Parent', 'wpew' ),
					],
				], 
			]
		);

        $this->end_controls_section();

	}

	protected function render( ) {
		$settings = $this->get_settings_for_display();
		$tree_diagram = $settings['tree_diagram'];  
		$service_list_tree = $settings['service_list_tree']; ?>

		<div class="tree">
			<ul>
				<li class="tree-header">
					<?php if( ! empty($tree_diagram) ) { ?>
						<a href="#">
							<?php echo $tree_diagram; ?>
						</a>
					<?php } ?>

					<ul>
						<?php foreach ( $settings['service_list_tree'] as $item ) : ?>
							<li class="top-level">
								<a href="<?php echo $item['custom_url']; ?>" class="btn">
									<?php echo $item['tree_name']; ?>
								</a>

								<ul>
									<?php foreach ( $item['child_tree'] as $value ) : ?>
										<li class="top-level">
											<a href="#" class="btn">
												<?php echo $value['childtree_text']; ?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
			</ul>
		</div>					

		<?php wp_reset_postdata(); 
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Tree_Diagram() );

