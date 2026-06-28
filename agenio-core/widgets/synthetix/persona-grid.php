<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Synthetix Persona Grid Widget
 *
 * 8-card stakeholder grid for /why — Stakeholder Value section.
 * Cards: CIO/CTO, Enterprise Architect, CISO/Risk, CFO/Procurement,
 *        PMO, Engineering Leadership, Security Ops (+ 1 from full doc).
 *
 * Each card: role title, accountability line, body paragraph.
 * Photo is optional (placeholder if not supplied — flagged in DEV_HANDOFF).
 */
class Elementor_Synthetix_Persona_Grid_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'synthetix_persona_grid';
    }

    public function get_title() {
        return esc_html__( 'Synthetix Persona Grid', 'agenio-core' );
    }

    public function get_icon() {
        return 'eicon-person';
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
            'default' => 'Stakeholder Value',
        ] );

        $this->add_control( 'section_title', [
            'label'   => esc_html__( 'Section Title', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '',
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'cards_section', [
            'label' => esc_html__( 'Persona Cards', 'agenio-core' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control( 'persona_role', [
            'label'   => esc_html__( 'Role Title', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'CIO / CTO',
        ] );

        $repeater->add_control( 'accountability', [
            'label'   => esc_html__( 'Accountability Line', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '',
        ] );

        $repeater->add_control( 'persona_body', [
            'label'   => esc_html__( 'Body', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::WYSIWYG,
            'default' => '',
        ] );

        $repeater->add_control( 'persona_icon', [
            'label'   => esc_html__( 'Icon (optional)', 'agenio-core' ),
            'type'    => \Elementor\Controls_Manager::MEDIA,
            'default' => [ 'url' => '' ],
        ] );

        $this->add_control( 'personas', [
            'label'       => esc_html__( 'Personas', 'agenio-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ persona_role }}}',
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <div class="sx-persona-grid-wrap">
            <?php if ( $s['section_eyebrow'] || $s['section_title'] ) : ?>
                <div class="sx-persona-grid-wrap__intro">
                    <?php if ( $s['section_eyebrow'] ) : ?>
                        <span class="sx-eyebrow"><?php echo esc_html( $s['section_eyebrow'] ); ?></span>
                    <?php endif; ?>
                    <?php if ( $s['section_title'] ) : ?>
                        <h2 class="sx-persona-grid-wrap__title"><?php echo esc_html( $s['section_title'] ); ?></h2>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="sx-persona-grid">
                <?php foreach ( ( $s['personas'] ?? [] ) as $card ) : ?>
                    <div class="sx-persona-card">
                        <?php if ( ! empty( $card['persona_icon']['url'] ) ) : ?>
                            <div class="sx-persona-card__icon">
                                <img src="<?php echo esc_url( $card['persona_icon']['url'] ); ?>" alt="<?php echo esc_attr( $card['persona_role'] ); ?>" loading="lazy">
                            </div>
                        <?php endif; ?>
                        <h3 class="sx-persona-card__role"><?php echo esc_html( $card['persona_role'] ); ?></h3>
                        <?php if ( $card['accountability'] ) : ?>
                            <p class="sx-persona-card__accountability"><?php echo esc_html( $card['accountability'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( $card['persona_body'] ) : ?>
                            <div class="sx-persona-card__body"><?php echo wp_kses_post( $card['persona_body'] ); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}
