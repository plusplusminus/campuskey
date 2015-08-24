<?php 

global $post;

$image = wp_get_attachment_image( get_post_meta( $post->ID, '_ck_room_floorplan_id', 1 ), 'large','',array('class'=>'img-responsive') );

// Find connected pages
$connected = new WP_Query( array(
	'connected_type' => 'pages_to_features',
	'connected_items' => get_queried_object(),
	'nopaging' => true,
) );

?>

<main class="section_rooms"> 
	<div class="container">

			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<?php

					// Find connected pages
					$connected = new WP_Query( array(
					  'connected_type' => 'pages_to_features',
					  'connected_items' => get_queried_object(),
					  'nopaging' => true,
					) );

					// Display connected pages
					if ( $connected->have_posts() ) :
					?>
					<section class="section_feature"> 
						<div class="container">
							<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
							    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile; ?>
						</div>
					</section>

					<?php 
					// Prevent weirdness
					wp_reset_postdata();

					endif;

					?>
				</div>
			</div>


			<?php
			if ( have_posts() ) : $count = 0;
			?>

				<?php while ( have_posts() ) : the_post(); $count++; ?>
					<article class="lifestyle_content">
						<?php the_content(); ?>
					</article>
				<?php endwhile; ?>


			<?php wp_reset_postdata(); endif; ?>

		</div>
	</div>
</main>

