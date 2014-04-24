<?php
/**
 * Default template for footer sidebars.
 *
 * @package Follet_Theme
 * @since   1.0
 */
?>

	<div id="footer-sidebars" role="navigation" class="<?php follet_container_class( 'footer-sidebars' ); ?>">

		<?php $i = 1; while( $i <= 3 ) : ?>

			<?php if (     is_active_sidebar( 'sidebar-footer-' . $i )
			           and follet_get_current( 'sidebar_footer_' . $i . '_show' ) ) : ?>

				<div id="sidebar-footer-<?php echo $i; ?>" class="widget-area <?php follet_footer_column_span(); ?>" role="complementary">
					<?php dynamic_sidebar( 'sidebar-footer-' . $i ); ?>
				</div>

			<?php endif; ?>

		<?php $i++; endwhile; ?>

	</div>
