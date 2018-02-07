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
         function add_social_share_icons()
        	{
        	global $post;
        	$url = get_permalink($post->ID);
        	$url = esc_url($url);
        	$title = str_replace(' ', '%20', get_the_title());
        	$twitterURL = 'https://twitter.com/intent/tweet?text=' . $title . '&amp;url=' . $url . '&amp;';
        	$postThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) , 'full');
        	$pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $url . '&amp;media=' . $postThumbnail[0] . '&amp;description=' . $title;
        	$deliciousURL = 'https://delicious.com/save?v=' . $url . '&title=' . $title;

          if (get_theme_mod('facebookshare') == 1 )
        		{
        		$html = $html . "<div class='facebook'><a target='_blank' href='http://www.facebook.com/sharer.php?u=" . $url . "'><i class='fa fa-facebook' aria-hidden='true'></i></a></div>";
        		}
        	if (get_theme_mod('twittershare') == 1 || get_theme_mod('twittershare') == "")
        		{
        		$html = $html . "<div class='twitter'><a target='_blank' href='" . $twitterURL . "' ><i class='fa fa-twitter' aria-hidden='true'></i></a></div>";
        		}
        	if (get_theme_mod('linkedinshare') == 1 || get_theme_mod('linkedinshare') == "")
        		{
        		$html = $html . "<div class='linkedin'><a target='_blank' href='http://www.linkedin.com/shareArticle?url=" . $url . "'><i class='fa fa-linkedin' aria-hidden='true'></i></a></div>";
        		}
        	if (get_theme_mod('redditshare') == 1 || get_theme_mod('redditshare') == "")
        		{
        		$html = $html . "<div class='reddit'><a target='_blank' href='http://reddit.com/submit?url=" . $url . "'><i class='fa fa-reddit-alien' aria-hidden='true'></i></a></div>";
        		}
        	if (get_theme_mod('emailshare') == 1 || get_theme_mod('emailshare') == "")
        		{
        		$html = $html . "<div class='stumbleupon'><a target='_blank' href='https://www.stumbleupon.com/submit?url=" . $url . "'><i class='fa fa-stumbleupon' aria-hidden='true'></i></a></div>";
        		}
        	if (get_theme_mod('googleplusshare') == 1 || get_theme_mod('googleplusshare') == "")
        		{
        		$html = $html . "<div class='delicious'><a target='_blank' href='" . $deliciousURL . "'><i class='fa fa-delicious' aria-hidden='true'></i></a></div>";
        		}
        	if (get_theme_mod('pinterestshare') == 1 || get_theme_mod('pinterestshare') == "")
        		{
        		$html = $html . "<div class='pinterest'><a target='_blank' href='" . $pinterestURL . "'><i class='fa fa-pinterest' aria-hidden='true'></i></a></div>";
        		}
        	if (get_theme_mod('deliciousshare') == 1 || get_theme_mod('deliciousshare') == "")
        		{
        		$html = $html . "<div class='google-plus'><a target='_blank' href='https://plus.google.com/share?url=" . $url . "'><i class='fa fa-google-plus' aria-hidden='true'></i></a></div>";
        		}
        	if (get_theme_mod('stumbleuponshare') == 1 || get_theme_mod('stumbleuponshare') == "")
        		{
        		$html = $html . "<div class='email'><a target='_blank' href='mailto:?subject=" . $title . "' title='Share by email'><i class='fa fa-envelope-o' aria-hidden='true'></i></a></div>";
        		}
        		$tag = '';
        		if(is_single()){
                    $tag = the_tags( '<div class="tags_list">', ' ', '</div>' );
                }
        	return $content = $tag. $html;
        	}
