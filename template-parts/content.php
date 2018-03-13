<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dallas Lite
 */
 ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php	if (is_singular()):	the_title('<h1 class="entry-title">', '</h1>');
				else:	the_title('<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>');
				endif;
		      if ('post' === get_post_type()): ?>
			       <div class="entry-meta">
				           <?php	dallas_lite_posted_on(); ?>
			       </div><!-- .entry-meta -->
		   <?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php if ('' !== get_the_post_thumbnail() && ! is_single()){?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<img src="<?php the_post_thumbnail_url(); ?>"/>
				</a>
			</div>
		<?php }
		if (is_single()) { ?>
			<div class="single-entry-content">
				<?php the_content(); ?>
			</div>
		<?php }
		else {
				if ( get_theme_mod( 'enableExcerpt', true ) )
					{
					if ( get_theme_mod( 'excerptwordLimit', 330 ) ) 
						{
						$textlimit = esc_attr( get_theme_mod( 'excerptwordLimit', 330 ) );
						echo '<p class="short-description">';
						$wordsreturned="";
						echo wp_kses_post(dallas_lite_excerpt_max_charlength($wordsreturned));
						echo '</p>';
						}
					  else
						{
						echo the_content();
						}

					if ( esc_attr( get_theme_mod( 'enableBlogReadmore', true ) ) )
						{
						if ( esc_attr( get_theme_mod( 'continueReading', 'Read More' ) ) )
							{
							$continue = esc_attr(get_theme_mod('continueReading', 'Read More' ) );

							}
						}
					}
				  else
					{
					echo the_content();
					}
			} ?>
			<?php wp_link_pages(array( 'before' => '<div class="page-links">' . esc_html__('Pages:', 'dallas-lite') ,'after' => '</div>',)); ?>
	</div><!-- .entry-content -->
	<div class="post-meta">
		<?php if(!is_single()){
				if ( esc_attr( get_theme_mod( 'enableBlogReadmore', true ) ) )
				{
				if ( esc_attr( get_theme_mod( 'continueReading', 'Read More' ) ) )
					{
					$continue = esc_html(get_theme_mod( 'continueReading', 'Read More' ) );

					}
				echo wp_kses_post('<div class="meta-content-limit"><a class="btn btn-primary" href="' . get_permalink() . '">' . $continue . '</a></div>');
				}else{

				}
			}
		else{
		}
      if(is_single()){
			echo wp_kses_post(dallas_lite_social_share_icons());
    }?>
	</div>
</article>
<!-- #post-<?php
the_ID(); ?> -->
