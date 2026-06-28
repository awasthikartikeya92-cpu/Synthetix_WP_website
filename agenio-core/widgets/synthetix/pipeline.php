<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Synthetix Pipeline Widget
 *
 * 6-stage horizontal pipeline for /platform:
 *   Discover → Analyze → Architect → Build → Verify → Govern
 *
 * Each stage has: number, name, description, and a list of agent tags
 * that operate at that stage. Full copy comes from WPC-Synthetix-Platform.docx
 * (not yet received — defaults reflect the brief's stage names).
 */
class Elementor_Synthetix_Pipeline_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'synthetix_pipeline';
    }

    public function get_title() {
        return esc_html__( 'Synthetix Pipeline', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-flow';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        $this->start_controls_section( 'header_section', [
            'label' => esc_html__( 'Section Header', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'section_eyebrow', [
            'label'   => esc_html__( 'Eyebrow', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Platform',
        ] );

        $this->add_control( 'section_title', [
            'label'   => esc_html__( 'Section Title', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Six stages. One governed delivery arc.',
        ] );

        $this->add_control( 'section_intro', [
            'label'   => esc_html__( 'Intro Paragraph', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::WYSIWYG,
            'default' => '',
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'stages_section', [
            'label' => esc_html__( 'Pipeline Stages', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control( 'stage_number', [
            'label'   => esc_html__( 'Stage Number', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '01',
        ] );

        $repeater->add_control( 'stage_name', [
            'label'   => esc_html__( 'Stage Name', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Discover',
        ] );

        $repeater->add_control( 'stage_desc', [
            'label'   => esc_html__( 'Stage Description', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '',
        ] );

        $repeater->add_control( 'stage_agents', [
            'label'       => esc_html__( 'Agents (comma-separated)', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => 'Cartographer, Scout',
            'description' => 'Agent names separated by commas. Each renders as a tag.',
        ] );

        $this->add_control( 'stages', [
            'label'       => esc_html__( 'Stages', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ stage_number }}} {{{ stage_name }}}',
            'default'     => [
                [ 'stage_number' => '01', 'stage_name' => 'Discover',  'stage_desc' => '', 'stage_agents' => 'Cartographer, Scout' ],
                [ 'stage_number' => '02', 'stage_name' => 'Analyze',   'stage_desc' => '', 'stage_agents' => 'Cartographer' ],
                [ 'stage_number' => '03', 'stage_name' => 'Architect', 'stage_desc' => '', 'stage_agents' => 'Architect, Estimator' ],
                [ 'stage_number' => '04', 'stage_name' => 'Build',     'stage_desc' => '', 'stage_agents' => 'Conductor, Critic, Builder' ],
                [ 'stage_number' => '05', 'stage_name' => 'Verify',    'stage_desc' => '', 'stage_agents' => 'Examiner, Critic' ],
                [ 'stage_number' => '06', 'stage_name' => 'Govern',    'stage_desc' => '', 'stage_agents' => 'Gatekeeper' ],
            ],
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <div class="sx-pipeline-wrap">
            <?php if ( $s['section_eyebrow'] || $s['section_title'] ) : ?>
                <div class="sx-pipeline-wrap__intro">
                    <?php if ( $s['section_eyebrow'] ) : ?>
                        <span class="sx-eyebrow"><?php echo esc_html( $s['section_eyebrow'] ); ?></span>
                    <?php endif; ?>
                    <?php if ( $s['section_title'] ) : ?>
                        <h2 class="sx-pipeline-wrap__title"><?php echo esc_html( $s['section_title'] ); ?></h2>
                    <?php endif; ?>
                    <?php if ( $s['section_intro'] ) : ?>
                        <div class="sx-pipeline-wrap__desc"><?php echo wp_kses_post( $s['section_intro'] ); ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="sx-pipeline">
                <?php foreach ( ( $s['stages'] ?? [] ) as $i => $stage ) :
                    $agents = array_filter( array_map( 'trim', explode( ',', $stage['stage_agents'] ?? '' ) ) );
                ?>
                    <div class="sx-pipeline__stage">
                        <div class="sx-pipeline__stage-header">
                            <span class="sx-pipeline__stage-number"><?php echo esc_html( $stage['stage_number'] ); ?></span>
                            <h3 class="sx-pipeline__stage-name"><?php echo esc_html( $stage['stage_name'] ); ?></h3>
                        </div>
                        <?php if ( $stage['stage_desc'] ) : ?>
                            <p class="sx-pipeline__stage-desc"><?php echo esc_html( $stage['stage_desc'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( $agents ) : ?>
                            <div class="sx-pipeline__stage-agents">
                                <?php foreach ( $agents as $agent ) : ?>
                                    <span class="sx-tag sx-tag--agent"><?php echo esc_html( $agent ); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ( $i < count( $s['stages'] ) - 1 ) : ?>
                        <div class="sx-pipeline__connector" aria-hidden="true"></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}
