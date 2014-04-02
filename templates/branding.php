<?php
/**
 * Default template for branding.
 *
 * @package Follet_Theme
 * @since   1.0
 */
?>

	<?php if ( follet_branding_is_visible() ) : ?>

		<header id="main-header" class="site-header" role="banner" <?php follet_microdata( 'header' ); ?>>

			<div class="site-branding <?php follet_container_class( 'site-branding' ); ?>">

				<?php if (   follet_get_current( 'header_logo_customize' )
				         and follet_get_current( 'header_logo_show' )
				         and $header_logo_img = follet_get_current( 'header_logo_img' ) ) : ?>

					<h1 class="site-title site-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo $header_logo_img; ?>" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>">
						</a>
					</h1>

				<?php else : ?>

					<?php if ( follet_get_current( 'header_show_title' ) ) : ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</h1>
					<?php endif; ?>

					<?php if ( follet_get_current( 'header_show_tagline' ) ) : ?>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php endif; ?>

				<?php endif; ?>

			</div>

		</header>

	<?php endif; ?>
