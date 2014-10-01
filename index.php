<?php get_header(); ?>
<div class="row">
	<div class="col-md-8">
				<?php
					 $args = array(
								   'post_type' => 'post',
								   'posts_per_page' => 2,
								   'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
								   );
				
					query_posts($args);
				
				while (have_posts()) : the_post();
				 /* Do whatever you want to do for every page... */ 
				?>
					
				<h3><?php the_title(); ?></h3>
				<?php the_excerpt(); ?> 
				<p><a class="btn btn-primary btn-lg" role="button" href="<?php the_permalink(); ?>"><?php _e('Read More...', 'blueronald'); ?></a></p>
				      <?php endwhile; ?>
				      <br>
				<div class="navigation">
				  <div class="alignleft" style="display: inline;">&nbsp;&nbsp;<?php previous_posts_link('<button type="button" class="btn btn-default">'.__('&laquo; Newer Posts','blueronald').'</button>') ?></div>
				  <div class="alignright" style="display: inline;"><?php next_posts_link('<button type="button" class="btn btn-default">'.__('Older Posts &raquo;','blueronald').'</button>') ?></div>
				</div>
				<br>
				<?php
				wp_reset_query(); // Restore global post data
				?>
	</div>
    <div class="col-md-4">
              <?php get_sidebar('right'); ?>
    </div>	
    
</div>


<?php get_footer(); ?>