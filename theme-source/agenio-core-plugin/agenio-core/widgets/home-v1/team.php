<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Team_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_team_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Team', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    /**
     * Map card position → shape class + shape image key.
     * Pattern from HTML: odd columns (1,3,5,7) = up card, even (2,4,6,8) = down card.
     * Shape position cycles: top-left, bottom-left, top-right, bottom-right per row pair.
     */
    private function get_card_meta( $index ) {
        $shapes = [
            1 => [ 'down' => '',     'shape_class' => 'shape-top-left',    'shape_img' => 'shape-top-left.svg' ],
            2 => [ 'down' => 'down', 'shape_class' => 'shape-bottom-left', 'shape_img' => 'shape-bottom-left.svg' ],
            3 => [ 'down' => '',     'shape_class' => 'shape-top-right',   'shape_img' => 'shape-top-right.svg' ],
            4 => [ 'down' => 'down', 'shape_class' => 'shape-bottom-right','shape_img' => 'shape-bottom-right.svg' ],
            5 => [ 'down' => '',     'shape_class' => 'shape-top-right',   'shape_img' => 'shape-top-right.svg' ],
            6 => [ 'down' => 'down', 'shape_class' => 'shape-bottom-left', 'shape_img' => 'shape-bottom-left.svg' ],
            7 => [ 'down' => '',     'shape_class' => 'shape-top-left',    'shape_img' => 'shape-top-left.svg' ],
        ];
        $pos = ( ( $index - 1 ) % 7 ) + 1;
        return isset( $shapes[ $pos ] ) ? $shapes[ $pos ] : $shapes[1];
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
                'default' => esc_html__( 'TEAM MEMBERS', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Section Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "The Minds\nBehind the Work", 'agenio-core' ),
            ]
        );

        $this->add_control(
            'bg_shape',
            [
                'label'   => esc_html__( 'Background Grid Shape', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/team/grid-big.svg',
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  SOCIAL ICONS — SHARED
         * ========================================================= */
        $this->start_controls_section(
            'social_icons_section',
            [
                'label' => esc_html__( 'Social Icons (Shared)', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon_twitter',
            [
                'label'   => esc_html__( 'Twitter Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/team/twitter.svg',
                ],
            ]
        );

        $this->add_control(
            'icon_linkedin',
            [
                'label'   => esc_html__( 'LinkedIn Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/team/linkedin.svg',
                ],
            ]
        );

        $this->add_control(
            'icon_github',
            [
                'label'   => esc_html__( 'GitHub Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/team/github.svg',
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  TEAM MEMBERS REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'members_section',
            [
                'label' => esc_html__( 'Team Members', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'member_image',
            [
                'label'   => esc_html__( 'Photo', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/team/01.webp',
                ],
            ]
        );

        $repeater->add_control(
            'member_name',
            [
                'label'   => esc_html__( 'Name', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Ethan Brooks', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'member_designation',
            [
                'label'   => esc_html__( 'Designation', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Agenio Founder', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'member_twitter',
            [
                'label'       => esc_html__( 'Twitter URL', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://twitter.com/username',
                'default'     => [ 'url' => '#' ],
            ]
        );

        $repeater->add_control(
            'member_linkedin',
            [
                'label'       => esc_html__( 'LinkedIn URL', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://linkedin.com/in/username',
                'default'     => [ 'url' => '#' ],
            ]
        );

        $repeater->add_control(
            'member_github',
            [
                'label'       => esc_html__( 'GitHub URL', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://github.com/username',
                'default'     => [ 'url' => '#' ],
            ]
        );

        $this->add_control(
            'members_list',
            [
                'label'       => esc_html__( 'Members', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ member_name }}}',
                'default'     => [
                    [ 'member_image' => [ 'url' => get_template_directory_uri() . '/assets/images/team/01.webp' ], 'member_name' => 'Ethan Brooks',   'member_designation' => 'Agenio Founder',          'member_twitter' => [ 'url' => '#' ], 'member_linkedin' => [ 'url' => '#' ], 'member_github' => [ 'url' => '#' ] ],
                    [ 'member_image' => [ 'url' => get_template_directory_uri() . '/assets/images/team/02.webp' ], 'member_name' => 'Liam Anderson',  'member_designation' => 'Brand Identity Designer', 'member_twitter' => [ 'url' => '#' ], 'member_linkedin' => [ 'url' => '#' ], 'member_github' => [ 'url' => '#' ] ],
                    [ 'member_image' => [ 'url' => get_template_directory_uri() . '/assets/images/team/03.webp' ], 'member_name' => 'Ethan Walker',   'member_designation' => 'Creative Director',       'member_twitter' => [ 'url' => '#' ], 'member_linkedin' => [ 'url' => '#' ], 'member_github' => [ 'url' => '#' ] ],
                    [ 'member_image' => [ 'url' => get_template_directory_uri() . '/assets/images/team/04.webp' ], 'member_name' => 'Mason Cole',     'member_designation' => 'Lead UI/UX Designer',     'member_twitter' => [ 'url' => '#' ], 'member_linkedin' => [ 'url' => '#' ], 'member_github' => [ 'url' => '#' ] ],
                    [ 'member_image' => [ 'url' => get_template_directory_uri() . '/assets/images/team/05.webp' ], 'member_name' => 'Noah Reed',      'member_designation' => 'Senior Product Designer', 'member_twitter' => [ 'url' => '#' ], 'member_linkedin' => [ 'url' => '#' ], 'member_github' => [ 'url' => '#' ] ],
                    [ 'member_image' => [ 'url' => get_template_directory_uri() . '/assets/images/team/06.webp' ], 'member_name' => 'Oliver Hayes',   'member_designation' => 'Design Strategist',       'member_twitter' => [ 'url' => '#' ], 'member_linkedin' => [ 'url' => '#' ], 'member_github' => [ 'url' => '#' ] ],
                    [ 'member_image' => [ 'url' => get_template_directory_uri() . '/assets/images/team/07.webp' ], 'member_name' => 'James Carter',   'member_designation' => 'Art Director',            'member_twitter' => [ 'url' => '#' ], 'member_linkedin' => [ 'url' => '#' ], 'member_github' => [ 'url' => '#' ] ],
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  "WE'RE HIRING" CARD
         * ========================================================= */
        $this->start_controls_section(
            'hiring_section',
            [
                'label' => esc_html__( '"We\'re Hiring" Card', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_hiring_card',
            [
                'label'        => esc_html__( 'Show Hiring Card', 'agenio-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'agenio-core' ),
                'label_off'    => esc_html__( 'Hide', 'agenio-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'hiring_title',
            [
                'label'     => esc_html__( 'Hiring Title', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::TEXTAREA,
                'default'   => esc_html__( "We're Searching\nFor Talents", 'agenio-core' ),
                'condition' => [ 'show_hiring_card' => 'yes' ],
            ]
        );

        $this->add_control(
            'hiring_desc',
            [
                'label'     => esc_html__( 'Hiring Description', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::TEXTAREA,
                'default'   => esc_html__( 'Join our team of creatives pushing boundaries, experimenting with ideas', 'agenio-core' ),
                'condition' => [ 'show_hiring_card' => 'yes' ],
            ]
        );

        $this->add_control(
            'hiring_btn_text',
            [
                'label'     => esc_html__( 'Button Text', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => esc_html__( 'Apply Now', 'agenio-core' ),
                'condition' => [ 'show_hiring_card' => 'yes' ],
            ]
        );

        $this->add_control(
            'hiring_btn_link',
            [
                'label'     => esc_html__( 'Button Link', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::URL,
                'default'   => [ 'url' => 'contact.html' ],
                'condition' => [ 'show_hiring_card' => 'yes' ],
            ]
        );

        $this->add_control(
            'hiring_btn_icon',
            [
                'label'     => esc_html__( 'Button Arrow Icon', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url' => get_template_directory_uri() . '/assets/images/icon/button-arrow-fixed.svg',
                ],
                'condition' => [ 'show_hiring_card' => 'yes' ],
            ]
        );

        $this->add_control(
            'hiring_grid_shape',
            [
                'label'     => esc_html__( 'Card Grid Shape', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url' => get_template_directory_uri() . '/assets/images/team/grid.svg',
                ],
                'condition' => [ 'show_hiring_card' => 'yes' ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  WOW ANIMATION
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
        $members           = $settings['members_list'];
        $wow_enabled       = ( 'yes' === $settings['wow_animation'] );
        $show_hiring       = ( 'yes' === $settings['show_hiring_card'] );
        $show_bottom_shape = ( 'yes' === $settings['show_bottom_shape'] );

        // WOW delays cycle: .2s, .4s, .6s, .8s per row
        $wow_delays    = [ '.2s', '.4s', '.6s', '.8s' ];
        // Alternating animation per card position
        $wow_anim      = [ 'fadeInDown', 'fadeInUp', 'fadeInDown', 'fadeInUp', 'fadeInDown', 'fadeInUp', 'fadeInDown', 'fadeInUp' ];

        $hiring_url    = ! empty( $settings['hiring_btn_link']['url'] ) ? $settings['hiring_btn_link']['url'] : '#';
        $hiring_target = ! empty( $settings['hiring_btn_link']['is_external'] ) ? ' target="_blank"' : '';
        $hiring_rel    = ! empty( $settings['hiring_btn_link']['nofollow'] ) ? ' rel="nofollow"' : '';
        ?>
        <!-- wpr team area start -->
        <section class="wpr-team-area mb--16">
            <div class="container">
                <div class="section-inner bg-white border-1">
                    <div class="content-area">

                        <?php if ( ! empty( $settings['bg_shape']['url'] ) ) : ?>
                            <div class="section-bg-shape"><img src="<?php echo esc_url( $settings['bg_shape']['url'] ); ?>" alt=""></div>
                        <?php endif; ?>

                        <!-- Section Header -->
                        <div class="section-title-area center-style">
                            <?php if ( ! empty( $settings['sub_title'] ) ) : ?>
                                <p class="sub-title"><?php echo esc_html( $settings['sub_title'] ); ?></p>
                            <?php endif; ?>
                            <?php if ( ! empty( $settings['section_title'] ) ) : ?>
                                <h2 class="section-title second-font font-semi-bold text-normal quote">
                                    <?php echo nl2br( esc_html( $settings['section_title'] ) ); ?>
                                </h2>
                            <?php endif; ?>
                        </div>

                        <!-- Member Grid -->
                        <div class="section-bottom-inner">
                            <div class="row g-24">
                                <?php
                                $index = 0;
                                foreach ( $members as $member ) :
                                    $index++;
                                    $meta        = $this->get_card_meta( $index );
                                    $down_class  = $meta['down'] ? ' ' . $meta['down'] : '';
                                    $wow_class   = $wow_enabled ? ' wow ' . $wow_anim[ ( $index - 1 ) % 8 ] : '';
                                    $wow_delay   = $wow_enabled ? ' data-wow-delay="' . esc_attr( $wow_delays[ ( $index - 1 ) % 4 ] ) . '"' : '';
                                    $shape_class = $meta['shape_class'];
                                    $shape_img   = get_template_directory_uri() . '/assets/images/team/' . $meta['shape_img'];

                                    $tw_url  = ! empty( $member['member_twitter']['url'] ) ? $member['member_twitter']['url'] : '#';
                                    $li_url  = ! empty( $member['member_linkedin']['url'] ) ? $member['member_linkedin']['url'] : '#';
                                    $gh_url  = ! empty( $member['member_github']['url'] ) ? $member['member_github']['url'] : '#';
                                ?>
                                <div class="col-xl-3 col-md-6<?php echo esc_attr( $wow_class ); ?>"<?php echo $wow_delay; // phpcs:ignore ?>>
                                    <div class="team-wrapper<?php echo esc_attr( $down_class ); ?>">
                                        <div class="image-area">
                                            <img src="<?php echo esc_url( $member['member_image']['url'] ); ?>" alt="<?php echo esc_attr( $member['member_name'] ); ?>">
                                        </div>
                                        <div class="author-area">
                                            <h3 class="title h6"><?php echo esc_html( $member['member_name'] ); ?></h3>
                                            <p class="designation"><?php echo esc_html( $member['member_designation'] ); ?></p>
                                            <div class="social">
                                                <ul>
                                                    <?php if ( ! empty( $settings['icon_twitter']['url'] ) ) : ?>
                                                    <li><a href="<?php echo esc_url( $tw_url ); ?>"><img src="<?php echo esc_url( $settings['icon_twitter']['url'] ); ?>" alt="Twitter"></a></li>
                                                    <?php endif; ?>
                                                    <?php if ( ! empty( $settings['icon_linkedin']['url'] ) ) : ?>
                                                    <li><a href="<?php echo esc_url( $li_url ); ?>"><img src="<?php echo esc_url( $settings['icon_linkedin']['url'] ); ?>" alt="LinkedIn"></a></li>
                                                    <?php endif; ?>
                                                    <?php if ( ! empty( $settings['icon_github']['url'] ) ) : ?>
                                                    <li><a href="<?php echo esc_url( $gh_url ); ?>"><img src="<?php echo esc_url( $settings['icon_github']['url'] ); ?>" alt="GitHub"></a></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="shape <?php echo esc_attr( $shape_class ); ?>">
                                            <img src="<?php echo esc_url( $shape_img ); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                                <!-- Hiring Card -->
                                <?php if ( $show_hiring ) :
                                    $next      = count( $members ) + 1;
                                    $wow_class = $wow_enabled ? ' wow ' . $wow_anim[ ( $next - 1 ) % 8 ] : '';
                                    $wow_delay = $wow_enabled ? ' data-wow-delay="' . esc_attr( $wow_delays[ ( $next - 1 ) % 4 ] ) . '"' : '';
                                ?>
                                <div class="col-xl-3 col-md-6<?php echo esc_attr( $wow_class ); ?>"<?php echo $wow_delay; // phpcs:ignore ?>>
                                    <div class="team-apply-wrapper">
                                        <div class="top-content">
                                            <div class="square-dot"></div>
                                            <h3 class="title h6 text-normal font-semi-bold second-font">
                                                <?php echo nl2br( esc_html( $settings['hiring_title'] ) ); ?>
                                            </h3>
                                            <p class="desc"><?php echo esc_html( $settings['hiring_desc'] ); ?></p>
                                        </div>
                                        <a href="<?php echo esc_url( $hiring_url ); ?>" class="wpr-btn btn-primary with-icon"<?php echo $hiring_target . $hiring_rel; // phpcs:ignore ?>>
                                            <div class="inner">
                                                <div class="icon">
                                                    <?php
                                                    $icon_url = ! empty( $settings['hiring_btn_icon']['url'] ) ? $settings['hiring_btn_icon']['url'] : '';
                                                    for ( $i = 0; $i < 6; $i++ ) :
                                                    ?>
                                                    <span><img src="<?php echo esc_url( $icon_url ); ?>" alt=""></span>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                            <span><?php echo esc_html( $settings['hiring_btn_text'] ); ?></span>
                                        </a>
                                        <?php if ( ! empty( $settings['hiring_grid_shape']['url'] ) ) : ?>
                                            <img src="<?php echo esc_url( $settings['hiring_grid_shape']['url'] ); ?>" alt="" class="shape">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div><!-- .row -->
                        </div>
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
        <!-- wpr team area end -->
        <?php
    }
}