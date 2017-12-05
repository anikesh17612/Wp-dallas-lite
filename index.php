<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Dallas_Lite
 */
get_header(); 
?>
<?php 
if(get_theme_mod('blog_layout_selection')=='blogleft'){ ?>
	<div class="wpdal-left-sidebar col-md-3 col-sm-12 col-xs-12">
		<?php get_sidebar();	?>
    </div>
<?php }?>



	<div id="primary" class="content-area  col-md-9 col-sm-12 col-xs-12 ">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 
		
		
		
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php
if(get_theme_mod('blog_layout_selection')=='blogright'){ ?>
	<div class="wpdal-right-sidebar col-md-3 col-sm-12 col-xs-12">
		<?php get_sidebar();	?>
    </div>
<?php }

if(get_theme_mod('blog_layout_selection')=='blogfullwidth'){
  //We don't need sidebar here for Blog full width Layout
}?>
 </div>
 <?php
if(get_theme_mod('select_pagination_layout') == 'paginumber'){?>
	<div class="wpdal_pagination"> 
		<?php echo paginate_links( $args );?>
	</div>
<?php 
}

if(get_theme_mod('select_pagination_layout') == 'pagiloadmore'){?>
	<div class="wpdal_pagination"> 
		 <div class="loadmore">Load More...</div>
	</div>
<?php 
}
get_footer();
