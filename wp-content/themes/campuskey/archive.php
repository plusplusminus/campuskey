<?php get_header(); ?>

	<?php global $post; ?>

	<div class="container page-container">

		<div class="inner">
			<section class="header-page">

					<div class="header-title-area">
				  		<div class="header-title-area-main">
							<?php if (is_category()) { ?>
								<h1 class="header-title css-yellow"> <span>
									<?php single_cat_title(); ?>
								</span></h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="header-title css-yellow"> <span><?php _e( 'Posts Tagged:', 'aevitas' ); ?> <?php single_tag_title(); ?></span> </h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="header-title css-yellow">

									<span> <?php _e( 'Posts By:', 'aevitas' ); ?> <?php the_author_meta('display_name', $author_id); ?> </span>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="header-title css-yellow">
									<span><?php _e( 'Daily Archives:', 'aevitas' ); ?> <?php the_time('l, F j, Y'); ?></span>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="header-title css-yellow">
										<span><?php _e( 'Monthly Archives:', 'aevitas' ); ?> <?php the_time('F Y'); ?> </span>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="header-title css-yellow">
										<span><?php _e( 'Yearly Archives:', 'aevitas' ); ?> <?php the_time('Y'); ?> </span>
									</h1>

							<?php } elseif (is_post_type_archive()) { ?>
									<h1 class="header-title css-yellow">
										<?php post_type_archive_title(); ?>
									</h1>
							<?php } elseif( is_tax() ) {
							    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );;
							    ?>
								    <h1 class="header-title css-yellow">
										<span><?php _e( $term->name, 'aevitas' ); ?></span>
									</h1>

							<?php } ?>
				  		</div>
					</div>

			</section>

			<div class="page_container">
				<aside class="section_sidebar">
					<?php get_sidebar(); ?>
				</aside>
				<main class="section_article">

					<section class="section_archive">  
						
						<?php if ( have_posts() ) : ?>
							<div id="blog-container">
								<?php while ( have_posts() ) : the_post(); ?>
								  	<article id="post-<?php the_ID(); ?>" <?php post_class('article_blog'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								    	
								    	<figure class="blog_image">
								    		<?php the_post_thumbnail('blog-custom',array('class'=>'img-responsive')); ?>
								    		<figcaption class="blog_content">

								    					<span class="blog_category"><?php the_category(); ?></span>
							    						<h3 class="content_inner--title"><span><?php the_title(); ?></span></h3>

							    						<?php the_excerpt();?>

							    						<a class="blog_article--link" href="<?php the_permalink();?>">Find Out More</a>


											</figcaption>
											
										</figure>
									</article>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
					</section> <?php // end #wrapper ?>
				</main>
			</div>
		</div>
	</div>


<?php get_footer(); ?>
