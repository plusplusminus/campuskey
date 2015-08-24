<?php

	/* Post Meta Information */

global $post;

?>

<aside class="content_meta">
	<ul class="meta_list">
		<li class="meta_list--item css-date">
			<time class="updated" datetime="<?php get_the_time('Y-m-j') ?>">	
				<?php echo get_the_time(get_option('date_format')) ?>
			</time>
		</li>
		<li class="meta_list--item css-category">
			<?php 
			$category = get_the_category(); 
			if($category[0]){
			echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
			}
			?>
		</li>
	</ul>
</aside>
