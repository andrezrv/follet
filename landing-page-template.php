<?php
/**
 * Template Name: Landing Page
 *
 * This is a template meant for landing pages, featuring a large hero unit with
 * your header image as background and a slightly modified top navigation.
 *
 * @package Follet_Theme
 * @since   1.1
 */
?>
<?php get_header( 'landing-page' ); ?>

<div id="primary" class="content-area <?php follet_content_span(); ?>" <?php follet_microdata( 'content' ); ?>>

	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'landing-page' ); ?>

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
