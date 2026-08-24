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
class Zonar_Number_Counter extends Widget_Base {

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
		return 'zonar-number-counter';
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
		return __( 'Zonar Number Counter', 'zonar-plugin' );
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
		return 'eicon-counter';
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
			'elementor-number-counter',
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
		
		$this->add_control(
			'txt_align',
			[
				'label' => esc_html__( 'Text Alignment', 'zonar-plugin' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'text-left' => [
						'title' => esc_html__( 'Left', 'zonar-plugin' ),
						'icon' => 'eicon-text-align-left',
					],
					'text-center' => [
						'title' => esc_html__( 'Center', 'zonar-plugin' ),
						'icon' => 'eicon-text-align-center',
					],
					'text-right' => [
						'title' => esc_html__( 'Right', 'zonar-plugin' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'text-left',
				'toggle' => true,
			]
		);	
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('Finished projects', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'counternumber', [
				'label' => __( 'Counter Number', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('145', 'zonar-plugin'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'zonarcounters',
			[
				'label' => __( 'Number Counter', 'zonar-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __('Finished projects', 'zonar-plugin'),
						'counternumber' => __('145', 'zonar-plugin'),
					],
					[
						'title' => __('Working hours', 'zonar-plugin'),
						'counternumber' => __('825', 'zonar-plugin'),
					],
					[
						'title' => __('Awards won', 'zonar-plugin'),
						'counternumber' => __('15', 'zonar-plugin'),
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
					'{{WRAPPER}} .inline-facts-wrap h6' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .inline-facts-wrap h6',
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
					'{{WRAPPER}} .inline-facts-wrap .num' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_style_counter_typography',
				'selector' => '{{WRAPPER}} .inline-facts-wrap .num',
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
		<div class="facts-container fl-wrap">
		<?php
		foreach( $settings['zonarcounters'] as $zonarcounter ) :
		?>
		<!-- inline-facts -->
        <div class="inline-facts-wrap">
            <div class="inline-facts <?php echo esc_attr($settings['txt_align']); ?>">
                <div class="milestone-counter">
                    <div class="stats-el animaper">
                        <div class="num" data-content="0" data-num="<?php echo esc_attr($zonarcounter['counternumber']); ?>">0</div>
                    </div>
                </div>
            <h6><?php echo esc_html($zonarcounter['title']); ?></h6>
            </div>
        </div>
        <!-- inline-facts end -->
		<?php endforeach; ?>
		</div>										
		
	    
	        <!-- =========== End of Title ============ -->

        <?php
		
	}
	protected function content_template() {}

}