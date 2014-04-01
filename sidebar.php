<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Follet_Theme
 * @since   1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-primary' ) and follet_get_current( 'sidebar_primary_show' ) ) : ?>

		<div id="secondary" class="widget-area col-sm-4">

			<aside id="sidebar-primary" class="sidebar" <?php follet_microdata( 'sidebar' ); ?> role="complementary">
				<?php dynamic_sidebar( 'sidebar-primary' ); ?>
			</aside>

		</div>

	<?php endif; ?>
