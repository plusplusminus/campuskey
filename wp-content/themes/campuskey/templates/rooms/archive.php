<div class="rooms_archive">
	<div class="page-room">
		<div class="inner">
			<?php

				// Find connected pages
				$connected = new WP_Query( array(
				  'connected_type' => 'pages_to_features',
				  'connected_items' => get_queried_object(),
				  'nopaging' => true,
				) );

				// Display connected pages
				if ( $connected->have_posts() ) : $count = 0;
				?>
				<aside class="section_feature">				
					<div class="header-title-area-main">
						<div class="header-title css-orange"> <span>Room Features</span> </div>
			  		</div>
					<ul class="feature_list">
						
						<?php while ( $connected->have_posts() ) : $connected->the_post(); $count++; ?>
							<?php if ($count < 6) : ?>
								<?php $iconname = get_post_meta($post->ID,'_ck_feature_icon',true); ?>
							    <li class="feature_list--item">
									<div class="tab-ico"> 
										<i class="icon-<?php echo $iconname; ?>"></i> 
									</div>
									<div class="tab-title">
										<div class="display-table">
											<div class="display-table-cell"><?php the_title(); ?></div>
										</div>
									</div>
								</li>
							<?php else: ?>
								 <?php if ($count == 6) : ?>
								 	<div class="clearfix"></div>
								 	<br>
								 	<li class="feature_list--list"><strong>Also includes:</strong></li>
								 <?php endif; ?>
								<li class="feature_list--list"><?php the_title(); ?></li>
							<?php endif; ?>
						<?php endwhile; ?>

					</ul>
				</aside>

				<?php 
				// Prevent weirdness
				wp_reset_postdata();

				endif;

				?>
		</div>
<!-- 	<div class="bg-features"></div> -->
	</div>
</div>

<div class="page-room">
	<div class="inner">
		<section class="section-rooms">
			<div class="container">
				<div class="header-title-area">
			  		<div class="header-title-area-main">
						<div class="header-title"> <span>Choose your room</span> </div>
			  		</div>
			  		<div class="header-subtitle">
			  			<?php
						if ( have_posts() ) : $count = 0;
						?>
							<?php while ( have_posts() ) : the_post(); $count++; ?>
									<?php the_content(); ?>
							<?php endwhile; ?>

						<?php wp_reset_postdata(); endif; ?>
					</div>
				</div>
			</div>

			<section class="section_features">
				<div class="section-grid-area">
			  		<div class="container">
			  			<?php
						// Exclude categories on the homepage.

						$query_args = array(
							'post_type' => 'rooms', 
							'posts_per_page' => 3,
							'orderby' => 'menu_order'
						);

						query_posts( $query_args );

						?>
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
			</section>
		</section>	
	</div>
	<div class="border-room"></div>
</div>