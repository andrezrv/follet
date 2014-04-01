<?php
/**
 * Navigation for next and previous entry into post.
 *
 * @package Follet
 * @since   1.0
 */
?>

	<?php if ( follet_previous_post_exists() or follet_next_post_exists() ) : ?>

		<nav class="navigation post-navigation" role="navigation">

			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'follet_theme' ); ?></h1>

			<div class="nav-links">
				<?php
					previous_post_link(
						'<div class="nav-previous pull-left">%link</div>',
						_x( '<span class="meta-nav">&larr; %title</span>', 'Previous post link', 'follet_theme' )
					);
					next_post_link(
						'<div class="nav-next pull-right">%link</div>',
						_x( '<span class="meta-nav">%title &rarr;</span>','Next post link', 'follet' )
					);
				?>
			</div>

		</nav>

	<?php endif; ?>
