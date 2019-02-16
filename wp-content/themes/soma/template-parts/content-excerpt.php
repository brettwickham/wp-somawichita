<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package soma
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</header><!-- .entry-header -->

	<?php if ( !is_singular() && has_post_thumbnail() ) : ?>
		<div class="rellax-wrapper">
			<div class="rellax" style="background-image: url(
				<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
			);">
			</div>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_excerpt();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'soma' ),
				'after'  => '</div>',
			)
		);
		?>

		<div class="wp-block-button btn--sm">
			<a class="wp-block-button__link" href="<?php the_permalink(); ?>" rel="bookmark">Read More</a>
		</div>
	</div><!-- .entry-content -->

	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-footer">
			<?php
				soma_posted_on();
				soma_posted_by();
				soma_comments_link();
			?>
		</div>
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
if ( is_singular() ) :
	the_post_navigation(
		array(
			'prev_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Previous:', 'soma' ) . '</span></div>%title',
			'next_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Next:', 'soma' ) . '</span></div>%title',
		)
	);

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
endif;
