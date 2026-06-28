<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Faq_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_faq_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio FAQ', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-accordion';
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
                'default' => esc_html__( 'FAQS', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => esc_html__( 'Section Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'FAQs', 'agenio-core' ),
            ]
        );

        // Unique accordion ID per widget instance to support multiple FAQs on one page
        $this->add_control(
            'accordion_id',
            [
                'label'       => esc_html__( 'Accordion ID (unique per page)', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'faqAccordion', 'agenio-core' ),
                'description' => esc_html__( 'Change this if you use multiple FAQ widgets on the same page.', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  FAQ ITEMS REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'faq_section',
            [
                'label' => esc_html__( 'FAQ Items', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'faq_question',
            [
                'label'   => esc_html__( 'Question', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'What if I only need one specific service?', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'faq_answer',
            [
                'label'   => esc_html__( 'Answer', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "Absolutely — you don't need to book a full package. Whether it's a brand refresh, a website redesign, or UI/UX for a single product, we tailor our approach to match your exact needs and budget.", 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'is_open',
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
            'faq_list',
            [
                'label'       => esc_html__( 'FAQ Items', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ faq_question }}}',
                'default'     => [
                    [
                        'faq_question' => 'What if I only need one specific service?',
                        'faq_answer'   => "Absolutely — you don't need to book a full package. Whether it's a brand refresh, a website redesign, or UI/UX for a single product, we tailor our approach to match your exact needs and budget.",
                        'is_open'      => '',
                    ],
                    [
                        'faq_question' => 'How long does a typical project take?',
                        'faq_answer'   => 'Project timelines depend on the scope — most branding projects take 3–4 weeks, while full website or product design projects typically range from 6–8 weeks. We\'ll confirm an exact timeline during the discovery phase.',
                        'is_open'      => '',
                    ],
                    [
                        'faq_question' => 'Do you work with clients internationally?',
                        'faq_answer'   => 'Yes. We collaborate with clients around the world through remote workshops, video calls, and real-time communication tools — ensuring a smooth process regardless of location.',
                        'is_open'      => 'yes',
                    ],
                    [
                        'faq_question' => 'Can you handle both design and development?',
                        'faq_answer'   => 'Yes. While our core focus is design, we partner with trusted developers to bring your project to life with high-quality, responsive code — ensuring seamless design-to-development handoff.',
                        'is_open'      => '',
                    ],
                    [
                        'faq_question' => 'How do we start a project with your team?',
                        'faq_answer'   => 'Simply reach out through our contact form or email. We\'ll schedule a short discovery call to learn about your goals, then provide a proposal tailored to your needs.',
                        'is_open'      => '',
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  DECORATIVE SHAPES
         * ========================================================= */
        $this->start_controls_section(
            'shapes_section',
            [
                'label' => esc_html__( 'Decorative Shapes', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'top_left_shape',
            [
                'label'   => esc_html__( 'Top Left Shape', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/faq/top-left-shape.svg',
                ],
            ]
        );

        $this->add_control(
            'bg_grid_shape',
            [
                'label'   => esc_html__( 'Background Grid Shape', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/faq/grid.svg',
                ],
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
        $faqs              = $settings['faq_list'];
        $accordion_id      = ! empty( $settings['accordion_id'] ) ? $settings['accordion_id'] : 'faqAccordion';
        $show_bottom_shape = ( 'yes' === $settings['show_bottom_shape'] );

        // Generate a unique prefix per widget instance to avoid ID collisions in Elementor editor
        $uid = 'faq_' . $this->get_id() . '_';
        ?>
        <!-- wpr faq area start -->
        <section class="wpr-faq-area mb--16">
            <div class="container">
                <div class="section-inner bg-white border-1">
                    <div class="section-content-area">

                        <!-- Section Header -->
                        <div class="section-title-area center-style">
                            <?php if ( ! empty( $settings['sub_title'] ) ) : ?>
                                <p class="sub-title"><?php echo esc_html( $settings['sub_title'] ); ?></p>
                            <?php endif; ?>
                            <?php if ( ! empty( $settings['section_title'] ) ) : ?>
                                <h2 class="section-title second-font font-semi-bold text-normal">
                                    <?php echo esc_html( $settings['section_title'] ); ?>
                                </h2>
                            <?php endif; ?>
                        </div>

                        <!-- FAQ Accordion -->
                        <div class="accordion-one" id="<?php echo esc_attr( $accordion_id ); ?>">
                            <?php
                            $index = 1;
                            foreach ( $faqs as $faq ) :
                                $item_id    = esc_attr( $uid . $index );
                                $is_open    = ( 'yes' === $faq['is_open'] );
                                $btn_class  = $is_open ? 'accordion-button' : 'accordion-button collapsed';
                                $aria_exp   = $is_open ? 'true' : 'false';
                                $show_class = $is_open ? 'accordion-collapse collapse show' : 'accordion-collapse collapse';
                            ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-<?php echo $item_id; ?>">
                                    <button
                                        class="<?php echo esc_attr( $btn_class ); ?>"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse-<?php echo $item_id; ?>"
                                        aria-expanded="<?php echo esc_attr( $aria_exp ); ?>"
                                        aria-controls="collapse-<?php echo $item_id; ?>">
                                        <?php echo esc_html( $faq['faq_question'] ); ?>
                                    </button>
                                </h2>
                                <div
                                    id="collapse-<?php echo $item_id; ?>"
                                    class="<?php echo esc_attr( $show_class ); ?>"
                                    role="region"
                                    aria-labelledby="heading-<?php echo $item_id; ?>"
                                    data-bs-parent="#<?php echo esc_attr( $accordion_id ); ?>">
                                    <div class="accordion-body">
                                        <p class="desc"><?php echo wp_kses_post( $faq['faq_answer'] ); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $index++;
                            endforeach;
                            ?>
                        </div>

                        <!-- Decorative Shapes -->
                        <?php if ( ! empty( $settings['top_left_shape']['url'] ) ) : ?>
                        <div class="top-left-shape">
                            <img src="<?php echo esc_url( $settings['top_left_shape']['url'] ); ?>" alt="">
                        </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $settings['bg_grid_shape']['url'] ) ) : ?>
                        <div class="bg-shape">
                            <img src="<?php echo esc_url( $settings['bg_grid_shape']['url'] ); ?>" alt="">
                        </div>
                        <?php endif; ?>

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
        <!-- wpr faq area end -->
        <?php
    }
}