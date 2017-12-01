<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Dallas_Lite
 */

?>

	</div><!-- #content -->
<!-- Create bottom postion of theme -->
<section id="bottom" class="site-bottom">
	<?php if ( is_active_sidebar( 'bottom-a' ) ) {
			dynamic_sidebar( 'bottom-a' );
	}
	if ( is_active_sidebar( 'bottom-b' ) ) {
			 dynamic_sidebar( 'bottom-b' ); 
	}
	if ( is_active_sidebar( 'bottom-c' ) ) {
			 dynamic_sidebar( 'bottom-c' );
	}
	if ( is_active_sidebar( 'bottom-d' ) ) {
			 dynamic_sidebar( 'bottom-d' ); 
	}
	?>
</section>
<!-- End bottom postion of theme -->

	<footer id="colophon" class="site-footer">
	
	
	<?php esc_html_e( get_theme_mod( 'blog_layout_selection' ) ); ?> <!-- get option value example --> 
	
	
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wp_dallas_lite' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'wp_dallas_lite' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'wp_dallas_lite' ), 'wp_dallas_lite', '<a href="http://www.joomdev.com">JoomDev</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
