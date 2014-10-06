(function( $ ) {
	'use strict';
	
	$(function() {
	
		$('#digest_items button#add-item').on('click', function(e){
			e.preventDefault();
			
			var item_url = encodeURIComponent($('#digest_items input#item-url').val());
			
			if(item_url == '') {
				$(this).next( '.error-txt' ).text( $(this).data('error-empty') ).parent().addClass('error');
				// $('#digest_items .errors .empty-url').show();
				return false;
			}
				
			var data = {
				'action': 'extract_data',
				'url': item_url
			}
			
			$.post(ajaxurl, data, function(response) {
				console.log(response);
			});
			
		}); 
	
	});

	$( window ).load(function() {
	});

})( jQuery );