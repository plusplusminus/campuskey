<?php 

global $post;

$image = wp_get_attachment_image( get_post_meta( $post->ID, '_ck_room_floorplan_id', 1 ), 'large','',array('class'=>'img-responsive') );

?>
<main class="section_features"> 
	<div class="container">
		<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
		<div class="row">

			<?php if (!empty($image)) : ?>
				<aside class="room_gallery col-md-12">

					<?php $gallery = get_post_meta($post->ID,'_ck_room_gallery',true); ?>
						<?php if(!empty($gallery)) :?>
								<div class="flexslider">
									<ul class="slides">
										<?php foreach ($gallery as $key => $image) {

											$image_attributes_large = wp_get_attachment_image_src( $key,'large' );
											$image_attributes_full = wp_get_attachment_image_src( $key,'full' );
											$attachment = get_post($key); 
											?>
											<li class="slide">
												<figure class="slide_image">
													<img alt="<? _e($attachment->post_title); ?>" src="<?php echo $image_attributes_large[0];?>" class="img-responsive"/>
												</figure>
											</li>

										<?php } ?>
									</ul>
								</div>
							</aside>
						<?php else : ?>
							<figure class="post-header_image">
								<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
							</figure>
						<?php endif; ?>
				</aside>
			<?php endif; ?>

			<?php
			if ( have_posts() ) : $count = 0;
			?>
			<div class="col-md-12">
				<?php while ( have_posts() ) : the_post(); $count++; ?>
					<article class="room_content">
						<?php the_content(); ?>
					</article>
				<?php endwhile; ?>
			</div>

			<?php wp_reset_postdata(); endif; ?>

			<div class="clearfix"></div>

			<?php

			// Find connected pages
			$connected = new WP_Query( array(
			  'connected_type' => 'rooms_to_features',
			  'connected_items' => get_queried_object(),
			  'nopaging' => true,
			) );

			// Display connected pages
			if ( $connected->have_posts() ) : $count=0;
			?>
			<aside class="section_feature"> 

				<ul class="feature_list">
					<?php while ( $connected->have_posts() ) : $connected->the_post(); $count++;?>
						<?php if ($count < 6) : ?>
						    <li class="feature_list--item">
								<div class="tab-ico"> 
									<i class="icon-key"></i> 
								</div>
								<div class="tab-title">
									<div class="display-table">
										<div class="display-table-cell"><?php the_title(); ?></div>
									</div>
								</div>
							</li>
						<?php else: ?>
							 <?php if ($count == 6) : ?>
							 	<h2 class="feature_list--heading">Also includes</h2>
							 <?php endif; ?>
							<li class="feature_list--list"><?php the_title(); ?></li>
						<?php endif; ?>
					<?php endwhile; ?>
				</ul>

			</aside>

			<?php 
			// Prevent weirdness
			wp_reset_postdata();

			endif;

			?>

		</div>
	</div>
</main>

