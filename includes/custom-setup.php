<?php
/**
 * Theme setup. All the functions included here are pluggable.
 *
 * @package Follet_Theme
 * @since   1.0
 */

/**
 * Add a hook for custom actions before loading this file.
 */
do_action( 'follet_before_actions' );

if ( ! function_exists( 'follet_register_options' ) ) :
add_action( 'follet_setup', 'follet_register_options' );
/**
 * Register default options for this theme through Follet Core.
 *
 * You can override these settings by hooking into `follet_options_register` like this:
 *
<?php
	add_action( 'follet_options_register', 'custom_register_options' );
	function custom_register_options() {
		$options = array(
			'top_navigation_style'             => 'navbar-inverse',
			'primary_color'                    => '#D9534F',
			'secondary_color'                  => '#DD3333',
			'header_background_color'          => '#D9534F',
			'primary_sidebar_background_color' => '#CCCCCC',
		);
		foreach ( $options as $name => $default ) {
			if ( ! follet_option_exists( $name ) ) {
				follet_register_option(
					$name,
					$default,
					get_theme_mod( $name, $default )
				);
			}
		}
	}

 *
 * @return void
 * @since  1.0
 */
function follet_register_options() {

	do_action( 'follet_options_register' );

	$options = array(
		'top_navigation_show'              => true, // Show top navigation.
		'top_navigation_fix_top'           => false, // Fix top navigation container to the top of the page.
		'top_navigation_searchform_show'   => false, // Show search form in top navigation.
		'top_navigation_style'             => 'navbar-default', // Default style for top navigation. Allowed: "navbar-default" and "navbar-inverse".
		'social_navigation_show'           => true, // Show social navigation at the bottom of the page.
		'header_logo_customize'            => false, // Show the customizer option for header logo.
		'header_logo_show'                 => false, // Show the header logo.
		'header_logo_img'                  => '', // Default image for header logo.
		'header_show_title'                => true, // Show site title in header.
		'header_show_tagline'              => true, // Show site tagline in header
		'primary_color'                    => '#428BCA', // Default primary color. This should be the same color defined in ./css/primary-color.scss.
		'secondary_color'                  => '#D9534F', // Default secondary color. This should be the same color defined in ./css/secondary-color.scss.
		'header_background_color'          => '#428BCA', // Default color for header background when no image is set.
		'header_background_ignore'         => false, // Ignore header background color when no header image is set.
		'primary_sidebar_background_color' => '#FFFFFF', // Default color for primary sidebar.
		'show_footer_in_summary'           => true, // Show post footer in post summaries.
		'footer_show'                      => true, // Show footer.
		'back_to_top_show'                 => true, // Show back to top button before page footer.
		'footer_credits_show'              => true, // Show theme credits.
		'sidebar_primary_show'             => true, // Show primary sidebar.
		'sidebar_footer_1_show'            => true, // Show first widget area in footer.
		'sidebar_footer_2_show'            => true, // Show second widget area in footer.
		'sidebar_footer_3_show'            => true, // Show third widget area in footer.
		'load_main_style'                  => true, // Load style.css.
		'skip_link_focus'                  => true, // Load js/min/skip-link-focus.min.js
		'post_avatar_show'                 => false, // Show avatar of the post author.
		'post_author_info_show'            => false, // Show author info right after post content.
		'breadcrumbs_show'                 => true, // Show breadcrumbs.
		'contact_methods_show'             => false, // Show additional contact methods.
		'responsive_videos'                => true, // Make videos responsive.
		'contact_methods'                  => array( // Additional contact methods.
			'feed'       => 'RSS',
			'wordpress'  => 'WordPress',
			'twitter'    => 'Twitter',
			'facebook'   => 'Facebook',
			'googleplus' => 'Google',
			'linkedin'   => 'LinkedIn',
			'github'     => 'Github',
			'pinterest'  => 'Pinterest',
			'flickr'     => 'Flickr',
			'instagram'  => 'Instagram',
			'vimeo'      => 'Vimeo',
			'youtube'    => 'YouTube',
		)
	);
	foreach ( $options as $name => $default ) {
		if ( ! follet_option_exists( $name ) ) {
			follet_register_option(
				$name,
				$default,
				get_theme_mod( $name, $default )
			);
		}
	}

	do_action( 'follet_options_registered' );

}
endif;

