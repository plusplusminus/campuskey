<?php
global $post;
// Find connected pages
$connected = new WP_Query( array(
  'connected_type' => 'pages_to_features',
  'connected_items' => get_queried_object(),
  'nopaging' => true,
) );

// Display connected pages

if ( $connected->have_posts() ) :?>
	
	<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
		<?php $iconname = get_post_meta($post->ID,'_ck_feature_icon',true); ?>
		<?php $icon_set .= '<li class="sliderThumb"> 
								<a href="javascript:void(0)" title="'.get_the_title().'">
									<div class="tab-ico"> <i class="icon-'.$iconname.'"></i> </div>
									<div class="tab-title">
										<div class="display-table">
											<div class="display-table-cell"> '.get_the_title().' </div>
										</div>
									</div>
								</a> 
							</li>'; ?>
		<?php $content_set .= 	'<div class="sliderContent">
									'.wpautop(get_the_content()).'
									<div class="slider-btn"> <a href="http://campuskey.co.za/newsite/lifestyle/" title="Discover the lifestyle">Discover the lifestyle<i class="icon-right-arrow"></i></a> </div>
								</div>'; ?>
	<?php endwhile; ?>
<?php 
// Prevent weirdness
wp_reset_postdata();

endif;

?>
<section class="lifestyle-area">
	<div class="container">
		<div class="owl-thumbs">
			<ul>
				<?php echo $icon_set; ?>
			</ul>
		</div>
		<div class="owl-carousel">
			<?php echo $content_set; ?>
			<div class="slider-nav">
			  	<div class="owl-prev" style=""></div>
			  	<div class="owl-next" style=""></div>
			</div>
		</div>
	</div>
</section>