

<?php
// Exclude categories on the homepage.

$query_args = array(
	'post_type' => 'post', 
	'posts_per_page' => 6
);

query_posts( $query_args );

?>

<section id="container">
	<div class="grid-item w1"></div>
    <div class="grid-item w2">
    	<div class="va-container">
    		<div class="va-middle">
    			<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
    		</div>
    	</div>
    </div>
    <div class="grid-item w3">
    	<div class="va-container">
    		<div class="va-middle">
    			<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
    		</div>
    	</div>
    </div>
    <div class="grid-item w4">
    	<div class="va-container">
    		<div class="va-middle">
    			<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
    		</div>
    	</div>
    </div>
    <div class="grid-item w5"></div>
    <div class="grid-item w6"></div>
    <div class="grid-item w7">
    	<div class="va-container">
      		<div class="va-middle">
      			<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
      		</div>
      	</div>
    </div>
</section>