if ( ! function_exists( 'follet_register_menus' ) ) :
add_action( 'init', 'follet_register_menus' );
/**
 * Register navigation menus.
 *
 * @return void
 * @since  1.0
 */
function follet_register_menus() {
	register_nav_menu(
		'top-menu',
		__( 'Top menu', 'follet_theme' )
	);
	register_nav_menu(
		'social-menu',
		__( 'Social menu', 'follet_theme' )
	);
}
endif;

if ( ! function_exists( 'follet_custom_main_style_dependencies' ) ) :
add_filter( 'follet_main_style_dependencies', 'follet_custom_main_style_dependencies' );
/**
 * Add Dashicons as a dependency for the main style.
 *
 * @param  array $dependencies Current list of dependencies.
 * @return array               Filtered list of dependencies.
 */
function follet_custom_main_style_dependencies( $dependencies ) {
	$dependencies[] = 'dashicons';
	return $dependencies;
}
endif;

if ( ! function_exists( 'follet_register_sidebars' ) ) :
add_action( 'widgets_init', 'follet_register_sidebars' );
/**
 * Register sibebars for this theme.
 *
 * @return void
 * @since  1.0
 */
function follet_register_sidebars() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'follet_theme' ),
		'id'            => 'sidebar-primary',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4><hr class="separator" />',
	) );

	// Footer sidebars:

	register_sidebar( array(
		'name'          => __( 'Footer Sidebar #1', 'follet' ),
		'id'            => 'sidebar-footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4><hr class="separator" />',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Sidebar #2', 'follet' ),
		'id'            => 'sidebar-footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4><hr class="separator" />',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Sidebar #3', 'follet' ),
		'id'            => 'sidebar-footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4><hr class="separator" />',
	) );

}
endif;

if ( ! function_exists( 'follet_add_editor_styles' ) ) :
add_action( 'init', 'follet_add_editor_styles' );
/**
 * Add styles for post editor.
 *
 * @return void
 * @since  1.0
 */
function follet_add_editor_styles() {

	$template_directory_uri = follet_template_directory_uri();

	add_editor_style( $template_directory_uri . '/fonts/genericons/genericons.css' );
	add_editor_style( $template_directory_uri . '/css/fonts.css' );
	add_editor_style( $template_directory_uri . '/css/icons.css' );
	add_editor_style( $template_directory_uri . '/css/general-colors.css' );
	add_editor_style( $template_directory_uri . '/css/primary-color.css' );
	add_editor_style( $template_directory_uri . '/css/secondary-color.css' );

}
endif;

if ( ! function_exists( 'follet_enqueue_scripts' ) ) :
add_action( 'wp_enqueue_scripts', 'follet_enqueue_scripts' );
/**
 * Enqueue additional scripts for this theme.
 *
 * @return void
 * @since  1.0
 */
