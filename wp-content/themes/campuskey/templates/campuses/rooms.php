<?php
// Exclude categories on the homepage.
global $post;

$tmp = $post->post_name;
$tmp_id = $post->ID;

$connected = new WP_Query( array(
  'connected_type' => 'campuses_to_rooms',
  'connected_items' => get_queried_object(),
  'nopaging' => true,
) );

?>

<section class="page-room lifetyle-rooms">
	<div class="inner">
		<div class="container">

			<div class="header-title-area">
		  		<div class="header-title-area-main">
					<div class="header-title css-orange"> <span>Choose your room</span> </div>
		  		</div>
			</div>
			<div class="section-grid-area">
	
		  			<?php if ( $connected->have_posts() ) : $count = 0; ?>
						<div class="row">
							<?php while ( $connected->have_posts() ) : $connected->the_post(); $count++;?>
								<?php $class=""; ?>
					
								<?php if ($connected->post_count == 2 && $count == 1) $class = 'col-md-offset-2'; ?>
								<?php if ($connected->post_count == 1 && $count == 1) $class = 'col-md-offset-4'; ?>
								<div class="room-grid-main <?php echo  $class; ?>">
							  		<div class="room-img"> 
										<?php the_post_thumbnail('full',array('class'=>'img-responsive'));?>
										<div class="slider-shadow"></div>
									</div>
									<div class="room-title">
										<div class="room-text">
												<?php $description = get_post_meta($post->ID,'_ck_room_header',true); ?>
												<h2><span><?php the_title();?></span><span class="description"><?php echo $description; ?></span></h2>
												<div class="view-more"> View More <i class="icon-right-arrow"></i> </div>
										</div>
										<div class="vertical-ribbon">
											<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M0,0C0,0,0,182,0,182C0,182,90,126.5,90,126.5C90,126.5,180,182,180,182C180,182,180,0,180,0C180,0,0,0,0,0C0,0,0,0,0,0"></path></svg>
										</div>
									</div>
									<?php $link = add_query_arg(array('campus'=>$tmp,'campus_id'=>$tmp_id),get_permalink()); ?>
									<a class="grid-link" href="<?php echo $link; ?>" title="<?php the_title();?>">&nbsp;</a>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
					

			</div>

		</div>
	</div>
	<div class="border-room"></div>
</section>