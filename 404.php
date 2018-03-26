<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Dallas Lite
 */
get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php echo esc_html( get_theme_mod( '404pageTitle' ,esc_html__( 'Page not Found.', 'dallas-lite' ) ) ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php echo esc_html( get_theme_mod( '404pageDescription',esc_html__( 'The page you are looking for was moved, removed, renamed or might never existed..', 'dallas-lite' ) ) ); ?></p>
					<p><a href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( get_theme_mod( '404buttonText', esc_html__( 'Go Back Home', 'dallas-lite' ) ) ); ?></a></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div> <!-- #row -->
</div><!-- #container -->
<?php
get_footer();
