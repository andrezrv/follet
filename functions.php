<?php
/**
 * Follet functions and definitions
 *
 * @package Follet_Theme
 * @since   1.0
 */

/**
 * Add a hook for custom actions before loading this file.
 */
do_action( 'follet_before_functions' );

/**
 * Define theme version.
 */
define( 'FOLLET_THEME_VERSION', '1.0' );

/**
 * Set $template_directory to avoid calling get_template_directory() all the time.
 */
$template_directory = get_template_directory();

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; // pixels.
}

/**
 * Follet Core framework.
 */
require $template_directory . '/includes/follet-core/follet-load.php';

/**
 * Custom actions for this theme.
 */
require $template_directory . '/includes/custom-setup.php';

/**
 * Implement the Custom Header feature.
 */
require $template_directory . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require $template_directory . '/includes/custom-template-tags.php';

/**
 * Customizer additions.
 */
require $template_directory . '/includes/customizer.php';

/**
 * Execute Follet-related tasks.
 */
do_action( 'follet_setup' );

/**
 * Add a hook for custom actions after loading this file.
 */
do_action( 'follet_after_functions' );

//add_filter( 'follet_option_current_sidebar_right_show', '__return_false' );
//add_action( 'init', function() { var_dump(follet()); die(); } );