function follet_enqueue_scripts() {

	$template_directory_uri = follet_template_directory_uri();

	wp_enqueue_style(
		'genericons',
		$template_directory_uri . '/fonts/genericons/genericons.css',
		false,
		'3.0.3'
	);

	wp_enqueue_style(
		'follet-fonts',
		$template_directory_uri . '/css/fonts.css',
		false,
		follet()->theme_version
	);

	wp_enqueue_style(
		'follet-general-colors',
		$template_directory_uri . '/css/general-colors.css',
		false,
		follet()->theme_version
	);

	wp_enqueue_style(
		'follet-primary-color',
		$template_directory_uri . '/css/primary-color.css',
		false,
		follet()->theme_version
	);

	wp_enqueue_style(
		'follet-secondary-color',
		$template_directory_uri . '/css/secondary-color.css',
		false,
		follet()->theme_version
	);

	wp_enqueue_style(
		'follet-primary-sidebar-color',
		$template_directory_uri . '/css/primary-sidebar-color.css',
		false,
		follet()->theme_version
	);

	wp_enqueue_style(
		'follet-icons',
		$template_directory_uri . '/css/icons.css',
		false,
		follet()->theme_version
	);

	// Skip Link Focus JS.
	if ( follet_get_current( 'skip_link_focus' ) ) {
		wp_enqueue_script(
			'follet-skip-link-focus-fix',
			$template_directory_uri . '/js/min/skip-link-focus-fix.min.js',
			array( 'jquery' ),
			'20130115',
			true
		);
	}

	// Animation for back-to-top button.
	if ( follet_get_current( 'back_to_top_show' ) ) {
		wp_enqueue_script(
			'follet-back-to-top',
			follet_template_directory_uri(). '/js/min/back-to-top.min.js',
			array( 'jquery' ),
			follet()->theme_version,
			true
		);
	}

	// Bootstrap support.
	wp_enqueue_script(
		'follet-bootstrap-support',
		follet_template_directory_uri(). '/js/min/bootstrap-support.min.js',
		array( 'jquery' ),
		follet()->theme_version,
		true
	);

	wp_enqueue_script(
		'follet-content-sidebar-height',
		follet_template_directory_uri(). '/js/min/content-sidebar-height.min.js',
		array( 'jquery' ),
		follet()->theme_version,
		true
	);

	wp_enqueue_script(
		'follet-top-navigation-searchform',
		follet_template_directory_uri(). '/js/min/top-navigation-searchform.min.js',
		array( 'jquery' ),
		follet()->theme_version,
		true
	);

	if ( follet_get_current( 'responsive_videos' ) ) {
		wp_enqueue_script(
			'follet-resize-videos',
			follet_template_directory_uri(). '/js/min/resize-videos.min.js',
			array( 'jquery' ),
			follet()->theme_version,
			true
		);
	}

}
endif;

if ( ! function_exists( 'follet_post_author_section_microdata' ) ) :
add_filter( 'follet_post_author_section', 'follet_post_author_section_microdata' );
/**
 * Apply microdata to post author section.
 *
 * @param  string $output Current content of post author section.
 * @return string         Filtered content.
 * @since  1.0
 */
function follet_post_author_section_microdata( $output ) {
	$output = str_replace( '<section', '<section ' . follet_microdata( 'entry-author', false ), $output );
	$output = str_replace( '<a', '<a ' . follet_microdata( 'url', false ), $output );
	return $output;
}
endif;

if ( ! function_exists( 'follet_post_comments_section_microdata' ) ) :
add_filter( 'follet_post_comments_section', 'follet_post_comments_section_microdata' );
/**
 * Apply microdata to post comments section.
 *
 * @param  string $output Current content of post comments section.
 * @return string         Filtered content.
 * @since  1.0
 */
function follet_post_comments_section_microdata( $output ) {
	$output = str_replace( '<section', '<section ' . follet_microdata( 'comments-link', false ), $output );
	$output = str_replace( '<a', '<a ' . follet_microdata( 'url', false ), $output );
	return $output;
}
endif;

if ( ! function_exists( 'follet_comments_microdata' ) ) :
add_filter( 'follet_list_comments', 'follet_comments_microdata' );
/**
 * Apply microdata to comments section.
 *
 * @param  string $output Current content of comments section.
 * @return string         Filtered content.
 * @since  1.0
 */
function follet_comments_microdata( $output ) {
	$output = str_replace( 'class="comment ', follet_microdata( 'comment', false ) . ' class="comment ', $output );
	$output = str_replace( 'class="comment-author', follet_microdata( 'comment-author', false ) . ' class="comment-author', $output );
	$output = str_replace( '<a ', '<a ' . follet_microdata( 'url', false ) . ' ', $output );
	$output = str_replace( '<img ', '<img ' . follet_microdata( 'image', false ) . ' ', $output );
	$output = str_replace( '<time ', '<time ' . follet_microdata( 'comment-time', false ) . ' ', $output );
	$output = str_replace( 'class="comment-content', follet_microdata( 'comment-content', false ) . ' class="comment-content', $output );
	$output = str_replace( '<a itemprop="url" class=\'comment-reply-link\'', '<a class=\'comment-reply-link\' ' . follet_microdata( 'comment-reply', false ), $output );
	return $output;
}
endif;

