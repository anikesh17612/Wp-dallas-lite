<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dallas Lite
 */
?>
    <!doctype html>
    <?php if( esc_attr( get_theme_mod( "right-to-left", false ) ) ){ ?>
    <html dir="rtl" <?php language_attributes(); ?>>
    <?php }
    else{ ?>
	<html <?php language_attributes(); ?>>
    <?php } ?>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'thumnail'); ?>
        <?php if ($fb_image) : ?>
        <meta property="og:image" content="<?php echo  wp_kses_post($fb_image[0]); ?>" />
        <?php endif; ?>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content">
                <?php esc_html_e('Skip to content', 'dallas-lite'); ?>
            </a>
            <div id="header-section">
                <div class="container">
                    <div class="row">
                        <div class="top-menu col-md-6 col-sx-12">
                            <?php
						if (has_nav_menu('menu-2'))
							{
							wp_nav_menu(array(
								'theme_location' => 'menu-2',
								'menu_id' => 'top-menu',
								'menu_class' => 'nav menu'
							));
							}
						?>
                        </div>
                        <?php
						if ( esc_attr( get_theme_mod( 'facebooklogo', '#' ) ) != '' || esc_attr( get_theme_mod( 'twitterlogo', '#' ) ) != '' || esc_attr( get_theme_mod( 'googlepluslogo', '#' ) ) != '' || esc_attr( get_theme_mod( 'linkedinlogo', '#' ) ) != '' || esc_attr( get_theme_mod( 'behancelogo', '#' ) ) != '' || esc_attr( get_theme_mod( 'youtubelogo', '#' ) ) != '' || esc_attr( get_theme_mod( 'snapchatlogo', '#' ) ) != '' || esc_attr( get_theme_mod( 'skypelogo', '#' ) ) != '' || esc_attr( get_theme_mod( 'whatsapplogo', '#' ) ) != '' || esc_attr( get_theme_mod( 'pinterestlogo', '#' ) ) != '' || esc_attr( get_theme_mod( 'customlogo', '#' ) ) != '')
							{ ?>
                            <div class="social-icon col-md-6 col-sx-12">
                                <?php echo wp_kses_post(dallas_lite_socialicon()); ?>
                            </div>
                            <?php
					} ?>
                    </div>
                </div>
            </div>
            <!-- Top Header -->
            <header id="masthead" class="site-header">
				<div class="custom-header-media">
					<?php the_custom_header_markup(); ?>
				</div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="site-branding">
                                <a href="<?php echo wp_kses_post(site_url()); ?>">
                                    <?php
					if ( esc_attr( get_theme_mod( 'allLogoFavicon' ) ) == 'logo-text' || esc_attr( get_theme_mod( 'allLogoFavicon' ) ) == "")
					{
						$titletext = esc_attr( get_theme_mod( 'siteTitle','title_text' ) );
						if($titletext){ ?>
                                        <div class="wpdal_logo_text">
                                            <h1>
                                                <?php
								echo wp_kses_post( esc_attr( get_theme_mod( 'siteTitle','Dallas Lite' ) ) ); ?>
                                            </h1>
                                        </div>
                                        <?php }
							$tagLinetext = esc_attr( get_theme_mod( 'tagLine','tagLine_text' ) );
							if($tagLinetext){?>
                                        <div class="wpdal_logo_text">
                                            <p>
                                                <?php
									echo wp_kses_post( esc_attr( get_theme_mod( 'tagLine','Just Another WordPress Site' ) ) ); ?>
                                            </p>
                                        </div>
                                        <?php
						}}
  				else
					{?>
						<div class="wpdal_logo_image">
							<?php the_custom_logo(); ?></div>
                    <?php } ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <nav id="site-navigation" class="main-navigation">
                                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<?php echo '<i class="fa fa-bars" aria-hidden="true"></i>'; ?></button>
                                <?php
						if (has_nav_menu('menu-1'))
							{
							wp_nav_menu(array(
								'theme_location' => 'menu-1',
								'menu_id' => 'primary-menu',
								'menu_class' => 'nav menu'
							));
							}
							?>
                            </nav>
                        </div>
                        <!-- #site-navigation -->
                        <!-- .site-branding -->
                    </div>
                </div>
            </header>
            <!-- #masthead -->
            <div id="content" class="site-content">
                <div class="container">
                    <div class="row">
