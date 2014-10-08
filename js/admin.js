(function( $ ) {
	'use strict';
	
	$(function() {
	
		$('.color-field').wpColorPicker();

		$('#digest_items #item-url').val('');
	
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
				
				$.post(ajaxurl, data, function(data) {
				
					var res = jQuery.parseJSON(data);
					
					if(res.type == 'error') {
						$btn.next( '.error-txt' ).text( res.error_message ).parent().addClass('error');
						$btn.text( btn_text ).removeAttr('disabled');
					} else {
					
						console.log(res.thumbnail_url);
					
						if(res.thumbnail_url !== undefined) {
							var row = $( '.empty-item.screen-reader-text' )
								.clone()
								.removeClass('empty-item screen-reader-text')
								.addClass('digest-item')
								.find('img.thumbnail').attr('src', res.thumbnail_url).end()
								.find('input.thumbnail').val(res.thumbnail_url).end()
								.find('input.thumbnail-width').val(res.thumbnail_width).end()
								.find('input.thumbnail-height').val(res.thumbnail_height).end()
								.find('input.provider-name').val(res.provider_name).end()
								.find('input.provider-url').val(res.provider_url).end()
								.find('input.type').val(res.type).end()
								.find('input.url').val(res.url).end()
								.find('input.title').val(res.title).end()
								.find('textarea.description').val(res.description).end()
								.appendTo('#digest-items-list');
						} else {
							var row = $( '.empty-item.screen-reader-text' )
								.clone()
								.removeClass('empty-item screen-reader-text')
								.addClass('digest-item')
								.find('img.thumbnail').remove().end()
								.find('input.thumbnail').remove().end()
								.find('input.thumbnail-width').remove().end()
								.find('input.thumbnail-height').remove().end()
								.find('a.remove-image').remove().end()
								.find('input.provider-name').val(res.provider_name).end()
								.find('input.provider-url').val(res.provider_url).end()
								.find('input.type').val(res.type).end()
								.find('input.url').val(res.url).end()
								.find('input.title').val(res.title).end()
								.find('textarea.description').val(res.description).end()
								.appendTo('#digest-items-list');
						}
						
						$('#digest_items .remove-item').on('click', function() {
							$(this).parents('table').remove();
							return false;
						});
						
						$('#digest_items .remove-image').on('click', function() {
							$(this).prev('img').remove();
							$(this).parents('table')
								.find('input.thumbnail').remove().end()
								.find('input.thumbnail-width').remove().end()
								.find('input.thumbnail-height').remove().end();
							$(this).remove();
							return false;
						});
					
						
										
							$btn.text( btn_text ).removeAttr('disabled').prev( '#item-url' ).val('');
						return false;
					
					}
					
				});
			} else {
				$btn.next( '.error-txt' ).text( $btn.data('error-invalid') ).parent().addClass('error');
				return false;
			}
	
		});
		
		$('#digest_items input#item-url').focus(function(){
			$(this).next( 'button' ).next( '.error-txt' ).text( '' ).parent().removeClass('error');
		});
		
		$('#digest_items .remove-item').on('click', function() {
			$(this).parents('table').remove();
			return false;
		});
		
		$('#digest_items .remove-image').on('click', function() {
			$(this).prev('img').remove();
			$(this).parents('table')
				.find('input.thumbnail').remove().end()
				.find('input.thumbnail-width').remove().end()
				.find('input.thumbnail-height').remove().end();
			$(this).remove();
			return false;
		});
		
	});

	$( window ).load(function() {
	});

})( jQuery );