<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Hero_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_hero_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Hero', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  LEFT TEXT SECTION
         * ========================================================= */
        $this->start_controls_section(
            'left_section',
            [
                'label' => esc_html__( 'Left Text', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'left_text',
            [
                'label'   => esc_html__( 'Left Heading Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'We ARE', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'arrow_right_icon',
            [
                'label'   => esc_html__( 'Arrow Right Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banner/icon/arrow-right.svg',
                ],
            ]
        );

        $this->add_control(
            'arrow_right_count',
            [
                'label'   => esc_html__( 'Arrow Repeat Count', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 11,
                'min'     => 1,
                'max'     => 20,
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  CENTER IMAGE SECTION
         * ========================================================= */
        $this->start_controls_section(
            'center_section',
            [
                'label' => esc_html__( 'Center Image', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'center_image',
            [
                'label'   => esc_html__( 'Center Hero Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banner/center-hero.webp',
                ],
            ]
        );

        $this->add_control(
            'center_image_width',
            [
                'label'   => esc_html__( 'Image Width', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 303,
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  RIGHT TEXT SECTION
         * ========================================================= */
        $this->start_controls_section(
            'right_section',
            [
                'label' => esc_html__( 'Right Text', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'right_text',
            [
                'label'   => esc_html__( 'Right Heading Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'CREATIVE', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'arrow_left_icon',
            [
                'label'   => esc_html__( 'Arrow Left Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banner/icon/arrow-left.svg',
                ],
            ]
        );

        $this->add_control(
            'arrow_left_count',
            [
                'label'   => esc_html__( 'Arrow Repeat Count', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 11,
                'min'     => 1,
                'max'     => 20,
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  DESCRIPTION & BUTTONS SECTION
         * ========================================================= */
        $this->start_controls_section(
            'text_area_section',
            [
                'label' => esc_html__( 'Description & Buttons', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'description',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We turn ideas into timeless digital experiences through thoughtful strategy and refined aesthetics.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'btn_white_text',
            [
                'label'   => esc_html__( 'White Button Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'View Pricing Plans', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'btn_white_url',
            [
                'label'   => esc_html__( 'White Button URL', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#pricing' ],
            ]
        );

        $this->add_control(
            'btn_primary_text',
            [
                'label'   => esc_html__( 'Primary Button Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Explore Services', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'btn_primary_url',
            [
                'label'   => esc_html__( 'Primary Button URL', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#services' ],
            ]
        );

        $this->add_control(
            'btn_primary_icon',
            [
                'label'   => esc_html__( 'Primary Button Arrow Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/icon/button-arrow.svg',
                ],
            ]
        );

        $this->add_control(
            'btn_primary_icon_count',
            [
                'label'   => esc_html__( 'Arrow Icon Repeat Count', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 6,
                'min'     => 1,
                'max'     => 12,
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  SHAPES SECTION
         * ========================================================= */
        $this->start_controls_section(
            'shapes_section',
            [
                'label' => esc_html__( 'Background Shapes', 'agenio-core' ),
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

        $this->add_control(
            'shape_01',
            [
                'label'   => esc_html__( 'Shape 01', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banner/shape/shape-01.svg',
                ],
            ]
        );

        $this->add_control(
            'shape_02',
            [
                'label'   => esc_html__( 'Shape 02', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banner/shape/shape-02.svg',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings           = $this->get_settings_for_display();
        $arrow_right_count  = ! empty( $settings['arrow_right_count'] ) ? (int) $settings['arrow_right_count'] : 11;
        $arrow_left_count   = ! empty( $settings['arrow_left_count'] )  ? (int) $settings['arrow_left_count']  : 11;
        $btn_icon_count     = ! empty( $settings['btn_primary_icon_count'] ) ? (int) $settings['btn_primary_icon_count'] : 6;
        ?>
        <!-- wpr banner area start -->
        <section class="wpr-banner-area">
            <div class="container">
                <div class="banner-content-area">
                    <div class="top-shape wow fadeIn" data-wow-delay=".7s"></div>
                    <h1 class="section-title">

                        <!-- Left Area -->
                        <span class="left-area square-dot wow fadeInLeft" data-wow-delay=".7s">
                            <span class="text"><?php echo esc_html( $settings['left_text'] ); ?></span>
                            <span class="square-shape top-right"></span>
                            <span class="square-shape bottom-right"></span>
                            <span class="arrow-track right">
                                <?php for ( $i = 0; $i < $arrow_right_count; $i++ ) : ?>
                                    <span class="arrow">
                                        <img src="<?php echo esc_url( $settings['arrow_right_icon']['url'] ); ?>" alt="">
                                    </span>
                                <?php endfor; ?>
                            </span>
                        </span>

                        <!-- Center Image -->
                        <span class="mid-icon wow scaleIn" data-wow-delay=".7s">
                            <span class="inner">
                                <img src="<?php echo esc_url( $settings['center_image']['url'] ); ?>" width="<?php echo esc_attr( $settings['center_image_width'] ); ?>" alt="">
                            </span>
                        </span>

                        <!-- Right Area -->
                        <span class="right-area square-dot wow fadeInRight" data-wow-delay=".7s">
                            <span class="arrow-track right">
                                <?php for ( $i = 0; $i < $arrow_left_count; $i++ ) : ?>
                                    <span class="arrow">
                                        <img src="<?php echo esc_url( $settings['arrow_left_icon']['url'] ); ?>" alt="">
                                    </span>
                                <?php endfor; ?>
                            </span>
                            <span class="text"><?php echo esc_html( $settings['right_text'] ); ?></span>
                            <span class="square-shape top-left"></span>
                            <span class="square-shape bottom-left"></span>
                        </span>

                    </h1>

                    <!-- Text Area -->
                    <div class="text-area wow fadeInUp" data-wow-delay="1s">
                        <p class="desc"><?php echo  $settings['description'] ; ?></p>
                        <div class="button-area">
                            <a href="<?php echo esc_url( $settings['btn_white_url']['url'] ); ?>" class="wpr-btn btn-white">
                                <?php echo esc_html( $settings['btn_white_text'] ); ?>
                            </a>
                            <a href="<?php echo esc_url( $settings['btn_primary_url']['url'] ); ?>" class="wpr-btn btn-primary with-icon">
                                <div class="inner">
                                    <div class="icon">
                                        <?php for ( $i = 0; $i < $btn_icon_count; $i++ ) : ?>
                                            <span>
                                                <img src="<?php echo esc_url( $settings['btn_primary_icon']['url'] ); ?>" alt="">
                                            </span>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <?php echo esc_html( $settings['btn_primary_text'] ); ?>
                            </a>
                        </div>
                    </div>

                    <!-- Background Shape -->
                    <div class="bg-shape">
                        <img src="<?php echo esc_url( $settings['bg_shape']['url'] ); ?>" alt="">
                    </div>

                    <!-- Banner Shapes -->
                    <div class="banner-shape-area">
                        <img src="<?php echo esc_url( $settings['shape_01']['url'] ); ?>" alt="" class="one wow fadeInLeft" data-wow-delay=".2s">
                        <img src="<?php echo esc_url( $settings['shape_02']['url'] ); ?>" alt="" class="two wow fadeInRight" data-wow-delay=".2s">
                    </div>

                </div>
            </div>
        </section>
        <!-- wpr banner area end -->
        <?php
    }
}