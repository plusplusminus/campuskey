

<?php
// Exclude categories on the homepage.

$campus =  $post->post_name;
$query_args = array(
	'post_type' => 'post',
	'tag' => $campus,
	'posts_per_page' => 3
);

query_posts( $query_args );

?>

<section class="section_news">  
	<div class="container">
		<div class="header-title-area">
	  		<div class="header-title-area-main">
				<div class="header-title"> <span>News &amp; Updates</span> </div>
	  		</div>
		</div>
		<?php if ( have_posts() ) : ?>
			<div class="row">
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
		<?php wp_reset_query(); ?>
	</div>	
</section> <?php // end #wrapper ?>