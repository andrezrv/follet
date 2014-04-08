<?php
/**
 * Basic template for displaying author info in single posts.
 *
 * @package Follet_Theme
 * @since  1.0
 */
?>
	<div class="author-info">
		<?php echo get_avatar( get_the_author_meta( 'email' ), '86' ); ?>
		<h3><?php the_author_posts_link(); ?></h3>
		<div class="author-description">
			<?php echo wpautop( get_the_author_meta( 'description' ) ); ?>
		</div>
		<ul class="contact-info">
			<?php if ( $posts_url = get_author_posts_url( get_the_author_meta( 'ID' ) ) ) : ?>
				<li>
					<a href="<?php echo $posts_url; ?>">
						<label class="icon icon-author-archive"></label>&nbsp;
						<?php _e( 'All posts', 'follet_theme' ); ?>
					</a>
				</li>
			<?php endif; ?>
			<?php $contact_methods = follet_get_current( 'contact_methods' ); ?>
			<?php foreach ( $contact_methods as $key => $value ) : ?>
				<?php if ( $url = get_the_author_meta( $key ) ) : ?>
					<li>
						<a href="<?php echo $url; ?>">
							<label class="genericon genericon-<?php echo $key; ?>"></label>&nbsp;
							<?php echo $value; ?>
						</a>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>
