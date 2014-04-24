<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Follet_Theme
 * @since   1.0
 */
?>

			</div>

		</div>

		<?php if ( follet_get_current( 'footer_show' ) ) : ?>

			<footer id="footer" class="main-footer" role="contentinfo" <?php follet_microdata( 'footer' ); ?>>

				<?php if ( follet_get_current( 'back_to_top_show' ) ) : ?>
					<?php get_template_part( 'templates/back-to-top', get_post_format() );  ?>
				<?php endif; ?>

				<?php if ( follet_footer_column_span( $return = true ) ) : ?>
					<?php get_template_part( 'templates/footer-sidebars', get_post_format() ); ?>
					<hr class="separator" />
				<?php endif; ?>

				<?php
					if (   follet_get_current( 'footer_credits_show' )
						or follet_get_current( 'social_navigation_show' ) ) :
				?>

					<div role="navigation" class="<?php follet_container_class( 'footer-container' ); ?>">

						<?php if ( follet_get_current( 'footer_credits_show' ) ) : ?>
							<?php get_template_part( 'templates/footer-credits', get_post_format() ); ?>
						<?php endif; ?>

						<?php if ( follet_get_current( 'social_navigation_show' ) ) : ?>
							<?php get_template_part( 'templates/social-navigation', get_post_format() ); ?>
						<?php endif; ?>

					</div>

				<?php endif; ?>

			</footer>

		<?php endif; ?>

	</div>

	<?php wp_footer(); ?>

</body>

</html>
