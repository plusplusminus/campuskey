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
							<div class="header-title css-red"> <span>Floor Plan</span> </div>
				  		</div>
				  		<div class="header-content-area">
				  			<?php echo $image; ?>
						</div>
					</div>
				</div>
			</aside>
		</div>
		<div class="border-floor"></div>
	</div>





<?php get_footer(); ?>
