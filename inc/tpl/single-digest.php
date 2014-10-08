<?php
 /*
 *	Template Name: Single
 */
 

 
get_header(); ?>
<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="digest-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
						<div id="digest">
						<?php
							$digest_items = get_post_meta( get_the_ID(), 'digest_items', true );
							if(isset($digest_items) and !empty($digest_items))
								foreach($digest_items as $item):

									$img_class = '';
								
									if ( isset( $content_width ) && !empty( $content_width ) ) {
										if(!empty($item['thumbnail']) && !empty($item['thumbnail_width'])) {
											
											if( $item['thumbnail_width'] >= $content_width ) {
												$img_class = ' xl';
											} elseif( $item['thumbnail_width'] >= $content_width/4*3 ) {
												$img_class = ' l';
											} elseif( $item['thumbnail_width'] >= $content_width/2 ) {
												$img_class = ' m';
											} elseif( $item['thumbnail_width'] >= $content_width/4 ) {
												$img_class = ' s';
											} else {
												$img_class = ' xs';
											}
											
										}
									}
									echo '<div class="item '.$item['type'].'">';
									if(!empty($item['thumbnail'])) { 
										echo '<div class="thumbnail'.$img_class.'"><img src="'.$item['thumbnail'].'" /></div>'; 
									}
									echo '<div class="qrcode">'.WP_Digests::QRCode($item['url']).'</div>';
									echo '<div class="title"><h4><a href="'.$item['url'].'" target="_blank">'.$item['title'].'</a></h4></div>';
									if(!empty($item['description'])) { 
										echo '<div class="description">'.$item['description'].'</div>';
									}
									if(!empty($item['provider_name']) && !empty($item['provider_url'])) { 
										echo '<div class="provider"><a href="'.$item['provider_url'].'" target="_blank">'.$item['provider_name'].'</a></div>';
									} elseif(!empty($item['provider_url'])) {
										echo '<div class="provider">'.$item['provider_name'].'</div>';
									}
									if(!empty($item['comment'])) { 
										echo '<div class="comment">'.WP_Digests::Markdown($item['comment']).'</div>';
									}
									echo '</div>';
								endforeach;
						?>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php wp_reset_query(); ?>
<?php get_sidebar( 'content' ); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>