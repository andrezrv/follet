<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Follet_Theme
 * @since   1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title">
			<?php printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'follet_theme' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

			<nav id="comment-nav-above" class="comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'follet_theme' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'follet_theme' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'follet_theme' ) ); ?></div>
			</nav>

		<?php endif; ?>

		<ol class="comment-list">
			<?php follet_list_comments( array( 'style' => 'ol', 'short_ping' => true, 'avatar_size' => 60 ) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

			<nav id="comment-nav-below" class="comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'follet_theme' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'follet_theme' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'follet_theme' ) ); ?></div>
			</nav>

		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : // If comments are closed and there are comments, let's leave a little note, shall we? ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'follet_theme' ); ?></p>
	<?php endif; ?>

	<?php
	$req = get_option( 'require_name_email' );
    $fields =  array(
            // redefine author field
        'author' => '<div class="comment-form-element author"><label for="author">' . __( 'Name:', wp_get_theme()->get( 'TextDomain' ) ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><div class="input-group"><span class="input-group-addon"></span><input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" aria-required="true"' . ' required /></div></div>',
        'email' => '<div class="comment-form-element email"><label for="email">' . __( 'Email Address:', wp_get_theme()->get( 'TextDomain' ) ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><div class="input-group"><span class="input-group-addon"></span><input id="email" name="email" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" aria-required="true"' . ' required /></div></div>',
        'url' => '<div class="comment-form-element url"><label for="url">' . __( 'Your Website:', wp_get_theme()->get( 'TextDomain' ) ) . '</label><div class="input-group"><span class="input-group-addon"></span><input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" aria-required="true"' . ' /></div></div>',
        );
    $comments_args = array(
        'fields' => $fields,
            // redefine your own textarea (the comment body)
        'comment_field' => '<div class="comment-form-element comment"><label for="comment">' . 'Comment' . '</label><textarea id="comment" name="comment" class="col-sm-12 form-control" rows="5" aria-required="true"></textarea></div>',
        );

	ob_start();
	comment_form( $comments_args );
    $form = ob_get_contents();
    ob_clean();
	$form = str_replace( 'id="submit"', 'id="submit" class="btn btn-primary btn-lg"', $form );
	echo $form;

    ?>

</div>
