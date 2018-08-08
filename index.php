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
 * @package Dallas Lite.
 */

get_header();

if ( get_theme_mod( 'blog_layout_selection' ) === 'blogleft' ) { ?>
	<div class="wpdal-left-sidebar col-md-3">
		<?php get_sidebar(); ?>
	</div>
<?php }
if ( get_theme_mod( 'blog_layout_selection' ) === 'blogfullwidth' ) {
	echo '<div id="primary" class="content-area  col-md-12 col-sm-12 col-xs-12 ">';
} else {
	echo '<div id="primary" class="content-area  col-md-9 col-sm-12 col-xs-12 ">';
} ?>
	<main id="main" class="site-main">
	<?php if ( have_posts() ) :
		if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php endif;
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			/**
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_format() );
		endwhile;
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
		</main><!-- #main -->
<?php

/*
 *Show pagination option based on Blog pages show at most
 *
 */

if ( 'pagiloadmore' === get_theme_mod( 'select_pagination_layout' ) ) { ?>
	<div class="wpdal_pagination">
		<?php dallaslite_loadmore_btn(); ?>
	</div>
<?php
} else {
	the_post_pagination();
} ?>
</div><!-- #primary -->
<?php
if ( get_theme_mod( 'blog_layout_selection' ) === 'blogright' || get_theme_mod( 'blog_layout_selection' ) !== '' ) { ?>
	<div class="wpdal-right-sidebar col-md-3 col-sm-12 col-xs-12">
		<?php get_sidebar(); ?>
	</div>
<?php } ?>
 </div> <!-- #row -->
</div><!-- #container -->
<?php get_footer();
