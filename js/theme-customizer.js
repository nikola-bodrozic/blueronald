( function( $ ) {
	// first control
	wp.customize('blueronald_display_bottom_menu', function(value) {
		value.bind(function(to) {
            false === to ? $('.navbar-inverse').fadeOut("slow") : $('.navbar-inverse').fadeIn('slow');			
		});
	});
	
	// second control
	wp.customize('blueronald_display_sidebar', function(value) {
		value.bind(function(to) {
			false === to ? $('#right-sidebar').fadeOut("slow") : $('#right-sidebar').fadeIn('slow');
		});
	});	
} )( jQuery );