<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Contact_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_contact_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Contact', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  CONTACT INFO SECTION
         * ========================================================= */
        $this->start_controls_section(
            'contact_info_section',
            [
                'label' => esc_html__( 'Contact Info', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'contact_sub_title',
            [
                'label'   => esc_html__( 'Sub Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'CONTACT', 'agenio-core' ),
            ]
        );

        // Contact Links Repeater
        $contact_repeater = new \Elementor\Repeater();

        $contact_repeater->add_control(
            'contact_link_text',
            [
                'label'   => esc_html__( 'Link Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'hello@agenio.com', 'agenio-core' ),
            ]
        );

        $contact_repeater->add_control(
            'contact_link_url',
            [
                'label'   => esc_html__( 'Link URL', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ]
        );

        $this->add_control(
            'contact_links',
            [
                'label'       => esc_html__( 'Contact Links', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $contact_repeater->get_controls(),
                'title_field' => '{{{ contact_link_text }}}',
                'default'     => [
                    [ 'contact_link_text' => 'hello@agenio.com',  'contact_link_url' => [ 'url' => 'mailto:hello@agenio.com' ] ],
                    [ 'contact_link_text' => '(+1) 123 456-7890', 'contact_link_url' => [ 'url' => 'tel:+11234567890' ] ],
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  OFFICES SECTION
         * ========================================================= */
        $this->start_controls_section(
            'offices_section',
            [
                'label' => esc_html__( 'Offices', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'offices_sub_title',
            [
                'label'   => esc_html__( 'Sub Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'OFFFICES', 'agenio-core' ),
            ]
        );

        // Offices Repeater
        $offices_repeater = new \Elementor\Repeater();

        $offices_repeater->add_control(
            'office_city',
            [
                'label'   => esc_html__( 'City', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Montréal', 'agenio-core' ),
            ]
        );

        $offices_repeater->add_control(
            'office_address',
            [
                'label'   => esc_html__( 'Address', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "4200 Saint Laurent Blvd, Suite 305\nMontreal, QC H2W 2R2\nCanada", 'agenio-core' ),
            ]
        );

        $this->add_control(
            'offices_list',
            [
                'label'       => esc_html__( 'Offices', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $offices_repeater->get_controls(),
                'title_field' => '{{{ office_city }}}',
                'default'     => [
                    [
                        'office_city'    => 'Montréal',
                        'office_address' => "4200 Saint Laurent Blvd, Suite 305\nMontreal, QC H2W 2R2\nCanada",
                    ],
                    [
                        'office_city'    => 'Texas',
                        'office_address' => "1920 McKinney Avenue, 7th Floor\nDallas, TX 75201\nUnited States",
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  CONTACT FORM SECTION
         * ========================================================= */
        $this->start_controls_section(
            'form_section',
            [
                'label' => esc_html__( 'Contact Form', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'cf7_shortcode',
            [
                'label'       => esc_html__( 'CF7 Shortcode', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '',
                'placeholder' => '[contact-form-7 id="0e27dd5" title="Footer Form"]',
                'description' => esc_html__( 'Paste your Contact Form 7 shortcode here.', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- wpr contact area start -->
        <section id="contact" class="wpr-contact-area mb--16">
            <div class="container">
                <div class="section-inner">

                    <!-- Left Content -->
                    <div class="left-content-area">

                        <!-- Get In Touch -->
                        <div class="get-in-touch">
                            <p class="sub-title"><?php echo esc_html( $settings['contact_sub_title'] ); ?></p>
                            <ul>
                                <?php foreach ( $settings['contact_links'] as $item ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( $item['contact_link_url']['url'] ); ?>">
                                        <?php echo esc_html( $item['contact_link_text'] ); ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- Offices -->
                        <div class="location-area">
                            <p class="sub-title"><?php echo esc_html( $settings['offices_sub_title'] ); ?></p>
                            <ul>
                                <?php foreach ( $settings['offices_list'] as $item ) : ?>
                                <li>
                                    <h2 class="h4"><?php echo esc_html( $item['office_city'] ); ?></h2>
                                    <p><?php echo nl2br( esc_html( $item['office_address'] ) ); ?></p>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>

                    <!-- Contact Form -->
                    <div class="contact-form-area">
                        <?php
                        if ( ! empty( $settings['cf7_shortcode'] ) ) {
                            echo do_shortcode( wp_kses_post( $settings['cf7_shortcode'] ) );
                        } else { ?>
                            <p class="text-white-64"><?php esc_html_e( 'Please enter a Contact Form 7 shortcode in the widget settings.', 'agenio-core' ); ?></p>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </section>
        <!-- wpr contact area end -->
        <?php
    }
}