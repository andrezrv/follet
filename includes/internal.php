<?php
/**
 * Private functions for this theme go here.
 *
 * Keep in mind that they are not meant to be reused.
 *
 * @package	Follet_Theme
 * @since	1.0.3.3
 */

/**
 * Sanitize top_navigation_tip setting.
 *
 * @internal
 * @return string
 * @since  1.0.3.3
 */
function _follet_top_navigation_tip() {
	return '<p>' . apply_filters( 'follet_top_navigation_tip', sprintf( __( '%1$sTip:%2$s Even with "Show Top Navigation" checked, Top Navigation will not show if you have not set a custom menu under Navigation > Top Menu.', 'follet_theme' ), '<strong>', '</strong>' ) ) . '</p>';
}

/**
 * Sanitize header_logo_tip setting.
 *
 * @internal
 * @return string
 * @since  1.0.3.3
 */
function _follet_header_logo_tip() {
	return '<p>' . apply_filters( 'follet_header_logo_tip', sprintf( __( 'Here you can upload your own logo and use it instead of the Site Title & Tagline values.', 'follet_theme' ), '<strong>', '</strong>' ) ) . '</p>';
}

/**
 * Sanitize primary_color_tip setting.
 *
 * @internal
 * @return string
 * @since  1.0.3.3
 */
function _follet_primary_color_tip() {
	return '<div style="margin-bottom: 10px;">' . apply_filters( 'follet_primary_color_tip', __( 'This is the main color of the theme. It is used for links, separators, buttons and backgrounds for widget titles in the primary sidebar.', 'follet_theme' ) ) . '</div>';
}

/**
 * Sanitize secondary_color_tip setting.
 *
 * @internal
 * @return string
 * @since  1.0.3.3
 */
function _follet_secondary_color_tip() {
	return '<div style="margin-bottom: 10px;">' . apply_filters( 'follet_secondary_color_tip', __( 'This is the alternative color for the theme. It is used for contrasts such as link hovers and a number of design elements.', 'follet_theme' ) ) . '</div>';
}

/**
 * Sanitize header_background_color_tip setting.
 *
 * @internal
 * @return string
 * @since  1.0.3.3
 */
function _follet_header_background_color_tip() {
	return '<div style="margin-bottom: 5px;">' . apply_filters( 'follet_header_background_color_tip', __( 'This color will display as the header background when you have not set a header image. You can choose to ignore this setting if you want a transparent background.', 'follet_theme' ) ) . '</div>';
}

/**
 * Sanitize top_navigation_style setting.
 *
 * @internal
 *
 * @param $value
 *
 * @return string
 * @since  1.0.3.3
 */
function _follet_sanitize_top_navigation_style( $value ) {
	$value = ( 'navbar-inverse' == $value ) ? $value : 'navbar-default';
	return $value;
}

/**
 * Sanitize uploads.
 *
 * @internal
 *
 * @param $value
 *
 * @return string
 * @since  1.0.3.3
 */
function _follet_sanitize_upload( $value ) {

	$filetype = wp_check_filetype( $value );

	if ( ! $filetype['ext'] ) {
		$value = '';
	}

	return $value;

}

/**
 * Sanitize boolean values.
 *
 * @internal
 *
 * @param $value
 *
 * @return boolean
 * @since  1.0.3.3
 */
function _follet_sanitize_boolean( $value ) {
	$value = ( true === $value ) ? true : false;
	return $value;
}
