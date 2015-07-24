<?php global $post; ?>

<?php $image_attributes_large = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full' ); ?>

<section class="section_newsletter" style="background-image:url('<?php echo $image_attributes_large[0];?>');min-height:550px;">  
	<div class="wrap container-fluid">
		<div class="row center-xs middle-xs">
			<div class="col-xs-12 col-sm-6">

				<div class="newsletter_content">
						<svg class="svg-icon shape-logo-symbol"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#shape-logo-symbol"></use></svg>
						<div class="newsletter_content--info">
							Subscribe to our newsletter
						</div>
						<div class="newsletter_form">
							<div class="row center-xs">
							  <div class="col-lg-8">
							    <div class="input-group">
							      <input type="text" class="form-control input-lg" placeholder="Search for...">
							      <span class="input-group-btn">
							        <button class="btn btn-primary btn-lg" type="button">Subscribe</button>
							      </span>
							    </div><!-- /input-group -->
							  </div><!-- /.col-lg-6 -->
							</div><!-- /.row -->
						</div>
					</figure>
				</div>

			</div>
		</div>
	</div>
</section> <?php // end #wrapper ?>