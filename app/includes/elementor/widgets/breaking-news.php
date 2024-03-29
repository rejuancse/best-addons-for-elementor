<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class BAFE_Widget_Breaking_News extends Widget_Base {
	
	public function get_name() {
		return 'breaking-news';
	}

	public function get_title() {
		return __( 'Breaking News', 'bafe' );
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

		$this->add_control(
            'breaking_news_title',
            [
                'label' => __( 'Heading Title', 'bafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter your title', 'bafe' ),
                'default' => __( 'Breaking News', 'bafe' ),
            ]
        );

		$this->add_control(
			'post_number',
			[
				'label'         => __( 'Number of Posts', 'bafe' ),
				'type'          => Controls_Manager::NUMBER,
				'label_block'   => false,
				'default'       => __( '5', 'bafe' ),
			]
		);

		$this->add_control(
			'post_cat',
			[
				'label'    => __( 'News Category', 'bafe' ),
				'type'     => Controls_Manager::SELECT,
				'options'  => bafe_all_category_list( 'category' ),
				'multiple' => true,
				'default'  => 'allpost'
			]
		);
		
		$this->add_control(
			'post_order_by',
			[
				'label'     => __( 'Order', 'bafe' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'DESC',
				'options'   => [
						'DESC' 		=> __( 'Descending', 'bafe' ),
						'ASC' 		=> __( 'Ascending', 'bafe' ),
					],
			]
		);

		$this->end_controls_section();
		# Title Section end 1


		/**
		 * Settings Section
		 */
		# Breaking news title
		$this->start_controls_section(
			'news_settings_style',
			[
				'label' 	=> __( 'Settings', 'bafe' ),
			]
		);

		# Breaking news title text color
		$this->add_responsive_control(
			'section_height_space',
			[
				'label' => esc_html__( 'Height', 'bafe' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 50,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bafe-breaking-news .ticker-wrap' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bafe-breaking-news .ticker-wrap .ticker' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bafe-breaking-news .ticker-wrap .ticker-heading' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'animation_speed',
			[
				'label' => esc_html__( 'Animation Speed', 'bafe' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30,
				],
				'range' => [
					's' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bafe-breaking-news .ticker-wrap .ticker' => 'animation-duration: {{SIZE}}s;',
				],
			]
		);

		# Breaking news headline text border radius color
		$this->add_responsive_control(
			'news_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bafe' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bafe-breaking-news' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		# Title Section end 1

		/**
		 * Heading Section
		 */
		# Breaking news title
		$this->start_controls_section(
			'news_title_style',
			[
				'label' 	=> __( 'Heading Section', 'bafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Breaking news title text color
		$this->add_control(
			'news_title_text_color',
			[
				'label'		=> __( 'Text Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bafe-breaking-news .ticker-wrap .ticker-heading' => 'color: {{VALUE}};',
				],
			]
		);

        # Breaking news text background color
		$this->add_control(
			'news_title_backgound_color',
			[
				'label'		=> __( 'Backgound Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bafe-breaking-news .ticker-wrap .ticker-heading' => 'background: {{VALUE}};',
					'{{WRAPPER}} .bafe-breaking-news .ticker-wrap .ticker__item:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bafe-breaking-news .ticker-wrap .ticker-heading:after' => 'border-left-color: {{VALUE}};',
				],
			]
		);

		# Breaking news text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Heading Typography', 'bafe' ),
				'name' 		=> 'breaking_news_title_typography',
				'selector' 	=> '{{WRAPPER}} .bafe-breaking-news .ticker-wrap .ticker-heading',
			]
		);

        $this->end_controls_section();
		
		/**
		 * Title Section
		 */
        # Breaking news headline title
		$this->start_controls_section(
			'news_headline_title_style',
			[
				'label' 	=> __( 'Headline', 'bafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		# Breaking news headline title text color
		$this->add_control(
			'news_headline_title_text_color',
			[
				'label'		=> __( 'Text Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bafe-breaking-news .ticker-wrap .ticker__item' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .bafe-breaking-news .ticker-wrap .ticker__item a' => 'color: {{VALUE}};',
				],
			]
		);

		# Breaking news headline title link hover color
		$this->add_control(
			'news_headline_title_link_hover_color',
			[
				'label'		=> __( 'Link Hover Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bafe-breaking-news .ticker-wrap .ticker__item a:hover' => 'color: {{VALUE}};',
				],
			]
		);

        # Breaking news headline text background color
		$this->add_control(
			'news_headline_title_backgound_color',
			[
				'label'		=> __( 'Backgound Color', 'bafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bafe-breaking-news .ticker-wrap' => 'background: {{VALUE}};',
				],
			]
		);

		# Breaking news headline text typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Text Typography', 'bafe' ),
				'name' 		=> 'breaking_news_headline_text_typography',
				'selector' 	=> '{{WRAPPER}} .bafe-breaking-news .ticker-wrap .ticker__item',
			]
		);

		$this->add_responsive_control(
			'media_title_space',
			[
				'label' => esc_html__( 'Title Gap', 'bafe' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bafe-breaking-news .ticker-wrap .ticker__item' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

        # Breaking news box shadow
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'bafe' ),
				'selector' => '{{WRAPPER}} .bafe-breaking-news',
			]
		);

        $this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings();
		$breaking_news_title = $settings['breaking_news_title'];
		$post_number 		= $settings['post_number'];
		$post_cat 			= $settings['post_cat'];
		$post_orderby 		= $settings['post_order_by'];

		# Query Build
		if( $post_cat == 'allpost' ){
			$args = array(
			  'post_type'     	=> 'post',
			  'post_status' 	=> 'publish',
			  'posts_per_page' 	=> esc_attr($post_number),			
			  'order' 			=> esc_html($post_orderby),  
		  );
		}else{
			$args = array(
				'post_type'     	=> 'post',
				'post_status' 		=> 'publish',
				'posts_per_page' 	=> esc_attr($post_number),			
				'order' 			=> esc_html($post_orderby),
				'tax_query'    		=> array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => esc_attr($post_cat),
					),
				),
		  	);
		}

	  	$data = new \WP_Query( $args ); ?>

		<div class="bafe-breaking-news">
			<div class="ticker-wrap">
				<?php if( ! empty( $breaking_news_title  ) ) { ?>
					<div class="ticker-heading"><?php echo esc_html($breaking_news_title); ?></div>
				<?php } ?>
				<div class="ticker">
					<?php if ( $data->have_posts() ) : ?>
					<?php while ( $data->have_posts() ) : $data->the_post(); 
						$permalink 	= get_permalink(); ?>
						<div class="ticker__item">
							<a href="<?php echo esc_url($permalink); ?>"><?php the_title(); ?></a>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<?php 
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new BAFE_Widget_Breaking_News() );
