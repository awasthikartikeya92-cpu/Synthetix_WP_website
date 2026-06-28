<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* =============================================================================
 *  WORK PAGE — WORK SECTION
 * ============================================================================= */

class Elementor_Agenio_Work_Page_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_work_page_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Work Page', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  HEADING
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
                'default' => esc_html__( 'OUR VISION', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Section Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Recent Works', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  PROJECTS REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'projects_section',
            [
                'label' => esc_html__( 'Projects', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Stats sub-repeater
        $stats_repeater = new \Elementor\Repeater();

        $stats_repeater->add_control(
            'stat_value',
            [
                'label'   => esc_html__( 'Value', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '40%',
            ]
        );

        $stats_repeater->add_control(
            'stat_label',
            [
                'label'   => esc_html__( 'Label', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Faster completion', 'agenio-core' ),
            ]
        );

        // Projects repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'project_image',
            [
                'label'   => esc_html__( 'Project Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/01.webp' ],
            ]
        );

        $repeater->add_control(
            'shape_top_left',
            [
                'label'   => esc_html__( 'Shape Top Left', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/shape-top-left-w.svg' ],
            ]
        );

        $repeater->add_control(
            'shape_top_right',
            [
                'label'   => esc_html__( 'Shape Top Right', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/shape-top-right-w.svg' ],
            ]
        );

        $repeater->add_control(
            'project_link',
            [
                'label'   => esc_html__( 'Project Link', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ]
        );

        $repeater->add_control(
            'project_title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Nova Mobile App', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'project_desc',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We streamlined user flows, refreshed the visual language, and introduced accessibility-focused design components.', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'project_stats',
            [
                'label'       => esc_html__( 'Stats', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $stats_repeater->get_controls(),
                'title_field' => '{{{ stat_value }}} — {{{ stat_label }}}',
                'default'     => [
                    [ 'stat_value' => '40%',  'stat_label' => 'Faster completion' ],
                    [ 'stat_value' => '+25%', 'stat_label' => 'Faster completion' ],
                    [ 'stat_value' => '4.8',  'stat_label' => 'Star rating' ],
                ],
            ]
        );

        $repeater->add_control(
            'btn_text',
            [
                'label'   => esc_html__( 'Button Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'VIEW PROJECTS', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'show_arrow',
            [
                'label'   => esc_html__( 'Show Arrow SVG', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
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
                        'project_image' => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/01.webp' ],
                        'project_link'  => [ 'url' => '#' ],
                        'project_title' => 'Nova Mobile App',
                        'project_desc'  => 'We streamlined user flows, refreshed the visual language, and introduced accessibility-focused design components to improve usability.',
                        'btn_text'      => 'VIEW PROJECTS',
                        'show_arrow'    => 'yes',
                        'project_stats' => [
                            [ 'stat_value' => '40%',  'stat_label' => 'Faster completion' ],
                            [ 'stat_value' => '+25%', 'stat_label' => 'Faster completion' ],
                            [ 'stat_value' => '4.8',  'stat_label' => 'Star rating' ],
                        ],
                    ],
                    [
                        'project_image' => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/02.webp' ],
                        'project_link'  => [ 'url' => '#' ],
                        'project_title' => 'Axis Legal Website',
                        'project_desc'  => 'We created a refined visual identity and a sleek new website that communicates trust, clarity, and confidence.',
                        'btn_text'      => 'VIEW PROJECTS',
                        'show_arrow'    => 'yes',
                        'project_stats' => [
                            [ 'stat_value' => '+70%',     'stat_label' => 'Session duration' ],
                            [ 'stat_value' => '1 unified','stat_label' => 'Brand system' ],
                            [ 'stat_value' => '4 w',      'stat_label' => 'Delivery time' ],
                        ],
                    ],
                    [
                        'project_image' => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/03.webp' ],
                        'project_link'  => [ 'url' => '#' ],
                        'project_title' => 'Lunaris Co. Branding',
                        'project_desc'  => 'We crafted a modern visual identity for Lunaris Coffee Co., blending organic textures with clean typography.',
                        'btn_text'      => 'VIEW PROJECTS',
                        'show_arrow'    => 'yes',
                        'project_stats' => [
                            [ 'stat_value' => '+65%',  'stat_label' => 'Brand recognition' ],
                            [ 'stat_value' => '12',    'stat_label' => 'New product lines' ],
                            [ 'stat_value' => '3 mon', 'stat_label' => 'To done project' ],
                        ],
                    ],
                    [
                        'project_image' => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/08.webp' ],
                        'project_link'  => [ 'url' => '#' ],
                        'project_title' => 'EcomPro Store Design',
                        'project_desc'  => 'Redesigned an eCommerce platform with conversion-focused UX, resulting in higher sales and smoother checkout flow.',
                        'btn_text'      => 'VIEW PROJECTS',
                        'show_arrow'    => '',
                        'project_stats' => [
                            [ 'stat_value' => '+35%', 'stat_label' => 'Conversion rate' ],
                            [ 'stat_value' => '-20%', 'stat_label' => 'Cart abandonment' ],
                            [ 'stat_value' => '5 w',  'stat_label' => 'Completion' ],
                        ],
                    ],
                    [
                        'project_image' => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/10.webp' ],
                        'project_link'  => [ 'url' => '#' ],
                        'project_title' => 'FinTrack Web App',
                        'project_desc'  => 'Developed a financial tracking tool with smart analytics, helping users monitor expenses and manage budgets effectively.',
                        'btn_text'      => 'VIEW PROJECTS',
                        'show_arrow'    => '',
                        'project_stats' => [
                            [ 'stat_value' => '+60%', 'stat_label' => 'User retention' ],
                            [ 'stat_value' => '3x',   'stat_label' => 'Data accuracy' ],
                            [ 'stat_value' => '7 w',  'stat_label' => 'Delivery' ],
                        ],
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
        return '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 0V13.4751H16.5083V2.53591L1.0442 18L0 16.9061L15.4144 1.49171H4.47514V0H18Z" fill="#98FF03"/>
        </svg>';
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- wpr project area start -->
        <section class="wpr-project-area mb--16 inner">
            <div class="container">
                <div class="section-inner border-1">

                    <!-- Heading -->
                    <div class="section-top-area">
                        <div class="section-title-area center-style">
                            <p class="sub-title"><?php echo esc_html( $settings['sub_title'] ); ?></p>
                            <h2 class="section-title second-font font-semi-bold text-normal wpr-text-anime-style-1">
                                <?php echo esc_html( $settings['section_title'] ); ?>
                            </h2>
                        </div>
                    </div>

                    <!-- Projects -->
                    <div class="project-slider-inner">
                        <?php foreach ( $settings['projects_list'] as $project ) : ?>
                        <div class="project-wrapper2">

                            <!-- Image Area -->
                            <div class="image-area">
                                <a href="<?php echo esc_url( $project['project_link']['url'] ); ?>" class="over-link"></a>
                                <img src="<?php echo esc_url( $project['project_image']['url'] ); ?>" alt="<?php echo esc_attr( $project['project_title'] ); ?>" class="video-img">
                                <img src="<?php echo esc_url( $project['shape_top_left']['url'] ); ?>" alt="" class="shape top-left-shape">
                                <img src="<?php echo esc_url( $project['shape_top_right']['url'] ); ?>" width="120" alt="" class="shape top-right-shape">
                            </div>

                            <!-- Slide Content -->
                            <div class="slide-content">
                                <div class="product-intro">
                                    <div class="top">
                                        <h3 class="title">
                                            <a href="<?php echo esc_url( $project['project_link']['url'] ); ?>">
                                                <?php echo esc_html( $project['project_title'] ); ?>
                                            </a>
                                        </h3>
                                        <p class="desc"><?php echo esc_html( $project['project_desc'] ); ?></p>
                                    </div>
                                    <div class="bottom">
                                        <ul>
                                            <?php foreach ( $project['project_stats'] as $stat ) : ?>
                                            <li>
                                                <h4><?php echo esc_html( $stat['stat_value'] ); ?></h4>
                                                <p><?php echo esc_html( $stat['stat_label'] ); ?></p>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="button-area">
                                    <div class="box"></div>
                                    <a href="<?php echo esc_url( $project['project_link']['url'] ); ?>">
                                        <?php echo esc_html( $project['btn_text'] ); ?>
                                        <?php if ( $project['show_arrow'] === 'yes' ) : ?>
                                            <?php echo $this->arrow_svg(); ?>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Bottom Shape -->
                    <div class="bottom-shape-area bg-white square-dot">
                        <img src="<?php echo esc_url( $settings['bottom_shape']['url'] ); ?>" alt="">
                        <span class="square-shape top-left"></span>
                        <span class="square-shape bottom-left"></span>
                        <span class="square-shape top-right"></span>
                        <span class="square-shape bottom-right"></span>
                    </div>

                </div>
            </div>
        </section>
        <!-- wpr project area end -->
        <?php
    }
}