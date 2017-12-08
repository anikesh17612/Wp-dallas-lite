<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Dallas_Lite
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp_dallas_lite' ); ?></a>
	<div id="header-section">
		<div class="container">
			<div class="row">
					<div class="top-menu col-md-6 col-sm-12 col-xs-12">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'top-menu',
							) );
						?>
					</div>
					<div class="social-icon col-md-6 col-sm-12 col-xs-12">
						<?php echo socialicon();?>
					</div>
				</div>
		</div>
	</div>
	<!-- Top Header -->
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-branding">
				<?php
				if(get_theme_mod('allLogoFavicon') == 'logo-image' || get_theme_mod('allLogoFavicon')==""){?>
					
					<?php if(empty(get_theme_mod('uploadLogo'))){?>
						<div class="wpdal_logo_image"><img src="<?php echo get_template_directory_uri().'/assets/images/logo.png';?>" alt=""></div> 
					<?php }else{?>
						<div class="wpdal_logo_image"><img src="<?php echo get_theme_mod('uploadLogo');?>" alt=""></div> 
					<?php }?>
				<?php }else if(get_theme_mod('allLogoFavicon')=='logo-text'){?>
					<div class="wpdal_logo_text"><h1><?php echo get_theme_mod('siteTitle')?></h1></div> 
					<div class="wpdal_logo_text"><p><?php echo get_theme_mod('tagLine')?></p></div> 
				<?php }else{
					the_custom_logo();	
				}
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
				
				
				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menus', 'wp_dallas_lite' ); ?></button>
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
					?>
				</nav><!-- #site-navigation -->
			</div><!-- .site-branding -->
<h1>siddhartha</h1>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
