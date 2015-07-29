<?php get_header(); ?>

	<div class="choose-campus">

		<div class="inner">
      
	   		<?php get_template_part('templates/campuses/header'); ?>

	   		<?php get_template_part('templates/campuses/gallery-content'); ?>

   		</div>

   		<div class="border-campus"></div>

   	</div>

   	<?php get_template_part('templates/campuses/rooms'); ?>

   	<?php get_template_part('templates/campuses/buildings'); ?>

   	<?php get_template_part('templates/section','blog'); ?>


<?php get_footer(); ?>
