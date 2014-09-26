    <footer>
    	<div class="row">
		    <div class="span12">
		    	<div class="well">
		        	<p class="text-center">Footer text</p>
		        </div>
		    </div>
	    </div>
    </footer>
 </div>
    <!-- jQuery (necessary for Bootstrap`s JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    <script>
    	jQuery('ul.nav li.dropdown').hover(function() {
		  jQuery(this).find('.dropdown-menu').stop(true, true).delay(50).fadeIn(50);
		}, function() {
		  jQuery(this).find('.dropdown-menu').stop(true, true).delay(50).fadeOut(50);
		});
    </script>
        <?php wp_footer(); ?>
  </body>
</html>