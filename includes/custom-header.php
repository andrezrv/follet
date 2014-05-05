<?php
/**
 * Implementation of the Custom Header feature.
 *
 * {@link http://codex.wordpress.org/Custom_Headers}
 *
 * @package Follet_Theme
 * @since   1.0
 */

/**
 * Add a hook for custom actions before loading this file.
 */
do_action( 'follet_before_custom_header' );

if ( ! function_exists( 'follet_custom_header_setup' ) ) :
add_action( 'after_setup_theme', 'follet_custom_header_setup' );
/**
 * Setup the WordPress core custom header feature.
 *
 * @uses   follet_header_style()
 * @uses   follet_admin_header_style()
 * @uses   follet_admin_header_image()
 * @return void
 * @since  1.0
 */
function follet_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'follet_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/images/blue-diamond-pattern.png',
		'default-text-color'     => 'FFFFFF',
		'header-text'            => true,
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'follet_header_style',
		'admin-head-callback'    => 'follet_admin_header_style',
		'admin-preview-callback' => 'follet_admin_header_image',
	) ) );
	register_default_headers( array(
		'diamond' => array(
			'url'           => '%s/images/blue-diamond-pattern.png',
			'thumbnail_url' => '%s/images/blue-diamond-pattern-thumbnail.png',
			'description'   => __( 'Blue Diamond', 'follet_theme' )
		)
	) );
}
endif;

if ( ! function_exists( 'follet_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see    follet_custom_header_setup()
 * @return void
 * @since  1.0
 */
function follet_header_style() {

	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	/*if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}*/

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php if ( get_header_image() ) : ?>
		#main-header {
			background-image: url('<?php header_image(); ?>');
		}
	<?php endif; ?>
	<?php if ( get_theme_mod( 'header_background_ignore', false ) ) : ?>
		#main-header {
			background-color: transparent;
		}
	<?php else : ?>
		#main-header {
			background-color: <?php echo get_theme_mod( 'header_background_color', '#428BCA' ); ?>;
		}
	<?php endif; ?>
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			display: none;
		}
			<?php if (   follet_get_current( 'header_logo_customize' )
				     and follet_get_current( 'header_logo_show' )
				     and follet_get_current( 'header_logo_img' ) ) : ?>
				.site-title.site-logo {
					display: block;
				}
			<?php endif; ?>
			clip: rect(1px, 1px, 1px, 1px);
		<?php elseif ( HEADER_TEXTCOLOR != $header_text_color ) : // If the user has set a custom color for the text use that. ?>
			.site-branding .site-title a,
			.site-branding .site-description {
				color: #<?php echo $header_text_color; ?>;
			}
		<?php endif; ?>
	</style>
	<?php
}
endif;

if ( ! function_exists( 'follet_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see    follet_custom_header_setup()
 * @return void
 * @since  1.0
 */
function follet_admin_header_style() {
	?>

	<?php if ( get_theme_mod( 'load_main_style', true ) ) : ?>
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
	<?php endif; ?>
	<link rel="stylesheet" href="<?php echo follet_template_directory_uri() . '/styles/fonts.css'; ?>">
	<style>
		body {
			background-color: transparent;
		}
		#main-header h1 {
			margin-bottom: 0;
		}
	</style>

	<?php

}
endif;

if ( ! function_exists( 'follet_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see follet_custom_header_setup()
 * @return void
 * @since  1.0
 */
function follet_admin_header_image() {

	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );

	$color = get_theme_mod( 'header_background_ignore', false )
	       ? 'transparent' : get_theme_mod( 'header_background_color', '#428BCA' );

	$image = get_header_image()
	       ? ' background-image: url(' . get_header_image() . ')' : '';

	?>
	<header id="main-header" class="site-header" role="banner" style="background-color: <?php echo $color ; ?>;<?php echo $image; ?>">

		<div class="site-branding <?php follet_container_class( 'site-branding' ); ?>">
			<?php

			if (    get_theme_mod( 'header_logo_show', false )
				and $header_logo_img = get_theme_mod( 'header_logo_img', '' ) ) : ?>

				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo $header_logo_img; ?>" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>">
					</a>
				</h1>

			<?php else : ?>

				<?php if ( get_theme_mod( 'header_show_title', true ) ) : ?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" <?php echo $style; ?>><?php bloginfo( 'name' ); ?></a>
					</h1>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'header_show_tagline', true ) ) : ?>
					<h2 class="site-description" <?php echo $style; ?>><?php bloginfo( 'description' ); ?></h2>
				<?php endif; ?>

			<?php endif; ?>

		</div>

	</header>

	<?php

}
endif;

/**
 * Add a hook for custom actions before loading the next file.
 */
do_action( 'follet_after_custom_header' );
