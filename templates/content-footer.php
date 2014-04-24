<?php
/**
 * The footer for all post formats and types.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Follet
 * @since   1.0
 */
?>
	<footer class="entry-meta">

		<?php if (   ( $categories_list = get_the_category_list( __( ', ', 'follet_theme' ) ) )
				  && follet_categorized_blog() ) : ?>

			<section class="cat-links" <?php follet_microdata( 'cat-links' ); ?>>
				<span class="icon icon-category"></span>&nbsp;
				<?php printf( __( 'Posted in %1$s', 'follet_theme' ), $categories_list ); ?>
			</section>

		<?php endif; ?>

		<?php if ( $tags_list = get_the_tag_list( '', ', ') ) : ?>

			<section class="tags-links" <?php follet_microdata( 'tag-links' ); ?>>
				<span class="icon icon-tag"></span>&nbsp;
				<?php printf( __( 'Tagged %1$s', 'follet_theme' ), $tags_list ); ?>
			</section>

		<?php endif; ?>

		<section class="permalink" <?php follet_microdata( 'permalink' ); ?>>
			<span class="icon icon-permalink"></span>&nbsp;
			<a href="<?php the_permalink(); ?>" role="link" <?php follet_microdata( 'url' ); ?>>
				<?php _e( 'Permalink', 'follet_theme' ); ?>
			</a>
		</section>

		<?php follet_edit_post_link(); ?>

	</footer>
