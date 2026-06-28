<?php
/**
 * The template for displaying Comments.
 *
 * @package agenio
 */

if ( post_password_required() )
    return;
?>

<div class="comment-wrap">

    <?php if ( have_comments() ) : ?>

        <h2 class="h4 heading fw-semibold">
            <?php comments_number(
                esc_html__( '0 Comment', 'agenio' ),
                esc_html__( '1 Comment', 'agenio' ),
                esc_html__( '% Comments', 'agenio' )
            ); ?>
        </h2>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <div class="text-center">
            <ul class="pagination">
                <li>
                    <?php paginate_comments_links( array(
                        'prev_text' => wp_specialchars_decode( '<i class="fa-regular fa-chevron-left"></i>', ENT_QUOTES ),
                        'next_text' => wp_specialchars_decode( '<i class="fa-regular fa-chevron-right"></i>', ENT_QUOTES ),
                    ) ); ?>
                </li>
            </ul>
        </div>
        <?php endif; ?>

        <ol class="comment-list">
            <?php wp_list_comments( array(
                'callback' => 'agenio_comment_callback',
                'style'    => 'ol',
            ) ); ?>
        </ol>

    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'agenio' ); ?></p>
    <?php endif; ?>

</div><!-- /.comment-wrap -->

<?php if ( comments_open() ) : ?>
<div class="post-comment" id="post-comment">

    <h2 class="h4 heading fw-semibold">
        <?php comment_form_title( esc_html__( 'Post a Comments', 'agenio' ), esc_html__( 'Reply to %s', 'agenio' ) ); ?>
    </h2>

    <a rel="nofollow" id="cancel-comment-reply-link" href="#post-comment" style="display:none;">
        <?php esc_html_e( 'Cancel reply', 'agenio' ); ?>
    </a>

    <?php if ( is_user_logged_in() ) : ?>
        <p class="logged-in-as text text-body-1">
            <?php
            $user = wp_get_current_user();
            printf(
                esc_html__( 'Logged in as %1$s. %2$s', 'agenio' ),
                '<strong>' . esc_html( $user->display_name ) . '</strong>',
                '<a href="' . esc_url( wp_logout_url( get_permalink() ) ) . '">' . esc_html__( 'Log out?', 'agenio' ) . '</a>'
            );
            ?>
        </p>
    <?php else : ?>
        <p class="text text-body-1">
            <?php esc_html_e( 'Your email address will not be published. Required fields are marked *', 'agenio' ); ?>
        </p>
    <?php endif; ?>

    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <form action="<?php echo esc_url( home_url( '/wp-comments-post.php' ) ); ?>" method="post" id="commentform" class="form-cta style-2" novalidate>

        <div class="form-content">

            <?php if ( ! is_user_logged_in() ) : ?>

                <?php $commenter = wp_get_current_commenter(); ?>

                <fieldset class="">
                    <label class="fw-semibold text-body-3 mb-12" for="author">
                        <?php esc_html_e( 'Your Name', 'agenio' ); ?>
                        <?php if ( get_option( 'require_name_email' ) ) : ?><span class="text-primary">*</span><?php endif; ?>
                    </label>
                    <input
                        id="author"
                        name="author"
                        type="text"
                        value="<?php echo esc_attr( $commenter['comment_author'] ); ?>"
                        placeholder="<?php esc_attr_e( 'Enter your full name', 'agenio' ); ?>"
                        <?php echo get_option( 'require_name_email' ) ? 'required' : ''; ?>
                    >
                </fieldset>

                <fieldset class="">
                    <label class="fw-semibold text-body-3 mb-12" for="email">
                        <?php esc_html_e( 'Your Email', 'agenio' ); ?>
                        <?php if ( get_option( 'require_name_email' ) ) : ?><span class="text-primary">*</span><?php endif; ?>
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="<?php echo esc_attr( $commenter['comment_author_email'] ); ?>"
                        placeholder="<?php esc_attr_e( 'Enter your email', 'agenio' ); ?>"
                        <?php echo get_option( 'require_name_email' ) ? 'required' : ''; ?>
                    >
                </fieldset>

            <?php endif; ?>

            <fieldset class="">
                <label class="fw-semibold text-body-3 mb-12" for="comment">
                    <?php esc_html_e( 'Comments', 'agenio' ); ?>
                </label>
                <textarea id="comment" name="comment" class="rounded-0" placeholder="<?php esc_attr_e( 'Enter your Comment', 'agenio' ); ?>" required></textarea>
            </fieldset>

        </div>

        <div class="form-action">
            <button type="submit" id="submit" class="wpr-btn btn-primary w-100">
                <?php esc_html_e( 'Post Comment', 'agenio' ); ?>
            </button>
            <?php comment_id_fields(); ?>
        </div>

    </form>

</div><!-- /.post-comment -->
<?php endif; ?>
