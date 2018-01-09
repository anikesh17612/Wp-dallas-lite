<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_dallas_lite
 */
?>

	</div><!-- #content -->
<?php

if (is_active_sidebar('bottom-a') || is_active_sidebar('bottom-b') || is_active_sidebar('bottom-c') || is_active_sidebar('bottom-d'))
	{ ?>	
<!-- Create bottom postion of theme -->
<section id="bottom-section">
	<div class="container">
		<div class="row">
			<?php
				if (is_active_sidebar('bottom-a'))
					{
					echo '<div class="col-md-3">';
						dynamic_sidebar('bottom-a');
					echo '</div>';
					}

				if (is_active_sidebar('bottom-b'))
					{
					echo '<div class="col-md-3">';
					dynamic_sidebar('bottom-b');
					echo '</div>';
					}

				if (is_active_sidebar('bottom-c'))
					{
					echo '<div class="col-md-3">';
					dynamic_sidebar('bottom-c');
					echo '</div>';
					}

				if (is_active_sidebar('bottom-d'))
					{
					echo '<div class="col-md-3">';
					dynamic_sidebar('bottom-d');
					echo '</div>';
					}
			?>
		</div>
	</div>
</section>
<?php
	} ?>
<!-- End bottom postion of theme -->
<?php if(get_theme_mod('enable_copyright_text', '1') || has_nav_menu('menu-3') ){?>
	<footer id="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php $enable_copyright_text = get_theme_mod('enable_copyright_text', '1');
						if ($enable_copyright_text){ ?>
							<div class="wp-copyright col-md-6">
								<?php echo get_theme_mod('copyright_text', 'Copyright © 2018 WP Dallas <sup>Lite</sup>. All Right Reserved. Created by <a href="https://www.joomdev.com/wordpress-themes" target="_blank">JoomDev</a>'); ?>
							</div><!-- site-info -->
							<?php
						}else{		
							} ?>
						<div class="footer-menu col-md-6">
							<?php if (has_nav_menu('menu-3')){
								wp_nav_menu(array(
									'theme_location' => 'menu-3',
									'menu_id' => 'footer-menu',
									'menu_class' => 'nav menu'
								));
							}?>
						</div>
				</div>
			</div>
		</div>
	</footer><!-- #site-footer -->
<?php }
else{
		
	}?>
</div><!-- #page -->

<?php
wp_footer(); ?>

<!-- Back To Top -->
<?php

if (get_theme_mod('backToTop') == '1')
	{ ?>
<a href="javascript:void(0)" class="backtotop" style="display: block;"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<?php
	} ?>
</body>
</html>