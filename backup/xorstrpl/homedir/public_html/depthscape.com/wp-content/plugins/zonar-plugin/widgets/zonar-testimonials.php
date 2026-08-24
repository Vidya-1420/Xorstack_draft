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
class Zonar_Testimonials extends Widget_Base {

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
		return 'zonar-testimonials';
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
		return __( 'Zonar Testimonials', 'zonar-plugin' );
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
			'elementor-testimonial',
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
			'sec_number',
			[
				'label' => __( 'Section Number', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('01', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'image',
			[
				'label' => __( 'Image', 'zonar-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
				'url' => 'https://webredox.net/demo/wp/zonar/wp-content/uploads/2020/11/1-2.jpg',
				],
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'title',
			[
				'label' => __( 'Name', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('Andy Dimasky', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'description',
			[
				'label' => __( 'Description', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor. Duis autem vel eum  sit amet semiriure dolor consectetur adipiscing elit. ', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'zonartestimonials',
			[
				'label' => __( 'Testimonial Item', 'tank-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __('Andy Dimasky', 'zonar-plugin'),
						'sec_number' => __('01', 'zonar-plugin'),
					],
					
					[
						'title' => __('Frank Dellov', 'zonar-plugin'),
						'sec_number' => __('02', 'zonar-plugin'),
					],
					
					[
						'title' => __('Centa Simpson', 'zonar-plugin'),
						'sec_number' => __('03', 'zonar-plugin'),
					],
					
					[
						'title' => __('Nicolo Svensky', 'zonar-plugin'),
						'sec_number' => __('04', 'zonar-plugin'),
					],
					
				],
				
			]
		);

		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'car_control',
			[
				'label' => __( 'Carousel Options', 'zonar-plugin' ),
			]
		);
		
		$this->add_control(
			'sliderspeed',
			[
				'label' => __( 'Slider Speed', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '1400',
			]
		);
		
		$this->add_control(
			'sliderplay',
			[
				'label' => __( 'Slider Autoplay', 'xpider-ts' ),
				'description' => __( '', 'xpider-ts' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'false' => 'Disable',
					'true' => 'Enable',
				],
				'default' => 'false',
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonilas-text h3' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .testimonilas-text h3',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_counter',
			[
				'label' => __( 'Section Number', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_style_counter_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testi-number' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_style_counter_typography',
				'selector' => '{{WRAPPER}} .testi-number',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_description',
			[
				'label' => __( 'Description', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_style_description_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonilas-text p' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_style_description_typography',
				'selector' => '{{WRAPPER}} .testimonilas-text p',
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
									<div class="testimonilas-carousel-wrap fl-wrap">
                                        <div class="tc-button tc-button-next"><i class="fal fa-angle-right"></i></div>
                                        <div class="tc-button tc-button-prev"><i class="fal fa-angle-left"></i></div>
                                        <div class="testimonilas-carousel-el">
                                            <div class="swiper-container" data-slider-speed="<?php echo esc_attr($settings['sliderspeed']); ?>" data-slider-play="<?php echo esc_attr($settings['sliderplay']); ?>">
                                                <div class="swiper-wrapper">
												<?php foreach( $settings['zonartestimonials'] as $zonartestimonial ) :?>
                                                    <!--testi-item-->
                                                    <div class="swiper-slide">
                                                        <div class="testi-item fl-wrap">
                                                            <div class="testi-avatar"><img src="<?php echo esc_url($zonartestimonial['image']['url']); ?>" alt="<?php echo esc_attr($zonartestimonial['image']['alt']); ?>" ></div>
                                                            <div class="testimonilas-text fl-wrap">
                                                                <h3><?php echo esc_html($zonartestimonial['title']); ?></h3>
                                                                <p>"<?php echo esc_html($zonartestimonial['description']); ?>"</p>
                                                                <span class="testi-number"><?php echo esc_html($zonartestimonial['sec_number']); ?>.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--testi-item end-->
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tc-pagination"></div>
                                    </div>        
									<?php
	}

}