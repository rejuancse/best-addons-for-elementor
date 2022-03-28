<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_EAFE_Member_Collection extends Widget_Base {
	public function get_name() {
		return 'eafe-member-collection';
	}

	public function get_title() {
		return __( 'Member Collection', 'eafe' );
	}

	public function get_icon() {
		return 'eicon-google-maps';
	}

	public function get_categories() {
		return [ 'eafe-elementor' ];
	}

	protected function register_controls() {
		
		$this->start_controls_section(
            'section_title',
            [
                'label' => __( 'GMap Content', 'eafe' )
            ]
        );
		$this->add_control(
            'gmap_address',
            [
                'label' => __( 'Address', 'eafe' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => 'Enter Address',
                'default' => 'Dhaka',
            ]
        );
        $this->end_controls_section();

        

		# Subtitle part 2 end
	}

	protected function render() {

		$settings = $this->get_settings(); ?>

                
        <table class="table de-table table-rank">
            <thead>
                <tr>
                    <th scope="col">Collection</th>
                    <th scope="col">Volume</th>
                    <th scope="col">24h %</th>
                    <th scope="col">7d %</th>
                    <th scope="col">Floor Price</th>
                    <th scope="col">Owners</th>
                    <th scope="col">Assets</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">
                        <div class="coll_list_pp" style="background-size: cover;"> <img class="lazy" src="https://gigaland.io/images/author/author-3.jpg" alt="">  </div> Abstraction</th>
                    <td>15,225.87</td>
                    <td class="d-plus">+87.54%</td>
                    <td class="d-plus">+309.49%</td>
                    <td>5.9</td>
                    <td>2.8k</td>
                    <td>58.5k</td>
                </tr>
                <tr>
                    <th scope="row">
                        <div class="coll_list_pp" style="background-size: cover;">
                            <img class="lazy" src="images/author/author-3.jpg" alt="">
                        </div> 
                        Cartoonism
                    </th>
                    <td>13,705.58</td>
                    <td class="d-min">-33.56%</td>
                    <td class="d-plus">+307.97%</td>
                    <td>4.5</td>
                    <td>2.2k</td>
                    <td>48.8k</td>
                </tr>
                <tr>
                    <th scope="row">
                        <div class="coll_list_pp" style="background-size: cover;"> <img class="lazy" src="images/author/author-4.jpg" alt="">  </div> Papercut</th>
                    <td>12,516.75</td>
                    <td class="d-plus">+23.45%</td>
                    <td class="d-plus">+171.25%</td>
                    <td>6.3</td>
                    <td>5.3k</td>
                    <td>54.2k</td>
                </tr>
                <tr>
                    <th scope="row">
                        <div class="coll_list_pp" style="background-size: cover;"> <img class="lazy" src="images/author/author-6.jpg" alt="">  </div> CoolThings</th>
                    <td>10,645.96</td>
                    <td class="d-plus">+51.99%</td>
                    <td class="d-min">-29.82%</td>
                    <td>6.6</td>
                    <td>1.8k</td>
                    <td>23.6k</td>
                </tr>
            </tbody>
        </table>
		
		<?php 
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_EAFE_Member_Collection() );
