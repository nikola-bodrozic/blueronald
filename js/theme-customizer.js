( function( $ ) {
	// first control
	wp.customize('blueronald_display_bottom_menu', function(value) {
		value.bind(function(to) {
            false === to ? $('.navbar-inverse').fadeOut("slow") : $('.navbar-inverse').fadeIn('slow');			
		});
	});
} )( jQuery );