<?php
get_header(); ?>

    	<div class="row">
		    <div class="col-md-8">
			<?php
				// Single Post
				the_post();
                include('include/byline_data.inc');
?>

                <h3 class="entrytitle" id="post-<?php the_ID(); ?>"> <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>              
				<?php	include('include/byline_render.inc');       ?>
				<?php	the_content();       ?>
		      </div><!-- .col-md-8 -->
                        <?php get_sidebar('right'); ?>	
	   </div><!-- .row -->
<?php
get_footer();
?>
