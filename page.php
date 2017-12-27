<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Dallas_Lite
 */

get_header(); 
?>
<?php 
if(get_theme_mod('blog_layout_selection')=='blogleft' || get_theme_mod('blog_layout_selection')==""){ ?>
	<div class="wpdal-left-sidebar col-md-3">
  <?php get_sidebar();	?>
  </div>
<?php }
if (get_theme_mod('blog_layout_selection') == 'blogfullwidth')
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
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

	</div><!-- #primary -->
<?php

if (get_theme_mod('blog_layout_selection') == 'blogright')
	{ ?>
	<div class="wpdal-right-sidebar col-md-3 col-sm-12 col-xs-12">
		<?php
	get_sidebar(); ?>
    </div>
<?php
	}

if (get_theme_mod('blog_layout_selection') == 'blogfullwidth')
	{

	// We don't need sidebar here for Blog full width Layout

	} ?>
	

 </div> <!-- #row -->
</div><!-- #container -->
<?php
get_footer();
