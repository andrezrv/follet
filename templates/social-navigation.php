<?php
/**
 * Default template to show social navigation links for this theme.
 *
 * @package Follet_Theme
 * @since   1.0
 */
?>
	<?php $social_navigation = follet_get_current( 'social_navigation_show' ) ? wp_nav_menu( array( 'container' => false, 'theme_location' => 'social-menu', 'fallback_cb' => false, 'link_before' => '<span class="sr-only">', 'link_after' => '</span>', 'echo' => false ) ) : false; ?>

	<div id="social-menu" class="col-sm-6">
		<?php echo $social_navigation; ?>
	</div>
