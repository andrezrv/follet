<?php
/**
 * Default template for top navigation.
 *
 * @package Follet_Theme
 * @since   1.0
 */
?>


	<?php $top_navigation = follet_get_current( 'top_navigation_show' ) ? wp_nav_menu( array( 'container' => false, 'menu_class' => 'nav navbar-nav', 'theme_location' => 'top-menu', 'fallback_cb' => false, 'walker' => new Follet_Walker_Nav_Menu, 'echo' => false ) ) : false; ?>

	<?php if ( $top_navigation ) : ?>

		<nav id="top-navigation-wrapper" class="site-navigation navbar <?php follet_top_navigation_style(); ?>" role="navigation" <?php follet_microdata( 'navigation' ); ?>>

			<div id="top-navigation" class="<?php follet_container_class( 'top-navigation' ); ?>">

				<?php if ( get_theme_support( 'bootstrap' ) ) : ?>
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-navigation-menu-navbar">
							<span class="sr-only"><?php _e( 'Toggle navigation', 'follet' ); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				<?php endif; ?>

				<div id="top-navigation-menu-navbar" class="navbar-collapse collapse">

					<?php echo $top_navigation; ?>

					<?php if ( follet_get_current( 'top_navigation_searchform_show' ) ) : ?>

						<div id="top-navigation-searchform-show" class="visible-lg visible-md visible-sm">
							<a href="#" class="icon icon-search"></a>
						</div>
						<div id="top-navigation-searchform" class="visible-xs">
							<?php get_template_part( 'searchform', get_post_format() ); ?>
						</div>

					<?php endif; ?>

				</div>

			</div>

		</nav>

	<?php endif; ?>
