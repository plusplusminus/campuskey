<?php 

global $post;


// Find connected pages
$connected = new WP_Query( array(
	'connected_type' => 'campuses_to_buildings',
	'connected_items' => get_queried_object(),
	'nopaging' => true,
) );


?>

<section class="section_features"> 
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div id="#gmap">Map</div>
			</div>
			<?php
				if ( $connected->have_posts() ) : $count = 0;
			?>
			<div class="room_features col-md-5">
				<h3>Campus Buildings</h3>
				<ul>
					<?php while ( $connected->have_posts() ) : $connected->the_post(); $count++; ?>

						    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						
					<?php endwhile; ?>
				</ul>
			</div>
			<?php wp_reset_postdata(); endif; ?>
		</div>
	</div>
</section>

