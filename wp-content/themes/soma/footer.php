<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package soma
 */

?>

<?php wp_print_styles( array( 'soma-widgets' ) ); ?>
<footer id="colophon" class="site-footer">
	<div class="site-info">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<section id="footer-primary" class="footer-primary widget-area">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</section>
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			<section id="footer-secondary" class="footer-secondary widget-area">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</section>
		<?php endif; ?>
	</div><!-- .site-info -->

	<div class="site-copyright">
		&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>, All Rights Reserved
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
