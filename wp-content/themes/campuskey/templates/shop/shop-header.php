<section class="section_shop">  
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="shop_content">
				<figure class="shop_content--image">
					<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
					<div class="shop_content--info">
						<div class="content_heading">
							<h1 class="content_heading--title"><?php the_title(); ?></h1>
						</div>
						<?php the_content(); ?>
					</div>
					<div class="shop_content--action">
						<small>Start Shopping</small>
					</div>
				</figure>
				<div class="divider"></div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_query(); ?>	
</section> <?php // end #wrapper ?>