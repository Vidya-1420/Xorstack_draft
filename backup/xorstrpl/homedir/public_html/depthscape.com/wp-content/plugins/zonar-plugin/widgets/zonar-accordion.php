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
class Zonar_Accordion extends Widget_Base {

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
		return 'zonar-accordion';
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
		return __( 'Zonar Accordion', 'zonar-plugin' );
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
		return 'eicon-accordion';
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
			'elementor-accordion',
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
			'active', [
				'label' => __( 'Active', 'zonar-plugin' ),
					'description' => __( 'Select Yes For 1st Accordion Item.', 'zonar-plugin' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'st1' => 'No',
						'st2' => 'Yes',
				],
				'default' => 'st1',
				'label_block' => true,
			]
		);
	
		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Concept for Project' , 'zonar-plugin' ),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'acc_content', [
				'label' => __( 'Accordion Content', 'zonar-plugin' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.', 'zonar-plugin'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'zonaraccordions',
			[
				'label' => __( 'Accordion', 'zonar-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __('Concept for Project', 'zonar-plugin'),
					],
					[
						'title' => __('Suport and Development', 'zonar-plugin'),
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
					'{{WRAPPER}} .accordion-el a.toggle' => 'color: {{VALUE}};',
				],
				
			]
		);
		
		$this->add_control(
			'title_color_active',
			[
				'label' => __( 'Color(Active)', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion-el a.toggle.act-accordion' => 'color: {{VALUE}};',
					'{{WRAPPER}} .accordion-el a.toggle span:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .accordion-el a.toggle span:after' => 'background: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .accordion-el a.toggle',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_counter',
			[
				'label' => __('Accordion Content', 'zonar-plugin'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_style_counter_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion-inner' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_style_counter_typography',
				'selector' => '{{WRAPPER}} .accordion-inner',
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
		$settings = $this->get_settings_for_display();

        ?>

		<!-- accordion-->                            
        <div class="accordion-el mar-top">
			<?php
			foreach( $settings['zonaraccordions'] as $zonaraccordion ) :
			?>
            <a class="toggle <?php if( $zonaraccordion['active'] == 'st2' ) { ?>act-accordion<?php } ;?>" href="#"><?php echo esc_html($zonaraccordion['title']); ?> <span></span></a>
                 <div class="accordion-inner <?php if( $zonaraccordion['active'] == 'st2' ) { ?>visible<?php } ;?>">
                    <?php echo esc_html($zonaraccordion['acc_content']); ?>
                </div>
			<?php endforeach; ?>
        </div>
        <!-- accordion end --> 							
		

        <?php
		
	}
	protected function content_template() {}

}