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
		if ( $repeatable_fields ) :
			foreach ( $repeatable_fields as $field ) {
	?>
				<table border="1" width="100%" class="digest-item">
					<tbody>
						<tr>
							<td rowspan="2" width=1>
								<img src="#" width="100" height="100" />
								<input type="hidden" name="thumbnail[]" class="thumbnail" placeholder="Illustration" value="<?php if ($field['thumbnail'] != '') echo esc_attr( $field['thumbnail'] ); ?>" />
								<input type="hidden" name="provider_name[]" class="provider-name" placeholder="Provider name" value="<?php if ($field['provider_name'] != '') echo esc_attr( $field['provider_url'] ); ?>" />
								<input type="hidden" name="provider_url[]" class="provider-url" placeholder="Provider url" value="<?php if ($field['provider_url'] != '') echo esc_attr( $field['provider_url'] ); ?>" />
								<input type="hidden" name="type[]" class="type" placeholder="type" value="<?php if ($field['type'] != '') echo esc_attr( $field['type'] ); ?>" />
								<input type="hidden" name="url[]" class="url" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] ); ?>" />
							</td>
							<td height="1"><input type="text" class="title widefat" name="title[]" placeholder="Titre" value="<?php if($field['title'] != '') echo esc_attr( $field['title'] ); ?>" /></td>
							<td rowspan="2" valign="top" width="1"><a class="button remove-item" href="#"><?php echo __('Remove'); ?></a></td>
						</tr>
						<tr>
							<td valign="top"><textarea type="text" class="widefat" name="comment[]" placeholder="Commentaire"><?php if($field['comment'] != '') echo esc_attr( $field['comment'] ); ?></textarea></td>
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
			<td rowspan="2" width=1>
				<input type="text" name="thumbnail[]" class="thumbnail" placeholder="Illustration" />
				<input type="text" name="provider_name[]" class="provider-name" placeholder="Provider name" />
				<input type="text" name="provider_url[]" class="provider-url" placeholder="Provider url" />
				<input type="text" name="type[]" class="type" placeholder="type" />
				<input type="text" name="url[]" class="url" value="http://" />
			</td>
			<td height="1"><input type="text" class="title widefat" name="title[]" placeholder="Titre" /></td>
			<td rowspan="2" valign="top" width="1"><a class="button remove-item" href="#"><?php echo __('Remove'); ?></a></td>
		</tr>
		<tr>
			<td valign="top"><textarea type="text" class="widefat" name="comment[]" placeholder="Commentaire"></textarea></td>
		</tr>
	</tbody>
</table>

</div> <!-- #digest-items-list -->

<p><a id="add-row" class="button" href="#">Add another</a></p>