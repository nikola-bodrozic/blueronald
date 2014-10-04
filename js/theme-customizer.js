( function( $ ) {
	// first control
	wp.customize('blueronald_display_bottom_menu', function(value) {
		value.bind(function(to) {
            false === to ? $('.navbar-inverse').addClass("alert alert-danger").fadeOut("slow", function () { $(this).hide().removeClass("alert alert-danger") }) : $('.navbar-inverse').fadeIn('slow');			
		});
	});
	
	// second control
	wp.customize('blueronald_display_sidebar', function(value) {
		value.bind(function(to) {
			false === to ? $('#right-sidebar').addClass("alert alert-danger").fadeOut("slow", function () { $(this).hide().removeClass("alert alert-danger") }) : $('#right-sidebar').fadeIn('slow');
		});
	});	
} )( jQuery );