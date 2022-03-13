<?php
namespace Elementor;

use Elementor\Controls_Manager;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_WPEW_Tree_Diagram extends Widget_Base {
	public function get_name() {
		return 'wpew-tree-diagram';
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
				// 'default' => [
				// 	[
				// 		'childtree_text' => __( 'Child #1', 'wpew' ),
				// 	],
				// 	[
				// 		'childtree_text' => __( 'Child #2', 'wpew' ),
				// 	],
				// ],
            ]
		);

		$this->add_control(
			'diagram_tree_list',
			[
				'label' => esc_html__( 'Diagram Tree List', 'wpew' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tree_name' 	=> esc_html__( 'Parent', 'wpew' ),
						'child_tree' 	=> [
							[
								'childtree_text' => __( 'Child #1', 'wpew' ),
							],
							[
								'childtree_text' => __( 'Child #2', 'wpew' ),
							],
						],
					],
				],
			]
		);

        $this->end_controls_section();

		/**
		 * Diagram Style
		 */
		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Title', 'wpew' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Title text color
		$this->add_control(
			'parent_text_color',
			[
				'label'		=> __( 'Parent Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tree-diagram ul li.tree-header a' => 'color: {{VALUE}};',
				],
			]
		);

		# Title text color
		$this->add_control(
			'parent_bg_color',
			[
				'label'		=> __( 'Background Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tree-diagram ul li.tree-header a.parent' => 'background-color: {{VALUE}};',
				],
			]
		);

		# Title text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Tree Parent Typography', 'wpew' ),
				'name' 		=> 'parent_typography',
				'selector' 	=> '{{WRAPPER}} .tree-diagram ul li.tree-header a.parent',
				
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'parent_diagram_border',
				'selector' => '{{WRAPPER}} .tree-diagram ul li.tree-header a.parent',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'parent_border',
			[
				'label' => esc_html__( 'Border Radius', 'wpew' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tree-diagram ul li.tree-header a.parent' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		# Padding
		$this->add_responsive_control(
            'parent_tree_padding',
            [
                'label' 		=> __( 'Padding', 'wpew' ),
                'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> [ 'px', 'em', '%' ],
                'selectors' 	=> [
                    '{{WRAPPER}} .tree-diagram ul li.tree-header a.parent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'before',
            ]
        );

		$this->end_controls_section();
		# Title Section end 1
	}
	
	protected function render( ) {
		$settings = $this->get_settings();
		$tree_diagram = $settings['tree_diagram'];  
		$diagram_tree_list = $settings['diagram_tree_list']; ?>

		<div class="tree-diagram">
			<ul>
				<li class="tree-header">
					<?php if( ! empty($tree_diagram) ) { ?>
						<a class="parent" href="javascript:void(0)"><?php echo $tree_diagram; ?></a>
					<?php } ?>

					<ul>
						<?php
						if( isset( $diagram_tree_list ) && ! empty( $diagram_tree_list ) ) {
						foreach ( $diagram_tree_list as $item ) : ?>
							<li class="top-level">
								<a href="javascript:void(0)" class="btn">
									<?php echo $item['tree_name']; ?>
								</a>

								<ul>
									<?php
									if( isset( $item['child_tree'] ) && !empty( $item['child_tree'] ) ) { ?>
									<?php foreach ( $item['child_tree'] as $value ) : ?>
										<li class="top-level">
											<a href="javascript:void(0)" class="btn">
												<?php echo $value['childtree_text']; ?>
											</a>
										</li>
									<?php endforeach; ?>
									<?php } ?>
								</ul>
							</li>
						<?php endforeach; } ?>
					</ul>
				</li>
			</ul>
		</div>					

		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPEW_Tree_Diagram() );

