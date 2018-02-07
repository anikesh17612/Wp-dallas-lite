<?php
/**
 * The social icons file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dallaslite
 */

 function copyright() {

        $facebook	=  get_theme_mod('facebooklogo','https://www.facebook.com/');
        $twitter	=  get_theme_mod('twitterlogo','https://twitter.com');
        $googleplus =  get_theme_mod('googlepluslogo','https://plus.google.com');
        $linkedin	=  get_theme_mod('linkedinlogo','https://in.linkedin.com/');
        $behance	=  get_theme_mod('behancelogo','https://www.behance.net/');
		    $youtube	=  get_theme_mod('youtubelogo','https://www.youtube.com/');
		    $Snapchat	=  get_theme_mod('snapchatlogo','https://www.snapchat.com/');
		    $skype		=  get_theme_mod('skypelogo','https://login.skype.com/login');
		    $pinterest	=  get_theme_mod('pinterestlogo','https://www.pinterest.com/');
        $custom		=  get_theme_mod('customlogo');

        if( $facebook || $twitter || $googleplus || $linkedin || $behance || $behance || $youtube || $Snapchat || $skype || $pinterest || $custom || "" ) {
            $html  = '<ul class="social-icons">';

            if( $facebook ) {
                $html .= '<li><a target="_blank" href="'. $facebook .'"><i class="fa fa-facebook"></i></a></li>';
            }
            if( $twitter ) {
                $html .= '<li><a target="_blank" href="'. $twitter .'"><i class="fa fa-twitter"></i></a></li>';
            }
            if( $googleplus ) {
                $html .= '<li><a target="_blank" href="'. $googleplus .'"><i class="fa fa-google-plus"></i></a></li>';
            }
            if( $linkedin ) {
                $html .= '<li><a target="_blank" href="'. $linkedin .'"><i class="fa fa-linkedin"></i></a></li>';
            }
			      if( $behance ) {
                $html .= '<li><a target="_blank" href="'. $behance .'"><i class="fa fa-behance"></i></a></li>';
            }
			      if( $youtube ) {
                $html .= '<li><a target="_blank" href="'. $youtube .'"><i class="fa fa-youtube"></i></a></li>';
            }
			      if( $Snapchat ) {
                $html .= '<li><a target="_blank" href="'. $Snapchat .'"><i class="fa fa-dribbble"></i></a></li>';
            }
			      if( $skype ) {
                $html .= '<li><a href="skype:'. $skype .'?chat"><i class="fa fa-skype"></i></a></li>';
            }
			      if( $pinterest ) {
                $html .= '<li><a target="_blank" href="'. $pinterest .'"><i class="fa fa-pinterest"></i></a></li>';
            }
            if( $custom ) {
                $explt_custom = explode(' ', $custom);
                $html .= '<li><a target="_blank" href="'. $explt_custom[1] .'"><i class="fa '. $explt_custom[0] .'"></i></a></li>';
            }

            $html .= '</ul>';
            return $html;
        }
    }
