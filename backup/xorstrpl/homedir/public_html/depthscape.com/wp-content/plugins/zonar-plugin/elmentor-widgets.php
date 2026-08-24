<?php
namespace ZONAREL;

use ZONAREL\Widgets\Sec_Title;
use ZONAREL\Widgets\Simple_Title;
use ZONAREL\Widgets\Sec_Separator;
use ZONAREL\Widgets\Zonar_Image;
use ZONAREL\Widgets\Zonar_Text_Block;
use ZONAREL\Widgets\Zonar_Number_Counter;
use ZONAREL\Widgets\Zonar_Button;
use ZONAREL\Widgets\Zonar_Service;
use ZONAREL\Widgets\Zonar_Call_To;
use ZONAREL\Widgets\Zonar_Team;
use ZONAREL\Widgets\Zonar_Skill_Bar;
use ZONAREL\Widgets\Zonar_Piechart;
use ZONAREL\Widgets\Zonar_Testimonials;
use ZONAREL\Widgets\Zonar_Client_Logo;
use ZONAREL\Widgets\Zonar_Accordion;
use ZONAREL\Widgets\Zonar_Contact_Info;
use ZONAREL\Widgets\Zonar_Gallery;
use ZONAREL\Widgets\Zonar_Image_Carousel;

if( ! defined('ABSPATH') ) exit;

class ZonarCore{

    public function __construct() {
        $this->add_actions();
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'zonar_after_register_scripts' ]);
    }


    public function add_actions() {
        add_action( 'elementor/init', [ $this, 'zonar_elementor_helper_init' ] );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
        add_action( 'elementor/widgets/register', [ $this, 'on_widgets_registered' ] );
    }


    public function zonar_elementor_helper_init() {
        \Elementor\Plugin::instance()->elements_manager->add_category(
            'zonar-addons',
            [
                'title'  => 'Zonar Addons',
                'icon' => 'font'
            ],
            1
        );
    }

    public function enqueue_widget_styles() {
    }

    public function zonar_after_register_scripts() {
        wp_register_script( 'elementor-team-carousel', ZONAR_URL . '/elementor-js/elementor-team-carousel.js', array('jquery'), null, true );
        wp_register_script( 'elementor-skill-bar', ZONAR_URL . '/elementor-js/elementor-skill-bar.js', array('jquery'), null, true );
        wp_register_script( 'elementor-pie-chart', ZONAR_URL . '/elementor-js/elementor-pie-chart.js', array('jquery'), null, true );
        wp_register_script( 'elementor-number-counter', ZONAR_URL . '/elementor-js/elementor-number-counter.js', array('jquery'), null, true );
        wp_register_script( 'elementor-testimonial', ZONAR_URL . '/elementor-js/elementor-testimonial.js', array('jquery'), null, true );
        wp_register_script( 'elementor-accordion', ZONAR_URL . '/elementor-js/elementor-accordion.js', array('jquery'), null, true );
        wp_register_script( 'elementor-image-carousel', ZONAR_URL . '/elementor-js/elementor-image-carousel.js', array('jquery'), null, true );
    }
	public function on_widgets_registered() {
        $this->includes();
        $this->register_widget();
    }
    private function includes(){
        require __DIR__ . '/widgets/sec-title.php';
        require __DIR__ . '/widgets/simple-title.php';
        require __DIR__ . '/widgets/sec-separator.php';
        require __DIR__ . '/widgets/zonar-image.php';
        require __DIR__ . '/widgets/zonar-text-block.php';
        require __DIR__ . '/widgets/zonar-number-counter.php';
        require __DIR__ . '/widgets/zonar-button.php';
        require __DIR__ . '/widgets/zonar-service.php';
        require __DIR__ . '/widgets/zonar-call-to.php';
        require __DIR__ . '/widgets/zonar-team.php';
        require __DIR__ . '/widgets/zonar-skill-bar.php';
        require __DIR__ . '/widgets/zonar-piechart.php';
        require __DIR__ . '/widgets/zonar-testimonials.php';
        require __DIR__ . '/widgets/zonar-client-logo.php';
        require __DIR__ . '/widgets/zonar-accordion.php';
        require __DIR__ . '/widgets/zonar-contact-info.php';
        require __DIR__ . '/widgets/zonar-gallery.php';
		 require __DIR__ . '/widgets/zonar-image-carousel.php';
    }

    private function register_widget(){
        \Elementor\Plugin::instance()->widgets_manager->register( new Sec_Title() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Simple_Title() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Sec_Separator() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Image() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Text_Block() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Number_Counter() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Button() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Service() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Call_To() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Team() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Skill_Bar() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Piechart() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Testimonials() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Client_Logo() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Accordion() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Contact_Info() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Gallery() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Zonar_Image_Carousel() );
       
    }

}


new ZonarCore();
