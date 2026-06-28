<?php
/**
 * Plugin Name: Agenio Core
 * Description: Agenio Core Plugin Contains Elementor Widgets Specifically created for agenio WordPress Theme.
 * Version: 1.0
 * Author: WPRiver
 * Text Domain: agenio-core
 * Elementor tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

final class agenio_Core {
    const VERSION = '1.0';
    const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
    const MINIMUM_PHP_VERSION = '5.6';

    private static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
            self::$_instance->init();
        }
        return self::$_instance;
    }

    private function init() {
        // Load necessary files and hooks
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
        add_action( 'init', [ $this, 'load_textdomain' ] );
        add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );
    }

    public function load_textdomain() {
        load_plugin_textdomain( 'agenio-core', false, dirname( __FILE__ ) . '/languages' );
    }

    public function add_elementor_category() {
            \Elementor\Plugin::instance()->elements_manager->add_category( 'agenio', [
                'title' => __( 'Agenio Elements', 'agenio-core' ),
            ], 1 );
        }


    public function register_widgets() {


//------------------------------------------------------------------Home V1------------------------------------------------------------------------------//

        require_once( __DIR__ . '/widgets/home-v1/hero.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Hero_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/trusted.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Trusted_By_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/about.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_About_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/service.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Services_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/project.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Projects_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/process.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Working_Process_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/marquee.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Marquee_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/choose.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Why_Choose_Us_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/team.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Team_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/awards.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Awards_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/testimonial.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Testimonials_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/choose-point.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Why_Choose_Points_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/pricing.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Pricing_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/faq.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Faq_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/cta.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Cta_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/contactform.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Contact_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/footer.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Footer_Widget() );

        require_once( __DIR__ . '/widgets/home-v1/header.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Header_Widget() );

        // Service Single Page

        require_once( __DIR__ . '/widgets/service/service-single/breadcrumb.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Breadcrumb_Widget() );

        require_once( __DIR__ . '/widgets/service/service-single/section1.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Service_Details_One_Widget() );

        require_once( __DIR__ . '/widgets/service/service-single/section2.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Service_Details_Two_Widget() );

        // Service Single Page

        require_once( __DIR__ . '/widgets/work/work-single/section.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Work_Single_Widget() );

        require_once( __DIR__ . '/widgets/work/work-single/section2.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Work_Single_Next_Project_Widget() );

        // Contact

        require_once( __DIR__ . '/widgets/contact/contact.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Contact_Page_Widget() );

        // About Page

        require_once( __DIR__ . '/widgets/about/approach.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Our_Approach_Widget() );

        // Service Page

        require_once( __DIR__ . '/widgets/service/service.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Services_Page_Widget() );

        // Work Page

        require_once( __DIR__ . '/widgets/work/work.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Work_Page_Widget() );

        require_once( __DIR__ . '/widgets/work/delay.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Agenio_Delay_Stats_Widget() );


    }
}

// Initialize the plugin
function agenio_core_load() {
    return agenio_Core::instance();
}
agenio_core_load();
