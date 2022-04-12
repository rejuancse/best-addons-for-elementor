<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_EAFE_Team_Member extends Widget_Base {
	
	public function get_name() {
		return 'team-member';
	}

	public function get_title() {
		return __( 'Member', 'eafe' );
	}

	public function get_icon() {
		return 'eicon-apps wts-eae-pe';
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
		    'team_layout',
		    [
		        'label'     => __( 'Layout', 'eafe' ),
		        'type'      => Controls_Manager::SELECT,
		        'default'   => '1',
		        'options'   => [
		                '1'  	=> 'Layout 1',
						'2'  	=> 'Layout 2',
		            ],
		    ]
		);

        $this->add_control(
           	'team_title',
            [
                'label' => __( 'Name', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter Name', 'eafe' ),
                'default' => __( 'Alex Carry', 'eafe' ),
            ]
        );

        $this->add_control(
           	'team_subtitle',
            [
                'label' => __( 'Designation', 'eafe' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Enter Designation', 'eafe' ),
                'default' => __( 'Developer', 'eafe' ),
            ]
        );

        $this->add_control(
            'team_desc',
            [
                'label' => __( 'Description', 'eafe' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Enter Description', 'eafe' ),
                'default' => __( 'Write your description content of this section.', 'eafe' ),
				'condition' => ['team_layout' => '2'],
            ]
        );
		
		$this->add_control(
		    'team_image',
		    [
		        'label'         => __( 'Team Image', 'eafe' ),
		        'type'          => Controls_Manager::MEDIA,
		        'label_block'   => true,
		        'default'       => [
		                'url' => Utils::get_placeholder_image_src(),
		            ],
		    ]
		);

        $this->end_controls_section();


		/**
		 * Settings
		 * */ 
		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Settings', 'eafe' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'name_color',
			[
				'label'		=> __( 'Background Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .member-single-item:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .eafe-members-wrap.style-2 .member-single-item .member-info' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
            'contents_padding',
            [
                'label' => __( 'Content Padding', 'eafe' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .member-single-item .member-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

		# Banner Title
		$this->add_control(
			'member_name_title',
			[
				'label' => esc_html__( 'Member Name', 'eafe' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'member_name_color',
			[
				'label'		=> __( 'Name Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .member-info h3' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'name_typography',
				'selector' 	=> '{{WRAPPER}} .member-info h3',
			]
		);

		$this->add_responsive_control(
			'name_title_space',
			[
				'label' => esc_html__( 'Spacing', 'eafe' ),
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
					'{{WRAPPER}} .member-info h3' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		# Banner Title
		$this->add_control(
			'designation_title',
			[
				'label' => esc_html__( 'Designation Title', 'eafe' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'designation_color',
			[
				'label'		=> __( 'Designation Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .member-info span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'designation_typography',
				'selector' 	=> '{{WRAPPER}} .member-info span',
			]
		);

		$this->add_responsive_control(
			'designation_space',
			[
				'label' => esc_html__( 'Spacing', 'eafe' ),
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
					'{{WRAPPER}} .member-info span' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		# Banner Title
		$this->add_control(
			'description_title',
			[
				'label' => esc_html__( 'Description Title', 'eafe' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['team_layout' => '2'],
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'		=> __( 'Description Color', 'eafe' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .style-2 .member-info p.description' => 'color: {{VALUE}};',
				],
				'condition' => ['team_layout' => '2'],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'description_typography',
				'selector' 	=> '{{WRAPPER}} .style-2 .member-info p.description',
				'condition' => ['team_layout' => '2'],
			]
		);
		$this->end_controls_section();
		# Designation Section end 3
	}

	protected function render( ) {
		$settings 		= $this->get_settings();
		$layout 		= $settings['team_layout'];
		$title 			= $settings['team_title'];
		$subtitle 		= $settings['team_subtitle'];
		$desc 			= $settings['team_desc'];
		$image 			= $settings['team_image'];

		#  Default Value
		$data_img = $data_subtitle = $data_desc = '';

	    # team image
	    if ( $image['url'] ) {
	        $img_link = $image['url'];
	        $data_img = '<div class="team-content-image">';
	            $data_img .= '<img class="img-responsive" src="'. esc_url($img_link) .'" alt="">';
	        $data_img .= '</div>';
	    }

	    # Subtitle  
	    if ( !empty( $subtitle ) ) {
	        $data_subtitle .= wp_kses_post($subtitle);
	    }

	    # Description
	    if ( !empty( $desc ) ) {
	        $data_desc .= '<p class="description">';
	            $data_desc .= wp_kses_post($desc);
	        $data_desc .= '</p>';
	    } ?>

		<div class="eafe-members-wrap style-<?php echo $layout; ?>">
		    <div class="eafe-team-wrap">
		        <div class="item eafe_team">
		            <?php
		            	switch ( $layout ) {
			                case '2':

								$output = '<div class="member-single-item">';
									$output .= '<div class="thumb">';
										$output .= $data_img;
									$output .= '</div>';
									$output .= '<div class="member-info">';
										$output .= '<h3>'.$title.'</h3>';
										$output .= '<span>'.$data_subtitle.'</span>';
										$output .= $data_desc;
									$output .= '</div>';
								$output .= '</div>';

			                    echo $output;
			                break;

			                default:

								$output = '<div class="member-single-item">';
									$output .= '<div class="thumb">';
										$output .= $data_img;
									$output .= '</div>';
									$output .= '<div class="member-info">';
										$output .= '<h3>'.$title.'</h3>';
										$output .= '<span>'.$data_subtitle.'</span>';
									$output .= '</div>';
								$output .= '</div>';

			                	echo $output;
			                break;            
			            }
		            ?>
		        </div>
		    </div>
	    </div>

		<?php 
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_EAFE_Team_Member() );
