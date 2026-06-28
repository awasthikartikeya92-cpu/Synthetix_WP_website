<?php
/*
 * Template Name: Blog Standard
 */
get_header();
$selected_categories = agenio_get_option( 'agenio_category_selection_1', array() );
$number_of_posts     = agenio_get_option( 'agenio_number_of_posts_1', 6 );
$paged               = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => $number_of_posts,
    'paged'          => $paged,
);
if ( ! empty( $selected_categories ) ) {
    $args['category__in'] = $selected_categories;
}
$blog_query = new WP_Query( $args );
?>

<!-- wpr banner area start -->
<section class="wpr-banner-area breadcrumb">
    <div class="container">
        <div class="banner-content-area">
            <h1 class="section-title text-normal wow scaleIn" data-wow-delay=".7s">
                <?php the_title(); ?>
            </h1>
            <div class="breadcrumbs effectFade fadeUp">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="link1">
                    <?php echo esc_html__( 'Home', 'agenio' ); ?>
                </a>
                <div><?php echo esc_html__( '/', 'agenio' ); ?></div>
                <div><?php the_title(); ?></div>
            </div>
            <div class="bg-shape">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner/shape/bg-shape.svg" alt="">
            </div>
            <div class="banner-shape-area">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner/shape/shape-01.svg" width="200" alt="" class="one wow fadeInLeft" data-wow-delay=".5s">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner/shape/shape-02.svg" width="200" alt="" class="two wow fadeInLeft" data-wow-delay=".5s">
            </div>
        </div>
    </div>
</section>
<!-- wpr banner area end -->

<!-- Blog Standard -->
<section class="wpr-blog-area mb--16">
    <div class="container">
        <div class="section-inner border-1">
            <div class="row justify-content-between">
                <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
                    <div class="col-xl-7 col-lg-8">
                <?php else : ?>
                    <div class="col-xl-12 col-lg-12">
                <?php endif; ?>
                    <div class="tf-grid-layout">
                        <?php
                        if ( $blog_query->have_posts() ) :
                            while ( $blog_query->have_posts() ) :
                                $blog_query->the_post();
                                get_template_part( 'template-parts/content', 'single' );
                            endwhile;
                            wp_reset_postdata();
                        else : ?>
                            <p class="text-white-64"><?php esc_html_e( 'No posts found.', 'agenio' ); ?></p>
                        <?php endif; ?>
                        <div class="wd-full effectFade fadeUp no-div">
                            <?php
                            if ( function_exists( 'agenio_pagination' ) ) {
                                agenio_pagination( $blog_query );
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
                    <?php get_sidebar(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- /Blog Standard -->

<?php get_footer(); ?>