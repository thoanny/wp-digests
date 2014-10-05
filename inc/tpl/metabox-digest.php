<?php // $val = get_post_meta($d->ID,'_ma_valeur',true); ?>
<label for="item_url">Adresse URL : </label>
<input id="item_url" type="text" name="item_url" placeholder="http://..." />
<button id="item_extract_data" class="button"><?php echo __('Add', 'wp-digests'); ?></button>

<script type="text/javascript">
	jQuery(document).ready(function( $ ){
		$( '#add-row' ).on('click', function() {
			var inc = $('.digest-item').length;
			var row = $( '.empty-item.screen-reader-text' )
							.clone()
							.removeClass('empty-item screen-reader-text')
							.addClass('digest-item')
							.find('input.thumbnail').val('test:'+ ++inc).end()
							.appendTo('#digest-items-list');
			return false;
		});
		
		$( '.remove-item' ).on('click', function() {
			$(this).parents('table').remove();
			return false;
		});
	});
</script>

<div id="digest-items-list">

	<?php
		if ( $digest_items ) :
			foreach ( $digest_items as $item ) {
	?>
				<table border="1" width="100%" class="digest-item">
					<tbody>
						<tr>
							<td rowspan="3" width=1 valign="top">
								<img src="#" width="100" height="100" />
								<input type="hidden" name="thumbnail[]" class="thumbnail" placeholder="Illustration" value="<?php if ($item['thumbnail'] != '') echo esc_attr( $item['thumbnail'] ); ?>" />
								<input type="hidden" name="provider_name[]" class="provider-name" placeholder="Provider name" value="<?php if ($item['provider_name'] != '') echo esc_attr( $item['provider_url'] ); ?>" />
								<input type="hidden" name="provider_url[]" class="provider-url" placeholder="Provider url" value="<?php if ($item['provider_url'] != '') echo esc_attr( $item['provider_url'] ); ?>" />
								<input type="hidden" name="type[]" class="type" placeholder="type" value="<?php if ($item['type'] != '') echo esc_attr( $item['type'] ); ?>" />
								<input type="hidden" name="url[]" class="url" value="<?php if ($item['url'] != '') echo esc_attr( $item['url'] ); ?>" />
							</td>
							<td height="1"><input type="text" class="title widefat" name="title[]" placeholder="Titre" value="<?php if($item['title'] != '') echo esc_attr( $item['title'] ); ?>" /></td>
							<td rowspan="3" valign="top" width="1"><a class="button remove-item" href="#"><?php echo __('Remove'); ?></a></td>
						</tr>
						<tr>
							<td valign="top"><textarea type="text" class="widefat" name="description[]" placeholder="Description"><?php if($item['description'] != '') echo esc_attr( $item['description'] ); ?></textarea></td>
						</tr>
						<tr>
							<td valign="top"><textarea type="text" class="widefat" name="comment[]" placeholder="Commentaire"><?php if($item['comment'] != '') echo esc_attr( $item['comment'] ); ?></textarea></td>
						</tr>
					</tbody>
				</table>
	<?php
			}
		endif;
	?>

<table border="1" width="100%" class="empty-item screen-reader-text">
	<tbody>
		<tr>
			<td rowspan="3" width=1 valign="top">
				<input type="text" name="thumbnail[]" class="thumbnail" placeholder="Illustration" />
				<input type="text" name="provider_name[]" class="provider-name" placeholder="Provider name" />
				<input type="text" name="provider_url[]" class="provider-url" placeholder="Provider url" />
				<input type="text" name="type[]" class="type" placeholder="type" />
				<input type="text" name="url[]" class="url" value="http://" />
			</td>
			<td height="1"><input type="text" class="title widefat" name="title[]" placeholder="Titre" /></td>
			<td rowspan="3" valign="top" width="1"><a class="button remove-item" href="#"><?php echo __('Remove'); ?></a></td>
		</tr>
		<tr>
			<td valign="top"><textarea type="text" class="widefat description" name="description[]" placeholder="Description"></textarea></td>
		</tr>
		<tr>
			<td valign="top"><textarea type="text" class="widefat comment" name="comment[]" placeholder="Commentaire"></textarea></td>
		</tr>
	</tbody>
</table>

</div> <!-- #digest-items-list -->

<p><a id="add-row" class="button" href="#">Add another</a></p>