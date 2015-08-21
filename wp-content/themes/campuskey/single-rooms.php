<?php get_header(); ?>
      
	<div class="page-room">
		<div class="inner">
			<?php get_template_part('templates/rooms/header'); ?>

			<?php get_template_part('templates/rooms/gallery-content'); ?>
		</div>
		<div class="border-room"></div>

	</div>


	<?php 

	global $post;

	$image = wp_get_attachment_image( get_post_meta( $post->ID, '_ck_room_floorplan_id', 1 ), 'large','',array('class'=>'img-responsive') );

	?>
	<div class="page-floor">
		<div class="inner">
			<aside class="room-floorplan"> 
				<div class="container">

					<div class="header-title-area">
				  		<div class="header-title-area-main">
				  		<?php if (!isset($_GET['campus'])) : ?>
							<div class="header-title css-red"> <span>Floor Plans</span> </div>
						<?php else : ?>
							
							<div class="header-title css-orange"> <span><?php echo get_the_title($_GET['campus_id']);?> Floor Plans</span> </div>
						<?php endif; ?>
				  		</div>
				  		<div class="header-content-area">
				  			<ul class="bxslider">
					  			<?php $floorplans = get_post_meta($post->ID,'_ck_floor_plan_group',true); ?>
					  			<?php foreach ($floorplans as $key => $plan) : $key = false; ?>

					  				<?php if (isset($_GET['campus'])) : ?>

					  					<?php $key = in_array($_GET['campus'], $plan['campus_select']); ?>

					  					<?php if($key) : ?>

					  						<?php $image_attributes_large = wp_get_attachment_image_src( $plan['name_id'],'full' ); ?>
					  						<a class="fancybox" data-fancybox-title="<?php echo wpautop($plan['caption']); ?>" rel="group1" href="<?php echo $image_attributes_large[0];?>">
												<li class="slide" style="background-image:url('<?php echo $image_attributes_large[0];?>');">
													<div class="img_caption"><?php echo wpautop($plan['caption']); ?></div>
												</li>
											</a>
					  						
					  					<?php endif; ?>

					  				<?php else : ?>

					  					<?php $image_attributes_large = wp_get_attachment_image_src( $plan['name_id'],'full' ); ?>
					  						
												<li class="slide" style="background-image:url('<?php echo $image_attributes_large[0];?>');">
													<a class="fancybox" data-fancybox-title="<?php echo wpautop($plan['caption']); ?>" rel="group1" href="<?php echo $image_attributes_large[0];?>">
														<div class="img_caption"><?php echo wpautop($plan['caption']); ?></div>
													</a>
												</li>
											
					  						

					  				<?php endif; ?>
					  	
					  			<?php endforeach; ?>
					  		</ul>
				  		</div>
	
					</div>
				</div>
			</aside>
		</div>
		<div class="border-floor"></div>
	</div>





<?php get_footer(); ?>
