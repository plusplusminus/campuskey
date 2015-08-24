<?php
// Exclude categories on the homepage.

$query_args = array(
	'post_type' => 'products', 
	'posts_per_page' => 12
);

query_posts( $query_args );

?>

<section class="section_grid">  
	<div class="wrap container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php get_template_part('templates/shop/product','menu'); ?>
				<?php if ( have_posts() ) : $count = 0; ?>
					<div class="row">
						<?php while ( have_posts() ) : the_post(); $count++;?>
						  	<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						    	<?php get_template_part('templates/shop/product','grid'); ?>
							</article>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
			</div>

		</div>
	</div>	
</section> <?php // end #wrapper ?>