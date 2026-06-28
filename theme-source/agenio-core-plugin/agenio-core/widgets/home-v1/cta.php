<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Cta_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_cta_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio CTA', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  SECTION TITLE
         * ========================================================= */
        $this->start_controls_section(
            'title_section',
            [
                'label' => esc_html__( 'Title', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'cta_title',
            [
                'label'   => esc_html__( 'CTA Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "LET's start\nyour project", 'agenio-core' ),
            ]
        );

        $this->add_control(
            'cta_logo',
            [
                'label'   => esc_html__( 'Logo', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/cta/cta-logo.svg',
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  ARROW TRACKS
         * ========================================================= */
        $this->start_controls_section(
            'arrows_section',
            [
                'label' => esc_html__( 'Arrow Tracks', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'arrow_right_icon',
            [
                'label'       => esc_html__( 'Right Track Arrow Image', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'default'     => [
                    'url' => get_template_directory_uri() . '/assets/images/cta/arrow-left.svg',
                ],
                'description' => esc_html__( 'Used for the right-side arrow track (pointing left in original).', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'arrow_left_icon',
            [
                'label'       => esc_html__( 'Left Track Arrow Image', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'default'     => [
                    'url' => get_template_directory_uri() . '/assets/images/cta/arrow-right.svg',
                ],
                'description' => esc_html__( 'Used for the left-side arrow track (pointing right in original).', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'arrow_count',
            [
                'label'   => esc_html__( 'Arrows Per Track', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 10,
                'default' => 3,
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  BOTTOM SHAPE AREA
         * ========================================================= */
        $this->start_controls_section(
            'bottom_section',
            [
                'label' => esc_html__( 'Bottom Shape Area', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bottom_graphic',
            [
                'label'   => esc_html__( 'Bottom Graphic', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/cta/graphic.svg',
                ],
            ]
        );

        $this->add_control(
            'tag_left',
            [
                'label'   => esc_html__( 'Left Tag Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'IMPACTFUL CREATIVE', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'tag_right',
            [
                'label'   => esc_html__( 'Right Tag Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'GLOBAL SUPPORT', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  BACKGROUND SHAPE
         * ========================================================= */
        $this->start_controls_section(
            'bg_shape_section',
            [
                'label' => esc_html__( 'Background Shape', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_grid_shape',
            [
                'label'   => esc_html__( 'Background Grid Shape', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/cta/grid.svg',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings    = $this->get_settings_for_display();
        $arrow_count = absint( $settings['arrow_count'] );
        ?>
        <!-- wpr cta area start -->
        <section class="wpr-cta-area">
            <div class="container">
                <div class="section-inner border-1">

                    <div class="section-title-area">
                        <?php if ( ! empty( $settings['cta_title'] ) ) : ?>
                            <h2 class="section-title"><?php echo nl2br( esc_html( $settings['cta_title'] ) ); ?></h2>
                        <?php endif; ?>

                        <?php if ( ! empty( $settings['cta_logo']['url'] ) ) : ?>
                            <div class="logo">
                                <img src="<?php echo esc_url( $settings['cta_logo']['url'] ); ?>" alt="">
                            </div>
                        <?php endif; ?>

                        <!-- Right arrow track -->
                        <?php if ( ! empty( $settings['arrow_right_icon']['url'] ) ) : ?>
                        <div class="arrow-track right">
                            <?php for ( $i = 0; $i < $arrow_count; $i++ ) : ?>
                                <div class="arrow">
                                    <img src="<?php echo esc_url( $settings['arrow_right_icon']['url'] ); ?>" alt="">
                                </div>
                            <?php endfor; ?>
                        </div>
                        <?php endif; ?>

                        <!-- Left arrow track -->
                        <?php if ( ! empty( $settings['arrow_left_icon']['url'] ) ) : ?>
                        <div class="arrow-track left">
                            <?php for ( $i = 0; $i < $arrow_count; $i++ ) : ?>
                                <div class="arrow">
                                    <img src="<?php echo esc_url( $settings['arrow_left_icon']['url'] ); ?>" alt="">
                                </div>
                            <?php endfor; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <?php if ( ! empty( $settings['bg_grid_shape']['url'] ) ) : ?>
                        <div class="bg-shape">
                            <img src="<?php echo esc_url( $settings['bg_grid_shape']['url'] ); ?>" alt="">
                        </div>
                    <?php endif; ?>

                    <div class="section-bottom-shape">
                        <?php if ( ! empty( $settings['bottom_graphic']['url'] ) ) : ?>
                            <img src="<?php echo esc_url( $settings['bottom_graphic']['url'] ); ?>" alt="">
                        <?php endif; ?>
                        <?php if ( ! empty( $settings['tag_left'] ) ) : ?>
                            <span class="tag left"><?php echo esc_html( $settings['tag_left'] ); ?></span>
                        <?php endif; ?>
                        <?php if ( ! empty( $settings['tag_right'] ) ) : ?>
                            <span class="tag right"><?php echo esc_html( $settings['tag_right'] ); ?></span>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </section>
        <!-- wpr cta area end -->
        <?php
    }
}