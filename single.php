<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Dallas_Lite
 */

get_header(); 

if(get_theme_mod('select_blog_single_page_layout')=='leftside' || get_theme_mod('select_blog_single_page_layout')==""){ ?>
	<div class="wpdal-left-sidebar wpdal-single-layout-page col-md-3 col-sm-12 col-xs-12">
		<?php get_sidebar();	?>
    </div>
<?php }?>

	<div id="primary" class="content-area col-md-9 col-sm-12 col-xs-12">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if(get_theme_mod('select_blog_single_page_layout')=='rightside'){ ?>
	<div class="wpdal-right-sidebar wpdal-single-layout-page col-md-3 col-sm-12 col-xs-12">
		<?php get_sidebar();	?>
    </div>
<?php }

if(get_theme_mod('select_blog_single_page_layout')=='fullwidth'){
  //We don't need sidebar here for Single page full width Layout
}
get_footer();

