<div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php echo __('Options for digests', 'wp-digests'); ?></h2>
	<form method="post" action="options.php"> 
		<?php settings_fields( 'default' ); ?>
		<h3>Embed.ly</h3>
			<p><?php printf( __( 'WP Digests uses %1$s from Embed.ly for extracting data informations from the added links in digests.', 'wp-digests' ), '<a href="http://embed.ly/docs/api/extract" target="_blank">Extract API</a>' ); ?></p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="wp_digests_embedly_api_key"><?php echo __('API Key', 'wp-digests'); ?></label></th>
					<td><input type="text" id="wp_digests_embedly_api_key" name="wp_digests_embedly_api_key" value="<?php echo get_option('wp_digests_embedly_api_key'); ?>" class="regular-text" /></td>
				</tr>
			</table>
		<?php submit_button(); ?>
	</form>
</div>