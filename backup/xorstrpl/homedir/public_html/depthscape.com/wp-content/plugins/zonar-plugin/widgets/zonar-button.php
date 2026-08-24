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
class Zonar_Button extends Widget_Base {

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
		return 'zonar-button';
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
		return __( 'Zonar Button', 'zonar-plugin' );
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
		return 'eicon-button';
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
			'button_title',
			[
				'label' => __( 'Button Title', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'My Portfolio',
			]
		);
		
		$this->add_control(
			'button_url',
			[
				'label' => __( 'Button URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '#',
			]
		);
		
		$this->add_control(
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
				'default' => '_self',
				'label_block' => true,
				'condition' => [
					'button_url!' => '',
				],					
			]
		);	

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_button_title',
			[
				'label' => __( 'Button', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn' => 'color: {{VALUE}};',
				],
				
			]
		);
		
		$this->add_control(
			'title_color_hover',
			[
				'label' => __( 'Color(Hover)', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .btn:after' => 'color: {{VALUE}};',
				],
				
			]
		);
		
		$this->add_control(
			'back_color',
			[
				'label' => __( 'Background Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn' => 'background: {{VALUE}};',
				],
				
			]
		);
		
		$this->add_control(
			'back_color_hover',
			[
				'label' => __( 'Background Color(Hover)', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn:before' => 'background: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .btn',
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
		$settings = $this->get_settings(); ?>
		<a href="<?php echo esc_url($settings['button_url']); ?>"  target="<?php echo esc_attr($settings['button_target']); ?>" class="btn color-bg  fl-btn"><span><?php echo esc_html($settings['button_title']); ?></span></a>
	<?php }

}