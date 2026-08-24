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
class Zonar_Contact_Info extends Widget_Base {

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
		return 'zonar-contact-info';
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
		return __( 'Zonar Contact Info', 'zonar-plugin' );
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
		return 'eicon-bullet-list';
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
			'title', [
				'label' => __( 'Data Title', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('01. Date :', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'data_con', [
				'label' => __( 'Data Content', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('26.05.2019', 'zonar-plugin'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'zonarcontactinfos',
			[
				'label' => __( 'Contact Information', 'zonar-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __('01. Date :', 'zonar-plugin'),
						'data_con' => __('26.05.2019', 'zonar-plugin'),
					],
					[
						'title' => __('02. Client :', 'zonar-plugin'),
						'data_con' => __('Envato', 'zonar-plugin'),
					],
					[
						'title' => __('03. Category : ', 'zonar-plugin'),
						'data_con' => __('Design', 'zonar-plugin'),
					],
					[
						'title' => __('04. Online : ', 'zonar-plugin'),
						'data_con' => '<a href="#" target="_blank">themeforest.net </a>',
					],
					
				],
			]
		);
		
		$this->add_control(
			'details',
			[
				'label' => __( 'Details', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Details',
				'description' => __( 'Text Translate Option.', 'zonar-plugin' ),
			]
		);


		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Data Title', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project-details ul li span' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .project-details ul li span',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_con',
			[
				'label' => __( 'Data Content', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'con_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project-details ul li, .project-details ul li a' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'con_typography',
				'selector' => '{{WRAPPER}} .project-details ul li, .project-details ul li a',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_counter',
			[
				'label' => __( 'Details', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_style_counter_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project-details ul:after' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_style_counter_typography',
				'selector' => '{{WRAPPER}} .project-details ul:after',
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

		<!-- project-details-->                            
        <div class="project-details fl-wrap">
            <ul>
				<?php
				foreach( $settings['zonarcontactinfos'] as $zonarcontactinfo ) :
				?>
                <li><span><?php echo esc_html($zonarcontactinfo['title']); ?></span> <?php echo $zonarcontactinfo['data_con']; ?> </li>
				<?php endforeach; ?>
            </ul>
			<style>.project-details ul:after{content: "<?php echo esc_html($settings['details']); ?>";}</style>
        </div>
         <!-- project-details end -->							
		

        <?php
		
	}
	
	protected function content_template() {}

}