<?php 

global $post;
global $tpb_options;
?>
<main class="section_features"> 
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<aside class="campus_gallery">
					<?php $gallery = get_post_meta($post->ID,'_ck_campus_gallery',true); ?>
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
					
					<article class="campus_content">
						
						<div class="row">
							<div class="col-md-12">
								<?php the_content(); ?>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<?php $contact = get_post_meta($post->ID,'_ck_campus_contact',true); ?>
								<?php $address = get_post_meta($post->ID,'_ck_campus_address',true); ?>
								<?php $telephone = get_post_meta($post->ID,'_ck_campus_telephone',true); ?>
								<?php $email = get_post_meta($post->ID,'_ck_campus_email',true); ?>
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

				<?php endwhile; ?>
				<?php wp_reset_postdata(); endif; ?>

			</div>
		</div>
	</div>
</main>