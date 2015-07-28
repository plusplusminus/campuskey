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
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
		
		</article><?php // end #wrapper ?>
	</main>
</div>