<?php get_header(); ?>
<div class="row">
	<div class="col-md-8">	
<?php
$rec = esc_attr($_GET['s']);
$query = new WP_Query( array(
    'post_type' => array('post', 'page'),
    's' => $rec,
    'posts_per_page' => 2,
));
while ( $query->have_posts() ) {     $query->the_post();
?>
				<h3><?php the_title(); ?></h3>
				<?php the_excerpt(); ?> 
				<p><a class="btn btn-primary btn-lg" role="button" href="<?php the_permalink(); ?>"><?php _e('Read More...', 'blueronald'); ?></a></p>
<?php } ?>

	</div>

		<?php get_sidebar('right'); ?>
</div>

<?php get_footer(); ?>