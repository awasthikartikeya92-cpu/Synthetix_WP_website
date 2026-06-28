<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Synthetix Integrations Grid Widget
 *
 * Grouped integration categories for /platform.
 * 8 category groups × tool-name lists (copy from WPC-Synthetix-Platform.docx,
 * not yet received — widget structure ready, defaults are placeholders).
 *
 * Each group: category name + repeater of tool names (text tags).
 * Logo images are optional (flagged as placeholder in DEV_HANDOFF).
 */
class Elementor_Synthetix_Integrations_Grid_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'synthetix_integrations_grid';
    }

    public function get_title() {
        return esc_html__( 'Synthetix Integrations Grid', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-plug';
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
            'default' => 'Integrations',
        ] );

        $this->add_control( 'section_title', [
            'label'   => esc_html__( 'Section Title', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '',
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'groups_section', [
            'label' => esc_html__( 'Integration Groups', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control( 'group_name', [
            'label'   => esc_html__( 'Category Name', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Source Control',
        ] );

        $repeater->add_control( 'tool_names', [
            'label'       => esc_html__( 'Tool Names (one per line)', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::TEXTAREA,
            'default'     => "GitHub\nGitLab\nBitbucket",
            'description' => 'One tool name per line. Logos can be added via Media Library — flag to developer.',
        ] );

        $this->add_control( 'groups', [
            'label'       => esc_html__( 'Groups', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ group_name }}}',
            'default'     => [
                [ 'group_name' => 'Source Control',       'tool_names' => "GitHub\nGitLab\nBitbucket" ],
                [ 'group_name' => 'CI/CD',                'tool_names' => "Jenkins\nGitHub Actions\nAzure DevOps" ],
                [ 'group_name' => 'IaC',                  'tool_names' => "Terraform\nAnsible\nPulumi\nCloudFormation" ],
                [ 'group_name' => 'Observability',        'tool_names' => "Datadog\nDynatrace\nNew Relic\nSplunk" ],
                [ 'group_name' => 'Ticketing',            'tool_names' => "Jira\nServiceNow\nLinear" ],
                [ 'group_name' => 'Communication',        'tool_names' => "Slack\nMicrosoft Teams" ],
                [ 'group_name' => 'Incident Management',  'tool_names' => "PagerDuty\nOpsGenie" ],
                [ 'group_name' => 'Identity & Access',    'tool_names' => "Okta\nMicrosoft Entra ID\nPing Identity" ],
            ],
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <div class="sx-integrations-wrap">
            <?php if ( $s['section_eyebrow'] || $s['section_title'] ) : ?>
                <div class="sx-integrations-wrap__intro">
                    <?php if ( $s['section_eyebrow'] ) : ?>
                        <span class="sx-eyebrow"><?php echo esc_html( $s['section_eyebrow'] ); ?></span>
                    <?php endif; ?>
                    <?php if ( $s['section_title'] ) : ?>
                        <h2 class="sx-integrations-wrap__title"><?php echo esc_html( $s['section_title'] ); ?></h2>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="sx-integrations-grid">
                <?php foreach ( ( $s['groups'] ?? [] ) as $group ) :
                    $tools = array_filter( array_map( 'trim', explode( "\n", $group['tool_names'] ?? '' ) ) );
                ?>
                    <div class="sx-integrations-group">
                        <h4 class="sx-integrations-group__name"><?php echo esc_html( $group['group_name'] ); ?></h4>
                        <ul class="sx-integrations-group__tools">
                            <?php foreach ( $tools as $tool ) : ?>
                                <li><?php echo esc_html( $tool ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}
