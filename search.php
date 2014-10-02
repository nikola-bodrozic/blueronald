<?php get_header(); ?>
<div class="row">
	<div class="col-md-8">
		<?php if ( have_posts() ) : ?>

				<h1><?php printf( __( 'Search Results for: %s', 'blueronald' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

			<?php while ( have_posts() ) : the_post(); ?>

               <?php include('include/byline_data.inc'); ?>
				<h3> <?php the_title(); ?> </h3>
				<?php  include('include/byline_render.inc');  ?>				
				<?php the_excerpt(); ?>
				
				<p><a class="btn btn-primary btn-lg" role="button" href="<?php the_permalink(); ?>"><?php _e('Read More...', 'blueronald'); ?></a></p>

			<?php endwhile; ?>

			<?php echo "<br>"; blueronald_paging_navigation(); echo "<br>"; ?>

		<?php else : ?>

			<?php echo "string"; ?>

		<?php endif; ?>
	</div>
	<?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>
