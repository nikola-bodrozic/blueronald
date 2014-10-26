<?php get_header(); ?>
<div class="row">
	<div class="col-md-8">
		<?php if ( have_posts() ) : ?>

				<h1><?php printf( __( 'Search Results for: %s', 'blueronald' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

			<?php while ( have_posts() ) : the_post(); ?>
               
                <h3 id="post-<?php the_ID(); ?>" class="post"> <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				
				<?php  include('include/byline_render.inc');  ?>	
							
				<div class="row">
					
								<div id="feat-image" class="col-md-3">				
									<?php 
										$noimage = get_template_directory_uri()  . '/images/no-image.jpg';
										if ( has_post_thumbnail() ){ 
											the_post_thumbnail('thumbnail');
										}
										else {
											echo "<img src='$noimage'>";
										}	
									?>
								</div>
				        
				        
								<div id="excerpt"  class="col-md-9">
									<?php the_excerpt(); ?>
								</div>
								
				</div>
				 
				<br>
				
				<p><a class="btn btn-primary btn-lg" role="button" href="<?php the_permalink(); ?>"><?php _e('Read More...', 'blueronald'); ?></a></p>
				
								 <hr style="width: 80%;">

			<?php endwhile; ?>

			<?php 
			echo "<br>"; 
			blueronald_paging_navigation(); 
			echo "<br>"; 
			?>

		<?php else : ?>

			<p><?php _e('No post found', 'blueronald'); ?></p>

		<?php endif; ?>
	</div>
	<?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>
