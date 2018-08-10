<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dallas Lite
 */

get_header(); ?>
<?php if ( get_theme_mod( 'blog_layout_selection' ) === 'blogleft' ) { ?>
		<div class="wpdal-left-sidebar col-md-3">
			<?php get_sidebar(); ?>
		</div>
		<?php } ?>
	<?php	if ( get_theme_mod( 'blog_layout_selection' ) === 'blogfullwidth' ) {
					echo '<div id="primary" class="content-area  col-md-12">';
} else {
		echo '<div id="primary" class="content-area  col-md-9">';
} ?>
<main id="main" class="site-main">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' ); ?>
		</header><!-- .page-header -->
<?php
/* Start the Loop */

while ( have_posts() ) :
	the_post();

	/*
	 * Include the Post-Format-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	*/

	get_template_part( 'template-parts/content', get_post_format() );
endwhile;
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif; ?>
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
<?php }	else { ?>
	<div class="wpdal_pagination">
		<?php	the_posts_pagination(); ?>
	</div>
<?php } ?>
			</div><!-- #primary -->
<?php if ( get_theme_mod( 'blog_layout_selection' ) === 'blogright' || get_theme_mod( 'blog_layout_selection' ) !== '' ) { ?>
		<div class="wpdal-right-sidebar col-md-3">
			<?php get_sidebar(); ?>
		</div>
<?php } ?>
	</div> <!-- #row -->
	</div><!-- #container -->
	<?php
	get_footer();
