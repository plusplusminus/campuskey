<section class="lifestyle_header">  

	<div class="header_content">
		<figure class="header_content--image">
			<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
			<figcaption class="header_heading">
				<h1 class="header_heading--title"><?php the_title(); ?></h1>
				<?php $subtitle = get_post_meta($post->ID,'_ck_page_header',true); ?>
				<?php echo wpautop($subtitle); ?>
			</figcaption>
		</figure>
	</div>

</section> <?php // end #wrapper ?>