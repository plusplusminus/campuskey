<?php global $post; ?>
<section class="header-page">

		<div class="header-title-area">
	  		<div class="header-title-area-main">
				<div class="header-title css-green"> <span><?php the_title();?></span> </div>
	  		</div>
		</div>
		<div class="header-subtitle">
			<?php $subtitle = get_post_meta($post->ID,'_ck_building_header',true); ?>
			<?php echo wpautop($subtitle); ?>
		</div>

</section>