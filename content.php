<?php
/**
 * Default file for content visualization.
 *
 * @package Follet_Theme
 * @since   1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( follet_post_classes() ); ?> <?php follet_microdata( 'post' ); ?>>

	<?php get_template_part( 'templates/post-thumbnail', '' ); ?>

	<header class="entry-header">

		<?php if ( follet_get_current( 'post_avatar_show' ) ) : ?>
			<?php echo get_avatar( get_the_author_meta( 'email' ), '86' ); ?>
		<?php endif; ?>

		<h1 class="entry-title" <?php follet_microdata( 'entry-title' ); ?>>
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php follet_posted_on(); ?>
			</div>
		<?php endif; ?>

	</header>

	<?php // Only display Excerpts for Search and Home, if excerpt exists. ?>
	<?php if ( ( is_search() or is_home() or is_archive() ) && $post->post_excerpt ) : ?>

		<div class="entry-summary" <?php follet_microdata( 'entry-summary' ); ?>>
			<?php the_excerpt(); ?>
			<?php follet_continue_reading( true, true ); ?>
		</div>

		<?php if ( follet_get_current( 'show_footer_in_summary' ) ) : ?>
			<?php get_template_part( 'templates/content-footer', '' ); ?>
		<?php endif; ?>

	<?php else : ?>

		<div class="entry-content" <?php follet_microdata( 'entry-content' ); ?>>

			<?php the_content( follet_continue_reading() ); ?>

			<?php follet_link_pages(); // Uses wp_link_pages(). ?>

		</div>

		<?php get_template_part( 'templates/content-footer', '' ); ?>

	<?php endif; ?>

</article>
