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
class Zonar_Piechart extends Widget_Base {

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
		return 'zonar-piechart';
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
		return __( 'Zonar Pie Chart', 'zonar-plugin' );
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
		return 'eicon-countdown';
	}
	
	/**
	 * A list of scripts that the widgets is depended in
	 **/
	public function get_script_depends() {
		return [ 
			'elementor-pie-chart',
		 ];
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
			'back_color',
			[
				'label' => __( 'Background Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#F57500',
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('French', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'counternumber', [
				'label' => __( 'Data Percent', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('85', 'zonar-plugin'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'zonarpiecharts',
			[
				'label' => __( 'Pie Chart', 'zonar-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __('French', 'zonar-plugin'),
						'counternumber' => __('85', 'zonar-plugin'),
					],
					[
						'title' => __('Dutch', 'zonar-plugin'),
						'counternumber' => __('95', 'zonar-plugin'),
					],
					[
						'title' => __('Portugese', 'zonar-plugin'),
						'counternumber' => __('55', 'zonar-plugin'),
					],
					
				],
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
					'{{WRAPPER}} .piechart-holder h4' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .piechart-holder h4',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_counter',
			[
				'label' => __( 'Data Percent', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_style_counter_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .percent' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_style_counter_typography',
				'selector' => '{{WRAPPER}} .percent',
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

		<div class="piechart-holder-el animaper" data-skcolor="<?php echo $settings['back_color']; ?>">
			<?php foreach( $settings['zonarpiecharts'] as $zonarpiechart ) : ?>
            <!-- 1  -->
            <div class="piechart">
                <span class="chart" data-percent="<?php echo esc_attr($zonarpiechart['counternumber']); ?>">
					<span class="percent"></span>
                </span>
            <div class="clearfix"></div>
                <h4><?php echo esc_html($zonarpiechart['title']); ?></h4>
            </div>
            <!-- 1 end -->
            <?php endforeach; ?>                                                                                   
        </div>

        <?php
		
	}
	protected function content_template() {}
}