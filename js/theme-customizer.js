( function( $ ) {
	// text control
	wp.customize('blueronald_display_cpm', function(value) {
		value.bind(function(to) {
			$('#copyright').text(to);
		});
	});	
} )( jQuery );