<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Follet_Theme
 * @since   1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php follet_microdata( 'page' ); ?>>

	<?php get_template_part( 'templates/post-thumbnail', get_post_format() ); ?>

	<header class="entry-header">
		<h1 class="entry-title" <?php follet_microdata( 'entry-title' ); ?>>
			<?php the_title(); ?>
		</h1>
	</header>

	<div class="entry-content" <?php follet_microdata( 'entry-content' ); ?>>

		<?php the_content(); ?>

		<?php follet_link_pages(); // Uses wp_link_pages(). ?>

	</div>

	<?php if ( current_user_can( 'edit_pages' ) ) : ?>
		<footer class="entry-meta">
			<?php follet_edit_post_link(); // Uses edit_post_link(). ?>
		</footer>
	<?php endif; ?>

</article>
