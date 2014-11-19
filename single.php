<?php
get_header(); ?>

    	<div class="row">
		    <div class="col-md-8">
			<?php
				// Single Post
				the_post();
?>
                   
                <h3 id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a> </h3>   

										                       
				<?php	include('include/byline_render.inc');       ?>
				
<?php   if ( has_post_thumbnail() )	the_post_thumbnail('medium', array('class' => 'pull-left', 'id' => 'in-single'));	
		
				the_content();       
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'blueronald' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

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
				
comments_template( "comments.php" ); 							
?>
				
		      </div><!-- .col-md-8 -->
                        <?php get_sidebar('right'); ?>	
	   </div><!-- .row -->
<?php
get_footer();
?>
