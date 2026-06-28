<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Synthetix custom Elementor widgets — loader.
 *
 * Add this require to agenio-core.php (inside the elementor/widgets/register action):
 *   require_once plugin_dir_path( __FILE__ ) . 'synthetix-widgets.php';
 */

$widget_files = [
    'agent-card',
    'solution-block',
    'workflow-diagram',
    'pipeline',
    'integrations-grid',
    'data-table',
    'status-table',
    'deployment-grid',
    'comparison-table',
    'persona-grid',
];

foreach ( $widget_files as $widget ) {
    $path = plugin_dir_path( __FILE__ ) . 'widgets/synthetix/' . $widget . '.php';
    if ( file_exists( $path ) ) {
        require_once $path;
    }
}

add_action( 'elementor/widgets/register', function ( $widgets_manager ) {
    $widgets_manager->register( new Elementor_Synthetix_Agent_Card_Widget() );
    $widgets_manager->register( new Elementor_Synthetix_Solution_Block_Widget() );
    $widgets_manager->register( new Elementor_Synthetix_Workflow_Diagram_Widget() );
    $widgets_manager->register( new Elementor_Synthetix_Pipeline_Widget() );
    $widgets_manager->register( new Elementor_Synthetix_Integrations_Grid_Widget() );
    $widgets_manager->register( new Elementor_Synthetix_Data_Table_Widget() );
    $widgets_manager->register( new Elementor_Synthetix_Status_Table_Widget() );
    $widgets_manager->register( new Elementor_Synthetix_Deployment_Grid_Widget() );
    $widgets_manager->register( new Elementor_Synthetix_Comparison_Table_Widget() );
    $widgets_manager->register( new Elementor_Synthetix_Persona_Grid_Widget() );
} );

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'synthetix-widgets',
        plugin_dir_url( __FILE__ ) . 'assets/css/synthetix-widgets.css',
        [],
        '1.0.0'
    );
} );
