<?php if ( !is_home() && !is_search() && !is_archive() ) : ?>
	<?php if ( has_post_thumbnail() || get_theme_mod( 'default_header_image' ) ) : ?>
		<?php wp_print_styles( array( 'soma-page-header' ) ); ?>
		<div class="page-header-image rellax-wrapper">
			<div class="rellax" style="background-image: url(
				<?php if ( has_post_thumbnail() ) : ?>
					<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
				<?php else : ?>
					<?php $id = soma_get_image_id( get_theme_mod( 'default_header_image' ) );
					echo wp_get_attachment_url( $id, 'full' ); ?>
				<?php endif; ?>
			);">
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>
