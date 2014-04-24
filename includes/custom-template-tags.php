<?php
/**
 * Custom template tags for this theme.
 *
 * All the functions in this file can be plugged or hooked in.
 *
 * @package Follet_Theme
 * @since   1.0
 */

/**
 * Add a hook for custom actions before loading this file.
 */
do_action( 'follet_before_custom_template_tags' );

if ( ! function_exists( 'follet_content_span' ) ) :
/**
 * Obtain span class for content section.
 *
 * Take on this function by declaring it before this file is loaded.
 *
 * @param  boolean $return Whether to return the result instead of echo it.
 * @return void
 * @since  1.0
 */
function follet_content_span( $return = false ) {
	$span = 'col-sm-8';
	if (   ! is_active_sidebar( 'sidebar-primary' )
		|| ! follet_get_current( 'sidebar_primary_show' )
	) {
		$span = 'col-sm-12';
	}
	$span = apply_filters( 'follet_content_span', $span );
	if ( $return ) {
		return $span;
	}
	echo $span;
}
endif;

if ( ! function_exists( 'follet_footer_column_span' ) ) :
/**
 * Get span class for footer columns.
 *
 * @param  boolean     $return If set to true, the content will be returned instead of echoed.
 * @return void|string
 */
function follet_footer_column_span( $return = false ) {

	$columns = 0;

	$sidebars = array(
		'sidebar-footer-1' => 'sidebar_footer_1_show',
		'sidebar-footer-2' => 'sidebar_footer_2_show',
		'sidebar-footer-3' => 'sidebar_footer_3_show',
	);

	foreach ( $sidebars as $id => $option ) {
		if ( is_active_sidebar( $id ) && follet_get_current( $option ) ) {
			$columns++;
		}
	}

	if ( ! $columns ) {
		return false;
	}

	$span = 12 / $columns;
	$span = 'col-sm-' . $span;
	$span = apply_filters( 'follet_footer_column_span', $span );

	if ( $return ) {
		return $span;
	}

	echo $span;

}
endif;

if ( ! function_exists( 'follet_top_navigation_style' ) ) :
/**
 * Obtain class for selected Bootstrap navigation style.
 *
 * @return void
 */
function follet_top_navigation_style() {
	$style = follet_get_current( 'top_navigation_style' );
	$style = follet_get_current( 'top_navigation_fix_top' )
	         ? $style . ' navbar-fixed-top' : $style . ' navbar-static-top';
	echo $style;
}
endif;

if ( ! function_exists( 'follet_branding_is_visible' ) ) :
/**
 * Check if header should display.
 *
 * @return void
 * @since  1.0
 */
function follet_branding_is_visible() {

	if (   follet_get_current( 'header_show_title' )
		|| follet_get_current( 'header_show_tagline' )
		|| (   follet_get_current( 'header_logo_show' )
			&& follet_get_current( 'header_logo_img' )
		)
	) {
		return true;
	}

	return false;

}
endif;

if ( ! function_exists( 'follet_credits' ) ) :
/**
 * Print site and theme credits.
 * @return void
 * @since  1.0
 */
function follet_credits() {
	$credits = sprintf( __( 'Copyright %s', 'follet_theme' ), '&copy; ' . date( 'Y' ) . ' <a href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>. ' ) . sprintf( __( 'Powered by %s', 'follet_theme' ), '<a href="http://www.wordpress.org/" class="wp-url">WordPress</a> ' . __( 'and', 'follet_theme' ) . ' <a href="http://github.com/andrezrv/follet" class="theme-url">Follet</a>.' );
	$credits = apply_filters( 'follet_footer_credits', $credits );
	echo $credits;
}
endif;

/**
 * Add a hook for custom actions before loading the next file.
 */
do_action( 'follet_after_custom_template_tags' );
