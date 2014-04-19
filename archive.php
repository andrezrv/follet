<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Follet_Theme
 * @since   1.0
 */
?>
<?php get_header(); ?>

	<section id="primary" class="content-area <?php follet_content_span(); ?>" <?php follet_microdata( 'content' ); ?>>

		<main id="main" class="site-main-content" role="main">

		<?php if ( follet_get_current( 'breadcrumbs_show' ) ) : ?>
			<?php follet_breadcrumb( array( 'home_text' => '' ) ); ?>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">

				<h1 class="page-title">

					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'follet_theme' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'follet_theme' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'follet_theme' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'follet_theme' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'follet_theme' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'follet_theme' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'follet_theme' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'follet_theme');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'follet_theme');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'follet_theme' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'follet_theme' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'follet_theme' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'follet_theme' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'follet_theme' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'follet_theme' );

						elseif ( is_tax() ) :
							echo get_queried_object()->name;

						else :
							if ( $title = get_queried_object()->labels->name ) {
								echo $title;
							} else {
								_e( 'Archives', 'follet_theme' );
							}

						endif;
					?>

				</h1>

				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					elseif ( get_queried_object() && $description = get_queried_object()->description ) :
						printf( '<div class="taxonomy-description">%s</div>', $description );
					endif;
				?>

			</header>

			<?php // Start the Loop. ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php get_template_part( 'templates/paging-navigation', 'archive' ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main>

	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
