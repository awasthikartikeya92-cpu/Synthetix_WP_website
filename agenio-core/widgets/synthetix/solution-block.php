<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Synthetix Solution Block Widget
 *
 * One per solution (4 total on /solutions):
 *   Greenfield (Imagine) · Code Modernization (Reimagine) ·
 *   Application Support (Evolve) · Infrastructure Support (Evolve)
 *
 * Fields: brand-frame eyebrow, solution name, intro, "What agents do"
 * bullets, "Outcomes" stat+label repeater, For/Agents/Engagement tags.
 */
class Elementor_Synthetix_Solution_Block_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'synthetix_solution_block';
    }

    public function get_title() {
        return esc_html__( 'Synthetix Solution Block', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-layout-settings';
    }

    public function get_categories() {
        return [ 'agenio' ];
    }

    protected function register_controls() {

        /* ── Header ── */
        $this->start_controls_section( 'header_section', [
            'label' => esc_html__( 'Header', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'brand_frame', [
            'label'       => esc_html__( 'Brand Frame (italic eyebrow, e.g. Imagine)', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => 'Imagine.',
            'description' => 'Shown in italic above the solution name per copy spec.',
        ] );

        $this->add_control( 'solution_name', [
            'label'   => esc_html__( 'Solution Name (H2)', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Greenfield Development',
        ] );

        $this->add_control( 'solution_intro', [
            'label'   => esc_html__( 'Intro Paragraph', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::WYSIWYG,
            'default' => '',
        ] );

        $this->end_controls_section();

        /* ── What Agents Do ── */
        $this->start_controls_section( 'agents_do_section', [
            'label' => esc_html__( 'What Agents Do', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $do_repeater = new \Elementor\Repeater();
        $do_repeater->add_control( 'bullet', [
            'label' => esc_html__( 'Bullet', 'agenio-core' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ] );

        $this->add_control( 'agents_do', [
            'label'       => esc_html__( 'Bullets', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $do_repeater->get_controls(),
            'title_field' => '{{{ bullet }}}',
        ] );

        $this->end_controls_section();

        /* ── Outcomes ── */
        $this->start_controls_section( 'outcomes_section', [
            'label' => esc_html__( 'Outcomes', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $out_repeater = new \Elementor\Repeater();
        $out_repeater->add_control( 'stat', [
            'label'   => esc_html__( 'Stat / Number', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '14 → 2 weeks',
        ] );
        $out_repeater->add_control( 'stat_label', [
            'label'   => esc_html__( 'Label', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'from business brief to working scaffold',
        ] );

        $this->add_control( 'outcomes', [
            'label'       => esc_html__( 'Outcome Stats', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $out_repeater->get_controls(),
            'title_field' => '{{{ stat }}}',
        ] );

        $this->end_controls_section();

        /* ── Engagement Tags ── */
        $this->start_controls_section( 'tags_section', [
            'label' => esc_html__( 'Engagement Tags', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'for_text', [
            'label'   => esc_html__( 'For:', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '',
        ] );

        $this->add_control( 'agents_engaged', [
            'label'   => esc_html__( 'Agents Engaged:', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Scout · Architect · Estimator · Critic · Conductor · Examiner',
        ] );

        $this->add_control( 'typical_engagement', [
            'label'   => esc_html__( 'Typical Engagement:', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '',
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <div class="sx-solution-block">
            <div class="sx-solution-block__header">
                <em class="sx-solution-block__brand-frame"><?php echo esc_html( $s['brand_frame'] ); ?></em>
                <h2 class="sx-solution-block__name"><?php echo esc_html( $s['solution_name'] ); ?></h2>
            </div>

            <?php if ( $s['solution_intro'] ) : ?>
                <div class="sx-solution-block__intro"><?php echo wp_kses_post( $s['solution_intro'] ); ?></div>
            <?php endif; ?>

            <?php if ( ! empty( $s['agents_do'] ) ) : ?>
                <div class="sx-solution-block__section">
                    <h4 class="sx-solution-block__section-label">What agents do</h4>
                    <ul class="sx-solution-block__bullets">
                        <?php foreach ( $s['agents_do'] as $item ) : ?>
                            <li><?php echo esc_html( $item['bullet'] ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if ( ! empty( $s['outcomes'] ) ) : ?>
                <div class="sx-solution-block__section">
                    <h4 class="sx-solution-block__section-label">Outcomes</h4>
                    <ul class="sx-solution-block__outcomes">
                        <?php foreach ( $s['outcomes'] as $item ) : ?>
                            <li>
                                <strong class="sx-solution-block__stat"><?php echo esc_html( $item['stat'] ); ?></strong>
                                <span class="sx-solution-block__stat-label"><?php echo esc_html( $item['stat_label'] ); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="sx-solution-block__tags">
                <?php if ( $s['for_text'] ) : ?>
                    <p class="sx-solution-block__tag-row"><span class="sx-tag-label">For:</span> <?php echo esc_html( $s['for_text'] ); ?></p>
                <?php endif; ?>
                <?php if ( $s['agents_engaged'] ) : ?>
                    <p class="sx-solution-block__tag-row"><span class="sx-tag-label">Agents engaged:</span> <?php echo esc_html( $s['agents_engaged'] ); ?></p>
                <?php endif; ?>
                <?php if ( $s['typical_engagement'] ) : ?>
                    <p class="sx-solution-block__tag-row"><span class="sx-tag-label">Typical engagement:</span> <?php echo esc_html( $s['typical_engagement'] ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}
