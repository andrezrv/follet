<?php
/**
 * Template for the featured image of a post.
 *
 * @package Follet
 * @since   1.0
 */
?>
	<?php if ( has_post_thumbnail() ): ?>
		<?php the_post_thumbnail();?>
	<?php endif; ?>
