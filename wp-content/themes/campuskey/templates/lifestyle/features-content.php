<?php 

global $post;

$image = wp_get_attachment_image( get_post_meta( $post->ID, '_ck_room_floorplan_id', 1 ), 'large','',array('class'=>'img-responsive') );

// Find connected pages
$connected = new WP_Query( array(
	'connected_type' => 'pages_to_features',
	'connected_items' => get_queried_object(),
	'nopaging' => true,
) );

?>

<main class="section_lifestyle"> 
	<div class="container">
		<?php
		if ( have_posts() ) : $count = 0;
		?>

			<?php while ( have_posts() ) : the_post(); $count++; ?>
				<article class="lifestyle_content">
					<div class="row">
						<div class="col-md-offset-3 col-md-6 text-center">
							<?php the_content(); ?>
						</div>
					</div>
				</article>
			<?php endwhile; ?>


		<?php wp_reset_postdata(); endif; ?>

		<div class="clearfix"></div>

		<aside class="lifestyle_gallery">
			<?php $gallery = get_post_meta($post->ID,'_ck_home_gallery',true); ?>
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

		<?php

		// Find connected pages
		$connected = new WP_Query( array(
		  'connected_type' => 'pages_to_features',
		  'connected_items' => get_queried_object(),
		  'nopaging' => true,
		) );

		// Display connected pages
	    if ( $connected->have_posts() ) : $count = 0;
		?>
		<aside class="section_feature"> 

			<ul class="feature_list">
					<?php while ( $connected->have_posts() ) : $connected->the_post(); $count++;?>
						<?php if ($count < 9) : ?>
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
							 <?php if ($count == 9) : ?>
							 	<div class="clearfix"></div><br>
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

