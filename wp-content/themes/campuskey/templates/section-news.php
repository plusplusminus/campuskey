

<?php
// Exclude categories on the homepage.

$query_args = array(
	'post_type' => 'post', 
	'posts_per_page' => 3
);

query_posts( $query_args );

?>

<section class="section_news">  
	<div class="container">
		<div class="header-title-area">
	  		<div class="header-title-area-main">
				<div class="header-title"> <span>News & Updates</span> </div>
	  		</div>
		</div>
		<?php if ( have_posts() ) : ?>
			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
				  	<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				    	
				    	<figure class="blog_image">
				    		<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
				    		<figcaption class="blog_content">

			    				<h3 class="content_inner--title"><span><?php the_title(); ?></span></h3>

			    				<?php the_excerpt(); ?>

							</figcaption>
							<a class="blog_article--link" href="<?php the_permalink();?>">&nbsp;</a>
						</figure>
					</article>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</div>	
</section> <?php // end #wrapper ?>