<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Footer_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_footer_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Footer', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-footer';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  FOOTER NAV LINKS
         * ========================================================= */
        $this->start_controls_section(
            'footer_nav_section',
            [
                'label' => esc_html__( 'Footer Nav Links', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $nav_repeater = new \Elementor\Repeater();

        $nav_repeater->add_control(
            'nav_text',
            [
                'label'   => esc_html__( 'Link Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'About Us', 'agenio-core' ),
            ]
        );

        $nav_repeater->add_control(
            'nav_url',
            [
                'label'   => esc_html__( 'Link URL', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ]
        );

        $this->add_control(
            'footer_nav_links',
            [
                'label'       => esc_html__( 'Nav Links', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $nav_repeater->get_controls(),
                'title_field' => '{{{ nav_text }}}',
                'default'     => [
                    [ 'nav_text' => 'About Us',     'nav_url' => [ 'url' => '#about' ] ],
                    [ 'nav_text' => 'Services',     'nav_url' => [ 'url' => '#services' ] ],
                    [ 'nav_text' => 'Projects',     'nav_url' => [ 'url' => '#projects' ] ],
                    [ 'nav_text' => 'Pricing Plan', 'nav_url' => [ 'url' => '#pricing' ] ],
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  FOOTER LOGO SECTION
         * ========================================================= */
        $this->start_controls_section(
            'footer_logo_section',
            [
                'label' => esc_html__( 'Footer Logo', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'footer_logo',
            [
                'label'   => esc_html__( 'Footer Logo', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/logo/footer-logo.svg',
                ],
            ]
        );

        $this->add_control(
            'footer_logo_url',
            [
                'label'   => esc_html__( 'Logo Link URL', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => home_url( '/' ) ],
            ]
        );

        $this->add_control(
            'logo_shape_one',
            [
                'label'   => esc_html__( 'Shape One', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/logo/shape-01.svg',
                ],
            ]
        );

        $this->add_control(
            'logo_shape_two',
            [
                'label'   => esc_html__( 'Shape Two', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/logo/shape-02.svg',
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  SOCIAL LINKS SECTION
         * ========================================================= */
        $this->start_controls_section(
            'social_section',
            [
                'label' => esc_html__( 'Social Links', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $social_repeater = new \Elementor\Repeater();

        $social_repeater->add_control(
            'social_text',
            [
                'label'   => esc_html__( 'Platform Name', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Instagram', 'agenio-core' ),
            ]
        );

        $social_repeater->add_control(
            'social_url',
            [
                'label'   => esc_html__( 'Profile URL', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ]
        );

        $this->add_control(
            'social_links',
            [
                'label'       => esc_html__( 'Social Links', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $social_repeater->get_controls(),
                'title_field' => '{{{ social_text }}}',
                'default'     => [
                    [ 'social_text' => 'Instagram', 'social_url' => [ 'url' => '#' ] ],
                    [ 'social_text' => 'Linkedin',  'social_url' => [ 'url' => '#' ] ],
                    [ 'social_text' => 'Dribbble',  'social_url' => [ 'url' => '#' ] ],
                    [ 'social_text' => 'Behance',   'social_url' => [ 'url' => '#' ] ],
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  COPYRIGHT SECTION
         * ========================================================= */
        $this->start_controls_section(
            'copyright_section',
            [
                'label' => esc_html__( 'Copyright', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'copyright_text',
            [
                'label'       => esc_html__( 'Copyright Text', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Agenio. All Rights Reserved', 'agenio-core' ),
                'description' => esc_html__( 'The © symbol and current year are added automatically.', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- wpr footer area start -->
        <div class="wpr-footer-area">
            <div class="container">
                <div class="section-inner border-1">

                    <!-- Footer Top Nav -->
                    <div class="footer-top">
                        <ul>
                            <?php foreach ( $settings['footer_nav_links'] as $index => $item ) : ?>
                                <?php if ( $index > 0 ) : ?>
                                    <li class="square-dot"></li>
                                <?php endif; ?>
                                <li>
                                    <a href="<?php echo esc_url( $item['nav_url']['url'] ); ?>">
                                        <?php echo esc_html( $item['nav_text'] ); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Footer Logo -->
                    <div class="footer-logo-area square-dot">
                        <a href="<?php echo esc_url( $settings['footer_logo_url']['url'] ); ?>">
                            <img src="<?php echo esc_url( $settings['footer_logo']['url'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                        <div class="shape one">
                            <img src="<?php echo esc_url( $settings['logo_shape_one']['url'] ); ?>" alt="">
                        </div>
                        <div class="shape two">
                            <img src="<?php echo esc_url( $settings['logo_shape_two']['url'] ); ?>" alt="">
                        </div>
                        <span class="square-shape top-left"></span>
                        <span class="square-shape top-right"></span>
                        <span class="square-shape bottom-left"></span>
                        <span class="square-shape bottom-right"></span>
                    </div>

                    <!-- Copyright Area -->
                    <div class="copyright-area">

                        <!-- Social Links -->
                        <div class="left-social-area">
                            <ul>
                                <?php foreach ( $settings['social_links'] as $item ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( $item['social_url']['url'] ); ?>">
                                        <?php echo esc_html( $item['social_text'] ); ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- Copyright -->
                        <p class="copyright">
                            &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $settings['copyright_text'] ); ?>
                        </p>

                        <!-- Scroll To Top -->
                        <button class="scroll-top-btn">
                            <?php esc_html_e( 'Back to Top', 'agenio-core' ); ?>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 3.29688L7.64062 3.64062L1.39062 9.89062L2.10938 10.6094L8 4.71875L13.8906 10.6094L14.6094 9.89062L8.35938 3.64062L8 3.29688Z" fill="black" />
                            </svg>
                        </button>

                    </div>

                </div>
            </div>
        </div>
        <!-- wpr footer area end -->
        <?php
    }
}