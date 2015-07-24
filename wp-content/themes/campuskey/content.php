<div class="blog_article">
	<figure class="article_image">
		<?php the_post_thumbnail('grid',array('class'=>'img-responsive')); ?>
	</figure>

	<div class="article_content">
		<h3 class="article_content--title"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<div class="article_content--excerpt">
			<?php the_excerpt(); ?>
		</div>
		<?php get_template_part('templates/meta'); ?>
	</div>
</div>