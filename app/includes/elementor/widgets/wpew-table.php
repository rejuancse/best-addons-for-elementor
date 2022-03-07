<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_WPEW_Table extends Widget_Base {
	public function get_name() {
		return 'wpew-table';
	}

	public function get_title() {
		return __( 'Tables Content', 'wpew' );
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
			'table_head',
			[
				'label' => __( 'Table Head Row', 'wpew' ),
				'type' => Controls_Manager::TEXT,
                'default'   => 'Co-Founder',   
            ]
		);

        $this->add_control(
			'row_head',
			[
				'label' => esc_html__( 'Table Head Row', 'wpew' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'timeline_title' => esc_html__( 'Co-Founder', 'wpew' ),
						'timeline_intro' => 'Lorem ipsum dolor sit amet',
						'timeline_datetime' => '18 March, 2021'
					],
				],
			]
		);

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
			'table_row',
			[
				'label' => __( 'Table Row', 'wpew' ),
				'type' => Controls_Manager::TEXT,
                'default'   => 'Co-Founder',   
            ]
		);

        $this->add_control(
			'row_repeater',
			[
				'label' => esc_html__( 'Row Repeater', 'wpew' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater1->get_controls(),
				'default' => [
					[
						'timeline_title' => esc_html__( 'Co-Founder', 'wpew' ),
					],
				],
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

        $row_head = $settings['row_head'];
        $row_repeater = $settings['row_repeater'];
		?>

		<!-- https://creativelayers.net/themes/freshen-html/images/shop-items/delivery.png -->

        <div class="data_table_area">
            <div id="world_table_wrapper" class="dataTables_wrapper no-footer">
                <table id="world_table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="world_table_info" style="width: 1175px;">
                    <thead> 
                        <tr role="row">
                            <?php $counter = 0; ?>
                            <?php foreach($row_head as $value){ ?>
                                <th> <?php echo $value['table_head']?> </th>
                                <?php $counter++ ?>
                            <?php } ?>

                            <!-- <th>Serial</th>
                            <th>Flag</th>
                            <th>Country</th>
                            <th>Cases</th>
                            <th>New Cases</th>
                            <th>Deaths</th>
                            <th>New Deaths</th>
                            <th>Recovered</th>
                            <th>Active</th>
                            <th>Critical</th> -->
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($row_repeater as $value){ ?>
                            <tr role="row" class="odd">
                                <?php for($a=0; $a<$counter; $a++){ ?>
                                    <td> <?php echo $value['table_row'] ?> </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>

                        <!-- <tr role="row" class="odd">
                                <td>
                                    <img src="https://disease.sh/assets/img/flags/us.png" width="30">
                                </td>

                             <td>1</td>
                            <td>
                                <img src="https://disease.sh/assets/img/flags/us.png" width="30">
                            </td>
                            <td>
                                <span class="font-weight-bold">USA</span>
                            </td>
                            <td class="sorting_1">
                                <span class="text-primary">80912619</span>
                            </td>
                            <td>
                                <span class="text-primary">0</span>
                            </td>
                            <td>
                                <span class="text-danger">983837</span>
                            </td>
                            <td>
                                <span class="text-danger">0</span>
                            </td>
                            <td>
                                <span class="text-success">54594944</span>
                            </td>
                            <td>
                                <span class="text-warning">25333838</span>
                            </td>
                            <td>
                                <span class="text-warning">6320</span>
                            </td> -->
                        <!-- </tr> -->
                        <!-- <tr role="row" class="even">
                            <td>2</td>
                            <td>
                                <img src="https://disease.sh/assets/img/flags/in.png" width="30">
                            </td>
                            <td>
                                <span class="font-weight-bold"><?php echo $counter ?> </span>
                            </td>
                            <td class="sorting_1">
                                <span class="text-primary">42962953</span>
                            </td>
                            <td>
                                <span class="text-primary">0</span>
                            </td>
                            <td>
                                <span class="text-danger">515063</span>
                            </td>
                            <td>
                                <span class="text-danger">0</span>
                            </td>
                            <td>
                                <span class="text-success">42388475</span>
                            </td>
                            <td>
                                <span class="text-warning">59415</span>
                            </td>
                            <td>
                                <span class="text-warning">8944</span>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPEW_Table() );
