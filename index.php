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
				<?php the_content(__('Read more...','blueronald')); ?> 
				      <?php endwhile; ?>
				<div class="navigation">
				  <div class="alignleft"><?php previous_posts_link(__('&laquo; Newer Posts','blueronald')) ?></div>
				  <div class="alignright"><?php next_posts_link(__('Older Posts &raquo;','blueronald')) ?></div>
				</div>
				<?php
				wp_reset_query(); // Restore global post data
				?>
	</div>
    <div class="col-md-4">
        <?php if ( is_active_sidebar( 'sidebar-widget-area' ) ) { ?>
            <?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
        <?php } ?>
    </div>	
    
</div>


<?php get_footer(); ?>