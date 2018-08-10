<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dallas Lite
 */

$tags_array = get_the_tags( $post->ID );


if ( $tags_array ) {
	foreach ( $tags_array as $tags ) {
		$tagstring[] = '<a href="' . wpcom_vip_get_term_link() . '"><span class="post_tag_name">' . $tags->name . '</span></a>';
	}

	echo '<div class="tags_list">';
		echo wp_kses_post( implode( ' ', $tagstring ) );
	echo '</div>';
}
