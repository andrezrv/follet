<?php
/**
 * The default search form for this theme.
 *
 * @package Follet_Theme
 * @since   1.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<span class="screen-reader-text"><?php _e( 'Search for:', 'follet_theme' ); ?></span>
	<input type="search" class="search-field form-control" placeholder="<?php _e( 'Search', 'follet_theme' ); ?>" value="" name="s" title="<?php _e( 'Search for:', 'follet_theme' ); ?>" />
</form>
