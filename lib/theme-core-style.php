<?php
/**
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Dallas_Lite
 */
defined('ABSPATH') or die('No script kiddies please!');

if (!function_exists('wp_dallas_lite_css_generator'))
	{
	function wp_dallas_lite_css_generator()
		{
		$output = '';
		/* ******************************************************
		**********  Theme Options for Color settings   **********
		*********************************************************/
		$major_color = get_theme_mod('major_color', '#ffc414');
		if ($major_color)
			{
			$output.= 'a, a:visited, .bottom-widget .contact-info i, .bottom-widget .widget ul li a:hover, .latest-blog-content .latest-post-button:hover, .meta-category a:hover, .common-menu-wrap .nav >li >a:hover, .common-menu-wrap .nav >li.active >a, .common-menu-wrap .nav >li.menu-item-has-children.active > a:after,.common-menu-wrap .nav>li.menu-item-has-children > a:hover:after, .entry-header .entry-title a:hover,.blog-post-meta li a:hover,.entry-content .wrap-btn-style a.btn-style:hover, .widget-blog-posts-section .entry-title a:hover,.widget ul li a:hover,.footer-copyright ul li a:hover, .single-related-posts .common-post-item-intro a:hover,#site-navigation ul#primary-menu > li.current-menu-item > a,#site-navigation ul#primary-menu > li > a:hover, #bottom-section ul.menu > li > a:hover, #bottom-section ul.menu > li > a:focus, #site-navigation ul#primary-menu > li.current-menu-ancestor > a, .nav > li > a:focus, .nav > li > a:hover, a, #top-menu > li > a:hover, #top-menu > li > a:hover, #bottom-section ul > li > a:hover,.single-entry-content ul li:before,.single-entry-content ol li:before{ color: ' . esc_attr($major_color) . '; }';
			$output.= '
			@media screen and (max-width: 991px){
				#site-navigation.main-navigation ul#primary-menu ul.sub-menu > li > a:hover, #site-navigation.main-navigation ul#primary-menu ul.sub-menu > li > a:focus, #site-navigation.main-navigation ul#primary-menu ul.sub-menu > li.current-menu-item > a, #site-navigation.main-navigation ul#primary-menu ul.sub-menu > li.current-menu-ancestor > a{color:' . esc_attr($major_color) . ';}
				}';
			}

		if ($major_color)
			{
			$output.= '.bg-contact input[type=text]:focus,input:focus, textarea:focus, keygen:focus, select:focus,.single-entry-content ol li:before,.tagcloud > a:hover, .tagcloud > a:focus, #bottom-section .tagcloud > a:hover, #bottom-section .tagcloud > a:focus{ border-color: ' . esc_attr($major_color) . '; }';
			}

		if ($major_color)
			{
			$output.= '.style-title,.comments-title,.comment-reply-title{ border-left :  4px solid ' . esc_attr($major_color) . '; }';
			}

		if ($major_color)
			{
			$output.= '.common-menu-wrap .nav >li.current >a, .header-solid .common-menu-wrap .nav >li.current >a, .portfolio-filter .btn-link.active, .portfolio-filter li a:hover, .latest-review-single-layout2 .latest-post-title a:hover, .blog-arrows a:hover{ color: ' . esc_attr($major_color) . '; }';
			}

		if ($major_color)
			{
			$output.= '.team-content4,.portfolio-filter li a:before, .classic-slider .owl-dots .active >span, .widget .tagcloud a:hover, #header-section .social-icons li a:hover, #header-section .social-icons li a:focus, #site-navigation ul#primary-menu ul.sub-menu > li > a:hover, #site-navigation ul#primary-menu ul.sub-menu > li > a:focus, #site-navigation ul#primary-menu ul.sub-menu > li.current-menu-item > a, #site-navigation ul#primary-menu ul.sub-menu > li.current-menu-ancestor > a, .menu-toggle, .backtotop, .btn-default, #wp-subscribe.wp-subscribe-wrap{ background: ' . esc_attr($major_color) . '; }';
			}

		// .select2-container .select2-dropdown .select2-results ul li

		$hover_color = get_theme_mod('hover_color', '#e6ac00');
		if ($hover_color)
			{
			$output.= 'a:hover, .post-content-wrapper-controller:hover, .post-content-wrapper-controller .fa.pull-left:hover, .post-content-wrapper-controller .fa.pull-right:hover , .widget.widget_rss ul li a,.social-share a:hover{ color: ' . esc_attr($hover_color) . '; }';
			$output.= '.error-page-inner a.btn.btn-primary.btn-lg:hover,.btn.btn-primary:hover,input[type=button]:hover{ background-color: ' . esc_attr($hover_color) . '; }';
			$output.= '.woocommerce a.button:hover{ border-color: ' . esc_attr($hover_color) . '; }';
			}

		/* ************************************************************
		**********  Quick Style for headings and Google font **********
		****************************************************************/
		$bstyle = $mstyle = $h1style = $h2style = $h3style = $h4style = $h5style = $h6style = '';

		// Body

		if (get_theme_mod('body_font_size', '16')) 
			{
			$bstyle.= 'font-size:' . get_theme_mod('body_font_size', '16') . 'px;';
			}

		if (get_theme_mod('body_google_font'))
			{
			$bstyle.= 'font-family:"' . get_theme_mod('body_google_font', 'Lato') . '",sans-serif;';
			}

		// Menu

		$mstyle = '';
		if (get_theme_mod('menu_font_size', '15'))
			{
			$mstyle.= 'font-size:' . get_theme_mod('menu_font_size', '15') . 'px;';
			}

		if (get_theme_mod('menu_google_font', 'lato'))
			{
			$mstyle.= 'font-family:"' . get_theme_mod('menu_google_font', 'Lato') . '",sans-serif;';
			}

		// Heading 1

		$h1style = '';
		if (get_theme_mod('h1_font_size', '42'))
			{
			$h1style.= 'font-size:' . get_theme_mod('h1_font_size', '42') . 'px;';
			}

		if (get_theme_mod('h1_google_font', 'lato'))
			{
			$h1style.= 'font-family:"' . get_theme_mod('h1_google_font', 'Lato') . '",sans-serif;';
			}
			
		if (get_theme_mod('h1_line_height', '32'))
			{
				
			$h1style.= 'line-height:' . get_theme_mod('h1_line_height', '32') . 'px;';
			}	

		// Heading 2

		$h2style = '';
		if (get_theme_mod('h2_font_size', '36'))
			{
			$h2style.= 'font-size:' . get_theme_mod('h2_font_size', '36') . 'px;';
			}

		if (get_theme_mod('h2_google_font', 'lato'))
			{
			$h2style.= 'font-family:"' . get_theme_mod('h2_google_font', 'Lato') . '",sans-serif;';
			}
			
		if (get_theme_mod('h2_line_height', '32'))
			{
			$h2style.= 'line-height:' . get_theme_mod('h2_line_height', '32') . 'px;';
			}	

		// Heading 3

		$h3style = '';
		if (get_theme_mod('h3_font_size', '30'))
			{
			$h3style.= 'font-size:' . get_theme_mod('h3_font_size', '30') . 'px;';
			}

		if (get_theme_mod('h3_google_font', 'lato'))
			{
			$h3style.= 'font-family:"' . get_theme_mod('h3_google_font', 'Lato') . '",sans-serif;';
			}
		if (get_theme_mod('h3_line_height', '30'))
			{
			$h3style.= 'line-height:' . get_theme_mod('h3_line_height', '30') . 'px;';
			}	

		// Heading 4

		$h4style = '';
		if (get_theme_mod('h4_font_size', '27'))
			{
			$h4style.= 'font-size:' . get_theme_mod('h4_font_size', '27') . 'px;';
			}

		if (get_theme_mod('h4_google_font', 'lato'))
			{
			$h4style.= 'font-family:"' . get_theme_mod('h4_google_font', 'Lato') . '",sans-serif;';
			}
		if (get_theme_mod('h4_line_height', '27'))
			{
			$h4style.= 'line-height:' . get_theme_mod('h4_line_height', '27') . 'px;';
			}	

		// Heading 5

		$h5style = '';
		if (get_theme_mod('h5_font_size', '25'))
			{
			$h5style.= 'font-size:' . get_theme_mod('h5_font_size', '25') . 'px;';
			}

		if (get_theme_mod('h5_google_font', 'lato'))
			{
			$h5style.= 'font-family:"' . get_theme_mod('h5_google_font', 'Lato') . '",sans-serif;';
			}
		if (get_theme_mod('h5_line_height', '25'))
			{
			$h5style.= 'line-height:' . get_theme_mod('h5_line_height', '25') . 'px;';
			}	

		// Heading 6

		$h6style = '';
		if (get_theme_mod('h6_font_size', '20'))
			{
			$h6style.= 'font-size:' . get_theme_mod('h6_font_size', '20') . 'px;';
			}

		if (get_theme_mod('h6_google_font', 'lato'))
			{
			$h6style.= 'font-family:"' . get_theme_mod('h6_google_font', 'Lato') . '",sans-serif;';
			}
		if (get_theme_mod('h6_line_height', '20'))
			{
			$h6style.= 'line-height:' . get_theme_mod('h6_line_height', '20') . 'px;';
			}
		$output.= 'body{' . $bstyle . '}';
		$output.= '.nav-menu>li>a{' . $mstyle . '}';
		$output.= 'h1{' . $h1style . '}';
		$output.= 'h2{' . $h2style . '}';
		$output.= 'h3{' . $h3style . '}';
		$output.= 'h4{' . $h4style . '}';
		$output.= 'h5{' . $h5style . '}';
		$output.= 'h6{' . $h6style . '}';
		$output.= 'body{ background-color: ' . esc_attr(get_theme_mod('body_bg_color', '#fff')) . '; }';
		$output.= '#header-section{ background-color: ' . esc_attr(get_theme_mod('top_header_color', '#1a1c27')) . '; }';
		$output.= '.site-header{ background-color: ' . esc_attr(get_theme_mod('header_color', '#222533')) . '; }';
		$output.= '#bottom-section{ background-color: ' . esc_attr(get_theme_mod('footer_color', '#1a1c27')) . '; }';
		$output.= '#footer-section{ background-color: ' . esc_attr(get_theme_mod('copyright_color', '#222533')) . '; }';

		// Button color setting...

		if (get_theme_mod('button_hover_bg_color', '#363b52'))
			{
			$output.= '.mc4wp-form-fields input[type=submit], .demo-four .mc4wp-form-fields input[type=submit], .common-menu-wrap .nav>li.online-booking-button a, .error-page-inner a.btn.btn-primary.btn-lg,.btn.btn-primary, .package-list-button,
      .contact-submit input[type=submit],.form-submit input[type=submit]{ background-color: ' . esc_attr(get_theme_mod('button_bg_color', '#363b52')) . ' !important; ; border-color: ' . esc_attr(get_theme_mod('button_bg_color', '#363b52')) . '; color: ' . esc_attr(get_theme_mod('button_text_color', '#fff')) . ' !important; border-radius: 4px; }';
			}
		if (get_theme_mod('button_hover_bg_color', '#363b52'))
			{
			$output.= '.mc4wp-form-fields input[type=submit]:hover, .demo-four .mc4wp-form-fields input[type=submit]:hover, .common-menu-wrap .nav>li.online-booking-button a:hover, .error-page-inner a.btn.btn-primary.btn-lg:hover,.btn.btn-primary:hover, .package-list-button:hover, .contact-submit input[type=submit]:hover,.form-submit input[type=submit]:hover{ background-color: ' . esc_attr(get_theme_mod('button_hover_bg_color', '#363b52')) . '; border-color: ' . esc_attr(get_theme_mod('button_hover_bg_color', '#363b52')) . '; color: ' . esc_attr(get_theme_mod('button_hover_text_color', '#ffffff')) . ' !important; }';
			}

		$output.= '.subtitle-cover:before{background:' . get_theme_mod('sub_header_overlayer_color', 'rgba(0, 0, 0, 0.5)') . ';}';
		$output.= '.subtitle-cover{padding:100px 0; margin-bottom: 100px;}';
		$output.= "body.error404,body.page-template-404{
            width: 100%;
            height: 100%;
            min-height: 100%;
        }";
		return $output;
		}
	}