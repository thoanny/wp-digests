<div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php echo __('Options des résumés', 'wp-digests'); ?></h2>
	<form method="post" action="options.php"> 
		<?php settings_fields( 'default' ); ?>
		<h3>Embed.ly</h3>
			<p><strong>WP Digests</strong> utilise l'<a href="http://embed.ly/docs/api/extract" target="_blank">API Extract</a> de Embed.ly afin d'extraire les informations des liens ajoutés aux résumés.Description + lien vers la clé.</p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="wp_digests_embedly_api_key"><?php echo __('API Key', 'wp-digests'); ?></label></th>
					<td><input type="text" id="wp_digests_embedly_api_key" name="wp_digests_embedly_api_key" value="<?php echo get_option('wp_digests_embedly_api_key'); ?>" class="regular-text" /></td>
				</tr>
			</table>
		<?php submit_button(); ?>
	</form>
</div>