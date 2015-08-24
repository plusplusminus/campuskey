<?php 

global $post;

$image = wp_get_attachment_image( get_post_meta( $post->ID, '_ck_room_floorplan_id', 1 ), 'large','',array('class'=>'img-responsive') );

// Find connected pages
$connected = new WP_Query( array(
	'connected_type' => 'rooms_to_features',
	'connected_items' => get_queried_object(),
	'nopaging' => true,
) );



?>

<section class="section_features"> 
	<div class="container">
		<div class="row">
			<?php
			if ( $connected->have_posts() ) : $count = 0;
			?>
			<div class="room_features col-md-6">
				<h3>All Room Features</h3>
				<?php while ( $connected->have_posts() ) : $connected->the_post(); $count++; ?>
					<?php if ($count < 6) : ?>
					    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php else: ?>
						 <?php if ($count == 6) : ?>
						 	<h2>Also includes</h2>
						 <?php endif; ?>
						<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
					<?php endif; ?>
				<?php endwhile; ?>
				</div>

			<?php wp_reset_postdata(); endif; ?>
			<?php if (!empty($image)) : ?>
				<div class="room_layout col-md-6">
					<h3>Room Layout</h3>
					<figure class="room_layout--image">
						<?php echo $image; ?>
					</figure>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

