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
<section id="bottom" class="site-bottom row">
	<?php if ( is_active_sidebar( 'bottom-a' ) ) {
		echo '<div  class="col-md-3 col-lg-3">';
			dynamic_sidebar( 'bottom-a' );
		echo '</div>';
	}
	if ( is_active_sidebar( 'bottom-b' ) ) {
		echo '<div class="col-md-3 col-lg-3">';
			dynamic_sidebar( 'bottom-b' ); 
		echo '</div>';
	}
	if ( is_active_sidebar( 'bottom-c' ) ) {
		echo '<div  class="col-md-3 col-lg-3">';
			dynamic_sidebar( 'bottom-c' );
		echo '</div>';
			 
	}
	if ( is_active_sidebar( 'bottom-d' ) ) {
		echo '<div  class="col-md-3 col-lg-3">';
			dynamic_sidebar( 'bottom-d' ); 
		echo '</div>';
			 
	}
	?>
</section>
<!-- End bottom postion of theme -->

	<footer id="colophon" class="site-footer">
		<div class="row">			
			<div class="wp-copyright  col-md-6 col-sm-12 col-xs-12 ">
				<?php if(get_theme_mod('enableCopyrightText') == 1 ){
					echo get_theme_mod('copyrightText');
				}
				?>
			</div><!-- site-info -->
			<div class="footer-menu col-md-6 col-sm-12 col-xs-12">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-3',
							'menu_id'        => 'Footer-menu',
						) );
					?>
					
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
