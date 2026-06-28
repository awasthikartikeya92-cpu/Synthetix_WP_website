<?php
/**
 * Template part for displaying page content
 * File: template-parts/content-page.php
 * Theme: Agenio
 * @package agenio
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-single-wrap' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="image effectFade fadeZoom">
            <?php
            echo get_the_post_thumbnail(
                get_the_ID(),
                'full',
                array(
                    'loading' => 'lazy',
                    'width'   => '777',
                    'height'  => '548',
                    'alt'     => the_title_attribute( array( 'echo' => false ) ),
                )
            );
            ?>
        </div>
    <?php endif; ?>
    <div class="meta-list">
        <div class="meta-item">
            <i class="icon icon-user-solid"></i>
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="link"><?php echo esc_html( get_the_author() ); ?></a>
        </div>
        <div class="meta-item">
            <i class="icon icon-clock-solid"></i>
            <a href="<?php echo esc_url( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ) ); ?>" class="link"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></a>
        </div>
        <div class="meta-item">
            <i class="icon icon-comments-solid"></i>
            <span><?php echo esc_html( get_comments_number_text( __( 'No Comments', 'agenio' ), __( '1 Comment', 'agenio' ), __( '% Comments', 'agenio' ) ) ); ?></span>
        </div>
    </div>
    <div class="text-body-2 mb--0">
        <?php
        the_content();
        wp_link_pages();
        ?>
    </div>
</div>