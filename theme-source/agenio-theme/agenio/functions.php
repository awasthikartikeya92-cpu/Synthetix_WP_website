<?php

/**
 * agenio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package agenio
 */

/*TGM PLUGIN*/

require_once get_template_directory() . '/tgm-plugin/recommend_plugins.php';

/**
 * Enqueue Google Fonts
 */
function agenio_fonts() {
    wp_enqueue_style(
        'agenio-fonts',
        'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap',
        array(),
        null,
        'all'
    );
}
add_action( 'wp_enqueue_scripts', 'agenio_fonts' );

/**
 * Enqueue Agenio theme styles.
 */

function agenio_enqueue_styles() {

    $theme_uri = get_template_directory_uri();

    wp_enqueue_style( 'swiper', $theme_uri . '/assets/css/plugins/swiper.min.css',     array(), null );

    wp_enqueue_style( 'metismenu', $theme_uri . '/assets/css/plugins/metismenu.css',       array( 'swiper' ), null );

    wp_enqueue_style( 'bootstrap', $theme_uri . '/assets/css/vendor/bootstrap.min.css',    array( 'metismenu' ), null );

    wp_enqueue_style( 'animate', $theme_uri . '/assets/css/vendor/animate.css',          array( 'bootstrap' ), null );

    wp_enqueue_style( 'odometer', $theme_uri . '/assets/css/plugins/odometer.css',        array( 'animate' ),  null );

    wp_enqueue_style( 'fontawesome', $theme_uri . '/assets/css/plugins/fontawesome.min.css', array( 'odometer' ), null );

    wp_enqueue_style( 'agenio-unittest', $theme_uri . '/assets/css/wordpress-unit-test.css',                   array( 'fontawesome' ), null );

    wp_enqueue_style( 'agenio-style', $theme_uri . '/assets/css/style.css',                   array( 'fontawesome' ), null );
}

add_action( 'wp_enqueue_scripts', 'agenio_enqueue_styles' );

/**
 * Enqueue Agenio theme scripts.
 */

function agenio_enqueue_scripts() {
    $theme_uri = get_template_directory_uri();

    wp_add_inline_script( 'jquery', 'var $ = jQuery.noConflict();', 'after' );

    wp_enqueue_script( 'bootstrap', $theme_uri . '/assets/js/plugins/bootstrap.min.js',  array( 'jquery' ), null, true );

    wp_enqueue_script( 'metismenu', $theme_uri . '/assets/js/plugins/metismenu.js',       array( 'bootstrap' ), null, true );

    wp_enqueue_script( 'jqueryui', $theme_uri . '/assets/js/vendor/jqueryui.js',         array( 'metismenu' ), null, true );

    wp_enqueue_script( 'waypoint', $theme_uri . '/assets/js/vendor/waypoint.js',         array( 'jqueryui' ), null, true );

    wp_enqueue_script( 'swiper', $theme_uri . '/assets/js/plugins/swiper.js',          array( 'waypoint' ), null, true );

    wp_enqueue_script( 'gsap', $theme_uri . '/assets/js/plugins/gsap.min.js',        array( 'swiper' ), null, true );

    wp_enqueue_script( 'scrolltrigger', $theme_uri . '/assets/js/plugins/scrolltrigger.js',    array( 'gsap' ), null, true );

    wp_enqueue_script( 'smoothscroll', $theme_uri . '/assets/js/plugins/smoothscroll.js',    array( 'scrolltrigger' ), null, true );

    wp_enqueue_script( 'split-text', $theme_uri . '/assets/js/vendor/split-text.js', array( 'smoothscroll' ), null, true );

    wp_enqueue_script( 'split-type', $theme_uri . '/assets/js/vendor/split-type.js', array( 'split-text' ), null, true );

    wp_enqueue_script( 'wow', $theme_uri . '/assets/js/vendor/wow.js', array( 'split-type' ), null, true );

    wp_enqueue_script( 'text-plugin', $theme_uri . '/assets/js/vendor/text-plugin.js',      array( 'wow' ), null, true );

    wp_enqueue_script( 'odometer', $theme_uri . '/assets/js/plugins/odometer.js', array( 'text-plugin' ), null, true );

    wp_enqueue_script( 'agenio-contact-form', $theme_uri . '/assets/js/plugins/contact-form.js',    array( 'odometer' ), null, true );

    wp_enqueue_script( 'agenio-main', $theme_uri . '/assets/js/main.js', array( 'agenio-contact-form' ), null, true );
}
add_action( 'wp_enqueue_scripts', 'agenio_enqueue_scripts' );

/**
 * Agenio Theme Configuration
 */

function agenio_theme_config() {

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_editor_style('assets/css/editor-style.css');

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));

    if (!isset($content_width)) $content_width = 900;

    // Load theme textdomain
    $agenio_lang = get_template_directory_uri() . '/languages';
    load_theme_textdomain('agenio', $agenio_lang);

    /*REDUX PLUGIN*/

    require_once get_template_directory() . '/inc/redux/config.php';

}

