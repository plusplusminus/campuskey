<div class="room-img"> 
	<?php the_post_thumbnail('full',array('class'=>'img-responsive'));?>
	<div class="slider-shadow"></div>
</div>
<div class="room-title">
	<div class="room-text">
			<?php $description = get_post_meta($post->ID,'_ck_room_description',true); ?>
			<h2><span><?php the_title();?></span><span class="description"><?php echo $description; ?></span></h2>
			<div class="view-more"> View More <i class="icon-right-arrow"></i> </div>
	</div>
	<div class="vertical-ribbon">
		<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M0,0C0,0,0,182,0,182C0,182,90,126.5,90,126.5C90,126.5,180,182,180,182C180,182,180,0,180,0C180,0,0,0,0,0C0,0,0,0,0,0"></path></svg>
	</div>
</div>
<a class="grid-link" href="<?php the_permalink();?>" title="<?php the_title();?>">&nbsp;</a>