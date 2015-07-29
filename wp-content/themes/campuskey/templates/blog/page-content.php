<div class="page_container">
	<aside class="section_sidebar">
		<?php get_sidebar(); ?>
	</aside>
	<main class="section_article">
		<?php
		// Exclude categories on the homepage.

		$query_args = array(
			'post_type' => 'post', 
			'posts_per_page' => 10
		);

		query_posts( $query_args );

		?>

		<section class="section_archive">  
			
			<?php if ( have_posts() ) : ?>
				<div id="blog-container">
					<?php while ( have_posts() ) : the_post(); ?>
					  	<article id="post-<?php the_ID(); ?>" <?php post_class('article_blog'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					    	
					    	<figure class="blog_image">
					    		<?php the_post_thumbnail('blog-custom',array('class'=>'img-responsive')); ?>
					    		<figcaption class="blog_content">

					    					<span class="blog_category"><?php the_category(); ?></span>
				    						<h3 class="content_inner--title"><span><?php the_title(); ?></span></h3>

				    						<?php the_excerpt();?>

				    						<a class="blog_article--link" href="<?php the_permalink();?>">Find Out More</a>


								</figcaption>
								
							</figure>
						</article>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
		</section> <?php // end #wrapper ?>
	</main>
</div>