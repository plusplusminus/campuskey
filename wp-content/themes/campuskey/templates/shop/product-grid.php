<?php
	global $post;
	$currency = get_post_meta($post->ID,'product_currency',true);
	$price = get_post_meta($post->ID,'product_price',true);
	$artist = get_post_meta($post->ID,'product_artist',true);

	$format = '<small class="article_content--price">%s%d</small>';
	
?>

<div class="product_article">
	<figure class="article_image">
		<?php the_post_thumbnail('grid',array('class'=>'img-responsive')); ?>
	</figure>


	<div class="article_content">
		<h3 class="article_content--title"><?php the_title(); echo sprintf($format, $currency, $price); ?></h3>
		<small class="article_content--price"><?php echo sprintf($artist); ?></small>
		<div class="article_content--excerpt">
			<?php the_excerpt(); ?>
		</div>

		<aside class="content_meta">
			<ul class="meta_list">
				<li class="meta_list--item css-date">
					<button class="btn btn-primary btn-sm">Enquire</button>
				</li>
				<li class="meta_list--item css-category">
					<button class="btn btn-link btn-sm">+ Add to List</button>
				</li>
			</ul>
		</aside>

	</div>
</div>