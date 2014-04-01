/**
 * Support for back-to-top link.
 *
 * @package Follet_Theme
 * @since   1.0
 */
jQuery( document ).ready( function( $ ) {
	$( '#back-to-top a' ).click( function( e ) {
		e.preventDefault();
		$( 'html, body' ).animate( { scrollTop: 0 }, 'slow' );
	} );
} );
