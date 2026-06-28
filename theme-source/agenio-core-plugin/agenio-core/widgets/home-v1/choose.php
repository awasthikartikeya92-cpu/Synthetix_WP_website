<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Why_Choose_Us_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_why_choose_us_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Why Choose Us', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-check-circle';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  SECTION HEADER
         * ========================================================= */
        $this->start_controls_section(
            'header_section',
            [
                'label' => esc_html__( 'Section Header', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'   => esc_html__( 'Sub Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'THE DIFFERENCE', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Section Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Why Should You Choose Us', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  COLUMN 1 — OTHERS
         * ========================================================= */
        $this->start_controls_section(
            'col1_section',
            [
                'label' => esc_html__( 'Column 1 — Other Agencies', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'col1_title',
            [
                'label'   => esc_html__( 'Column Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Other Agencies', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'col1_grid_icon',
            [
                'label'   => esc_html__( 'Header Grid Shape', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/why-choose/grid.svg',
                ],
            ]
        );

        $this->add_control(
            'col1_check_icon',
            [
                'label'   => esc_html__( 'List Check Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/why-choose/check-01.svg',
                ],
            ]
        );

        $this->add_control(
            'col1_items',
            [
                'label'       => esc_html__( 'List Items (one per line)', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => "Operates as a service provider\nFocuses mainly on visual output\nLimited communication and feedback\nRotating staff and inconsistent quality\nDelivers based only on initial brief\nFocuses on one-off projects",
                'description' => esc_html__( 'Enter each item on a new line.', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  COLUMN 2 — US
         * ========================================================= */
        $this->start_controls_section(
            'col2_section',
            [
                'label' => esc_html__( 'Column 2 — Your Agency', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'col2_logo',
            [
                'label'   => esc_html__( 'Agency Logo', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/why-choose/logo-01-hq.svg',
                ],
            ]
        );

        $this->add_control(
            'col2_logo_width',
            [
                'label'   => esc_html__( 'Logo Width (px)', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 160,
            ]
        );

        $this->add_control(
            'col2_grid_icon',
            [
                'label'   => esc_html__( 'Header Grid Shape', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/why-choose/grid.svg',
                ],
            ]
        );

        $this->add_control(
            'col2_check_icon',
            [
                'label'   => esc_html__( 'List Check Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/why-choose/check-02.svg',
                ],
            ]
        );

        $this->add_control(
            'col2_items',
            [
                'label'       => esc_html__( 'List Items (one per line)', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => "Works as a strategic partner\nBlends creativity with understanding\nTransparent, collaborative workflow\nDedicated senior team on every project\nImmerses deeply in your brand\nDesigns with measurable outcomes in mind",
                'description' => esc_html__( 'Enter each item on a new line.', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  BOTTOM BUTTON
         * ========================================================= */
        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__( 'Bottom Button', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label'   => esc_html__( 'Button Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Get Started', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label'       => esc_html__( 'Button Link', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-site.com/contact', 'agenio-core' ),
                'default'     => [ 'url' => 'contact.html' ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  SHAPES
         * ========================================================= */
        $this->start_controls_section(
            'shapes_section',
            [
                'label' => esc_html__( 'Shapes', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'shape_image',
            [
                'label'   => esc_html__( 'Shape Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/about/shape-02.svg',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $btn_url    = ! empty( $settings['btn_link']['url'] ) ? $settings['btn_link']['url'] : '#';
        $btn_target = ! empty( $settings['btn_link']['is_external'] ) ? ' target="_blank"' : '';
        $btn_rel    = ! empty( $settings['btn_link']['nofollow'] ) ? ' rel="nofollow"' : '';

        $col1_items = array_filter( array_map( 'trim', explode( "\n", $settings['col1_items'] ) ) );
        $col2_items = array_filter( array_map( 'trim', explode( "\n", $settings['col2_items'] ) ) );
        ?>
        <!-- wpr why choose us area start -->
        <section class="wpr-why-choose-us-area mb--16">
            <div class="container">
                <div class="section-inner bg-white border-1">

                    <!-- Top Shape -->
                    <?php if ( ! empty( $settings['shape_image']['url'] ) ) : ?>
                    <div class="bottom-shape-area square-dot">
                        <img src="<?php echo esc_url( $settings['shape_image']['url'] ); ?>" alt="">
                        <span class="square-shape top-left"></span>
                        <span class="square-shape bottom-left"></span>
                        <span class="square-shape top-right"></span>
                        <span class="square-shape bottom-right"></span>
                    </div>
                    <?php endif; ?>

                    <div class="wpr-content-area border-1">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-10">
                                <div class="content-inner">

                                    <!-- Section Header -->
                                    <div class="section-title-area center-style">
                                        <?php if ( ! empty( $settings['sub_title'] ) ) : ?>
                                            <p class="sub-title"><?php echo esc_html( $settings['sub_title'] ); ?></p>
                                        <?php endif; ?>
                                        <?php if ( ! empty( $settings['section_title'] ) ) : ?>
                                            <h2 class="section-title second-font font-semi-bold text-normal wpr-text-anime-style-1">
                                                <?php echo esc_html( $settings['section_title'] ); ?>
                                            </h2>
                                        <?php endif; ?>
                                    </div>

                                    <div class="row g-5">

                                        <!-- Column 1 — Other Agencies -->
                                        <div class="col-lg-6 col-md-6">
                                            <div class="why-choose-wrapper ml-auto">
                                                <div class="wrapper-header">
                                                    <h3 class="title second-font font-semi-bold text-normal">
                                                        <?php echo esc_html( $settings['col1_title'] ); ?>
                                                    </h3>
                                                    <?php if ( ! empty( $settings['col1_grid_icon']['url'] ) ) : ?>
                                                        <img src="<?php echo esc_url( $settings['col1_grid_icon']['url'] ); ?>" alt="" class="shape">
                                                    <?php endif; ?>
                                                </div>
                                                <ul class="wrapper-list">
                                                    <?php foreach ( $col1_items as $item ) : ?>
                                                        <li>
                                                            <?php if ( ! empty( $settings['col1_check_icon']['url'] ) ) : ?>
                                                                <img src="<?php echo esc_url( $settings['col1_check_icon']['url'] ); ?>" alt="">
                                                            <?php endif; ?>
                                                            <?php echo esc_html( $item ); ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Column 2 — Our Agency -->
                                        <div class="col-lg-6 col-md-6">
                                            <div class="why-choose-wrapper">
                                                <div class="wrapper-header two">
                                                    <?php if ( ! empty( $settings['col2_logo']['url'] ) ) : ?>
                                                        <div class="logo">
                                                            <img src="<?php echo esc_url( $settings['col2_logo']['url'] ); ?>" width="<?php echo absint( $settings['col2_logo_width'] ); ?>" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ( ! empty( $settings['col2_grid_icon']['url'] ) ) : ?>
                                                        <img src="<?php echo esc_url( $settings['col2_grid_icon']['url'] ); ?>" alt="" class="shape">
                                                    <?php endif; ?>
                                                </div>
                                                <ul class="wrapper-list two">
                                                    <?php foreach ( $col2_items as $item ) : ?>
                                                        <li>
                                                            <?php if ( ! empty( $settings['col2_check_icon']['url'] ) ) : ?>
                                                                <img src="<?php echo esc_url( $settings['col2_check_icon']['url'] ); ?>" alt="">
                                                            <?php endif; ?>
                                                            <?php echo esc_html( $item ); ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>

                                    </div><!-- .row -->

                                    <!-- CTA Button -->
                                    <?php if ( ! empty( $settings['btn_text'] ) ) : ?>
                                    <div class="bottom-button-area">
                                        <a href="<?php echo esc_url( $btn_url ); ?>" class="wpr-btn btn-primary"<?php echo $btn_target . $btn_rel; // phpcs:ignore ?>>
                                            <?php echo esc_html( $settings['btn_text'] ); ?>
                                        </a>
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Shape -->
                    <?php if ( ! empty( $settings['shape_image']['url'] ) ) : ?>
                    <div class="bottom-shape-area square-dot">
                        <img src="<?php echo esc_url( $settings['shape_image']['url'] ); ?>" alt="">
                        <span class="square-shape top-left"></span>
                        <span class="square-shape bottom-left"></span>
                        <span class="square-shape top-right"></span>
                        <span class="square-shape bottom-right"></span>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </section>
        <!-- wpr why choose us area end -->
        <?php
    }
}