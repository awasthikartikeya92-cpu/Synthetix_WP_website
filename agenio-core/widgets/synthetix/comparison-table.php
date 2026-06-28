<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Synthetix Comparison Table Widget
 *
 * Used on /why for Synthetix vs Copilots / Frameworks / Autonomous Coders.
 * Also reusable for the Autonomy Matrix on /governance (if needed as
 * a visual grid rather than a plain data table).
 *
 * Structure:
 *   - Optional section eyebrow + title + intro
 *   - Column headers repeater (first column = feature label, rest = product/option names)
 *   - Row repeater: feature name + cell values per column
 *   - Cell value type: text, checkmark (✓), cross (✗), or custom
 */
class Elementor_Synthetix_Comparison_Table_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'synthetix_comparison_table';
    }

    public function get_title() {
        return esc_html__( 'Synthetix Comparison Table', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-table';
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
            'default' => '',
        ] );

        $this->add_control( 'section_title', [
            'label'   => esc_html__( 'Section Title', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '',
        ] );

        $this->add_control( 'section_intro', [
            'label'   => esc_html__( 'Intro Paragraph', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::WYSIWYG,
            'default' => '',
        ] );

        $this->end_controls_section();

        /* Column headers — stored as JSON in a textarea for simplicity
           since Elementor doesn't have a simple string-array control.
           Developer enters: Synthetix, Copilots, Frameworks, Autonomous Coders */
        $this->start_controls_section( 'columns_section', [
            'label' => esc_html__( 'Column Headers', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'feature_col_label', [
            'label'   => esc_html__( 'Feature Column Label', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Capability',
        ] );

        $this->add_control( 'col_headers', [
            'label'       => esc_html__( 'Product Column Headers (one per line)', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::TEXTAREA,
            'default'     => "Synthetix\nCopilots\nFrameworks\nAutonomous Coders",
            'description' => 'One column header per line. First header (Synthetix) will be highlighted.',
        ] );

        $this->end_controls_section();

        /* Rows */
        $this->start_controls_section( 'rows_section', [
            'label' => esc_html__( 'Comparison Rows', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control( 'feature', [
            'label' => esc_html__( 'Feature / Capability', 'agenio-core' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ] );

        $repeater->add_control( 'cells', [
            'label'       => esc_html__( 'Cell Values (one per line, matching column order)', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::TEXTAREA,
            'description' => 'Use ✓ for yes, ✗ for no, or free text. One value per line.',
        ] );

        $this->add_control( 'rows', [
            'label'       => esc_html__( 'Rows', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ feature }}}',
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s       = $this->get_settings_for_display();
        $headers = array_filter( array_map( 'trim', explode( "\n", $s['col_headers'] ?? '' ) ) );
        $rows    = $s['rows'] ?? [];
        ?>
        <div class="sx-comparison-table-wrap">
            <?php if ( $s['section_eyebrow'] || $s['section_title'] ) : ?>
                <div class="sx-comparison-table-wrap__intro">
                    <?php if ( $s['section_eyebrow'] ) : ?>
                        <span class="sx-eyebrow"><?php echo esc_html( $s['section_eyebrow'] ); ?></span>
                    <?php endif; ?>
                    <?php if ( $s['section_title'] ) : ?>
                        <h2 class="sx-comparison-table-wrap__title"><?php echo esc_html( $s['section_title'] ); ?></h2>
                    <?php endif; ?>
                    <?php if ( $s['section_intro'] ) : ?>
                        <div class="sx-comparison-table-wrap__desc"><?php echo wp_kses_post( $s['section_intro'] ); ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="sx-data-table-scroll">
                <table class="sx-data-table sx-comparison-table">
                    <thead>
                        <tr>
                            <th><?php echo esc_html( $s['feature_col_label'] ); ?></th>
                            <?php foreach ( array_values( $headers ) as $i => $h ) : ?>
                                <th class="<?php echo $i === 0 ? 'sx-comparison-table__highlight-col' : ''; ?>">
                                    <?php echo esc_html( $h ); ?>
                                </th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $rows as $row ) :
                            $cells = array_map( 'trim', explode( "\n", $row['cells'] ?? '' ) );
                        ?>
                            <tr>
                                <td class="sx-comparison-table__feature"><?php echo esc_html( $row['feature'] ); ?></td>
                                <?php foreach ( array_values( $headers ) as $i => $_ ) :
                                    $cell = $cells[ $i ] ?? '';
                                    $cell_class = $i === 0 ? 'sx-comparison-table__highlight-col' : '';
                                    $display = $cell === '✓' ? '<span class="sx-check" aria-label="Yes">✓</span>'
                                             : ( $cell === '✗' ? '<span class="sx-cross" aria-label="No">✗</span>'
                                             : esc_html( $cell ) );
                                ?>
                                    <td class="<?php echo esc_attr( $cell_class ); ?>"><?php echo $display; ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
}
