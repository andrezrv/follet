<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Follet_Theme
 * @since   1.0
 */
?>
<?php get_header(); ?>

	<div id="primary" class="content-area <?php follet_content_span(); ?>" <?php follet_microdata( 'content' ); ?>>

		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php if ( follet_get_current( 'breadcrumbs_show' ) ) : ?>
					<?php follet_breadcrumb( array( 'home_text' => '' ) ); ?>
				<?php endif; ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
