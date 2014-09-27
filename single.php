<?php
get_header(); ?>

    	<div class="row">
		    <div class="col-md-8">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
				?>
<h3 class="entrytitle" id="post-<?php the_ID(); ?>"> <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				
				<?php
				the_content();
				endwhile;
			?>
		</div><!-- #content -->
		    <div class="col-md-4">

					<?php if ( is_active_sidebar( 'sidebar-widget-area' ) ) { ?>
					    <?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
					<?php } ?>

	    </div>		
	</div><!-- #primary -->

<?php
get_footer();
?>
