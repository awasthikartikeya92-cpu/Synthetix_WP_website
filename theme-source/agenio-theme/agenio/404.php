<?php
/**
 * The 404 template file
 *
 * @package agenio
 */
get_header();
$page_title  = agenio_get_option( '404_page_title', '404 Page Not Found' );
$description = agenio_get_option( '404_description', 'Sorry, we couldn\'t find the page you where looking for.<br>We suggest that you return to homepage.' );
$button_text = agenio_get_option( '404_button_text', 'Back To Home' );
$button_url  = agenio_get_option( '404_button_url',  home_url( '/' ) );
?>
<!-- wpr banner area start -->
<section class="wpr-banner-area breadcrumb error-page">
    <div class="container">
        <div class="banner-content-area">
            <h1 class="section-title text-normal wow scaleIn" data-wow-delay=".7s">
                <?php echo esc_html( $page_title ); ?>
            </h1>
            <p class="desc">
                <?php echo wp_kses( $description, array( 'br' => array() ) ); ?>
            </p>
            <div class="button-area">
                <a href="<?php echo esc_url( $button_url ); ?>" class="wpr-btn btn-primary with-icon">
                    <div class="inner">
                        <div class="icon">
                            <?php for ( $i = 0; $i < 6; $i++ ) : ?>
                            <span>
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon/button-arrow.svg" alt="">
                            </span>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <?php echo esc_html( $button_text ); ?>
                </a>
            </div>
            <div class="bg-shape">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner/shape/bg-shape.svg" alt="">
            </div>
            <div class="banner-shape-area">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner/shape/shape-01.svg" width="200" alt="" class="one wow fadeInLeft" data-wow-delay=".5s">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner/shape/shape-02.svg" width="220" alt="" class="two wow fadeInRight" data-wow-delay=".5s">
            </div>
        </div>
    </div>
</section>
<!-- wpr banner area end -->
<?php get_footer(); ?>
