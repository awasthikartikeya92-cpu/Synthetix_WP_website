<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_About_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_about_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio About', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-info-circle';
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
                'default' => esc_html__( 'ABOUT US', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Section Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "At our core, we believe good design is more than beauty, it's emotion", 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  STATS DESCRIPTION
         * ========================================================= */
        $this->start_controls_section(
            'stats_section',
            [
                'label' => esc_html__( 'Stats', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'stats_description',
            [
                'label'   => esc_html__( 'Stats Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "OUR RESULTS SPEAK FOR THEMSELVES. EACH NUMBER REPRESENTS THE TRUST WE'VE BUILT.", 'agenio-core' ),
            ]
        );

        // Stats Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'stat_icon',
            [
                'label'   => esc_html__( 'Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/about/icon/01.svg',
                ],
            ]
        );

        $repeater->add_control(
            'stat_count',
            [
                'label'   => esc_html__( 'Count Value', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '300',
            ]
        );

        $repeater->add_control(
            'stat_suffix',
            [
                'label'       => esc_html__( 'Suffix', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '%',
                'description' => esc_html__( 'e.g. %, +, / 5', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'stat_suffix_class',
            [
                'label'       => esc_html__( 'Suffix Style', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'options'     => [
                    'inline' => esc_html__( 'Inline (e.g. %,  +)', 'agenio-core' ),
                    'prefix' => esc_html__( 'Prefix span (e.g. / 5)', 'agenio-core' ),
                ],
                'default'     => 'inline',
            ]
        );

        $repeater->add_control(
            'stat_desc',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Average ROI from design improvements', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'stats_list',
            [
                'label'       => esc_html__( 'Stats Items', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ stat_count }}} {{{ stat_suffix }}} — {{{ stat_desc }}}',
                'default'     => [
                    [
                        'stat_icon'         => [ 'url' => get_template_directory_uri() . '/assets/images/about/icon/01.svg' ],
                        'stat_count'        => '300',
                        'stat_suffix'       => '%',
                        'stat_suffix_class' => 'inline',
                        'stat_desc'         => 'Average ROI from design improvements',
                    ],
                    [
                        'stat_icon'         => [ 'url' => get_template_directory_uri() . '/assets/images/about/icon/02.svg' ],
                        'stat_count'        => '120',
                        'stat_suffix'       => '+',
                        'stat_suffix_class' => 'inline',
                        'stat_desc'         => 'Projects delivered for global clients',
                    ],
                    [
                        'stat_icon'         => [ 'url' => get_template_directory_uri() . '/assets/images/about/icon/03.svg' ],
                        'stat_count'        => '4.9',
                        'stat_suffix'       => '/ 5',
                        'stat_suffix_class' => 'prefix',
                        'stat_desc'         => 'Client rating based on 100+ reviews',
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  RIGHT IMAGE SECTION
         * ========================================================= */
        $this->start_controls_section(
            'image_section',
            [
                'label' => esc_html__( 'Right Image', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'main_image',
            [
                'label'   => esc_html__( 'Main Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/about/01.webp',
                ],
            ]
        );

        $this->add_control(
            'main_image_width',
            [
                'label'   => esc_html__( 'Image Width', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 802,
            ]
        );

        $this->add_control(
            'image_shape_right_bottom',
            [
                'label'   => esc_html__( 'Shape (Right Bottom)', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/about/shape-01.svg',
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
            'bottom_shape',
            [
                'label'   => esc_html__( 'Bottom Shape', 'agenio-core' ),
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
        ?>
        <!-- wpr about area start -->
        <section id="about" class="wpr-about-area mb--16">
            <div class="container">
                <div class="section-inner bg-white border-1">

                    <!-- Top Area -->
                    <div class="section-top-area">
                        <div class="section-title-area">
                            <p class="sub-title"><?php echo esc_html( $settings['sub_title'] ); ?></p>
                            <h2 class="section-title second-font font-semi-bold text-normal quote">
                                <?php echo esc_html( $settings['section_title'] ); ?>
                            </h2>
                        </div>
                    </div>

                    <!-- Bottom Content -->
                    <div class="about-bottom-content square-dot">

                        <!-- Left Area -->
                        <div class="left-area">
                            <ul>
                                <li class="border-top">
                                    <p class="top-description"><?php echo  $settings['stats_description']; ?></p>
                                </li>
                                <?php foreach ( $settings['stats_list'] as $item ) : ?>
                                <li class="border-top with-icon">
                                    <div class="icon">
                                        <img src="<?php echo esc_url( $item['stat_icon']['url'] ); ?>" alt="">
                                    </div>
                                    <div class="text">
                                        <h2 class="h4 title">
                                            <span class="odometer second-font font-semi-bold" data-count="<?php echo esc_attr( $item['stat_count'] ); ?>">00</span>
                                            <?php if ( $item['stat_suffix_class'] === 'prefix' ) : ?>
                                                <span class="prefix"><?php echo esc_html( $item['stat_suffix'] ); ?></span>
                                            <?php else : ?>
                                                <?php echo esc_html( $item['stat_suffix'] ); ?>
                                            <?php endif; ?>
                                        </h2>
                                        <p class="desc"><?php echo esc_html( $item['stat_desc'] ); ?></p>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- Right Area -->
                        <div class="right-area">
                            <div class="image-area">
                                <img src="<?php echo esc_url( $settings['main_image']['url'] ); ?>" width="<?php echo esc_attr( $settings['main_image_width'] ); ?>" alt="">
                                <img class="image-shape-right-bottom" src="<?php echo esc_url( $settings['image_shape_right_bottom']['url'] ); ?>" alt="">
                            </div>
                        </div>

                        <span class="square-shape top-left"></span>
                        <span class="square-shape bottom-left"></span>
                        <span class="square-shape top-right"></span>
                        <span class="square-shape bottom-right"></span>
                    </div>

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
        <!-- wpr about area end -->
        <?php
    }
}