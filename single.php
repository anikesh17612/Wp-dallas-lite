<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dallas Lite
 */

get_header();
if ( get_theme_mod( 'select_blog_single_page_layout' ) === 'leftside' ) { ?>
		<div class="wpdal-left-sidebar wpdal-single-layout-page col-md-3 col-sm-12 col-xs-12">
			<?php get_sidebar(); ?>
		</div>
<?php }
if ( get_theme_mod( 'select_blog_single_page_layout' ) === 'fullwidth' ) {
	echo '<div id="primary" class="content-area  col-md-12 col-sm-12 col-xs-12 ">';
} else {
	echo '<div id="primary" class="content-area  col-md-9 col-sm-12 col-xs-12 ">';
} ?>
	<main id="main" class="site-main">
		<?php while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', get_post_type() );
			$user_id = get_current_user_id();
			echo '<div class="post-author-meta clearfix">';
			echo '<div class="author-meta col-md-2">' ;
			echo '<div class="author-img">';
			echo get_avatar( $post->post_author );
			echo '</div></div>';
			echo '<div class="col-md-10"><div class="author-title">';
			printf( // WPCS: XSS OK.
				dallaslite_user_data( $user_id,'first_name' ) . ' ' . dallaslite_user_data( $user_id,'last_name' )
			);
			echo '</div>';
			echo '<div class="author-desc">';
			printf( // WPCS: XSS OK.
				dallaslite_user_data( $user_id,'description' )
			);
			echo '</div>';
			if ( get_the_author_meta( 'url' ) !== '' ) {
					echo '<div class="author-meta-social-link">';
				if ( get_the_author_meta( 'url' ) ) {
						echo wp_kses_post( '<a href="' . get_the_author_meta( 'url' ) . '" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>' );
				}
				echo '</div>';
			}// End if().
			echo '</div>';
			echo '</div>';
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) : comments_template();
			endif;
		endwhile; // End of the loop. ?>
	</main><!-- #main -->
	<?php
		// for use in the loop, list 5 post titles related to first tag on current post.
			$terms = get_the_terms( get_the_ID(), 'category' );
			$term_list = wp_list_pluck( $terms, 'slug' );
			$related_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'post__not_in' => array( get_the_ID() ),
			);
			$my_query = new WP_Query( $related_args );
			if ( $my_query->have_posts() ) {
				echo '<div class="related_post">';
				echo '<h4>Related Posts</h4>';
				echo '<div class="row">';
				echo '<div class="col-md-12">';
				echo '<ul>';
				while ( $my_query->have_posts() ) :
					$my_query->the_post();
					echo '<li>';
					if ( get_the_post_thumbnail() !== '' ) { ?>
						<a href="<?php the_permalink() ?>" rel="<?php the_title(); ?>" title="Permanent Link to <?php the_title_attribute(); ?>" class="related_link_image"><figure><?php $post_id = '';
						echo get_the_post_thumbnail( $post_id, 'medium', array(
							'class' => 'alignleft',
						) ); ?></figure></a>
					<?php } ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="related_link"><?php 	the_title(); ?></a></h3>
				</li>
			<?php endwhile;
				echo '</ul></div></div></div>';
			}
			wp_reset_postdata();
?>
	</div><!-- #primary -->
	<?php if ( get_theme_mod( 'select_blog_single_page_layout' ) === 'rightside' || get_theme_mod( 'select_blog_single_page_layout' ) === '' ) { ?>
		<div class="wpdal-right-sidebar wpdal-single-layout-page col-md-3 col-sm-12 col-xs-12">
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>
</div> <!-- #row -->
</div><!-- #container -->
<?php get_footer();
