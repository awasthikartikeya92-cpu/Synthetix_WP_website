<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Why_Choose_Points_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_why_choose_points_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Why Choose Points', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
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
                'default' => esc_html__( 'WHY CHOOSE US', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Section Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "Help Brands\nGrow With Clarity", 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  FEATURE CARDS REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'points_section',
            [
                'label' => esc_html__( 'Feature Cards', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'point_icon',
            [
                'label'   => esc_html__( 'Icon Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/why-choose/icon/01.svg',
                ],
            ]
        );

        $repeater->add_control(
            'point_title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Strategy-Driven Design', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'point_desc',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We combine research, storytelling, and design thinking to build solutions that align with your goals — not just trends.', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'show_top_left_corner',
            [
                'label'        => esc_html__( 'Show Top-Left Corner Shape', 'agenio-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'agenio-core' ),
                'label_off'    => esc_html__( 'Hide', 'agenio-core' ),
                'return_value' => 'yes',
                'default'      => '',
                'description'  => esc_html__( 'First card only has both top-left and top-right corners; others have top-right only.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'points_list',
            [
                'label'       => esc_html__( 'Feature Cards', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ point_title }}}',
                'default'     => [
                    [
                        'point_icon'           => [ 'url' => get_template_directory_uri() . '/assets/images/why-choose/icon/01.svg' ],
                        'point_title'          => 'Strategy-Driven Design',
                        'point_desc'           => 'We combine research, storytelling, and design thinking to build solutions that align with your goals — not just trends.',
                        'show_top_left_corner' => 'yes',
                    ],
                    [
                        'point_icon'           => [ 'url' => get_template_directory_uri() . '/assets/images/why-choose/icon/02.svg' ],
                        'point_title'          => 'Crafted for Impact',
                        'point_desc'           => 'From user experience to brand consistency, every detail is designed to make a measurable difference.',
                        'show_top_left_corner' => '',
                    ],
                    [
                        'point_icon'           => [ 'url' => get_template_directory_uri() . '/assets/images/why-choose/icon/03.svg' ],
                        'point_title'          => 'Collaborative Process',
                        'point_desc'           => 'We work closely with clients at every step, ensuring transparency, feedback, and shared success.',
                        'show_top_left_corner' => '',
                    ],
                    [
                        'point_icon'           => [ 'url' => get_template_directory_uri() . '/assets/images/why-choose/icon/04.svg' ],
                        'point_title'          => 'Consistent Excellence',
                        'point_desc'           => 'Our team delivers premium quality across every touchpoint - from identity to product design.',
                        'show_top_left_corner' => '',
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  SHAPES & ANIMATION
         * ========================================================= */
        $this->start_controls_section(
            'shapes_section',
            [
                'label' => esc_html__( 'Shapes & Animation', 'agenio-core' ),
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

        $this->add_control(
            'top_right_shape',
            [
                'label'   => esc_html__( 'Top Right Decorative Shape', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/why-choose/top-right-shape.svg',
                ],
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
                'label'     => esc_html__( 'Delay Step (seconds)', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'min'       => 0.1,
                'max'       => 1,
                'step'      => 0.1,
                'default'   => 0.2,
                'condition' => [ 'wow_animation' => 'yes' ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings          = $this->get_settings_for_display();
        $points            = $settings['points_list'];
        $wow_enabled       = ( 'yes' === $settings['wow_animation'] );
        $delay_step        = floatval( $settings['wow_delay_step'] );
        $show_bottom_shape = ( 'yes' === $settings['show_bottom_shape'] );
        ?>
        <!-- wpr why choose us area start -->
        <section class="wpr-why-choose-us-area2 mb--16">
            <div class="container">
                <div class="section-inner border-1">

                    <!-- Section Header -->
                    <div class="section-title-area">
                        <?php if ( ! empty( $settings['sub_title'] ) ) : ?>
                            <p class="sub-title"><?php echo esc_html( $settings['sub_title'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( ! empty( $settings['section_title'] ) ) : ?>
                            <h2 class="section-title second-font font-semi-bold text-normal">
                                <?php echo nl2br( esc_html( $settings['section_title'] ) ); ?>
                            </h2>
                        <?php endif; ?>
                    </div>

                    <!-- Feature Cards -->
                    <div class="bottom-content-area">
                        <?php
                        $index = 1;
                        foreach ( $points as $point ) :
                            $wow_class = $wow_enabled ? ' wow fadeInRight' : '';
                            $wow_attr  = $wow_enabled ? ' data-wow-delay="' . esc_attr( round( $index * $delay_step, 1 ) ) . 's"' : '';
                        ?>
                        <div class="why-choose-wrapper2 square-dot<?php echo esc_attr( $wow_class ); ?>"<?php echo $wow_attr; // phpcs:ignore ?>>
                            <?php if ( ! empty( $point['point_icon']['url'] ) ) : ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url( $point['point_icon']['url'] ); ?>" alt="<?php echo esc_attr( $point['point_title'] ); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="text">
                                <h3 class="h6 title second-font font-semi-bold text-normal">
                                    <?php echo esc_html( $point['point_title'] ); ?>
                                </h3>
                                <p class="desc"><?php echo esc_html( $point['point_desc'] ); ?></p>
                            </div>
                            <?php if ( 'yes' === $point['show_top_left_corner'] ) : ?>
                                <span class="square-shape top-left"></span>
                            <?php endif; ?>
                            <span class="square-shape top-right"></span>
                        </div>
                        <?php
                            $index++;
                        endforeach;
                        ?>
                    </div>

                    <?php if ( $show_bottom_shape && ! empty( $settings['bottom_shape_image']['url'] ) ) : ?>
                    <div class="bottom-shape-area square-dot">
                        <img src="<?php echo esc_url( $settings['bottom_shape_image']['url'] ); ?>" alt="">
                        <span class="square-shape top-left"></span>
                        <span class="square-shape bottom-left"></span>
                        <span class="square-shape top-right"></span>
                        <span class="square-shape bottom-right"></span>
                    </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $settings['top_right_shape']['url'] ) ) : ?>
                    <div class="top-right-shape">
                        <img src="<?php echo esc_url( $settings['top_right_shape']['url'] ); ?>" alt="">
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </section>
        <!-- wpr why choose us area end -->
        <?php
    }
}