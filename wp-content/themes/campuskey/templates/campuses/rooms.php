<?php
// Exclude categories on the homepage.

$query_args = array(
	'post_type' => 'rooms', 
	'posts_per_page' => 3,
	'orderby' => 'menu_order'
);

query_posts( $query_args );

?>

<section class="page-room lifetyle-rooms">
	<div class="inner">
		<div class="container">

			<div class="header-title-area">
		  		<div class="header-title-area-main">
					<div class="header-title"> <span>Choose your room</span> </div>
		  		</div>
			</div>
			<div class="section-grid-area">
		  		<div class="container">
		  			<?php if ( have_posts() ) : $count = 0; ?>
						<ul>
							<?php while ( have_posts() ) : the_post(); $count++;?>
								<div class="room-grid-main">
							  		<?php get_template_part('templates/rooms/grid'); ?>
								</div>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
					
		  		</div>
			</div>

		</div>
	</div>
	<div class="border-room"></div>
</section>