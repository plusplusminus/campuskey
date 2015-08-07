<?php $image_id = get_post_meta($post->ID,'_ck_building_floorplan_id',true); ?>

<?php if ($image_id) : ?>

	<div class="page-floor">
		<div class="inner">
			<aside class="room-floorplan"> 
				<div class="container">

					<div class="header-title-area">
				  		<div class="header-title-area-main">
				  	
							<div class="header-title css-red"> <span>Floor Plan</span> </div>
					
						</div>
				  		<div class="header-content-area">
				  			
					  			
					  			<?php $image_attributes_large = wp_get_attachment_image_src( $image_id,'full' ); ?>

					  			<img src="<?php echo $image_attributes_large[0];?>" class="img-responsive">
					  		
				  		</div>

					</div>
				</div>
			</aside>
		</div>
		<div class="border-floor"></div>
	</div>

<?php endif; ?>