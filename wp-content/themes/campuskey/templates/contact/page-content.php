<div class="page_container">
	<aside class="section_sidebar">
		<?php $groups = get_post_meta($post->ID,'_ck_contact_group',true); ?>

		<?php if (!empty($groups)) : $contact; ?>
			<div class="list-group list-group-collapse" id="accordion">
				<?php foreach ($groups as $key => $group) : $count++; ?>

					<a href="#collapse<?php echo $count; ?>" class="list-group-item" data-toggle="collapse" data-parent="#accordion"><?php echo $group['title']; ?></a>
					<div id="collapse<?php echo $count; ?>" class="collapse collapse-content-holder">
			            <div class="collapse-content">
			            	<ul class="fa-ul">
			            	  <li class="name"><i class="fa-li fa fa-user"></i> <?php echo $group['name'];?></li>
			            	  <li class="telephone"><i class="fa-li fa fa-phone"></i> <a href="tel:<?php echo $group['telephone'];?>"><?php echo $group['telephone'];?></a></li>
			            	  <li class="email"><i class="fa-li fa fa-envelope-o"></i> <a target="_blank" href="mailto:<?php echo $group['email'];?>"><?php echo $group['email'];?></a></li>
			            	  <li class="description"><i class="fa-li fa fa-office"></i> <?php echo wpautop($group['description']);?></li>
			            	</ul>
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