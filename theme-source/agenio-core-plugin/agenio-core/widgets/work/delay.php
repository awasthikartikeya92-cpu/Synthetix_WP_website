<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* =============================================================================
 *  DELAY STATS SECTION
 * ============================================================================= */

class Elementor_Agenio_Delay_Stats_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_delay_stats_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Delay Stats', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-bar-chart';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  HEADING
         * ========================================================= */
        $this->start_controls_section(
            'heading_section',
            [
                'label' => esc_html__( 'Heading', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'   => esc_html__( 'Badge / Sub Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Why Delay Hurts', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Section Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "The longer you wait, \n the harder it is to catch up.", 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  STATS ROWS REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'stats_section',
            [
                'label' => esc_html__( 'Stats Rows', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'stat_index',
            [
                'label'   => esc_html__( 'Index', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '/ 01',
            ]
        );

        $repeater->add_control(
            'stat_title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Manual Operations Slow Progress', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'stat_suffix',
            [
                'label'   => esc_html__( 'Suffix Label', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '/Workload',
            ]
        );

        $repeater->add_control(
            'stat_pct',
            [
                'label'   => esc_html__( 'Percentage', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 80,
                'min'     => 0,
                'max'     => 100,
            ]
        );

        $repeater->add_control(
            'stat_aria_label',
            [
                'label'   => esc_html__( 'Aria Label', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Manual operations workload', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'stats_list',
            [
                'label'       => esc_html__( 'Stats', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ stat_index }}} {{{ stat_title }}}',
                'default'     => [
                    [
                        'stat_index'      => '/ 01',
                        'stat_title'      => 'Manual Operations Slow Progress',
                        'stat_suffix'     => '/Workload',
                        'stat_pct'        => 80,
                        'stat_aria_label' => 'Manual operations workload',
                    ],
                    [
                        'stat_index'      => '/ 02',
                        'stat_title'      => 'Competitors Outpace Innovation',
                        'stat_suffix'     => '/Growth',
                        'stat_pct'        => 65,
                        'stat_aria_label' => 'Competitor growth pace',
                    ],
                    [
                        'stat_index'      => '/ 03',
                        'stat_title'      => 'Automation Potential Remains Untapped',
                        'stat_suffix'     => '/Opportunities',
                        'stat_pct'        => 70,
                        'stat_aria_label' => 'Automation opportunities',
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
            'bottom_shape',
            [
                'label'   => esc_html__( 'Bottom Shape Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/about/shape-02.svg' ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- wpr delay stats area start -->
        <section class="wpr-delay-stats-area mb--16">
            <div class="container">
                <div class="section-inner bg-white border-1">

                    <!-- Heading -->
                    <div class="section-top-area">
                        <div class="section-title-area center-style">
                            <p class="sub-title delay-stats-badge"><?php echo esc_html( $settings['sub_title'] ); ?></p>
                            <h2 class="section-title second-font font-semi-bold text-normal">
                                <?php echo nl2br( esc_html( $settings['section_title'] ) ); ?>
                            </h2>
                        </div>
                    </div>

                    <!-- Stats Rows -->
                    <div class="section-mid-area">
                        <div class="delay-stats-rows">
                            <?php foreach ( $settings['stats_list'] as $stat ) : ?>
                            <div class="delay-stats-row">
                                <div class="delay-stats-label">
                                    <span class="index"><?php echo esc_html( $stat['stat_index'] ); ?></span>
                                    <h3 class="title second-font font-semi-bold"><?php echo esc_html( $stat['stat_title'] ); ?></h3>
                                </div>
                                <div class="delay-stats-bar-column">
                                    <div class="top">
                                        <span class="suffix"><?php echo esc_html( $stat['stat_suffix'] ); ?></span>
                                        <span class="pct"><?php echo esc_html( $stat['stat_pct'] ); ?>%</span>
                                    </div>
                                    <div class="delay-stats-track">
                                        <div class="delay-stats-fill"
                                            role="progressbar"
                                            aria-label="<?php echo esc_attr( $stat['stat_aria_label'] ); ?>"
                                            aria-valuemin="0"
                                            aria-valuemax="100"
                                            aria-valuenow="<?php echo esc_attr( $stat['stat_pct'] ); ?>"
                                            data-progress="<?php echo esc_attr( $stat['stat_pct'] ); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>

                <!-- Bottom Shape -->
                <div class="bottom-shape-area bg-white square-dot">
                    <img src="<?php echo esc_url( $settings['bottom_shape']['url'] ); ?>" alt="">
                    <span class="square-shape top-left"></span>
                    <span class="square-shape bottom-left"></span>
                    <span class="square-shape top-right"></span>
                    <span class="square-shape bottom-right"></span>
                </div>

            </div>
        </section>
        <!-- wpr delay stats area end -->
        <?php
    }
}