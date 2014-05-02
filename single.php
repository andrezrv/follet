<?php
/**
 * The Template for displaying all single posts.
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

			<?php get_template_part( 'content', ( $post_format = get_post_format() ) ? $post_format : 'single' ); ?>

			<?php get_template_part( 'templates/post-navigation', 'single' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the Loop. ?>

		</main>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>