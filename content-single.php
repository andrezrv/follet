<?php
/**
 * content-single.php
 *
 * This file handles content for single posts.
 *
 * @package Follet_Theme
 * @since   1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php follet_microdata( 'post' ); ?>>

	<?php get_template_part( 'templates/post-thumbnail', get_post_format() ); ?>

	<header class="entry-header">

		<?php if ( follet_get_current( 'post_avatar_show' ) ) : ?>
			<?php echo get_avatar( get_the_author_meta( 'email' ), '86' ); ?>
		<?php endif; ?>

		<h1 class="entry-title" <?php follet_microdata( 'entry-title' ); ?>>
			<?php the_title(); ?>
		</h1>

		<div class="entry-meta">
			<?php follet_posted_on(); ?>
		</div>

	</header>

	<div class="entry-content" <?php follet_microdata( 'entry-content' ); ?>>

		<?php the_content(); ?>

		<?php follet_link_pages(); ?>

	</div>

	<?php if ( follet_get_current( 'post_author_info_show' ) ) : ?>
		<?php get_template_part( 'templates/author-info', 'single' ); ?>
	<?php endif; ?>

	<?php get_template_part( 'templates/content-footer', get_post_format() ); ?>

</article>
