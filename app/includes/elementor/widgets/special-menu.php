<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_EAFE_Special_Menu extends \Elementor\Widget_Base {
	public function get_name() {
		return 'eafe-special-menu';
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

		# Special Menu List
		$this->add_control(
			'special_menu_list',
			[
				'label' 		=> __( 'Special Menu Items', 'eafe' ),
				'type' 			=> Controls_Manager::REPEATER,
				'show_label'  	=> true,
				'default' 		=> [
					[
						'text' => __( 'Event #1', 'eafe' ),
						'icon' => 'fa fa-check',
					],	
				],
				'fields' 		=> [
					[
						'name' 			=> 'items_title_text',
						'label' 		=> __( 'Items Title Text', 'eafe' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'eafe' ),
						'default' 		=> __( 'Fried Rice x 1', 'eafe' ),
					],
					[
						'name' 			=> 'items_sub_title_text',
						'label' 		=> __( 'Items Sub-Title Text', 'eafe' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'eafe' ),
						'default' 		=> __( 'Price: ', 'eafe' ),
					],
					[
						'name' 			=> 'items_currency_text',
						'label' 		=> __( 'Items Currency Text', 'eafe' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'eafe' ),
						'default' 		=> __( '$', 'eafe' ),
					],
					[
						'name' 			=> 'items_price_text',
						'label' 		=> __( 'Items Price Text', 'eafe' ),
						'type' 			=> Controls_Manager::TEXT,
						'label_block' 	=> true,
						'placeholder' 	=> __( 'Button Text', 'eafe' ),
						'default' 		=> __( '7.00', 'eafe' ),
					],
				],
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
				'label'		=> __( 'Items Title Text Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .set_menu li' => 'color: {{VALUE}};',
				],
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
				'label'		=> __( 'Items Text Typography', 'eafe' ),
				'name' 		=> 'items_price_text_color_typography',
				'selector' 	=> '{{WRAPPER}} .single_special .set_menu li',
			]
		);

		$this->end_controls_section();
		# Title Section end 1
	}

	protected function render( ) {
		$settings = $this->get_settings();  ?>

		<!-- <section class="special_menu mt-60 mb-60"> -->
			<div class="section-title text-center">
				<p>Famous for good food</p>
				<h4>special menu</h4>
			</div>
			<div class="single_special">
				<img src="http://infinityflamesoft.com/html/restarunt-preview/assets/img/sp1.jpg" alt="">
				<ul class="set_menu">
					<?php $sum_of_value = 0; $currency = "$";?>
					<?php foreach($settings['special_menu_list'] as $list) { ?>
						<?php $currency = $list['items_currency_text']; $sum_of_value+=$list['items_price_text']; ?>
						<li> <?php echo $list['items_title_text']; ?> <span> <?php echo $list['items_sub_title_text'];?> <?php echo $list['items_currency_text'];?> <?php echo $list['items_price_text'];?> </span></li>
					<?php } ?>
					<!-- <li>Fried Rice x 1<span>Price: $9.00</span></li> -->
					<!-- <li>Checken x 2<span>Price: $15.00</span></li>
					<li>Salad x 1<span>Price: $7.00</span></li>
					 <li>1 250ml x 1<span>Price: $3.00</span></li> -->
					<!-- <li class="total">Total:<span>$24.00</span></li> -->
					<li class="total"><?php echo $settings['items_total_text'] ?><span><?php echo $currency;?> <?php echo $sum_of_value;?></span></li>
				</ul>
			</div>
		<!-- </section> -->

		<?php 
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_EAFE_Special_Menu() );
