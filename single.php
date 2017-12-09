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
<?php if(get_theme_mod('select_blog_single_page_layout') =='fullwidth' ){
		echo '<div id="primary" class="content-area  col-md-12 col-sm-12 col-xs-12 ">';
	}else{
		 echo '<div id="primary" class="content-area  col-md-9 col-sm-12 col-xs-12 ">';
	}
?>
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			$tags_array = get_tags( $args );  
			  //print_r($tags_array);
			  
			foreach($tags_array as $tags){
				$tagString[] = '<span class="post_tag_name">'.$tags->name.'</span>';
			}  
			echo '<div class="tags_list">';
			echo implode(" ",$tagString);
			echo '</div>';
			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
//for use in the loop, list 5 post titles related to first tag on current post
$authors_bio = get_user_meta( $post->post_author );

// Filter out empty meta data
$authors_bio = array_filter( array_map( function( $a ) {
	return $a[0];
}, $authors_bio
)
);
//echo '<pre>';print_r(get_the_author_meta('url'));echo '</pre>';
echo '<div class="post-author-meta row">';
	echo '<div class="author-meta col-md-2 col-sm-6 col-xs-6">
	<div class="author-img">';
		echo get_avatar( $post->post_author);
	echo '</div></div>';
	echo '<div class="col-md-10 col-sm-6 col-xs-6"><div class="author-title">';
		echo $authors_bio['first_name'].' '.$authors_bio['last_name'];
	echo '</div>';
	echo '<div class="author-desc">';
		echo $authors_bio['description'];
	echo '</div>';
	echo '<div class="author-meta-social-link">';
	if(get_the_author_meta('url')){
		echo '<a href="'.get_the_author_meta('url').'" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>';
	}
	echo '</div></div>';
	
echo '</div>';

$tags = wp_get_post_tags($post->ID);
	if ($tags) {
		echo '<h1>Related Posts</h1>';
		$first_tag = $tags[0]->term_id;
		$args=array(
		'tag__in' => array($first_tag),
		'post__not_in' => array($post->ID),
		'posts_per_page'=>5,
		'caller_get_posts'=>1
		);
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post(); 
			echo '<div class="related_post">';
			echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'alignleft' ) );
			$categories_list = get_the_category_list( esc_html__( ', ', 'wp_dallas_lite' ) );
			?>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			<?php if($categories_list){ 
				echo '<span class="post_category">'.$categories_list.'</span>';
			}?>
			</div>
	 
			<?php
			endwhile;
			}
		wp_reset_query();
	}
	?>
	<?php
	if(get_theme_mod('select_blog_single_page_layout')=='rightside'){ ?>
		<div class="wpdal-right-sidebar wpdal-single-layout-page col-md-3 col-sm-12 col-xs-12">
			<?php get_sidebar();	?>
		</div>
	<?php }

	if(get_theme_mod('select_blog_single_page_layout')=='fullwidth'){
	  //We don't need sidebar here for Single page full width Layout
	}
	?>
	</div> <!-- #row -->
</div><!-- #container -->

<?php get_footer(); 

