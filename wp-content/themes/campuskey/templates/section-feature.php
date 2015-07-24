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

