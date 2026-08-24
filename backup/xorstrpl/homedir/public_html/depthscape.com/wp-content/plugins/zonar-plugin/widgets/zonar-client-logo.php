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
class Zonar_Client_Logo extends Widget_Base {

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
		return 'zonar-client-logo';
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
		return __( 'Zonar Client Logo', 'zonar-plugin' );
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
			'image',
			[
				'label' => __( 'Image', 'zonar-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
				'url' => 'https://webredox.net/demo/wp/zonar/wp-content/uploads/2020/11/1.png',
				],
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'custom_url',
			[
				'label' => __( 'Custom URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('#', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'button_target',
			[
				'label' => __( 'Link Target', 'zonar-plugin' ),
				'description' => __( '', 'zonar-plugin' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'_self' => 'Self',
					'_blank' => 'Blank',
					'_parent' => 'Parent',
					'_top' => 'Top',
				],
				'default' => '_blank',
				'label_block' => true,
				'condition' => [
					'custom_url!' => '',
				],					
			]
		);
		
		$this->add_control(
			'zonarclientslogos',
			[
				'label' => __( 'Logo Item', 'tank-plugin' ),
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
		<!-- client-list -->
                                    <div class="fl-wrap client-list">
                                        <ul class="">
										<?php foreach( $settings['zonarclientslogos'] as $zonarclientslogo ) :?>
                                            <li><a href="<?php echo esc_url($zonarclientslogo['custom_url']); ?>" target="<?php echo esc_attr($zonarteam['button_target']); ?>"><img src="<?php echo esc_url($zonarclientslogo['image']['url']); ?>" alt="<?php echo esc_attr($zonarclientslogo['image']['alt']); ?>"></a></li>
										<?php endforeach; ?>
                                        </ul>
                                        <!-- client-list end-->
                                    </div>     
									<?php
	}

}