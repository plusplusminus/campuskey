<section class="header-room">
	<div class="container">

		<div class="header-title-area">
	  		<div class="header-title-area-main">
				<div class="header-title css-yellow"> <span><?php the_title();?></span> </div>
	  		</div>
		</div>
		<div class="header-subtitle">
			<?php $subtitle = get_post_meta($post->ID,'_ck_room_header',true); ?>
			<?php echo wpautop($subtitle); ?>
		</div>
	</div>
</section>