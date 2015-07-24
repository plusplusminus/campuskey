

<?php
// Exclude categories on the homepage.

$query_args = array(
	'post_type' => 'post', 
	'posts_per_page' => 6
);

query_posts( $query_args );

?>

<section class="section_grid">  
	<div class="container">

		<?php if ( have_posts() ) : $count = 0; ?>
			<ul class="row">
				<?php while ( have_posts() ) : the_post(); $count++;?>
				  	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				    	<?php the_title(); ?>
				    	<?php the_excerpt(); ?>
					</article>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

	</div>	
</section> <?php // end #wrapper ?>