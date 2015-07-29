<section class="slider-area">
    <div class="slider-container">

    	<?php global $post; ?>

		<?php $media = get_post_meta($post->ID,'_ck_home_gallery',true); ?>
		<?php if (!empty($media)) : ?>
			<ul class="bxslider">
				<?php foreach ($media as $key => $image) : ?>
					<?php $image_attributes_large = wp_get_attachment_image_src( $key,'full' ); ?>
					<li class="slide" style="background-image:url('<?php echo $image_attributes_large[0];?>');"></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
      
      	<div class="slider-shadow"></div>

      	<div class="main">
        	<div class="slider-text">
	         	<div class="slider-text-main">
		     	 	<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="row">
								<div class="slider-title">
				              		<h1><span>Premier provider of secure student living</span></h1>
				            	</div>
				            </div>

				            <div class="row">
				            	<div class="slider-excerpt">
				            		<?php $excerpt = get_post_meta($post->ID,'_ck_page_header',true); ?>
									<?php echo wpautop($excerpt); ?>
				            	</div>
				            </div>

				            <div class="row">
				            	<div class="slider-subtitle">Find out more!</div>
				            </div>
							
						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
				</div>
			</div>
		</div>
    </div>
</section>