<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class BAFE_Widget_BAFE_Special_Menu extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'bafe-special-menus';
	}

	public function get_title() {
		return __( 'Special Menu', 'bafe' );
	}

	public function get_icon() {
		return 'eicon-site-title';
	}

	public function get_categories() {
		return [ 'bafe-elementor' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Title Element', 'bafe' )
            ]
        );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'menu_item_name', [
				'label' => esc_html__( 'Menu Title', 'bafe' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Fried Rice x 1' , 'bafe' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'items_price_text', [
				'label' => esc_html__( 'Price Text', 'bafe' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Price: ' , 'bafe' ),
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'items_price', [
				'label' 	=> esc_html__( 'Item Price', 'bafe' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
				'default' 	=> esc_html__( '7.00' , 'bafe' ),
				'show_label' => true,
			]
		);

		$this->add_control(
			'special_menu_list',
			[
				'label' => esc_html__( 'Special Menu Items', 'bafe' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'menu_item_name' => esc_html__( 'Fried Rice x 1', 'bafe' ),
						'items_price_text' => esc_html__( 'Price: ', 'bafe' ),
						'items_price' 	=> esc_html__( '7.00', 'bafe' ),
					],
					[
						'menu_item_name' => esc_html__( 'Salad x 1', 'bafe' ),
						'items_price_text' => esc_html__( 'Price: ', 'bafe' ),
						'items_price' => esc_html__( '1.00', 'bafe' ),
					],
				],
				'title_field' => '{{{ menu_item_name }}}',
			]
		);

		$this->add_control(
            'items_currency',
            [
                'label' => __( 'Currency', 'bafe' ),
				'type' 			=> Controls_Manager::SELECT,
				'options'  		=> getCurrencyList(),
				'multiple' 		=> false,
				'default'  		=> 'USD:$',
            ]
        );

		$this->add_control(
            'items_total_text',
            [
                'label' => __( 'Items Total Text', 'bafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your sales name', 'bafe' ),
                'default' => __( 'Total:', 'bafe' ),
            ]
        );

        $this->end_controls_section();
        # Option End

		$this->start_controls_section(
			'special_menu_items_style',
			[
				'label' 	=> __( 'Title', 'bafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'special_items_title_text_color',
			[
				'label'		=> __( 'Menu Items Text Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .set_menu li' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'special_items_price_text_color',
			[
				'label'		=> __( 'Price Text Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_special .set_menu li span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Global Typography', 'bafe' ),
				'name' 		=> 'menu_items_typography',
				'selector' 	=> '{{WRAPPER}} .single_special .set_menu li',
			]
		);


		$this->add_responsive_control(
			'item_gap',
			[
				'label' => esc_html__( 'Item Spacing', 'bafe' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single_special .set_menu li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'first_divider',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label'		=> __( 'Divider Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_special .total' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'border_width',
			[
				'label' => esc_html__( 'Border Width', 'bafe' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single_special .total' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'divider_type',
			[
				'label'     => __( 'Border Type', 'bafe' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'dotted',
				'options'   => [
						'solid' 		=> __( 'Solid', 'bafe' ),
						'dotted' 		=> __( 'Dotted', 'bafe' ),
						'dashed' 		=> __( 'dashed', 'bafe' ),
					],
				'selectors' => [
						'{{WRAPPER}} .single_special .total' => 'border-style: {{VALUE}} none none;',
					],
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
						<?php echo esc_html($list['menu_item_name']); ?> 
						<span> 
							<?php echo esc_html($list['items_price_text']); ?>
							<?php echo esc_html($crcy_code[1]).''.esc_html($list['items_price']); ?>
						</span>
					</li>
				<?php } ?>
				<li class="total">
                    <?php echo esc_html($settings['items_total_text']); ?>
					<span><?php echo esc_html($crcy_code[1]).''.esc_html($sum_of_value);?></span>
				</li>
			</ul>
		</div>

		<?php 
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new BAFE_Widget_BAFE_Special_Menu() );
