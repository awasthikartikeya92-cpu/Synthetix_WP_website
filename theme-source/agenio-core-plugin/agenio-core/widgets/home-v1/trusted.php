<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Trusted_By_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_trusted_by_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Trusted By', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-image-gallery';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  LEFT TEXT SECTION
         * ========================================================= */
        $this->start_controls_section(
            'left_text_section',
            [
                'label' => esc_html__( 'Left Text', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'left_text',
            [
                'label'   => esc_html__( 'Left Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "//WE'VE \n TRUSTED BY", 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  BRAND LOGOS REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'brands_section',
            [
                'label' => esc_html__( 'Brand Logos', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'brand_logo',
            [
                'label'   => esc_html__( 'Brand Logo', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/brand/01.svg',
                ],
            ]
        );

        $repeater->add_control(
            'brand_alt',
            [
                'label'   => esc_html__( 'Alt Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Brand Logo', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'brands_list',
            [
                'label'       => esc_html__( 'Brands', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ brand_alt }}}',
                'default'     => [
                    [ 'brand_logo' => [ 'url' => get_template_directory_uri() . '/assets/images/brand/01.svg' ], 'brand_alt' => 'Brand 01' ],
                    [ 'brand_logo' => [ 'url' => get_template_directory_uri() . '/assets/images/brand/02.svg' ], 'brand_alt' => 'Brand 02' ],
                    [ 'brand_logo' => [ 'url' => get_template_directory_uri() . '/assets/images/brand/03.svg' ], 'brand_alt' => 'Brand 03' ],
                    [ 'brand_logo' => [ 'url' => get_template_directory_uri() . '/assets/images/brand/04.svg' ], 'brand_alt' => 'Brand 04' ],
                    [ 'brand_logo' => [ 'url' => get_template_directory_uri() . '/assets/images/brand/05.svg' ], 'brand_alt' => 'Brand 05' ],
                    [ 'brand_logo' => [ 'url' => get_template_directory_uri() . '/assets/images/brand/06.svg' ], 'brand_alt' => 'Brand 06' ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $brands   = $settings['brands_list'];
        // Double the brands for seamless marquee loop
        $marquee_brands = array_merge( $brands, $brands );
        ?>
        <!-- wpr brand area start -->
        <div class="wpr-brand-area mb--16">
            <div class="container">
                <div class="section-inner square-dot">
                    <div class="left-text">
                        <p><?php echo nl2br( esc_html( $settings['left_text'] ) ); ?></p>
                    </div>
                    <div class="right-marquee-area">
                        <div class="brand-inner">
                            <?php foreach ( $marquee_brands as $brand ) : ?>
                                <div class="brand-wrapper">
                                    <img src="<?php echo esc_url( $brand['brand_logo']['url'] ); ?>" alt="<?php echo esc_attr( $brand['brand_alt'] ); ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <span class="square-shape top-left"></span>
                    <span class="square-shape bottom-left"></span>
                    <span class="square-shape top-right"></span>
                    <span class="square-shape bottom-right"></span>
                </div>
            </div>
        </div>
        <!-- wpr brand area end -->
        <?php
    }
}