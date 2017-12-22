	<?php	$tags_array = get_the_tags($post->ID);
		if ($tags_array)
			{
			foreach($tags_array as $tags)
				{ 
					//echo get_tag_link($tag_id);
					$tagString[] = '<a href="'.get_tag_link($tags->term_id).'"><span class="post_tag_name">' . $tags->name . '</span></a>';
				}

			echo '<div class="tags_list">';
			echo implode(" ", $tagString);
			echo '</div>';
			} ?>