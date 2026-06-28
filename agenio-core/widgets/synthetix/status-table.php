<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Synthetix Status Table Widget
 *
 * Used on Governance /04 Security & Compliance.
 * Three columns: Standard/Control · Coverage · Status (badge)
 * Status values map to CSS badge classes:
 *   ACTIVE       → .sx-badge--active   (--color-success  #26CF4B)
 *   IN PROGRESS  → .sx-badge--progress (--color-warning  #FF8F3C)
 *   ROADMAP      → .sx-badge--roadmap  (--color-info     #1BA2DB)
 *
 * Supports an optional group-header row (e.g. "Certifications", "Security Controls")
 * to separate logical sections within the same table.
 */
class Elementor_Synthetix_Status_Table_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'synthetix_status_table';
    }

    public function get_title() {
        return esc_html__( 'Synthetix Status Table', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-table-of-contents';
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
            'default' => '04 / Security & Compliance',
        ] );

        $this->add_control( 'section_title', [
            'label'   => esc_html__( 'Section Title', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'The certifications, controls, and audit posture that regulated industries require before any contract is signed.',
        ] );

        $this->add_control( 'section_intro', [
            'label'   => esc_html__( 'Intro Paragraph', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::WYSIWYG,
            'default' => '',
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'rows_section', [
            'label' => esc_html__( 'Table Rows', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control( 'row_type', [
            'label'   => esc_html__( 'Row Type', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'data'   => 'Data Row',
                'group'  => 'Group Header (full-width label)',
            ],
            'default' => 'data',
        ] );

        $repeater->add_control( 'group_label', [
            'label'     => esc_html__( 'Group Label', 'agenio-core' ),
            'type'      => \Elementor\Controls_Manager::TEXT,
            'default'   => 'Certifications',
            'condition' => [ 'row_type' => 'group' ],
        ] );

        $repeater->add_control( 'standard', [
            'label'     => esc_html__( 'Standard / Control', 'agenio-core' ),
            'type'      => \Elementor\Controls_Manager::TEXT,
            'condition' => [ 'row_type' => 'data' ],
        ] );

        $repeater->add_control( 'coverage', [
            'label'     => esc_html__( 'Coverage', 'agenio-core' ),
            'type'      => \Elementor\Controls_Manager::TEXTAREA,
            'condition' => [ 'row_type' => 'data' ],
        ] );

        $repeater->add_control( 'status', [
            'label'     => esc_html__( 'Status', 'agenio-core' ),
            'type'      => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                'ACTIVE'      => 'ACTIVE',
                'IN PROGRESS' => 'IN PROGRESS',
                'ROADMAP'     => 'ROADMAP',
            ],
            'default'   => 'ACTIVE',
            'condition' => [ 'row_type' => 'data' ],
        ] );

        $this->add_control( 'rows', [
            'label'       => esc_html__( 'Rows', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ row_type === "group" ? group_label : standard }}}',
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $status_class_map = [
            'ACTIVE'      => 'sx-badge--active',
            'IN PROGRESS' => 'sx-badge--progress',
            'ROADMAP'     => 'sx-badge--roadmap',
        ];
        ?>
        <div class="sx-status-table-wrap">
            <?php if ( $s['section_eyebrow'] || $s['section_title'] ) : ?>
                <div class="sx-status-table-wrap__intro">
                    <?php if ( $s['section_eyebrow'] ) : ?>
                        <span class="sx-eyebrow"><?php echo esc_html( $s['section_eyebrow'] ); ?></span>
                    <?php endif; ?>
                    <?php if ( $s['section_title'] ) : ?>
                        <h2 class="sx-status-table-wrap__title"><?php echo esc_html( $s['section_title'] ); ?></h2>
                    <?php endif; ?>
                    <?php if ( $s['section_intro'] ) : ?>
                        <div class="sx-status-table-wrap__desc"><?php echo wp_kses_post( $s['section_intro'] ); ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="sx-data-table-scroll">
                <table class="sx-data-table sx-status-table">
                    <thead>
                        <tr>
                            <th>Standard / Control</th>
                            <th>Coverage</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( ( $s['rows'] ?? [] ) as $row ) :
                            if ( $row['row_type'] === 'group' ) : ?>
                                <tr class="sx-status-table__group-row">
                                    <td colspan="3"><?php echo esc_html( $row['group_label'] ); ?></td>
                                </tr>
                            <?php else :
                                $badge_class = $status_class_map[ $row['status'] ] ?? 'sx-badge--active';
                            ?>
                                <tr>
                                    <td><?php echo esc_html( $row['standard'] ); ?></td>
                                    <td><?php echo wp_kses_post( $row['coverage'] ); ?></td>
                                    <td><span class="sx-badge <?php echo esc_attr( $badge_class ); ?>"><?php echo esc_html( $row['status'] ); ?></span></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
}
