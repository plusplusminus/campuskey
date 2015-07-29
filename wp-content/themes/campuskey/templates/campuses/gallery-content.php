<?php 

global $post;
global $tpb_options;

?>

<main class="section_features"> 
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<aside class="campus_gallery">
					<?php $gallery = get_post_meta($post->ID,'_ck_campus_gallery',true); ?>
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
							<div class="col-md-offset-2 col-md-5">
								<article class="campus_content">
									<?php the_content(); ?>
								</article>
							</div>
							<div class="col-md-4">
								<div class="book-now text-center"> 
						  			<?php $booknow_image = $tpb_options['booknow_image']['url']; ?>
						  			<?php $booknow_link = $tpb_options['campuskey_booknow']; ?>
						  			<a href="<?php echo $booknow_link;?>" title="Book now!">
						  				<img class="img-responsive" src="<?php echo $booknow_image;?>" alt="Book Now!"/>
						  			</a> 
						  		</div>
						  	</div>
						</div>
					<?php endwhile; ?>


				<?php wp_reset_postdata(); endif; ?>
			</div>

		</div>
	</div>
</main>