add_action('after_setup_theme', 'agenio_theme_config');

/**
 * Agenio Options
 */

function agenio_get_option( $key, $default = '' ) {

    $options = get_option( 'agenio_options' );

    if ( is_array( $options ) && isset( $options[$key] ) ) {
        return $options[$key];
    }

    return $default;
}

/**
* Agenio Pagination
*/

function agenio_pagination( $custom_query = null ) {
    global $wp_query;
    $query = $custom_query ? $custom_query : $wp_query;
    if ( $query->max_num_pages <= 1 ) {
        return;
    }
    $big          = 999999999;
    $current_page = max( 1, get_query_var( 'paged' ) );
    $links = paginate_links( array(
        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'    => '?paged=%#%',
        'current'   => $current_page,
        'total'     => $query->max_num_pages,
        'mid_size'  => 1,
        'end_size'  => 1,
        'prev_next' => false,
        'type'      => 'array',
    ) );
    if ( empty( $links ) ) {
        return;
    }
    echo '<ul class="wg-pagination">';
    // Prev button — only show if not on first page
    if ( $current_page > 1 ) {
        echo '<li>';
        echo '<a href="' . esc_url( get_pagenum_link( $current_page - 1 ) ) . '" class="pagination-item"><i class="fa-regular fa-chevron-left"></i></a>';
        echo '</li>';
    }
    foreach ( $links as $link ) {
        // Current page
        if ( strpos( $link, 'current' ) !== false ) {
            preg_match( '/>(.*?)</', $link, $match );
            $number = isset( $match[1] ) ? $match[1] : '';
            echo '<li>';
            echo '<a href="#" class="pagination-item active">' . esc_html( $number ) . '</a>';
            echo '</li>';
        }
        // Ellipsis
        elseif ( strpos( $link, 'dots' ) !== false ) {
            echo '<li>';
            echo '<a href="#" class="pagination-item">...</a>';
            echo '</li>';
        }
        // Normal page link
        else {
            preg_match( '/href="([^"]+)"/', $link, $url_match );
            preg_match( '/>(.*?)</', $link, $text_match );
            $url  = isset( $url_match[1] ) ? $url_match[1] : '#';
            $text = isset( $text_match[1] ) ? $text_match[1] : '';
            echo '<li>';
            echo '<a href="' . esc_url( $url ) . '" class="pagination-item">' . esc_html( $text ) . '</a>';
            echo '</li>';
        }
    }
    // Next button — only show if not on last page
    if ( $current_page < $query->max_num_pages ) {
        echo '<li>';
        echo '<a href="' . esc_url( get_pagenum_link( $current_page + 1 ) ) . '" class="pagination-item"><i class="fa-regular fa-chevron-right"></i></a>';
        echo '</li>';
    }
    echo '</ul>';
}

/**
 * Agenio Body Class
 */

function agenio_body_classes( $classes ) {
    $classes[] = 'home-bg main-home onepage overflow-x-visible';
    return $classes;
}
add_filter( 'body_class', 'agenio_body_classes' );

/**
 * Agenio Theme - Body Open Elements
 * Outputs preloader and scroll-to-top after <body> tag.
 */

if ( ! function_exists( 'agenio_body_open_elements' ) ) {
    function agenio_body_open_elements() {
        $scrolltop_enable   = agenio_get_option( 'agenio_scrolltop_enable',    false );
        $preloader_enable   = agenio_get_option( 'agenio_preloader_enable',    true );
        $preloader_sitename = agenio_get_option( 'agenio_preloader_site_name', 'AGENIO' );
        ?>

        <?php if ( $preloader_enable ) : ?>
        <!-- Preload -->
        <div class="preloader overflow-hidden">
            <div class="site-name"><span><?php echo esc_html( $preloader_sitename ); ?></span></div>
            <div class="preloader-gutters">
                <?php for ( $i = 0; $i < 8; $i++ ) : ?>
                <div class="bar">
                    <div class="inner-bar"></div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
        <!-- /Preload -->
        <?php endif; ?>

        <?php if ( $scrolltop_enable ) : ?>
            <button id="goTop" class="show">
            <span class="border-progress" style="--progress-angle: 360deg;"></span>
            <span class="ic-wrap">
            <span class="icon icon-long-arrow-alt-up-solid"><i class="fa-sharp fa-regular fa-arrow-up-long"></i></span>
            </span>
            </button>
        <?php endif; ?>

    <?php }
}

add_action( 'wp_body_open', 'agenio_body_open_elements' );

/**
 * Agenio Register Widgets
 */

add_action( 'widgets_init', 'agenio_widgets_init' );
function agenio_widgets_init() {

        register_sidebar( array(
        'name' => esc_html__( 'Main Sidebar', 'agenio' ),
        'id' => 'main-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown on all posts and pages.', 'agenio' ),
        'before_widget' => '<div id="%1$s" class="sidebar-item effectFade fadeUp no-div %2$s">',
    'after_widget'  => '</div>',
        'before_title'  => ' <h5 class="sidebar-title">',
        'after_title'   => '</h5>',
   
    ) );
}

