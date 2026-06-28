<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Working_Process_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_working_process_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Working Process', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-flow';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  LEFT COLUMN
         * ========================================================= */
        $this->start_controls_section(
            'left_section',
            [
                'label' => esc_html__( 'Left Column', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'   => esc_html__( 'Sub Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'PROCESS', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Section Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "Combine Creativity\nWith Strategy", 'agenio-core' ),
            ]
        );

        $this->add_control(
            'left_desc',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Every step designed to deliver clarity, impact, and results.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label'   => esc_html__( 'Button Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Start a Project', 'agenio-core' ),
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

        // Button icon images
        $this->add_control(
            'btn_arrow_fixed',
            [
                'label'   => esc_html__( 'Button Arrow Fixed Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/icon/button-arrow-fixed.svg',
                ],
            ]
        );

        $this->add_control(
            'btn_arrow_hover',
            [
                'label'   => esc_html__( 'Button Arrow Hover Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/icon/button-arrow-2.svg',
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  PROCESS STEPS REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'steps_section',
            [
                'label' => esc_html__( 'Process Steps', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'step_image',
            [
                'label'   => esc_html__( 'Step Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/working-process/01.webp',
                ],
            ]
        );

        $repeater->add_control(
            'step_number',
            [
                'label'   => esc_html__( 'Step Number', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '//01', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'step_title',
            [
                'label'   => esc_html__( 'Step Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Discover & Define', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'step_desc',
            [
                'label'   => esc_html__( 'Step Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We start by understanding your goals, audience, and challenges. Through research and workshops, we uncover insights of the project.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'steps_list',
            [
                'label'       => esc_html__( 'Steps', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ step_number }}} {{{ step_title }}}',
                'default'     => [
                    [
                        'step_image'  => [ 'url' => get_template_directory_uri() . '/assets/images/working-process/01.webp' ],
                        'step_number' => '//01',
                        'step_title'  => 'Discover & Define',
                        'step_desc'   => 'We start by understanding your goals, audience, and challenges. Through research and workshops, we uncover insights of the project.',
                    ],
                    [
                        'step_image'  => [ 'url' => get_template_directory_uri() . '/assets/images/working-process/02.webp' ],
                        'step_number' => '//02',
                        'step_title'  => 'Concept & Strategy',
                        'step_desc'   => 'We explore visual styles, narratives, and user flows to define the strategic and aesthetic direction of your brand or product.',
                    ],
                    [
                        'step_image'  => [ 'url' => get_template_directory_uri() . '/assets/images/working-process/03.webp' ],
                        'step_number' => '//03',
                        'step_title'  => 'Design & Develop',
                        'step_desc'   => 'Every layout, color, and interaction is thoughtfully crafted to ensure your brand feels cohesive, functional, and memorable.',
                    ],
                    [
                        'step_image'  => [ 'url' => get_template_directory_uri() . '/assets/images/working-process/04.webp' ],
                        'step_number' => '//04',
                        'step_title'  => 'Launch & Evolve',
                        'step_desc'   => 'We guide you through launch and beyond - analyzing performance, gathering feedback, and refining your design.',
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
    }

    protected function render() {
        $settings          = $this->get_settings_for_display();
        $steps             = $settings['steps_list'];
        $show_bottom_shape = ( 'yes' === $settings['show_bottom_shape'] );

        $btn_url    = ! empty( $settings['btn_link']['url'] ) ? $settings['btn_link']['url'] : '#';
        $btn_target = ! empty( $settings['btn_link']['is_external'] ) ? ' target="_blank"' : '';
        $btn_rel    = ! empty( $settings['btn_link']['nofollow'] ) ? ' rel="nofollow"' : '';
        ?>
        <!-- wpr working process area start -->
        <section class="wpr-working-process mb--16">
            <div class="container">
                <div class="section-inner bg-white border-1">
                    <div class="row">

                        <!-- Left Column -->
                        <div class="col-lg-6">
                            <div class="working-process-left">
                                <div class="section-title-area">
                                    <?php if ( ! empty( $settings['sub_title'] ) ) : ?>
                                        <p class="sub-title"><?php echo esc_html( $settings['sub_title'] ); ?></p>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $settings['section_title'] ) ) : ?>
                                        <h2 class="section-title second-font font-semi-bold text-normal quote">
                                            <?php echo nl2br( esc_html( $settings['section_title'] ) ); ?>
                                        </h2>
                                    <?php endif; ?>
                                </div>
                                <div class="text-area">
                                    <?php if ( ! empty( $settings['left_desc'] ) ) : ?>
                                        <p class="desc"><?php echo esc_html( $settings['left_desc'] ); ?></p>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $settings['btn_text'] ) ) : ?>
                                        <a href="<?php echo esc_url( $btn_url ); ?>" class="wpr-btn btn-primary with-icon"<?php echo $btn_target . $btn_rel; // phpcs:ignore ?>>
                                            <div class="inner">
                                                <div class="icon">
                                                    <span class="fixed-arrow">
                                                        <img src="<?php echo esc_url( $settings['btn_arrow_fixed']['url'] ); ?>" alt="">
                                                    </span>
                                                    <?php for ( $i = 0; $i < 4; $i++ ) : ?>
                                                    <span>
                                                        <img src="<?php echo esc_url( $settings['btn_arrow_hover']['url'] ); ?>" alt="">
                                                    </span>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                            <?php echo esc_html( $settings['btn_text'] ); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column — Process Steps -->
                        <div class="col-lg-6">
                            <div class="right-content-area">
                                <?php foreach ( $steps as $step ) : ?>
                                <div class="working-process-wrapper">
                                    <div class="image-area">
                                        <img src="<?php echo esc_url( $step['step_image']['url'] ); ?>" alt="<?php echo esc_attr( $step['step_title'] ); ?>">
                                    </div>
                                    <div class="content-area">
                                        <div class="number"><?php echo esc_html( $step['step_number'] ); ?></div>
                                        <div class="wrapper-content">
                                            <h3 class="title second-font h6"><?php echo esc_html( $step['step_title'] ); ?></h3>
                                            <p class="desc"><?php echo esc_html( $step['step_desc'] ); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>

                <?php if ( $show_bottom_shape && ! empty( $settings['bottom_shape_image']['url'] ) ) : ?>
                <div class="bottom-shape-area bg-white square-dot">
                    <img src="<?php echo esc_url( $settings['bottom_shape_image']['url'] ); ?>" alt="">
                    <span class="square-shape top-left"></span>
                    <span class="square-shape bottom-left"></span>
                    <span class="square-shape top-right"></span>
                    <span class="square-shape bottom-right"></span>
                </div>
                <?php endif; ?>

            </div>
        </section>
        <!-- wpr working process area end -->
        <?php
    }
}