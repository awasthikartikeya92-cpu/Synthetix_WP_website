<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Synthetix Workflow Diagram Widget
 *
 * Renders the Agents page "workflow band" — a horizontal sequence of
 * agent steps with 2 human-gate markers inserted at the correct positions.
 *
 * Copy (verbatim from WPC-Synthetix-Agents.docx WORKFLOW BAND):
 * "Cartographer maps the estate. Architect generates the target state.
 * Estimator produces the defensible plan. Critic audits every output
 * before it moves. Human gate. The Builder swarm executes. Examiner
 * validates. Gatekeeper enforces policy and closes the audit trail.
 * Human gate. Seven autonomous handoffs. Two human approvals. Full
 * program accountability at each stage."
 *
 * The steps repeater supports row_type: 'agent' or 'human_gate' so the
 * developer can reorder or add steps without touching PHP.
 */
class Elementor_Synthetix_Workflow_Diagram_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'synthetix_workflow_diagram';
    }

    public function get_title() {
        return esc_html__( 'Synthetix Workflow Diagram', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-flow';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        $this->start_controls_section( 'header_section', [
            'label' => esc_html__( 'Header', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'band_title', [
            'label'   => esc_html__( 'Band Title', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Autonomous handoffs. Accountable outcomes.',
        ] );

        $this->add_control( 'band_summary', [
            'label'   => esc_html__( 'Summary Line', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Seven autonomous handoffs. Two human approvals. Full program accountability at each stage.',
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'steps_section', [
            'label' => esc_html__( 'Steps', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control( 'step_type', [
            'label'   => esc_html__( 'Step Type', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'agent'      => 'Agent Step',
                'human_gate' => 'Human Gate',
            ],
            'default' => 'agent',
        ] );

        $repeater->add_control( 'agent_name', [
            'label'     => esc_html__( 'Agent Name', 'agenio-core' ),
            'type'      => \Elementor\Controls_Manager::TEXT,
            'default'   => 'Cartographer',
            'condition' => [ 'step_type' => 'agent' ],
        ] );

        $repeater->add_control( 'agent_action', [
            'label'     => esc_html__( 'Action Description', 'agenio-core' ),
            'type'      => \Elementor\Controls_Manager::TEXT,
            'default'   => 'maps the estate',
            'condition' => [ 'step_type' => 'agent' ],
        ] );

        $this->add_control( 'steps', [
            'label'       => esc_html__( 'Steps', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ step_type === "human_gate" ? "⬡ Human Gate" : agent_name }}}',
            'default'     => [
                [ 'step_type' => 'agent',      'agent_name' => 'Cartographer', 'agent_action' => 'maps the estate' ],
                [ 'step_type' => 'agent',      'agent_name' => 'Architect',    'agent_action' => 'generates the target state' ],
                [ 'step_type' => 'agent',      'agent_name' => 'Estimator',    'agent_action' => 'produces the defensible plan' ],
                [ 'step_type' => 'agent',      'agent_name' => 'Critic',       'agent_action' => 'audits every output before it moves' ],
                [ 'step_type' => 'human_gate', 'agent_name' => '', 'agent_action' => '' ],
                [ 'step_type' => 'agent',      'agent_name' => 'Builder',      'agent_action' => 'swarm executes' ],
                [ 'step_type' => 'agent',      'agent_name' => 'Examiner',     'agent_action' => 'validates' ],
                [ 'step_type' => 'agent',      'agent_name' => 'Gatekeeper',   'agent_action' => 'enforces policy and closes the audit trail' ],
                [ 'step_type' => 'human_gate', 'agent_name' => '', 'agent_action' => '' ],
            ],
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <div class="sx-workflow-band">
            <div class="sx-workflow-band__header">
                <h2 class="sx-workflow-band__title"><?php echo esc_html( $s['band_title'] ); ?></h2>
            </div>

            <div class="sx-workflow-band__track">
                <?php foreach ( ( $s['steps'] ?? [] ) as $step ) :
                    if ( $step['step_type'] === 'human_gate' ) : ?>
                        <div class="sx-workflow-step sx-workflow-step--gate">
                            <div class="sx-workflow-step__gate-icon" aria-label="Human Gate">&#11042;</div>
                            <span class="sx-workflow-step__gate-label">Human gate</span>
                        </div>
                        <div class="sx-workflow-connector sx-workflow-connector--after-gate" aria-hidden="true"></div>
                    <?php else : ?>
                        <div class="sx-workflow-step sx-workflow-step--agent">
                            <div class="sx-workflow-step__node"><?php echo esc_html( $step['agent_name'] ); ?></div>
                            <p class="sx-workflow-step__action"><?php echo esc_html( $step['agent_action'] ); ?></p>
                        </div>
                        <div class="sx-workflow-connector" aria-hidden="true"></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <?php if ( $s['band_summary'] ) : ?>
                <p class="sx-workflow-band__summary"><?php echo esc_html( $s['band_summary'] ); ?></p>
            <?php endif; ?>
        </div>
        <?php
    }
}
