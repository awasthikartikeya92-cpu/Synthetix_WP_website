<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Synthetix Agent Card Widget
 *
 * Renders a single agent profile card with number, stage/role tags,
 * headline, body, and Inputs / Outputs repeaters. Instantiate once
 * per agent (9 total on /agents).
 */
class Elementor_Synthetix_Agent_Card_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'synthetix_agent_card';
    }

    public function get_title() {
        return esc_html__( 'Synthetix Agent Card', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* ── Identity ── */
        $this->start_controls_section( 'identity_section', [
            'label' => esc_html__( 'Agent Identity', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'agent_number', [
            'label'   => esc_html__( 'Number (e.g. 01)', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '01',
        ] );

        $this->add_control( 'stage_tag', [
            'label'   => esc_html__( 'Stage Tag', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Discover, Analyze',
        ] );

        $this->add_control( 'role_tag', [
            'label'   => esc_html__( 'Role Tag', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Comprehension',
        ] );

        $this->add_control( 'agent_name', [
            'label'   => esc_html__( 'Agent Name (H2)', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'CARTOGRAPHER',
        ] );

        $this->add_control( 'agent_headline', [
            'label'   => esc_html__( 'Headline (H3)', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Full estate comprehension before a single line changes.',
        ] );

        $this->add_control( 'agent_body', [
            'label'   => esc_html__( 'Body Paragraph', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::WYSIWYG,
            'default' => '',
        ] );

        $this->end_controls_section();

        /* ── Inputs ── */
        $this->start_controls_section( 'inputs_section', [
            'label' => esc_html__( 'Inputs', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $inputs_repeater = new \Elementor\Repeater();
        $inputs_repeater->add_control( 'input_text', [
            'label'   => esc_html__( 'Input', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '',
        ] );

        $this->add_control( 'inputs', [
            'label'       => esc_html__( 'Input Bullets', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $inputs_repeater->get_controls(),
            'title_field' => '{{{ input_text }}}',
        ] );

        $this->end_controls_section();

        /* ── Outputs ── */
        $this->start_controls_section( 'outputs_section', [
            'label' => esc_html__( 'Outputs', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $outputs_repeater = new \Elementor\Repeater();
        $outputs_repeater->add_control( 'output_text', [
            'label'   => esc_html__( 'Output', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '',
        ] );

        $this->add_control( 'outputs', [
            'label'       => esc_html__( 'Output Bullets', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $outputs_repeater->get_controls(),
            'title_field' => '{{{ output_text }}}',
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $num     = esc_html( $s['agent_number'] );
        $stage   = esc_html( $s['stage_tag'] );
        $role    = esc_html( $s['role_tag'] );
        $name    = esc_html( $s['agent_name'] );
        $head    = esc_html( $s['agent_headline'] );
        $body    = wp_kses_post( $s['agent_body'] );
        $inputs  = $s['inputs']  ?? [];
        $outputs = $s['outputs'] ?? [];
        ?>
        <div class="sx-agent-card">
            <div class="sx-agent-card__header">
                <span class="sx-agent-card__number"><?php echo $num; ?></span>
                <div class="sx-agent-card__tags">
                    <span class="sx-tag sx-tag--stage">Stage: <?php echo $stage; ?></span>
                    <span class="sx-tag sx-tag--role">Role: <?php echo $role; ?></span>
                </div>
            </div>

            <h2 class="sx-agent-card__name"><?php echo $name; ?></h2>
            <h3 class="sx-agent-card__headline"><?php echo $head; ?></h3>

            <?php if ( $body ) : ?>
                <div class="sx-agent-card__body"><?php echo $body; ?></div>
            <?php endif; ?>

            <div class="sx-agent-card__io">
                <?php if ( $inputs ) : ?>
                <div class="sx-agent-card__io-col">
                    <h4 class="sx-agent-card__io-label">Inputs:</h4>
                    <ul class="sx-agent-card__io-list">
                        <?php foreach ( $inputs as $item ) : ?>
                            <li><?php echo esc_html( $item['input_text'] ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if ( $outputs ) : ?>
                <div class="sx-agent-card__io-col">
                    <h4 class="sx-agent-card__io-label">Outputs:</h4>
                    <ul class="sx-agent-card__io-list">
                        <?php foreach ( $outputs as $item ) : ?>
                            <li><?php echo esc_html( $item['output_text'] ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}
