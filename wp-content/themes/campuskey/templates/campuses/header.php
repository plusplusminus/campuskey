<section class="campuses_header">  
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="header_content">
				<figure class="header_content--image">
					<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
					<figcaption class="header_heading">
						<h1 class="header_heading--title"><?php the_title(); ?></h1>
						<?php $subtitle = get_post_meta($post->ID,'_ck_campus_header',true); ?>
						<?php echo wpautop($subtitle); ?>
					</figcaption>
				</figure>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_query(); ?>	
</section> <?php // end #wrapper ?>