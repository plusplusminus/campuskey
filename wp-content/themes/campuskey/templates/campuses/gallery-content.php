<?php 

global $post;

?>

<main class="section_features"> 
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<aside class="campus_gallery">
					<?php $gallery = get_post_meta($post->ID,'_ck_campus_gallery',true); ?>
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


				<?php
				if ( have_posts() ) : $count = 0;
				?>

					<?php while ( have_posts() ) : the_post(); $count++; ?>
						<article class="campus_content">
							<?php the_content(); ?>
						</article>
					<?php endwhile; ?>


				<?php wp_reset_postdata(); endif; ?>
			</div>

		</div>
	</div>
</main>

