<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Blog_List extends Widget_Base {
	public function get_name() {
		return 'eafe-blog-list';
	}

	public function get_title() {
		return __( 'Blog List', 'eafe' );
	}

	public function get_icon() {
		return 'eicon-post-list';
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

        $this->add_control(
            'blog_number',
            [
                'label' => __( 'Category Count', 'eafe' ),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => '6',
            ]
        );

		$this->add_control(
            'post_column',
            [
                'label'     => __( 'Number of Column', 'eafe' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 4,
                'options'   => [
                        '12' 	=> __( 'One Column', 'eafe' ),
                        '6' 	=> __( 'Two Column', 'eafe' ),
                        '4' 	=> __( 'Three Column', 'eafe' ),
                        '3' 	=> __( 'Four Column', 'eafe' ),
                    ],
            ]
        );

		$this->add_control(
			'post_cat',
			[
			   'label'    => __( 'Product Category', 'eafe' ),
			   'type'     => Controls_Manager::SELECT,
			   'options'  => eafe_all_category_list( 'category' ),
			   'multiple' => true,
			   'default'  => 'allpost'
			]
		);
		
		$this->add_control(
			  'post_order',
			  [
				  'label'     => __( 'Order', 'eafe' ),
				  'type'      => Controls_Manager::SELECT,
				  'default'   => 'DESC',
				  'options'   => [
						  'DESC' 		=> __( 'Descending', 'eafe' ),
						  'ASC' 		=> __( 'Ascending', 'eafe' ),
					  ],
			  ]
		);

        $this->end_controls_section();


		# DateTime Style
		$this->start_controls_section(
                'section_blogtime_style',
                [
                    'label' 	=> __( 'DateTime Style', 'eafe' ),
                    'tab' 		=> Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'datetime_color',
                [
                    'label'		=> __( 'DateTime Color', 'eafe' ),
                    'type'		=> Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpqx-our-blog .for_blog .thumb .post_time .mont' => 'color: {{VALUE}};',
						'{{WRAPPER}} .wpqx-our-blog .for_blog .thumb .post_time .date' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
					'label'		=> __( 'Month Typography', 'eafe' ),
                    'name' 		=> 'month_typography',
                    'selector' 	=> '{{WRAPPER}} .wpqx-our-blog .for_blog .thumb .post_time .mont',
                ]
            );

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
					'label'		=> __( 'Date Typography', 'eafe' ),
                    'name' 		=> 'date_typography',
                    'selector' 	=> '{{WRAPPER}} .wpqx-our-blog .for_blog .thumb .post_time .date',
                ]
            );

			$this->add_control(
                'datetime_bgcolor',
                [
                    'label'		=> __( 'Background Color', 'eafe' ),
                    'type'		=> Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpqx-our-blog .for_blog .thumb .post_time' => 'background: {{VALUE}};',
                    ],
                ]
            );
		$this->end_controls_section();
		# Datetime Section end 1


		# Category Style
		$this->start_controls_section(
			'section_category_style',
			[
				'label' 	=> __( 'Category Style', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'category_color',
			[
				'label'		=> __( 'Category Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpqx-our-blog .for_blog .tag' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wpqx-our-blog .for_blog .bgc-thm a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Category Typography', 'eafe' ),
				'name' 		=> 'category_typography',
				'selector' 	=> '{{WRAPPER}} .wpqx-our-blog .for_blog .bgc-thm a',
			]
		);

		$this->add_control(
			'category_bgcolor',
			[
				'label'		=> __( 'Background Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpqx-our-blog .for_blog .bgc-thm' => 'background: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		# Category Section end 1

		# Blog Title Style
		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Blog Title Style', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'		=> __( 'Title Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpqx-our-blog .for_blog .details .tc_content .title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Title Typography', 'eafe' ),
				'name' 		=> 'title_typography',
				'selector' 	=> '{{WRAPPER}} .wpqx-our-blog .for_blog .details .tc_content .title',
			]
		);

		$this->end_controls_section();
		# Blog Section end

		# Blog Meta Style
		$this->start_controls_section(
			'section_meta_style',
			[
				'label' 	=> __( 'Blog MetaTag Style', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label'		=> __( 'Meta Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpqx-our-blog .for_blog .details .bp_meta ul li a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'		=> __( 'Meta Typography', 'eafe' ),
				'name' 		=> 'meta_typography',
				'selector' 	=> '{{WRAPPER}} .wpqx-our-blog .for_blog .details .bp_meta ul li a',
			]
		);

		$this->end_controls_section();
		# Blog Section end

	}

	protected function render( ) {
		$settings = $this->get_settings();
		
		$post_number = !empty($settings['blog_number']) ? $settings['blog_number'] : '6';
		$post_column = !empty($settings['post_column']) ? $settings['post_column'] : '3';
		$post_cat = !empty($settings['post_cat']) ? $settings['post_cat'] : array();
		$post_order = !empty($settings['post_order']) ? $settings['post_order'] : array();
		$paged =  get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; 

		# Query Build
		if( $post_cat === 'allpost' ){
			$args = array(
			  'post_type'     	=> 'post',
			  'post_status' 		=> 'publish',
			  'posts_per_page' 	=> esc_attr($post_number),			
			  'order' 			=> $post_order,
			  'paged'				=> $paged    
		  );
		}else{
			$args = array(
				'post_type'     	=> 'post',
			  	'post_status' 		=> 'publish',
			  	'posts_per_page' 		=> esc_attr($post_number),			
			  	'order' 				=> $post_order,
			  	'paged'				=> $paged,
				'tax_query'    		=> array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => esc_attr($post_cat),
					),
			  	),
		  	);
		}
        
        $query = new \WP_Query($args); ?>

        <div class="wpqx-our-blog">
			<div class="eafe-row">
				<?php
					$i = 0;
					if($query->have_posts()){
						while ($query->have_posts()) {
							$query->the_post(); ?>

							<div class="eafe-col-<?php echo $post_column; ?>">
								<div class="for_blog">
									<div class="thumb">
										<div class="post_time">
											<span class="mont"><?php echo esc_html(get_the_date('F')); ?></span><br>
											<span class="date"><?php echo esc_html(get_the_date('d')); ?></span>
										</div>

										<?php if ( has_post_thumbnail() ){ ?>
											<a class="skip-link" href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('kitolms-medium', array('class' => 'img-whp')); ?>
											</a>
										<?php } ?> 
									</div>

									<div class="details">
										<div class="tc_content">
											<div class="tag bgc-thm">
												<?php echo wp_kses_post(get_the_category_list(', ')); ?>
											</div>
											<?php the_title( sprintf( '<h4 class="title"><a href="%s" class="skip-link">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
											<div class="bp_meta">
												<ul>
													<li class="list-inline-item"><a href="<?php the_permalink(); ?>"><span class="flaticon-user fz15 mr10"></span> <?php esc_html_e('By', 'eafe'); ?> <?php echo esc_html(get_the_author_meta('display_name')); ?></a></li>
													<li class="list-inline-item"><a href="<?php the_permalink(); ?>"><span class="flaticon-chat fz15 mr10"></span> <?php echo get_comments_number(get_the_ID()); ?><?php esc_html_e(' Comments', 'eafe'); ?></a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>

						<?php }
					}
				?>
			</div>
        </div>
          
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Blog_List() );
