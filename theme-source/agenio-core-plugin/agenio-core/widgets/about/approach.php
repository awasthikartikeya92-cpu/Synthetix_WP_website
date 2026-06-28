<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Our_Approach_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_our_approach_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Our Approach', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-flow';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         * LEFT CONTENT
         * ========================================================= */
        $this->start_controls_section(
            'left_content_section',
            [
                'label' => esc_html__( 'Left Content', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'   => esc_html__( 'Sub Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Our Approach', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Section Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Expertise\nin Strategy, \nDesign and Development",
            ]
        );

        $this->add_control(
            'description',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'The digital agency work process may vary depending on the specific project and client needs, but typically follows these basic steps. It is a collaborative and iterative process.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'   => esc_html__( 'Button Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Explore Our Service', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label'       => esc_html__( 'Button URL', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'agenio-core' ),
                'default'     => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'button_arrow_icon',
            [
                'label'   => esc_html__( 'Button Arrow Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/icon/button-arrow.svg',
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         * APPROACH ITEMS
         * ========================================================= */
        $this->start_controls_section(
            'approach_items_section',
            [
                'label' => esc_html__( 'Approach Items', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'approach_title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Discover & Define', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'approach_description',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Based on the information gathered during discovery the agency will develop a customized audience.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'approach_list',
            [
                'label'       => esc_html__( 'Approach List', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ approach_title }}}',
                'default'     => [

                    [
                        'approach_title'       => 'Discover & Define',
                        'approach_description' => 'Based on the information gathered during discovery the agency will develop a customized audience.',
                    ],

                    [
                        'approach_title'       => 'Concept & Strategy',
                        'approach_description' => 'Based on insights uncovered during discovery, the agency defines a clear strategic direction.',
                    ],

                    [
                        'approach_title'       => 'Design & Develop',
                        'approach_description' => 'Based on the finalized strategy, develops functional and optimized digital experiences.',
                    ],

                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $target   = $settings['button_url']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['button_url']['nofollow'] ? ' rel="nofollow"' : '';

        ?>

        <!-- our approch area start -->
        <div class="our-approch-area-style-one mb--16">

            <div class="container">

                <div class="section-inner bg-white square-dot">

                    <div class="row">

                        <div class="col-lg-7">

                            <!-- approach area left start -->
                            <div class="approch-area-left">

                                <div class="section-title-area">

                                    <?php if ( ! empty( $settings['sub_title'] ) ) : ?>
                                        <p class="sub-title">
                                            <?php echo esc_html( $settings['sub_title'] ); ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if ( ! empty( $settings['section_title'] ) ) : ?>
                                        <h2 class="section-title second-font font-semi-bold text-normal quote">
                                            <?php echo nl2br( esc_html( $settings['section_title'] ) ); ?>
                                        </h2>
                                    <?php endif; ?>

                                </div>

                                <?php if ( ! empty( $settings['description'] ) ) : ?>
                                    <p class="disc">
                                        <?php echo nl2br( esc_html( $settings['description'] ) ); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ( ! empty( $settings['button_text'] ) ) : ?>

                                    <a 
                                        href="<?php echo esc_url( $settings['button_url']['url'] ); ?>"
                                        class="wpr-btn btn-primary with-icon"
                                        <?php echo $target . $nofollow; ?>
                                    >

                                        <div class="inner">

                                            <div class="icon">

                                                <?php for ( $i = 0; $i < 6; $i++ ) : ?>

                                                    <span>

                                                        <?php if ( ! empty( $settings['button_arrow_icon']['url'] ) ) : ?>
                                                            <img 
                                                                src="<?php echo esc_url( $settings['button_arrow_icon']['url'] ); ?>" 
                                                                alt=""
                                                            >
                                                        <?php endif; ?>

                                                    </span>

                                                <?php endfor; ?>

                                            </div>

                                        </div>

                                        <?php echo esc_html( $settings['button_text'] ); ?>

                                    </a>

                                <?php endif; ?>

                            </div>
                            <!-- approach area left end -->

                        </div>

                        <div class="col-lg-5 rts-slide-left-gsap mt_sm--30">

                            <?php
                            if ( ! empty( $settings['approach_list'] ) ) :

                                $count = 1;

                                foreach ( $settings['approach_list'] as $item ) :

                                    $class = '';

                                    if ( $count == 2 ) {
                                        $class = 'two';
                                    } elseif ( $count == 3 ) {
                                        $class = 'three mb--0';
                                    }
                            ?>

                            <!-- single approch area start -->
                            <div class="single-approach-area-start <?php echo esc_attr( $class ); ?>">

                                <div class="left-area">

                                    <?php if ( ! empty( $item['approach_title'] ) ) : ?>
                                        <h3 class="title">
                                            <?php echo esc_html( $item['approach_title'] ); ?>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if ( ! empty( $item['approach_description'] ) ) : ?>
                                        <p class="disc">
                                            <?php echo nl2br( esc_html( $item['approach_description'] ) ); ?>
                                        </p>
                                    <?php endif; ?>

                                </div>

                            </div>
                            <!-- single approch area end -->

                            <?php
                                    $count++;
                                endforeach;

                            endif;
                            ?>

                        </div>

                    </div>

                    <span class="square-shape top-left"></span>
                    <span class="square-shape bottom-left"></span>
                    <span class="square-shape top-right"></span>
                    <span class="square-shape bottom-right"></span>

                </div>

            </div>

        </div>
        <!-- our approch area end -->

        <?php
    }
}