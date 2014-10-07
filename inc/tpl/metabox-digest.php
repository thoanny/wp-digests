<?php // $val = get_post_meta($d->ID,'_ma_valeur',true); ?>
<div id="digest-add-item-form">
	<label for="item_url"><?php echo __('URL address', 'wp-digests'); ?>*</label>
	<input id="item-url" type="text" name="item_url" placeholder="http://..." />
	<button id="add-item" class="button" data-loading="<?php echo esc_attr__('Loading...', 'wp-digests'); ?>" data-error-empty="<?php echo esc_attr__('URL Address is mandatory.', 'wp-digests'); ?>" data-error-invalid="<?php echo esc_attr__('You must enter a valid URL here.', 'wp-digests'); ?>"><?php echo __('Add', 'wp-digests'); ?></button>
	<span class="error-txt"></span>
</div>

<div id="digest-items-list">

	<?php
		if ( $digest_items ) :
			foreach ( $digest_items as $item ) {
	?>
				<table border="0" cellpadding="0" cellspacing="0" width="100%" class="digest-item">
					<tbody>
						<tr>
							
							<?php if ($item['thumbnail'] != '') echo '<td rowspan="3" width=1 valign="top"><img src="'.esc_attr( $item['thumbnail'] ).'" class="thumbnail" /></td>'; ?>
							
							<td height="1">
								<input type="text" class="title widefat" name="title[]" placeholder="Titre" value="<?php if($item['title'] != '') echo esc_attr( $item['title'] ); ?>" />
								<input type="hidden" name="thumbnail[]" class="thumbnail" placeholder="Illustration" value="<?php if ($item['thumbnail'] != '') echo esc_attr( $item['thumbnail'] ); ?>" />
								<input type="hidden" name="provider_name[]" class="provider-name" placeholder="Provider name" value="<?php if ($item['provider_name'] != '') echo esc_attr( $item['provider_name'] ); ?>" />
								<input type="hidden" name="provider_url[]" class="provider-url" placeholder="Provider url" value="<?php if ($item['provider_url'] != '') echo esc_attr( $item['provider_url'] ); ?>" />
								<input type="hidden" name="type[]" class="type" placeholder="type" value="<?php if ($item['type'] != '') echo esc_attr( $item['type'] ); ?>" />
								<input type="hidden" name="url[]" class="url" value="<?php if ($item['url'] != '') echo esc_attr( $item['url'] ); ?>" />
							</td>
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

<table border="0" cellpadding="0" cellspacing="0" width="100%" class="empty-item screen-reader-text">
	<tbody>
		<tr>
			<td rowspan="3" width=1 valign="top">
				<img class="thumbnail" />
			</td>
			<td height="1">
				<input type="text" class="title widefat" name="title[]" placeholder="Titre" />
				<input type="hidden" name="thumbnail[]" class="thumbnail" placeholder="Illustration" />
				<input type="hidden" name="provider_name[]" class="provider-name" placeholder="Provider name" />
				<input type="hidden" name="provider_url[]" class="provider-url" placeholder="Provider url" />
				<input type="hidden" name="type[]" class="type" placeholder="type" />
				<input type="hidden" name="url[]" class="url" value="" />
			</td>
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