/**
 * Support for Responsive videos.
 *
 * @package Follet_Theme
 * @since   1.0
 */
jQuery( document ).ready( function() {
	follet_embed_resize();
});

jQuery( window ).resize( function() {
	follet_embed_resize();
} );

function follet_embed_resize() {
	jQuery( 'iframe[src*="youtube"], iframe[src*="vimeo"], embed[src*="wordpress"]' ).each( function( $ ) {
		var default_width = jQuery( this ).attr( 'width' );
		var current_width = jQuery( this ).width();
		var default_height = jQuery( this ).attr( 'height' );
		var current_height = jQuery( this ).height();
		var width_difference = default_width / current_width;
		var new_height = default_height / width_difference;
		jQuery( this ).height( new_height );
	});
}