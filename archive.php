<?php 
/*
Template Name: Archive
*/
get_header(); ?>
<div class="row">
	<div class="col-md-8">
		
			<?php if ( have_posts() ) : ?>

				<h1>
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'blueronald' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'blueronald' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'blueronald' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'blueronald' ), get_the_date( _x( 'Y', 'yearly archives date format', 'blueronald' ) ) );

						else :
							_e( 'Archives', 'blueronald' );

						endif;
					?>
				</h1>

			<?php while ( have_posts() ) : the_post();  ?>

                <h3 id="post-<?php the_ID(); ?>" class="post"> <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				
				<?php	include('include/byline_render.inc');       ?>    
				<div class="row">
					
								<div id="feat-image" class="col-md-3">				
									<?php 
										$noimage = get_bloginfo('template_directory') . '/images/no-image.jpg';
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

			<div class="navigation">
				<div style="display: inline;"><?php next_posts_link('<button type="button" class="btn btn-default">'.__('&laquo; Older Posts','blueronald').'</button>') ?></div>
				<div style="display: inline;">&nbsp;&nbsp;<?php previous_posts_link('<button type="button" class="btn btn-default">'.__(' Newer Posts &raquo;','blueronald').'</button>') ?></div>
			</div>
			<br>
<?php
				else :
			           echo "<p><?php _e('No posts found.', 'blueronald'); ?></p>";
					
				endif;
			?>

    </div>	
              <?php get_sidebar('right'); ?>    
</div>

<?php get_footer(); ?>