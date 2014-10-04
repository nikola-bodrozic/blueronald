(function($) {"use strict";

	// first control
	wp.customize('blueronald_display_bottom_menu', function(value) {
		value.bind(function(to) {
			false === to ? $('.navbar-inverse').hide() : $('.navbar-inverse').show();
		});
	});
	
	// second control
	wp.customize('blueronald_display_sidebar', function(value) {
		value.bind(function(to) {
			false === to ? $('#right-sidebar').hide() : $('#right-sidebar').show();
		});
	});	

})(jQuery); 