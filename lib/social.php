<?php
/**
 * This is the most generic template file in a WordPress theme and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dallas Lite.
 */

/**
 * Social icon at theme Header.
 */
function socialicon() {
		$facebook 	= get_theme_mod( 'facebooklogo','' );
		$twitter	= get_theme_mod( 'twitterlogo','' );
		$googleplus = get_theme_mod( 'googlepluslogo','' );
		$linkedin	= get_theme_mod( 'linkedinlogo','' );
		$behance	= get_theme_mod( 'behancelogo','' );
		$youtube	= get_theme_mod( 'youtubelogo','' );
		$snapchat	= get_theme_mod( 'snapchatlogo','' );
		$skype		= get_theme_mod( 'skypelogo','' );
		$whatsapp	= get_theme_mod( 'whatsapplogo','' );
		$pinterest	= get_theme_mod( 'pinterestlogo','' );
		$custom		= get_theme_mod( 'customlogo' );
	if ( $facebook || $twitter || $googleplus || $linkedin || $behance || $behance || $youtube || $snapchat || $skype || $pinterest || $custom || '' ) {
		$html  = '<ul class="social-icons">';
		if ( $facebook ) {
			$html .= '<li><a target="_blank" href="' . $facebook . '"><i class="fa fa-facebook"></i></a></li>';
		}
		if ( $twitter ) {
			$html .= '<li><a target="_blank" href="' . $twitter . '"><i class="fa fa-twitter"></i></a></li>';
		}
		if ( $googleplus ) {
			$html .= '<li><a target="_blank" href="' . $googleplus . '"><i class="fa fa-google-plus"></i></a></li>';
		}
		if ( $linkedin ) {
			$html .= '<li><a target="_blank" href="' . $linkedin . '"><i class="fa fa-linkedin"></i></a></li>';
		}
		if ( $behance ) {
			$html .= '<li><a target="_blank" href="' . $behance . '"><i class="fa fa-behance"></i></a></li>';
		}
		if ( $youtube ) {
			$html .= '<li><a target="_blank" href="' . $youtube . '"><i class="fa fa-youtube"></i></a></li>';
		}
		if ( $snapchat ) {
			$html .= '<li><a target="_blank" href="' . $snapchat . '"><i class="fa fa-dribbble"></i></a></li>';
		}
		if ( $skype ) {
			$html .= '<li><a target="_blank" href="skype:' . $skype . '?chat"><i class="fa fa-skype"></i></a></li>';
		}
		if ( $whatsapp ) {
			$html .= '<li class="whatsappicon"><a href="whatsapp:' . $whatsapp . '?chat"><i class="fa fa-whatsapp"></i></a></li>';
		}
		if ( $pinterest ) {
			$html .= '<li><a target="_blank" href="' . $pinterest . '"><i class="fa fa-pinterest"></i></a></li>';
		}
		if ( $custom ) {
			$explt_custom = explode( ' ', $custom );
			$html .= '<li><a target="_blank" href="' . $explt_custom[1] . '"><i class="fa ' . $explt_custom[0] . '"></i></a></li>';
		}
			$html .= '</ul>';
			return $html;
	}// End if().
}
