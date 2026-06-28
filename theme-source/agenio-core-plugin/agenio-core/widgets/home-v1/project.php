<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Projects_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_projects_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Projects', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  FLOATING CONTENT / HEADER
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
                'default' => esc_html__( 'OUR VISION', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title_before',
            [
                'label'   => esc_html__( 'Title — Line 1 (before inline image)', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Every project we take on', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'title_inline_image',
            [
                'label'   => esc_html__( 'Title Inline Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/portfolio/sm.webp',
                ],
            ]
        );

        $this->add_control(
            'title_inline_image_width',
            [
                'label'   => esc_html__( 'Inline Image Width (px)', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 147,
            ]
        );

        $this->add_control(
            'section_title_span',
            [
                'label'   => esc_html__( 'Title — Line 2 (with inline image)', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'starts with a', 'agenio-core' ),
                'description' => esc_html__( 'The inline image will be inserted after the first word.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title_after',
            [
                'label'   => esc_html__( 'Title — Line 3', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'deep understanding of goals', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_desc',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "We're a multidisciplinary design agency that blends creativity, strategy, and technology to build meaningful brands and digital experiences. The results don't just look great, they work great.", 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  PROJECT SLIDES REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'projects_section',
            [
                'label' => esc_html__( 'Project Slides', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'shape_top_left',
            [
                'label'   => esc_html__( 'Slide Shape — Top Left', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/portfolio/shape-top-left.svg',
                ],
            ]
        );

        $this->add_control(
            'shape_top_right',
            [
                'label'   => esc_html__( 'Slide Shape — Top Right', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/portfolio/shape-top-right.svg',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'project_image',
            [
                'label'   => esc_html__( 'Project Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/portfolio/01.webp',
                ],
            ]
        );

        $repeater->add_control(
            'project_title',
            [
                'label'   => esc_html__( 'Project Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Nova Mobile App', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'project_link',
            [
                'label'       => esc_html__( 'Project Link', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-site.com/work-details', 'agenio-core' ),
                'default'     => [ 'url' => 'work-details.html' ],
            ]
        );

        $repeater->add_control(
            'project_desc',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We streamlined user flows, refreshed the visual language, and introduced accessibility-focused design components to improve usability.', 'agenio-core' ),
            ]
        );

        // Stat 1
        $repeater->add_control(
            'stat_1_value',
            [
                'label'   => esc_html__( 'Stat 1 — Value', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '40%', 'agenio-core' ),
            ]
        );
        $repeater->add_control(
            'stat_1_label',
            [
                'label'   => esc_html__( 'Stat 1 — Label', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Faster completion', 'agenio-core' ),
            ]
        );

        // Stat 2
        $repeater->add_control(
            'stat_2_value',
            [
                'label'   => esc_html__( 'Stat 2 — Value', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '+25%', 'agenio-core' ),
            ]
        );
        $repeater->add_control(
            'stat_2_label',
            [
                'label'   => esc_html__( 'Stat 2 — Label', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Engagement rate', 'agenio-core' ),
            ]
        );

        // Stat 3
        $repeater->add_control(
            'stat_3_value',
            [
                'label'   => esc_html__( 'Stat 3 — Value', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '4.8', 'agenio-core' ),
            ]
        );
        $repeater->add_control(
            'stat_3_label',
            [
                'label'   => esc_html__( 'Stat 3 — Label', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Star rating', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'hover_btn_text',
            [
                'label'   => esc_html__( 'Hover Button Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'View Projects', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'projects_list',
            [
                'label'       => esc_html__( 'Projects', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ project_title }}}',
                'default'     => [
                    [
                        'project_image'  => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/01.webp' ],
                        'project_title'  => 'Nova Mobile App',
                        'project_link'   => [ 'url' => 'work-details.html' ],
                        'project_desc'   => 'We streamlined user flows, refreshed the visual language, and introduced accessibility-focused design components to improve usability.',
                        'stat_1_value'   => '40%',
                        'stat_1_label'   => 'Faster completion',
                        'stat_2_value'   => '+25%',
                        'stat_2_label'   => 'Faster completion',
                        'stat_3_value'   => '4.8',
                        'stat_3_label'   => 'Star rating',
                        'hover_btn_text' => 'View Projects',
                    ],
                    [
                        'project_image'  => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/02.webp' ],
                        'project_title'  => 'Axis Legal Website',
                        'project_link'   => [ 'url' => 'work-details.html' ],
                        'project_desc'   => 'We streamlined user flows, refreshed the visual language, and introduced accessibility-focused design components to improve usability.',
                        'stat_1_value'   => '+70%',
                        'stat_1_label'   => 'Session duration',
                        'stat_2_value'   => '1 unified',
                        'stat_2_label'   => 'Brand system',
                        'stat_3_value'   => '4 w',
                        'stat_3_label'   => 'Delivery time',
                        'hover_btn_text' => 'View Projects',
                    ],
                    [
                        'project_image'  => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/03.webp' ],
                        'project_title'  => 'Lunaris Co. Branding',
                        'project_link'   => [ 'url' => 'work-details.html' ],
                        'project_desc'   => 'We crafted a modern visual identity for Lunaris Coffee Co., blending organic textures with clean typography to reflect their artisanal roots.',
                        'stat_1_value'   => '+65%',
                        'stat_1_label'   => 'Brand recognition',
                        'stat_2_value'   => '12',
                        'stat_2_label'   => 'New product lines',
                        'stat_3_value'   => '3 mon',
                        'stat_3_label'   => 'To done project',
                        'hover_btn_text' => 'View Projects',
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $projects = $settings['projects_list'];

        // Split the span title text into first word + rest for inline image placement
        $span_parts = explode( ' ', trim( $settings['section_title_span'] ), 2 );
        $span_word1 = isset( $span_parts[0] ) ? $span_parts[0] : '';
        $span_rest  = isset( $span_parts[1] ) ? $span_parts[1] : '';
        ?>
        <!-- wpr project area start -->
        <section class="wpr-project-area mb--16">
            <div class="container">
                <div class="section-inner border-1">
                    <div class="space"></div>

                    <!-- Floating Header -->
                    <div class="floating-content">
                        <div class="section-title-area center-style">
                            <?php if ( ! empty( $settings['sub_title'] ) ) : ?>
                                <p class="sub-title bg-white"><?php echo esc_html( $settings['sub_title'] ); ?></p>
                            <?php endif; ?>
                            <h2 class="section-title second-font font-semi-bold text-normal">
                                <?php echo esc_html( $settings['section_title_before'] ); ?> <br>
                                <span>
                                    <?php echo esc_html( $span_word1 ); ?>
                                    <?php if ( ! empty( $settings['title_inline_image']['url'] ) ) : ?>
                                        <span>
                                            <img src="<?php echo esc_url( $settings['title_inline_image']['url'] ); ?>"
                                                 width="<?php echo absint( $settings['title_inline_image_width'] ); ?>"
                                                 alt="">
                                        </span>
                                    <?php endif; ?>
                                    <?php echo esc_html( $span_rest ); ?>
                                </span> <br>
                                <?php echo esc_html( $settings['section_title_after'] ); ?>
                            </h2>
                            <?php if ( ! empty( $settings['section_desc'] ) ) : ?>
                                <p class="desc"><?php echo esc_html( $settings['section_desc'] ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Swiper Slider -->
                    <div class="wpr-video-pin">
                        <div class="wpr-video-wrapper">
                            <div class="swiper project-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ( $projects as $project ) :
                                        $link_url    = ! empty( $project['project_link']['url'] ) ? $project['project_link']['url'] : '#';
                                        $link_target = ! empty( $project['project_link']['is_external'] ) ? ' target="_blank"' : '';
                                        $link_rel    = ! empty( $project['project_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="slide feature-project">
                                            <div class="image-area">
                                                <img src="<?php echo esc_url( $project['project_image']['url'] ); ?>" alt="<?php echo esc_attr( $project['project_title'] ); ?>" class="video-img">
                                                <?php if ( ! empty( $settings['shape_top_left']['url'] ) ) : ?>
                                                    <img src="<?php echo esc_url( $settings['shape_top_left']['url'] ); ?>" alt="" class="shape top-left-shape">
                                                <?php endif; ?>
                                                <?php if ( ! empty( $settings['shape_top_right']['url'] ) ) : ?>
                                                    <img src="<?php echo esc_url( $settings['shape_top_right']['url'] ); ?>" alt="" class="shape top-right-shape">
                                                <?php endif; ?>
                                            </div>
                                            <div class="slide-content">
                                                <div class="product-intro">
                                                    <div class="top">
                                                        <h3 class="title">
                                                            <a href="<?php echo esc_url( $link_url ); ?>"<?php echo $link_target . $link_rel; // phpcs:ignore ?>><?php echo esc_html( $project['project_title'] ); ?></a>
                                                        </h3>
                                                        <p class="desc"><?php echo esc_html( $project['project_desc'] ); ?></p>
                                                    </div>
                                                    <div class="bottom">
                                                        <ul>
                                                            <?php
                                                            $stats = [
                                                                [ 'value' => $project['stat_1_value'], 'label' => $project['stat_1_label'] ],
                                                                [ 'value' => $project['stat_2_value'], 'label' => $project['stat_2_label'] ],
                                                                [ 'value' => $project['stat_3_value'], 'label' => $project['stat_3_label'] ],
                                                            ];
                                                            foreach ( $stats as $stat ) :
                                                                if ( empty( $stat['value'] ) ) continue;
                                                            ?>
                                                            <li>
                                                                <h3 class="h5"><?php echo esc_html( $stat['value'] ); ?></h3>
                                                                <p><?php echo esc_html( $stat['label'] ); ?></p>
                                                            </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hover_mouse">
                                                <div class="box"></div>
                                                <a href="<?php echo esc_url( $link_url ); ?>"<?php echo $link_target . $link_rel; // phpcs:ignore ?>>
                                                    <?php echo esc_html( $project['hover_btn_text'] ); ?>
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M18 0V13.4751H16.5083V2.53591L1.0442 18L0 16.9061L15.4144 1.49171H4.47514V0H18Z" fill="#98FF03" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Navigation -->
                                <div class="swiper-navigation">
                                    <div class="swiper-btn slider-prev">
                                        <svg width="17" height="30" viewBox="0 0 17 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.6094 0L0.859375 13.75L0 14.6484L0.859375 15.5469L14.6094 29.2969L16.4062 27.5L3.55469 14.6484L16.4062 1.79688L14.6094 0Z" fill="#F9FAFB" />
                                        </svg>
                                    </div>
                                    <div class="swiper-btn slider-next">
                                        <svg width="17" height="30" viewBox="0 0 17 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.79688 0L0 1.79688L12.8516 14.6484L0 27.5L1.79688 29.2969L15.5469 15.5469L16.4062 14.6484L15.5469 13.75L1.79688 0Z" fill="#F9FAFB" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- wpr project area end -->
        <?php
    }
}