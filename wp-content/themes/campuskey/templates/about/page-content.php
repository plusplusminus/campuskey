<div class="page_container">
	<aside class="section_sidebar">
		<?php dynamic_sidebar('about-1'); ?>
	</aside>
	<main class="section_article">
		<article id="post-<?php the_ID(); ?>" <?php post_class('article_post clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting"> 
			<?php $gallery = get_post_meta($post->ID,'_ck_home_gallery',true); ?>
			<?php if (!empty($gallery)) : ?>
				<aside class="about_gallery">
					
						<ul class="bxslider">
							<?php foreach ($gallery as $key => $image) : ?>
								<?php $image_attributes_large = wp_get_attachment_image_src( $key,'full' ); ?>
								<li class="slide" style="background-image:url('<?php echo $image_attributes_large[0];?>');"></li>
							<?php endforeach; ?>
						</ul>

				</aside>
			<?php endif; ?>
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<div class="post_content">
						<div class="post_entry clearfix">
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
		
		</article><?php // end #wrapper ?>
	</main>
</div>