<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_EAFE_Special_Menu extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'eafe-special-menus';
	}

	public function get_title() {
		return __( 'Special Menu', 'eafe' );
	}

	public function get_icon() {
		return 'eicon-site-title';
	}

	public function get_categories() {
		return [ 'eafe-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Title Element', 'eafe' )
            ]
        );


		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'menu_item_name', [
				'label' => esc_html__( 'Menu Title', 'eafe' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Fried Rice x 1' , 'eafe' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'items_price_text', [
				'label' => esc_html__( 'Price Text', 'eafe' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Price: ' , 'eafe' ),
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'items_price', [
				'label' 	=> esc_html__( 'Item Price', 'eafe' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
				'default' 	=> esc_html__( '7.00' , 'eafe' ),
				'show_label' => true,
			]
		);

		$this->add_control(
			'special_menu_list',
			[
				'label' => esc_html__( 'Special Menu Items', 'eafe' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'menu_item_name' => esc_html__( 'Fried Rice x 1', 'eafe' ),
						'items_price_text' => esc_html__( 'Price: ', 'eafe' ),
						'items_price' 	=> esc_html__( '7.00', 'eafe' ),
					],
					[
						'menu_item_name' => esc_html__( 'Salad x 1', 'eafe' ),
						'items_price_text' => esc_html__( 'Price: ', 'eafe' ),
						'items_price' => esc_html__( '1.00', 'eafe' ),
					],
				],
				'title_field' => '{{{ menu_item_name }}}',
			]
		);

		$this->add_control(
            'items_currency',
            [
                'label' => __( 'Currency', 'eafe' ),
				'type' 			=> Controls_Manager::SELECT,
				'options'  		=> getCurrencyList(),
				'multiple' 		=> false,
				'default'  		=> 'USD:$',
            ]
        );

		$this->add_control(
            'items_total_text',
            [
                'label' => __( 'Items Total Text', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your sales name', 'eafe' ),
                'default' => __( 'Total:', 'eafe' ),
            ]
        );

        $this->end_controls_section();
        # Option End

		$this->start_controls_section(
			'special_menu_items_style',
			[
				'label' 	=> __( 'Title', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'special_items_title_text_color',
			[
				'label'		=> __( 'Menu Items Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .set_menu li' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Items Text Typography', 'eafe' ),
				'name' 		=> 'menu_items_typography',
				'selector' 	=> '{{WRAPPER}} .single_special .set_menu li',
			]
		);

		$this->add_control(
			'first_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'special_items_price_text_color',
			[
				'label'		=> __( 'Items Price Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_special .set_menu li span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Price Text Typography', 'eafe' ),
				'name' 		=> 'menu_price_text_typography',
				'selector' 	=> '{{WRAPPER}} .single_special .set_menu li span',
			]
		);

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'special_items_total_text_color',
			[
				'label'		=> __( 'Items Total Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_special .set_menu .total' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'special_items_price_totat_text_color',
			[
				'label'		=> __( 'Items Price Total Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_special .set_menu .total span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Total Typography', 'eafe' ),
				'name' 		=> 'items_total_typography',
				'selector' 	=> '{{WRAPPER}} .single_special .set_menu .total',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Total Price Typography', 'eafe' ),
				'name' 		=> 'items_total_price_typography',
				'selector' 	=> '{{WRAPPER}} .single_special .set_menu .total span',
			]
		);

		$this->end_controls_section();
		# Title Section end 1
	}

	protected function render( ) {
		$settings = $this->get_settings(); ?>

		<div class="single_special">
			<ul class="set_menu">
				<?php $sum_of_value = 0;?>
				<?php foreach($settings['special_menu_list'] as $list) { ?>
					<?php 
						$currency = $settings['items_currency']; 
						$crcy_code = explode(':', $currency);
						$sum_of_value += $list['items_price']; 
					?>
					<li>
						<?php echo $list['menu_item_name']; ?> 
						<span> 
							<?php echo $list['items_price_text'];?>
							<?php echo $crcy_code[1].''.$list['items_price']; ?>
						</span>
					</li>
				<?php } ?>
				<li class="total">
                    <?php echo $settings['items_total_text'] ?>
					<span><?php echo $crcy_code[1].''.$sum_of_value;?></span>
				</li>
			</ul>
		</div>

		<?php 
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_EAFE_Special_Menu() );
