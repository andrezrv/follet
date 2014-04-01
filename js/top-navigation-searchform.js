/**
 * Support for top navigation searchform.
 *
 * @package Follet_Theme
 * @since   1.0
 */
jQuery( document ).ready( function( $ ) {

	$( '#top-navigation-searchform-show a' ).click( function( e ) {
		e.preventDefault();
		if ( ! $( '#top-navigation-searchform-copy' ).length ) {
			$( '#top-navigation-searchform' ).after( '<div id="top-navigation-searchform-copy" class="col-sm-4 hidden-xs" style="display: none;"></div>' );
			$( '#top-navigation-searchform-copy' ).html( $( '#top-navigation-searchform' ).html() );
		}
		$( '#top-navigation-searchform-copy' ).toggle( 400 );
	} );

});
