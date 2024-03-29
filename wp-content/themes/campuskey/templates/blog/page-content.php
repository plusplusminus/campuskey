<div class="page_container">
	<aside class="section_sidebar">
		<?php get_sidebar(); ?>
	</aside>
	<main class="section_article">
		<?php
		// Exclude categories on the homepage.

		$paged = 1;
		if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
		if ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
		$paged = intval( $paged );

		$query_args = array(
			'post_type' => 'post',
			'paged' => $paged,
		);

		query_posts( $query_args );

		?>

		<section class="section_archive">  
			
			<?php if ( have_posts() ) : ?>
				<div id="blog-container" class="clearfix">
					<?php while ( have_posts() ) : the_post(); ?>
					  	<article id="post-<?php the_ID(); ?>" <?php post_class('article_blog'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					    	
					    	<figure class="blog_image">
					    		<a href="<?php the_permalink();?>">
					    			<?php the_post_thumbnail('blog-custom',array('class'=>'img-responsive')); ?>
					    		</a>
					    		<figcaption class="blog_content">

					    					<span class="blog_category"><?php the_category(); ?></span> • <span class="blog_date"><?php the_time('F j, Y'); ?></span>
				    						<h3 class="content_inner--title">
				    							<a href="<?php the_permalink();?>"><span><?php the_title(); ?></span></a>
				    						</h3>

				    						<?php the_excerpt();?>

				    						<a class="blog_article--link" href="<?php the_permalink();?>">Read more</a>


								</figcaption>
								
							</figure>
						</article>
					<?php endwhile; ?>
					
				</div>
			<?php endif; ?>
			<nav class="wp-prev-nex">
				<ul class="pager clearfix">
					<li class="pull-left"><?php next_posts_link( __( '&laquo; Previous', 'bonestheme' )) ?></li>
					<li class="pull-right"><?php previous_posts_link( __( 'Next &raquo;', 'bonestheme' )) ?></li>
				</ul>
			</nav>
			<?php wp_reset_query(); ?>
		</section> <?php // end #wrapper ?>
	</main>
</div>