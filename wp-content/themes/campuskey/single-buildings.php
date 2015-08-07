<?php get_header(); ?>

	<div class="choose-campus">
      <div class="inner">
   	  <?php get_template_part('templates/buildings/header'); ?>
   	  <?php get_template_part('templates/buildings/gallery-content'); ?>
		</div>
		<div class="border-campus"></div>
	</div>

   <?php get_template_part('templates/campuses/rooms'); ?>

   <?php get_template_part('templates/campuses/buildings'); ?>

   <?php get_template_part('templates/buildings/floor-plan'); ?>

   


<?php get_footer(); ?>
