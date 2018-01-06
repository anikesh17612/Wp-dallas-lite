<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Dallas_Lite
 */
get_header();

if (get_theme_mod('select_blog_single_page_layout') == 'leftside' || get_theme_mod('select_blog_single_page_layout') == "")
	{ ?>
	<div class="wpdal-left-sidebar wpdal-single-layout-page col-md-3 col-sm-12 col-xs-12">
		<?php
	get_sidebar(); ?>
    </div>
<?php
	} ?>
<?php

if (get_theme_mod('select_blog_single_page_layout') == 'fullwidth')
	{
	echo '<div id="primary" class="content-area  col-md-12 col-sm-12 col-xs-12 ">';
	}
  else
	{
	echo '<div id="primary" class="content-area  col-md-9 col-sm-12 col-xs-12 ">';
	}

?>
		<main id="main" class="site-main">

		<?php

while (have_posts()):
	the_post();
	get_template_part('template-parts/content', get_post_type());


		$authors_bio = get_user_meta($post->post_author);

		// Filter out empty meta data

		$authors_bio = array_filter(array_map(
		function ($a)
			{
			return $a[0];
			}

		, $authors_bio));
		echo '<div class="post-author-meta clearfix">';
		echo '<div class="author-meta col-md-2">
			<div class="author-img">';
		echo get_avatar($post->post_author);
		echo '</div></div>';
		echo '<div class="col-md-10"><div class="author-title">';
		echo $authors_bio['first_name'] . ' ' . $authors_bio['last_name'];
		echo '</div>';
		echo '<div class="author-desc">';
		echo $authors_bio['description'];
		echo '</div>';

		if (get_the_author_meta('url') != '' || get_the_author_meta(fb_url) != '' || get_the_author_meta('twitter_url') != '' || get_the_author_meta('gplus_url') != '' || get_the_author_meta('linkedin_url') != '' || get_the_author_meta('behance_url') != '' || get_the_author_meta('youtube_url') != '' || get_the_author_meta('snapchat_url') != '' || get_the_author_meta('skype_url') != '' || get_the_author_meta('pinterest_url') != '')
			{
			echo '<div class="author-meta-social-link">';
			if (get_the_author_meta('url'))
				{
				echo '<a href="' . get_the_author_meta('url') . '" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>';
				}

			$user_id = get_current_user_id();
			$user_meta = get_user_meta($user_id);
			if (get_the_author_meta('fb_url'))
				{
				echo '<a href="' . get_the_author_meta('fb_url') . '" target="_blank"><i class="fa fa-facebook"></i></a>';
				}

			if (get_the_author_meta('twitter_url'))
				{
				echo '<a href="' . get_the_author_meta('twitter_url') . '" target="_blank"><i class="fa fa-twitter"></i></a>';
				}

			if (get_the_author_meta('gplus_url'))
				{
				echo '<a href="' . get_the_author_meta('gplus_url') . '" target="_blank"><i class="fa fa-google-plus"></i></a>';
				}

			if (get_the_author_meta('linkedin_url'))
				{
				echo '<a href="' . get_the_author_meta('linkedin_url') . '" target="_blank"><i class="fa fa-linkedin"></i></a>';
				}

			if (get_the_author_meta('behance_url'))
				{
				echo '<a href="' . get_the_author_meta('behance_url') . '" target="_blank"><i class="fa fa-behance"></i></a>';
				}

			if (get_the_author_meta('youtube_url'))
				{
				echo '<a href="' . get_the_author_meta('youtube_url') . '" target="_blank"><i class="fa fa-youtube"></i></a>';
				}

			if (get_the_author_meta('snapchat_url'))
				{
				echo '<a href="' . get_the_author_meta('snapchat_url') . '" target="_blank"><i class="fa fa-snapchat"></i></a>';
				}

			if (get_the_author_meta('skype_url'))
				{
				echo '<a href="' . get_the_author_meta('skype_url') . '" target="_blank"><i class="fa fa-skype"></i></a>';
				}

			if (get_the_author_meta('pinterest_url'))
				{
				echo '<a href="' . get_the_author_meta('pinterest_url') . '" target="_blank"><i class="fa fa-pinterest"></i></a>';
				}

			echo '</div>';
			}

		echo '</div>';
		echo '</div>';

	// If comments are open or we have at least one comment, load up the comment template.

	if (comments_open() || get_comments_number()):
		comments_template();
	endif;
endwhile; // End of the loop.

?>

		</main><!-- #main -->
		<?php

// for use in the loop, list 5 post titles related to first tag on current post

$tags = wp_get_post_tags($post->ID);

if ($tags != '')
	{
	$first_tag = $tags[0]->term_id;
	$args = array(
		'tag__in' => array(
			$first_tag
		) ,
		'post__not_in' => array(
			$post->ID
		) ,
		'posts_per_page' => 5,
		'caller_get_posts' => 1
	);
	$my_query = new WP_Query($args);
	if ($my_query->have_posts())
		{
		echo '<div class="related_post">';
		echo '<h4>Related Posts</h4>';
		echo '<div class="row">';
		echo '<div class="col-md-12">';
		echo '<ul>';
		while ($my_query->have_posts()):
			$my_query->the_post();
			echo '<li>';
?>			
			<?php
			if (get_the_post_thumbnail() != '')
				{ ?>
			<a href="<?php
				the_permalink() ?>" rel="<?php
				the_title(); ?>" title="Permanent Link to <?php
				the_title_attribute(); ?>" class="related_link_image"><figure><?php
				echo get_the_post_thumbnail($post_id, 'medium', array(
					'class' => 'alignleft'
				)); ?></figure></a>
			<?php
				} ?>
				<a href="<?php
			the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php
			the_title_attribute(); ?>" class="related_link"><?php
			the_title(); ?></a></h3>
			</li>
			
			
	 
			<?php
		endwhile;
		echo '</ul>
			</div></div></div>';
		}

	wp_reset_query();
	}

?>
	</div><!-- #primary -->

	<?php

if (get_theme_mod('select_blog_single_page_layout') == 'rightside')
	{ ?>
		<div class="wpdal-right-sidebar wpdal-single-layout-page col-md-3 col-sm-12 col-xs-12">
			<?php
	get_sidebar(); ?>
		</div>
	<?php
	}

if (get_theme_mod('select_blog_single_page_layout') == 'fullwidth')
	{

	// We don't need sidebar here for Single page full width Layout

	}

?>
</div> <!-- #row -->
</div><!-- #container -->


<?php
get_footer();