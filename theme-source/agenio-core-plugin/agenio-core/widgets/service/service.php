<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Services_Page_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_services_page_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Services Page', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-services';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  HEADING SECTION
         * ========================================================= */
        $this->start_controls_section(
            'heading_section',
            [
                'label' => esc_html__( 'Heading', 'agenio-core' ),
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
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We Build We Create', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  SERVICE ROWS REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'rows_section',
            [
                'label' => esc_html__( 'Service Rows', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'rows_info',
            [
                'type'            => \Elementor\Controls_Manager::RAW_HTML,
                'raw'             => esc_html__( 'Each row is a section-bottom-content block containing up to 4 service cards. Add multiple rows to create separate grouped sections.', 'agenio-core' ),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        // Services sub-repeater (cards inside each row)
        $card_repeater = new \Elementor\Repeater();

        $card_repeater->add_control(
            'service_image',
            [
                'label'   => esc_html__( 'Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/service/01.webp' ],
            ]
        );

        $card_repeater->add_control(
            'service_tag',
            [
                'label'   => esc_html__( 'Tag', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'WEBSITE DEVELOPMENT', 'agenio-core' ),
            ]
        );

        $card_repeater->add_control(
            'service_desc',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We create digital experiences that are visually striking, intuitive, and conversion-focused.', 'agenio-core' ),
            ]
        );

        $card_repeater->add_control(
            'service_number',
            [
                'label'   => esc_html__( 'Number', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '01',
            ]
        );

        $card_repeater->add_control(
            'service_list',
            [
                'label'       => esc_html__( 'List Items', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => "Website Concept\nWeb Animation\nCMS Integration\nSEO-Friendly Design",
                'description' => esc_html__( 'One item per line.', 'agenio-core' ),
            ]
        );

        $card_repeater->add_control(
            'service_link',
            [
                'label'   => esc_html__( 'Link URL', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ]
        );

        $card_repeater->add_control(
            'wow_delay',
            [
                'label'   => esc_html__( 'WOW Delay', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '.2s',
            ]
        );

        // Row repeater (wraps groups of cards)
        $row_repeater = new \Elementor\Repeater();

        $row_repeater->add_control(
            'row_services',
            [
                'label'       => esc_html__( 'Services in this Row', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $card_repeater->get_controls(),
                'title_field' => '{{{ service_number }}} — {{{ service_tag }}}',
                'default'     => [
                    [
                        'service_image'  => [ 'url' => get_template_directory_uri() . '/assets/images/service/01.webp' ],
                        'service_tag'    => 'WEBSITE DEVELOPMENT',
                        'service_desc'   => 'We create digital experiences that are visually striking, intuitive, and conversion-focused.',
                        'service_number' => '01',
                        'service_list'   => "Website Concept\nWeb Animation\nCMS Integration\nSEO-Friendly Design",
                        'service_link'   => [ 'url' => '#' ],
                        'wow_delay'      => '.2s',
                    ],
                    [
                        'service_image'  => [ 'url' => get_template_directory_uri() . '/assets/images/service/02.webp' ],
                        'service_tag'    => 'BRAND IDENTITY',
                        'service_desc'   => 'We build distinctive visual systems that tell your story and strengthen your brand.',
                        'service_number' => '02',
                        'service_list'   => "Brand Strategy\nLogo Design\nBrand Guidelines\nPackaging Design",
                        'service_link'   => [ 'url' => '#' ],
                        'wow_delay'      => '.4s',
                    ],
                    [
                        'service_image'  => [ 'url' => get_template_directory_uri() . '/assets/images/service/03.webp' ],
                        'service_tag'    => 'UI/UX DESIGN',
                        'service_desc'   => 'We create digital experiences that are visually striking, intuitive, and conversion-focused.',
                        'service_number' => '03',
                        'service_list'   => "User Research\nInformation Architecture\nWireframes & Prototyping\nUsability Testing",
                        'service_link'   => [ 'url' => '#' ],
                        'wow_delay'      => '.6s',
                    ],
                    [
                        'service_image'  => [ 'url' => get_template_directory_uri() . '/assets/images/service/04.webp' ],
                        'service_tag'    => 'CREATIVE DIRECTION',
                        'service_desc'   => 'We create digital experiences that are visually striking, intuitive, and conversion-focused.',
                        'service_number' => '04',
                        'service_list'   => "Visual Campaign\nArt Direction\nPhotography Guidance\nBrand Tone",
                        'service_link'   => [ 'url' => '#' ],
                        'wow_delay'      => '.8s',
                    ],
                ],
            ]
        );

        $this->add_control(
            'service_rows',
            [
                'label'       => esc_html__( 'Service Rows', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $row_repeater->get_controls(),
                'title_field' => esc_html__( 'Service Row', 'agenio-core' ),
                'default'     => [
                    [
                        'row_services' => [],
                    ],
                    [
                        'row_services' => [],
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  BOTTOM SHAPE
         * ========================================================= */
        $this->start_controls_section(
            'bottom_shape_section',
            [
                'label' => esc_html__( 'Bottom Shape', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bottom_shape',
            [
                'label'   => esc_html__( 'Bottom Shape Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/about/shape-02.svg' ],
            ]
        );

        $this->end_controls_section();
    }

    private function arrow_svg() {
        return '<svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.07812 0L0 1.07812L7.71094 8.78906L0 16.5L1.07812 17.5781L9.32812 9.32812L9.84375 8.78906L9.32812 8.25L1.07812 0Z" fill="black"/>
        </svg>';
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- wpr services area start -->
        <section class="wpr-services-area inner mb--16">
            <div class="container">
                <div class="section-inner bg-white border-1">

                    <!-- Heading -->
                    <div class="section-top-area">
                        <div class="section-title-area center-style">
                            <p class="sub-title"><?php echo esc_html( $settings['sub_title'] ); ?></p>
                            <h2 class="section-title second-font font-semi-bold text-normal wpr-text-anime-style-1">
                                <?php echo esc_html( $settings['section_title'] ); ?>
                            </h2>
                        </div>
                    </div>

                    <?php foreach ( $settings['service_rows'] as $row ) : ?>
                    <!-- Service Row -->
                    <div class="section-bottom-content square-dot">

                        <?php foreach ( $row['row_services'] as $service ) :
                            $list_items = array_filter( array_map( 'trim', explode( "\n", $service['service_list'] ) ) );
                        ?>
                        <div class="service-wrapper wow fadeInRight" data-wow-delay="<?php echo esc_attr( $service['wow_delay'] ); ?>">
                            <div class="image-area">
                                <img src="<?php echo esc_url( $service['service_image']['url'] ); ?>" alt="<?php echo esc_attr( $service['service_tag'] ); ?>">
                            </div>
                            <div class="content">
                                <div class="top">
                                    <p class="tag"><?php echo esc_html( $service['service_tag'] ); ?></p>
                                    <p class="desc"><?php echo esc_html( $service['service_desc'] ); ?></p>
                                </div>
                                <div class="mid">
                                    <h2><?php echo esc_html( $service['service_number'] ); ?></h2>
                                </div>
                                <div class="bottom">
                                    <ul>
                                        <?php foreach ( $list_items as $item ) : ?>
                                            <li><?php echo esc_html( $item ); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <a href="<?php echo esc_url( $service['service_link']['url'] ); ?>" class="service-btn-area">
                                        <?php echo $this->arrow_svg(); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        <span class="square-shape top-left"></span>
                        <span class="square-shape top-right"></span>
                    </div>
                    <?php endforeach; ?>

                    <!-- Bottom Shape -->
                    <div class="bottom-shape-area square-dot">
                        <img src="<?php echo esc_url( $settings['bottom_shape']['url'] ); ?>" alt="">
                        <span class="square-shape top-left"></span>
                        <span class="square-shape bottom-left"></span>
                        <span class="square-shape top-right"></span>
                        <span class="square-shape bottom-right"></span>
                    </div>

                </div>
            </div>
        </section>
        <!-- wpr services area end -->
        <?php
    }
}