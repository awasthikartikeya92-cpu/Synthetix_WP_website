<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agenio
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
$categories    = get_the_category();
$category_name = '';
if ( ! empty( $categories ) ) {
    $category_name = $categories[0]->name;
}
if ( '' === $category_name ) {
    $category_name = __( 'Uncategorized', 'agenio' );
}
?>
<div class="article-blog style-horizontal hover-img effectFade fadeUp no-div">
    <a href="<?php echo esc_url( get_permalink() ); ?>" class="blog-image img-style">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'full', array( 'loading' => 'lazy', 'width' => '426', 'height' => '307', 'alt' => get_the_title() ) ); ?>
        <?php endif; ?>
    </a>
    <div class="blog-content">
        <div class="infor">
            <p class="infor_sub text-secondary">
                <?php echo esc_html( $category_name ); ?>
            </p>
            <h2 class="h6 fw-semibold">
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="link1 infor_name">
                    <?php if ( is_sticky() ) : ?><span><i class="fa-regular fa-globe"></i></span><?php endif; ?> <?php echo esc_html( get_the_title() ); ?>
                </a>
            </h2>
        </div>
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="tf-btn-2">
            <?php echo esc_html__( 'Read more', 'agenio' ); ?>
        </a>
    </div>
</div>
</div>