<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package soma
 */

get_header(); ?>

	<?php get_template_part( 'template-parts/page', 'header' ); ?>

	<main id="primary" class="site-main">

	<?php

	if ( have_posts() ) :

		/**
		 * Include the component stylesheet for the content.
		 * This call runs only once on index and archive pages.
		 * At some point, override functionality should be built in similar to the template part below.
		 */
		wp_print_styles( array( 'soma-content' ) ); // Note: If this was already done it will be skipped.

		/* Display the appropriate header when required. */
		soma_index_header();

		/* Start the Loop. */
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Type-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			 */
			if ( is_home() || is_search() || is_archive() ) {
				get_template_part( 'template-parts/content-excerpt' );
			}
			else {
				get_template_part( 'template-parts/content', get_post_type() );
			}

		endwhile;

		if ( ! is_singular() ) :
			the_posts_navigation();
		endif;

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
