<main class="section_article">
	<div class="row">
		<div class="col-md-8">
			<article id="post-<?php the_ID(); ?>" <?php post_class('article_post clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting"> 
			
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<aside class="article_meta media">
							<div class="article_meta--image media-left">
								<?php echo get_avatar( get_the_author_meta('email'), '30', $default='blank' ); ?>
							</div>
							<div class="article_meta--content">
								<ul class="meta_author">
									<li class="author_item meta_author--author"><span class"">by</span> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a>
									</li>
									<li class="author_item meta_author--twitter">@twitter</li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</aside>
						<?php get_template_part('templates/post/post','social'); ?>
						<div class="post_content">
							<div class="post_entry clearfix">
								<?php the_content(); ?>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
			
			</article><?php // end #wrapper ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>