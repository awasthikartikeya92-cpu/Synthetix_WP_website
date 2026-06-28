<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Synthetix Data Table Widget
 *
 * Generic 3-column data table (Col A / Col B / Col C).
 * Used for:
 *   - Governance 01: Autonomy Matrix (Mode / Agent Posture / Human Touchpoints)
 *   - Governance 02: Policy Class table (Policy Class / Examples / Default Action)
 *   - Governance 03: Provenance & Audit (Record / What's Captured / Audit Use)
 *   - Why Synthetix: Cost-driver table
 *
 * Column headers and rows are fully configurable via Elementor repeater.
 */
class Elementor_Synthetix_Data_Table_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'synthetix_data_table';
    }

    public function get_title() {
        return esc_html__( 'Synthetix Data Table', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-table';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* ── Section intro ── */
        $this->start_controls_section( 'intro_section', [
            'label' => esc_html__( 'Section Intro', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'section_eyebrow', [
            'label'   => esc_html__( 'Eyebrow (e.g. 01 / Human-in-the-Loop)', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '',
        ] );

        $this->add_control( 'section_title', [
            'label'   => esc_html__( 'Section Title', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '',
        ] );

        $this->add_control( 'section_intro', [
            'label'   => esc_html__( 'Intro Paragraphs', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::WYSIWYG,
            'default' => '',
        ] );

        $this->end_controls_section();

        /* ── Column headers ── */
        $this->start_controls_section( 'headers_section', [
            'label' => esc_html__( 'Column Headers', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'col_a_header', [
            'label'   => esc_html__( 'Column A Header', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Mode',
        ] );

        $this->add_control( 'col_b_header', [
            'label'   => esc_html__( 'Column B Header', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Agent Posture',
        ] );

        $this->add_control( 'col_c_header', [
            'label'   => esc_html__( 'Column C Header', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Human Touchpoints',
        ] );

        $this->end_controls_section();

        /* ── Rows ── */
        $this->start_controls_section( 'rows_section', [
            'label' => esc_html__( 'Table Rows', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control( 'col_a', [
            'label' => esc_html__( 'Column A', 'agenio-core' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ] );

        $repeater->add_control( 'col_b', [
            'label' => esc_html__( 'Column B', 'agenio-core' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ] );

        $repeater->add_control( 'col_c', [
            'label' => esc_html__( 'Column C', 'agenio-core' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ] );

        $this->add_control( 'rows', [
            'label'       => esc_html__( 'Rows', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ col_a }}}',
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <div class="sx-data-table-wrap">
            <?php if ( $s['section_eyebrow'] || $s['section_title'] ) : ?>
                <div class="sx-data-table-wrap__intro">
                    <?php if ( $s['section_eyebrow'] ) : ?>
                        <span class="sx-eyebrow"><?php echo esc_html( $s['section_eyebrow'] ); ?></span>
                    <?php endif; ?>
                    <?php if ( $s['section_title'] ) : ?>
                        <h2 class="sx-data-table-wrap__title"><?php echo esc_html( $s['section_title'] ); ?></h2>
                    <?php endif; ?>
                    <?php if ( $s['section_intro'] ) : ?>
                        <div class="sx-data-table-wrap__desc"><?php echo wp_kses_post( $s['section_intro'] ); ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="sx-data-table-scroll">
                <table class="sx-data-table">
                    <thead>
                        <tr>
                            <th><?php echo esc_html( $s['col_a_header'] ); ?></th>
                            <th><?php echo esc_html( $s['col_b_header'] ); ?></th>
                            <th><?php echo esc_html( $s['col_c_header'] ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( ( $s['rows'] ?? [] ) as $row ) : ?>
                            <tr>
                                <td><?php echo wp_kses_post( $row['col_a'] ); ?></td>
                                <td><?php echo wp_kses_post( $row['col_b'] ); ?></td>
                                <td><?php echo wp_kses_post( $row['col_c'] ); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
}
