(function( $ ) {
	'use strict';
	
	$(function() {
	
		$('#digest_items button#item_extract_data').on('click', function(e){
			e.preventDefault();
			
			var data = {
				'action': 'extract_data',
				'url': encodeURIComponent($('#digest_items input#item_url').val())
			}
			
			$.post(ajaxurl, data, function(response) {
				console.log(response);
			});
			
		});
	
	});

	$( window ).load(function() {
	});

})( jQuery );