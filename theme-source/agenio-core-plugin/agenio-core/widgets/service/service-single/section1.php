<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Service_Details_One_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_service_details_one_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Service Details One', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-document-file';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  BANNER IMAGE
         * ========================================================= */
        $this->start_controls_section(
            'banner_image_section',
            [
                'label' => esc_html__( 'Banner Image', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'banner_image',
            [
                'label'   => esc_html__( 'Banner Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/02.webp' ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  MAIN DESCRIPTION
         * ========================================================= */
        $this->start_controls_section(
            'description_section',
            [
                'label' => esc_html__( 'Main Description', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'main_desc',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( 'We help brands find their voice and stand out with clarity and confidence.', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  KEY FEATURE SECTION
         * ========================================================= */
        $this->start_controls_section(
            'key_feature_section',
            [
                'label' => esc_html__( 'Key Feature', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'key_feature_title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Key Feature Of Digital Marketing', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'key_feature_desc',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Digital marketing empowers businesses to reach the right audience at the right time.', 'agenio-core' ),
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  CORE FEATURES (LEFT + LIST + IMAGE)
         * ========================================================= */
        $this->start_controls_section(
            'core_features_section',
            [
                'label' => esc_html__( 'Core Features', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'core_features_title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Core Features', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'core_features_desc',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Our core feature is a strategic, data-driven approach that combines creativity with performance-focused execution.', 'agenio-core' ),
            ]
        );

        // Core Features List Repeater
        $list_repeater = new \Elementor\Repeater();

        $list_repeater->add_control(
            'list_item',
            [
                'label'   => esc_html__( 'List Item', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Discovery & Research', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'core_features_list',
            [
                'label'       => esc_html__( 'List Items', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $list_repeater->get_controls(),
                'title_field' => '{{{ list_item }}}',
                'default'     => [
                    [ 'list_item' => 'Discovery & Research' ],
                    [ 'list_item' => 'Concept Development' ],
                    [ 'list_item' => 'Refinement & Testing' ],
                    [ 'list_item' => 'Final Implementation' ],
                ],
            ]
        );

        $this->add_control(
            'approach_image',
            [
                'label'   => esc_html__( 'Right Image', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/service/details-01.webp' ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  FEATURE BOXES
         * ========================================================= */
        $this->start_controls_section(
            'feature_boxes_section',
            [
                'label' => esc_html__( 'Feature Boxes', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $box_repeater = new \Elementor\Repeater();

        $box_repeater->add_control(
            'box_icon',
            [
                'label'   => esc_html__( 'Icon (SVG)', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
                'description' => esc_html__( 'Paste inline SVG code here.', 'agenio-core' ),
            ]
        );

        $box_repeater->add_control(
            'box_title',
            [
                'label'   => esc_html__( 'Title', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '99% Success Rate', 'agenio-core' ),
            ]
        );

        $box_repeater->add_control(
            'box_desc',
            [
                'label'   => esc_html__( 'Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'At our Creative Digital agency we bring your ideas to life by crafting engaging, impactful work.', 'agenio-core' ),
            ]
        );

        $this->add_control(
            'feature_boxes',
            [
                'label'       => esc_html__( 'Feature Boxes', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $box_repeater->get_controls(),
                'title_field' => '{{{ box_title }}}',
                'default'     => [
                    [
                        'box_title' => '99% Success Rate',
                        'box_desc'  => 'At our Creative Digital agency we bring your ideas to life by crafting engaging, impactful work.',
                    ],
                    [
                        'box_title' => 'Speed Optimized',
                        'box_desc'  => 'At our Creative Digital agency we bring your ideas to life by crafting engaging, impactful work.',
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    // Reusable check SVG
    private function check_svg() {
        return '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path d="M19.9428 7.33556C20.2803 8.59518 19.0204 9.94926 18.8596 11.1655C18.6928 12.4268 19.54 14.0595 18.9147 15.1464C18.2894 16.2334 16.4484 16.3141 15.4396 17.0893C14.4672 17.8391 13.9233 19.6055 12.6643 19.9429C11.4054 20.2802 10.051 19.0196 8.83403 18.8591C7.57279 18.6923 5.94002 19.5394 4.85305 18.9141C3.76609 18.2888 3.68532 16.4479 2.91085 15.4389C2.16092 14.4667 0.394673 13.9234 0.0571579 12.6638C-0.28037 11.4042 0.980371 10.0505 1.14109 8.83424C1.30729 7.5732 0.460077 5.94048 1.08543 4.85354C1.71078 3.7666 3.55172 3.68584 4.56057 2.91073C5.53348 2.16065 6.0768 0.394446 7.33579 0.057115C8.59479 -0.280228 9.94981 0.980128 11.1661 1.14084C12.4274 1.30769 14.0601 0.4605 15.1471 1.08584C16.2341 1.71117 16.3148 3.55206 17.0899 4.56089C17.8364 5.53056 19.6046 6.07334 19.9428 7.33556Z" fill="#B8E900"></path>
            <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" fill="#B8E900"></path>
            <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" stroke="#111111" stroke-width="1.36364" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>';
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- wpr work details area start -->
        <div class="services-details-banner">
            <div class="container">
                <div class="section-inner border-1 mb--16">

                    <!-- Banner Image -->
                    <div class="image-area">
                        <img src="<?php echo esc_url( $settings['banner_image']['url'] ); ?>" alt="">
                    </div>

                    <div class="service-overview">
                        <div class="wpr-service-details-content mb-40 mr-115">

                            <!-- Main Description -->
                            <p class="desc mb--45"><?php echo wp_kses_post( $settings['main_desc'] ); ?></p>

                            <!-- Key Feature -->
                            <h2 class="h5 wpr-service-details-title mb-30"><?php echo esc_html( $settings['key_feature_title'] ); ?></h2>
                            <p class="desc"><?php echo wp_kses_post( $settings['key_feature_desc'] ); ?></p>

                            <!-- Approach Area -->
                            <div class="approach-area">
                                <div class="left">
                                    <h2 class="h5 wpr-service-details-title mb-30"><?php echo esc_html( $settings['core_features_title'] ); ?></h2>
                                    <p class="desc mb--30"><?php echo esc_html( $settings['core_features_desc'] ); ?></p>
                                    <ul>
                                        <?php foreach ( $settings['core_features_list'] as $item ) : ?>
                                        <li>
                                            <?php echo $this->check_svg(); ?>
                                            <p><?php echo esc_html( $item['list_item'] ); ?></p>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="right">
                                    <img src="<?php echo esc_url( $settings['approach_image']['url'] ); ?>" alt="">
                                </div>
                            </div>

                            <!-- Feature Boxes -->
                            <div class="feature-wrapper-area mt--60">
                                <?php foreach ( $settings['feature_boxes'] as $box ) : ?>
                                <div class="feature-box">
                                    <div class="top">
                                        <div class="icon">
                                            <?php echo $box['box_icon']; ?>
                                        </div>
                                        <p class="text"><?php echo esc_html( $box['box_title'] ); ?></p>
                                    </div>
                                    <div class="bottom">
                                        <p class="desc"><?php echo esc_html( $box['box_desc'] ); ?></p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wpr work details area end -->
        <?php
    }
}