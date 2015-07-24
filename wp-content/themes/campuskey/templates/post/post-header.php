<?php global $post; ?>
<header class="header_post">  
	<?php get_template_part('templates/meta'); ?>
	<h1 class="post_heading--title"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
</header>

<aside class="post_content">
	<div class="post_content--excerpt">
		<?php the_excerpt(); ?>
	</div>

	<figure class="post_image">
		
		<div class="post_readmore">
			<p>Continue Reading</p>
		</div> 
		<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
		<figcaption class="post_image--caption"></figcaption>

	</figure>

</aside>
