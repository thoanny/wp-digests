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
	<h2><?php echo __('Acknowledgments', 'wp-digests'); ?></h2>
	<p><?php echo __('A great thanks to the nicest authors, without whom I couldn\'t reach the end of this first experience of creating WordPress plugin:', 'wp-digests'); ?></p>
	<ul class="ul-disc">
		<li><strong>Willy Bahuaud</strong> (@willybahuaud), <a href="http://wabeo.fr/jouons-avec-les-meta-boxes/" target="_blank">Jouons avec les meta-boxes !</a></li>
		<li><strong>Chris Ellison</strong> (@cjellison), <a href="http://blog.wphub.com/creating-simple-options-page/" target="_blank">Creating a Simple Options Page</a></li>
		<li><strong>Helen Hou-Sandi</strong> (@helenhousandi), <a href="https://gist.github.com/helenhousandi/1593065" target="_blank">Repeating Custom Fields in a Metabox</a></li>
		<li><strong>Tom McFarlin</strong> (@tommcfarlin), <a href="https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate" target="_blank">WordPress Plugin Boilerplate</a> (GPL2+)</li>
		<li><strong>Jack Moore</strong> (@jacklmoore), <a href="https://github.com/jackmoore/autosize" target="_blank">Autosize</a> (MIT License)</li>
		<li><strong>Emanuil Rusev</strong> (@erusev), <a href="https://github.com/erusev/parsedown" target="_blank">Parsedown</a></li>
	</ul>
</div>

