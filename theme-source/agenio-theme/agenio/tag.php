<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agenio
 */
get_header(); ?>

<!-- wpr banner area start -->
<section class="wpr-banner-area breadcrumb">
    <div class="container">
        <div class="banner-content-area">
            <h1 class="section-title text-normal wow scaleIn" data-wow-delay=".7s">
            	<?php esc_html_e('Tag Archives: ', 'agenio' ); echo single_tag_title( '', false ); ?>
            </h1>
            <div class="breadcrumbs effectFade fadeUp">
	            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="link1">
	                <?php echo esc_html__( 'Home', 'agenio' ); ?>
	            </a>
            	<div><?php echo esc_html__( '/', 'agenio' ); ?></div>
            	<div><?php echo esc_html__( 'Tag Archives', 'agenio' ); ?></div>
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

<!-- Blog With Sidebar -->
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
                            if ( have_posts() ) : 
                                while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/content', 'single' );

                            endwhile; 
                            endif; 
                        ?>
                        <div class="wd-full effectFade fadeUp no-div">
                            <?php
                            if ( function_exists( 'agenio_pagination' ) ) {
                                echo agenio_pagination();
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
<!-- /Blog With Sidebar -->
<?php get_footer(); ?>
