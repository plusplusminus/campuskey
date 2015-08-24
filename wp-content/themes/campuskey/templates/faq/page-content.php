<div class="page_container">
	<aside class="section_sidebar">
		<?php get_sidebar(); ?>
	</aside>
	<main class="section_article">
		<article id="post-<?php the_ID(); ?>" <?php post_class('article_post clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting"> 

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<div class="post_content">
						<div class="post_entry clearfix">
							<?php $groups = get_post_meta($post->ID,'_ck_faq_group',true); ?>
							<?php if (!empty($groups)) : $contact; ?>
								<div class="faq-list-group list-group list-group-collapse" id="accordion">
									<?php foreach ($groups as $key => $group) : $count++; ?>
										<?php $q = $group['q'];?>
										<?php $a = $group['a'];?>

										<a href="#collapse<?php echo $count; ?>" class="list-group-item" data-toggle="collapse" data-parent="#accordion"><?php echo $group['q']; ?></a>
										<div id="collapse<?php echo $count; ?>" class="collapse collapse-content-holder">
								            <div class="collapse-content">
								            		<?php if (!empty($a)) { ?>
								            	  		<?php echo $a;?>
								            	  	<?php };?>
								            </div>
								        </div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
		
		</article><?php // end #wrapper ?>
	</main>
</div>