<div class="page_container">
	<aside class="section_sidebar">
		<?php $groups = get_post_meta($post->ID,'_ck_contact_group',true); ?>
		<?php if (!empty($groups)) : $contact; ?>
			<div class="list-group list-group-collapse" id="accordion">
				<?php foreach ($groups as $key => $group) : $count++; ?>
					<?php $name = $group['name'];?>
					<?php $telephone = $group['telephone'];?>
					<?php $email = $group['email'];?>
					<?php $description = $group['description'];?>

					<a href="#collapse<?php echo $count; ?>" class="list-group-item" data-toggle="collapse" data-parent="#accordion"><span><?php echo $group['title']; ?></span></a>
					<div id="collapse<?php echo $count; ?>" class="collapse collapse-content-holder">
			            <div class="collapse-content">
			            	<ul class="fa-ul">
			            		<?php if (!empty($name)) { ?>
			            	  		<li class="name"><i class="fa-li fa fa-user"></i> <?php echo $name;?></li>
			            	  	<?php };?>
			            	  	<?php if (!empty($telephone)) { ?>
			            	  		<li class="telephone"><i class="fa-li fa fa-phone"></i> <a href="tel:<?php echo $telephone;?>"><?php echo $telephone;?></a></li>
			            	  	<?php };?>
			            	  	<?php if (!empty($email)) { ?>
			            	  		<li class="email"><i class="fa-li fa fa-envelope-o"></i> <a target="_blank" href="mailto:<?php echo $email;?>"><?php echo $email;?></a></li>
								<?php };?>
			            	  	<?php if (!empty($description)) { ?>
			            	  		<li class="description"><i class="fa-li fa fa-map-marker"></i> <?php echo wpautop($description);?></li>
			            	  	<?php };?>
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