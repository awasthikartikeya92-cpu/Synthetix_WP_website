<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Synthetix Deployment Grid Widget
 *
 * 4-card grid for Governance /05 Deployment Options.
 * Cards: Default (SaaS) · Isolated (Single-tenant VPC) · On-Prem (Self-hosted) · Regulated (Air-gapped)
 */
class Elementor_Synthetix_Deployment_Grid_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'synthetix_deployment_grid';
    }

    public function get_title() {
        return esc_html__( 'Synthetix Deployment Grid', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-apps';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        $this->start_controls_section( 'intro_section', [
            'label' => esc_html__( 'Section Intro', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'section_eyebrow', [
            'label'   => esc_html__( 'Eyebrow', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '05 / Deployment Options',
        ] );

        $this->add_control( 'section_title', [
            'label'   => esc_html__( 'Section Title', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Every deployment model your regulated environment demands, supported without compromise.',
        ] );

        $this->add_control( 'section_intro', [
            'label'   => esc_html__( 'Intro Paragraphs', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::WYSIWYG,
            'default' => '',
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'cards_section', [
            'label' => esc_html__( 'Deployment Cards', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control( 'card_label', [
            'label'   => esc_html__( 'Label (e.g. — Default)', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '— Default',
        ] );

        $repeater->add_control( 'card_name', [
            'label'   => esc_html__( 'Model Name (e.g. SaaS)', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'SaaS',
        ] );

        $repeater->add_control( 'card_desc', [
            'label'   => esc_html__( 'Description', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '',
        ] );

        $this->add_control( 'cards', [
            'label'       => esc_html__( 'Cards', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ card_label }}} {{{ card_name }}}',
            'default'     => [
                [ 'card_label' => '— Default',   'card_name' => 'SaaS',               'card_desc' => 'Multi-tenant cloud. Fastest to start. Available in US, EU, and APAC regions. Region pinning for data residency.' ],
                [ 'card_label' => '— Isolated',  'card_name' => 'Single-tenant VPC',  'card_desc' => 'Dedicated VPC in your AWS, Azure, or GCP account. Customer-managed keys. No shared infrastructure.' ],
                [ 'card_label' => '— On-Prem',   'card_name' => 'Self-hosted',        'card_desc' => 'Run Synthetix on your own infrastructure — on-premises, VMware, or OpenShift. Kubernetes-native deployment.' ],
                [ 'card_label' => '— Regulated', 'card_name' => 'Air-gapped',         'card_desc' => 'Fully disconnected operation for sovereign, classified, and life-safety environments. Updates via signed and verified bundles.' ],
            ],
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <div class="sx-deployment-grid-wrap">
            <?php if ( $s['section_eyebrow'] || $s['section_title'] ) : ?>
                <div class="sx-deployment-grid-wrap__intro">
                    <?php if ( $s['section_eyebrow'] ) : ?>
                        <span class="sx-eyebrow"><?php echo esc_html( $s['section_eyebrow'] ); ?></span>
                    <?php endif; ?>
                    <?php if ( $s['section_title'] ) : ?>
                        <h2 class="sx-deployment-grid-wrap__title"><?php echo esc_html( $s['section_title'] ); ?></h2>
                    <?php endif; ?>
                    <?php if ( $s['section_intro'] ) : ?>
                        <div class="sx-deployment-grid-wrap__desc"><?php echo wp_kses_post( $s['section_intro'] ); ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="sx-deployment-grid">
                <?php foreach ( ( $s['cards'] ?? [] ) as $card ) : ?>
                    <div class="sx-deployment-card">
                        <span class="sx-deployment-card__label"><?php echo esc_html( $card['card_label'] ); ?></span>
                        <h3 class="sx-deployment-card__name"><?php echo esc_html( $card['card_name'] ); ?></h3>
                        <p class="sx-deployment-card__desc"><?php echo esc_html( $card['card_desc'] ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}
