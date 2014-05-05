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
 * Set $template_directory to avoid calling get_template_directory() all the time.
 */
$template_directory = get_template_directory();

/**
 * Follet Core framework.
 */
require $template_directory . '/includes/follet-core/follet-load.php';

/**
 * Internal functions.
 */
require $template_directory . '/includes/internal.php';

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
