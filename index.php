<?php get_header(); ?>
<div class="row">
	<div class="col-md-8">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

                <h3 id="post-<?php the_ID(); ?>" class="post"> <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				
				<?php	include('include/byline_render.inc');       ?>        
        
				<?php the_excerpt(); ?>
				 
				<p><a class="btn btn-primary btn-lg" role="button" href="<?php the_permalink(); ?>"><?php _e('Read More...', 'blueronald'); ?></a></p>
				 
			<?php endwhile; ?>

			<div class="navigation">
				<div class="alignleft" style="display: inline;">&nbsp;&nbsp;<?php previous_posts_link('<button type="button" class="btn btn-default">'.__('&laquo; Newer Posts','blueronald').'</button>') ?></div>
				<div class="alignright" style="display: inline;"><?php next_posts_link('<button type="button" class="btn btn-default">'.__('Older Posts &raquo;','blueronald').'</button>') ?></div>
			</div>
			<br>
		<?php else : ?>

			<p><?php _e('No post found', 'blueronald'); ?></p>

		<?php endif; ?>

    </div>	
              <?php get_sidebar('right'); ?>    
</div>

<?php get_footer(); ?>