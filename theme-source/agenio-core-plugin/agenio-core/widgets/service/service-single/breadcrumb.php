<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Breadcrumb_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_breadcrumb_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Breadcrumb Banner', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  CONTENT SECTION
         * ========================================================= */
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We craft detailed service solutions.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We turn ideas into meaningful digital experiences through thoughtful strategy and refined design. Our approach blends creativity, technology, and purpose to build brands that last.', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  BACKGROUND SHAPE
         * ========================================================= */
        $this->start_controls_section(
            'background_shape_section',
            [
                'label' => esc_html__( 'Background Shape', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_shape',
            [
                'label'   => esc_html__( 'Background Shape', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banner/shape/bg-shape.svg',
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  FLOATING SHAPES
         * ========================================================= */
        $this->start_controls_section(
            'floating_shapes_section',
            [
                'label' => esc_html__( 'Floating Shapes', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'shape_one',
            [
                'label'   => esc_html__( 'Shape One', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banner/shape/shape-01.svg',
                ],
            ]
        );

        $this->add_control(
            'shape_one_width',
            [
                'label'   => esc_html__( 'Shape One Width', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 200,
            ]
        );

        $this->add_control(
            'shape_two',
            [
                'label'   => esc_html__( 'Shape Two', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banner/shape/shape-02.svg',
                ],
            ]
        );

        $this->add_control(
            'shape_two_width',
            [
                'label'   => esc_html__( 'Shape Two Width', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 220,
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>

        <!-- wpr banner area start -->
        <section class="wpr-banner-area breadcrumb">
            <div class="container">
                <div class="banner-content-area">

                    <h1 class="section-title text-normal wow scaleIn" data-wow-delay=".7s">
                        <?php echo wp_kses_post( nl2br( $settings['title'] ) ); ?>
                    </h1>

                    <p class="desc">
                        <?php echo wp_kses_post( nl2br( $settings['description'] ) ); ?>
                    </p>

                    <!-- Background Shape -->
                    <div class="bg-shape">
                        <img src="<?php echo esc_url( $settings['bg_shape']['url'] ); ?>" alt="">
                    </div>

                    <!-- Floating Shapes -->
                    <div class="banner-shape-area">

                        <img 
                            src="<?php echo esc_url( $settings['shape_one']['url'] ); ?>" 
                            width="<?php echo esc_attr( $settings['shape_one_width'] ); ?>" 
                            alt=""
                            class="one wow fadeInLeft"
                            data-wow-delay=".5s"
                        >

                        <img 
                            src="<?php echo esc_url( $settings['shape_two']['url'] ); ?>" 
                            width="<?php echo esc_attr( $settings['shape_two_width'] ); ?>" 
                            alt=""
                            class="two wow fadeInLeft"
                            data-wow-delay=".5s"
                        >

                    </div>

                </div>
            </div>
        </section>
        <!-- wpr banner area end -->

        <?php
    }
}