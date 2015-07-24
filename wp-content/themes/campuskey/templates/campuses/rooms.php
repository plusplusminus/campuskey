<?php
// Exclude categories on the homepage.

$query_args = array(
	'post_type' => 'rooms', 
	'posts_per_page' => 3,
	'orderby' => 'menu_order'
);

query_posts( $query_args );

?>

<section class="section_campuses">  
	<div class="container">
		<div class="campuses_heading">
			<span class="campuses_heading--subtitle">Your new home</span>
			<h2 class="campuses_heading--title">Choose your room</h2>
		</div> 
		<?php if ( have_posts() ) : $count = 0; ?>
			<ul>
				<?php while ( have_posts() ) : the_post(); $count++;?>
				  	<li>
				    	<?php the_title(); ?>
				    </li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

	</div>	
</section> <?php // end #wrapper ?>