<?php get_header(); ?>
<?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>
<div class="row">
	<div class="col-md-8">
        <h2>About: <?php echo $curauth->nickname; ?></h2>
        <dl>
            <dt>Website</dt>
            <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
            <dt>Profile</dt>
            <dd><?php echo $curauth->user_description; ?></dd>
        </dl>        
        <hr>
		<?php if ( have_posts() ) : ?>
<h3><?php _e('Posts by this author.', 'blueronald'); ?></h3>
			<?php while ( have_posts() ) : the_post(); ?>

				<h3><?php the_title(); ?></h3>
				<?php the_excerpt(); ?> 
				<p><a class="btn btn-primary btn-lg" role="button" href="<?php the_permalink(); ?>"><?php _e('Read More...', 'blueronald'); ?></a></p>
				 
			<?php endwhile; ?>

			<div class="navigation">
				<div class="alignleft" style="display: inline;">&nbsp;&nbsp;<?php previous_posts_link('<button type="button" class="btn btn-default">'.__('&laquo; Newer Posts','blueronald').'</button>') ?></div>
				<div class="alignright" style="display: inline;"><?php next_posts_link('<button type="button" class="btn btn-default">'.__('Older Posts &raquo;','blueronald').'</button>') ?></div>
			</div>
			<br>
		<?php else : ?>

			<p><?php _e('No posts by this author.', 'blueronald'); ?></p>

		<?php endif; ?>

    </div>	
              <?php get_sidebar('right'); ?>    
</div>

<?php get_footer(); ?>