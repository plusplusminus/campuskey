<section class="header-room">
	<div class="container">
		<div class="header-title-area">
	  		<div class="header-title-area-main">
				<h1 class="header-title"> <span><?php the_title();?></span> </h1>
	  		</div>
	  		<div class="header-subtitle">
	  			<?php $header = get_post_meta($post->ID,'_ck_campus_header',true); ?>
	  			<h2><?php echo $header; ?></h2>
			</div>
		</div>
	</div>
</section>