<div class="page_container">
	<aside class="section_sidebar">
		<?php $groups = get_post_meta($post->ID,'_ck_contact_group',true); ?>

		<?php if (!empty($groups)) : $contact; ?>
			<div class="list-group list-group-collapse" id="accordion">
				<?php foreach ($groups as $key => $group) : $count++; ?>

					<a href="#collapse<?php echo $count; ?>" class="list-group-item" data-toggle="collapse" data-parent="#accordion"><?php echo $group['title']; ?></a>
					<div id="collapse<?php echo $count; ?>" class="collapse collapse-content-holder">
			            <div class="collapse-content">
			            	<div class="name"><span><?php echo $group['name'];?></span></div>
			            	<div class="telephone"><span><?php echo $group['telephone'];?></span></div>
			            	<div class="email"><span><?php echo $group['email'];?></span></div>
			            	<div class="description"><?php echo wpautop($group['description']);?></div>
			            </div>
			        </div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</aside>
	<main class="section_article">
		<article id="post-<?php the_ID(); ?>" <?php post_class('article_post clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting"> 
		
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