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
class Zonar_Image extends Widget_Base {

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
		return 'zonar-image';
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
		return __( 'Zonar Image', 'zonar-plugin' );
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
		return 'eicon-image';
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

		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'zonar-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://webredox.net/demo/wp/zonar/wp-content/uploads/2020/11/about.jpg',
				],
			]
		);
		
		$this->add_control(
			'image_alt_text',
			[
				'label' => __( 'Image Alt text', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
			]
		);
		
		$this->add_control(
			'image_pop_video',
			[
				'label' => __( 'Popup Video URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'https://vimeo.com/34741214',
				'description' => 'Youtube/ Vimeo video URL. E.X: https://vimeo.com/34741214',
			]
		);
		
		$this->add_control(
			'image_pop_video_title',
			[
				'label' => __( 'Video Button Title', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Play Story video',
				//'description' => 'Youtube/ Vimeo video URL. E.X: https://vimeo.com/34741214',
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_video_title',
			[
				'label' => __( 'Video Button Title', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video_link span' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .video_link span',
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

		<!-- =========== Start of Title============ -->
		<div class="dec-img   fl-wrap">
        <img src="<?php echo $settings['image']['url']; ?>" class="respimg" alt="<?php echo $settings['image_alt_text']; ?>">
		<?php if( $settings['image_pop_video'] ) { ?>
        <a class="video_link image-popup" href="<?php echo $settings['image_pop_video']; ?>"><i class="fas fa-play"></i><span><?php echo $settings['image_pop_video_title']; ?></span></a>
		<?php } ;?>
        </div>
		
	    
	        <!-- =========== End of Title ============ -->

        <?php
		//wp_register_script( 'mailchimp-validate', '//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js', array('jquery'), null, true );

	}

}