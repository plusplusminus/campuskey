<?php get_header(); ?>

	<?php global $post; ?>

	<div class="container page-container">

		<div class="inner">
			<section class="header-page">

					<div class="header-title-area">
				  		<div class="header-title-area-main">
							<h1 class="header-title css-yellow"><?php _e("Search Results for","aevitas"); ?>:</span> <?php echo esc_attr(get_search_query()); ?></h1>
				  		</div>
					</div>

			</section>

			<div class="page_container">
				<aside class="section_sidebar">
					<?php get_sidebar(); ?>
				</aside>
				<main class="section_article">

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
		</div>
	</div>


<?php get_footer(); ?>
