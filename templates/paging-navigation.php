<?php
/**
 * Navigation for next and previous page into blog.
 *
 * @package Follet
 * @since   1.0
 */

?>

    <?php if ( $GLOBALS['wp_query']->max_num_pages > 1 ) : // Don't print empty markup if there's only one page. ?>

		<nav class="navigation paging-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'follet_theme' ); ?></h1>
			<div class="nav-links">

				<?php if ( get_next_posts_link() ) : ?>
					<div class="nav-previous pull-left">
						<?php next_posts_link( sprintf(
							__( '%s Older posts', 'follet_theme' ),
							'<span class="icon icon-previous"></span>'
						) ); ?>
					</div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
					<div class="nav-next pull-right">
						<?php previous_posts_link( sprintf(
							__( 'Newer posts %s', 'follet_theme' ),
							'<span class="icon icon-next"></span>'
						) ); ?>
					</div>
				<?php endif; ?>

			</div>
		</nav>

	<?php endif; ?>
