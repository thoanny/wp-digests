(function( $ ) {
	'use strict';
	
	$(function() {
	
		$('#digest_items button#add-item').on('click', function(e){
			e.preventDefault();
			
			$(this).next( '.error-txt' ).text( '' ).parent().removeClass('error');
			
			var item_url = $('#digest_items input#item-url').val(),
				regex_url = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/gi,
				is_url = new RegExp(regex_url),
				$btn = $(this),
				btn_text = $btn.text();
			
			if(item_url == '') {
				$btn.next( '.error-txt' ).text( $btn.data('error-empty') ).parent().addClass('error');
				return false;
			}
			
			if(item_url.match(is_url)) {
				var data = {
					'action': 'extract_data',
					'url': encodeURIComponent(item_url)
				}
				
				$btn.text( $btn.data( 'loading' ) ).attr('disabled', 'disabled');
				
				$.post(ajaxurl, data, function(response) {
					// console.log(response);
					$btn.text( btn_text ).removeAttr('disabled').prev( '#item-url' ).val('');
				});
			} else {
				$btn.next( '.error-txt' ).text( $btn.data('error-invalid') ).parent().addClass('error');
				return false;
			}
	
		});
		
		$('#digest_items input#item-url').focus(function(){
			console.log('focus');
			$(this).next( 'button' ).next( '.error-txt' ).text( '' ).parent().removeClass('error');
		});
	
	});

	$( window ).load(function() {
	});

})( jQuery );