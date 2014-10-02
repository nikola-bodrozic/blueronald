<?php get_header(); ?>
    	<div class="row">
		    <div class="col-md-8">
	<?php if (have_posts()) : while (have_posts()) : the_post(); include('include/byline_data.inc'); 			
		            
		            // Post author name and display name
                    $pAuthor = get_the_author_meta('user_login');
                    $pDispName = get_the_author_meta('display_name');                 
     ?>

			<h2><?php the_title(); ?></h2>

				<p class="text-muted">  
                   <?php 
                    _e("Written by: ","blueronald");
                    echo "<a href='/?author_name=$pAuthor'>$pDispName</a>";
                    echo "&nbsp;";
                    _e('On: '.get_the_date(), 'blueronald');
                    ?>
                </p>		

				<?php the_content(); ?>

			

		</div>
            

                            <?php get_sidebar('right'); ?>
            
        </div>  
		<?php // comments_template(); ?>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>