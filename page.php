<?php get_header(); ?>
    	<div class="row">
		    <div class="col-md-8">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		

			<h2><?php the_title(); ?></h2>

			

				<?php the_content(); ?>

			

		</div>
            
		    <div class="col-md-4">
                            <?php get_sidebar('right'); ?>
		</div>            
        </div>  
		<?php // comments_template(); ?>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>