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
class Zonar_Team extends Widget_Base {

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
		return 'zonar-team';
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
		return __( 'Zonar Team Carousel', 'zonar-plugin' );
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
	 * A list of scripts that the widgets is depended in
	 **/
	public function get_script_depends() {
		return [ 
			'elementor-team-carousel',
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
			'sec_number',
			[
				'label' => __( 'Section Number', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('01', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'title',
			[
				'label' => __( 'Name', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('David Gray', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'designation',
			[
				'label' => __( 'Designation', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('CEO / Developer', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'description',
			[
				'label' => __( 'Description', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'zonar-plugin'),
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
				'label' => __( 'Custom URL Target', 'zonar-plugin' ),
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
		
		$repeater->add_control(
			'image',
			[
				'label' => __( 'Image', 'zonar-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
				'url' => 'https://webredox.net/demo/wp/zonar/wp-content/uploads/2020/11/1-1.jpg',
				],
			]
		);
		
		$repeater->add_control(
			'email',
			[
				'label' => __( 'Email Address', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('yourmail@gmail.com', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'behance',
			[
				'label' => __( 'Behance Social URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('#', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'facebook',
			[
				'label' => __( 'Facebook Social URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('#', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'twitter',
			[
				'label' => __( 'Twitter Social URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('#', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'youtube',
			[
				'label' => __( 'Youtube Social URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'tiktok',
			[
				'label' => __( 'TikTok Social URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'vimeo',
			[
				'label' => __( 'Vimeo Social URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('#', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'pinterest',
			[
				'label' => __( 'Pinterest Social URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'xing',
			[
				'label' => __( 'Xing Social URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'linkedin',
			[
				'label' => __( 'Linkedin Social URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'instagram',
			[
				'label' => __( 'Instagram Social URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'vkontakte',
			[
				'label' => __( 'VKontakte Social URL', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => __('', 'zonar-plugin'),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'zonarteams',
			[
				'label' => __( 'Team Item', 'tank-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __('David Gray', 'zonar-plugin'),
						'sec_number' => __('01', 'zonar-plugin'),
					],
					
					[
						'title' => __('Alica Limishko', 'zonar-plugin'),
						'sec_number' => __('02', 'zonar-plugin'),
					],
					
					[
						'title' => __('Kevin Brunty', 'zonar-plugin'),
						'sec_number' => __('03', 'zonar-plugin'),
					],
					
				],
				
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'car_control',
			[
				'label' => __( 'Carousel Options', 'zonar-plugin' ),
			]
		);
		
		$this->add_control(
			'sliderspeed',
			[
				'label' => __( 'Slider Speed', 'zonar-plugin' ),
				'type' => Controls_Manager::TEXT,
				'default' => '1400',
			]
		);
		
		$this->add_control(
			'sliderplay',
			[
				'label' => __( 'Slider Autoplay', 'xpider-ts' ),
				'description' => __( '', 'xpider-ts' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'false' => 'Disable',
					'true' => 'Enable',
				],
				'default' => 'false',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_overlay',
			[
				'label' => __( 'Overlay', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label' => __( 'Background', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-photo .overlay' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .team-info h3' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .team-info h3',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_counter',
			[
				'label' => __( 'Section Number', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_style_counter_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-info-num' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_style_counter_typography',
				'selector' => '{{WRAPPER}} .team-info-num',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_designation',
			[
				'label' => __( 'Designation', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_style_designation_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-info h4' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_style_designation_typography',
				'selector' => '{{WRAPPER}} .team-info h4',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_description',
			[
				'label' => __( 'Description', 'zonar-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_style_description_color',
			[
				'label' => __( 'Color', 'zonar-plugin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-info p' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_style_description_typography',
				'selector' => '{{WRAPPER}} .team-info p',
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

		<!--grid-carousel-wrap -->
        <div class="grid-carousel-wrap fl-wrap">
            <div class="grid-carousel-el fl-wrap">
                <div class="swiper-container" data-slider-speed="<?php echo esc_attr($settings['sliderspeed']); ?>" data-slider-play="<?php echo esc_attr($settings['sliderplay']); ?>">
                    <div class="swiper-wrapper">
					<?php foreach( $settings['zonarteams'] as $zonarteam ) :?>
						<!-- team-box   --> 
                        <div class="swiper-slide">
                            <div class="team-box">
                                <div class="team-photo">
									<div class="overlay"></div>
									<img src="<?php echo esc_url($zonarteam['image']['url']); ?>" alt="<?php echo esc_attr($zonarteam['image']['alt']); ?>" class="respimg"> 	
									<?php if( $zonarteam['email'] ) { ?>
									<a href="mailto:<?php echo esc_attr($zonarteam['email']); ?>" class="team-contact_btn color-bg"><i class="fal fa-envelope"></i></a>
									<?php } ;?>
										<?php if( $zonarteam['sec_number'] ) { ?>
										<div class="team-info-num"><?php echo esc_html($zonarteam['sec_number']); ?>.</div>
										<?php } ;?>
											<?php if( $zonarteam['behance'] || $zonarteam['facebook'] || $zonarteam['twitter'] || $zonarteam['youtube'] || $zonarteam['vimeo'] || $zonarteam['pinterest'] || $zonarteam['xing'] || $zonarteam['linkedin'] || $zonarteam['instagram'] || $zonarteam['vkontakte'] ) { ?>
											<ul class="team-social">
												<?php if( $zonarteam['behance'] ) { ?>
												<li><a href="<?php echo esc_url($zonarteam['behance']); ?>" target="_blank"><i class="fab fa-behance"></i></a></li>
												<?php } ;?>
												<?php if( $zonarteam['facebook'] ) { ?>
												<li><a href="<?php echo esc_url($zonarteam['facebook']); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
												<?php } ;?>
												<?php if( $zonarteam['twitter'] ) { ?>
												<li><a href="<?php echo esc_url($zonarteam['twitter']); ?>" target="_blank"><i class="fab fa-x-twitter"></i></a></li>
												<?php } ;?>
												<?php if( $zonarteam['youtube'] ) { ?>
												<li><a href="<?php echo esc_url($zonarteam['youtube']); ?>" target="_blank"><i class="fab fa-youtube-square"></i></a></li>
												<?php } ;?>
												<?php if( $zonarteam['tikto'] ) { ?>
												<li><a href="<?php echo esc_url($zonarteam['tikto']); ?>" target="_blank"><i class="fab fa-tiktok"></i></a></li>
												<?php } ;?>
												<?php if( $zonarteam['vimeo'] ) { ?>
												<li><a href="<?php echo esc_url($zonarteam['vimeo']); ?>" target="_blank"><i class="fab fa-vimeo"></i></a></li>
												<?php } ;?>
												<?php if( $zonarteam['pinterest'] ) { ?>
												<li><a href="<?php echo esc_url($zonarteam['pinterest']); ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
												<?php } ;?>
												<?php if( $zonarteam['xing'] ) { ?>
												<li><a href="<?php echo esc_url($zonarteam['xing']); ?>" target="_blank"><i class="fab fa-xing"></i></a></li>
												<?php } ;?>
												<?php if( $zonarteam['linkedin'] ) { ?>
												<li><a href="<?php echo esc_url($zonarteam['linkedin']); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
												<?php } ;?>
												<?php if( $zonarteam['instagram'] ) { ?>
												<li><a href="<?php echo esc_url($zonarteam['instagram']); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
												<?php } ;?>
												<?php if( $zonarteam['vkontakte'] ) { ?>
												<li><a href="<?php echo esc_url($zonarteam['vkontakte']); ?>" target="_blank"><i class="fab fa-vk"></i></a></li>
												<?php } ;?>
											</ul>
											<?php } ;?>
                                </div>
                               <div class="team-info">
                                    <?php if( $zonarteam['custom_url'] ) { ?>
									<h3><a href="<?php echo esc_url($zonarteam['custom_url']); ?>" target="<?php echo esc_attr($zonarteam['button_target']); ?>"><?php echo esc_html($zonarteam['title']); ?></a></h3>
									<?php } else { ?>
									<h3><?php echo esc_html($zonarteam['title']); ?></h3>
									<?php } ;?>
                                    <h4><?php echo esc_html($zonarteam['designation']); ?></h4>
                                    <p><?php echo esc_html($zonarteam['description']); ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- team-box   end--> 
                        <?php endforeach; ?>                                                                           
                    </div>
                </div>
            </div>
            <div class="gc-slider-cont-wrap">
                <div class="gc-slider-cont gc-slider-cont-next"><i class="fal fa-angle-right"></i></div>
                <div class="gc-slider-cont gc-slider-cont-prev"><i class="fal fa-angle-left"></i></div>
            </div>
        </div>
        <!--grid-carousel-wrap end -->

        <?php
		//wp_register_script( 'mailchimp-validate', '//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js', array('jquery'), null, true );

	}

}