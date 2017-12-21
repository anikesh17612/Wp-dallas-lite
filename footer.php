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
<?php if(is_active_sidebar( 'bottom-a' ) || is_active_sidebar( 'bottom-b' ) || is_active_sidebar( 'bottom-c' ) || is_active_sidebar( 'bottom-d' )){?>	
<!-- Create bottom postion of theme -->
<section id="bottom-section">
	<div class="container">
		<div class="row">
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
		</div>
	</div>
</section>
<?php } ?>
<!-- End bottom postion of theme -->

	<footer id="footer-section">
		<div class="container">
			<div class="row">
					<?php 
					$enable_copyright_text = get_theme_mod('enable_copyright_text', '1');
					if($enable_copyright_text){ ?>
					<div class="wp-copyright col-md-6 col-sm-12 col-xs-12 ">
						<?php echo get_theme_mod('copyright_text', 'Copyright © 2017 WP Dallas <sup>Lite</sup>. All Right Reserved. Created by <a href="https://www.joomdev.com/wordpress-themes" target="_blank">JoomDev</a>');?>
					</div><!-- site-info -->
					<?php }	?>
				
				<div class="footer-menu col-md-6 col-sm-12 col-xs-12">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-3',
							'menu_id'		 => 'footer-menu',
							'menu_class'	 => 'nav menu'
						) );
					?>
				</div>
			</div>
		</div>
	</footer><!-- #site-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Back To Top -->
<?php
if(get_theme_mod('backToTop') == '1'){ ?>
<a href="javascript:void(0)" class="backtotop" style="display: block;"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<?php } ?>
</body>
</html>
