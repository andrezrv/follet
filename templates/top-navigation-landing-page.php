<?php
/**
 * Top navigation for landing pages.
 *
 * @package Follet_Theme
 * @since   1.1
 */
?>


	<?php $top_navigation = follet_get_current( 'top_navigation_show' ) ? wp_nav_menu( array( 'container' => false, 'menu_class' => 'nav navbar-nav', 'theme_location' => 'top-menu', 'fallback_cb' => false, 'walker' => new Follet_Walker_Nav_Menu, 'echo' => false ) ) : false; ?>

	<?php if ( $top_navigation ) : ?>

		<nav id="top-navigation-wrapper" class="site-navigation navbar <?php follet_top_navigation_style(); ?>" role="navigation" <?php follet_microdata( 'navigation' ); ?>>

			<div id="top-navigation" class="<?php follet_container_class( 'top-navigation' ); ?>">

				<div class="site-branding <?php follet_container_class( 'site-branding' ); ?>">

					<?php if (   follet_get_current( 'header_logo_customize' )
						and follet_get_current( 'header_logo_show' )
						and $header_logo_img = follet_get_current( 'header_logo_img' ) ) : ?>

						<h1 class="site-title site-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo $header_logo_img; ?>" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>">
							</a>
						</h1>

					<?php elseif ( follet_get_current( 'header_show_title' ) ) : ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</h1>
					<?php endif; ?>

				</div>

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
