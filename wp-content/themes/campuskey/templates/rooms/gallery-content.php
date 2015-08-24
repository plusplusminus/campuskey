<?php 

global $post;

$image = wp_get_attachment_image( get_post_meta( $post->ID, '_ck_room_floorplan_id', 1 ), 'large','',array('class'=>'img-responsive') );
?>
<main class="section_features"> 
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<aside class="room_gallery">
					<?php $gallery = get_post_meta($post->ID,'_ck_room_gallery',true); ?>
					<?php if (!empty($gallery)) : ?>
						<ul class="bxslider">
							<?php foreach ($gallery as $key => $image) : ?>
								<?php $image_attributes_large = wp_get_attachment_image_src( $key,'full' ); ?>
								
								<li class="slide" style="background-image:url('<?php echo $image_attributes_large[0];?>');">
									<a class="fancybox" rel="group" href="<?php echo $image_attributes_large[0];?>"></a>
								</li>
								
							<?php endforeach; ?>
						</ul>
					<?php else : ?>
						<figure class="post-header_image">
							<a class="fancybox" rel="group" href="<?php echo $image_attributes_large[0];?>">
								<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
							</a>
						</figure>
					<?php endif; ?>
				</aside>
			</div>
		</div>

		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php
				if ( have_posts() ) : $count = 0;
				?>

				<?php while ( have_posts() ) : the_post(); $count++; ?>
			
					<article class="room_content">
						<div class="row">
							<div class="col-md-12">
								<?php the_content(); ?>
							</div>
						</div>
					</article>

				<?php endwhile; ?>
			</div>
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
		<div class="row">
			<div class="col-md-12">
				<aside class="section_feature"> 

					<ul class="feature_list">
						<?php while ( $connected->have_posts() ) : $connected->the_post(); $count++;?>
							<?php if ($count < 6) : ?>
								<?php $iconname = get_post_meta($post->ID,'_ck_feature_icon',true); ?>
			
							    <li class="feature_list--item">
									<div class="tab-ico"> 
										<i class="icon-<?php echo $iconname; ?>"></i> 
									</div>
									<div class="tab-title">
										<div class="display-table">
											<div class="display-table-cell"><?php the_title(); ?></div>
										</div>
									</div>
								</li>
							<?php else: ?>
								 <?php if ($count == 6) : ?>
								 	<div class="clearfix"></div><br>
								 	<li class="feature_list--list"><strong>Also included:</strong> </li>
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

	</div>
	
</main>

