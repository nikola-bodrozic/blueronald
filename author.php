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

					<div class="bs-example">
					    <div class="panel panel-default" style="padding-left:5px;">

											<h3 id="post-<?php the_ID(); ?>" class="post"> <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
								
								<div class="row">
									
												<div id="feat-image" class="col-md-3">				
													<?php 
														$noimage = get_template_directory_uri() . '/images/no-image.jpg';
														if ( has_post_thumbnail() ){ 
															the_post_thumbnail('thumbnail');
														}
														else {
															echo "<img src='$noimage'>";
														}	
													?>
												</div>
								        
								        
												<div id="excerpt"  class="col-md-9">
													<?php the_excerpt(); ?>
												</div>
												
								</div>
								 
								<br>
								
								<p><a class="btn btn-primary btn-lg" role="button" href="<?php the_permalink(); ?>"><?php _e('Read More...', 'blueronald'); ?></a></p>
				
								 <br>
				 		</div><!-- .panel panel-default -->
					</div><!-- .bs-example -->
			<?php endwhile; ?>

			<div class="navigation">
				<div style="display: inline;"><?php next_posts_link('<button type="button" class="btn btn-default">'.__('&laquo; Older Posts','blueronald').'</button>') ?></div>
				<div style="display: inline;">&nbsp;&nbsp;<?php previous_posts_link('<button type="button" class="btn btn-default">'.__(' Newer Posts &raquo;','blueronald').'</button>') ?></div>
			</div>
			<br>
		<?php else : ?>

			<p><?php _e('No posts by this author.', 'blueronald'); ?></p>

		<?php endif; ?>

    </div>	
              <?php get_sidebar('right'); ?>    
</div>

<?php get_footer(); ?>