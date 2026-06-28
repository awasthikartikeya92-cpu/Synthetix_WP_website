<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Marquee_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_marquee_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Marquee', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-text-area';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  ROW 1 — SCROLLING RIGHT
         * ========================================================= */
        $this->start_controls_section(
            'row1_section',
            [
                'label' => esc_html__( 'Row 1 (Scrolls Right)', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'row1_text',
            [
                'label'   => esc_html__( 'Marquee Word', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Innovative', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'row1_icon',
            [
                'label'   => esc_html__( 'Separator Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/icon/black-right.svg',
                ],
            ]
        );

        $this->add_control(
            'row1_repeat',
            [
                'label'   => esc_html__( 'Repeat Count', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 3,
                'max'     => 30,
                'default' => 18,
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  ROW 2 — SCROLLING LEFT
         * ========================================================= */
        $this->start_controls_section(
            'row2_section',
            [
                'label' => esc_html__( 'Row 2 (Scrolls Left)', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'row2_text',
            [
                'label'   => esc_html__( 'Marquee Word', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Visionary', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'row2_icon',
            [
                'label'   => esc_html__( 'Separator Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/icon/black-left.svg',
                ],
            ]
        );

        $this->add_control(
            'row2_repeat',
            [
                'label'   => esc_html__( 'Repeat Count', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 3,
                'max'     => 30,
                'default' => 18,
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $r1_count = absint( $settings['row1_repeat'] );
        $r2_count = absint( $settings['row2_repeat'] );
        ?>
        <!-- wpr marquee area start -->
        <section class="wpr-marquee-area mb--16">
            <div class="container">
                <div class="section-inner overflow-hidden border-1">

                    <!-- Row 1 — scrolls right -->
                    <div class="text-wrapper first-text">
                        <div class="text-split scrollingtext-1">
                            <h2 class="title">
                                <?php for ( $i = 0; $i < $r1_count; $i++ ) : ?>
                                    <?php echo esc_html( $settings['row1_text'] ); ?>
                                    <?php if ( ! empty( $settings['row1_icon']['url'] ) ) : ?>
                                        <span><img src="<?php echo esc_url( $settings['row1_icon']['url'] ); ?>" alt=""></span>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </h2>
                        </div>
                    </div>

                    <!-- Row 2 — scrolls left -->
                    <div class="text-wrapper">
                        <div class="text-split scrollingtext-2">
                            <h2 class="title">
                                <?php for ( $i = 0; $i < $r2_count; $i++ ) : ?>
                                    <?php echo esc_html( $settings['row2_text'] ); ?>
                                    <?php if ( ! empty( $settings['row2_icon']['url'] ) ) : ?>
                                        <span><img src="<?php echo esc_url( $settings['row2_icon']['url'] ); ?>" alt=""></span>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </h2>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- wpr marquee area end -->
        <?php
    }
}