<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Awards_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_awards_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Awards', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-trophy';
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
                'default' => esc_html__( 'AWARDS', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Section Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Design That Gets Noticed', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  AWARD ITEMS REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'awards_section',
            [
                'label' => esc_html__( 'Award Items', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'award_date',
            [
                'label'   => esc_html__( 'Date', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'March 2025', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'award_title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "Awwwards – Site of the Day\nNovaPay", 'agenio-core' ),
                'description' => esc_html__( 'Use a new line for the second line of the title.', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'award_desc',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Our redesign for NovaPay App was recognized for its seamless user flow, bold visual storytelling, and innovative motion design that set a new standard for fintech experiences.', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'award_image',
            [
                'label'   => esc_html__( 'Award Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/awards/01.webp',
                ],
            ]
        );

        $repeater->add_control(
            'award_image_width',
            [
                'label'   => esc_html__( 'Image Width (px)', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 306,
            ]
        );

        $repeater->add_control(
            'is_active',
            [
                'label'        => esc_html__( 'Open by Default', 'agenio-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'agenio-core' ),
                'label_off'    => esc_html__( 'No', 'agenio-core' ),
                'return_value' => 'yes',
                'default'      => '',
            ]
        );

        $this->add_control(
            'awards_list',
            [
                'label'       => esc_html__( 'Awards', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ award_date }}}',
                'default'     => [
                    [
                        'award_date'        => 'March 2025',
                        'award_title'       => "Awwwards – Site of the Day\nNovaPay",
                        'award_desc'        => 'Our redesign for NovaPay App was recognized for its seamless user flow, bold visual storytelling, and innovative motion design that set a new standard for fintech experiences.',
                        'award_image'       => [ 'url' => get_template_directory_uri() . '/assets/images/awards/01.webp' ],
                        'award_image_width' => 306,
                        'is_active'         => 'yes',
                    ],
                    [
                        'award_date'        => 'January 2025',
                        'award_title'       => "Behance - Featured in UX/UI Design\nMuse Art Fair",
                        'award_desc'        => 'The Muse Art Fair 2024 campaign was featured for its clean typography, dynamic layout, and cohesive brand system across digital and print platforms.',
                        'award_image'       => [ 'url' => get_template_directory_uri() . '/assets/images/awards/02.webp' ],
                        'award_image_width' => 306,
                        'is_active'         => '',
                    ],
                    [
                        'award_date'        => 'October 2024',
                        'award_title'       => "CSS Design Awards - Best UI Design\nLunaris Coffee Co.",
                        'award_desc'        => 'Our work for Lunaris Coffee Co. earned recognition for intuitive structure, refined color palettes, and elevated product presentation that enhanced user engagement.',
                        'award_image'       => [ 'url' => get_template_directory_uri() . '/assets/images/awards/03.webp' ],
                        'award_image_width' => 306,
                        'is_active'         => '',
                    ],
                    [
                        'award_date'        => 'October 2024',
                        'award_title'       => "Webby Awards - Honoree\nAxis Legal Group",
                        'award_desc'        => 'The Axis Legal Group website was awarded for its sophisticated simplicity, balancing professional tone with a modern, responsive digital experience.',
                        'award_image'       => [ 'url' => get_template_directory_uri() . '/assets/images/awards/04.webp' ],
                        'award_image_width' => 306,
                        'is_active'         => '',
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
        $awards            = $settings['awards_list'];
        $show_bottom_shape = ( 'yes' === $settings['show_bottom_shape'] );
        ?>
        <!-- wpr awards area start -->
        <section class="wpr-awards-area mb--16">
            <div class="container">
                <div class="section-inner bg-white border-1">

                    <!-- Section Header -->
                    <div class="section-title-area">
                        <?php if ( ! empty( $settings['sub_title'] ) ) : ?>
                            <p class="sub-title"><?php echo esc_html( $settings['sub_title'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( ! empty( $settings['section_title'] ) ) : ?>
                            <h2 class="section-title second-font font-semi-bold text-normal wpr-text-anime-style-1">
                                <?php echo nl2br( esc_html( $settings['section_title'] ) ); ?>
                            </h2>
                        <?php endif; ?>
                    </div>

                    <!-- Awards Accordion -->
                    <div class="award-accordion-area">
                        <?php foreach ( $awards as $award ) :
                            $active_class = ( 'yes' === $award['is_active'] ) ? ' active' : '';
                            // Split title on newline for the <br> in the heading
                            $title_lines  = array_map( 'trim', explode( "\n", $award['award_title'] ) );
                            $title_html   = implode( '<br>', array_map( 'esc_html', $title_lines ) );
                        ?>
                        <div class="award-item<?php echo esc_attr( $active_class ); ?>">
                            <div class="award-header">
                                <div class="left">
                                    <div class="date"><?php echo esc_html( $award['award_date'] ); ?></div>
                                    <div class="content">
                                        <h3 class="h6 title"><?php echo $title_html; // phpcs:ignore WordPress.Security.EscapeOutput -- escaped above via esc_html per line ?></h3>
                                        <p class="desc"><?php echo esc_html( $award['award_desc'] ); ?></p>
                                    </div>
                                </div>
                                <div class="toggle">
                                    <span class="plus">+</span>
                                    <span class="minus">-</span>
                                </div>
                            </div>
                            <?php if ( ! empty( $award['award_image']['url'] ) ) : ?>
                            <div class="image-area">
                                <img src="<?php echo esc_url( $award['award_image']['url'] ); ?>"
                                     width="<?php echo absint( $award['award_image_width'] ); ?>"
                                     alt="<?php echo esc_attr( $title_lines[0] ?? '' ); ?>">
                            </div>
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
        <!-- wpr awards area end -->
        <?php
    }
}