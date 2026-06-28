<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Testimonials_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_testimonials_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Testimonials', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  TESTIMONIALS REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'testimonials_section',
            [
                'label' => esc_html__( 'Testimonials', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'testimonial_image',
            [
                'label'   => esc_html__( 'Author Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/testimonials/01.webp',
                ],
            ]
        );

        $repeater->add_control(
            'testimonial_title',
            [
                'label'   => esc_html__( 'Review Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Beyond expectations', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'testimonial_quote',
            [
                'label'   => esc_html__( 'Quote', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( '"Working with this team completely transformed how we present our product. Their attention to detail and understanding of user experience helped us increase engagement beyond expectations."', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'author_name',
            [
                'label'   => esc_html__( 'Author Name', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Daniel Lewis', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'author_role',
            [
                'label'   => esc_html__( 'Author Role / Company', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Founder, Lunaris Coffee Co.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'testimonials_list',
            [
                'label'       => esc_html__( 'Testimonials', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ author_name }}}',
                'default'     => [
                    [
                        'testimonial_image' => [ 'url' => get_template_directory_uri() . '/assets/images/testimonials/01.webp' ],
                        'testimonial_title' => 'Beyond expectations',
                        'testimonial_quote' => '"Working with this team completely transformed how we present our product. Their attention to detail and understanding of user experience helped us increase engagement beyond expectations."',
                        'author_name'       => 'Daniel Lewis',
                        'author_role'       => 'Founder, Lunaris Coffee Co.',
                    ],
                    [
                        'testimonial_image' => [ 'url' => get_template_directory_uri() . '/assets/images/testimonials/02.webp' ],
                        'testimonial_title' => 'Professional experience',
                        'testimonial_quote' => '"They delivered a sophisticated, modern brand that aligns perfectly with our values. Communication was seamless from start to finish — truly a professional experience."',
                        'author_name'       => 'Michael Roberts',
                        'author_role'       => 'CEO, Axis Legal Group',
                    ],
                    [
                        'testimonial_image' => [ 'url' => get_template_directory_uri() . '/assets/images/testimonials/03.webp' ],
                        'testimonial_title' => 'Genuinely love',
                        'testimonial_quote' => '"Their design process is smart, collaborative, and strategic. They understood our vision quickly and turned it into a product our users genuinely love."',
                        'author_name'       => 'Jason Ward',
                        'author_role'       => 'Product Manager, Brightly Studio',
                    ],
                ],
            ]
        );

        $this->add_control(
            'loop_slides',
            [
                'label'        => esc_html__( 'Loop / Duplicate Slides', 'agenio-core' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'agenio-core' ),
                'label_off'    => esc_html__( 'No', 'agenio-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'description'  => esc_html__( 'Duplicates slides so the carousel loops seamlessly (matches original HTML behaviour).', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  DECORATIVE SHAPE
         * ========================================================= */
        $this->start_controls_section(
            'shape_section',
            [
                'label' => esc_html__( 'Decorative Shape', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'top_left_shape',
            [
                'label'   => esc_html__( 'Top Left Shape', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/testimonials/top-left-shape.svg',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $items      = $settings['testimonials_list'];
        $loop       = ( 'yes' === $settings['loop_slides'] );
        // Duplicate slides for the seamless loop — matching original HTML
        $slides     = $loop ? array_merge( $items, $items ) : $items;
        ?>
        <!-- wpr testimonials area start -->
        <section class="wpr-testimonials-area mb--16">
            <div class="container">
                <div class="section-inner border-1">

                    <!-- Image Slider -->
                    <div class="swiper testimonials-image-slider">
                        <div class="swiper-wrapper">
                            <?php foreach ( $slides as $slide ) : ?>
                            <div class="swiper-slide">
                                <div class="image-area">
                                    <img src="<?php echo esc_url( $slide['testimonial_image']['url'] ); ?>"
                                         alt="<?php echo esc_attr( $slide['author_name'] ); ?>">
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Content Slider -->
                    <div class="swiper testimonials-content-slider">
                        <div class="swiper-wrapper">
                            <?php foreach ( $slides as $slide ) : ?>
                            <div class="swiper-slide">
                                <div class="testimonials-content">
                                    <div class="top">
                                        <?php if ( ! empty( $slide['testimonial_title'] ) ) : ?>
                                            <h2 class="title h5"><?php echo esc_html( $slide['testimonial_title'] ); ?></h2>
                                        <?php endif; ?>
                                        <?php if ( ! empty( $slide['testimonial_quote'] ) ) : ?>
                                            <p class="desc"><?php echo esc_html( $slide['testimonial_quote'] ); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="author-area">
                                        <h3 class="h6"><?php echo esc_html( $slide['author_name'] ); ?></h3>
                                        <p><?php echo esc_html( $slide['author_role'] ); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="swiper-navigation">
                        <div class="swiper-btn swiper-btn-prev">
                            <svg width="17" height="30" viewBox="0 0 17 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.6094 0L0.859375 13.75L0 14.6484L0.859375 15.5469L14.6094 29.2969L16.4062 27.5L3.55469 14.6484L16.4062 1.79688L14.6094 0Z" fill="#F9FAFB" />
                            </svg>
                        </div>
                        <div class="swiper-btn swiper-btn-next">
                            <svg width="17" height="30" viewBox="0 0 17 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.79688 0L0 1.79688L12.8516 14.6484L0 27.5L1.79688 29.2969L15.5469 15.5469L16.4062 14.6484L15.5469 13.75L1.79688 0Z" fill="#F9FAFB" />
                            </svg>
                        </div>
                    </div>

                    <!-- Decorative Shape -->
                    <?php if ( ! empty( $settings['top_left_shape']['url'] ) ) : ?>
                    <div class="top-left-shape">
                        <img src="<?php echo esc_url( $settings['top_left_shape']['url'] ); ?>" alt="">
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </section>
        <!-- wpr testimonials area end -->
        <?php
    }
}