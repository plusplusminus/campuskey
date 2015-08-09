<?php 

global $post;
global $tpb_options;

$image = wp_get_attachment_image( get_post_meta( $post->ID, '_ck_building_floorplan_id', 1 ), 'large','',array('class'=>'img-responsive') );
?>
<main class="section_features"> 
	<div class="container">
		<aside class="building_gallery">
			<?php $gallery = get_post_meta($post->ID,'_ck_building_gallery',true); ?>
			<?php if (!empty($gallery)) : ?>
				<ul class="bxslider">
					<?php foreach ($gallery as $key => $image) : ?>
						<?php $image_attributes_large = wp_get_attachment_image_src( $key,'full' ); ?>
						<li class="slide" style="background-image:url('<?php echo $image_attributes_large[0];?>');"></li>
					<?php endforeach; ?>
				</ul>
			<?php else : ?>
				<figure class="post-header_image">
					<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
				</figure>
			<?php endif; ?>
		</aside>

			<?php
			if ( have_posts() ) : $count = 0;
			?>

			<?php while ( have_posts() ) : the_post(); $count++; ?>
				<div class="row">
					<div class="col-md-offset-1 col-md-8">
						<article class="building_content">
							<?php the_content(); ?>

								<div class="row">
									<div class="col-md-4">
										<?php $contact = get_post_meta($post->ID,'_ck_building_contact',true); ?>
										<?php $address = get_post_meta($post->ID,'_ck_building_address',true); ?>
										<?php $telephone = get_post_meta($post->ID,'_ck_building_telephone',true); ?>
										<?php $email = get_post_meta($post->ID,'_ck_building_email',true); ?>
										<div class="campus_contact">
											<ul class="contact_details fa-ul">
												<?php if ($contact) echo '<li> <i class="fa-li fa fa-user"></i><span>'.$contact.'</span></li>'; ?>
												<?php if ($email) echo '<li> <i class="fa-li fa fa-envelope-o"></i><span>'.$email.'<span></li>'; ?>
												<?php if ($telephone) echo '<li> <i class="fa-li fa fa-tellephone"></i><span>'.$telephone.'<span></li>'; ?>
												<?php if ($address) echo '<li> <i class="fa-li fa fa-map-marker"></i><span>'.$address.'<span></li>'; ?>
											</ul>
										</div>
									</div>
									<div class="col-md-6">
										<div class="pull-left">
											<div class="book-now campus_contact--book text-center"> 
								  				<?php $booknow_image = $tpb_options['booknow_image']['url']; ?>
								  				<?php $booknow_link = $tpb_options['campuskey_booknow']; ?>
								  				<a href="<?php echo $booknow_link;?>" title="Book now!">
								  					<img class="img-responsive" src="<?php echo $booknow_image;?>" alt="Book Now!"/>
								  				</a> 
								  			</div>
								  		</div>
							  		</div>
								</div>
						</article>
					</div>
				</div>

			<?php endwhile; ?>

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
</main>

