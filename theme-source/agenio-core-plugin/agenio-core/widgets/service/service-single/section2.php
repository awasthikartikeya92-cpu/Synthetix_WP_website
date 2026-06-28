<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* =============================================================================
 *  SERVICE DETAILS SECTION TWO
 * ============================================================================= */

class Elementor_Agenio_Service_Details_Two_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_service_details_two_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Service Details Two', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-post-content';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  TAGS ROW
         * ========================================================= */
        $this->start_controls_section(
            'tags_section',
            [
                'label' => esc_html__( 'Service Tags', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $tags_repeater = new \Elementor\Repeater();

        $tags_repeater->add_control(
            'tag_text',
            [
                'label'   => esc_html__( 'Tag', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Branding', 'agenio-core' ),
            ]
        );

        $tags_repeater->add_control(
            'tag_active',
            [
                'label'   => esc_html__( 'Active', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => '',
            ]
        );

        $this->add_control(
            'tags_list',
            [
                'label'       => esc_html__( 'Tags', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $tags_repeater->get_controls(),
                'title_field' => '{{{ tag_text }}}',
                'default'     => [
                    [ 'tag_text' => 'Branding',          'tag_active' => '' ],
                    [ 'tag_text' => 'Digital Marketing',  'tag_active' => '' ],
                    [ 'tag_text' => 'UI/UX Design',       'tag_active' => '' ],
                    [ 'tag_text' => 'Web Development',    'tag_active' => '' ],
                    [ 'tag_text' => 'Strategy',           'tag_active' => 'yes' ],
                    [ 'tag_text' => 'SEO',                'tag_active' => '' ],
                    [ 'tag_text' => 'Content',            'tag_active' => '' ],
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  TWO IMAGES ROW
         * ========================================================= */
        $this->start_controls_section(
            'images_section',
            [
                'label' => esc_html__( 'Two Images', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image_tall',
            [
                'label'   => esc_html__( 'Tall Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/02.webp' ],
            ]
        );

        $this->add_control(
            'image_tall_label',
            [
                'label'   => esc_html__( 'Tall Image Label', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Creative Direction', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'image_short',
            [
                'label'   => esc_html__( 'Short Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/service/details-01.webp' ],
            ]
        );

        $this->add_control(
            'image_short_label',
            [
                'label'   => esc_html__( 'Short Image Label', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Brand Systems', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  WHAT WE DO
         * ========================================================= */
        $this->start_controls_section(
            'what_we_do_section',
            [
                'label' => esc_html__( 'What We Do', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'what_sub_title',
            [
                'label'   => esc_html__( 'Sub Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'WHAT WE DO?', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'what_title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "We build brands \n that resonate.", 'agenio-core' ),
            ]
        );

        $this->add_control(
            'what_desc_1',
            [
                'label'   => esc_html__( 'Description Paragraph 1', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( 'We partner with ambitious brands to craft purposeful identities, design meaningful digital experiences, and build scalable systems.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'what_desc_2',
            [
                'label'   => esc_html__( 'Description Paragraph 2', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( 'From early-stage startups to global enterprises, we bring the same rigour and creative intensity to every project.', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  KEY DELIVERABLES
         * ========================================================= */
        $this->start_controls_section(
            'deliverables_section',
            [
                'label' => esc_html__( 'Key Deliverables', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'deliverables_sub_title',
            [
                'label'   => esc_html__( 'Sub Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'KEY DELIVERABLES', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'deliverables_title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Outputs you can count on.', 'agenio-core' ),
            ]
        );

        $del_repeater = new \Elementor\Repeater();

        $del_repeater->add_control(
            'del_number',
            [
                'label'   => esc_html__( 'Number', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '01',
            ]
        );

        $del_repeater->add_control(
            'del_title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Brand Identity System', 'agenio-core' ),
            ]
        );

        $del_repeater->add_control(
            'del_desc',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Logo suite, color palette, typography, iconography, and usage guidelines.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'deliverables_list',
            [
                'label'       => esc_html__( 'Deliverables', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $del_repeater->get_controls(),
                'title_field' => '{{{ del_number }}} — {{{ del_title }}}',
                'default'     => [
                    [ 'del_number' => '01', 'del_title' => 'Brand Identity System',    'del_desc' => 'Logo suite, color palette, typography, iconography, and usage guidelines — all documented in a comprehensive brand book.' ],
                    [ 'del_number' => '02', 'del_title' => 'Digital Strategy Deck',    'del_desc' => 'A detailed roadmap covering audience research, channel strategy, content pillars, and performance benchmarks.' ],
                    [ 'del_number' => '03', 'del_title' => 'UI/UX Design Files',       'del_desc' => 'Wireframes, prototypes, and high-fidelity screens exported in Figma with developer-ready specifications.' ],
                    [ 'del_number' => '04', 'del_title' => 'Launch-Ready Website',     'del_desc' => 'Fully responsive, performance-optimised website with CMS integration, SEO foundation, and analytics setup.' ],
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  WHAT'S INCLUDED
         * ========================================================= */
        $this->start_controls_section(
            'included_section',
            [
                'label' => esc_html__( "What's Included", 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'included_sub_title',
            [
                'label'   => esc_html__( 'Sub Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( "WHAT'S INCLUDED", 'agenio-core' ),
            ]
        );

        $this->add_control(
            'included_title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Everything in one place.', 'agenio-core' ),
            ]
        );

        $inc_repeater = new \Elementor\Repeater();

        $inc_repeater->add_control(
            'inc_text',
            [
                'label'   => esc_html__( 'Item Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Dedicated project manager', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'included_col_1',
            [
                'label'       => esc_html__( 'Column 1 Items', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $inc_repeater->get_controls(),
                'title_field' => '{{{ inc_text }}}',
                'default'     => [
                    [ 'inc_text' => 'Dedicated project manager' ],
                    [ 'inc_text' => 'Weekly progress updates' ],
                    [ 'inc_text' => '2 rounds of revisions' ],
                    [ 'inc_text' => 'Source files & full ownership' ],
                ],
            ]
        );

        $this->add_control(
            'included_col_2',
            [
                'label'       => esc_html__( 'Column 2 Items', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $inc_repeater->get_controls(),
                'title_field' => '{{{ inc_text }}}',
                'default'     => [
                    [ 'inc_text' => 'Post-launch support (30 days)' ],
                    [ 'inc_text' => 'Analytics & reporting dashboard' ],
                    [ 'inc_text' => 'Collaborative Figma workspace' ],
                    [ 'inc_text' => 'NDA & IP protection agreement' ],
                ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  CTA
         * ========================================================= */
        $this->start_controls_section(
            'cta_section',
            [
                'label' => esc_html__( 'CTA Button', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'cta_desc',
            [
                'label'   => esc_html__( 'CTA Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( "Ready to get started? Let's talk about your project.", 'agenio-core' ),
            ]
        );

        $this->add_control(
            'cta_btn_text',
            [
                'label'   => esc_html__( 'Button Text', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Start a Project', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'cta_btn_url',
            [
                'label'   => esc_html__( 'Button URL', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#contact' ],
            ]
        );

        $this->add_control(
            'cta_fixed_arrow',
            [
                'label'   => esc_html__( 'Fixed Arrow Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/icon/button-arrow-fixed.svg' ],
            ]
        );

        $this->add_control(
            'cta_arrow',
            [
                'label'   => esc_html__( 'Arrow Icon', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/icon/button-arrow-2.svg' ],
            ]
        );

        $this->add_control(
            'cta_arrow_count',
            [
                'label'   => esc_html__( 'Arrow Repeat Count', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,
                'min'     => 1,
                'max'     => 10,
            ]
        );

        $this->end_controls_section();
    }

    // Reusable check SVG
    private function check_svg() {
        return '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path d="M19.9428 7.33556C20.2803 8.59518 19.0204 9.94926 18.8596 11.1655C18.6928 12.4268 19.54 14.0595 18.9147 15.1464C18.2894 16.2334 16.4484 16.3141 15.4396 17.0893C14.4672 17.8391 13.9233 19.6055 12.6643 19.9429C11.4054 20.2802 10.051 19.0196 8.83403 18.8591C7.57279 18.6923 5.94002 19.5394 4.85305 18.9141C3.76609 18.2888 3.68532 16.4479 2.91085 15.4389C2.16092 14.4667 0.394673 13.9234 0.0571579 12.6638C-0.28037 11.4042 0.980371 10.0505 1.14109 8.83424C1.30729 7.5732 0.460077 5.94048 1.08543 4.85354C1.71078 3.7666 3.55172 3.68584 4.56057 2.91073C5.53348 2.16065 6.0768 0.394446 7.33579 0.057115C8.59479 -0.280228 9.94981 0.980128 11.1661 1.14084C12.4274 1.30769 14.0601 0.4605 15.1471 1.08584C16.2341 1.71117 16.3148 3.55206 17.0899 4.56089C17.8364 5.53056 19.6046 6.07334 19.9428 7.33556Z" fill="#B8E900"></path>
            <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" stroke="#111111" stroke-width="1.36364" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>';
    }

    protected function render() {
        $settings        = $this->get_settings_for_display();
        $arrow_count     = ! empty( $settings['cta_arrow_count'] ) ? (int) $settings['cta_arrow_count'] : 4;
        ?>
        <!-- wpr service extended area start -->
        <section class="wpr-service-extended-area mb--16">
            <div class="container">
                <div class="section-inner bg-white border-1">

                    <!-- Tags Row -->
                    <div class="service-tags-row">
                        <?php foreach ( $settings['tags_list'] as $tag ) : ?>
                            <span class="service-tag<?php echo $tag['tag_active'] === 'yes' ? ' active' : ''; ?>">
                                <?php echo esc_html( $tag['tag_text'] ); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>

                    <!-- Two Images Row -->
                    <div class="service-images-row">
                        <div class="service-img-wrap service-img-wrap--tall">
                            <img src="<?php echo esc_url( $settings['image_tall']['url'] ); ?>" alt="<?php echo esc_attr( $settings['image_tall_label'] ); ?>">
                            <div class="service-img-label"><?php echo esc_html( $settings['image_tall_label'] ); ?></div>
                        </div>
                        <div class="service-img-wrap service-img-wrap--short">
                            <img src="<?php echo esc_url( $settings['image_short']['url'] ); ?>" alt="<?php echo esc_attr( $settings['image_short_label'] ); ?>">
                            <div class="service-img-label"><?php echo esc_html( $settings['image_short_label'] ); ?></div>
                        </div>
                    </div>

                    <!-- What We Do -->
                    <div class="service-what-we-do">
                        <div class="service-what-left">
                            <p class="sub-title"><?php echo esc_html( $settings['what_sub_title'] ); ?></p>
                            <h2 class="section-title second-font font-semi-bold text-normal">
                                <?php echo nl2br( esc_html( $settings['what_title'] ) ); ?>
                            </h2>
                        </div>
                        <div class="service-what-right">
                            <p class="desc"><?php echo wp_kses_post( $settings['what_desc_1'] ); ?></p>
                            <p class="desc mt--20"><?php echo wp_kses_post( $settings['what_desc_2'] ); ?></p>
                        </div>
                    </div>

                    <!-- Key Deliverables -->
                    <div class="service-deliverables">
                        <div class="service-deliverables-header">
                            <p class="sub-title"><?php echo esc_html( $settings['deliverables_sub_title'] ); ?></p>
                            <h3 class="h5 second-font font-semi-bold text-normal"><?php echo esc_html( $settings['deliverables_title'] ); ?></h3>
                        </div>
                        <div class="service-deliverables-grid">
                            <?php foreach ( $settings['deliverables_list'] as $item ) : ?>
                            <div class="deliverable-card">
                                <div class="deliverable-number"><?php echo esc_html( $item['del_number'] ); ?></div>
                                <h4 class="deliverable-title"><?php echo esc_html( $item['del_title'] ); ?></h4>
                                <p class="desc"><?php echo esc_html( $item['del_desc'] ); ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- What's Included -->
                    <div class="service-included">
                        <div class="service-included-header">
                            <p class="sub-title"><?php echo esc_html( $settings['included_sub_title'] ); ?></p>
                            <h3 class="h5 second-font font-semi-bold text-normal"><?php echo esc_html( $settings['included_title'] ); ?></h3>
                        </div>
                        <div class="service-included-wrapper">

                            <!-- Column 1 -->
                            <div class="included-list-col">
                                <ul class="included-list">
                                    <?php foreach ( $settings['included_col_1'] as $item ) : ?>
                                    <li>
                                        <span class="included-check"><?php echo $this->check_svg(); ?></span>
                                        <?php echo esc_html( $item['inc_text'] ); ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <!-- Column 2 -->
                            <div class="included-list-col">
                                <ul class="included-list">
                                    <?php foreach ( $settings['included_col_2'] as $item ) : ?>
                                    <li>
                                        <span class="included-check"><?php echo $this->check_svg(); ?></span>
                                        <?php echo esc_html( $item['inc_text'] ); ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <!-- CTA -->
                            <div class="included-cta">
                                <p class="desc"><?php echo esc_html( $settings['cta_desc'] ); ?></p>
                                <a href="<?php echo esc_url( $settings['cta_btn_url']['url'] ); ?>" class="wpr-btn btn-primary with-icon">
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="fixed-arrow">
                                                <img src="<?php echo esc_url( $settings['cta_fixed_arrow']['url'] ); ?>" alt="">
                                            </span>
                                            <?php for ( $i = 0; $i < $arrow_count; $i++ ) : ?>
                                                <span><img src="<?php echo esc_url( $settings['cta_arrow']['url'] ); ?>" alt=""></span>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                    <?php echo esc_html( $settings['cta_btn_text'] ); ?>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- wpr service extended area end -->
        <?php
    }
}