<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Follet_Theme
 * @since   1.0
 */
?>
<?php get_header(); ?>

	<section id="primary" class="content-area <?php follet_content_span(); ?>" <?php follet_microdata( 'content' ); ?>>

		<main id="main" class="site-main" role="main">

		<?php if ( follet_get_current( 'breadcrumbs_show' ) ) : ?>
			<?php follet_breadcrumb( array( 'home_text' => '' ) ); ?>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'follet' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>

			<?php // Start the Loop. ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php get_template_part( 'templates/paging-navigation', 'search' ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main>

	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
