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
class Zonar_Gallery extends Widget_Base {

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
		return 'zonar-gallery';
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
		return __( 'Zonar Gallery', 'zonar-plugin' );
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
		return 'eicon-gallery-justified';
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
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'column_width', [
				'label' => __( 'Column Width', 'zonar--plugin' ),
				'description' => __( '', 'zonar-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'gallery-item-one' => 'Default',
					'gallery-item-second' => 'Large',
				],
				'default' => 'gallery-item-one',
				'label_block' => true,
			]
		);
		
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
		
		$this->add_control(
			'zonargallerys',
			[
				'label' => __( 'Image Gallery', 'zonar-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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
									<!-- portfolio start -->
                                    <div class="gallery-items  min-pad lightgallery   fl-wrap  ">
										<?php foreach( $settings['zonargallerys'] as $zonargallery ) :?>
                                        <!-- gallery-item-->
                                        <div class="gallery-item  <?php echo esc_attr($zonargallery['column_width']); ?>">
                                            <div class="grid-item-holder hov_zoom">
                                                <img  src="<?php echo esc_url($zonargallery['image']['url']); ?>"    alt="<?php echo esc_attr($zonargallery['image']['alt']); ?>">
												<?php if( $zonargallery['video_url'] ) { ?>
                                                <a href="<?php echo esc_url($zonargallery['video_url']); ?>" class="box-media-zoom   popup-image"><i class="fal fa-play"></i></a>
												<?php } else { ?>
												<a href="<?php echo esc_url($zonargallery['image']['url']); ?>" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
												<?php } ;?>
                                            </div>
                                            <div class="pr-bg"></div>
                                        </div>
                                        <!-- gallery-item end-->
                                       <?php endforeach; ?>                          
                                    </div>
                                    <!-- portfolio end -->      
									<?php
	}

}