/**
 * Agenio Tags Widget
 */

add_filter( 'widget_tag_cloud_args', 'agenio_change_tag_cloud_font_sizes');
function agenio_change_tag_cloud_font_sizes( array $args ) {
    $args['default'] = '13';
    $args['smallest'] = '13';
    $args['largest'] = '13';
    $args['unit'] = 'px';

    return $args;
}

/* Comments Callback */

function agenio_comment_callback( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    $avatar_url  = get_avatar_url( $comment, array( 'size' => 48 ) );
    $author_name = get_comment_author( $comment );
    $author_url  = get_comment_author_url( $comment );
    $date_time   = get_comment_date( 'F j, Y', $comment ) . ' at ' . get_comment_time( 'g:i a', false, $comment );
    $text_raw    = get_comment_text( $comment );
    $text_clean  = trim( wp_strip_all_tags( $text_raw ) );
    $comment_class = 'author';
    if ( $depth > 1 ) {
        $comment_class .= ' type-reply';
    }
    ?>
    <div class="<?php echo esc_attr( $comment_class ); ?>">
        <div class="image">
            <img loading="lazy" width="48" height="48" src="<?php echo esc_url( $avatar_url ); ?>" alt="<?php echo esc_attr( $author_name ); ?>">
        </div>
        <div class="content">
            <div class="info">
                <h2 class="h6 name fw-semibold text-body-1">
                    <a class="link1" href="<?php echo esc_url( $author_url ? $author_url : '#' ); ?>">
                        <?php echo esc_html( $author_name ); ?>
                    </a>
                </h2>
                <p class="time text-body-3 text-white-64">
                    <?php echo esc_html( $date_time ); ?>
                </p>
            </div>
            <?php
            comment_reply_link( array_merge( $args, array(
                'reply_text' => 'Reply<i class="icon icon-arrow-top-right"></i>',
                'depth'      => $depth,
                'max_depth'  => $args['max_depth'],
                'before'     => '<span class="reply link1">',
                'after'      => '</span>'
            ) ) );
            ?>
            <p class="desc">" <?php echo esc_html( $text_clean ); ?> "</p>
        </div>
    </div>
    <?php
}

/**
 * Load Custom Menu Walker and Register Menu
 */
require_once get_template_directory() . '/inc/class-agenio-walker-header-menu.php';
require_once get_template_directory() . '/inc/class-agenio-walker-mobile-menu.php';

function agenio_register_menus() {
    register_nav_menus( array(
        'main-menu' => 'Main Menu',
    ) );
}
add_action( 'init', 'agenio_register_menus' );

/**
 * Agenio Contact Form Filter 
 */

add_filter('wpcf7_autop_or_not', '__return_false');

// agenio Replace Demo Link

function agenio_replace_demo_urls() {
    global $wpdb;

    $old = 'https:\/\/wpriverthemes.com\/agenio\/';
    $new = str_replace( '/', '\/', home_url( '/' ) );

    $wpdb->query(
        $wpdb->prepare(
            "UPDATE {$wpdb->postmeta}
             SET meta_value = REPLACE(meta_value, %s, %s)
             WHERE meta_key = '_elementor_data'",
            $old,
            $new
        )
    );
}

// Agenio Demo-Import

function agenio_import_files() {
    return array(

        array(
            'import_file_name'           => 'Home Version One',
            'import_file_url'            => trailingslashit(home_url('/')) . 'wp-content/themes/agenio/inc/demo-import/data.xml',
            'import_widget_file_url'     => trailingslashit(home_url('/')) . 'wp-content/themes/agenio/inc/demo-import/widget.wie',
            'import_customizer_file_url' => trailingslashit(home_url('/')) . 'wp-content/themes/agenio/inc/demo-import/custom.dat',
            'import_redux'               => array(
                array(
                    'file_url'    => trailingslashit(home_url('/')) . 'wp-content/themes/agenio/inc/demo-import/redux.json',
                    'option_name' => 'agenio_options',
                ),
            ),
            'import_notice'              => esc_html__( 'Import process may take 2-5 minutes. If you are facing any issues, please contact our support.', 'agenio' ),
            'preview_url'                => 'https://wpriverthemes.com/agenio/',
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'agenio_import_files' );

function agenio_ocdi_after_import( $selected_import ) {

    if ( 'Home Version One' === $selected_import['import_file_name'] ) {

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home Version One' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    }

    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
        )
    );

    agenio_replace_demo_urls();

    if ( get_option( 'permalink_structure' ) === '' ) {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
    flush_rewrite_rules();
    }

    if ( class_exists( '\Elementor\Plugin' ) ) {
        \Elementor\Plugin::$instance->files_manager->clear_cache();
    }

}
add_action( 'pt-ocdi/after_import', 'agenio_ocdi_after_import' );
