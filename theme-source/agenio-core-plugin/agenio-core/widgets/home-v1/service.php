<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Services_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_services_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Services', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-services';
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
                'default' => esc_html__( 'SERVICES', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Section Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'We Build We Create', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  SERVICES REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'services_section',
            [
                'label' => esc_html__( 'Services', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_image',
            [
                'label'   => esc_html__( 'Service Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/service/01.webp',
                ],
            ]
        );

        $repeater->add_control(
            'service_tag',
            [
                'label'   => esc_html__( 'Tag / Category', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'WEBSITE DEVELOPMENT', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'service_description',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We create digital experiences that are visually striking, intuitive, and conversion-focused.', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'service_number',
            [
                'label'   => esc_html__( 'Number', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '01', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'service_features',
            [
                'label'       => esc_html__( 'Feature List (one per line)', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => "Website Concept\nWeb Animation\nCMS Integration\nSEO-Friendly Design",
                'description' => esc_html__( 'Enter each feature on a new line.', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'service_link',
            [
                'label'       => esc_html__( 'Service Link', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-site.com/service-details', 'agenio-core' ),
                'default'     => [
                    'url' => 'service-details.html',
                ],
            ]
        );

        $this->add_control(
            'services_list',
            [
                'label'       => esc_html__( 'Services', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ service_tag }}}',
                'default'     => [
                    [
                        'service_image'       => [ 'url' => get_template_directory_uri() . '/assets/images/service/01.webp' ],
                        'service_tag'         => 'WEBSITE DEVELOPMENT',
                        'service_description' => 'We create digital experiences that are visually striking, intuitive, and conversion-focused.',
                        'service_number'      => '01',
                        'service_features'    => "Website Concept\nWeb Animation\nCMS Integration\nSEO-Friendly Design",
                        'service_link'        => [ 'url' => 'service-details.html' ],
                    ],
                    [
                        'service_image'       => [ 'url' => get_template_directory_uri() . '/assets/images/service/02.webp' ],
                        'service_tag'         => 'BRAND IDENTITY',
                        'service_description' => 'We build distinctive visual systems that tell your story and strengthen your brand.',
                        'service_number'      => '02',
                        'service_features'    => "Brand Strategy\nLogo Design\nBrand Guidelines\nPackaging Design",
                        'service_link'        => [ 'url' => 'service-details.html' ],
                    ],
                    [
                        'service_image'       => [ 'url' => get_template_directory_uri() . '/assets/images/service/03.webp' ],
                        'service_tag'         => 'UI/UX DESIGN',
                        'service_description' => 'We transform complex ideas into seamless interfaces that deliver measurable results.',
                        'service_number'      => '03',
                        'service_features'    => "User Research\nInformation Architecture\nWireframes & Prototyping\nUsability Testing",
                        'service_link'        => [ 'url' => 'service-details.html' ],
                    ],
                    [
                        'service_image'       => [ 'url' => get_template_directory_uri() . '/assets/images/service/04.webp' ],
                        'service_tag'         => 'CREATIVE DIRECTION',
                        'service_description' => 'We help brands stay consistent and inspired with art direction that aligns every detail with your vision.',
                        'service_number'      => '04',
                        'service_features'    => "Visual Campaign\nArt Direction\nPhotography Guidance\nBrand Tone",
                        'service_link'        => [ 'url' => 'service-details.html' ],
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  BOTTOM SHAPE SECTION
         * ========================================================= */
        $this->start_controls_section(
            'bottom_shape_section',
            [
                'label' => esc_html__( 'Bottom Shape', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bottom_shape_image',
            [
                'label'   => esc_html__( 'Bottom Shape Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/about/shape-02.svg',
                ],
            ]
        );

        $this->add_control(
            'show_bottom_shape',
            [
                'label'        => esc_html__( 'Show Bottom Shape', 'agenio-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'agenio-core' ),
                'label_off'    => esc_html__( 'Hide', 'agenio-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  WOW ANIMATION SETTINGS
         * ========================================================= */
        $this->start_controls_section(
            'animation_section',
            [
                'label' => esc_html__( 'Animation', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'wow_animation',
            [
                'label'        => esc_html__( 'Enable WOW Animation', 'agenio-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'agenio-core' ),
                'label_off'    => esc_html__( 'No', 'agenio-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'wow_delay_step',
            [
                'label'       => esc_html__( 'Delay Step (seconds)', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::NUMBER,
                'min'         => 0.1,
                'max'         => 1,
                'step'        => 0.1,
                'default'     => 0.2,
                'condition'   => [ 'wow_animation' => 'yes' ],
                'description' => esc_html__( 'Delay increment per service card (e.g. 0.2 → .2s, .4s, .6s …)', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings          = $this->get_settings_for_display();
        $services          = $settings['services_list'];
        $wow_enabled       = ( 'yes' === $settings['wow_animation'] );
        $delay_step        = floatval( $settings['wow_delay_step'] );
        $show_bottom_shape = ( 'yes' === $settings['show_bottom_shape'] );
        ?>
        <!-- wpr services area start -->
        <section id="services" class="wpr-services-area mb--16">
            <div class="container">
                <div class="section-inner bg-white border-1">

                    <!-- Section Header -->
                    <div class="section-top-area">
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
                    </div>

                    <!-- Service Cards -->
                    <div class="section-bottom-content square-dot">
                        <?php
                        $index = 1;
                        foreach ( $services as $service ) :
                            $delay     = $wow_enabled ? ' wow fadeInRight" data-wow-delay=".' . round( $index * $delay_step, 1 ) . 's' : '';
                            $wow_class = $wow_enabled ? ' wow fadeInRight' : '';
                            $wow_attr  = $wow_enabled ? ' data-wow-delay="' . esc_attr( round( $index * $delay_step, 1 ) ) . 's"' : '';

                            // Build features list from newline-separated textarea
                            $features = array_filter( array_map( 'trim', explode( "\n", $service['service_features'] ) ) );

                            // Link attributes
                            $link_url    = ! empty( $service['service_link']['url'] ) ? $service['service_link']['url'] : '#';
                            $link_target = ! empty( $service['service_link']['is_external'] ) ? ' target="_blank"' : '';
                            $link_rel    = ! empty( $service['service_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                        ?>
                        <div class="service-wrapper<?php echo esc_attr( $wow_class ); ?>"<?php echo $wow_attr; // phpcs:ignore WordPress.Security.EscapeOutput ?>>
                            <div class="image-area">
                                <img src="<?php echo esc_url( $service['service_image']['url'] ); ?>" alt="<?php echo esc_attr( $service['service_tag'] ); ?>">
                            </div>
                            <div class="content">
                                <div class="top">
                                    <?php if ( ! empty( $service['service_tag'] ) ) : ?>
                                        <p class="tag"><?php echo esc_html( $service['service_tag'] ); ?></p>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $service['service_description'] ) ) : ?>
                                        <p class="desc"><?php echo esc_html( $service['service_description'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="mid">
                                    <h2><?php echo esc_html( $service['service_number'] ); ?></h2>
                                </div>
                                <div class="bottom">
                                    <?php if ( ! empty( $features ) ) : ?>
                                        <ul>
                                            <?php foreach ( $features as $feature ) : ?>
                                                <li><?php echo esc_html( $feature ); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <a href="<?php echo esc_url( $link_url ); ?>" class="service-btn-area"<?php echo $link_target . $link_rel; // phpcs:ignore WordPress.Security.EscapeOutput ?>>
                                        <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.07812 0L0 1.07812L7.71094 8.78906L0 16.5L1.07812 17.5781L9.32812 9.32812L9.84375 8.78906L9.32812 8.25L1.07812 0Z" fill="black" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                            $index++;
                        endforeach;
                        ?>
                        <span class="square-shape top-left"></span>
                        <span class="square-shape top-right"></span>
                    </div>

                    <!-- Bottom Shape -->
                    <?php if ( $show_bottom_shape && ! empty( $settings['bottom_shape_image']['url'] ) ) : ?>
                    <div class="bottom-shape-area square-dot">
                        <img src="<?php echo esc_url( $settings['bottom_shape_image']['url'] ); ?>" alt="">
                        <span class="square-shape top-left"></span>
                        <span class="square-shape bottom-left"></span>
                        <span class="square-shape top-right"></span>
                        <span class="square-shape bottom-right"></span>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </section>
        <!-- wpr services area end -->
        <?php
    }
}