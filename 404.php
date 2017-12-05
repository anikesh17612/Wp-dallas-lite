<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Dallas_Lite
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					
					<h1 class="page-title"><?php echo get_theme_mod('404pageTitle'); ?></h1>
					<img src="<?php echo get_theme_mod( 'pageLogoImage' ); ?>" alt="404-logo">
					
				</header><!-- .page-header -->

				<div class="page-content" style="background-image:url(<?php echo get_theme_mod('pageBackgroundImage')?>)">
					<p><?php echo get_theme_mod('404pageDescription'); ?></p>
					<p><a href="/home"><?php echo get_theme_mod('404buttonText'); ?></a></p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
