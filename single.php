<?php
get_header(); ?>

    	<div class="row">
		    <div class="col-md-8">
			<?php
				// Single Post
				the_post();
?>
                <h3 id="post-<?php the_ID(); ?>" class="post"> <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>       

										                       
				<?php	include('include/byline_render.inc');       ?>
				
<?php   if ( has_post_thumbnail() )	the_post_thumbnail('medium', array('class' => 'pull-left', 'id' => 'in-single')); ?>	
		
				<?php	the_content();       
			
				$posttags = get_the_tags();
				if ($posttags) {
					$tagString ="";	
				  foreach($posttags as $tag) {
				    $tagString .= $tag->name . ', '; 
				  }
				  echo "Tag(s): ".substr($tagString, 0, -2);
				} else {
					echo "<p>No tags for this post</p>";
				}
				
				echo "<br>";
				
				comments_template();
				
				echo "<br>";				
?>
				
		      </div><!-- .col-md-8 -->
                        <?php get_sidebar('right'); ?>	
	   </div><!-- .row -->
<?php
get_footer();
?>
