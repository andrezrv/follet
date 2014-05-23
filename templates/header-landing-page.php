<?php
/**
 * Header template for landing pages.
 *
 * @package Follet_Theme
 * @since   1.1
 */
?>

	<header id="main-header" class="site-header" role="banner" <?php follet_microdata( 'header' ); ?>>

		<div class="landing-page-header <?php follet_container_class( 'header-landing-page' ); ?>">

			<?php if ( $title = get_the_title() ) : ?>
				<h1 class="page-title" <?php follet_microdata( 'entry-title' ); ?>>
					<?php echo $title; ?>
				</h1>
			<?php endif; ?>

			<?php if ( $excerpt = get_the_excerpt() ) : ?>
				<div class="page-excerpt" <?php follet_microdata( 'entry-summary' ); ?>>
					<?php echo $excerpt; ?>
				</div>
			<?php endif; ?>

		</div>

	</header>
