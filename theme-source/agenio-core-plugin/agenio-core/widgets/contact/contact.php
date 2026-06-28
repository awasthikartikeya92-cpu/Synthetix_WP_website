<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Contact_Page_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_contact_page_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Contact Page', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         * CONTACT ITEMS
         * ========================================================= */
        $this->start_controls_section(
            'contact_items_section',
            [
                'label' => esc_html__( 'Contact Items', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'contact_icon',
            [
                'label'   => esc_html__( 'Icon Class', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'fa-regular fa-envelope',
            ]
        );

        $repeater->add_control(
            'contact_title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'E-mail address', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'contact_text',
            [
                'label'   => esc_html__( 'Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'hello@youraiagency.com', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'contact_link',
            [
                'label'       => esc_html__( 'Link', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'mailto:hello@youraiagency.com', 'agenio-core' ),
                'default'     => [
                    'url' => '',
                ],
            ]
        );

        $this->add_control(
            'contact_list',
            [
                'label'       => esc_html__( 'Contact List', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ contact_title }}}',
                'default'     => [

                    [
                        'contact_icon'  => 'fa-regular fa-envelope',
                        'contact_title' => 'E-mail address',
                        'contact_text'  => 'hello@youraiagency.com',
                        'contact_link'  => [
                            'url' => 'mailto:hello@youraiagency.com',
                        ],
                    ],

                    [
                        'contact_icon'  => 'fa-regular fa-headset',
                        'contact_title' => 'Phone number',
                        'contact_text'  => '+1 (647) 555 0172',
                        'contact_link'  => [
                            'url' => 'tel:+16475550172',
                        ],
                    ],

                    [
                        'contact_icon'  => 'fa-regular fa-location-dot',
                        'contact_title' => 'Our Location',
                        'contact_text'  => 'USA, New York – 1060 Str.',
                        'contact_link'  => [
                            'url' => '',
                        ],
                    ],

                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         * MAP SECTION
         * ========================================================= */
        $this->start_controls_section(
            'map_section',
            [
                'label' => esc_html__( 'Google Map', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'map_iframe',
            [
                'label'       => esc_html__( 'Google Map Embed Code', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'rows'        => 10,
                'default'     => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d317859.6089702069!2d-0.075949!3d51.508112!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760349331f38dd%3A0xa8bf49dde1d56467!2sTower%20of%20London!5e0!3m2!1sen!2sus!4v1719221598456!5m2!1sen!2sus" height="660" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'description' => esc_html__( 'Paste Google Map iframe embed code here.', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        ?>

        <!-- wpr contact area start -->
        <section class="wpr-get-in-touch inner mb--16">
            <div class="container">

                <div class="section-inner border-1 square-dot">

                    <div class="row g-5 mb--60">

                        <?php
                        $delay = 0;

                        if ( ! empty( $settings['contact_list'] ) ) :
                            foreach ( $settings['contact_list'] as $item ) :

                                $target   = ! empty( $item['contact_link']['is_external'] ) ? ' target="_blank"' : '';
                                $nofollow = ! empty( $item['contact_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                        ?>

                        <div class="col-lg-4 col-md-6 col-sm-6 md-mb-24">

                            <div 
                                class="box-contact-item text-center effectFade fadeUp"
                                <?php if ( $delay > 0 ) : ?>
                                    data-delay="<?php echo esc_attr( $delay ); ?>"
                                <?php endif; ?>
                            >

                                <?php if ( ! empty( $item['contact_icon'] ) ) : ?>
                                    <i class="icon <?php echo esc_attr( $item['contact_icon'] ); ?>"></i>
                                <?php endif; ?>

                                <?php if ( ! empty( $item['contact_title'] ) ) : ?>
                                    <h2 class="h6 title fw-semibold">
                                        <?php echo esc_html( $item['contact_title'] ); ?>
                                    </h2>
                                <?php endif; ?>

                                <?php if ( ! empty( $item['contact_link']['url'] ) ) : ?>

                                    <a 
                                        class="text"
                                        href="<?php echo esc_url( $item['contact_link']['url'] ); ?>"
                                        <?php echo $target . $nofollow; ?>
                                    >
                                        <?php echo esc_html( $item['contact_text'] ); ?>
                                    </a>

                                <?php else : ?>

                                    <p class="text">
                                        <?php echo esc_html( $item['contact_text'] ); ?>
                                    </p>

                                <?php endif; ?>

                            </div>

                        </div>

                        <?php
                                $delay += 0.1;
                            endforeach;
                        endif;
                        ?>

                    </div>

                    <!-- map -->
                    <?php if ( ! empty( $settings['map_iframe'] ) ) : ?>
                        <div class="wpr-map box-contact-item">
                            <?php echo $settings['map_iframe']; ?>
                        </div>
                    <?php endif; ?>

                    <span class="square-shape top-left"></span>
                    <span class="square-shape top-right"></span>
                    <span class="square-shape bottom-left"></span>
                    <span class="square-shape bottom-right"></span>

                </div>

            </div>
        </section>
        <!-- wpr contact area end -->

        <?php
    }
}