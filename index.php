<?php get_header(); ?>
<div class="row">
	<div class="span12">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h2><?php the_title() ;?></h2>
	<?php the_content(); ?>

<?php endwhile; else: ?>

	<p>Sorry, no posts to list</p>

<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>