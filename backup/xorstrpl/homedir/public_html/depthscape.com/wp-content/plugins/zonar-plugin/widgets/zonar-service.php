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
class Zonar_Service extends Widget_Base {

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
		return 'zonar-service';
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
		return __( 'Zonar Service Block', 'zonar-plugin' );
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
		return 'eicon-gallery-grid';
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
			'title',
			[
				'label' => __( 'Title', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Web Design',
			]
		);
		
		$this->add_control(
			'sec_number',
			[
				'label' => __( 'Section Number', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '01',
			]
		);
		
		$this->add_control(
			'icon_class',
			[
				'label' => __( 'Icon Class', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'fal fa-desktop',
				'description' => 'Use <a href="https://fontawesome.com/icons?d=gallery">Fontawesome</a> Icon Class. E.X: fal fa-desktop',
			]
		);
		
		$this->add_control(
			'short_details',
			[
				'label' => __( 'Short Details', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor.',
			]
		);
		
		$this->add_control(
			'details_button',
			[
				'label' => __( 'Button Text', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Details',
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'pop_cat_title', [
				'label' => __( 'Title', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('Concept', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'pop_cats',
			[
				'label' => __( 'Popup Area Tag', 'zonar-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'pop_cat_title' => __('Concept', 'zonar-plugin'),
					],
					[
						'pop_cat_title' => __('Design', 'zonar-plugin'),
					],
					[
						'pop_cat_title' => __('3D Modeling', 'zonar-plugin'),
					],
					
				],
				'condition' => [
					'popup_content!' => '',
				],
			]
		);
		
		$this->add_control(
			'popup_content',
			[
				'label' => __( 'Popup Content', 'zonar-plugin' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => 'Cras mattis iudicium purus sit amet fermentum at nos hinc posthac, sitientis piros afros. Lorem ipsum dolor sit amet, consectetur adipisici elit, petierunt uti sibi concilium totius Galliae in diem sed eius mod tempor incidunt ut labore et dolore magna aliqua. Pellentesque habitant morbi tristique senectus et netus piros labore et dolore magna.',
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
					'{{WRAPPER}} .process-details h4' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .process-details h4',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_sec_number',
			[
				'label' => __( 'Section Number', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sec_number_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .process-numder' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sec_number_typography',
				'selector' => '{{WRAPPER}} .process-numder',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_short_details',
			[
				'label' => __( 'Short Details & Popup Content', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sec_short_dt_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .process-details p, .pop-con-area, .pop-con-area p' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sec_shrt_dt_typography',
				'selector' => '{{WRAPPER}} .process-details p, .pop-con-area, .pop-con-area p',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_popup_tag',
			[
				'label' => __( 'Popup Area Tag', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sec_pop_cat_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ..pdcw_list li' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pop_cat_typography',
				'selector' => '{{WRAPPER}} .pdcw_list li',
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
												<div class="process-details">
                                                    <span class="pd-icon">
                                                    <i class="<?php echo esc_attr($settings['icon_class']); ?>"></i>
                                                    </span>
                                                    <h4><?php echo esc_html($settings['title']); ?></h4>
                                                    <div class="clearfix"></div>
                                                    <p><?php echo esc_attr($settings['short_details']); ?></p>
													<?php if( $settings['sec_number'] ) { ?>
                                                    <span class="process-numder"><?php echo esc_attr($settings['sec_number']); ?>.</span>
													<?php };?>
                                                    <?php if( $settings['popup_content'] ) { ?>
													<div class="show-phdc"><i class="fal fa-plus"></i> <span><?php echo esc_attr($settings['details_button']); ?></span></div>
                                                    <div class="proces-details-content">
                                                        <div class="close-hidden_pdc"><i class="fal fa-times"></i></div>
                                                        <div class="proces-details-content-wrap">
                                                            <ul class="pdcw_list fl-wrap">
															<?php foreach( $settings['pop_cats'] as $pop_cat ) :?>
                                                                <li><?php echo $pop_cat['pop_cat_title']; ?></h6></li>
															<?php endforeach; ?>
                                                            </ul>
															<p class="pop-con-area">
                                                            <?php echo esc_attr($settings['popup_content']); ?>
															</p>
                                                        </div>
                                                    </div>
													<?php } ;?>
                                                </div>
		
	    
	        <!-- =========== End of Title ============ -->

        <?php
		//wp_register_script( 'mailchimp-validate', '//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js', array('jquery'), null, true );

	}

}