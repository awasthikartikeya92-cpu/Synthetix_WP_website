<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Header_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_header_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Header', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-header';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  TOP BAR SECTION
         * ========================================================= */
        $this->start_controls_section(
            'topbar_section',
            [
                'label' => esc_html__( 'Top Bar', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'topbar_enable',
            [
                'label'   => esc_html__( 'Enable Top Bar', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'topbar_text',
            [
                'label'     => esc_html__( 'Top Bar Text', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => esc_html__( 'WE ARE AVAILABLE FOR', 'agenio-core' ),
                'condition' => [ 'topbar_enable' => 'yes' ],
            ]
        );

        $this->add_control(
            'topbar_highlight',
            [
                'label'     => esc_html__( 'Highlighted Text', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => esc_html__( 'DECEMBER PROJECTS', 'agenio-core' ),
                'condition' => [ 'topbar_enable' => 'yes' ],
            ]
        );

        $this->add_control(
            'topbar_left_icon',
            [
                'label'     => esc_html__( 'Left Icon', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [ 'url' => get_template_directory_uri() . '/assets/images/icon/green-left.svg' ],
                'condition' => [ 'topbar_enable' => 'yes' ],
            ]
        );

        $this->add_control(
            'topbar_right_icon',
            [
                'label'     => esc_html__( 'Right Icon', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [ 'url' => get_template_directory_uri() . '/assets/images/icon/green-right.svg' ],
                'condition' => [ 'topbar_enable' => 'yes' ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  LOGO SECTION
         * ========================================================= */
        $this->start_controls_section(
            'logo_section',
            [
                'label' => esc_html__( 'Logo', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'logo',
            [
                'label'   => esc_html__( 'Logo Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/logo/01.svg' ],
            ]
        );

        $this->add_control(
            'logo_url',
            [
                'label'   => esc_html__( 'Logo URL', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => home_url( '/' ) ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  BUTTON SECTION
         * ========================================================= */
        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__( 'CTA Button', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'btn_url',
            [
                'label'   => esc_html__( 'Button URL', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#contact' ],
            ]
        );

        $this->add_control(
            'mobile_btn_text',
            [
                'label'   => esc_html__( 'Mobile Sidebar Button Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Contact', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'mobile_btn_url',
            [
                'label'   => esc_html__( 'Mobile Sidebar Button URL', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#contact' ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- header area start -->
        <header class="header-style-one">

            <?php if ( $settings['topbar_enable'] === 'yes' ) : ?>
            <!-- Top Bar -->
            <div class="header-top">
                <div class="header-top-inner">
                    <div class="left-icon">
                        <img src="<?php echo esc_url( $settings['topbar_left_icon']['url'] ); ?>" alt="">
                    </div>
                    <p class="text">
                        <?php echo esc_html( $settings['topbar_text'] ); ?>
                        <span><?php echo esc_html( $settings['topbar_highlight'] ); ?></span>
                    </p>
                    <div class="right-icon">
                        <img src="<?php echo esc_url( $settings['topbar_right_icon']['url'] ); ?>" alt="">
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="container">
                <div class="header-style-one-wrapper">

                    <!-- Logo -->
                    <div class="left-area square-dot">
                        <div class="logo-area">
                            <a href="<?php echo esc_url( $settings['logo_url']['url'] ); ?>" class="logo">
                                <img src="<?php echo esc_url( $settings['logo']['url'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                            </a>
                        </div>
                        <span class="square-shape top-left"></span>
                        <span class="square-shape bottom-left"></span>
                        <span class="square-shape top-right"></span>
                        <span class="square-shape bottom-right"></span>
                    </div>

                    <!-- Desktop Nav -->
                    <nav class="main-nav-area">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'main-menu',
                            'container'      => false,
                            'menu_class'     => 'list-unstyled wpr-desktop-menu',
                            'walker'         => new Agenio_Walker_Header_Menu(),
                        ) );
                        ?>
                    </nav>

                    <!-- CTA Button + Hamburger -->
                    <div class="button-area-start square-dot">
                        <a href="<?php echo esc_url( $settings['btn_url']['url'] ); ?>" class="wpr-btn btn-primary">
                            <?php echo esc_html( $settings['btn_text'] ); ?>
                        </a>
                        <div class="menu-btn d-flex d-lg-none d-md-flex d-sm-flex" id="menu-btn">
                            <span class="line one"></span>
                            <span class="line two"></span>
                        </div>
                        <span class="square-shape top-left"></span>
                        <span class="square-shape bottom-left"></span>
                        <span class="square-shape top-right"></span>
                        <span class="square-shape bottom-right"></span>
                    </div>

                    <!-- Mobile Sidebar -->
                    <div id="side-bar" class="side-bar">
                        <div class="sidebar-inner">
                            <div class="mobile-menu-main">
                                <nav class="nav-main mainmenu-nav">
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'main-menu',
                                        'container'      => false,
                                        'menu_class'     => 'list-unstyled wpr-desktop-menu',
                                        'menu_id'        => 'mobile-menu',
                                        'walker'         => new Agenio_Walker_Mobile_Menu(),
                                    ) );
                                    ?>
                                </nav>
                            </div>
                            <div class="button-area">
                                <a href="<?php echo esc_url( $settings['mobile_btn_url']['url'] ); ?>" class="wpr-btn btn-primary">
                                    <?php echo esc_html( $settings['mobile_btn_text'] ); ?>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- header area end -->
        <?php
    }
}