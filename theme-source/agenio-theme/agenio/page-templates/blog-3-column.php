<?php
/*
 * Template Name: Blog Three Column
 */
get_header();
$selected_categories = agenio_get_option( 'agenio_category_selection_3', array() );
$number_of_posts     = agenio_get_option( 'agenio_number_of_posts_3', 6 );
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

<!-- Blog Grid 3 -->
<section class="wpr-blog-area mb--16">
    <div class="container">
        <div class="section-inner border-1">
            <div class="tf-grid-layout md-col-2 xl-col-3">
                <?php
                if ( $blog_query->have_posts() ) :
                    while ( $blog_query->have_posts() ) :
                        $blog_query->the_post();
                        $categories = get_the_category();
                ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class( 'article-blog hover-img effectFade fadeUp no-div' ); ?>>
                        <a href="<?php the_permalink(); ?>" class="blog-image img-style">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'full', array(
                                    'loading' => 'lazy',
                                    'width'   => '426',
                                    'height'  => '307',
                                    'alt'     => get_the_title(),
                                ) ); ?>
                            <?php endif; ?>
                        </a>
                        <div class="blog-content">
                            <div class="infor">
                                <p class="infor_sub text-secondary">
                                    <?php if ( ! empty( $categories ) ) echo esc_html( $categories[0]->name ); ?>
                                </p>
                                <h2 class="h6 fw-semibold">
                                    <?php if ( is_sticky() ) : ?>
                                        <span><i class="fa-regular fa-globe"></i></span>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" class="link1 infor_name">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="tf-btn-2">
                                <?php esc_html_e( 'Read more', 'agenio' ); ?>
                                <i class="icon icon-arrow-top-right"></i>
                            </a>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p class="text-white-64"><?php esc_html_e( 'No posts found.', 'agenio' ); ?></p>
                <?php endif; ?>
            </div>
            <?php
            if ( function_exists( 'agenio_pagination' ) ) {
                agenio_pagination( $blog_query );
            }
            ?>
        </div>
    </div>
</section>
<!-- /Blog Grid 3 -->

<?php get_footer(); ?>