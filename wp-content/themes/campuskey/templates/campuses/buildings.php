<?php global $post; ?>
<section class="map-campus">
	<div class="container">
	  	<div class="campus-home">
			<div class="campus-title-area">
		  		<div class="campus-title-area-main">
					<div class="clear"></div>
					<div class="campuses_title"> <span>Campus &amp; Buildings</span> </div>
		  		</div>
			</div>
			<div id="campus-map" data-id="<?php echo $post->ID; ?>" data-type="buildings" class="campus-map-area"></div>
	  	</div>
	</div>
</section>