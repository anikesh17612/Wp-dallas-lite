<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dallaslite
 */
?>

	</div><!-- #content -->
<?php
get_sidebar('footer');
?>
<!-- End bottom postion of theme -->
<?php if(get_theme_mod('enable_copyright_text', '1') || has_nav_menu('menu-3') ){?>
	<footer id="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php $enable_copyright_text = get_theme_mod('enable_copyright_text', '1');
						if ($enable_copyright_text){ ?>
							<div class="wp-copyright col-md-6">
								<?php $main_url='https://www.joomdev.com/wordpress-themes'; ?>
								<?php echo wp_kses_post(get_theme_mod('copyright_text', 'Copyright &copy;'.' ' . '-'. date('Y').' '. 'Dallas Lite <sup>Lite</sup>. All Right Reserved. Created by <a href="'.$main_url.'" target="_blank">JoomDev</a>')); ?>
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
<?php }?>
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