if ( ! function_exists( 'follet_primary_color' ) ) :
add_action( 'wp_enqueue_scripts', 'follet_primary_color' );
/**
 * Add styles when a primary color is set.
 *
 * @return void
 * @since  1.0
 */
function follet_primary_color() {
	$primary_color_style = follet_override_stylesheet_colors(
		follet_get_current( 'primary_color' ),
		get_template_directory() . '/css/primary-color.css',
		follet_get_default( 'primary_color' ),
		array( follet_get_default( 'primary_color' ) )
	);
	if ( $primary_color_style ) {
		wp_add_inline_style( 'follet-primary-color', $primary_color_style );
	}
}
endif;

if ( ! function_exists( 'follet_secondary_color' ) ) :
add_action( 'wp_enqueue_scripts', 'follet_secondary_color' );
/**
 * Add styles when a secondary color is set.
 *
 * @return void
 * @since  1.0
 */
function follet_secondary_color() {
	$secondary_color_style = follet_override_stylesheet_colors(
		follet_get_current( 'secondary_color' ),
		get_template_directory() . '/css/secondary-color.css',
		follet_get_default( 'secondary_color' ),
		array( follet_get_default( 'secondary_color' ) )
	);
	if ( $secondary_color_style ) {
		wp_add_inline_style( 'follet-secondary-color', $secondary_color_style );
	}
}
endif;

if ( ! function_exists( 'follet_primary_sidebar_background_color' ) ) :
add_action( 'wp_enqueue_scripts', 'follet_primary_sidebar_background_color' );
/**
 * Add styles when a background color for sidebar is set.
 *
 * @return void
 * @since  1.0
 */
function follet_primary_sidebar_background_color() {
	$sidebar_background_color_style = follet_override_stylesheet_colors(
		follet_get_current( 'primary_sidebar_background_color' ),
		get_template_directory() . '/css/primary-sidebar-color.css',
		follet_get_default( 'primary_sidebar_background_color' ),
		array( follet_get_default( 'primary_sidebar_background_color' ), 'white' )
	);
	if ( $sidebar_background_color_style ) {
		wp_add_inline_style( 'follet-primary-sidebar-color', $sidebar_background_color_style );
	}
}
endif;

if ( ! function_exists( 'follet_bootstrap_carousel_control' ) ) :
add_filter( 'agnosia_bootstrap_carousel_control', 'follet_bootstrap_carousel_control' );
/**
 * Support for Agnosia Bootstrap Carousel
 *
 * @see {@link http://wordpress.org/plugins/agnosia-bootstrap-carousel/}
 *
 * @param  string $control HTML for slider control.
 * @return string          Filtered HTML.
 * @since  1.0
 */
function follet_bootstrap_carousel_control( $control ) {
	$control = str_replace( '&lsaquo;', '<span class="glyphicon glyphicon-chevron-left"></span>', $control );
	$control = str_replace( '&rsaquo;', '<span class="glyphicon glyphicon-chevron-right"></span>', $control );
	return $control;
}
endif;

if ( ! function_exists( 'follet_content_width' ) ) :
add_action( 'after_setup_theme', 'follet_content_width' );
/**
 * Set content_width by sidebar availability.
 *
 * @return void
 * @since  1.0
 */
function follet_content_width() {

	global $content_width;

	if (   ! is_active_sidebar( 'sidebar-primary' )
		|| ! follet_get_current( 'sidebar_primary_show' )
	) {
		$content_width = 1110;
	} else {
		$content_width = 719;
	}

}
endif;

if ( ! function_exists( 'follet_add_page_excerpt' ) ) :
add_action( 'init', 'follet_add_page_excerpt' );
/**
 * Enable post excerpts for pages. This is needed to correctly create pages
 * based on the Landing Page template.
 *
 * @return void
 * @since  1.1
 */
function follet_add_page_excerpt() {
	add_post_type_support( 'page', 'excerpt' );
}
endif;

/**
 * Declare support for WooCommerce.
 *
 * @since 1.1
 */
add_theme_support( 'woocommerce' );

/**
 * Add a hook for custom actions before loading the next file.
 */
do_action( 'follet_after_actions' );
