<?php

if ( ! class_exists( 'Redux' ) ) {
    return;
}

function agenio_redux_icon_font() {
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fontawesome-all.css' );
}
add_action( 'redux/page/agenio_options/enqueue', 'agenio_redux_icon_font' );

$opt_name = "agenio_options";
$theme    = wp_get_theme();

$args = array(
    'opt_name'           => $opt_name,
    'display_name'       => $theme->get( 'Name' ),
    'display_version'    => $theme->get( 'Version' ),
    'menu_type'          => 'menu',
    'allow_sub_menu'     => true,
    'menu_title'         => esc_html__( 'Agenio Options', 'agenio' ),
    'google_api_key'     => '',
    'google_update_weekly' => false,
    'async_typography'   => true,
    'admin_bar'          => false,
    'admin_bar_icon'     => '',
    'admin_bar_priority' => 50,
    'global_variable'    => $opt_name,
    'dev_mode'           => false,
    'update_notice'      => false,
    'customizer'         => false,
    'page_priority'      => 3,
    'page_parent'        => 'themes.php',
    'page_permissions'   => 'manage_options',
    'menu_icon'          => '',
    'last_tab'           => '',
    'page_icon'          => 'icon-themes',
    'page_slug'          => 'themeoptions',
    'save_defaults'      => true,
    'default_show'       => false,
    'default_mark'       => '',
    'show_import_export' => true,
);

Redux::setArgs( $opt_name, $args );

// ─── 404 Page ─────────────────────────────────────────────────────────────────

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( '404 Page', 'agenio' ),
    'id'     => 'agenio_404_settings',
    'icon'   => 'el el-error',
    'fields' => array(

        array(
            'id'      => '404_page_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Page Title', 'agenio' ),
            'default' => '404 Page Not Found',
        ),

        array(
            'id'      => '404_description',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Description Text', 'agenio' ),
            'default' => 'Sorry, we couldn\'t find the page you where looking for.<br>We suggest that you return to homepage.',
        ),

        array(
            'id'      => '404_button_text',
            'type'    => 'text',
            'title'   => esc_html__( 'Button Text', 'agenio' ),
            'default' => 'Back To Home',
        ),

        array(
            'id'      => '404_button_url',
            'type'    => 'text',
            'title'   => esc_html__( 'Button URL', 'agenio' ),
            'default' => home_url( '/' ),
        ),

    ),
) );

// ─── Blog Settings ────────────────────────────────────────────────────────────

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Blog Settings', 'agenio' ),
    'id'     => 'blog-settings',
    'desc'   => __( 'Settings for displaying blog posts', 'agenio' ),
    'icon'   => 'fas fa-file-alt',
    'fields' => array(

        // ─── Blog Standard ────────────────────────────────────────────────────
        array(
            'title'  => esc_html__( 'Blog Standard', 'agenio' ),
            'id'     => 'blog-standard',
            'type'   => 'section',
            'indent' => true,
        ),
        array(
            'id'       => 'agenio_category_selection_1',
            'type'     => 'select',
            'multi'    => true,
            'title'    => __( 'Select Categories', 'agenio' ),
            'subtitle' => __( 'Choose categories to display posts from. Leave empty to show all.', 'agenio' ),
            'data'     => 'categories',
            'default'  => array(),
        ),
        array(
            'id'       => 'agenio_number_of_posts_1',
            'type'     => 'text',
            'title'    => __( 'Number of Posts', 'agenio' ),
            'subtitle' => __( 'Number of posts to display per page.', 'agenio' ),
            'validate' => 'numeric',
            'default'  => '6',
        ),

        // ─── Blog Grid 2 Column ───────────────────────────────────────────────
        array(
            'title'  => esc_html__( 'Blog Grid — 2 Column', 'agenio' ),
            'id'     => 'blog-two',
            'type'   => 'section',
            'indent' => true,
        ),
        array(
            'id'       => 'agenio_category_selection_2',
            'type'     => 'select',
            'multi'    => true,
            'title'    => __( 'Select Categories', 'agenio' ),
            'subtitle' => __( 'Choose categories to display posts from. Leave empty to show all.', 'agenio' ),
            'data'     => 'categories',
            'default'  => array(),
        ),
        array(
            'id'       => 'agenio_number_of_posts_2',
            'type'     => 'text',
            'title'    => __( 'Number of Posts', 'agenio' ),
            'subtitle' => __( 'Number of posts to display per page.', 'agenio' ),
            'validate' => 'numeric',
            'default'  => '6',
        ),

        // ─── Blog Grid 3 Column ───────────────────────────────────────────────
        array(
            'title'  => esc_html__( 'Blog Grid — 3 Column', 'agenio' ),
            'id'     => 'blog-three',
            'type'   => 'section',
            'indent' => true,
        ),
        array(
            'id'       => 'agenio_category_selection_3',
            'type'     => 'select',
            'multi'    => true,
            'title'    => __( 'Select Categories', 'agenio' ),
            'subtitle' => __( 'Choose categories to display posts from. Leave empty to show all.', 'agenio' ),
            'data'     => 'categories',
            'default'  => array(),
        ),
        array(
            'id'       => 'agenio_number_of_posts_3',
            'type'     => 'text',
            'title'    => __( 'Number of Posts', 'agenio' ),
            'subtitle' => __( 'Number of posts to display per page.', 'agenio' ),
            'validate' => 'numeric',
            'default'  => '6',
        ),

    ),
) );

// ─── Site Elements ────────────────────────────────────────────────────────────

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Site Elements', 'agenio' ),
    'id'     => 'site-elements',
    'desc'   => __( 'Control global UI elements shown on every page.', 'agenio' ),
    'icon'   => 'fas fa-sliders-h',
    'fields' => array(

        // ─── Scroll To Top ────────────────────────────────────────────────────
        array(
            'title'  => esc_html__( 'Scroll To Top', 'agenio' ),
            'id'     => 'agenio-scrolltop',
            'type'   => 'section',
            'indent' => true,
        ),
        array(
            'id'      => 'agenio_scrolltop_enable',
            'type'    => 'switch',
            'title'   => __( 'Enable Scroll To Top Button', 'agenio' ),
            'default' => true,
        ),

        // ─── Preloader ────────────────────────────────────────────────────────
        array(
            'title'  => esc_html__( 'Preloader', 'agenio' ),
            'id'     => 'agenio-preloader',
            'type'   => 'section',
            'indent' => true,
        ),
        array(
            'id'      => 'agenio_preloader_enable',
            'type'    => 'switch',
            'title'   => __( 'Enable Preloader', 'agenio' ),
            'default' => true,
        ),
        array(
            'id'       => 'agenio_preloader_site_name',
            'type'     => 'text',
            'title'    => __( 'Preloader Site Name', 'agenio' ),
            'subtitle' => __( 'Text displayed inside the preloader.', 'agenio' ),
            'default'  => 'AGENIO',
            'required' => array( 'agenio_preloader_enable', '=', true ),
        ),

    ),
) );