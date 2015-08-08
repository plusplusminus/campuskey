<div class="page_container">

	<main class="section_article">
		<article id="post-<?php the_ID(); ?>" <?php post_class('article_post clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting"> 
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="post_content">
						<div class="post_entry clearfix">
							<?php $groups = get_post_meta($post->ID,'_ck_documents_group',true); ?>
							<?php if (!empty($groups)) : $documents; ?>
								<div class="documents">
									<?php foreach ($groups as $key => $group) : $count++; ?>
										<?php $name = $group['name'];?>
										<?php $file = $group['file'];?>
										<?php $description = $group['description'];?>
											<?php if (!empty($name)) { ?>
												<div class="col-md-4 doc">
													<div class="document_holder">
														<div class="row">
															<div class="col-md-12">
																<div class="document--header">
																	<i class="fa fa-file-pdf-o fa-3x pull-right"></i>
																	<h3 class="document--title"><?php echo $name;?></h3>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<span class="document--description">
																	<?php echo wpautop($description);?>
																</span>	
																<a href="<?php echo $file;?>" target="_blank" class="document-<?php echo $count; ?> document--link">View Now</a>
															</div>
														</div>
													</div>
												</div>
												<?php if ($count % 3 == 0) { ?>
													<div class="clearfix"></div>
												<?php } ;?>
											<?php } ;?>
											
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