<?php
// Exclude categories on the homepage.

$query_args = array(
	'post_type' => 'campuses', 
	'posts_per_page' => 6,
	'orderby' => 'menu_order'
);

query_posts( $query_args );

?>

<section class="choose-campus">
	<div class="container">
	  	<div class="campus-home">
			<div class="campus-title-area">
		  		<div class="campus-title-area-main">
					<div class="campus-home-title-1"> Your new home </div>
					<div class="clear"></div>
					<div class="campus_title css-green"> <span>Choose your Campus!</span> </div>
		  		</div>
			</div>
			<div class="campus-grid-area">
		  		<div class="container">
		  			<?php if ( have_posts() ) : $count = 0; ?>
						<ul>
							<?php while ( have_posts() ) : the_post(); $count++;?>
								<div class="campus-grid-main col-md-6 col-sm-6">
							  		<?php get_template_part('templates/campuses/grid'); ?>
								</div>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
					
		  		</div>
			</div>
	  	</div>
	</div>
	<div class="border-campus"></div>
</section>