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
class Zonar_Skill_Bar extends Widget_Base {

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
		return 'zonar-skill-bar';
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
		return __( 'Zonar Progress Bar', 'zonar-plugin' );
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
		return 'eicon-skill-bar';
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
			'elementor-skill-bar',
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
			'title', [
				'label' => __( 'Title', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('Photoshop', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'counternumber', [
				'label' => __( 'Counter Number', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('95', 'zonar-plugin'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'zonarprogressbars',
			[
				'label' => __( 'Progress Bar', 'zonar-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __('Photoshop', 'zonar-plugin'),
						'counternumber' => __('95', 'zonar-plugin'),
					],
					[
						'title' => __('HTML/Css', 'zonar-plugin'),
						'counternumber' => __('65', 'zonar-plugin'),
					],
					[
						'title' => __('3D MAX', 'zonar-plugin'),
						'counternumber' => __('95', 'zonar-plugin'),
					],
					[
						'title' => __('PHP', 'zonar-plugin'),
						'counternumber' => __('70', 'zonar-plugin'),
					],
					[
						'title' => __('Javascript', 'zonar-plugin'),
						'counternumber' => __('60', 'zonar-plugin'),
					],
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_back_opt',
			[
				'label' => __( 'Background', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'back_color_main',
			[
				'label' => __( 'Background Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skillbar-bg' => 'background: {{VALUE}};',
				],
				
			]
		);
		
		$this->add_control(
			'back_color_active',
			[
				'label' => __( 'Background Color(Active)', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom-skillbar' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .custom-skillbar-title span' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .custom-skillbar-title span',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_counter',
			[
				'label' => __( 'Number Counter', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_style_counter_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skill-bar-percent' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_style_counter_typography',
				'selector' => '{{WRAPPER}} .skill-bar-percent',
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

		<div class="skillbar-box-el animaper">
            <div class="pr-bg pr-bg-white"></div>
			<?php foreach( $settings['zonarprogressbars'] as $zonarprogressbar ) : ?>
            <!-- skill 1-->
            <div class="custom-skillbar-title"><span><?php echo esc_html($zonarprogressbar['title']); ?></span></div>
            <div class="skill-bar-percent"><?php echo esc_attr($zonarprogressbar['counternumber']); ?>%</div>
                <div class="skillbar-bg" data-percent="<?php echo esc_attr($zonarprogressbar['counternumber']); ?>%">
                    <div class="custom-skillbar"></div>
                </div>
			<?php endforeach; ?>
        </div>

        <?php
		
	}
	protected function content_template() {}

}