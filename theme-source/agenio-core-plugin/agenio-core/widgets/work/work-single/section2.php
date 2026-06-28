<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Work_Single_Next_Project_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_work_single_next_project_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Work Single Next Project', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-arrow-right';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         * SECTION TITLE
         * ========================================================= */
        $this->start_controls_section(
            'section_title_section',
            [
                'label' => esc_html__( 'Section Title', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'   => esc_html__( 'Sub Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Project', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Section Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Next Project', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         * PROJECT CONTENT
         * ========================================================= */
        $this->start_controls_section(
            'project_content_section',
            [
                'label' => esc_html__( 'Project Content', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'project_image',
            [
                'label'   => esc_html__( 'Project Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/portfolio/02.webp',
                ],
            ]
        );

        $this->add_control(
            'top_left_shape',
            [
                'label'   => esc_html__( 'Top Left Shape', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/portfolio/shape-top-left.svg',
                ],
            ]
        );

        $this->add_control(
            'top_right_shape',
            [
                'label'   => esc_html__( 'Top Right Shape', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/portfolio/shape-top-right.svg',
                ],
            ]
        );

        $this->add_control(
            'project_title',
            [
                'label'   => esc_html__( 'Project Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Axis Legal Website', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'project_description',
            [
                'label'   => esc_html__( 'Project Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We streamlined user flows, refreshed the visual language, and introduced accessibility-focused design components to improve usability.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'project_url',
            [
                'label'       => esc_html__( 'Project URL', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'agenio-core' ),
                'default'     => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'   => esc_html__( 'Button Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'View Projects', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         * STATS REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'stats_section',
            [
                'label' => esc_html__( 'Project Stats', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'stat_number',
            [
                'label'   => esc_html__( 'Stat Number', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '40%', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'stat_text',
            [
                'label'   => esc_html__( 'Stat Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Faster completion', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'stats_list',
            [
                'label'       => esc_html__( 'Stats List', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ stat_number }}}',
                'default'     => [
                    [
                        'stat_number' => '40%',
                        'stat_text'   => 'Faster completion',
                    ],
                    [
                        'stat_number' => '+25%',
                        'stat_text'   => 'Higher engagement',
                    ],
                    [
                        'stat_number' => '4.8',
                        'stat_text'   => 'Star rating',
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $target   = $settings['project_url']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['project_url']['nofollow'] ? ' rel="nofollow"' : '';

        ?>
        
        <!-- wpr next project area start -->
        <section class="wpr-next-project-area mb--16">
            <div class="container">
                <div class="section-inner border-1">

                    <div class="section-top-area">
                        <div class="section-title-area center-style">

                            <?php if ( ! empty( $settings['sub_title'] ) ) : ?>
                                <p class="sub-title">
                                    <?php echo esc_html( $settings['sub_title'] ); ?>
                                </p>
                            <?php endif; ?>

                            <?php if ( ! empty( $settings['section_title'] ) ) : ?>
                                <h2 class="section-title second-font font-semi-bold text-normal">
                                    <?php echo esc_html( $settings['section_title'] ); ?>
                                </h2>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="section-mid-area">
                        <div class="slide feature-project">

                            <div class="image-area">

                                <?php if ( ! empty( $settings['project_image']['url'] ) ) : ?>
                                    <img 
                                        src="<?php echo esc_url( $settings['project_image']['url'] ); ?>" 
                                        alt="<?php echo esc_attr( $settings['project_title'] ); ?>"
                                        class="video-img"
                                    >
                                <?php endif; ?>

                                <?php if ( ! empty( $settings['top_left_shape']['url'] ) ) : ?>
                                    <img 
                                        src="<?php echo esc_url( $settings['top_left_shape']['url'] ); ?>" 
                                        alt=""
                                        class="shape top-left-shape"
                                    >
                                <?php endif; ?>

                                <?php if ( ! empty( $settings['top_right_shape']['url'] ) ) : ?>
                                    <img 
                                        src="<?php echo esc_url( $settings['top_right_shape']['url'] ); ?>" 
                                        alt=""
                                        class="shape top-right-shape"
                                    >
                                <?php endif; ?>

                            </div>

                            <div class="slide-content">
                                <div class="product-intro">

                                    <div class="top">

                                        <?php if ( ! empty( $settings['project_title'] ) ) : ?>
                                            <h2 class="h3 title">
                                                <a href="<?php echo esc_url( $settings['project_url']['url'] ); ?>" <?php echo $target . $nofollow; ?>>
                                                    <?php echo esc_html( $settings['project_title'] ); ?>
                                                </a>
                                            </h2>
                                        <?php endif; ?>

                                        <?php if ( ! empty( $settings['project_description'] ) ) : ?>
                                            <p class="desc">
                                                <?php echo esc_html( $settings['project_description'] ); ?>
                                            </p>
                                        <?php endif; ?>

                                    </div>

                                    <?php if ( ! empty( $settings['stats_list'] ) ) : ?>
                                        <div class="bottom">
                                            <ul>

                                                <?php foreach ( $settings['stats_list'] as $item ) : ?>
                                                    <li>

                                                        <?php if ( ! empty( $item['stat_number'] ) ) : ?>
                                                            <h3 class="h5">
                                                                <?php echo esc_html( $item['stat_number'] ); ?>
                                                            </h3>
                                                        <?php endif; ?>

                                                        <?php if ( ! empty( $item['stat_text'] ) ) : ?>
                                                            <p>
                                                                <?php echo esc_html( $item['stat_text'] ); ?>
                                                            </p>
                                                        <?php endif; ?>

                                                    </li>
                                                <?php endforeach; ?>

                                            </ul>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>

                            <div class="hover_mouse">
                                <div class="box"></div>

                                <a href="<?php echo esc_url( $settings['project_url']['url'] ); ?>" <?php echo $target . $nofollow; ?>>

                                    <?php echo esc_html( $settings['button_text'] ); ?>

                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 0V13.4751H16.5083V2.53591L1.0442 18L0 16.9061L15.4144 1.49171H4.47514V0H18Z" fill="#98FF03" />
                                    </svg>

                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- wpr next project area end -->

        <?php
    }
}