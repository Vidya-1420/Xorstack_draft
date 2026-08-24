<?php
namespace ZONAREL\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Zonar_Image_Carousel extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'zonar-image-carousel';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Zonar Image Carousel', 'zonar-plugin' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slider-push';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	 public function get_categories() {
 	    return [ 'zonar-addons' ];
 	}
	
	/**
	 * A list of scripts that the widgets is depended in
	 **/
	public function get_script_depends() {
		return [ 
			'elementor-image-carousel',
		 ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'zonar-plugin' ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'image', [
				'label' => __( 'Image', 'zonar-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
				'url' => 'https://webredox.net/demo/wp/zonar/wp-content/uploads/2020/11/1-3.jpg',
				],
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'video_url', [
				'label' => __( 'Popup Video URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('', 'zonar-plugin'),
				'description' => __( 'Use Youtube/ Vimeo video URL.<br>E.X: https://vimeo.com/322246026 <br>Optional.', 'zonar-plugin' ),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'image_info', [
				'label' => __( 'Image Info', 'zonar--plugin' ),
				'description' => __( '', 'zonar-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'st1' => 'Disable',
					'st2' => 'Enable',
				],
				'default' => 'st1',
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'image_info_title', [
				'label' => __( 'Info Title', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('', 'zonar-plugin'),
				'description' => __( 'E.X: Nulla blandit', 'zonar-plugin' ),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'image_info_con', [
				'label' => __( 'Info Content', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('', 'zonar-plugin'),
				'description' => __( 'E.X: Sed non nisi viverra, porttitor sem nec, vestibulum justo tortor ornare turpis faucibus', 'zonar-plugin' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'zonargallerys',
			[
				'label' => __( 'Image Gallery', 'zonar-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		
		$this->add_control(
			'info',
			[
				'label' => __( 'Info', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Info',
				'description' => __( 'Text Translate Option.', 'zonar-plugin' ),
			]
		);
		
		$this->add_control(
			'image_number',
			[
				'label' => __( 'Image Numbering', 'zonar--plugin' ),
				'description' => __( '', 'zonar-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
				'st1' => 'Disable',
				'st2' => 'Enable',
				],
				'default' => 'st1',
			]
		);


		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_info',
			[
				'label' => __( 'Info', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_info_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .show-info span' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_info_typography',
				'selector' => '{{WRAPPER}} .show-info span',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_info_title',
			[
				'label' => __( 'Info Title', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_info_title_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tooltip-info h5' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_info_title_typography',
				'selector' => '{{WRAPPER}} .tooltip-info h5',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_info_con',
			[
				'label' => __( 'Info Content', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_info_con_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tooltip-info p' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_info_con_typography',
				'selector' => '{{WRAPPER}} .tooltip-info p',
			]
		);
		$this->end_controls_section();
		
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();

        ?>
								<div class="clearfix"></div>
                                <div class="center-carousel-wrap fl-wrap">
                                    <div class="center-carousel center-carousel-el fl-wrap">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper lightgallery">
												<?php $zonar_counter=1;?>
												<?php foreach( $settings['zonargallerys'] as $zonargallery ) :?>
                                                <!--swiper-slide  --> 
                                                <div class="swiper-slide hov_zoom">
                                                    <img src="<?php echo esc_url($zonargallery['image']['url']); ?>" alt="<?php echo esc_attr($zonargallery['image']['alt']); ?>">
													<?php if( $zonargallery['video_url'] ) { ?>
													<a href="<?php echo esc_url($zonargallery['video_url']); ?>" class="box-media-zoom   popup-image"><i class="fal fa-play"></i></a>
													<?php } else { ?>
													<a href="<?php echo esc_url($zonargallery['image']['url']); ?>" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
													<?php } ;?>
													<?php if( $settings['image_number'] == 'st2' ) { ?>
                                                    <span class="slide-numb">.0<?php echo esc_html($zonar_counter); ?></span>
													<?php } ;?>
													<?php if( $zonargallery['image_info'] == 'st2' ) { ?>
                                                    <div class="show-info">
                                                        <span><?php echo esc_html($settings['info']); ?></span>
                                                        <div class="tooltip-info">
                                                            <h5><?php echo esc_html($zonargallery['image_info_title']); ?></h5>
                                                            <p><?php echo esc_html($zonargallery['image_info_con']); ?></p>
                                                        </div>
                                                    </div>
													<?php } ;?>
                                                </div>
                                                <!--swiper-slide end --> 
												<?php $zonar_counter++;?>
                                                <?php endforeach; ?>														 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fsc ccsw-next"><i class="fal fa-angle-right"></i></div>
                                    <div class="fsc ccsw-prev"><i class="fal fa-angle-left"></i></div>
                                </div>
                                <div class="clearfix"></div>     
									<?php
	}

}