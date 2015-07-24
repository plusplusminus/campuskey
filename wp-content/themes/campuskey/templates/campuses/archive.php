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
					<div class="campus_title"> <span>Choose your Campus!</span> </div>
		  		</div>
			</div>
			<div class="campus-grid-area">
		  		<div class="container">
		  			<?php if ( have_posts() ) : $count = 0; ?>

							<?php while ( have_posts() ) : the_post(); $count++;?>
								<div class="campus-grid-main col-md-6 col-sm-6">
							  		<div class="campus-img"> 
							  			<?php the_post_thumbnail('full',array('class'=>'img-responsive'));?>
										<div class="slider-shadow"></div>
							  		</div>
							  		<div class="campus-title"> 
							  			<a class="campus-title-scroll" href="<?php the_permalink();?>" title="<?php the_title();?>">
										<div class="campus-text">
								  			<h2><?php the_title();?></h2>
								  			<div class="view-more"> View More <i class="icon-right-arrow"></i> </div>
										</div>
										<div class="campus-bg"></div>
										</a> 
									</div>
								</div>
							<?php endwhile; ?>
						
					<?php endif; ?>

					

					<?php wp_reset_query(); ?>

					<div class="clearfix"></div>
					
					<?php if ( have_posts() ) : $count = 0; ?>
						<div class="campuses-content">
							<?php while ( have_posts() ) : the_post(); $count++;?>
								<?php the_content(); ?>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
					<?php wp_reset_query(); ?>

		  		</div>
			</div>
	  	</div>
	</div>
</section>