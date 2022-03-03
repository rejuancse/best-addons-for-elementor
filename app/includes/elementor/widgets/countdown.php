<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_CountDown extends Widget_Base {
	public function get_name() {
		return 'count-down';
	}

	public function get_title() {
		return __( 'Count Down', 'wpew' );
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

		# Title text
		$this->add_control(
            'title_text',
            [
                'label' => __( 'Title Text', 'wpew' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter hotline', 'wpew' ),
                'default' => __( 'Deal of the Day', 'wpew' ),
            ]
        );

		# Date time
        $this->add_control(
            'date_time',
            [
                'label' => __( 'Choose Date Time', 'wpew' ),
                'type' => Controls_Manager::DATE_TIME,
                'label_block' => true,
                'placeholder' => __( 'Enter Date Time', 'wpew' ),
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


		# Title text color
		$this->add_control(
			'title_text_color',
			[
				'label'		=> __( 'Title Text Color', 'wpew' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-title h2' => 'color: {{VALUE}};',
				],
			]
		);


		# Title text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Title Text Typography', 'wpew' ),
				'name' 		=> 'title_typography',
				'selector' 	=> '{{WRAPPER}} .main-title h2',
			]
		);

		$this->end_controls_section();
		# Title Section end 1

	}

	protected function render( ) {
		$settings = $this->get_settings();
		$title_text = $settings['title_text'];
		$date_time = strtotime($settings['date_time']);
		$date = date_i18n("d F Y G:i", strtotime($settings['date_time']));

		$t = date("Y-m-d", $date_time);

		?>

        <div class="main-title df db-414 tac-414 justify-content-center">
            <h2 class=""> <?php echo $title_text ?> </h2>
            <div class="deal_countdown">
			<!-- 2 may 2022 -->
                <ul class="deal_counter bgc-thm" id="timer" data-endtime="<?php echo $t ?>"></ul>
            </div>
        </div>

		<?php 
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_CountDown() );
