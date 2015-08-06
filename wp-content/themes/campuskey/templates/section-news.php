<?php global $post; ?>

<?php $tag = get_post_meta($post->ID,'_ck_campus_tag',true); ?>

<?php if (!empty($tag)) {

	$args = array(
	'posts_per_page' => 3,
	'post_type' => 'post',
	'tax_query' => array(
	    array(
	    'taxonomy' => 'post_tag',
	    'field' => 'id',
	    'terms' => $tag[0]
	     )
	  )
	);
	
} else {

	$args = array(
		'post_type' => 'post', 
		'posts_per_page' => 3
	);
}

$query = new WP_Query( $args );

?>

<section class="section_news">  
	<div class="container">
		<div class="header-title-area">
	  		<div class="header-title-area-main">
				<div class="header-title"> <span>News & Updates</span> </div>
	  		</div>
		</div>
		<?php if ( $query->have_posts() ) : ?>
			<div class="row">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
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