<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>
	
	<div class="container page-container">

		<div class="inner">
      
	   		<?php get_template_part('templates/page/page','header'); ?>

	  		<?php get_template_part('templates/blog/page','content'); ?>

	  	</div>
	</div>

<?php get_footer(); ?>