<div class="row">
	<footer>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-4">

					<p class="text-center">
						Footer text
					</p>

				</div>
				<div class="col-md-4">

					<p class="text-center" id="copyright">
						<?php echo get_theme_mod( 'blueronald_display_cpm' ) ?>
					</p>

				</div>				
				<div class="col-md-4">
					<?php get_sidebar('footer'); ?>
				</div>
			</div>
		</div>
	</footer>
</div>
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
	jQuery('.widget-container > ul').addClass('nav nav-pills nav-stacked'); 
</script>
<?php wp_footer(); ?>
</body>
</html>