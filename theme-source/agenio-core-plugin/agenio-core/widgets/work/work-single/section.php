<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Elementor_Agenio_Work_Single_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'agenio_work_single_widget';
    }

    public function get_title() {
        return esc_html__( 'Agenio Work Single', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-gallery-justified';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* =========================================================
         *  BANNER IMAGE
         * ========================================================= */
        $this->start_controls_section(
            'banner_section',
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
                'default' => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/01.webp' ],
            ]
        );

        $this->end_controls_section();

        /* =========================================================
         *  CONTENT BLOCKS REPEATER
         * ========================================================= */
        $this->start_controls_section(
            'blocks_section',
            [
                'label' => esc_html__( 'Content Blocks', 'agenio-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'blocks_info',
            [
                'type'            => \Elementor\Controls_Manager::RAW_HTML,
                'raw'             => esc_html__( 'Each block outputs a text-area row followed by optional images. Choose the layout type per block.', 'agenio-core' ),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $repeater = new \Elementor\Repeater();

        // Block type
        $repeater->add_control(
            'block_type',
            [
                'label'   => esc_html__( 'Block Type', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'text_only'    => esc_html__( 'Text Area Only', 'agenio-core' ),
                    'text_image1'  => esc_html__( 'Text Area + Single Image', 'agenio-core' ),
                    'text_image2'  => esc_html__( 'Text Area + Two Images (side by side)', 'agenio-core' ),
                    'text_image3'  => esc_html__( 'Text Area + Three Images (2 side by side + 1 full)', 'agenio-core' ),
                ],
                'default' => 'text_only',
            ]
        );

        // Left content
        $repeater->add_control(
            'left_desc',
            [
                'label'   => esc_html__( 'Left Description', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'We aimed to bring a vision of authentic interaction to life.', 'agenio-core' ),
            ]
        );

        // Right content
        $repeater->add_control(
            'right_heading',
            [
                'label'   => esc_html__( 'Right Heading', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( 'This project reinforced the importance of building user-centered features.', 'agenio-core' ),
            ]
        );

        $repeater->add_control(
            'right_desc',
            [
                'label'   => esc_html__( 'Right Description (optional)', 'agenio-core' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '',
            ]
        );

        // Image 1
        $repeater->add_control(
            'image_1',
            [
                'label'     => esc_html__( 'Image 1', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/04.webp' ],
                'condition' => [
                    'block_type' => [ 'text_image1', 'text_image2', 'text_image3' ],
                ],
            ]
        );

        $repeater->add_control(
            'image_1_width',
            [
                'label'     => esc_html__( 'Image 1 Width', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'default'   => 696,
                'condition' => [
                    'block_type' => [ 'text_image2', 'text_image3' ],
                ],
            ]
        );

        // Image 2
        $repeater->add_control(
            'image_2',
            [
                'label'     => esc_html__( 'Image 2', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/05.webp' ],
                'condition' => [
                    'block_type' => [ 'text_image2', 'text_image3' ],
                ],
            ]
        );

        $repeater->add_control(
            'image_2_width',
            [
                'label'     => esc_html__( 'Image 2 Width', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'default'   => 696,
                'condition' => [
                    'block_type' => [ 'text_image2', 'text_image3' ],
                ],
            ]
        );

        // Image 3 (full width, only for text_image3)
        $repeater->add_control(
            'image_3',
            [
                'label'     => esc_html__( 'Image 3 (Full Width)', 'agenio-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/06.webp' ],
                'condition' => [
                    'block_type' => 'text_image3',
                ],
            ]
        );

        $this->add_control(
            'content_blocks',
            [
                'label'       => esc_html__( 'Content Blocks', 'agenio-core' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ left_desc }}}',
                'default'     => [
                    [
                        'block_type'   => 'text_image3',
                        'left_desc'    => 'We aimed to bring Vero\'s vision of authentic social interaction to life by focusing on seamless design and user privacy.',
                        'right_heading'=> 'This project reinforced the importance of building user-centered features that offer value beyond aesthetics, especially in social networking.',
                        'right_desc'   => '',
                        'image_1'      => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/04.webp' ],
                        'image_1_width'=> 696,
                        'image_2'      => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/05.webp' ],
                        'image_2_width'=> 696,
                        'image_3'      => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/06.webp' ],
                    ],
                    [
                        'block_type'   => 'text_image1',
                        'left_desc'    => 'User experience focus',
                        'right_heading'=> 'One challenge was ensuring privacy controls while maintaining an easy-to-use interface.',
                        'right_desc'   => 'Designing an ad-free experience meant creating engaging content flows without traditional ads.',
                        'image_1'      => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/07.webp' ],
                    ],
                    [
                        'block_type'   => 'text_image1',
                        'left_desc'    => 'Project research',
                        'right_heading'=> 'We mapped audience behavior, reviewed competitor patterns, and audited product flows.',
                        'right_desc'   => 'This research phase helped align business goals with user expectations.',
                        'image_1'      => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/08.webp' ],
                    ],
                    [
                        'block_type'   => 'text_image2',
                        'left_desc'    => 'Project result',
                        'right_heading'=> 'The final release delivered a faster and cleaner experience.',
                        'right_desc'   => 'By combining clear navigation and performance-focused front-end work, the product supports sustainable growth.',
                        'image_1'      => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/09.webp' ],
                        'image_1_width'=> 696,
                        'image_2'      => [ 'url' => get_template_directory_uri() . '/assets/images/portfolio/10.webp' ],
                        'image_2_width'=> 696,
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- wpr work details area start -->
        <div class="work-details-banner">
            <div class="container">

                <!-- Banner Image -->
                <div class="section-inner border-1 mb--16">
                    <div class="image-area">
                        <img src="<?php echo esc_url( $settings['banner_image']['url'] ); ?>" alt="">
                    </div>
                </div>

                <?php foreach ( $settings['content_blocks'] as $block ) :
                    $type = $block['block_type'];
                ?>

                    <!-- Text Area -->
                    <div class="text-area border-1 bg-white mb--16">
                        <div class="left-content">
                            <p class="desc"><?php echo esc_html( $block['left_desc'] ); ?></p>
                        </div>
                        <div class="right-content">
                            <h2 class="h6"><?php echo wp_kses_post( $block['right_heading'] ); ?></h2>
                            <?php if ( ! empty( $block['right_desc'] ) ) : ?>
                                <p class="desc"><?php echo wp_kses_post( $block['right_desc'] ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if ( $type === 'text_image1' ) : ?>
                        <!-- Single Full-Width Image -->
                        <div class="image mb--16">
                            <img src="<?php echo esc_url( $block['image_1']['url'] ); ?>" alt="">
                        </div>

                    <?php elseif ( $type === 'text_image2' ) : ?>
                        <!-- Two Images Side by Side -->
                        <div class="image-area-2 mb--16">
                            <div class="image">
                                <img src="<?php echo esc_url( $block['image_1']['url'] ); ?>" width="<?php echo esc_attr( $block['image_1_width'] ); ?>" alt="">
                            </div>
                            <div class="image">
                                <img src="<?php echo esc_url( $block['image_2']['url'] ); ?>" width="<?php echo esc_attr( $block['image_2_width'] ); ?>" alt="">
                            </div>
                        </div>

                    <?php elseif ( $type === 'text_image3' ) : ?>
                        <!-- Two Images Side by Side + One Full Width -->
                        <div class="image-area-2 mb--16">
                            <div class="image">
                                <img src="<?php echo esc_url( $block['image_1']['url'] ); ?>" width="<?php echo esc_attr( $block['image_1_width'] ); ?>" alt="">
                            </div>
                            <div class="image">
                                <img src="<?php echo esc_url( $block['image_2']['url'] ); ?>" width="<?php echo esc_attr( $block['image_2_width'] ); ?>" alt="">
                            </div>
                            <div class="image">
                                <img src="<?php echo esc_url( $block['image_3']['url'] ); ?>" alt="">
                            </div>
                        </div>

                    <?php endif; ?>

                <?php endforeach; ?>

            </div>
        </div>
        <!-- wpr work details area end -->
        <?php
    }
}