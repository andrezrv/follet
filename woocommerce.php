<?php
/**
 * The template for displaying all WooCommerce contents.
 *
 * @package Follet_Theme
 * @since   1.1
 */
?>
<?php get_header(); ?>

	<div id="primary" class="content-area <?php follet_content_span(); ?>" <?php follet_microdata( 'content' ); ?>>

		<main id="main" class="site-main" role="main">

			<?php woocommerce_content(); ?>

		</main>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
