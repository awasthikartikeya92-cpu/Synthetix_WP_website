<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Pricing_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_pricing_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Pricing Plans', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-price-table';
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
                'default' => esc_html__( 'PRICING PLANS', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Section Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "Plans That\nFit You Project", 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  PRICING PLANS REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'plans_section',
            [
                'label' => esc_html__( 'Pricing Plans', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'plan_name',
            [
                'label'   => esc_html__( 'Plan Name', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Starter Plan', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'plan_availability',
            [
                'label'   => esc_html__( 'Availability Label', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Available Now', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'plan_tagline',
            [
                'label'   => esc_html__( 'Tagline (first line)', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Small businesses, startups', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'plan_tagline_span',
            [
                'label'       => esc_html__( 'Tagline (second line — highlighted)', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'or single-brand projects.', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'plan_price',
            [
                'label'   => esc_html__( 'Price', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '$2,500', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'plan_price_suffix',
            [
                'label'   => esc_html__( 'Price Suffix', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '/ project', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'plan_btn_text',
            [
                'label'   => esc_html__( 'Button Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Get Started', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'plan_btn_link',
            [
                'label'   => esc_html__( 'Button Link', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => 'contact.html' ],
            ]
        );

        $repeater->add_control(
            'plan_features',
            [
                'label'       => esc_html__( 'Features (one per line)', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => "Full service creative\nIntergration sync\nMonthly consulting call\nUpdates every 2 days\nSimple subscription\n3 times update\nScales with your needs\nCancel anytime",
                'description' => esc_html__( 'Enter each feature on a new line.', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'plan_check_icon',
            [
                'label'   => esc_html__( 'Feature Check Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/why-choose/check-01.svg',
                ],
            ]
        );

        $repeater->add_control(
            'is_dark',
            [
                'label'        => esc_html__( 'Dark Style Card', 'agenio-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'agenio-core' ),
                'label_off'    => esc_html__( 'No', 'agenio-core' ),
                'return_value' => 'yes',
                'default'      => '',
            ]
        );

        $repeater->add_control(
            'plan_shape_one',
            [
                'label'   => esc_html__( 'Header Shape 1', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/pricing/shape-1.svg',
                ],
            ]
        );

        $repeater->add_control(
            'plan_shape_two',
            [
                'label'   => esc_html__( 'Header Shape 2 (Grid)', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/pricing/grid-1.svg',
                ],
            ]
        );

        $repeater->add_control(
            'show_bottom_left_corner',
            [
                'label'        => esc_html__( 'Show Bottom-Right Corner Shape', 'agenio-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'agenio-core' ),
                'label_off'    => esc_html__( 'Hide', 'agenio-core' ),
                'return_value' => 'yes',
                'default'      => '',
                'description'  => esc_html__( 'The first plan card shows top-left, top-right, and bottom-right corners.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'plans_list',
            [
                'label'       => esc_html__( 'Plans', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ plan_name }}}',
                'default'     => [
                    [
                        'plan_name'              => 'Starter Plan',
                        'plan_availability'      => 'Available from Dec',
                        'plan_tagline'           => 'Small businesses, startups',
                        'plan_tagline_span'      => 'or single-brand projects.',
                        'plan_price'             => '$2,500',
                        'plan_price_suffix'      => '/ project',
                        'plan_btn_text'          => 'Get Started',
                        'plan_btn_link'          => [ 'url' => 'contact.html' ],
                        'plan_features'          => "Full service creative\nIntergration sync\nMonthly consulting call\nUpdates every 2 days\nSimple subscription\n3 times update\nScales with your needs\nCancel anytime",
                        'plan_check_icon'        => [ 'url' => get_template_directory_uri() . '/assets/images/why-choose/check-01.svg' ],
                        'is_dark'                => '',
                        'plan_shape_one'         => [ 'url' => get_template_directory_uri() . '/assets/images/pricing/shape-1.svg' ],
                        'plan_shape_two'         => [ 'url' => get_template_directory_uri() . '/assets/images/pricing/grid-1.svg' ],
                        'show_bottom_left_corner'=> 'yes',
                    ],
                    [
                        'plan_name'              => 'Growth Plan',
                        'plan_availability'      => 'Available Now',
                        'plan_tagline'           => 'Established brands',
                        'plan_tagline_span'      => 'seeking full-scale design support.',
                        'plan_price'             => '$5,500',
                        'plan_price_suffix'      => '/ project',
                        'plan_btn_text'          => 'Get Started',
                        'plan_btn_link'          => [ 'url' => 'contact.html' ],
                        'plan_features'          => "Full managed project\nAccess our entire team\nSimple subscription\nUpdates every 2 days\nWeekly consulting call\nCreative strategy\nScales with your needs\nCancel anytime",
                        'plan_check_icon'        => [ 'url' => get_template_directory_uri() . '/assets/images/why-choose/check-03.svg' ],
                        'is_dark'                => 'yes',
                        'plan_shape_one'         => [ 'url' => get_template_directory_uri() . '/assets/images/pricing/shape-2.svg' ],
                        'plan_shape_two'         => [ 'url' => get_template_directory_uri() . '/assets/images/pricing/grid-2.svg' ],
                        'show_bottom_left_corner'=> '',
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
                'label'   => esc_html__( 'Shape Image', 'agenio-core' ),
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
        $plans             = $settings['plans_list'];
        $show_bottom_shape = ( 'yes' === $settings['show_bottom_shape'] );
        ?>
        <!-- wpr pricing plans area start -->
        <section id="pricing" class="wpr-pricing-plans-area mb--16">
            <div class="container">
                <div class="section-inner bg-white border-1">

                    <!-- Section Header -->
                    <div class="section-top-area">
                        <div class="section-title-area center-style">
                            <?php if ( ! empty( $settings['sub_title'] ) ) : ?>
                                <p class="sub-title"><?php echo esc_html( $settings['sub_title'] ); ?></p>
                            <?php endif; ?>
                            <?php if ( ! empty( $settings['section_title'] ) ) : ?>
                                <h2 class="section-title second-font font-semi-bold text-normal">
                                    <?php echo nl2br( esc_html( $settings['section_title'] ) ); ?>
                                </h2>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Pricing Cards -->
                    <div class="section-mid-area">
                        <?php foreach ( $plans as $plan ) :
                            $dark_class  = ( 'yes' === $plan['is_dark'] ) ? ' dark' : '';
                            $btn_url     = ! empty( $plan['plan_btn_link']['url'] ) ? $plan['plan_btn_link']['url'] : '#';
                            $btn_target  = ! empty( $plan['plan_btn_link']['is_external'] ) ? ' target="_blank"' : '';
                            $btn_rel     = ! empty( $plan['plan_btn_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                            $features    = array_filter( array_map( 'trim', explode( "\n", $plan['plan_features'] ) ) );
                            $show_br     = ( 'yes' === $plan['show_bottom_left_corner'] );
                        ?>
                        <div class="pricing-inner square-dot">
                            <div class="pricing-wrapper<?php echo esc_attr( $dark_class ); ?>">
                                <div class="pricing-header">
                                    <div class="plan-type">
                                        <h3 class="h6"><?php echo esc_html( $plan['plan_name'] ); ?></h3>
                                        <p><?php echo esc_html( $plan['plan_availability'] ); ?></p>
                                    </div>
                                    <h4 class="title h5">
                                        <?php echo esc_html( $plan['plan_tagline'] ); ?> <br>
                                        <span><?php echo esc_html( $plan['plan_tagline_span'] ); ?></span>
                                    </h4>
                                    <div class="bottom-pricing">
                                        <h4 class="price">
                                            <?php echo esc_html( $plan['plan_price'] ); ?>
                                            <span><?php echo esc_html( $plan['plan_price_suffix'] ); ?></span>
                                        </h4>
                                        <div class="button-area">
                                            <a href="<?php echo esc_url( $btn_url ); ?>" class="wpr-btn btn-primary"<?php echo $btn_target . $btn_rel; // phpcs:ignore ?>>
                                                <?php echo esc_html( $plan['plan_btn_text'] ); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php if ( ! empty( $plan['plan_shape_one']['url'] ) ) : ?>
                                        <div class="shape-one"><img src="<?php echo esc_url( $plan['plan_shape_one']['url'] ); ?>" alt=""></div>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $plan['plan_shape_two']['url'] ) ) : ?>
                                        <div class="shape-two"><img src="<?php echo esc_url( $plan['plan_shape_two']['url'] ); ?>" alt=""></div>
                                    <?php endif; ?>
                                </div>
                                <div class="pricing-body">
                                    <ul>
                                        <?php foreach ( $features as $feature ) : ?>
                                        <li>
                                            <?php if ( ! empty( $plan['plan_check_icon']['url'] ) ) : ?>
                                                <img src="<?php echo esc_url( $plan['plan_check_icon']['url'] ); ?>" alt="">
                                            <?php endif; ?>
                                            <?php echo esc_html( $feature ); ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <span class="square-shape top-left"></span>
                            <span class="square-shape top-right"></span>
                            <?php if ( $show_br ) : ?>
                                <span class="square-shape bottom-right"></span>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
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

                </div>
            </div>
        </section>
        <!-- wpr pricing plans area end -->
        <?php
    }
}